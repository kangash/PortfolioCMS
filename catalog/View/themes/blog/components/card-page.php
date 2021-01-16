<?php 
    use Engine\Core\Classes\Page;

    $string = substr(strip_tags(Page::content()), 0, 180);
    $string = rtrim($string, "!,.-");
    $string = substr($string, 0, strrpos($string, ' '));
    
?>


<div class="post-flex  <?php echo "post-flex-n".$i; ?>">
    <div class="post-flex-image"> 
        <?php if (Page::image() == 'default.jpg'): ?>
            <img class="post-flex-image-bottom" src="<?= '\\catalog\\View\\uploads\\' . DS . Page::image() ?>" alt="">
        <?php else: ?>
            <img class="post-flex-image-bottom" src="<?= '\\catalog\\View\\uploads\\' . DS . Page::id(). DS . Page::image() ?>" alt="">
        <?php endif; ?>
    </div>

    <div class="post-flex-content">
        <a class="title-post" href="/page/<?= Page::segment()?>"><?= Page::title()?></a>
        <p><?= $string . "… "?></p>
        <hr>
        <div class="post-element-text-link">
            <a href="№" class="post-flex-buttom">Читать</a>
        </div>

    </div>
</div>