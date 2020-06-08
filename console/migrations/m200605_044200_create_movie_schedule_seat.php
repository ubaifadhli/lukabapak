<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_data}}`.
 */
class m200605_044200_create_movie_schedule_seat extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%movie_schedule_seat}}', [
          'movie_schedule_id' => $this->integer(11),
          'seat_id' => $this->integer(11),
        ]);

        $movie_reservation_count = 1;
        $seat_count = 1;

        for($i = 1; $i <= 10; $i++) {
          $this->insert('{{%movie_schedule}}', [
            'movie_id' => $i,
            'theater_id' => $i,
            'date' => ($i < 6) ? "9 Juni 2020" : "10 Juni 2020",
          ]);
          // loop lagi disini

          for($j = 0; $j < 6; $j++) {
            for($k = 1; $k < 6; $k++) {
              $this->insert('{{%seat}}', [
                'number' => strval(chr(65 + $j) . $k),
              ]);

              $this->insert('{{%movie_schedule_seat}}', [
                'movie_schedule_id' => $movie_reservation_count,
                'seat_id' => $seat_count,
              ]);

              $seat_count++;
            }
          }

          $movie_reservation_count++;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%movie_schedule_seat}}');
    }
}
