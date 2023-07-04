<?php

namespace ulkuiremdeniz\todo\models;

use Yii;
use portalium\user\models\User;
use portalium\workspace\models\Workspace;

/**
 * This is the model class for table "{{%todo_task}}".
 *
 * @property int $id_task
 * @property string|null $title
 * @property string|null $description
 * @property int|null $status
 * @property int $id_user
 * @property int $id_workspace
 * @property string $date_create
 * @property string $date_update
 *
 * @property UserUser $user
 * @property WorkspaceWorkspace $workspace
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%todo_task}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'id_user', 'id_workspace'], 'integer'],
            [['id_user', 'id_workspace'], 'required'],
            [['date_create', 'date_update'], 'safe'],
            [['title', 'description'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id_user']],
            [['id_workspace'], 'exist', 'skipOnError' => true, 'targetClass' => Workspace::class, 'targetAttribute' => ['id_workspace' => 'id_workspace']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_task' => 'Id Task',
            'title' => 'Title',
            'description' => 'Description',
            'status' => 'Status',
            'id_user' => 'Id User',
            'id_workspace' => 'Id Workspace',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id_user' => 'id_user']);
    }

    /**
     * Gets query for [[Workspace]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkspace()
    {
        return $this->hasOne(Workspace::class, ['id_workspace' => 'id_workspace']);
    }
}