<?php

/**
 * StackendCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    stackend
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class StackendCategory extends BaseStackendCategory
{
	public function getActiveJobs($max = 10)
	{
		$q = $this->getActiveJobsQuery()
			->limit($max);
 
		return $q->execute();
	}
	
	public function getActiveJobsQuery()
	{
		$q = Doctrine_Query::create()
			->from('StackendJob j')
			->where('j.category_id = ?', $this->getId());
 
		return Doctrine_Core::getTable('StackendJob')->addActiveJobsQuery($q);
	}

	public function countActiveJobs()
	{
		return $this->getActiveJobsQuery()->count();
	}

	public function getLatestPost()
	{
		return $this->getActiveJobs(1)->getFirst();
	}
}
