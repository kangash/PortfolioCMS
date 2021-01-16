<?php $this->theme->header(); ?>


<div class="container mt-5">
        <div class="row">
            <div class="col page-title">
                <h3>Theme Setting</h3>
            </div>
        </div>
        <div class="row">
                <div class="col">
                    <div class="setting-tabs">
                        <?php Theme::block('setting/tabs') ?>
                    </div>
                </div>
        </div>


    <div class="tab-container-flex">
    <?php foreach ($themes as $theme): ?>
        <div class="post-flex  <?php echo "post-flex-n".$i; ?>">
            <div class="post-flex-image">
                <img class="post-flex-image-bottom" src="<?= $theme->screen ?>" alt=""> 
            </div>
            <div class="post-flex-content">
                <a class="title-post" href="content.php"><?= $theme->name ?></a>

                <span>Version: <?= $theme->version ?>"</span>
                <hr>
                <div class="post-element-text-link">
    

                    <?php if($activeTheme->value == $theme->dirTheme): ?>
                            <button class="post-flex-buttom" disabled>
                                Activated
                            </button>
                        <?php else: ?>
                            <button class="post-flex-buttom" onclick="setting.setActiveTheme(this, '<?= $theme->dirTheme ?>')">
                                Activate
                            </button>    
                        <?php endif; ?>
                    <!-- <a href="№" class="post-flex-buttom" onclick="setting.setActiveTheme(this, '<?= $theme->dirTheme ?>')">Читать</a> -->
                </div>

            </div>
        </div>

    <?php endforeach; ?>
    </div>
</div>
<?php $this->theme->footer(); ?>