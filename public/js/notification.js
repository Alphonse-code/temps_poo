


$(document).ready(function() {
	getNotification();
	setInterval(function(){ getNotification(); }, 20000);
});
function getNotification() {	
	if (!Notification) {
		$('body').append('<h4 style="color:red">*Le navigateur ne prend pas en charge la notification Web</h4>');
		return;
	}
	if (Notification.permission !== "granted") {		
		Notification.requestPermission();
	} else {	
			
		$.ajax({
			url : "notification.php",
			type: "POST",
			success: function(response, textStatus, jqXHR) {
				
				var response = jQuery.parseJSON(response);
				if(response.result == true) {
					var notificationDetails = response.notif;
					// console.log("Notification details: " + JSON.stringify(notificationDetails));
					for (var i = notificationDetails.length - 1; i >= 0; i--) {
						var notificationUrl = notificationDetails[i]['url'];
						var notificationObj = new Notification(notificationDetails[i]['title'], {
							icon: notificationDetails[i]['icon'],
							body: notificationDetails[i]['message'], 
						});
						notificationObj.onclick = function () {
							window.open(notificationUrl); 
							notificationObj.close();     
						};
						setTimeout(function(){
							notificationObj.close();
						}, 15000);
					};
				} else {
				}
			},
			error: function(jqXHR, textStatus, errorThrown)	{}
		}); 
	}
};