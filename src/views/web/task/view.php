<?php

use portalium\theme\widgets\Panel;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var ulkuiremdeniz\todo\models\Task $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?php Panel::begin([
    'actions' => [
        'header' => [
            Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_task], ['class' => 'fa fa-pencil btn btn-primary']),
            Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_task], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]),
        ]
    ]

]) ?>


<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id_task',
        'title:ntext',
        'description',
        'status',
        'id_user',
        'id_workspace',
        'date_create',
        'date_update',
    ],
]) ?>

<?php Panel::end() ?>
