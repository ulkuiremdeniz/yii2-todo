<?php

namespace ulkuiremdeniz\todo\controllers\web;




use portalium\web\Controller as WebController;
use ulkuiremdeniz\todo\models\TaskSearch;
use ulkuiremdeniz\todo\Module;
use ulkuiremdeniz\todo\models\Task;
use yii\data\ActiveDataProvider;
use Yii;
use portalium\workspace\models\WorkspaceUser;
use yii\web\NotFoundHttpException;


class TaskController  extends  WebController
{

    public function actionIndex()
    {
        $searchModel = new TaskSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }



    //yeni bir kullanıcı oluşturuyorum

    public function actionCreate()
    {

        //tabloda boş bir satır oluşturuyorum
        $model =new Task();
        $model->id_user = Yii::$app->user->id;
        $model->id_workspace = WorkspaceUser::getActiveWorkspaceId();

        //post kullanıcının doldurduğu bilgileri getiriyor
        //veri listesiyle modeldeki alanlarla eşleşme yapılıyor
        //model nesnenin özelliklerini yüklüyor(load)
        //eğer kullanıcı form yolladıysa birden fazla değişken  id,kullanıcıadı,soyadı,email gibi özellikler bunları modelde tut
        if($this->request->isPost)
        {
            //yeni kayıt olan kişinin bilgilerini modele atıyorum
            //load işlemiyle biz girilen verileri modelin attributeleriyle eşleştiriyoruz
            if($model->load($this->request->post()) && $model->save())
            {

                Yii::$app->session->addFlash('success', \portalium\content\Module::t('Kaydetme islemi basarili'));

                //redirect fonksiyona yönlendirme yapıyor(bulunduğu controller içinde),
                return $this->redirect(['index']);

            }

            //eğer kullanıcı değer girmediyse db'e default olarak değer atama yapar
            else {
                $model->loadDefaultValues();
            }

        }

        return $this->render('create', [
            'model' => $model,

        ]);


    }


    public function actionDelete($id)
    {

        if($this->findModel($id)->delete()){
            Yii::$app->session->addFlash('info', Module::t('Kullanici silindi'));
        }

        return $this->redirect(['index']);

    }


    protected function findModel($id_task)
    {
        //belirtilen id ye ait kullanıcı var mı yok mu bul
        if (($model = Task::findOne(['id_task' => $id_task])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(\portalium\content\Module::t('Aranılan kullanici mevcut değil.'));
    }


   //hangi veriyi güncelleyeceksin id'si ile bul
    public function actionUpdate($id)
    {

        //hangi satırı güncelleyeceksen o satırı bul ve modele ata
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('success', Module::t('Güncelleme başarılı'));
            return $this->redirect(['index']);
        }


        return $this->render('update', [
            'model' => $model,

        ]);



    }












}