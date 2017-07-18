<?php

use yii\db\Migration;

class m170718_185903_create_table_book extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%book}}', [
            'book_id' => $this->integer(11)->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'title' => $this->string(100)->notNull(),
            'published_at' => $this->dateTime()->notNull(),
            'author_id' => $this->integer(11)->notNull(),
        ], $tableOptions);

        $this->addForeignKey('author_book_fk', '{{%book}}', 'author_id', '{{%author}}', 'author_id');
    }

    public function safeDown()
    {
        $this->dropTable('{{%book}}');
    }
}
