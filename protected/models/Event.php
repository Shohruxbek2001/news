<?php

/**
 * This is the model class for table "Event".
 *
 * The followings are the available columns in table 'Event':
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $created
 * @property string $preview
 * @property integer $publish
 * @property integer $intro
 */
use common\components\helpers\HYii as Y;
use common\components\helpers\HArray as A;

class Event extends \common\components\base\ActiveRecord
{
    public $image;
    public $file;
    public $files;
    public $intro;
    public $text;
    public $title;
    public $preview;
    public $enable_preview;

	/**
	 * (non-PHPdoc)
	 * @see CModel::behaviors()
	 */
	public function behaviors()
	{
		return A::m(parent::behaviors(), [
			'aliasBehavior'=>'\DAliasBehavior',
			'metaBehavior'=>'\MetadataBehavior'
		]);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'event';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
        return $this->getRules(array(
			array('title, text, created', 'required'),
			array('publish', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
            array('enable_preview', 'boolean'),
            array('intro', 'safe'),
			array('id, title, text, created, publish', 'safe', 'on'=>'search'),
		));
	}

	/**
	 * {@inheritDoc}
	 * @see DActiveRecord::scopes()
	 */
	public function scopes()
	{
		return $this->getScopes([
		]);
	}
	
	/**
	 * {@inheritDoc}
	 * @see DActiveRecord::relations()
	 */
	public function relations()
	{
		return $this->getRelations([				
		]);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return $this->getAttributeLabels(array(
			'id' => 'ID',
            'title' => 'Заголовок',
            'intro' => 'Превью новости',
            'text' => 'Текст новости',
            'created' => 'Создана',
            'publish' => 'Активно?',
            'enable_preview' => 'Отображать в модуле',
			'files' => 'Изображение в заголовке'
		));
	}

    protected function getDate()
    {
        return Yii::app()->params['month'] 
        	? Y::formatDateVsRusMonth($this->created) 
        	: Y::formatDate($this->created, 'dd.MM.yyyy');
    }

    public function getPreviewImg(){
	    $preview = '/images/event/'.$this->preview;
        $t = ResizeHelper::normalizeFileName($preview);
	    $ret = !empty($this->preview) && file_exists($t) && $this->enable_preview
            ? $preview
            : false;
        return $ret;
    }

    public function getPreviewEnable(){
        return (bool)$this->enable_preview;
    }

    /**
     * Get first paragraph of content
     *
     * @param int $length
     * @return string
     */
    public function getIntro($length=100): string
    {
        $text = ($this->intro) ?: $this->text;
//        $text = HtmlHelper::getIntro($text, $length) . "...";
        return HtmlHelper::getIntro($text, $length);
    }
    /**
     * Get first paragraph of content
     *
     * @param int $length
     * @return string
     */
    public function getTitle($length=80): string
    {
        $text = ($this->title) ?: $this->title;
        return HtmlHelper::getIntro($text, $length);
    }

    protected function beforeValidate()
    {
        $this->image = CUploadedFile::getInstances($this, 'image');
        $this->file  = CUploadedFile::getInstances($this, 'file');
        return true;
    }

	protected function beforeSave()
    {
    	parent::beforeSave();
    	
    	if(strpos($this->created, '/') !== false) {
    		$date=explode('/', $this->created);
    		$this->created=(int)$date[2] . '-' . (int)$date[1] . '-' . (int)$date[0] . ' 00:00:00';
    	}
    	
    	return true;
    }

    protected function afterSave()
    {   
        parent::afterSave();

        $upload = new UploadHelper;

        if (count($this->image))
            $upload->add($this->image, $this);

        if (count($this->file))
            $upload->add($this->file, $this, 'file');

        $upload->runUpload();
    }

    protected function afterDelete()
    {
        $params = array(
            'model'   => strtolower(get_class($this)),
            'item_id' => $this->id
        );

        $items = array_merge(
            CImage::model()->findAllByAttributes($params),
            File::model()->findAllByAttributes($params)
        );

        foreach($items as $item)
            $item->delete();

        return true;
    }
}
