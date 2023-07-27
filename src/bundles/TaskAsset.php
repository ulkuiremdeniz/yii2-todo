<?php

namespace ulkuiremdeniz\todo\bundles;

use yii\web\AssetBundle;

class TaskAsset extends AssetBundle
{
    //TaskAsset sınıfının js ve css  dosyalarının bulunduğu dizini belirtiyoruz
    public $sourcePath= '@vendor/ulkuiremdeniz/yii2-todo/src/assets/';

    //task.css dosyasının kullanılacağını belirtiyoruz
    public $css = [
        'css/task.css'
    ];

    //koddaki değişikliğin ön yüzde güncel olmasını sağlar
    public $publishOptions = [
        'forceCopy' => YII_DEBUG,
    ];


    //constructor sınıfın başlatılmasını sağlar
    public function init()
    {
        parent::init();
    }


    /*
    . CSS dosyaları, JavaScript dosyaları, resim dosyaları veya başka türdeki istemci
      tarafı kaynakları gibi web varlıklarını gruplamak ve yönetmek için kullanılır.
    .Bundle'lar, varlık dosyalarını paketleyerek ve bağımlılıklarını yöneterek, proje içindeki farklı sayfalar veya
    bileşenler arasında bu varlıkların verimli bir şekilde kullanılmasını sağlar. Aynı varlıkların farklı sayfalarda veya
   bileşenlerde tekrar tekrar tanımlanması yerine, varlık demetleri sayesinde bu varlıkların tek bir yerden yönetilmesi mümkün olur.


*/


}