<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_data}}`.
 */
class m200605_042100_create_theater_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%theater}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64),
            'address' => $this->string(64),
            'telephone_number' => $this->integer(16),
            'city_id' => $this->integer(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%theater}}');
    }
}
