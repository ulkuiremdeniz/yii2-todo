<?php

use portalium\ulkuiremdeniz\Module;

/* @var $this yii\web\View */
/* @var $model portalium\user\models\Group */

$this->title = Module::t('Create Task');
$this->params['breadcrumbs'][] = ['label' => Module::t('Task'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
