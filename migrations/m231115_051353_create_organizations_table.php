<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%organizations}}`.
 */
class m231115_051353_create_organizations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%organizations}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'm_num' => $this->integer(),
            'telephone' => $this->string(16)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%organizations}}');
    }
}
