<?php

use Phinx\Migration\AbstractMigration;

class CreateBugsTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $products = $this->table('bugs');
        $products->addColumn('description', 'text',   ['limit' => 20]);
        $products->addColumn('status',      'string', ['limit' => 20]);
        $products->addColumn('created',     'string', ['limit' => 20]);
        $products->addColumn('updated',     'string', ['limit' => 20]);
        $products->addIndex('status', ['unique' => false]);
        $products->save();
    }
}
