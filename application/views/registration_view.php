<div id="signup_form" class="jumbotron">

		<h1>Reģistrācijas forma</h1>
		<?php
			echo form_open('Main_controller/create_user');
			echo form_input('username', set_value('username', 'Username'));
			echo form_input('email',set_value('email', 'Email'));
			echo form_password('password','Password');
			echo form_password('password2','Password');
			echo form_submit('submit','Reģistrēties');
		?>

		<?php echo validation_errors('<p class="error"></p>'); ?>
</div>