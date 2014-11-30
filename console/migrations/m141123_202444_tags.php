<?php

use yii\db\Schema;
use yii\db\Migration;

class m141123_202444_tags extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tags}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%tag_product}}', [
            'tag_id' => Schema::TYPE_INTEGER,
            'product_id' => Schema::TYPE_INTEGER
        ], $tableOptions);

        $this->createIndex('FK_product', '{{%tag_product}}', 'product_id');
        $this->addForeignKey('FK_product_tag', '{{%tag_product}}', 'product_id', '{{%product}}', 'id', 'SET NULL', 'CASCADE');

        $this->createIndex('FK_tag', '{{%tag_product}}', 'tag_id');
        $this->addForeignKey('FK_tag_product', '{{%tag_product}}', 'tag_id', '{{%tags}}', 'id', 'SET NULL', 'CASCADE');

        $this->createIndex('FK_product_category', '{{%product}}', 'category_id');
        $this->addForeignKey('FK_product_category', '{{%product}}', 'category_id', '{{%category}}', 'id', 'SET NULL', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%tags}}');
        $this->dropTable('{{%tag_product}}');
    }
}
