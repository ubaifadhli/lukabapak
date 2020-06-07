<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_data}}`.
 */
class m200605_044000_create_movie_schedule extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%movie_schedule}}', [
            'id' => $this->primaryKey(),
            'movie_id' => $this->integer(11),
            'theater_id' => $this->integer(11),
            'date' => $this->string(64),
        ]);

        for($i = 1; $i <= 10; $i++) {
          $this->insert('{{%movie_schedule}}', [
            'movie_id' => $i,
            'theater_id' => $i,
            'date' => ($i < 6) ? "9 Juni 2020" : "10 Juni 2020",
          ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%movie_schedule}}');
    }
}
