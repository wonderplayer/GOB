<div id="login_form" class="jumbotron">

	<h1>Login forma</h1>
	<?php
		echo form_open('Main_controller/validate_credentials');
		echo form_input('email','Email');
		echo form_password('password','Password');
		echo form_submit('submit','Ieiet');
		echo anchor('Main_controller/goto_registration_view','Registreties');
	?>
</div>
