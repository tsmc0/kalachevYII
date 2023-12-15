<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%resident}}`.
 */
class m231115_051544_create_resident_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%resident}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'lastname' => $this->string(),
            'fathername' => $this->string()->null(),
            'telephone' => $this->string(16),
            'apartament_id' => $this->integer()
        ]);

        $this->createIndex('sx-apart-id', 'resident', 'apartament_id');

        $this->addForeignKey(
            'fk-aps-id',
            'resident',
            'apartament_id',
            'apartament',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-aps-id', 'resident');
        $this->dropIndex('sx-apart-id', 'resident');

        $this->dropTable('{{%resident}}');
    }
}
