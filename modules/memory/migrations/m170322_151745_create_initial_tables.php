<?php

use yii\db\Migration;

class m170322_151745_create_initial_tables extends Migration
{
    public function up()
    {
        $this->createTable('memory_game', [
            'id' => $this->primaryKey(11),
            'player_id' => $this->integer(11)->notNull(),
            'cd' => $this->dateTime()->notNull(),
            'fd' => $this->dateTime(),
            'seconds' => $this->integer(),
        ]);

        $this->createTable('memory_type', [
            'id' => $this->primaryKey(11),
            'name' => $this->string(50)->notNull()->unique(),
        ]);

        $this->createTable('memory_card', [
            'id' => $this->primaryKey(11),
            'filename' => $this->string(100)->notNull()->unique(),
            'type_id' => $this->integer(11)->notNull(),
        ]);

        $this->createIndex(
            'idx-memory_card-type_id',
            'memory_card',
            'type_id'
        );
    }

    public function down()
    {
        echo "m170322_151745_create_initial_tables cannot be reverted.\n";

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
