<?php
	/**
	 * The abstract QMenuGen class defined here is
	 * code-generated and contains options, events and methods scraped from the
	 * JQuery UI documentation Web site. It is not generated by the typical
	 * codegen process, but rather is generated periodically by the core QCubed
	 * team and checked in. However, the code to generate this file is
	 * in the assets/_core/php/_devetools/jquery_ui_gen/jq_control_gen.php file
	 * and you can regenerate the files if you need to.
	 *
	 * The comments in this file are taken from the JQuery UI site, so they do
	 * not always make sense with regard to QCubed. They are simply provided
	 * as reference. Note that this is very low-level code, and does not always
	 * update QCubed state variables. See the QMenuBase 
	 * file, which contains code to interface between this generated file and QCubed.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the QMenu class file.
	 *
	 */

	/* Custom event classes for this control */
	
	
	/**
	 * <div>Triggered when the menu loses
	 * 		focus.</div><ul><li><div><strong>event</strong></div> <div>Type:
	 * 		<a>Event</a></div> <div></div></li> <li><div><strong>ui</strong></div>
	 * 		<div>Type: <a>Object</a></div> <div></div>
	 * 		<ul><li><div><strong>item</strong></div> <div>Type: <a>jQuery</a></div>
	 * 		<div>The currently active menu item.</div></li></ul></li></ul>
	 */
	class QMenu_BlurEvent extends QJqUiEvent {
		const EventName = 'menublur';
	}
	/**
	 * <div>Triggered when the menu is
	 * 		created.</div><ul><li><div><strong>event</strong></div> <div>Type:
	 * 		<a>Event</a></div> <div></div></li> <li><div><strong>ui</strong></div>
	 * 		<div>Type: <a>Object</a></div> <div></div></li></ul>
	 */
	class QMenu_CreateEvent extends QJqUiEvent {
		const EventName = 'menucreate';
	}
	/**
	 * <div>Triggered when a menu gains focus or when any menu item is
	 * 		activated.</div><ul><li><div><strong>event</strong></div> <div>Type:
	 * 		<a>Event</a></div> <div></div></li> <li><div><strong>ui</strong></div>
	 * 		<div>Type: <a>Object</a></div> <div></div>
	 * 		<ul><li><div><strong>item</strong></div> <div>Type: <a>jQuery</a></div>
	 * 		<div>The currently active menu item.</div></li></ul></li></ul>
	 */
	class QMenu_FocusEvent extends QJqUiEvent {
		const EventName = 'menufocus';
	}
	/**
	 * <div>Triggered when a menu item is
	 * 		selected.</div><ul><li><div><strong>event</strong></div> <div>Type:
	 * 		<a>Event</a></div> <div></div></li> <li><div><strong>ui</strong></div>
	 * 		<div>Type: <a>Object</a></div> <div></div>
	 * 		<ul><li><div><strong>item</strong></div> <div>Type: <a>jQuery</a></div>
	 * 		<div>The currently active menu item.</div></li></ul></li></ul>
	 */
	class QMenu_SelectEvent extends QJqUiEvent {
		const EventName = 'menuselect';
	}

	/* Custom "property" event classes for this control */

	/**
	 * @property boolean $Disabled <div>Disables the menu if set to <code>true</code>.</div>
	 * @property mixed $Icons <div>Icons to use for submenus, matching an icon defined by the jQuery UI
	 * 		CSS Framework. 				<ul><li>submenu (string, default:
	 * 		"ui-icon-carat-1-e")</li></ul></div>
	 * @property string $Menus <div>Selector for the elements that serve as the menu container, including
	 * 		sub-menus.</div>
	 * @property mixed $Position <div>Identifies the position of submenus in relation to the associated
	 * 		parent menu item. The <code>of</code> option defaults to the parent menu
	 * 		item, but you can specify another element to position against. You can
	 * 		refer to the <a>jQuery UI Position</a> utility for more details about the
	 * 		various options.</div>
	 * @property string $Role <div>Customize the ARIA roles used for the menu and menu items. The default
	 * 		uses <code>"menuitem"</code> for items. Setting the <code>role</code>
	 * 		option to <code>"listbox"</code> will use <code>"option"</code> for items.
	 * 		If set to <code>null</code>, no roles will be set, which is useful if the
	 * 		menu is being controlled by another element that is maintaining
	 * 		focus.</div>
	 */

	class QMenuGen extends QPanel	{
		protected $strJavaScripts = __JQUERY_EFFECTS__;
		protected $strStyleSheets = __JQUERY_CSS__;
		/** @var boolean */
		protected $blnDisabled = null;
		/** @var mixed */
		protected $mixIcons = null;
		/** @var string */
		protected $strMenus = null;
		/** @var mixed */
		protected $mixPosition = null;
		/** @var string */
		protected $strRole = null;
		
		protected function makeJsProperty($strProp, $strKey) {
			$objValue = $this->$strProp;
			if (null === $objValue) {
				return '';
			}

			return $strKey . ': ' . JavaScriptHelper::toJsObject($objValue) . ', ';
		}

		protected function makeJqOptions() {
			$strJqOptions = '';
			$strJqOptions .= $this->makeJsProperty('Disabled', 'disabled');
			$strJqOptions .= $this->makeJsProperty('Icons', 'icons');
			$strJqOptions .= $this->makeJsProperty('Menus', 'menus');
			$strJqOptions .= $this->makeJsProperty('Position', 'position');
			$strJqOptions .= $this->makeJsProperty('Role', 'role');
			if ($strJqOptions) $strJqOptions = substr($strJqOptions, 0, -2);
			return $strJqOptions;
		}

		public function getJqSetupFunction() {
			return 'menu';
		}

		public function GetControlJavaScript() {
			return sprintf('jQuery("#%s").%s({%s})', $this->getJqControlId(), $this->getJqSetupFunction(), $this->makeJqOptions());
		}

		public function GetEndScript() {
			$str = '';
			if ($this->getJqControlId() !== $this->ControlId) {
				// #845: if the element receiving the jQuery UI events is different than this control
				// we need to clean-up the previously attached event handlers, so that they are not duplicated 
				// during the next ajax update which replaces this control.
				$str = sprintf('jQuery("#%s").off(); ', $this->getJqControlId());
			}
			return $str . $this->GetControlJavaScript() . '; ' . parent::GetEndScript();
		}
		
		/**
		 * Call a JQuery UI Method on the object. Takes variable number of arguments.
		 * 
		 * @param string $strMethodName the method name to call
		 * @internal param $mixed [optional] $mixParam1
		 * @internal param $mixed [optional] $mixParam2
		 */
		protected function CallJqUiMethod($strMethodName /*, ... */) {
			$args = func_get_args();

			$strArgs = JavaScriptHelper::toJsObject($args);
			$strJs = sprintf('jQuery("#%s").%s(%s)',
				$this->getJqControlId(),
				$this->getJqSetupFunction(),
				substr($strArgs, 1, strlen($strArgs)-2));	// params without brackets
			QApplication::ExecuteJavaScript($strJs);
		}


		/**
		 * <div>Removes focus from a menu, resets any active element styles and
		 * triggers the menu's <a><code>blur</code></a>
		 * event.</div><ul><li><div><strong>event</strong></div> <div>Type:
		 * <a>Event</a></div> <div>What triggered the menu to blur.</div></li></ul>
		 * @param $event
		 */
		public function Blur($event = null) {
			$this->CallJqUiMethod("blur", $event);
		}
		/**
		 * <div>Closes the currently active
		 * sub-menu.</div><ul><li><div><strong>event</strong></div> <div>Type:
		 * <a>Event</a></div> <div>What triggered the menu to
		 * collapse.</div></li></ul>
		 * @param $event
		 */
		public function Collapse($event = null) {
			$this->CallJqUiMethod("collapse", $event);
		}
		/**
		 * <div>Closes all open
		 * sub-menus.</div><ul><li><div><strong>event</strong></div> <div>Type:
		 * <a>Event</a></div> <div>What triggered the menu to collapse.</div></li>
		 * <li><div><strong>all</strong></div> <div>Type: <a>Boolean</a></div>
		 * <div>Indicates whether all sub-menus should be closed or only sub-menus
		 * below and including the menu that is or contains the target of the
		 * triggering event.</div></li></ul>
		 * @param $event
		 * @param $all
		 */
		public function CollapseAll($event = null, $all = null) {
			$this->CallJqUiMethod("collapseAll", $event, $all);
		}
		/**
		 * <div>Removes the menu functionality completely. This will return the
		 * element back to its pre-init state.</div><ul><li><div>This method does not
		 * accept any arguments.</div></li></ul>
		 */
		public function Destroy() {
			$this->CallJqUiMethod("destroy");
		}
		/**
		 * <div>Disables the menu.</div><ul><li><div>This method does not accept any
		 * arguments.</div></li></ul>
		 */
		public function Disable() {
			$this->CallJqUiMethod("disable");
		}
		/**
		 * <div>Enables the menu.</div><ul><li><div>This method does not accept any
		 * arguments.</div></li></ul>
		 */
		public function Enable() {
			$this->CallJqUiMethod("enable");
		}
		/**
		 * <div>Opens the sub-menu below the currently active item, if one
		 * exists.</div><ul><li><div><strong>event</strong></div> <div>Type:
		 * <a>Event</a></div> <div>What triggered the menu to expand.</div></li></ul>
		 * @param $event
		 */
		public function Expand($event = null) {
			$this->CallJqUiMethod("expand", $event);
		}
		/**
		 * <div>Activates a particular menu item, begins opening any sub-menu if
		 * present and triggers the menu's <a><code>focus</code></a>
		 * event.</div><ul><li><div><strong>event</strong></div> <div>Type:
		 * <a>Event</a></div> <div>What triggered the menu item to gain
		 * focus.</div></li> <li><div><strong>item</strong></div> <div>Type:
		 * <a>jQuery</a></div> <div>The menu item to focus/activate.</div></li></ul>
		 * @param $item
		 * @param $event
		 */
		public function Focus($event = null, $item) {
			$this->CallJqUiMethod("focus", $item, $event);
		}
		/**
		 * <div>Returns a boolean value stating whether or not the currently active
		 * item is the first item in the menu.</div><ul><li><div>This method does not
		 * accept any arguments.</div></li></ul>
		 */
		public function IsFirstItem() {
			$this->CallJqUiMethod("isFirstItem");
		}
		/**
		 * <div>Returns a boolean value stating whether or not the currently active
		 * item is the last item in the menu.</div><ul><li><div>This method does not
		 * accept any arguments.</div></li></ul>
		 */
		public function IsLastItem() {
			$this->CallJqUiMethod("isLastItem");
		}
		/**
		 * <div>Moves active state to next menu
		 * item.</div><ul><li><div><strong>event</strong></div> <div>Type:
		 * <a>Event</a></div> <div>What triggered the focus to move.</div></li></ul>
		 * @param $event
		 */
		public function Next($event = null) {
			$this->CallJqUiMethod("next", $event);
		}
		/**
		 * <div>Moves active state to first menu item below the bottom of a scrollable
		 * menu or the last item if not
		 * scrollable.</div><ul><li><div><strong>event</strong></div> <div>Type:
		 * <a>Event</a></div> <div>What triggered the focus to move.</div></li></ul>
		 * @param $event
		 */
		public function NextPage($event = null) {
			$this->CallJqUiMethod("nextPage", $event);
		}
		/**
		 * <div>Gets the value currently associated with the specified
		 * <code>optionName</code>.</div><ul><li><div><strong>optionName</strong></div>
		 * <div>Type: <a>String</a></div> <div>The name of the option to
		 * get.</div></li></ul>
		 * @param $optionName
		 */
		public function Option($optionName) {
			$this->CallJqUiMethod("option", $optionName);
		}
		/**
		 * <div>Gets an object containing key/value pairs representing the current
		 * menu options hash.</div><ul><li><div>This method does not accept any
		 * arguments.</div></li></ul>
		 */
		public function Option1() {
			$this->CallJqUiMethod("option");
		}
		/**
		 * <div>Sets the value of the menu option associated with the specified
		 * <code>optionName</code>.</div><ul><li><div><strong>optionName</strong></div>
		 * <div>Type: <a>String</a></div> <div>The name of the option to
		 * set.</div></li> <li><div><strong>value</strong></div> <div>Type:
		 * <a>Object</a></div> <div>A value to set for the option.</div></li></ul>
		 * @param $optionName
		 * @param $value
		 */
		public function Option2($optionName, $value) {
			$this->CallJqUiMethod("option", $optionName, $value);
		}
		/**
		 * <div>Sets one or more options for the
		 * menu.</div><ul><li><div><strong>options</strong></div> <div>Type:
		 * <a>Object</a></div> <div>A map of option-value pairs to
		 * set.</div></li></ul>
		 * @param $options
		 */
		public function Option3($options) {
			$this->CallJqUiMethod("option", $options);
		}
		/**
		 * <div>Moves active state to previous menu
		 * item.</div><ul><li><div><strong>event</strong></div> <div>Type:
		 * <a>Event</a></div> <div>What triggered the focus to move.</div></li></ul>
		 * @param $event
		 */
		public function Previous($event = null) {
			$this->CallJqUiMethod("previous", $event);
		}
		/**
		 * <div>Moves active state to first menu item above the top of a scrollable
		 * menu or the first item if not
		 * scrollable.</div><ul><li><div><strong>event</strong></div> <div>Type:
		 * <a>Event</a></div> <div>What triggered the focus to move.</div></li></ul>
		 * @param $event
		 */
		public function PreviousPage($event = null) {
			$this->CallJqUiMethod("previousPage", $event);
		}
		/**
		 * <div>Initializes sub-menus and menu items that have not already been
		 * initialized. New menu items, including sub-menus can be added to the menu
		 * or all of the contents of the menu can be replaced and then initialized
		 * with the <code>refresh()</code> method.</div><ul><li><div>This method does
		 * not accept any arguments.</div></li></ul>
		 */
		public function Refresh() {
			$this->CallJqUiMethod("refresh");
		}
		/**
		 * <div>Selects the currently active menu item, collapses all sub-menus and
		 * triggers the menu's <a><code>select</code></a>
		 * event.</div><ul><li><div><strong>event</strong></div> <div>Type:
		 * <a>Event</a></div> <div>What triggered the selection.</div></li></ul>
		 * @param $event
		 */
		public function Select($event = null) {
			$this->CallJqUiMethod("select", $event);
		}


		public function __get($strName) {
			switch ($strName) {
				case 'Disabled': return $this->blnDisabled;
				case 'Icons': return $this->mixIcons;
				case 'Menus': return $this->strMenus;
				case 'Position': return $this->mixPosition;
				case 'Role': return $this->strRole;
				default: 
					try { 
						return parent::__get($strName); 
					} catch (QCallerException $objExc) { 
						$objExc->IncrementOffset(); 
						throw $objExc; 
					}
			}
		}

		public function __set($strName, $mixValue) {
			switch ($strName) {
				case 'Disabled':
					try {
						$this->blnDisabled = QType::Cast($mixValue, QType::Boolean);
						if ($this->Rendered) {
							$this->CallJqUiMethod('option', 'disabled', $this->blnDisabled);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Icons':
					$this->mixIcons = $mixValue;
				
					if ($this->Rendered) {
						$this->CallJqUiMethod('option', 'icons', $mixValue);
					}
					break;

				case 'Menus':
					try {
						$this->strMenus = QType::Cast($mixValue, QType::String);
						if ($this->Rendered) {
							$this->CallJqUiMethod('option', 'menus', $this->strMenus);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Position':
					$this->mixPosition = $mixValue;
				
					if ($this->Rendered) {
						$this->CallJqUiMethod('option', 'position', $mixValue);
					}
					break;

				case 'Role':
					try {
						$this->strRole = QType::Cast($mixValue, QType::String);
						if ($this->Rendered) {
							$this->CallJqUiMethod('option', 'role', $this->strRole);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				case 'Enabled':
					$this->Disabled = !$mixValue;	// Tie in standard QCubed functionality
					parent::__set($strName, $mixValue);
					break;
					
				default:
					try {
						parent::__set($strName, $mixValue);
						break;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

?>
