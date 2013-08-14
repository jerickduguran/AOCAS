<?php

/**
 * taxrate actions.
 *
 * @package    Gcross Accounting System
 * @subpackage taxrate
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class taxrateActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->taxrates = Doctrine_Core::getTable('Taxrate')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->taxrate = Doctrine_Core::getTable('Taxrate')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->taxrate);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TaxrateForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TaxrateForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($taxrate = Doctrine_Core::getTable('Taxrate')->find(array($request->getParameter('id'))), sprintf('Object taxrate does not exist (%s).', $request->getParameter('id')));
    $this->form = new TaxrateForm($taxrate);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($taxrate = Doctrine_Core::getTable('Taxrate')->find(array($request->getParameter('id'))), sprintf('Object taxrate does not exist (%s).', $request->getParameter('id')));
    $this->form = new TaxrateForm($taxrate);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($taxrate = Doctrine_Core::getTable('Taxrate')->find(array($request->getParameter('id'))), sprintf('Object taxrate does not exist (%s).', $request->getParameter('id')));
    $taxrate->delete();

    $this->redirect('taxrate/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $taxrate = $form->save();

      $this->redirect('taxrate/edit?id='.$taxrate->getId());
    }
  }
  
  public function  executeSave(sfWebRequest $request)
  {
	$return_array = array("success"=>false);
	$form = new TaxClassForm();
	$form->bind($request->getParameter($form->getName()),$request->getFiles($form->getName()));
	if($form->isValid()){
		$rate = $form->save();
		$rates					 = Doctrine_Core::getTable("TaxClass")->findAll(); 
		$options 				 = array('rates'=>$rates);
		$return_array['success'] = true; 
		$return_array['list']    = $this->getPartial("setup/taxratelist",$options);
	}
	return $this->renderText(json_encode($return_array));
  }
}
