<?php

/**
 * BaseUserPositions
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $code
 * @property string $title
 * @property Doctrine_Collection $Users
 * 
 * @method string              getCode()  Returns the current record's "code" value
 * @method string              getTitle() Returns the current record's "title" value
 * @method Doctrine_Collection getUsers() Returns the current record's "Users" collection
 * @method UserPositions       setCode()  Sets the current record's "code" value
 * @method UserPositions       setTitle() Sets the current record's "title" value
 * @method UserPositions       setUsers() Sets the current record's "Users" collection
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
        $this->hasColumn('code', 'string', 3, array(
             'type' => 'string',
             'notnull' => true,
             'default' => 'PHP',
             'unique' => true,
             'length' => 3,
             ));
        $this->hasColumn('title', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Users', array(
             'local' => 'id',
             'foreign' => 'position_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}