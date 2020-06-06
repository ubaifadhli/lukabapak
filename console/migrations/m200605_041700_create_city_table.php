<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_data}}`.
 */
class m200605_041700_create_city_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%city}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64),
        ]);

        $cities = array("Surabaya", "Denpasar", "Jakarta", "Makassar", "Medan");

        for($i = 0; $i < count($cities); $i++) {
            $this->insert('{{%city}}', [
              'name' => $cities[$i],
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%city}}');
    }
}
