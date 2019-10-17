<!DOCTYPE html>
<html>
<head>
<meta content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container">
    <div class="status"></div>
    <button id="get-message">Get first message</button>
    <div class="message"></div>
</div class="container">

<input type="text" class="text-message" style="margin-top: 100px">
<button id="send-message">Send message</button>
</body>
</div>
</div>

<script>
    let statusEl = document.querySelector('.status');
    let messageEl = document.querySelector('.message');
    let newMessageTextEl = document.querySelector('.text-message');

	var wsUri = "ws://localhost:9000/demo/server.php";
	websocket = new WebSocket(wsUri);

	websocket.onopen = function(ev) {
		statusEl.innerText = 'Connection is open!';
	}

	websocket.onmessage = function(ev) {
		let response = JSON.parse(ev.data);
        console.log(response);
		messageEl.innerText = response.message;
	};

	websocket.onerror	= function(ev){ statusEl.innerText = 'Error Occurred - ' + ev.data; };
	websocket.onclose 	= function(ev){ statusEl.innerText = 'Connection Closed'; };

	document.querySelector('#get-message').addEventListener('click', ()=>{
	    getMessage();
	});

	document.querySelector('#send-message').addEventListener('click', ()=>{
	    sendMessage();
	});

	function getMessage(){
		data = {'action': 'get'}
		websocket.send(JSON.stringify(data));
	}

	function sendMessage(){
	    let message = newMessageTextEl.value;
		data = {'action': 'add',
		        'message': message}
		websocket.send(JSON.stringify(data));
		newMessageTextEl.value = '';
	}
</script>
</body>
</html>
