<?php

namespace Atopt\Slider\Model\Model\ResourceModel;

class Value extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	protected function _construct()
	{
		$this->_init('atopt_slider_value', 'value_id');
	}
}