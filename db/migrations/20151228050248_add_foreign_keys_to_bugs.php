<?php

use Phinx\Migration\AbstractMigration;

class AddForeignKeysToBugs extends AbstractMigration
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
        $bugs->addColumn('assignedEngineer_id', 'integer');
        $bugs->addForeignKey('assignedEngineer_id', 'users', 'id',
                         array('delete'=> 'RESTRICT', 'update'=> 'RESTRICT'));
        $bugs->addColumn('reporter_id','integer');
        $bugs->addForeignKey('reporter_id', 'users', 'id',
                             array('delete'=> 'RESTRICT', 'update'=> 'RESTRICT'));
        $bugs->update();
    }

//    public function down()
//    {
//        $bugs = $this->table('bugs');
//        $bugs->dropForeignKey('reporter_id');
//        $bugs->removeColumn('reporter_id');
//        $bugs->dropForeignKey('assignedEngineer_id');
//        $bugs->removeColumn('assignedEngineer_id');
//        $bugs->save();
//    }
}
