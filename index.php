<?php

require './vendor/config.php';
require './vendor/classes/BOT.php';
require './vendor/classes/PDO.php';

$bot = new BOT('1175401995:AAF_6ODjNMDAm7LfIHehJUFbrg9lOiSFNiQ');

$api = new API($bot);
$db = new DB();

$update = json_decode(file_get_contents('php://input'));
if (isset($update)) {
	
	if (isset($update->message->text)) {
		$message = $update->message;
		$message_date = $message->date;
		$chat_id = $message->chat->id;
		$from_id = $message->from->id;
		$message_id = $message->message_id;
		$text = $message->text;
		
		$bot->setText($text);
		$bot->setChatId($chat_id);
	}
	
}

/*
 YORDAM UCHUN

$db->search(['table' => 'nima kerakligi', 'where' => value]);

$insert = [
	'row' => 'new value',
	'where' => value,
];
$db->update('users', $insert);


$api->deleteMessage(['message_id' => $message_id]);

$api->sendMessage(['text' => 'Salom', 'parse_mode' => 'HTML']);

*/


	if ($lvl = $db->search(['users' => 'lvl', 'chat_id' => $chat_id])) {
	
		require './levels.php';
	
	} else {
	
		$db->insert('users', ['chat_id' => $chat_id]);
		// user bazada yo'q bo'lsa uni bazaga yozamiz
		$lvl = 1;
		require './levels.php';
	}
?>