<?php

namespace common\models\blog;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\blog\Post;

/**
 * PostSearch represents the model behind the search form about `common\models\blog\Post`.
 */
class PostSearch extends Post
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'anons', 'content', 'publish_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Post::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'publish_date' => $this->publish_date,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'anons', $this->anons])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}