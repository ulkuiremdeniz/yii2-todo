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
       // $user = (isset($role) && $role != '') ? $auth->getRole($role) : $auth->getRole('user');

        $todoWebTaskIndexOwn = $auth->createPermission('todoWebTaskIndexOwn');
        $todoWebTaskIndexOwn->description = 'Todo Web TaskIndexOwn';
        $todoWebTaskIndexOwn->ruleName = $rule->name;
        $auth->add($todoWebTaskIndexOwn);
        $auth->addChild($admin, $todoWebTaskIndexOwn);
        $todoWebTaskIndex = $auth->getPermission('todoWebTaskIndex');
        $auth->addChild($todoWebTaskIndexOwn, $todoWebTaskIndex);
      //  $auth->addChild($user, $todoWebTaskIndexOwn);

        $todoWebTaskViewOwn = $auth->createPermission('todoWebTaskViewOwn');
        $todoWebTaskViewOwn->description = 'Todo Web TaskViewOwn';
        $todoWebTaskViewOwn->ruleName = $rule->name;
        $auth->add($todoWebTaskViewOwn);
        $auth->addChild($admin, $todoWebTaskViewOwn);
        $todoWebTaskView = $auth->getPermission('todoWebTaskView');
        $auth->addChild($todoWebTaskViewOwn, $todoWebTaskView);

        $todoWebTaskCreateOwn = $auth->createPermission('todoWebTaskCreateOwn');
        $todoWebTaskCreateOwn->description = 'Todo Web TaskCreateOwn';
        $todoWebTaskCreateOwn->ruleName = $rule->name;
        $auth->add($todoWebTaskCreateOwn);
        $auth->addChild($admin, $todoWebTaskCreateOwn);
        $todoWebTaskCreate = $auth->getPermission('todoWebTaskCreate');
        $auth->addChild($todoWebTaskCreateOwn, $todoWebTaskCreate);

        $todoWebTaskUpdateOwn = $auth->createPermission('todoWebTaskUpdateOwn');
        $todoWebTaskUpdateOwn->description = 'Todo Web TaskUpdateOwn';
        $todoWebTaskUpdateOwn->ruleName = $rule->name;
        $auth->add($todoWebTaskUpdateOwn);
        $auth->addChild($admin, $todoWebTaskUpdateOwn);
        $todoWebTaskUpdate = $auth->getPermission('todoWebTaskUpdate');
        $auth->addChild($todoWebTaskUpdateOwn, $todoWebTaskUpdate);

        $todoWebTaskDeleteOwn = $auth->createPermission('todoWebTaskDeleteOwn');
        $todoWebTaskDeleteOwn->description = 'Todo Web TaskDeleteOwn';
        $todoWebTaskDeleteOwn->ruleName = $rule->name;
        $auth->add($todoWebTaskDeleteOwn);
        $auth->addChild($admin, $todoWebTaskDeleteOwn);
        $todoWebTaskDelete = $auth->getPermission('todoWebTaskDelete');
        $auth->addChild($todoWebTaskDeleteOwn, $todoWebTaskDelete);

        $todoApiTaskViewOwn = $auth->createPermission('todoApiTaskViewOwn');
        $todoApiTaskViewOwn->description = 'Todo Api TaskViewOwn';
        $todoApiTaskViewOwn->ruleName = $rule->name;
        $auth->add($todoApiTaskViewOwn);
        $auth->addChild($admin, $todoApiTaskViewOwn);
        $todoApiTaskView = $auth->getPermission('todoApiTaskView');
        $auth->addChild($todoApiTaskViewOwn, $todoApiTaskView);

        $todoApiTaskCreateOwn = $auth->createPermission('todoApiTaskCreateOwn');
        $todoApiTaskCreateOwn->description = 'Todo Api TaskCreateOwn';
        $todoApiTaskCreateOwn->ruleName = $rule->name;
        $auth->add($todoApiTaskCreateOwn);
        $auth->addChild($admin, $todoApiTaskCreateOwn);
        $todoApiTaskCreate = $auth->getPermission('todoApiTaskCreate');
        $auth->addChild($todoApiTaskCreateOwn, $todoApiTaskCreate);

        $todoApiTaskUpdateOwn = $auth->createPermission('todoApiTaskUpdateOwn');
        $todoApiTaskUpdateOwn->description = 'Todo Api TaskUpdateOwn';
        $todoApiTaskUpdateOwn->ruleName = $rule->name;
        $auth->add($todoApiTaskUpdateOwn);
        $auth->addChild($admin, $todoApiTaskUpdateOwn);
        $todoApiTaskUpdate = $auth->getPermission('todoApiTaskUpdate');
        $auth->addChild($todoApiTaskUpdateOwn, $todoApiTaskUpdate);

        $todoApiTaskDeleteOwn = $auth->createPermission('todoApiTaskDeleteOwn');
        $todoApiTaskDeleteOwn->description = 'Todo Api TaskDeleteOwn';
        $todoApiTaskDeleteOwn->ruleName = $rule->name;
        $auth->add($todoApiTaskDeleteOwn);
        $auth->addChild($admin, $todoApiTaskDeleteOwn);
        $todoApiTaskDelete = $auth->getPermission('todoApiTaskDelete');
        $auth->addChild($todoApiTaskDeleteOwn, $todoApiTaskDelete);


        $todoApiTaskIndexOwn = $auth->createPermission('todoApiTaskIndexOwn');
        $todoApiTaskIndexOwn->description = 'Todo Api TaskIndexOwn';
        $auth->add($todoApiTaskIndexOwn);
        $auth->addChild($admin, $todoApiTaskIndexOwn);


    }

    public function down()
    {
        $auth = \Yii::$app->authManager;

        $auth->remove($auth->getPermission('todoOwnWebTaskIndex'));
        $auth->remove($auth->getPermission('todoOwnWebTaskView'));
        $auth->remove($auth->getPermission('todoOwnWebTaskCreate'));
        $auth->remove($auth->getPermission('todoOwnWebTaskUpdate'));
        $auth->remove($auth->getPermission('todoOwnWebTaskDelete'));

        $auth->remove($auth->getPermission('todoOwnApiTaskIndex'));
        $auth->remove($auth->getPermission('todoOwnApiTaskView'));
        $auth->remove($auth->getPermission('todoOwnApiTaskCreate'));
        $auth->remove($auth->getPermission('todoOwnApiTaskUpdate'));
        $auth->remove($auth->getPermission('todoOwnApiTaskDelete'));
    }

}
