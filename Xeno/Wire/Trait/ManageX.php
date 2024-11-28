<?php //*** ManageX ~ trait » Yale™ Library - Yet Another Laravel Elevator © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//

namespace Yale\Xeno\Wire\Trait;

use Yale\Xeno\Data\StringX;

trait ManageX
{
	// ◈ property
	protected $actionCountX;



	// ◈ === listingX »
	protected function listingX($record = [], $action = 'listing')
	{
		$this->setIfNotX('action', $action);
		$this->setActionCountX($action);
		$this->setWireRouteX($action);
		$this->setRecordX($record);
		if (!empty($this->moduleX)) {
			$this->setTitleX($this->moduleX);
			$this->setSloganX('list of ' . StringX::plural($this->moduleX));
		}
	}



	// ◈ === detailX »
	protected function detailX($record = [], $action = 'detail')
	{
		$this->setIfNotX('action', $action);
		$this->setActionCountX($action);
		$this->setWireRouteX($action);
		$this->setRecordX($record);
		if (!empty($this->moduleX)) {
			$this->setTitleX($this->moduleX);
			$this->setSloganX('review ' . $this->moduleX . 'details');
		}
	}



	// ◈ === createX »
	protected function createX($action = 'create')
	{
		$this->setIfNotX('action', $action);
		$this->setActionCountX($action);
		$this->setWireRouteX($action);
		$this->callMethodX('organizeX', $action);
		if (!empty($this->moduleX)) {
			$this->setTitleX($this->moduleX);
			$this->setSloganX('create new ' . $this->moduleX);
		}
	}



	// ◈ === updateX »
	protected function updateX($action = 'update')
	{
		$this->setIfNotX('action', $action);
		$this->setActionCountX($action);
		$this->setWireRouteX($action);
		$this->callMethodX('organizeX', $action);
		if (!empty($this->moduleX)) {
			$this->setTitleX($this->moduleX);
			$this->setSloganX('update ' . $this->moduleX);
		}
	}



	// ◈ === cloneX »
	protected function cloneX($action = 'clone')
	{
		$this->setIfNotX('action', $action);
		$this->setActionCountX($action);
		$this->setWireRouteX($action);
		$this->callMethodX('organizeX', $action);
		if (!empty($this->moduleX)) {
			$this->setTitleX($this->moduleX);
			$this->setSloganX('create as new ' . $this->moduleX);
		}
	}



	// ◈ === setViewAsX »
	protected function setViewAsX($view = 'manage')
	{
		if ($this->componentX !== 'dashboard') {
			$this->setViewX($view);
		} else {
			$this->setViewX('dashboard');
		}
	}

}//> end of trait ~ ManageX