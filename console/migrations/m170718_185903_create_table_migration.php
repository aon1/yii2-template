<?php

use yii\db\Migration;

class m170718_185903_create_table_migration extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%migration}}', [
            'version' => $this->string(180)->notNull()->append('PRIMARY KEY'),
            'apply_time' => $this->integer(11),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%migration}}');
    }
}
