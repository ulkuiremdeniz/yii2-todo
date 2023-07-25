<?php

namespace ulkuiremdeniz\todo\controllers\web;

use ulkuiremdeniz\todo\models\Task;
use ulkuiremdeniz\todo\models\TaskSearch;
use portalium\user\models\User;
use portalium\web\Controller as WebController;
use Yii;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use ulkuiremdeniz\todo\Module;

/**
 * TaskController implements the CRUD actions for Task model.
 */
class TaskController extends WebController
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Task models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TaskSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if(!\Yii::$app->user->can('todoWebTaskIndex'))
            $dataProvider->query->andWhere(['id_user'=>\Yii::$app->user->id]);

        if (!\Yii::$app->user->can('todoWebTaskIndex') && !\Yii::$app->user->can('todoWebTaskIndexOwn')) {
            throw new \yii\web\ForbiddenHttpException(Module::t('You are not allowed to access this page.'));
        }


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Task model.
     * @param int $id_task Id Task
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (!\Yii::$app->user->can('todoWebTaskView')) {
            throw new \yii\web\ForbiddenHttpException(Module::t('Sorry you are not allowed to view Task'));
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Task model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */



    public function actionCreate()
    {

        if (!Yii::$app->user->can('todoWebTaskCreate'))
            throw new ForbiddenHttpException(Module::t("Sorry you are not allowed to create Task"));

        $model = new Task();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->addFlash('success', Module::t('Task has been created'));
                return $this->redirect(['view', 'id' => $model->id_task]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Task model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_task Id Task
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */


    public function actionUpdate($id)
    {
        if (!Yii::$app->user->can('todoWebTaskUpdate', ['model' => $this->findModel($id)]))
            throw new ForbiddenHttpException(Module::t("Sorry you are not allowed to Update Task"));

        $model = $this->findModel($id);


        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_task]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }



    /**
     * Deletes an existing Task model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_task Id Task
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (!Yii::$app->user->can('todoWebTaskDelete', ['model' => $this->findModel($id)]))
            throw new ForbiddenHttpException(Module::t("Sorry you are not allowed to delete Task"));
        $this->findModel($id)->delete();
        Yii::$app->session->addFlash('info',Module::t('Task has been deleted'));

        return $this->redirect(['index']);
    }

    /**
     * Finds the Task model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_task Id Task
     * @return Task the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_task)
    {
        if (($model = Task::findOne(['id_task' => $id_task])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Module::t( 'The requested page does not exist.'));
    }
}
