<?php

	namespace App\HTMLItems;

	/**
	 * Class HTMLElement
	 * @property string id
	 * @property string class
	 * @property string accesskey
	 * @property string contenteditable
	 * @property string contextmenu
	 * @property string dir
	 * @property string hidden
	 * @property string lang
	 * @property string spellcheck
	 * @property string style
	 * @property string tabindex
	 * @property string title
	 * @property string xmllang
	 *
	 * @property string onblur
	 * @property string onchange
	 * @property string onclick
	 * @property string ondblclick
	 * @property string onfocus
	 * @property string onkeydown
	 * @property string onkeypress
	 * @property string onkeyup
	 * @property string onload
	 * @property string onmousedown
	 * @property string onmousemove
	 * @property string onmouseout
	 * @property string onmouseover
	 * @property string onmouseup
	 * @property string onreset
	 * @property string onselect
	 * @property string onsubmit
	 * @property string onunload
	 *
	 * @package App\HTMLItems
	 */
	abstract class HTMLElement
	{
		/**
		 * @var string Tag
		 */
		protected $tag;

		/**
		 * @var bool Shows if need close tag
		 */
		protected $needClose = true;

		/**
		 * @var array Data contains info about additional properties of current tag
		 */
		protected $attributes = [];

		/**
		 * @var string data, showed by element
		 */
		protected $data;

		/**
		 * @var HTMLElement Includes parent element
		 */
		protected $internalElement;

		/**
		 * @param HTMLElement|null $element
		 * @param string $data
		 * @param array $attributes
		 */
		public function __construct($element = null, $data = "", $attributes = [])
		{
			$this->internalElement = $element;
			$this->data = $data;
			$this->attributes = $attributes;
		}

		/**
		 * @param string $name
		 * @return string | null
		 */
		public function __get($name)
		{
			return isset($this->data[$name]) ? $this->data[$name] : null;
		}


		/**
		 * @param string $name
		 * @param string $value
		 */
		public function __set($name, $value)
		{
			if($name == "xmllang") $name = "xml:lang";
			$this->attributes[$name] = $value;
		}

		/**
		 * @return bool
		 */
		public function needClose()
		{
			return $this->needClose;
		}

		/**
		 * @param $needClose
		 */
		public function setNeedClose($needClose)
		{
			$this->needClose = $needClose;
		}


		/**
		 * @param string $data
		 * @return HTMLElement
		 */
		public function addDataAfter($data)
		{
			$this->data .= $data;
			return $this;
		}

		/**
		 * @param string $data
		 * @return HTMLElement
		 */
		public function addDataBefore($data)
		{
			$this->data = $data . $this->data;
			return $this;
		}

		/**
		 * @return string
		 */
		protected function parseAttributes()
		{
			$attributesString = "";

			foreach ($this->attributes as $attribute => $value)
			{
				$attributesString .= $attribute . "=" . "\"" . e($value) . "\" ";
			}


			return $attributesString;
		}

		/**
		 * @return string
		 */
		protected function parse()
		{
			$attr = $this->parseAttributes();

			$tag = $this->tag;

			$data =
				($this->internalElement != null)
					? (string) $this->internalElement->addDataAfter($this->data)
					: $this->data;

			$closeTag = ($this->needClose()) ? "</" . $this->tag . ">" : "";

			$htmlString = "<" . $tag . " " . $attr . ">" . $data . $closeTag;

			return $htmlString;
		}

		/**
		 * @return string
		 */
		public function __toString()
		{
			return $this->parse();
		}


	}