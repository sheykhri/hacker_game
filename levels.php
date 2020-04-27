<?php

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
$text = strtolower($text);

if ($lvl == 1) {
	
	if ($bot->text('/start')) {
		$api->sendMessage(['text' => "<code>~bash@ $ >lvl 1\n~bash@ $ password:</code>", 'parse_mode' => 'html']);
		exit;
	} else {
		
		$answer = "~bash@ $ $text\n";
		
		if ($bot->text('ls')) {
			$answer .= "pass.txt";
		}
		
		elseif ($bot->text('ls -al')) {
			$answer .= "pass.txt info.txt";
		}
		
		elseif ($bot->text('cat pass.txt')) {
			$answer .=  "password: community";
		}
		
		elseif ($bot->text('cat info.txt')) {
			$answer .= "password in pass.txt";
		}
		
		elseif ($bot->text('community')) {
			$answer .= "~bash@ $ >lvl 1 passed!\n~bash@ $ >lvl 2";
			$insert = [
				'lvl' => '2',
				'chat_id' => $chat_id,
			];
			$db->update('users', $insert);
		}
		
		else {
			$answer .= "$text: command not found";
		}
		
		$api->sendMessage(['text' => "<code>$answer</code>", 'parse_mode' => 'html']);
		exit;
	}
}

if ($lvl == 2) {
	$api->sendMessage(['text' => "soon"]);

}

?>