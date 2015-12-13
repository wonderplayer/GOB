<div class='container'>
	<h2 name="title" id="title"><?php echo $post[0]->Title; ?></h2>
	<p id="description"><?php echo $post[0]->Description; ?></p>
	<?php if(isset($comments)) : foreach ($comments as $comment ) : ?>
		<h3 id = "user"><?php echo $comment->User_Id; ?></h3>
		<p id = "date"><?php echo $comment->Date; ?></p>
		<p id = "comment"><?php echo $comment->Comment; ?></p>
		<?php if($this->session->userdata('is_logged_in') == true): ?> 
			<p><?php echo anchor("Main_controller/delete_comment/$comment->Id" , "Delete")?></p>
		<?php endif;?>
	<?php endforeach; ?>
	<?php else : ?>
		<h3>Šim rakstam nav komentāru.</h3>
	<?php endif;?>
	<?php 
		$hidden['post_id'] = $post[0]->Id;
		echo form_open('Main_controller/add_comment','',$hidden);
		$attributes = array(
			'id' => 'comment_input',
			'name' => 'comment',
			'placeholder' => 'Komentārs',
		);
		if($this->session->userdata('is_logged_in') == false) 
		{
			$attributes['readonly'] = 'true';
			$attributes['placeholder'] = 'Lai ievietot komentāru, lūdzu ieejiet sistēmā...';
		};
		echo form_label('Komentārs:', 'comment');
		echo form_textarea($attributes);
		echo form_submit('submit', 'Ok');
		echo form_close();
	
	?>
</div>