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
        $bugs = $this->table('bugs');
        $bugs->addColumn('description', 'text',   ['limit' => 20]);
        $bugs->addColumn('status',      'string', ['limit' => 20]);
        $bugs->addColumn('created',     'string', ['limit' => 20]);
        $bugs->addColumn('updated',     'string', ['limit' => 20]);
        $bugs->addIndex('status', ['unique' => false]);
        $bugs->save();
    }
}
