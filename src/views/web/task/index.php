<?php
use ulkuiremdeniz\todo\Module;
use yii\grid\SerialColumn;
use portalium\theme\widgets\GridView;
use portalium\theme\widgets\ActionColumn;
use portalium\theme\widgets\Panel;
use yii\helpers\Html;

?>

<?php Panel::begin([
    'title' => Module::t('Tasks'),
    'actions' => [
        Html::a(Module::t(''), ['create'], ['class' => 'btn btn-success fa fa-plus'])
    ]
]) ?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => SerialColumn::class],

        'id_task',
        'title:ntext',
        'description',
        'status',
        'id_user',
        'id_workspace',
        'date_create',
        'date_update',
        ['class' => ActionColumn::class],
    ],
]);?>
<?php Panel::end(); ?>

