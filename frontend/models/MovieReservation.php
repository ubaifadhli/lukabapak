<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "movie_reservation".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $movie_schedule_id
 * @property string|null $date
 */
class MovieReservation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'movie_reservation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'movie_schedule_id'], 'integer'],
            [['date'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'movie_schedule_id' => 'Movie Schedule ID',
            'date' => 'Date',
        ];
    }
}
