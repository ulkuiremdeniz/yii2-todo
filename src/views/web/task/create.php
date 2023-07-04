<?php

use yii\helpers\Html;
use ulkuiremdeniz\todo\Module;
use portalium\theme\widgets\Panel;


$this->title = Module::t('Create Task');
$this->params['breadcrumbs'][] = ['label' => Module::t('Task'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>