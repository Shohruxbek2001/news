<?php foreach ($images as $id => $img): ?>
<div class="side-bar-article">
    <a href="#"><img title="<?php echo $img->description; ?>" href="/images/<?php echo $img->model . '/' . $img->filename; ?>" src="/images/<?php echo $img->model . '/tmb_' . $img->filename; ?>" alt="" /></a>
    <div class="side-bar-article-title">
        <a href="#"><?php echo $img->description; ?></a>
    </div>
</div>
<?php endforeach; ?>

<script type="text/javascript">
    $(function () {
        $('#images-block .show-all-images a').click(function () {
            var first = $(this).parents('.images-block').find('a:first');
            $(first).trigger('click');
        });
    });
</script>
