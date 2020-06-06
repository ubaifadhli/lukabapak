<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "theater".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $address
 * @property int|null $telephone_number
 * @property int|null $city_id
 */
class Theater extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'theater';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['telephone_number', 'city_id'], 'integer'],
            [['name', 'address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
            'telephone_number' => 'Telephone Number',
            'city_id' => 'City ID',
        ];
    }
}
