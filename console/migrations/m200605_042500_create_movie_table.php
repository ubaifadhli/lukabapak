<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_data}}`.
 */
class m200605_042500_create_movie_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%movie}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(64),
            'genre' => $this->string(64),
            'director_name' => $this->string(64),
            'studio_name' => $this->string(64),
            'status_id' => $this->integer(11),
            'screen_quality' => $this->string(8),
            'rating' => $this->string(32),
            'image_path' => $this->string(64),
            'synopsis' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%movie}}');
    }
}
