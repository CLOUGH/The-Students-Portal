$(function(){
	$(".message").click(function(e){		
		var messageBody = $(this).data("message-body")
		  , messageUser = $(this).children(".message-user-name").text()
		  , messageSubject = $(this).children(".message-subject").text()
		  , $container = $("#message-container"); 


		$container.html("");

		$meta = $("<div class='meta' />")
				.append("<p> From: "+ messageUser +"</p>")
				.append("<p> Subject: "+ messageSubject +"</p>");

		$container.append($meta);
		$container.append($("<div />").html("<strong>Message</strong> <p class='message-body'> "+messageBody+"</p>"));

		$(".message").removeClass("current");
		$(this).addClass("current");
	});
});