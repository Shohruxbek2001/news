<?php

class SiteController extends Controller
{
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			'downloadFile'=>[
				'class'=>'\common\ext\file\actions\DownloadFileAction',
				'allowDirs'=>['files']
			]
		);
	}

    public function actionSitemap() {
        $title = 'Карта сайта';
        
        $this->prepareSeo($title);
        $this->breadcrumbs->add($title);
        
        $this->render('sitemap');
    }
    
    public function actionPrivacyPolicy()
    {
    	$this->layout = 'other';
    	
    	if(D::cms('privacy_policy')) {
	        $page = Page::model()->findByPk(D::cms('privacy_policy'));
    	}
    	else {
    		$page=Page::model()->wcolumns(['alias'=>'privacy-policy'])->find();
    	}
        if (!$page) {
            throw new CHttpException('404', 'Страница не найдена');
        }

        $this->prepareSeo($page->title);
        $this->seoTags($page);
        ContentDecorator::decorate($page);

        if($page->blog_id) {
        	$this->breadcrumbs->addByCmsMenu($page->blog);
        	$this->breadcrumbs->add($page->title);
        } else {
        	$this->breadcrumbs->addByCmsMenu($page, array(), true);
        }

        $view=$page->view_template ?: 'page';
        
        $this->render($view, compact('page'));
    }

	public function actionIndex()
	{
        $menuItem = CmsMenu::getInstance()->getDefault();

        if (!$menuItem)
            throw new CHttpException('404', 'Не найдена страница по умолчанию');
        switch ($menuItem->options['model']) {
            case 'page':
                $page = Page::model()->findByPk($menuItem->options['id']);
                $this->layout = $page->id === '1' ? 'main' : 'other';
                if (!$page)
                    throw new CHttpException('404', 'Не найдена главная страница');
                $this->prepareSeo();
                $this->seoTags($page);
                ContentDecorator::decorate($page);
                $view=$page->view_template ?: $page->id !== '1' ? 'page' :'index';

                $this->render($view, compact('page'));
                break;
            case 'shop':
                $this->forward('shop/index');
                break;
            case 'event':
                if (isset($menuItem->options['id'])) {
                    $_GET['id'] = $menuItem->options['id'];
                    $this->forward('site/event');
                } else $this->forward('site/events');
                break;
            case 'articles':
                if (isset($menuItem->options['id'])) {
                    $_GET['id'] = $menuItem->options['id'];
                    $this->forward('article/view');
                } else $this->forward('article/index');
                break;
            case 'services':
                $this->redirect('/services');
                break;
            case 'reviews':
                $this->forward('reviews/default/index');
                break;
            case 'blog':
                $_GET['id'] = $menuItem->options['id'];
                $this->forward('site/blog');
                break;
            case 'gallery':
                $this->forward('gallery/index');
                break;
            case 'question':
                $this->forward('question/index');
                break;
            default:
                throw new CHttpException(404, 'Страница не определена');
        }
	}

    public function actionPage($id)
    {
        $this->layout = 'other';

        $page = Page::model()->findByPk($id);

        if (!$page) {
            throw new CHttpException('404', 'Страница не найдена');
        }

        $this->prepareSeo($page->title);
        $this->seoTags($page);
        ContentDecorator::decorate($page);

        if($page->blog_id) {
        	$this->breadcrumbs->addByCmsMenu($page->blog);
        	$this->breadcrumbs->add($page->title);
        } else {
        	$this->breadcrumbs->addByCmsMenu($page, array(), true);
        }

        $view=$page->view_template ?: 'page';
        
        $this->render($view, compact('page'));
    }

    public function actionEvent($id)
    {
        $this->layout = 'other';

        $event = Event::model()->findByPk($id);

        if (!$event) {
            throw new CHttpException('404', Yii::t('events','event_not_found'));
        }

        $this->prepareSeo($event->title);
		$this->seoTags($event);
        ContentDecorator::decorate($event);
        
        $this->breadcrumbs->add($this->getEventHomeTitle(), '/news');
        $this->breadcrumbs->add($event->title);
        
        $this->render('event', compact('event'));
    }

    public function actionEvents()
    {
        $this->layout = 'other';

        $criteria = new CDbCriteria();
        $criteria->condition = 'publish = 1';
        $criteria->order     = 'created DESC, id DESC';

        $count = Event::model()->count($criteria);

        $pages = new CPagination($count);
        $pages->pageSize = D::cms('events_limit') ? D::cms('events_limit') : 12;
        $pages->applyLimit($criteria);

        $events = Event::model()->findAll($criteria);

        $this->prepareSeo($this->getEventHomeTitle());
        $criteria2 = new CDbCriteria();
        $criteria2->condition = 'publish = 1';
        $criteria2->order     = 'created ASC, id ASC';
        $eventRevers = Event::model()->findAll($criteria2);
        foreach($events as $e) {
            ContentDecorator::decorate($e);
        }
        
        $this->breadcrumbs->add($this->getEventHomeTitle());

        $this->render('events', compact('events', 'pages','eventRevers'));
    }

    public function actionBlog($id)
    {
        $this->layout = 'other';

        $blog = Blog::model()->findByPk($id);

        if (!$blog) {
            throw new CHttpException('404', Yii::t('blog','blog_not_found'));
        }

        $criteria = new CDbCriteria();
        $criteria->condition = 'blog_id = ?';
        $criteria->order     = 'created DESC';
        $criteria->params[]  = $id;

        $count = Page::model()->count($criteria);

        $pages = new CPagination($count);
        $pages->pageSize = Yii::app()->params['posts_limit'] ? Yii::app()->params['posts_limit'] : 7;
        $pages->applyLimit($criteria);

        $posts = Page::model()->findAll($criteria);

        $this->prepareSeo($blog->title);
        
        $this->breadcrumbs->addByCmsMenu($blog, array(), true);
        
        $this->render('blog', compact('blog', 'posts', 'pages'));
    }
    
    public function getEventHomeTitle()
    {
    	return D::cms('events_title', Yii::t('events','events_title'));
    }
}
