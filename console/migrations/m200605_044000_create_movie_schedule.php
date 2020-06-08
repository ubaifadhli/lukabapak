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
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%movie_schedule}}');
    }
}
