<?php

namespace ulkuiremdeniz\todo\widgets;


use ulkuiremdeniz\todo\bundles\TaskAsset;
use ulkuiremdeniz\todo\models\TaskSearch;
use ulkuiremdeniz\todo\Module;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use ulkuiremdeniz\todo\models\Task as TodoTask;

class Task extends Widget
{

  //işlemleri başlatan fonksiyon
    public function init()
    {

   // yapıcı method
    }

    //işlemlerin sonucunu oluşturan fonksiyon
    //html ve css i birbirine harmanlıyo
    public function run()
    {

        $tasks=TodoTask::widgets();

        // widgets altındaki viewse render et
        return $this->render('task',[
           // 'ali'=>'sisman',
            'tasks'=>$tasks

        ]);

    }

}