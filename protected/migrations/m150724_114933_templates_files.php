<?php

use yii\db\Schema;
use yii\db\Migration;

class m150724_114933_templates_files extends Migration
{
    public function up()
    {
        $this->createTable('templates_files', [
            'id' => Schema::TYPE_PK,
            'template_id' => Schema::TYPE_INTEGER,
            'filename' => Schema::TYPE_STRING . ' NOT NULL',
            'path' => Schema::TYPE_STRING . ' NOT NULL',
        ]);
        
        $this->createIndex('template_id', 'templates_files', 'template_id');
    }

    public function down()
    {
        $this->dropTable('templates_files');
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
