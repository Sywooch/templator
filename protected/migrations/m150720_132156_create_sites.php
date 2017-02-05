<?php

use yii\db\Schema;
use yii\db\Migration;

class m150720_132156_create_sites extends Migration
{
    public function up()
    {
        $this->createTable('sites', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'url' => Schema::TYPE_STRING . ' NOT NULL',
            'content' => Schema::TYPE_TEXT,
            'template_id' => Schema::TYPE_INTEGER . ' DEFAULT 0',
        ]);
    }

    public function down()
    {
        $this->dropTable('sites');
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
