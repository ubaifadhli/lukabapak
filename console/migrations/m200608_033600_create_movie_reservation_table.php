<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_data}}`.
 */
class m200608_033600_create_movie_reservation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%movie_reservation}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11),
            'movie_schedule_id' => $this->integer(11),
            'date' => $this->string(64),
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
