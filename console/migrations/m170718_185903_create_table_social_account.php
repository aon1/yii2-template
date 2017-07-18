<?php

use yii\db\Migration;

class m170718_185903_create_table_social_account extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%social_account}}', [
            'id' => $this->integer(11)->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'user_id' => $this->integer(11),
            'provider' => $this->string(255)->notNull(),
            'client_id' => $this->string(255)->notNull(),
            'data' => $this->text(),
            'code' => $this->string(32),
            'created_at' => $this->integer(11),
            'email' => $this->string(255),
            'username' => $this->string(255),
        ], $tableOptions);

        $this->createIndex('account_unique', '{{%social_account}}', ['provider','client_id'], true);
        $this->createIndex('account_unique_code', '{{%social_account}}', 'code', true);

        $this->addForeignKey('fk_user_account', '{{%social_account}}', 'user_id', '{{%user}}', 'id');
    }

    public function safeDown()
    {
        $this->dropTable('{{%social_account}}');
    }
}
