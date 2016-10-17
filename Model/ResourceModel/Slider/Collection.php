<?php

namespace Atopt\Slider\Model\ResourceModel\Slider;

use Magento\Framework\Data\Collection;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collectoin extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'slider_id';
	
	protected $_storeViewId = null;
	
	protected $_storeManager;
	
	protected $_addedTable = [];
	
	protected $_isLoadSliderTitle = FALSE;
	
	protected $_stdTimezone;
	
	protected function _construct()
	{
		$this->_init('Atopt\Slider\Model\Slider', 'Atopt\Slider\Model\ResourceModel\Slider');
	}
	
	public function __construct(
		\Mangento\Framework\Data\Collection\EntityFactoryInterface $entityFactory,
		\Psr\Log\LoggerInterface $logger,
		\Magento\Framework\Data\Collection\Db\FetchStrategyInterface $fetchStrategy,
		\Magento\Framework\Event\ManagerInterface $eventManager,
		\Magento\Store\Model\StoreManagerInterface $storeManager,
		\Magento\Framework\Stdlib\DateTime\Timezone $stdTimezone,
		$connection = null,
		\Magento\Framework\Model\ResourceModel\Db\AbstractDb $resource = null
	){
		parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $connection, $resoure);
		$this->_storeManager = $storeManager;
		$this->_stdTimezone = $stdTimezone;
	}
}