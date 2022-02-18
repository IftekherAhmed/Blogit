<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<head>
<title><?php echo $category_view->category_title;?></title>
<?php include("header.php");?>	

	<!--post-->
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 category-post-area">
	
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i>  <?php echo anchor("user/index", 'Home');?>
			</li>
			<li class="active">
				<i class="fa fa-bookmark"></i> <?php echo $category_view->category_title;?>
			</li>
		</ol>	
		
		
		<?php if(count($post_list_by_category)):?>		
		<?php foreach($post_list_by_category as $post_row_by_category):?>
		
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 category-post-list">
			<div class="col-lg-5 col-md-5 col-sm-4 col-xs-12 category-post-image">
				<img class="img-responsive" src="<?php echo base_url('assest/images/post/');?><?php echo $post_row_by_category->post_image_address;?>" />
			</div>
			<div class="col-md-7 col-md-7 col-sm-8 col-xs-12 category-post-con">
				<h3><?php echo anchor("user/post_view/{$post_row_by_category->post_id}", $post_row_by_category->post_title, ['class'=>'wow zoomIn']);?></h3>
				
				<p><span class="fa fa-user"></span> <?php echo $post_row_by_category->user_name;?></p>
				
				<p><span class="fa fa-calendar"></span> <?php echo date('j.F.Y', strtotime($post_row_by_category->post_date));?></p>
				
				<p><span class="fa fa-bookmark"></span> <?php echo anchor("user/category_view/{$post_row_by_category->category_id}", $post_row_by_category->category_title);?></p>
				
				<p>
				<?php 
					$post_description = $post_row_by_category->post_description;
					echo word_limiter($post_description,50);
				?>
				<?php echo anchor("user/post_view/{$post_row_by_category->post_id}", 'more',['class'=>'badge']);?></p>
			</div>			
		</div>
		<?php endforeach;?>
		<?php endif;?>
		
		
		<div class="text-center">
		<?php echo $this->pagination->create_links($category_view->category_id);?>
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
	
<?php include("footer.php"); ?>