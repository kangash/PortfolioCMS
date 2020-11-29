
<div class="extra_content">

<div class="ui grid"
    <?php foreach ($themes as $theme): ?>
        <div class="four wide column">
            <div class="ui card">
                <div class="image">
                    <img src="<?= $theme->screen ?>" alt="/">
                </div>
                <div class="content">
                    <span class="header"><?= $theme->name ?>"</span>
                </div>
                <div class="meta">
                    <span>Version: <?= $theme->version ?>"</span>
                </div>
                <div class="description">
                    <?= $theme->description ?>
                </div>
            </div>

            <div class="extra_content">
                <?php if($activetheme == $theme->dirTheme): ?>
                    <button class="ui button" disabled>
                        Activated
                    </button>
                <?php else: ?>
                    <button class="ui primary button" onclick="setting.setActiveTheme(this, '<?= $theme->dirTheme ?>')">
                        Activate
                    </button>    
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</div>