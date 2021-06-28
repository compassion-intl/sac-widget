<?php
namespace Forms;

class Component {
	public $id = null;
	protected $_table;

	public function create() {
		$db = forms_connect();
		$sql = "INSERT INTO `{$this->_table}` SET";
		$data = array();
		$values = array();

		foreach ( $this as $key => $value ) {
			if ( substr( $key, 0, 1 ) !== '_' && $value !== null ) {
				
				$data[$key] = $value;
				$values[':' . $key] = $value;
			}
		}

		$i = 0;

		foreach ( $data as $key => $value ) {
			if ( $i !== 0 ) $sql .= ',';

			$sql .= " `{$key}` = :$key";
			$i++;
		}

		$stmt = $db->prepare( $sql );

		if ( !$stmt ) {
			return false;
		}

		if ( !$stmt->execute( $values ) ) {
			return false;
		}

		return true;
	}
}
