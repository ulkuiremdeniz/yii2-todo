<?php

namespace ulkuiremdeniz\todo\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class Task extends Widget
{

  //işlemleri başlatan fonksiyon
    public function init()
    {
   // yapıcı method
    }

    //işlemlerin sonucunu oluşturan fonksiyon
    public function run()
    {
           //yetki kontrolü
          // widgets altındaki viewse render et
        return $this->render('./task');

    }

}