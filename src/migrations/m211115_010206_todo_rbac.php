<?php


use yii\db\Migration;

class m211115_010206_todo_rbac extends Migration
{
    public function up()
    {
        $auth = \Yii::$app->authManager;

        $role = \Yii::$app->setting->getValue('site::admin_role');
        $admin = (isset($role) && $role != '') ? $auth->getRole($role) : $auth->getRole('admin');

        $todoWebDefaultIndex = $auth->createPermission('todoWebDefaultIndex');
        $todoWebDefaultIndex->description = 'Todo Web DefaultIndex';
        $auth->add($todoWebDefaultIndex);
        $auth->addChild($admin, $todoWebDefaultIndex);

        $todoWebDefaultView = $auth->createPermission('todoWebDefaultView');
        $todoWebDefaultView->description = 'Todo Web DefaultView';
        $auth->add($todoWebDefaultView);
        $auth->addChild($admin, $todoWebDefaultView);

        $todoWebDefaultCreate = $auth->createPermission('todoWebDefaultCreate');
        $todoWebDefaultCreate->description = 'Todo Web DefaultCreate';
        $auth->add($todoWebDefaultCreate);
        $auth->addChild($admin, $todoWebDefaultCreate);

        $todoWebDefaultUpdate = $auth->createPermission('todoWebDefaultUpdate');
        $todoWebDefaultUpdate->description = 'Todo Web DefaultUpdate';
        $auth->add($todoWebDefaultUpdate);
        $auth->addChild($admin, $todoWebDefaultUpdate);

        $todoWebDefaultDelete = $auth->createPermission('todoWebDefaultDelete');
        $todoWebDefaultDelete->description = 'Todo Web DefaultDelete';
        $auth->add($todoWebDefaultDelete);
        $auth->addChild($admin, $todoWebDefaultDelete);

    }

    public function down()
    {
        $auth->remove($auth->getPermission('todoWebDefaultIndex'));
        $auth->remove($auth->getPermission('todoWebDefaultView'));
        $auth->remove($auth->getPermission('todoWebDefaultCreate'));
        $auth->remove($auth->getPermission('todoWebDefaultUpdate'));
        $auth->remove($auth->getPermission('todoWebDefaultDelete'));
    }


}