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
    <a href="#" class="dropdown-toggle btn" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-bell" style="font-size: 20px;"></i>
    </a>
    <div class="dropdown-menu task" aria-labelledby="dLabel">
        <div class="card"  style="border: none">
            <div class="task-heading  border border-top-0 borer-start-0 border-end-0">
                <p class="menu-title ">Task</p>
            </div>
            <ul class="list-group ">
                <?php if ($isTask): ?>
                    <?php foreach ($tasks as $task): ?>
                        <a class="dropdown-item2" href="#">
                            <div class="" style="max-height: 10%">
                                <li class="list" ><?= $task['title'] ?> </li>
                                <li class="list text-muted description"><?= $task['description'] ?></li>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
                <li class="list-group-item border-bottom-0 border-start-0 border-end-0" >
                    <a class="dropdown-item task-footer" href="#">View all<span class="float-end"><i class="bi bi-arrow-right"></i></span></a>
                </li>
            </ul>
        </div>
    </div>
</div>