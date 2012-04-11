<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class AbcBar {

	public $Chars = array();

	public $Alphabet = array();

	public $TableName;

	public $ColumnName;

	//public function __construct($table_name, $column_name)
	public function __construct($params) {

		//$this -> TableName = $table_name;
		$this -> TableName = $params[table_name];

		//$this -> ColumnName = $column_name;
		$this -> ColumnName = $params[column_name];

		$this -> GetChars();

		$this -> PopulateAlphabetArray();

	}

	private function GetChars() {
		$CI = &get_instance();
		$CI -> load -> database();

		$sql = "SELECT DISTINCT LEFT(`" . $this -> ColumnName . "`, 1) as first_letter FROM `" . $this -> TableName . "`";
		$query = $CI -> db -> query($sql);

		if ($query -> num_rows() > 0) {
			foreach ($query->result() as $row) {
				$this -> Chars[] = strtoupper($row -> first_letter);
			}
		}
	}

	private function PopulateAlphabetArray() {

		$this -> Alphabet = range("A", "Z");

	}

	public function CreateAlphabetNavigationBar() {
		$CI = &get_instance();
		$CI -> load -> helper('url');

		foreach ($this->Alphabet as $letter) {

			if (in_array($letter, $this -> Chars)) {

				$navi[] = '<a href="' . base_url('/index.php/college/browse/' . $letter) . '" title="Sort links by the letter ' . $letter . '">' . $letter . '</a>';

			} else {

				$navi[] = $letter;

			}

		}

		return implode(" | ", $navi);

	}

}
?>