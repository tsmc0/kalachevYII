<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%org_service_used}}`.
 */
class m231115_052338_create_org_service_used_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%org_service_used}}', [
            'id' => $this->primaryKey(),
            'apart_id' => $this->integer()->defaultValue(1),
            'service_id' => $this->integer()->defaultValue(1),
            'used_total' => $this->string(),
            'start_date' => $this->date(),
            'end_date' => $this->date()
        ]);

        $this->createIndex(
            'dx-apart-id',
            'org_service_used',
            'apart_id'
        );

        $this->createIndex(
            'dx-service-id',
            'org_service_used',
            'service_id'
        );

        $this->addForeignKey(
            'fk-apart-id',
            'org_service_used',
            'apart_id',
            'apartament',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-service-id',
            'org_service_used',
            'service_id',
            'org_service',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-service-id', 'org_service_used');
        $this->dropForeignKey('fk-apart-id', 'org_service_used');

        $this->dropIndex('dx-service-id', 'org_service_used');
        $this->dropIndex('dx-apart-id', 'org_service_used');

        $this->dropTable('{{%org_service_used}}');
    }
}
