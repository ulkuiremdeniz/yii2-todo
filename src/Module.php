<?php

namespace ulkuiremdeniz\todo;

use portalium\base\Event;
use ulkuiremdeniz\todo\components\TriggerActions;

class Module extends \portalium\base\Module
{
    public static $tablePrefix = 'todo_';
    
    public static $name = 'todo';

    public static $description = 'todo Module';

    public $apiRules = [
        [
            'class' => 'yii\rest\UrlRule',
            'controller' => [
                'todo/default',
                'todo/task',

            ],
          'pluralize'=>false
        ],
    ];
    
    public static function moduleInit()
    {
        self::registerTranslation('todo','@ulkuiremdeniz/todo/messages',[
            'todo' => 'todo.php',
        ]);
    }

    public static function t($message, array $params = [])
    {
        return parent::coreT('todo', $message, $params);
    }

    public function getMenuItems(){
        $menuItems = [
            [
                [
                    'menu' => 'web',
                    'type' => 'widget',
                    'label' => 'ulkuiremdeniz\todo\widgets\task',
                    'name' => 'task',
                ]
            ],
        ];
        return $menuItems;
    }


    /* 
        public function registerEvents()
        {
            Event::on($this::className(), UserModule::EVENT_USER_DELETE_BEFORE, [new TriggerActions(), 'onUserDeleteBefore']);
        } 
    */
}


