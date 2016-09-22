<?php

namespace Atopt\Slider\Model\Config\Source;

class Slider implements \Magento\Framework\Option\ArrayInterface
{
	protected $sliderFactory;
	
	public function __construct(
		\Atopt\Slider\Model\SliderFactory $sliderFactory		
	) {
		$this->sliderFactory = $sliderFactory;
	}
	
	public function getSlider()
	{
		$sliderModel = $this->sliderFactory->create();
		return $sliderModel->getCollection()->getData();
	}
	
	public function toOptionArray()
	{
		$sliders = [];
		foreach ($this->getSlider() as $slider){
			array_push($sliders, [
				'vallue' => $slider['slider_id'],
				'label' => $slider['title']
			]);
		}
		
		return $sliders;
	}
}