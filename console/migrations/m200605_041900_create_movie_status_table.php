<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_data}}`.
 */
class m200605_041900_create_movie_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%movie_status}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64),
        ]);

        $this->insert('{{%movie_status}}', [
          'name' => 'Now Playing',
        ]);

        $this->insert('{{%movie_status}}', [
          'name' => 'Upcoming',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%movie_status}}');
    }
}
