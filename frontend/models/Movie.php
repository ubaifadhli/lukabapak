<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "movie".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $genre
 * @property string|null $director_name
 * @property string|null $studio_name
 * @property int|null $status_id
 * @property string|null $screen_quality
 * @property string|null $rating
 * @property string|null $image_path
 * @property string|null $synopsis
 */
class Movie extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'movie';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_id'], 'integer'],
            [['synopsis'], 'string'],
            [['title', 'genre', 'director_name', 'studio_name', 'image_path'], 'string', 'max' => 64],
            [['screen_quality'], 'string', 'max' => 8],
            [['rating'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'genre' => 'Genre',
            'director_name' => 'Director Name',
            'studio_name' => 'Studio Name',
            'status_id' => 'Status ID',
            'screen_quality' => 'Screen Quality',
            'rating' => 'Rating',
            'image_path' => 'Image Path',
            'synopsis' => 'Synopsis',
        ];
    }
}
