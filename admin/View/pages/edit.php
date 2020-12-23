<?php $this->theme->header(); ?>
    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col page-title">
                    <h3><?= $page->title ?></h3>
                    <div class="sub header grey">
                        <?php echo $baseUrl . '/page/' . \Engine\Helper\Text::transliteration($page->segment) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <form id="formPage">
                        <input type="hidden" name="page_id" id="formPageId" value="<?= $page->id ?>" />
                        <div class="form-group">
                            <label for="formTitle">Title</label>
                            <input type="text" name="title" class="form-control" id="formTitle" value="<?= $page->title ?>" placeholder="Title page...">
                        </div>
                        <div class="form-group">
                            <label for="formContent">Content</label>
                            <textarea name="content" id="redactor" class="form-control" id="formContent">
                            <?= $page->content ?>
                            </textarea>
                        </div>
                    </form>
                </div>
                <div class="col-3">

                <div class="ui segments menu-list" style="padding: 10px;">
                        <div class="ui blue segment">
                            <h4>Update</h4>
                        </div>
                        <div class="ui secondary segment">
                            <p>Update this page</p>
                            <button type="submit" class="btn btn-primary" onclick="page.update(this)">
                                Update
                            </button>
                        </div>
                    </div>

                    <div class="ui segments menu-list" style="padding: 10px;">
                        <div class="ui blue segment">
                            <h4>Setting</h4>
                        </div>
                        <div class="ui form segment">
                            <div class="field">
                                <label>Type page</label>
                                <select id="type" class="ui search dropdown">
                                    <option value="page">Basic</option>
                                    <?php foreach (getTypes('page') as $key => $type): ?>
                                        <option value="<?php echo $key ?>" <?php if ($key == $page->type) echo ' selected'; ?>>
                                            <?php echo $type ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="ui form segment">
                            <div class="field">
                                <label>Статус</label>
                                <select id="status" class="ui search dropdown">
                                    <option value="publish"<?php if ('publish' == $page->status) echo ' selected'; ?>>Опубликовано</option>
                                    <option value="draft"<?php if ('draft' == $page->status) echo ' selected'; ?>>В корзине</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php $this->theme->footer(); ?>
