<?php

	$gdbm = dba_open("scriptures.gdbm", "n", "gdbm");


	class ScripturesDB extends SQLite3 {

		function __construct() {

			$this->open('lds-scriptures-sqlite3.db');
		 }

	}

	$sqlite = new ScripturesDB();

	$arr_kjv = array();
	$arr_lds = array();

	$rs = $sqlite->query("SELECT volume_title, book_title, book_short_title, chapter_number, verse_number, verse_title, verse_short_title, scripture_text FROM scriptures ORDER BY verse_id;");

	while($arr = $rs->fetchArray(SQLITE3_ASSOC)) {

		if($arr['volume_title'] == 'Old Testament' || $arr['volume_title'] == 'New Testament')
			$arr_kjv[] = $arr;

		$arr_lds[] = $arr;

	}

	$json_kjv = json_encode($arr_kjv, JSON_PRETTY_PRINT);

	file_put_contents('kjv-scriptures-json.txt', $json_kjv);

	$json_lds = json_encode($arr_lds, JSON_PRETTY_PRINT);

	file_put_contents('lds-scriptures-json.txt', $json_lds);
