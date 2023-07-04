<?php

namespace ulkuiremdeniz\todo\models;

use portalium\content\models\Category;
use ulkuiremdeniz\todo\models\Task;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class TaskSearch extends Task
{

    // filitrelemede ifadeleri kurala göre alıyor
    //tabloyu rules de tanımlamak zorundasın
    public function rules()
    {
        return [
            [['id_task','id_user','id_workspace'], 'integer'],
            [['title', 'description', 'date_create', 'date_update','status'], 'safe'],

        ];

    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }


    public function search($params)
    {

        //task tablosunda bir sorgu başlatıyoruz
        $query = Task::find();

        // add conditions that should always apply here

        //verileri liste görünümünde sunmaya yarar
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        //kayıtları geri döndürmeyi sağlar
        //eğer uygun veri yoksa boş tablo döndürür
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }

            // grid filtering conditions
            $query->andFilterWhere([
                'id_task' => $this->id_task,
                'title' => $this-> title,
                'description' => $this->description,
                'status' => $this->status,
                'id_user' => $this->id_user,
                'id_workspace' => $this->id_workspace,
                'date_create'=>$this->date_create,
                'date_update'=>$this->date_update,



            ]);

        /*

        //like mantığı kullanılarak çalışır tabloda benzerlerini de getirir
        $query->andFilterWhere(['like',    'id_task', $this->id_task])
            ->andFilterWhere(['like', 'title', $this-> title])
            ->andFilterWhere(['like', 'description', $this-> description])
            ->andFilterWhere(['like',   'status', $this-> status])
            ->andFilterWhere(['like',  'id_user', $this-> id_user])
            ->andFilterWhere(['like', 'id_workspace', $this-> id_workspace])
            ->andFilterWhere(['like', 'date_create', $this-> date_create])
            ->andFilterWhere(['like', 'date_update', $this-> date_update]);
*/
        return $dataProvider;
    }









}