<?php

use yii\db\Schema;
use yii\db\Migration;

class m150729_133853_sites_files extends Migration
{
    public function up()
    {
        $this->createTable('sites_files', [
            'id' => Schema::TYPE_PK,
            'site_id' => Schema::TYPE_INTEGER,
            'tmp_site_id' => Schema::TYPE_STRING . ' NOT NULL',
            'filename' => Schema::TYPE_STRING . ' NOT NULL',
            'path' => Schema::TYPE_STRING . ' NOT NULL',
        ]);
        
        $this->createIndex('site_id', 'sites_files', 'site_id');
    }

    public function down()
    {
        $this->dropTable('sites_files');
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
