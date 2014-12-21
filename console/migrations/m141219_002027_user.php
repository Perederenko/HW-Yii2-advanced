<?php

use yii\db\Schema;
use yii\db\Migration;

class m141219_002027_user extends Migration
{
    public function up()
    {
        $this->alterColumn('tbl_user', 'role', 'string');
    }

    public function down()
    {
        return false;
    }
}
