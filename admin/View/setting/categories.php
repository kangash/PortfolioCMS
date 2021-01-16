<?php $this->theme->header(); ?>

    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col page-title">
                    <h3>Menus</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="setting-tabs">
                        <?php Theme::block('setting/tabs') ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <h4 class="heading-setting-section">
                        List category
                        <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" data-target="#addCategory" data-whatever="@getbootstrap">
                            Add Category
                        </a>
                    </h4>
                    <?php if(!empty($categories)): ?>
                        <div class="menu-list">
                            <ul class="nav flex-column">
                                <?php foreach($categories as $category): ?>
                                    <li class="nav-item">
                                        <a class="nav-link<?php if ($CategoryId == $category->id) echo ' active'; ?>" href="?category_id=<?php echo $category->id ?>">
                                            <?php echo $category->name ?>
                                            <button class="button-remove" onclick="category.removeCategory(<?= $item->id ?>)">
                                                <i class="icon-trash icons"></i>
                                            </button>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php else: ?>
                        <div class="empty-items">
                            <p>You do not have any category created</p>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-8">
                    <?php if ($categoryId !== null): ?>
                        <h4 class="heading-setting-section">
                            Edit category
                        </h4>
                        <br>
                        <input type="hidden" data-categories="true" id="sortCategoryId" value="<?php echo $categoryId ?>" />
                        <ol id="listItems" class="edit-menu">
                            <?php foreach($editCategory as $item) {
                                Theme::block('setting/category_item', [
                                    'item' => $item
                                ]);
                            } ?>
                        </ol>
                        <button class="add-item-button" onclick="category.addItem(<?php echo $categoryId ?>)">
                            <i class="icon-plus icons"></i> Add category item
                        </button>
                        <?php else: ?>
                            <div class="empty-items">
                            <p>Select a category</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
<!-- Всплывающее меню при добвление меню-->
    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addMenuLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMenuLabel">New category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="categoryName" class="form-control-label">Name category</label>
                            <input type="text" class="form-control" id="categoryName">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary" onclick="category.add();">
                        Save menu
                    </button>
                </div>
            </div>
        </div>
    </div>



<?php $this->theme->footer(); ?>