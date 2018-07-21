<html>
<head>
	<meta charset="utf-8">
	<title>인스타그램</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/assets/css/web.min.css" />

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
</head>

<body>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">회원가입</h4>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label>이메일</label>
							<input type="email" name="user_id" class="form-control" placeholder="이메일">
						</div>
						<div class="form-group">
							<label>비밀번호</label>
							<input type="password" name="user_password" class="form-control" placeholder="비밀번호">
						</div>
						<div class="form-group">
							<label>이름</label>
							<input type="text" name="user_name" class="form-control" placeholder="이름">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary signup-btn">회원가입</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<script>
		$('.signup-btn').click(function() {
			doSignup();
		});
	</script>

	<div class="container">