<div class="container">
	<!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Jaunumi</h3>
            </div>
        </div>
       <!-- /.row -->
	<?php if($this->session->userdata('Username') == 'admin'): ?> 
		<h3><?php echo anchor("Main_controller/goto_create_news" , "Izveidot jaunu ierakstu.")?></h3>
	<?php endif;?>
	<hr/>
	<?php if(isset($records)) : foreach ($records as $row ) : ?>

	<h2><?php echo anchor("Main_controller/show_news/$row->Id" , $row->Title)?></h2>
	<p><?php echo $row->Date ?></p>
	<div><?php echo ellipsize($row->Description, 200, 1)?></div>
	<?php if($this->session->userdata('is_logged_in') == true): ?> 
		<?php $attributes = array(
			'class' =>"btn btn-default",
			'onclick' => "javascript:confirmation_news($row->Id);"
		);?>
		<p><?php echo form_button('delete',"Dzēst",$attributes);?></p>
	<?php endif;?>
	<?php endforeach; ?>
	<hr>
	<?php else : ?>

	<h2>Nav jaunumu.</h2>

	<?php endif; ?>
</div>