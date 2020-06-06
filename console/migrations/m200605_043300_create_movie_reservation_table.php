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
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%movie_reservation}}');
    }
}
