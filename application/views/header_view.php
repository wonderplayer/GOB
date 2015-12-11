<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/bootstrap-3.3.6-dist/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/bootstrap-3.3.6-dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/bootstrap-3.3.6-dist/css/bootstrap-theme.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/bootstrap-3.3.6-dist/css/bootstrap-theme.min.css" />
	<script src="<?php echo base_url();?>style/jquery/jquery-1.11.3.min.js"></script>
	<style>
		label{
			display: block;
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
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
</header>