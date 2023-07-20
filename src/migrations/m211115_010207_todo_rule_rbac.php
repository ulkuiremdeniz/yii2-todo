<?php

use yii\db\Migration;
use portalium\todo\rbac\OwnRule;
class m211115_010207_todo_rule_rbac extends Migration
{

    public function up()
    {

        $auth = \Yii::$app->authManager;

        $rule = new OwnRule();
        $auth->add($rule);
        $role = \Yii::$app->setting->getValue('site::admin_role');
        $admin = (isset($role) && $role != '') ? $auth->getRole($role) : $auth->getRole('admin');

        $todoWebDefaultIndexOwn = $auth->createPermission('todoWebDefaultIndexOwn');
        $todoWebDefaultIndexOwn->description = 'Todo Web DefaultIndexOwn';
        $todoWebDefaultIndexOwn->ruleName = $rule->name;
        $auth->add($todoWebDefaultIndexOwn);
        $auth->addChild($admin, $todoWebDefaultIndexOwn);
        $todoWebDefaultIndex = $auth->getPermission('todoWebDefaultIndex');
        $auth->addChild($todoWebDefaultIndexOwn, $todoWebDefaultIndex);

        $todoWebDefaultViewOwn = $auth->createPermission('todoWebDefaultViewOwn');
        $todoWebDefaultViewOwn->description = 'Todo Web DefaultViewOwn';
        $todoWebDefaultViewOwn->ruleName = $rule->name;
        $auth->add($todoWebDefaultViewOwn);
        $auth->addChild($admin, $todoWebDefaultViewOwn);
        $todoWebDefaultView = $auth->getPermission('todoWebDefaultView');
        $auth->addChild($todoWebDefaultViewOwn, $todoWebDefaultView);

        $todoWebDefaultCreateOwn = $auth->createPermission('todoWebDefaultCreateOwn');
        $todoWebDefaultCreateOwn->description = 'Todo Web DefaultCreateOwn';
        $todoWebDefaultCreateOwn->ruleName = $rule->name;
        $auth->add($todoWebDefaultCreateOwn);
        $auth->addChild($admin, $todoWebDefaultCreateOwn);
        $todoWebDefaultCreate = $auth->getPermission('todoWebDefaultCreate');
        $auth->addChild($todoWebDefaultCreateOwn, $todoWebDefaultCreate);

        $todoWebDefaultUpdateOwn = $auth->createPermission('todoWebDefaultUpdateOwn');
        $todoWebDefaultUpdateOwn->description = 'Todo Web DefaultUpdateOwn';
        $todoWebDefaultUpdateOwn->ruleName = $rule->name;
        $auth->add($todoWebDefaultUpdateOwn);
        $auth->addChild($admin, $todoWebDefaultUpdateOwn);
        $todoWebDefaultUpdate = $auth->getPermission('todoWebDefaultUpdate');
        $auth->addChild($todoWebDefaultUpdateOwn, $todoWebDefaultUpdate);

        $todoWebDefaultDeleteOwn = $auth->createPermission('todoWebDefaultDeleteOwn');
        $todoWebDefaultDeleteOwn->description = 'Todo Web DefaultDeleteOwn';
        $todoWebDefaultDeleteOwn->ruleName = $rule->name;
        $auth->add($todoWebDefaultDeleteOwn);
        $auth->addChild($admin, $todoWebDefaultDeleteOwn);
        $todoWebDefaultDelete = $auth->getPermission('todoWebDefaultDelete');
        $auth->addChild($todoWebDefaultDeleteOwn, $todoWebDefaultDelete);

    }

    public function down()
    {
        $auth = \Yii::$app->authManager;

        $auth->remove($auth->getPermission('todoOwnWebDefaultIndex'));
        $auth->remove($auth->getPermission('todoOwnWebDefaultView'));
        $auth->remove($auth->getPermission('todoOwnWebDefaultCreate'));
        $auth->remove($auth->getPermission('todoOwnWebDefaultUpdate'));
        $auth->remove($auth->getPermission('todoOwnWebDefaultDelete'));
    }

}
