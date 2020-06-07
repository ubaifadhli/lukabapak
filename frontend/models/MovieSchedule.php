<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "movie_schedule".
 *
 * @property int $id
 * @property int|null $movie_id
 * @property int|null $theater_id
 * @property string $date
 */
class MovieSchedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'movie_schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['movie_id', 'theater_id'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'movie_id' => 'Movie ID',
            'theater_id' => 'Theater ID',
            'date' => 'Date',
        ];
    }
}
