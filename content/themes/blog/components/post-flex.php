<div class="post-flex  <?php echo "post-flex-n".$i; ?>">
    <div class="post-flex-image">
        <img class="post-flex-image-bottom" src="\content\themes\blog\img\6.png" alt=""> 
    </div>

    <div class="post-flex-content">
        <a class="title-post" href="/page/<?= $page->segment?>"><?= $page->title?></a>

        <p><?= $page->content?></p>
        <hr>
        <div class="post-element-text-link">
            <a href="№" class="post-flex-buttom">Читать</a>
        </div>

    </div>
</div>