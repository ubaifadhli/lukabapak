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

        for($i = 1; $i <= 10; $i++) {
          $this->insert('{{%movie_schedule}}', [
            'movie_id' => $i,
            'theater_id' => ($i < 6) ? 1 : 2,
          ]);
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
