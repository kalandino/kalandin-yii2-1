<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tasks`.
 */
class m181018_000108_create_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tasks', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'date' => $this->dateTime()->notNull(),
            'description' => $this->text(),
            'user_id' => $this->integer()
        ]);

        $this->addForeignKey('fk_tasks_users', 'tasks', 'user_id', 'users', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tasks');
    }
}
