<?php
//main DB
$db = new SQLite3('./.db.db');
//Call DNSs
$res = $db->query('SELECT * FROM dns'); 
$rows = array();
while ($row = $res->fetchArray(SQLITE3_ASSOC)) {
	$rows[] = $row['url'];
}
$dns = rtrim(implode(',', $rows), ',');
if ($_GET['action'] == "dns") {
	echo "{\"status\":true,\"su\":\"$dns\",\"sc\":\"\",\"ndd\":\"\"}";
}
//Call Notes
$note = $db->query('SELECT * FROM notifications');
while ($notes = $note -> fetchArray(SQLITE3_ASSOC)) {
	$data[]=array(
		"Title" => $notes['Title'],
		"Description" => $notes['Description'],
		"CreateDate" => $notes['CreateDate']
		);
}
$jdata = json_encode($data);
if ($_GET['action'] == "note") {
	echo "{\"status\":true,
			\"response\":
			$jdata
			}";
}
?>