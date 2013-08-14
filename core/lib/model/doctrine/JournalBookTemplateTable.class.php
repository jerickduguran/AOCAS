<?php

/**
 * JournalBookTemplateTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class JournalBookTemplateTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object JournalBookTemplateTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('JournalBookTemplate');
    }
	
	public function getAllAsChoices()
	{
		$choices = array('');
		if($result = $this->createQuery()
				  ->select('id,name,code')
				  ->execute()){
				  
			foreach($result as $data){
				$choices[$data->getId()] = $data;
			}
		}
		return $choices;
	}
}