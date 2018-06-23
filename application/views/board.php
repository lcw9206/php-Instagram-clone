<?=$header?>

<div class="bs-example" data-example-id="simple-table">
   	<table class="table">
      	<thead>
        	<tr>
	            <th>번호</th>
	            <th>제목</th>
	            <th>내용</th>
	            <th>생성일</th>
	            <th></th>
	        </tr>
      	</thead>
      	<tbody>
      		<?php foreach($posts as $post) : ?>
	        <tr>
	            <td><?=$post['no']?></td>
	            <td><a href="/board/view.php?no=<?=$post['no']?>"><?=$post['title']?></a></td>
	            <td><?=$post['content']?></td>
	            <td><?=$post['created']?></td>
	            <td><a href="/board/write.php?no=<?=$post['no']?>" class="btn btn-primary btn-sm">수정</td>
	        </tr>
	     	<?php endforeach; ?>
    	</tbody>
   	</table>
	<div>
		<a href="/board/write.php" class='btn btn-primary'>글쓰기</a>
	</div>
</div>

<?=$footer?>