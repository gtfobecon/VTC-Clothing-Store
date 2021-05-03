<h1>SHOW PAGE</h1>
<div class="post-item">
	<h3><?php echo $post['id'] ?></h3>
	<h3>
		<a href="<?php echo base_url("post/show?id={$post['id']}") ?>"><?php echo $post['name'] ?></a>
	</h3>
	<p><?php echo $post['content'] ?></p>
	<p><?php echo $post['created_at'] ?></p>
</div>