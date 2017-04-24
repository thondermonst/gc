<?php

namespace app\modules\memory\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class CardSearch extends Card
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type'], 'integer'],
            [['filename'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param  array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query = Card::find();

        $dataProvider = new ActiveDataProvider(
            [
                'query' => $query,
            ]
        );

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(
            [
                'id' => $this->id,
                'type' => $this->type,
            ]
        );

        $query->andFilterWhere(['like', 'filename', $this->filename]);

        return $dataProvider;
    }
}