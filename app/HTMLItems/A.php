<?php

	namespace App\HTMLItems;


	/**
	 * Class A
	 * @package App\HTMLItems
	 * @property string href
	 * @property string name
	 * @property string coords
	 * @property string hreflang
	 * @property string rel
	 * @property string rev
	 * @property string shape
	 * @property string type
	 */
	class A extends HTMLElement
	{
		protected $tag = "a";
		protected $needClose = true;

		/**
		 * A constructor.
		 * @param string $href
		 * @param HTMLElement $element
		 * @param string $data
		 * @param array $attributes
		 */
		public function __construct($href = "", $element, $data = "", $attributes = [])
		{
			parent::__construct($element, $data, $attributes);

			$this->href = $href;
		}
	}