<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property integer $book_id
 * @property string $title
 * @property string $published_at
 * @property integer $author_id
 *
 * @property Author $author
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'published_at', 'author_id'], 'required'],
            [['published_at'], 'safe'],
            [['author_id'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Author::className(), 'targetAttribute' => ['author_id' => 'author_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'book_id' => 'Book ID',
            'title' => 'Title',
            'published_at' => 'Published At',
            'author_id' => 'Author ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['author_id' => 'author_id']);
    }
}
