<?php use Engine\Core\Classes\Page; ?>
<?php $this->theme->header(); ?>

<section class="containers"> 
      <div class="content_page_inner">
        <div class="content_left">
            <div class="post-flex-image"> 
                <img src="\catalog\View\uploads\<?= Page::image() ?>" alt=""> 
            </div>
            <h2><?= Page::title() ?></h2>
            <?= Page::content() ?>
        </div>
        <div class="content_right">
            <img class="content_baner" src="/img/origs.webp" alt="">
        </div>
    </div>
</section>



<?php $this->theme->footer(); ?>
