<?php

use ulkuiremdeniz\todo\bundles\TaskAsset;

TaskAsset::register($this);

// Bildirim durumuna göre zil ikonunun rengini belirlemek için bir değişken oluşturuyoruz.
$isTask = !empty($tasks);
?>

<style>
    .fa-bell {
        font-size: 1.5rem;
        /* Zil ikonunun rengini dinamik olarak değiştirmek için bir değişken tanımlıyoruz */
        --bell-icon-color: <?= $isTask ? 'red' : 'white' ?>;
        color: var(--bell-icon-color);
    }
</style>

<div class="dropdown">
    <a href="#" class="dropdown-toggle btn " data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-bell"></i>
    </a>
    <!-- Bildirimlerin gösterileceği menü listesi tanımlandı. "dropdown-menu" class'ı menünün bir açılır menü olduğunu belirtmek için eklenmiştir -->
    <ul class="dropdown-menu task" aria-labelledby="dLabel">
        <!-- Menü başlığı "task" olarak belirtilmiştir.-->
        <li><a class="dropdown-item task-heading task-footer" href="#">Task<span class="float-end">View all<i class="bi bi-arrow-right"></i></span></a></li>
        <!-- Menüdeki ögeleri ayırmak için ayırıcı eklenmiştir -->
        <li><hr class="dropdown-divider"></li>
        <!-- Bildirimlerin listeleneceği bölüm -->
        <?php if ($isTask): ?>
            <!-- Eğer '$tasks' değişkeni doluysa, yani görevler varsa, görevleri listeliyoruz -->
            <?php foreach ($tasks as $task): ?>
                <li>
                    <!-- Her bir bildirimin ayrı bağlantı içinde -->
                    <a class="dropdown-item content" href="#">
                        <!-- Her bir bildirimin içeriğini oluşturan bir bölümdür -->
                        <div class="task-item">
                            <h4 class="item-title"><?= $task['title'] ?></h4>
                            <p class="item-info"><?= $task['description'] ?></p>
                        </div>
                    </a>
                       <hr class="dropdown-divider">     <!--  Sadece görevlerin ardından ayırıcı ekleniyor -->
                </li>
                <!-- Diğer bildirimler buraya eklenir -->
        <!--   <li><hr class="dropdown-divider"></li> -->
            <?php endforeach; ?>
        <?php endif; ?>
        <!-- "View all" tüm bildirimleri görüntülemek için kullanılır -->
        <li><a class="dropdown-item task-footer" href="#">View all<span class="float-end"><i class="bi bi-arrow-right"></i></span></a></li>
    </ul>
</div>