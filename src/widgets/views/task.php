<?php
use ulkuiremdeniz\todo\bundles\TaskAsset;
TaskAsset::register($this);
// Bildirim durumuna göre zil ikonunun rengini belirlemek için bir değişken oluşturuyoruz.
$isTask = !empty($tasks);
?>

<div class="dropdown">
    <?php if ($isTask): ?>
    <a href="#" class="dropdown-toggle btn" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-bell" style="font-size: 20px;"></i>
    </a>
    <div class="dropdown-menu " aria-labelledby="dLabel">
        <div class="task-heading text-center border border-top-0 borer-start-0 border-end-0">
            <small class="menu-title text-lg">Task</small>
        </div>
        <div class="card dropFixed"  style="border: none">
            <ul class="list-group overflow-auto ">

                    <?php foreach ($tasks as $task): ?>
                        <a class="dropdown-item2" href="<?='/todo/task/view?id=' . $task->id_task?>">
                            <div style="max-height: 10%">
                                <li class="list" ><?= $task['title'] ?> </li>
                                <li class="list text-muted description"><?= $task['description'] ?>
                            </div>
                        </a>
                    <?php endforeach; ?>
            </ul>
        </div>
        <a class="d-block pt-2 whiteclass border-top fw-bold text-dark text-center" href="<?='/todo/task/index'?>">View all</a>
    </div>
    <?php else: ?>
    <a href="#" class="dropdown-toggle btn" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-bell-slash" style="font-size: 20px;"></i>
    </a>
    <?php endif; ?>
</div>

