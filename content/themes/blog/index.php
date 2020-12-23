<?php $this->theme->header(); ?>

<section>
    <div class="container mt-5">
        <div class="title-section-post">
            <h2 class="title-section-post-h2">Популярные Flex</h2>
        </div>
        <div class="tab-container-flex">
            <?php foreach ($pages as $page) {
                if ($page->status == 'publish') {
                    $this->theme->themeBuilder('components\post-flex', ['page' => $page]);
                }
            } ?>
        </div>
    </div>
</section>

<?php $this->theme->footer(); ?>