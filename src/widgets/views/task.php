<?php

use ulkuiremdeniz\todo\bundles\TaskAsset;

TaskAsset::register($this);

?>

<div class="dropdown">
    <!-- data-bs-toggle ve data-bs-target, bildirimlerin açılıp-kapanması için kullanılır. href tıklandığında yönlendirilecek URL'yi belirtir -->

    <!DOCTYPE html>
    <html>
    <head>
        <title>Sayfa Başlığı</title>
        <!-- Bootstrap Icons CSS dosyasını ekleyin -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">
    </head>
    <body>
    <a id="dLabel" role="button" data-bs-toggle="dropdown" data-bs-target="#" href="#">
        <!-- Bildirim simgesini temsil eden ikon ekler (zil sembolü) -->
        <i class="bi-bell"></i>
    </a>
    </body>
    </html>


    <!-- Bildirimlerin gösterileceği menü listesi tanımlandı. "dropdown-menu" class'ı menünün bir açılır menü olduğunu belirtmek için eklenmiştir -->
    <ul class="dropdown-menu task" aria-labelledby="dLabel">
        <!-- Menü başlığı "task" olarak belirtilmiştir. "dropdown-item" class'ı Bootstrap 5 için geçerlidir -->
        <li><a class="dropdown-item task-heading" href="#">Task<span class="float-end">View all<i class="bi bi-arrow-right"></i></span></a></li>
        <!-- Menüdeki ögeleri ayırmak için ayırıcı eklenmiştir -->
        <li><hr class="dropdown-divider"></li>
        <!-- Bildirimlerin listeleneceği bölüm -->

            <!-- Her bir bildirimin ayrı bağlantı içinde -->

            <?php if (!empty($tasks)): ?>
            <?php foreach ($tasks as $task): ?>
        <li>
            <!-- Her bir bildirimin ayrı bağlantı içinde -->
            <a class="dropdown-item content" href="#">
                <!-- Her bir bildirimin içeriğini oluşturan bir bölümdür -->
                <div class="task-item">
                    <h4 class="item-title"><?= $task->title ?></h4>
                    <p class="item-info"><?= $task->description ?></p>
                </div>
            </a>
        </li>
        <li><hr class="dropdown-divider"></li>
        <?php endforeach; ?>
        <?php else: ?>

        <?php endif; ?>


        <!-- Diğer bildirimler buraya eklenir -->
        <li><hr class="dropdown-divider"></li>
        <!-- "View all" tüm bildirimleri görüntülemek için kullanılır -->
        <li><a class="dropdown-item task-footer" href="#">View all<span class="float-end"><i class="bi bi-arrow-right"></i></span></a></li>
    </ul>
</div>