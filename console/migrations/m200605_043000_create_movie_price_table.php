<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_data}}`.
 */
class m200605_043000_create_movie_price_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%movie_price}}', [
            'movie_id' => $this->integer(11)->unique(),
            'price' => $this->integer(8)->defaultValue(0),
        ]);

        $moviePrice = array(50000,
                            65000,
                            70000,
                            50000,
                            55000,
                            60000,
                            50000,
                            65000,
                            70000,
                            50000);

        for($i = 1; $i <= count($moviePrice); $i++) {
          $this->insert('{{%movie_price}}', [
            'movie_id' => $i,
            'price' => $moviePrice[$i - 1],
          ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%movie_price}}');
    }
}
