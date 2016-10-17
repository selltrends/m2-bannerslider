<?php

namespace Atopt\Slider\Model\ResourceModel\Value;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected function _construct()
	{
		$this->_init('Atopt\Slider\Model\Value', 'Atopt\Slider\Model\ResourceModel\Value');
	}
}