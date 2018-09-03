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
				alert('축하합니다. 가입에 성공하셨습니다.');
				$('#myModal').modal('hide');
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
		data: $('.login-form').serialize(),
		dataType: 'json',
		error: function(xhr, e){
			console.log(xhr.responseText);
		},
		success: function(res, textStatus, xhr) {
			console.log(res);
			if(res.code == 200) {
				document.location.href = res.result.redirect_url;
			} else {
				alert(res.message);
			}
		},
		complete: function(xhr, textStatus) {
		}
	});
};