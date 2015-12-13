<h1>Reģistrācijas forma</h1>
<?php
	echo form_open('Main_controller/create_user');
	$attributes = array(
        'name' => 'username',
        'value' => set_value('username', $this->input->post('username')),
        'placeholder' => 'Lietotājvārds'
    );
	echo form_label('Lietotājvārds', 'username');
	echo form_input($attributes);
	$attributes = array(
        'name' => 'email',
        'value' => set_value('email', $this->input->post('email')),
        'placeholder' => 'Epasts'
    );
	echo form_label('Epasts', 'email');
	echo form_input($attributes);
	echo form_label('Parole', 'password');
	echo form_password('password');
	echo form_label('Atkārtot paroli', 'password2');
	echo form_password('password2');
	echo form_submit('submit','Reģistrēties');
?>

<?php echo validation_errors('<p class="error"></p>'); ?>