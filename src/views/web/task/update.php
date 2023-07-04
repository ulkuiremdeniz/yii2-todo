<?php

use yii\helpers\Html;
use ulkuiremdeniz\todo\Module;
use portalium\theme\widgets\Panel;


$this->title = Module::t('Update Task');
$this->params['breadcrumbs'][] = ['label' => Module::t('Task'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Module::t('Update');
?>
<div class="content-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>