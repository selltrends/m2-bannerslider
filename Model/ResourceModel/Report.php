<?php

namespace Atopt\Slider\Model\ResourceModel;

class Report extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	protected function _construct()
	{
		$this->_init('atopt_slider_report', 'report_id');
	}
}