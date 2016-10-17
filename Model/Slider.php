<?php

namespace Atopt\Slider\Model;

use Magento\Framework\Model\AbstractModel;

class Slider extends \Magento\Framework\Model\AbstractModel
{
	const XML_CONFIG_BANNERSLIDER = 'bannerslider/general/enable_frontend';
	
	const SHOW_TITLE_YES = 1;
	const SHOW_TITLE_NO = 2;
	
	const STYLE_CONTENT_YES = 1;
	const STYLE_CONTENT_NO = 2;
	
	const SORT_TYPE_RANDOM = 1;
	const SORT_TYPE_ORDERLY = 2;
	
	const STYLESLIDE_EVOLUTION_ONE = 1;
	const STYLESLIDE_EVOLUTION_TWO = 2;
	const STYLESLIDE_EVOLUTION_THREE = 3;
	const STYLESLIDE_EVOLUTION_FOUR = 4;
	
	const STYLESLIDE_POPUP = 5;
	
	const STYLESLIDE_SPECIAL_NOTE = 6;
	
	const STYLESLIDE_FLEXSLIDER_ONE = 7;
	const STYLESLIDE_FLEXSLIDER_TWO = 8;
	const SYTLESLIDE_FLEXSLIDER_THREE = 9;
	const STYLESLIDE_FLEXSLIDER_FOUR = 10;
	
	const NOTE_POSITION_TOP_LEFT = 'top-left';
	const NOTE_POSITION_MIDDLE_TOP = 'middle-top';
	const NOTE_POSITION_TOP_RIGHT = 'top-right';
	const NOTE_POSITION_MIDDLE_LEFT = 'middle-left';
	const NOTE_POSITION_MIDDLE_RIGHT = 'middle-right';
	const NOTE_POSITION_BOTTOM_LEFT = 'bottom-left';
	const NOTE_POSITION_MIDDLE_BOTTOM = 'middle-bottom';
	const NOTE_POSITION_BOTTOM_RIGHT = 'bottom-right';
	
	protected $_bannerCollectionFactory;
	
	public function __construct(
			\Magento\Framework\Model\Context $context, 
			\Magento\Framework\Registry $registry,
			\Atopt\Slider\Model\ResourceModel\Banner\CollectionFactory $bannerCollectionFactory,
			\Atopt\Slider\Model\ResourceModel\Slider $resource,
			\Atopt\Slider\Model\ResourceModel\Slider\Collection $resourceCollection
			
	) {
		parent::__construct(
			$context, 
			$registry,
			$resource,
			$resourceCollection
		);
		$this->_bannerCollectionFactory = $bannerCollectionFactory;
	}
	
	public function getOwnBannerCollection()
	{
		return $this->_bannerCollectionFactory->create()->addFieldToFilter('slider_id', $this->getId());
	}
	
	public function getListPositionNotes()
	{
		return [
			self::NOTE_POSITION_TOP_LEFT,
			self::NOTE_POSITION_MIDDLE_TOP,
			self::NOTE_POSITION_TOP_RIGHT,
			self::NOTE_POSITION_MIDDLE_LEFT,
			self::NOTE_POSITION_MIDDLE_RIGHT,
			self::NOTE_POSITION_BOTTOM_LEFT,
			self::NOTE_POSITION_MIDDLE_BOTTOM,
			self::NOTE_POSITION_BOTTOM_RIGHT,
		];
	}
	
	public function getPositionNoteCode()
	{
		$listPositionNotes = $this->getListPostionNotes();
		if(!isset($listPositionNotes[$this->getPostionNote()])) {
			return self::NOTE_POSITION_TOP_LEFT;
		}
		
		return $listPositionNotes[$this->getPositionNoteCode()];
	}
	
	public function getPositionNoteOptions()
	{
		$listPositionNotes = $this->getListPositionNotes();
		$option = [];
		foreach ($listPositionNotes as $key => $positionNote) {
			list($label, $value) = explode('-', $positionNote);
			if (isset($label) && isset($value)) {
				$option[] = ['label' => ucfirst($label).'-'.ucfirst($value), 'value' => $key];
			}
		}
		return $option;
	}
	
}