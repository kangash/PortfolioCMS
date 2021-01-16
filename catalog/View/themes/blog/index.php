<?php

use Engine\Core\Classes\Page;

$this->theme->header(); ?>


<section>
    <div class="container mt-5">
        <div class="title-section-post">
            <h2 class="title-section-post-h2">Популярные Flex</h2>
        </div>
        <div class="tab-container-flex">
            <?php foreach (Page::getProvider() as $page) {
                Page::setStore($page);
                if ($page->status == 'publish') {
                    $this->theme->builder('components\card-page');
                }
            } ?>
        </div>
    </div>
</section>

<?php $this->theme->footer(); ?>