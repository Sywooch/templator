<?php

use yii\db\Schema;
use yii\db\Migration;

class m150723_150602_templates_fields extends Migration
{
    public function up()
    {
        $this->createTable('templates_fields', [
            'id' => Schema::TYPE_PK,
            'template_id' => Schema::TYPE_INTEGER,
            'variable' => Schema::TYPE_STRING . ' NOT NULL',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'type' => Schema::TYPE_STRING . ' NOT NULL',
            'default_value' => Schema::TYPE_TEXT . ' NOT NULL',
            'template_value' => Schema::TYPE_TEXT . ' NOT NULL',
        ]);
        
        $this->createIndex('template_id', 'templates_fields', 'template_id');
    }

    public function down()
    {
        $this->dropTable('templates_fields');
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
