<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html lang="en">
	<head>
		<title><?php echo $category_view->category_title;?></title> 
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
						
							<?php if(count($post_list_by_category)):?>		
							<?php foreach($post_list_by_category as $post_row_by_category):?>
							
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 category-post-list">
								<div class="col-lg-5 col-md-5 col-sm-4 col-xs-12 category-post-image">
									<img class="img-responsive" src="<?php echo base_url('assest/images/post/');?><?php echo $post_row_by_category->post_image_address;?>" />
								</div>
								<div class="col-md-7 col-md-7 col-sm-8 col-xs-12 category-post-con">
									<h3><?php echo anchor("admin_ct/single_post/{$post_row_by_category->post_id}", $post_row_by_category->post_title, ['class'=>'wow zoomIn']);?></h3>
									
									<p><span class="fa fa-user"></span> <?php echo $post_row_by_category->user_name;?></p>
									
									<p><span class="fa fa-calendar"></span> <?php echo date('j F Y g:i a', strtotime($post_row_by_category->post_date));?></p>
									
									<p><span class="fa fa-bookmark"></span> <?php echo anchor("admin_ct/category_view/{$post_row_by_category->category_id}", $post_row_by_category->category_title);?></p>
									
									<p>
									<?php 
										$post_description = $post_row_by_category->post_description;
										echo word_limiter($post_description,50);
									?>
									<?php echo anchor("admin_ct/single_post/{$post_row_by_category->post_id}", 'more',['class'=>'badge']);?></p>
								</div>			
							</div>
							<?php endforeach;?>
							<?php endif;?>
							
							<div class="text-center">
							<?php echo $this->pagination->create_links($category_view->category_id);?>
							</div>
						
						</div>
						<!-- /.row -->
					</div>            
				</div><!--end tab con-->
			</section>
		</div>
		<!-- /#content-wrapper -->

		<!-- footer -->
		<?php require("footer.php");?>
		<!--end footer-->

		</div>
	</body>

</html>