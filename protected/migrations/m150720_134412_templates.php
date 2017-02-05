<?php

use yii\db\Schema;
use yii\db\Migration;

class m150720_134412_templates extends Migration
{
    public function up()
    {
        $this->createTable('templates', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'schema' => Schema::TYPE_STRING . ' NOT NULL',
            'preview' => Schema::TYPE_STRING . ' NOT NULL',
            'template' => Schema::TYPE_TEXT . ' NOT NULL',
            'deleted' => Schema::TYPE_SMALLINT . ' DEFAULT 0',
        ]);
    }

    public function down()
    {
        $this->dropTable('templates');
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
