<?php

namespace Atopt\Slider\Model\ResourceModel;

class Slider extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	protected function _construct()
	{
		$this->_init('atopt_slider_slider', 'slider_id');
	}
}