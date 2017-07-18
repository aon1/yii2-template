<?php

use yii\db\Migration;

class m170718_185903_create_table_token extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%token}}', [
            'user_id' => $this->integer(11)->notNull(),
            'code' => $this->string(32)->notNull(),
            'created_at' => $this->integer(11)->notNull(),
            'type' => $this->smallInteger(6)->notNull(),
        ], $tableOptions);

        $this->addPrimaryKey('primary_key', '{{%token}}', ['user_id','code','type']);

        $this->createIndex('token_unique', '{{%token}}', ['user_id','code','type'], true);

        $this->addForeignKey('fk_user_token', '{{%token}}', 'user_id', '{{%user}}', 'id');
    }

    public function safeDown()
    {
        $this->dropTable('{{%token}}');
    }
}
