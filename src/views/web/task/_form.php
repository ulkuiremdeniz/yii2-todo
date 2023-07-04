<?php

use portalium\theme\helpers\Html;
use portalium\theme\widgets\ActiveForm;
use portalium\theme\widgets\Panel;
use ulkuiremdeniz\todo\Module;

/* @var $this yii\web\View /
/ @var $model portalium\user\models\User /
/ @var $form portalium\theme\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
<?php Panel::begin([
    'title' => Html::encode($this->title),
    'actions' => [
        'header' => [
        ],
        'footer' => [
            Html::submitButton(Module::t( 'Save'), ['class' => 'btn btn-success']),
        ]
    ],
]) ?>
<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
<?php Panel::end() ?>
<?php ActiveForm::end(); ?>