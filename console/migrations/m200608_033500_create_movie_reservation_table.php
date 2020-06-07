<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_data}}`.
 */
class m200605_043300_create_movie_reservation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%movie_reservation}}', [
            'id' => $this->primaryKey(),
            'movie_schedule_id' => $this->integer(11),
            'quantity' => $this->integer(2),
            'date' => $this->timestamp(),
        ]);

        for($i = 1; $i <= 10; $i++) {
          $this->insert('{{%movie_schedule}}', [
            'movie_id' => $i,
            'theater_id' => $i,
            'date' => ($i < 6) ? "9 Juni 2020" : "10 Juni 2020",
          ]);
          // loop lagi disini
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%movie_reservation}}');
    }
}
