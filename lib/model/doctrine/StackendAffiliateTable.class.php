<?php

/**
 * StackendAffiliateTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class StackendAffiliateTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object StackendAffiliateTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('StackendAffiliate');
    }

	public function countToBeActivated()
	{
		$q = $this->createQuery('a')
			->where('a.is_active = ?', 0);
 
		return $q->count();
	}
}
