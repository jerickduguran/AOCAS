<?php

/**
 * user actions.
 *
 * @package    Gcross Accounting System
 * @subpackage user
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{

 const TEST_USER 	 =  'gfire.testuser';
 const TEST_PASSWORD =  'gfire.passme';
 const TEST_FULLNAME =  'John Doe';
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  
  
  public function executeLogin(sfWebRequest $request)
  {
	// Temporary users

	

  }
  
  public function executeLoginpost(sfWebRequest $request)
  {
	// Temporary users
	$username = $request->getParameter('username',false);
	$password = $request->getParameter('password',false);
	
	$user_obj = $this->getUser();
	
	if($user_obj->isAuthenticated()){		
		$this->redirect("@dashboard");
	}
	
	if($username == self::TEST_USER && self::TEST_PASSWORD){
		$user_obj->setAuthenticated(true);
		$user_obj->setName(self::TEST_FULLNAME);
		$this->redirect("@dashboard");
	}  
	
	$user_obj->setFlash('error',"Invalid Username/Password");
	$this->setTemplate("login");
  }
  
  public function executeLogout(sfWebRequest $request)
  {
	$user_obj = $this->getUser();
	$user_obj->setAuthenticated(false);
	$user_obj->getAttributeHolder()->remove('name');
	$this->redirect("@login");
	
  }
  
}
