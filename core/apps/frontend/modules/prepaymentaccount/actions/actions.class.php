<?php

/**
 * prepaymentaccount actions.
 *
 * @package    Gcross Accounting System
 * @subpackage prepaymentaccount
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class prepaymentaccountActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->prepayment_accounts = Doctrine_Core::getTable('PrepaymentAccount')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->prepayment_account = Doctrine_Core::getTable('PrepaymentAccount')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->prepayment_account);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PrepaymentAccountForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PrepaymentAccountForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($prepayment_account = Doctrine_Core::getTable('PrepaymentAccount')->find(array($request->getParameter('id'))), sprintf('Object prepayment_account does not exist (%s).', $request->getParameter('id')));
    $this->form = new PrepaymentAccountForm($prepayment_account);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($prepayment_account = Doctrine_Core::getTable('PrepaymentAccount')->find(array($request->getParameter('id'))), sprintf('Object prepayment_account does not exist (%s).', $request->getParameter('id')));
    $this->form = new PrepaymentAccountForm($prepayment_account);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($prepayment_account = Doctrine_Core::getTable('PrepaymentAccount')->find(array($request->getParameter('id'))), sprintf('Object prepayment_account does not exist (%s).', $request->getParameter('id')));
    $prepayment_account->delete();

    $this->redirect('prepaymentaccount/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $prepayment_account = $form->save();

      $this->redirect('prepaymentaccount/edit?id='.$prepayment_account->getId());
    }
  }
}
