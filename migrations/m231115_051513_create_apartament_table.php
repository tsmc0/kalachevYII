<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%apartament}}`.
 */
class m231115_051513_create_apartament_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%apartament}}', [
            'id' => $this->primaryKey(),
            'house_id' => $this->integer()->defaultValue(1),
            'rooms_count' => $this->integer()->defaultValue(1),
            'real_number' => $this->integer()
        ]);

        $this->createIndex('fk-hh-id', 'apartament', 'house_id');

        $this->addForeignKey(
            'fk-hid',
            'apartament',
            'house_id',
            'house',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-hid', 'apartament');
        $this->dropIndex('fk-hh-id', 'apartament');

        $this->dropTable('{{%apartament}}');
    }
}
