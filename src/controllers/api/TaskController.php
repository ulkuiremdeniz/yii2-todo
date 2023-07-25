<?php

namespace ulkuiremdeniz\todo\controllers\api;


use Yii;
use ulkuiremdeniz\todo\Module;
use ulkuiremdeniz\todo\models\Task;
use ulkuiremdeniz\todo\models\TaskSearch;
use portalium\rest\ActiveController as RestActiveController;

class TaskController extends RestActiveController
{
    //task tablosundaki verileri yönetmemizi sağlar
    public $modelClass = 'ulkuiremdeniz\todo\models\Task';

    //üst sınıfı ezerek burada kurallar tanımlıyoruz
    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['dataFilter'] = [
            //filtreleme  için ActiveDataFilter classı kullanılacak
            'class' => \yii\data\ActiveDataFilter::class,
            //TaskSearch adında arama modeli kullanarak filtreleme yapılacak
            'searchModel' => TaskSearch::class,
            'attributeMap' => [
                'title' => 'title',
               //filtreli arama işlemini title üzerinde yapacak
            ],
        ];

        //prepareDataProvider  filtreli ve kullanıcıya göre sınırlanmış verileri döndürür
        $actions['index']['prepareDataProvider'] = function ($action) {
            $searchModel = new TaskSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            //eğer ındex yetkisi yoksa sadece giriş yapmış kullanıcının verilerini getirir
            if (!Yii::$app->user->can('todoApiTaskIndex')) {
                $dataProvider->query->andWhere(['id_user' => Yii::$app->user->id]);
            }
            return $dataProvider;
        };
        return $actions;
    }

    //CRUD işlemleri öncesi özel yetkilendirme kontrollerini gerçekleştirir bu işlemlere yetkin var mı?
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }
        switch ($action->id) {
            //yetkilere sahip misin onu kontrol ediyor
            case 'view':
                if (!Yii::$app->user->can('todoApiTaskView'))
                    throw new \yii\web\ForbiddenHttpException(Module::t('You do not have permission to view this content.'));
                break;
            case 'create':
                if (!Yii::$app->user->can('todoApiTaskCreate'))
                    throw new \yii\web\ForbiddenHttpException(Module::t('You do not have permission to create this content.'));
                break;
            case 'update':
                if (!Yii::$app->user->can('todoApiTaskUpdate'))
                    throw new \yii\web\ForbiddenHttpException(Module::t('You do not have permission to update this content.'));
                break;
            case 'delete':
                if (!Yii::$app->user->can('todoApiTaskDelete'))
                    throw new \yii\web\ForbiddenHttpException(Module::t('You do not have permission to delete this content.'));
                break;
            case 'index':
                if (!Yii::$app->user->can('todoApiTaskIndex') )
                    throw new \yii\web\ForbiddenHttpException(Module::t('You do not have permission to view this content.'));
                break;
        }

        return true;
    }

}