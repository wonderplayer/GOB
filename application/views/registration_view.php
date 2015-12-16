<div class="container">
	<h1>Reģistrācijas forma</h1>
	<?php
		$attributes = array(
			'role' => 'form',
			'class' => 'form-horizontal'
		);
		echo form_open('Main_controller/create_user',$attributes);
		$label_attributes = array(
			'class' => 'control-label col-sm-2'
		);
		$attributes = array(
			'name' => 'username',
			'value' => set_value('username', $this->input->post('username')),
			'placeholder' => 'Lietotājvārds',
			'class' => 'form-control'
		);
		echo '<div class="form-group">';
		echo form_label('Lietotājvārds', 'username', $label_attributes);
		echo '<div class="col-sm-10">';
		echo form_input($attributes);
		echo '</div>';
		echo '</div>';
		$attributes = array(
			'name' => 'email',
			'value' => set_value('email', $this->input->post('email')),
			'placeholder' => 'Epasts',
			'class' => 'form-control'
		);
		echo '<div class="form-group">';
		echo form_label('Epasts', 'email', $label_attributes);
		echo '<div class="col-sm-10">';
		echo form_input($attributes);
		echo '</div>';
		echo '</div>';
		echo '<div class="form-group">';
		echo form_label('Parole', 'password', $label_attributes);
		echo '<div class="col-sm-10">';
		echo form_password('password','','class="form-control"');
		echo '</div>';
		echo '</div>';
		echo '<div class="form-group">';
		echo form_label('Atkārtot paroli', 'password2', $label_attributes);
		echo '<div class="col-sm-10">';
		echo form_password('password2','','class="form-control"');
		echo '</div>';
		echo '</div>';
		echo '<div class="form-group">';
		echo '<div class="col-sm-offset-2 col-sm-10">';
		echo form_submit('submit','Reģistrēties','class="btn btn-default"');
		echo '</div>';
		echo '</div>';
	?>
	<?php echo validation_errors('<p class="error"></p>'); ?>
</div>