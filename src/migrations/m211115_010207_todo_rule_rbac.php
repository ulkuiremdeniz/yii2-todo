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

        $todoApiDefaultViewOwn = $auth->createPermission('todoApiDefaultViewOwn');
        $todoApiDefaultViewOwn->description = 'Todo Api DefaultViewOwn';
        $todoApiDefaultViewOwn->ruleName = $rule->name;
        $auth->add($todoApiDefaultViewOwn);
        $auth->addChild($admin, $todoApiDefaultViewOwn);
        $todoApiDefaultView = $auth->getPermission('todoApiDefaultView');
        $auth->addChild($todoApiDefaultViewOwn, $todoApiDefaultView);

        $todoApiDefaultCreateOwn = $auth->createPermission('todoApiDefaultCreateOwn');
        $todoApiDefaultCreateOwn->description = 'Todo Api DefaultCreateOwn';
        $todoApiDefaultCreateOwn->ruleName = $rule->name;
        $auth->add($todoApiDefaultCreateOwn);
        $auth->addChild($admin, $todoApiDefaultCreateOwn);
        $todoApiDefaultCreate = $auth->getPermission('todoApiDefaultCreate');
        $auth->addChild($todoApiDefaultCreateOwn, $todoApiDefaultCreate);

        $todoApiDefaultUpdateOwn = $auth->createPermission('todoApiDefaultUpdateOwn');
        $todoApiDefaultUpdateOwn->description = 'Todo Api DefaultUpdateOwn';
        $todoApiDefaultUpdateOwn->ruleName = $rule->name;
        $auth->add($todoApiDefaultUpdateOwn);
        $auth->addChild($admin, $todoApiDefaultUpdateOwn);
        $todoApiDefaultUpdate = $auth->getPermission('todoApiDefaultUpdate');
        $auth->addChild($todoApiDefaultUpdateOwn, $todoApiDefaultUpdate);

        $todoApiDefaultDeleteOwn = $auth->createPermission('todoApiDefaultDeleteOwn');
        $todoApiDefaultDeleteOwn->description = 'Todo Api DefaultDeleteOwn';
        $todoApiDefaultDeleteOwn->ruleName = $rule->name;
        $auth->add($todoApiDefaultDeleteOwn);
        $auth->addChild($admin, $todoApiDefaultDeleteOwn);
        $todoApiDefaultDelete = $auth->getPermission('todoApiDefaultDelete');
        $auth->addChild($todoApiDefaultDeleteOwn, $todoApiDefaultDelete);


        $todoApiDefaultIndexOwn = $auth->createPermission('todoApiDefaultIndexOwn');
        $todoApiDefaultIndexOwn->description = 'Todo Api DefaultIndexOwn';
        $auth->add($todoApiDefaultIndexOwn);
        $auth->addChild($admin, $todoApiDefaultIndexOwn);


    }

    public function down()
    {
        $auth = \Yii::$app->authManager;

        $auth->remove($auth->getPermission('todoOwnWebDefaultIndex'));
        $auth->remove($auth->getPermission('todoOwnWebDefaultView'));
        $auth->remove($auth->getPermission('todoOwnWebDefaultCreate'));
        $auth->remove($auth->getPermission('todoOwnWebDefaultUpdate'));
        $auth->remove($auth->getPermission('todoOwnWebDefaultDelete'));

        $auth->remove($auth->getPermission('todoOwnApiDefaultIndex'));
        $auth->remove($auth->getPermission('todoOwnApiDefaultView'));
        $auth->remove($auth->getPermission('todoOwnApiDefaultCreate'));
        $auth->remove($auth->getPermission('todoOwnApiDefaultUpdate'));
        $auth->remove($auth->getPermission('todoOwnApiDefaultDelete'));
    }

}
