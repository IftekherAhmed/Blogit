<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html lang="en">
	<head>
		<title><?php echo $post_view->post_title;?></title> 
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
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 post-view-image"style="height:450px !important;">
								<img class="img-responsive" src="<?php echo base_url('assest/images/post/');?><?php echo $post_view->post_image_address;?>" />
							</div>
							<div class="col-md-12 col-md-12 col-sm-12 col-xs-12 post-view-con">
								<h3><a href="#" class="wow ZoomIn"><?php echo $post_view->post_title;?></a></h3>
								<p><span class="fa fa-user"></span> <?php echo $post_view->user_name;?></p>
								<p><span class="fa fa-clock-o"></span> <?php echo date('g:i a', strtotime($post_view->post_date));?> |</p>
								<p><span class="fa fa-calendar"></span> <?php echo date('j F Y ', strtotime($post_view->post_date));?></p>
								<p><span class="fa fa-bookmark"></span> <?php echo anchor("admin_ct/category_view/{$post_view->category_id}", $post_view->category_title); ?></p>
								<p><?php echo $post_view->post_description;?></p>
							</div>			
						</div>
					
					</div>
					<!-- /.row -->
				</div>            
			</div><!--end tab con-->
		</div>
	</section>

	</div>
	<!-- /#content-wrapper -->

	<!-- footer -->
	<?php require("footer.php");?>
	<!--end footer-->
	</body>

</html>