var doSignup = function() {
	
	$.ajax({
		type: 'post',
		url: '/sign/up',
		data: $('.signup-form').serialize(),
		dataType: 'json',
		error: function(xhr, e){
			console.log(xhr.responseText);
		},
		success: function(res, textStatus, xhr) {
			if(res.code==200) {
				alert('Success');
			} else {
				alert(res.message);
			}
		},
		complete: function(xhr, textStatus) {
		}
	});
};


var doLogin = function() {
	$.ajax({
		type: 'post',
		url: '/sign/in',
		data: {},
		dataType: 'json',
		error: function(xhr, e){
			console.log(xhr.responseText);
		},
		success: function(res, textStatus, xhr) {
			
		},
		complete: function(xhr, textStatus) {
		}
	});
};