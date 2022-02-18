<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html lang="en">
	<head>
		<title><?php echo $slide_view->slider_title;?></title> 
		<!--header-->
		<?php require("header.php");?>
		<!--end header-->
	</head>

	<body class="skin-blue sidebar-mini">
	<div id="wrapper">


	<?php require("menu_header.php"); ?>
	<aside class="main-sidebar"> 
		<!-- Sidebar Menu -->      
		<?php require("sidebar.php"); ?>			
		<!-- /.panel -->
	</aside>

	
	<!--right connect-->
	<div class="content-wrapper">
		<!-- Page Content -->
		<section class="content">
			<div id="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 post-view">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 post-view-image" style="height:450px !important;">
								<img class="img-responsive" src="<?php echo base_url('assest/images/slider/');?><?php echo $slide_view->slider_image_address;?>" />
							</div>
							<div class="col-md-12 col-md-12 col-sm-12 col-xs-12 post-view-con">
								<h3><?php echo $slide_view->slider_title;?></h3>
								<?php if($slide_view->slider_button):?>
								<p><span class="fa fa-link"></span> <a href="<?php echo $slide_view->slider_button;?>">Click</a></p>
								<?php endif;?>
								<p><?php echo $slide_view->slider_description;?></p>
							</div>			
						</div>
					
					</div>
					<!-- /.row -->
				</div>            
			</div><!--end tab con-->
		</section>
	<!-- /#content-wrapper -->

	<!-- footer -->
	<?php require("footer.php");?>
	<!--end footer-->

	</div>
	</body>

</html>