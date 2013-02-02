<?php

require_once dirname(__FILE__).'/../lib/affiliateGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/affiliateGeneratorHelper.class.php';

/**
 * affiliate actions.
 *
 * @package    stackend
 * @subpackage affiliate
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class affiliateActions extends autoAffiliateActions
{
	  public function executeListActivate()
  {
    $this->getRoute()->getObject()->activate();
 
    $this->redirect('stackend_affiliate');
  }
 
  public function executeListDeactivate()
  {
    $this->getRoute()->getObject()->deactivate();
 
    $this->redirect('stackend_affiliate');
  }
 
  public function executeBatchActivate(sfWebRequest $request)
  {
    $q = Doctrine_Query::create()
      ->from('StackendAffiliate a')
      ->whereIn('a.id', $request->getParameter('ids'));
 
    $affiliates = $q->execute();
 
    foreach ($affiliates as $affiliate)
    {
      $affiliate->activate();
    }
 
    $this->redirect('stackend_affiliate');
  }
 
  public function executeBatchDeactivate(sfWebRequest $request)
  {
    $q = Doctrine_Query::create()
      ->from('StackendAffiliate a')
      ->whereIn('a.id', $request->getParameter('ids'));
 
    $affiliates = $q->execute();
 
    foreach ($affiliates as $affiliate)
    {
      $affiliate->deactivate();
    }
 
    $this->redirect('stackend_affiliate');
  }
}
