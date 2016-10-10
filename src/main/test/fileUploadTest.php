<?php
require_once '../scripts/OmGateway.php';

$gw = new OmGateway(array(
		'protocol' => 'http',
		'host' => 'localhost',
		'port' => '5080',
		'context' => 'openmeetings',
		'user' => 'admin',
		'pass' => '12345',
		'module' => 'api_test' 
));
if ($gw->login()) {
	$res = $gw->createFile(
			array(
					"fileExplorerItemDTO" =>
					array('name' => "PHP API test image.jpg"
							//NOT SET in TEST , 'parentId' => : fileObj.parentId
							, 'roomId' => 5 // SET TO UPLOAD TO THE ROOM
							//SET TO UPLOAD TO USER PERSONAL FOLDER , 'ownerId' => $userId
							, 'type' => 'Image') //Possible values are: Folder, Image, PollChart, Presentation, Recording, Video, WmlFile
			)
			, '/tmp/image.jpg'
			);
	var_dump($res);
} else {
	die("Failed to login");
}

