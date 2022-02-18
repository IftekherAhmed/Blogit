<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<head>
<title><?php echo $post_view->post_title;?></title>
<?php include("header.php");?>	

	<!--post-->
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 post-area">

		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i> <?php echo anchor("user/index", 'Home');?>
			</li>
			<li>
				<i class="fa fa-bookmark"></i> <?php echo anchor("user/category_view/{$post_view->category_id}", $post_view->category_title); ?>
			<li class="active">
				<i class="fa fa-book"></i> <?php echo $post_view->post_title;?>
			</li>
		</ol>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 post-view">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 post-view-image">
				<img class="img-responsive" src="<?php echo base_url('assest/images/post/');?><?php echo $post_view->post_image_address;?>" />
			</div>
			<div class="col-md-12 col-md-12 col-sm-12 col-xs-12 post-view-con">
				<h3><a href="#" class="wow ZoomIn"><?php echo $post_view->post_title;?></a></h3>
				<p><span class="fa fa-user"></span> <?php echo $post_view->user_name;?></p>
				<p><span class="fa fa-clock-o"></span> <?php echo date('g:i a', strtotime($post_view->post_date));?> |</p>
				<p><span class="fa fa-calendar"></span> <?php echo date('j F Y ', strtotime($post_view->post_date));?></p>
				<p><span class="fa fa-bookmark"></span> <?php echo anchor("user/category_view/{$post_view->category_id}", $post_view->category_title); ?></p>
				<p><?php echo $post_view->post_description;?></p>
			</div>			
		</div>
	</div>
	<!--end post-->
	
	
	<!--sidebar-->
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 sidebar-area">
		<?php include("sidebar.php"); ?>
	</div>
	<!--end sidebar-->
	
	
	<!--border-->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-border"></div>
	<!--end border-->
	
	<!--Post share-->
	<!-- Go to www.addthis.com/dashboard to customize your tools -->
	<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57e0f7ce4f3763fb"></script>
	<!--EndPost share-->
	
<?php include("footer.php"); ?>