<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<head>
<title>Login</title>
<?php include("header.php");?>
	<!--end header-->
	
	

 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main">

 	<div class="container">
 		<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 form-bg">
	 		<div class="form-me">

				<?php if($this->session->flashdata('errors')): ?>
					<div class="text-danger">
					<?php echo $this->session->flashdata('errors'); ?>
					</div>
				<?php endif; ?>

	 			<?php echo form_open('login/check_user', ['class'=>'', 'method'=>'post']);?>

	 			<?php echo form_error('user_email', '<div class="text-danger">', '</div>');?>
	 			<?php echo form_input(['type'=>'text', 'name'=>'user_email', 'placeholder'=>'Email', 'class'=>'form-control']);?>

	 			<?php echo form_error('user_password', '<div class="text-danger">', '</div>');?>
	 			<?php echo form_input(['type'=>'password', 'name'=>'user_password', 'placeholder'=>'Password', 'class'=>'form-control']);?>
	 				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	 					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	 						<?php echo form_input(['type'=>'submit', 'name'=>'login', 'value'=>'Login', 'class'=>'form-control btn btn-primary']);?>
	 					</div>
	 					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">	 						
	 						<?php echo form_input(['type'=>'reset', 'value'=>'Reset', 'class'=>'form-control btn btn-danger']);?>
	 					</div>
	 				</div>
	 			<?php echo form_close();?>
	 		</div>
 		</div>

 		<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>

 		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
 		</div>
 	</div>
 	

 </div>
 
	
<?php include("footer.php"); ?>