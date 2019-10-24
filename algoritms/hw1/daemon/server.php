<?php
$host = 'localhost'; //host
$port = '9000'; //port
$null = NULL; //null var
$messagesStorage = new \SplQueue();

//Create TCP/IP sream socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
//reuseable port
socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1);

//bind socket to specified host
socket_bind($socket, 0, $port);

//listen to port
socket_listen($socket);

//create & add listning socket to the list
$clients = array($socket);

//start endless loop, so that our script doesn't stop
while (true) {
	//manage multipal connections
	$changed = $clients;
	//returns the socket resources in $changed array
	socket_select($changed, $null, $null, 0, 10);

	//check for new socket
	if (in_array($socket, $changed)) {
		$socketNew = socket_accept($socket); //accpet new socket
		$clients[] = $socketNew; //add socket to client array

		$header = socket_read($socketNew, 1024); //read data sent by the socket
		performHandshaking($header, $socketNew, $host, $port); //perform websocket handshake

		socket_getpeername($socketNew, $ip); //get ip address of connected socket

		//make room for new socket
		$foundSocket = array_search($socket, $changed);
		unset($changed[$foundSocket]);
	}

	//loop through all connected sockets
	foreach ($changed as $changedSocket) {

		//check for any incomming data
		while(socket_recv($changedSocket, $buf, 1024, 0) >= 1)
		{
			$receivedText = unmask($buf);
			$requestData = json_decode($receivedText);
			var_dump('Received: ' . $receivedText);

			if ($requestData->action == 'get') {
			    $responseText = mask(json_encode(array('message' => !$messagesStorage->isEmpty() ? $messagesStorage->dequeue() : 'No messages...')));
			    var_dump('Send: ' . $responseText);
			    sendMessage($responseText);
			} elseif ($requestData->action == 'add') {
			    $message = $requestData->message;
			    var_dump('Add: ' . $message);
			    $messagesStorage->push($message);
			}

			break 2;
		}

		$buf = @socket_read($changedSocket, 1024, PHP_NORMAL_READ);
		if ($buf === false) {
			// remove client for $clients array
			$foundSocket = array_search($changedSocket, $clients);
			socket_getpeername($changedSocket, $ip);
			unset($clients[$foundSocket]);
		}
	}
}
// close the listening socket
socket_close($socket);

function sendMessage($msg)
{
	global $clients;
	foreach($clients as $changedSocket)
	{
		@socket_write($changedSocket,$msg,strlen($msg));
	}
	return true;
}


//Unmask incoming framed message
function unmask($text) {
	$length = ord($text[1]) & 127;
	if($length == 126) {
		$masks = substr($text, 4, 4);
		$data = substr($text, 8);
	}
	elseif($length == 127) {
		$masks = substr($text, 10, 4);
		$data = substr($text, 14);
	}
	else {
		$masks = substr($text, 2, 4);
		$data = substr($text, 6);
	}
	$text = "";
	for ($i = 0; $i < strlen($data); ++$i) {
		$text .= $data[$i] ^ $masks[$i%4];
	}
	return $text;
}

//Encode message for transfer to client.
function mask($text)
{
	$b1 = 0x80 | (0x1 & 0x0f);
	$length = strlen($text);

	if($length <= 125)
		$header = pack('CC', $b1, $length);
	elseif($length > 125 && $length < 65536)
		$header = pack('CCn', $b1, 126, $length);
	elseif($length >= 65536)
		$header = pack('CCNN', $b1, 127, $length);
	return $header.$text;
}

//handshake new client.
function performHandshaking($recevedHeader,$clientConn, $host, $port)
{
	$headers = array();
	$lines = preg_split("/\r\n/", $recevedHeader);
	foreach($lines as $line)
	{
		$line = chop($line);
		if(preg_match('/\A(\S+): (.*)\z/', $line, $matches))
		{
			$headers[$matches[1]] = $matches[2];
		}
	}

	$secKey = $headers['Sec-WebSocket-Key'];
	$secAccept = base64_encode(pack('H*', sha1($secKey . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11')));
	//hand shaking header
	$upgrade  = "HTTP/1.1 101 Web Socket Protocol Handshake\r\n" .
	"Upgrade: websocket\r\n" .
	"Connection: Upgrade\r\n" .
	"WebSocket-Origin: $host\r\n" .
	"WebSocket-Location: ws://$host:$port/demo/shout.php\r\n".
	"Sec-WebSocket-Accept:$secAccept\r\n\r\n";
	socket_write($clientConn,$upgrade,strlen($upgrade));
}
