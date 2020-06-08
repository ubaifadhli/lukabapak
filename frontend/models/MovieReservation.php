<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "movie_reservation".
 *
 * @property int $id
 * @property int|null $movie_schedule_id
 * @property int|null $quantity
 * @property string $date
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
            [['movie_schedule_id', 'quantity'], 'integer'],
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
            'movie_schedule_id' => 'Movie Schedule ID',
            'quantity' => 'Quantity',
            'date' => 'Date',
        ];
    }
}
