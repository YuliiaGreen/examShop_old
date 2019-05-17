<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%categories}}`.
 */
class m190512_131129_create_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%categories}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(225)->notNull(),
            'body'=>$this->text()->notNull(),
            'image_id'=>$this->integer(),

            'status'=>$this->boolean()->defaultValue(0),
            'created_at' =>$this->bigInteger()->defaultValue(time()),
            'updated_at' =>$this->bigInteger(),
            'deleted_at' =>$this->bigInteger(),
            'seo' => $this->bigInteger(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%categories}}');
    }
}
