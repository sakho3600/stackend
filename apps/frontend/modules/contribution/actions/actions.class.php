<?php

/**
 * contribution actions.
 *
 * @package    stackend
 * @subpackage contribution
 * @author     Thapelo Tsotetsi
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contributionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  //  $this->stackend_contributions = Doctrine_Core::getTable('StackendContribution')
   //   ->createQuery('a')
    //  ->execute();
     		
	//$this->stackend_contributions = Doctrine_Core::getTable('StackendContribution')->getActiveJobs();
	$this->categories = Doctrine_Core::getTable('StackendCategoryContribution')->getWithJobs();
	
  
  }

  public function executeShow(sfWebRequest $request)
  {

    $this->contribution = $this->getRoute()->getObject();

  }

  public function executeNew(sfWebRequest $request)
  {
    $contribution =new StackendContribution();
    $contribution->setType('');
    $this->form = new StackendContributionForm($contribution);
  }

  public function executeCreate(sfWebRequest $request)
  {

    $this->form = new StackendContributionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    
    $this->form = new StackendContributionForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    
    $this->form = new StackendContributionForm($this->getRoute()->getObject());

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $stackend_contribution = $this->getRoute()->getObject();

    $stackend_contribution->delete();

    $this->redirect('contribution/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind(
      $request->getParameter($form->getName()), 
      $request->getFiles($form->getName()));

    if ($form->isValid())
    {
      $stackend_contribution = $form->save();

      $this->redirect('contribution_show', $stackend_contribution);
    }
  }

public function executePublish(sfWebRequest $request)
{
  $request->checkCSRFProtection();
 
  $contribution = $this->getRoute()->getObject();
  $contribution->publish();
 
  $this->getUser()->setFlash('notice', sprintf('Your job is now online for %s days.', sfConfig::get('app_active_days')));
 
  $this->redirect('contribution_show_user', $contribution);
}
}
