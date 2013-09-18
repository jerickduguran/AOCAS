<?php

/**
 * BaseUserRole
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $code
 * @property string $name
 * @property string $status
 * @property Doctrine_Collection $User
 * 
 * @method string              getCode()   Returns the current record's "code" value
 * @method string              getName()   Returns the current record's "name" value
 * @method string              getStatus() Returns the current record's "status" value
 * @method Doctrine_Collection getUser()   Returns the current record's "User" collection
 * @method UserRole            setCode()   Sets the current record's "code" value
 * @method UserRole            setName()   Sets the current record's "name" value
 * @method UserRole            setStatus() Sets the current record's "status" value
 * @method UserRole            setUser()   Sets the current record's "User" collection
 * 
 * @package    Gcross Accounting System
 * @subpackage model
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUserRole extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('user_role');
        $this->hasColumn('code', 'string', 3, array(
             'type' => 'string',
             'notnull' => true,
             'default' => 'PHP',
             'unique' => true,
             'length' => 3,
             ));
        $this->hasColumn('name', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('status', 'string', 15, array(
             'type' => 'string',
             'length' => 15,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('User', array(
             'local' => 'id',
             'foreign' => 'role_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}