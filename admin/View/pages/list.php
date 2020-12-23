<?php $this->theme->header(); ?>

    <main>
        <div class="container mt-5">
            <h1>Pages - <a href="/admin/pages/create/">Create page</a></h1>


            <table class="table">
                <thead>
                    <tr>
                    <th>id</th> 
                    <th>Title</th>
                    <th>Content</th>
                    <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($pages as $page): ?>
                    <tr>
                    <th scope="row">
                        <?= $page->id ?>
                    </th>
                    <td>
                        <a href="/admin/pages/edit/<?=  $page->id ?>">
                        <?= $page->title ?>
                        </a>
                    </td>
                    <td>
                        <?= $page->content ?>
                    </td>
                    <td>
                        <?= $page->date ?>
                    </td>
                    </tr>
                <?php endforeach;?>

                </tbody>
            </table>
        </div>
    </main>

    <?php $this->theme->footer(); ?>