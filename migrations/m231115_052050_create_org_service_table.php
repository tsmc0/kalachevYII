<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%org_service}}`.
 */
class m231115_052050_create_org_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%org_service}}', [
            'id' => $this->primaryKey(),
            'org_id' => $this->integer()->defaultValue(1),
            'service_id' => $this->integer()->defaultValue(1)
        ]);

        $this->createIndex('dx-orgid-d', 'org_service', 'org_id');
        $this->createIndex('dx-serid-d', 'org_service', 'service_id');

        $this->addForeignKey(
            'fk-orgid-dd',
            'org_service',
            'org_id',
            'organizations',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-serid-dd',
            'org_service',
            'service_id',
            'services',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-serid-dd', 'org_service');
        $this->dropForeignKey('fk-orgid-dd', 'org_service');
        $this->dropIndex('dx-serid-d', 'org_service');
        $this->dropIndex('dx-orgid-d', 'org_service');

        $this->dropTable('{{%org_service}}');
    }
}
