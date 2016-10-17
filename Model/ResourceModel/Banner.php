<?php

namespace Atopt\Slider\Model\ResourceModel;

class Banner extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	protected function _construct()
	{
		$this->_init('atopt_slider_banner', 'banner_id');
	}
}