<div class='container'>
	<h2 name="title" id="title"><?php echo $post[0]->Title; ?></h2>
	<p><?php echo $post[0]->Date; ?></p>
	<p id="description"><?php echo $post[0]->Description; ?></p>
	<hr>
	<?php if(count($comments) > 0) : foreach ($comments as $comment ) : ?>
		<h3 id = "user">
			<?php foreach ($username as $user) {
			if ($comment->User_Id == $user[0]->Id) {
				echo $user[0]->Username;
			}
		}?>
		</h3>	
		<p id = "date"><?php echo $comment->Date; ?></p>
		<p id = "comment"><?php echo $comment->Comment; ?></p>
		<?php if($this->session->userdata('Username') == 'admin'): ?> 
			<?php $attributes=array(
				'class' => 'btn btn-default',
				'onclick' => "javascript:confirmation_comment($comment->Id);"
			); ?>
			<p><?php echo form_button('delete',"Dzēst",$attributes);?></p>
		<?php endif;?>
		<hr>
	<?php endforeach; ?>
	<?php else : ?>
		<h3>Šim rakstam nav komentāru.</h3>
	<?php endif;?>
	<hr>
	<?php 
		$hidden['post_id'] = $post[0]->Id;
		$attributes = array(
			'role' => 'form',
			'class' => 'form-horizontal'
		);
		echo form_open('Main_controller/add_comment',$attributes,$hidden);
		$attributes = array(
			'id' => 'comment_input',
			'name' => 'comment',
			'placeholder' => 'Komentārs',
			'class' => 'form-control'
		);
		if($this->session->userdata('is_logged_in') == false) 
		{
			$attributes['readonly'] = 'true';
			$attributes['placeholder'] = 'Lai ievietot komentāru, lūdzu ieejiet sistēmā.';
		};
		echo '<div class="form-group">';
		$label_attributes = array(
			'class' => 'control-label col-sm-2'
		);
		echo form_label('Komentārs:', 'comment',$label_attributes);
		echo '<div class="col-sm-10">';
		echo form_textarea($attributes);
		echo '</div>';
		echo '</div>';
		if($this->session->userdata('is_logged_in') == true) 
		{
		echo '<div class="form-group">';
		echo '<div class="col-sm-offset-2 col-sm-10">';
		echo form_submit('submit', 'Ok', 'class="btn btn-default"');
		echo '</div>';
		echo '</div>';
		};
		echo form_close();
	?>
</div>