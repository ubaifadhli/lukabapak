<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "movie_reservation_seat".
 *
 * @property int|null $movie_reservation_id
 * @property int|null $seat_id
 */
class MovieReservationSeat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'movie_reservation_seat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['movie_reservation_id', 'seat_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'movie_reservation_id' => 'Movie Reservation ID',
            'seat_id' => 'Seat ID',
        ];
    }
}
