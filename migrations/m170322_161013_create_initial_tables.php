<?php

use yii\db\Migration;

class m170322_161013_create_initial_tables extends Migration
{
    public function up()
    {
        $this->createTable('player', [
            'id' => $this->primaryKey(11),
            'name' => $this->string(20)->unique(),
            'email' => $this->string(100)->unique(),
            'password' => $this->string(256),
            'active' => $this->boolean()->defaultValue(false),
            'cd' => $this->dateTime()->notNull(),
            'lld' => $this->dateTime()
        ]);
    }

    public function down()
    {
        echo "m170322_161013_create_initial_tables cannot be reverted.\n";

        return false;
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
