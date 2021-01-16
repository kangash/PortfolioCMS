<?php $theme->themeBuilder('common\header'); ?>

<section class="containers"> 
    <div class="title-section-post">
        <h2 class="title-section-post-h2">Популярные Flex</h2>
    </div>
    <div class="tab-container-flex">
        <?php for($i=1;$i<=12;$i++): ?>
            <div class="card">
                <img src="/images.jpg" alt="">
                <div class="con-text">
                    <h2>Использование API Яндекс Диска на PHP</h2>
                    <p>
                    Можно найти множество применений Яндекс Диска на своем сайте,
                    например, хранение бекапов и.т.д.
                    <button>
                    Читать
                    </button>    
                    </p>    
                    
                </div>
            </div>
        <?php endfor; ?>
    </div>
</section>
        <!-- <ul class="ul">
            <li>
                <i class="bx bx-drink"></i>
            </li>
            <li>
                <i class="bx bx-flim"></i>
            </li>
            <li>
                <i class="bx bx-store-alt"></i>
            </li>
            <li>
                <i class="bx bx-map"></i>
            </li>
        </ul> -->





















<?php $theme->themeBuilder('common\footer'); ?>