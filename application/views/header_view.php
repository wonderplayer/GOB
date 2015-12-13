<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Guns fo Bang</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/bootstrap-3.3.6-dist/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/bootstrap-3.3.6-dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/bootstrap-3.3.6-dist/css/bootstrap-theme.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/bootstrap-3.3.6-dist/css/bootstrap-theme.min.css" />
	<script src="<?php echo base_url();?>style/jquery/jquery-1.11.3.min.js"></script>
	<style>
		label{
      color: #ffffff;
		};
		body{
			padding-top: 65px;
		}
    #products ul{
      list-style: none;
    }
	</style>
</head>
<body>
<header>
	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://localhost/GOB/index.php/Main_controller/index">Guns Of Bang</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        	<ul class="nav navbar-nav">
		    <li class="nav-item">
		      <?php echo anchor("Main_controller/index" , "Jaunumi")?>
		    </li>
		    <li class="nav-item">
		      <?php echo anchor("Main_controller/goto_shop" , "Veikals")?>
		    </li>
		    <li class="nav-item">
		      <?php echo anchor("Main_controller/goto_forums" , "Forums")?>
		    </li>
		  </ul>
          <!--<form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Epasts" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Parole" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>-->
          <?php if($this->session->userdata('is_logged_in') == true){ 

        ?>
        <p style = "color:white;">Hello, <?php echo $this->session->userdata('Username');?> </p>
        <input type="button" onclick="location.href='<?php echo base_url()?>index.php/Main_controller/logout';" value="Iziet" />
        <?php
      		} else { ?>
      			<!--<input type="button" onclick="location.href='<?php echo base_url()?>index.php/Main_controller/goto_login_view';" value="Ieiet" />
          	<input type="button" onclick="location.href='<?php echo base_url()?>index.php/Main_controller/goto_registration_view';" value="Reģistrēties" />-->
            <?php
              $attributes = array(
                'class' => 'navbar-form navbar-right'
              );
              echo form_open('Main_controller/validate_credentials', $attributes);
              echo '<div class="form-group">';
              $attributes = array(
                'name' => 'email',
                'class' => 'form-control',
                'placeholder' => 'Epasts'
              );
              echo form_label('Epasts', 'email');
              echo form_input($attributes);
              echo '</div>';
              echo '<div class="form-group">';
              $attributes = array(
                'name' => 'password',
                'class' => 'form-control',
                'placeholder' => 'Parole'
              );
              echo form_label('Parole', 'password');
              echo form_password($attributes);
              $attributes = array(
                'name' => 'submit',
                'class' => 'btn btn-success',
                'value' => 'Ieiet'
              );
              echo '</div>';
              echo form_submit($attributes);
              echo anchor('Main_controller/goto_registration_view','Registreties');
              echo form_close();
            ?>
            <!--
            //Pareiza login forma

            <form class="navbar-form navbar-right">
              <div class="form-group">
                <input type="text" placeholder="Epasts" class="form-control">
              </div>
              <div class="form-group">
                <input type="password" placeholder="Parole" class="form-control">
              </div>
              <button type="submit" class="btn btn-success">Sign in</button>
            </form>-->
          	<?php } ?>
      		
          
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
</header>
<div class='jumbotron'></div>