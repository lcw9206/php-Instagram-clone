<?=$header?>

<div class="sign-div row">
	<div class="left-sign col-md-6 col-sm-6 col-xs-6">
		<h2 class="left-sign-title">인스타그램 클론</h2>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-6">
		<div class="sign-form-div">
			<h1 class="sign-form-title">Instagram</h1>
			<form>
			  	<div class="form-group">
			    	<input type="email" name="id" class="form-control" placeholder="이메일">
			  	</div>
			  	<div class="form-group">
			    	<input type="password" name="password" class="form-control" placeholder="비밀번호">
			  	</div>
			  	<button type="button" class="btn btn-default btn-block btn-primary login-btn">로그인</button>
			</form>
			<p class="text-center">
				<a class="cursor-pointer" data-toggle="modal" data-target="#myModal">회원가입</a>
			</p>
		</div>
	</div>
</div>

<script>
	$('.login-btn').click(function() {
		doLogin();
	});

</script>

<?=$footer?>