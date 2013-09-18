<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('UserPositions', 'doctrine');

/**
 * BaseUserPositions
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $code
 * @property string $title
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property Doctrine_Collection $Users
 * 
 * @method integer             getId()         Returns the current record's "id" value
 * @method string              getCode()       Returns the current record's "code" value
 * @method string              getTitle()      Returns the current record's "title" value
 * @method timestamp           getCreatedAt()  Returns the current record's "created_at" value
 * @method timestamp           getUpdatedAt()  Returns the current record's "updated_at" value
 * @method Doctrine_Collection getUsers()      Returns the current record's "Users" collection
 * @method UserPositions       setId()         Sets the current record's "id" value
 * @method UserPositions       setCode()       Sets the current record's "code" value
 * @method UserPositions       setTitle()      Sets the current record's "title" value
 * @method UserPositions       setCreatedAt()  Sets the current record's "created_at" value
 * @method UserPositions       setUpdatedAt()  Sets the current record's "updated_at" value
 * @method UserPositions       setUsers()      Sets the current record's "Users" collection
 * 
 * @package    Gcross Accounting System
 * @subpackage model
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUserPositions extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('user_positions');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('code', 'string', 3, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => 'PHP',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 3,
             ));
        $this->hasColumn('title', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Users', array(
             'local' => 'id',
             'foreign' => 'position_id'));
    }
}