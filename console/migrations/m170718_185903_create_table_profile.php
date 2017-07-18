<?php

use yii\db\Migration;

class m170718_185903_create_table_profile extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%profile}}', [
            'user_id' => $this->integer(11)->notNull()->append('PRIMARY KEY'),
            'name' => $this->string(255),
            'public_email' => $this->string(255),
            'gravatar_email' => $this->string(255),
            'gravatar_id' => $this->string(32),
            'location' => $this->string(255),
            'website' => $this->string(255),
            'bio' => $this->text(),
            'timezone' => $this->string(40),
        ], $tableOptions);

        $this->addForeignKey('fk_user_profile', '{{%profile}}', 'user_id', '{{%user}}', 'id');
    }

    public function safeDown()
    {
        $this->dropTable('{{%profile}}');
    }
}
