<?=$header?>

<form class="form-horizontal post-form">
  <input type="hidden" name="no" value="<?=$post['no']?>">
  <div class="form-group">
    <label class="col-sm-2 control-label">제목</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="title" id="title" placeholder="제목" value="<?=$post['title']?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">내용</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="content" rows="8"><?=$post['content']?></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_secret" value="Y" <?=$post['is_secret']=='Y'?'checked=':''?>>비공개
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" class="btn btn-default do-post-btn"><?=$post['no']?'수정하기':'작성'?></button>
    </div>
  </div>
</form>

<script type="text/javascript">
	$('.do-post-btn').click(function() {
		$.ajax({
			type: 'post',
			url: '/board/do_write',
			data: $('.post-form').serialize(),
			dataType: 'json',
			error: function(xhr, e) {
				alert('에러');
			},
			success: function(res, textStatus, xhr) {
				if(res.code==200) {
					alert('글을 성공적으로 올렸습니다.');
					document.location.href = '/board/view?post_no='+res.result.post_no;
				} else {
					alert(res.message);
				}
			},
			complete: function(xhr, textStatus) {
	
			}
		});
	});
</script>


<?=$footer?>