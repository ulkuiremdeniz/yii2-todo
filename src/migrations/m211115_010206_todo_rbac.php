<?php


use yii\db\Migration;

class m211115_010206_todo_rbac extends Migration
{
    public function up()
    {
        $auth = \Yii::$app->authManager;

        $role = \Yii::$app->setting->getValue('site::admin_role');
        $admin = (isset($role) && $role != '') ? $auth->getRole($role) : $auth->getRole('admin');

        $todoWebTaskIndex = $auth->createPermission('todoWebTaskIndex');
        $todoWebTaskIndex->description = 'Todo Web TaskIndex';
        $auth->add($todoWebTaskIndex);
        $auth->addChild($admin, $todoWebTaskIndex);

        $todoWebTaskView = $auth->createPermission('todoWebTaskView');
        $todoWebTaskView->description = 'Todo Web TaskView';
        $auth->add($todoWebTaskView);
        $auth->addChild($admin, $todoWebTaskView);

        $todoWebTaskCreate = $auth->createPermission('todoWebTaskCreate');
        $todoWebTaskCreate->description = 'Todo Web TaskCreate';
        $auth->add($todoWebTaskCreate);
        $auth->addChild($admin, $todoWebTaskCreate);

        $todoWebTaskUpdate = $auth->createPermission('todoWebTaskUpdate');
        $todoWebTaskUpdate->description = 'Todo Web TaskUpdate';
        $auth->add($todoWebTaskUpdate);
        $auth->addChild($admin, $todoWebTaskUpdate);

        $todoWebTaskDelete = $auth->createPermission('todoWebTaskDelete');
        $todoWebTaskDelete->description = 'Todo Web TaskDelete';
        $auth->add($todoWebTaskDelete);
        $auth->addChild($admin, $todoWebTaskDelete);


        $todoApiTaskIndex = $auth->createPermission('todoApiTaskIndex');
        $todoApiTaskIndex->description = 'Todo Api Task Index';
        $auth->add($todoApiTaskIndex);
        $auth->addChild($admin, $todoApiTaskIndex);

        $todoApiTaskView = $auth->createPermission('todoApiTaskView');
        $todoApiTaskView->description = 'Todo Api Task View';
        $auth->add($todoApiTaskView);
        $auth->addChild($admin, $todoApiTaskView);

        $todoApiTaskCreate = $auth->createPermission('todoApiTaskCreate');
        $todoApiTaskCreate->description = 'Todo Api Task Create';
        $auth->add($todoApiTaskCreate);
        $auth->addChild($admin, $todoApiTaskCreate);

        $todoApiTaskUpdate = $auth->createPermission('todoApiTaskUpdate');
        $todoApiTaskUpdate->description = 'Todo Api Task Update';
        $auth->add($todoApiTaskUpdate);
        $auth->addChild($admin, $todoApiTaskUpdate);

        $todoApiTaskDelete = $auth->createPermission('todoApiTaskDelete');
        $todoApiTaskDelete->description = 'Todo Api Task Delete';
        $auth->add($todoApiTaskDelete);
        $auth->addChild($admin, $todoApiTaskDelete);




    }

    public function down()
    {
        $auth->remove($auth->getPermission('todoWebTaskIndex'));
        $auth->remove($auth->getPermission('todoWebTaskView'));
        $auth->remove($auth->getPermission('todoWebTaskCreate'));
        $auth->remove($auth->getPermission('todoWebTaskUpdate'));
        $auth->remove($auth->getPermission('todoWebTaskDelete'));

        $auth->remove($auth->getPermission('todoApiTaskIndex'));
        $auth->remove($auth->getPermission('todoApiTaskView'));
        $auth->remove($auth->getPermission('todoApiTaskCreate'));
        $auth->remove($auth->getPermission('todoApiTaskUpdate'));
        $auth->remove($auth->getPermission('todoApiTaskDelete'));
    }


}