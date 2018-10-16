<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tasks`.
 */
class m181015_215617_create_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tasks', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'description' => $this->string(255)->notNull(),
            'created' => $this->dateTime()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tasks');
    }
}
