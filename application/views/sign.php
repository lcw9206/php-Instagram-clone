<?=$header?>

<!-- 보통 전체 부분을 row로 감싸고 시작한다. -->
<style>
	.sign-div {
		width: 935px;
		height: 670px;
		margin: 30px auto;
	}

	.left-sign {
		background-image: url(https://www.instagram.com/static/images/homepage/home-phones@2x.png/9364675fb26a.png);
		background-size: 454px 618px;
		height: 618px;
		text-align: center;
	}

	.left-sign-title {
		color: #fff;
		margin-top: 280px; 
		margin-left: 70px;
	}

	.sign-form-div {
		padding: 42px;
		background-color: #fff;
		margin-top: 20px;
		border: 1px solid #ccc;
	}

	.sign-form-title {
		text-align: center; 
		font-family: 'Pacifico', cursive;
	}
</style>

<div class="sign-div row">
	<div class="left-sign col-md-6 col-sm-6 col-xs-6">
		<h2 class="left-sign-title">인스타그램 클론</h2>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-6">
		<div class="sign-form-div">
			<h1 class="sign-form-title">Instagram</h1>
			<form>
			  	<div class="form-group">
			    	<input type="email" class="form-control" placeholder="이메일">
			  	</div>
			  	<div class="form-group">
			    	<input type="password" class="form-control" placeholder="비밀번호">
			  	</div>
			  	<button type="button" class="btn btn-default btn-block btn-primary">로그인</button>
			</form>
		</div>
	</div>
</div>

<?=$footer?>