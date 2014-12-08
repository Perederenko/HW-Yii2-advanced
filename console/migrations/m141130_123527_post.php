<?php

use yii\db\Schema;
use yii\db\Migration;

class m141130_123527_post extends Migration
{
    public function up()
    {
        $this->createTable('{{%post}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'anons' => Schema::TYPE_TEXT . ' NOT NULL',
            'content' => Schema::TYPE_TEXT . ' NOT NULL',
            'publish_date' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%post}}');
    }
}
