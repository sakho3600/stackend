<?php

/**
 * StackendCategoryContribution
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    stackend
 * @subpackage model
 * @author     Thapelo Tsotetsi
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class StackendCategoryContribution extends BaseStackendCategoryContribution
{
	
public function getActiveJobs($max = 10)
{
  $q = $this->getActiveJobsQuery()
    ->limit($max);
 
  return $q->execute();
}
	

	
	
public function countActiveJobs()
{
  return $this->getActiveJobsQuery()->count();
}
	

public function getActiveJobsQuery()
{
  $q = Doctrine_Query::create()
    ->from('StackendContribution j')
    ->where('j.category_id = ?', $this->getId());
 
  return Doctrine_Core::getTable('StackendContribution')->addActiveJobsQuery($q);

	
}
}
