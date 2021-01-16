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
                    <th>Category</th>
                    <th>Type</th>
                    <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($pages as $page): ?>
                    <?php 
                        $string = substr(strip_tags($page->content), 0, 180);
                        $string = rtrim($string, "!,.-");
                        $string = substr($string, 0, strrpos($string, ' '));
                    ?>
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
                        <?= $string . "..." ?>
                    </td>
                    <td style="text-align: center;">
                        <?= $page->name_item_category ?>
                    </td>
                    <td style="text-align: center;">
                        <?= $page->type ?>
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