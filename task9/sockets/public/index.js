(function() {
	var $nameInput = $("#nameInput"),
		$messages = $("#messages"),
		$text = $("#text"),
		$messageSubmit = $("#messageSubmit");
	
	var userName = "User1";
	var socket = io.connect();
	
	$messageSubmit.on('click', function() {

		if ($text.val() === "")
			return;

		if ($nameInput.val() != "")
			userName = $nameInput.val();
		
		var data = {
			name: userName,
			text: $text.val(),
		};

		$text.empty();
		socket.emit("chat message", data);
	});

	socket.on("chat history", function(msg) {
			for (var i in msg) {
				if (msg.hasOwnProperty(i)) {
					$messages.append($('<li>').text(msg[i].name + ': ' + msg[i].text));	
				}
			}
	});

	socket.on("chat message", function(msg) {
			$messages.append($('<li>').text(msg.name + ': ' + msg.text));	
	});

})();