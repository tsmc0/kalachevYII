<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%house}}`.
 */
class m231115_051512_create_house_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%house}}', [
            'id' => $this->primaryKey(),
            'address' => $this->string(),
            'total_aparts' => $this->integer(),
            'managament_org' => $this->integer()->defaultValue(1)
        ]);

        $this->createIndex('dx-manorg', 'house', 'managament_org');

        $this->addForeignKey(
            'fk-manorg',
            'house',
            'managament_org',
            'organizations',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-manorg', 'house');
        $this->dropIndex('dx-manorg', 'house');

        $this->dropTable('{{%house}}');
    }
}
