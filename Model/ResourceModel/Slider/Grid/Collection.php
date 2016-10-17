<?php

namespace Atopt\Slider\Model\ResourceModel\Slider\Grid;

use Magento\Framework\Api\Search\SearchResultInterface;
use Magento\Framework\Search\AggregationInterface;
use Atopt\Slider\Model\ResourceModel\Slider\Collectoin as SliderCollection;
use Magento\Framework\Data\Collection;
use Atopt\Slider\Model\ResourceModel\Slider\Collectoin;

class Collection extends SliderCollection implements SearchResultInterface
{
	protected $aggregation;
	
	public function __construct($entityFactory, $logger, $fetcheStrategy, $eventManager, $storeManager, $stdTimezone, $mainTable, $eventPrefix, $eventObject, $resourceModel, $model, $connection, $resource){
		parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $storeManager, $stdTimezone);
		$this->_eventPrefix = $eventPrefix;
		$this->_eventObject = $eventObject;
		$this->_init($model, $resourceModel);
		$this->setMainTable($mainTable);
	}
	
	public function getAggregations()
	{
		return $this->aggregation;
	}
	
	public function setAggregations($aggregations)
	{
		$this->aggregation = $aggregations;
	}
	
	public function getAllIds($limit = null, $offset = null)
	{
		return $this->getConnection()->fetchCol($this->_getAllIdsSelect($limit,$offset), $this->_bindParams);
	}
	
	public function getSearchCriteria()
	{
		return null;
	}
	
	public function setSearchCriteria(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria = null)
	{
		return $this;
	}
	
	public function getTotalCount()
	{
		return $this->getSize();
	}
	
	public function setTotalCount($totalCount)
	{
		return $this;
	}
	
	public function setItems(array $items = null)
	{
		return $this;
	}
}