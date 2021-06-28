<?php
namespace Forms\SacWidget;

class Interaction extends \Forms\Component {
	public $consignment = null;
	public $ip = null;
	public $number = null;
	public $referer = null;
	public $type = null;
	public $url = null;

	public function __construct() {
		$this->_table = 'sac_widget_interactions';
	}
}
