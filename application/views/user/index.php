<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<head>
<title>Blogit</title>
<?php include("header.php");?>
	<!--slider-->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-slider-area">
		<div class="owl-carousel owl-theme owl-carousel-home-slider">	
		
		   <?php if(count($slider_list)):?>
		   <?php foreach($slider_list as $slider_row):?>
		   
		  
			<div class="main-slider col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background:url('<?php echo base_url('assest/images/slider/');?><?php echo $slider_row->slider_image_address;?>') no-repeat;">
				<div class="main-slider-inner">
					<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 main-slider-document">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-slider-heading wow fadeInLeft">
							<h1 class="bernhardfashion_bt"><?php echo $slider_row->slider_title;?></h1>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-slider-content wow fadeInRight">
							<p class="open_sans"><?php echo $slider_row->slider_description;?></p>
						</div><br />   
						<?php if($slider_row->slider_button){;?>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-slider-button wow bounce">
						   <a href="<?php echo $slider_row->slider_button;?>" class="">Click</a>	
						</div>	
						<?php }else{}?>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div> 
				</div>
			</div>
			
			
		   <?php endforeach;?>
		   <?php endif;?>
			
		</div>	
	</div>	
	<!--end slider-->
		   
		  	
	<!--feature-->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 feature-area">
		<!--single feature-->
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 wow fadeInLeft main-feature">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<span class="fa fa-arrows-alt"></span>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
				<h3>Responsive Layout</h3>
				<p>This project is full responsive. You can use this application on your laptop, tab or mobile.</p>
			</div>
		</div>
		<!--single feature-->
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 wow zoomIn main-feature">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<span class="fa fa-rocket"></span>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
				<h3>Custom Design</h3>
				<p>This project is fully customizable. You can chenge it by your choice.</p>
			</div>
		</div>
		<!--single feature-->
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 wow fadeInRight main-feature">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<span class="fa fa-database"></span>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
				<h3>Secure Database</h3>
				<p>This is a dynamic web application &amp; we gave more concentrate on it's database.</p>
			</div>
		</div>
	
	</div>
	<!--end feature-->

	
	
	<!--portfolio-->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 portfolio-area">
	   <?php if(count($portfolio_list)):?>
	   <?php foreach($portfolio_list as $portfolio_row):?>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 main-portfolio">
		<div class="col-lg-8 col-md-8 col-sm-7 col-xs-12 portfolio-image">
			<img src="<?php echo base_url('assest/images/portfolio/');?><?php echo $portfolio_row->portfolio_image_address;?>">
		</div>
		<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 portfolio-con">
			<h3><?php echo $portfolio_row->portfolio_title;?></h3>
			<p><?php echo $portfolio_row->portfolio_description;?></p>
		</div>
		</div>			
	   <?php endforeach;?>
	   <?php endif;?>
	   
	   
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12 category-list-gap"></div>
			<div class="col-lg-11 col-md-11 col-sm-12 col-xs-12 category-list-headlines">
				<h3>Category</h3>
				
			   <?php if(count($main_menu)):?>
			   <?php foreach($main_menu as $menu_row):?>
			   <?php echo anchor("user/category_view/{$menu_row->category_id}", "<span class='fa fa-arrow-right'></span> {$menu_row->category_title} ({$controller->post_count_by_category($menu_row->category_id)})", ['class'=>'wow headShake']);?>
			   <?php endforeach;?>
			   <?php endif;?>
			</div>
		</div>

	</div>	
	<!--end portfolio-->
	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="section">			
				<h2 class="left wow fadeInLeft"><i class="fa fa-book"></i> Post</h2>
				<h2 class="center">And</h2>
				<h2 class="right wow fadeInRight"><i class="fa fa-user"></i> Partner</h2>
			</div>
		</div>	

	<!--post-->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 slide-post-area">
		<div class="owl-carousel owl-theme owl-carousel-post-slider">	
		
		   <?php if(count($slide_post_list)):?>
		   <?php foreach($slide_post_list as $post_row):?>
		   
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 post-list">
				<div class="col-lg-11 col-md-11 col-sm-12 col-xs-12 post-margin">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 post-image">
						<img src="<?php echo base_url('assest/images/post/');?><?php echo $post_row->post_image_address;?>">
						<div class="post-image-date-con"><p><?php echo date('j F Y', strtotime($post_row->post_date));?></p></div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 post-con">
					
						<h3>
						<?php echo anchor("user/post_view/{$post_row->post_id}", $post_row->post_title);?>
						</h3>
						
						<p>
						<?php 
							$post_description = $post_row->post_description;
							echo word_limiter($post_description,45);
							?>
						<?php echo anchor("user/post_view/{$post_row->post_id}", 'more',['class'=>'badge']);?></p>
						<div class="post-con-bottom">
							<p><span class="fa fa-clock-o"></span> <?php echo date('g:i a', strtotime($post_row->post_date));?></p>
							<p><span class="glyphicon glyphicon-user"></span> <?php echo $post_row->user_name;?></p> 					
							<p><span class="fa fa-bookmark"></span> <?php echo anchor("user/category_view/{$post_row->category_id}", $post_row->category_title);?></p>
							
						</div>
					</div>			
				</div>
			</div>	
		  <?php endforeach;?>
		  <?php endif;?>	
				
				

		</div>
	</div>
	<!--end post-->
	
	

	
	<!--user-->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-user-area">

		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 top-user">			
			<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>			
			<div class="col-lg-11 col-md-11 col-sm-12 col-xs-12 top-user-list wow flipInY">			
				<img src="<?php echo base_url();?>/assest/images/user/1.jpg" class="img-circle top-user-img img-responsive"/>
				<h3><a href="#">Emon</a></h3>
				<p><span class="fa fa-users"></span> Male</p>
				<p><span class="fa fa-calendar"></span> 11 June 1995</p>
				<p><span class="fa fa-facebook-square"></span> <a href="#"> Find here</a></p>
				<p><span class="fa fa-map-marker"></span> Khalishpur,Khulna,Bangladesh</p>
			</div>
		</div>
		
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 top-user">			
			<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>			
			<div class="col-lg-11 col-md-11 col-sm-12 col-xs-12 top-user-list wow bounceIn">			
				<img src="<?php echo base_url();?>/assest/images/user/2.jpg" class="img-circle top-user-img img-responsive"/>
				<h3><a href="#">Ishita Mitu</a></h3>
				<p><span class="fa fa-users"></span> Female</p>
				<p><span class="fa fa-calendar"></span> 11 Mar 1997 </p>
				<p><span class="fa fa-facebook-square"></span> <a href="#"> Find here</a></p>
				<p><span class="fa fa-map-marker"></span> Daulatpur,Khulna,Bangladesh</p>
			</div>
		</div>
		
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 top-user">			
			<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>			
			<div class="col-lg-11 col-md-11 col-sm-12 col-xs-12 top-user-list wow bounceIn">			
				<img src="<?php echo base_url();?>/assest/images/user/3.jpg" class="img-circle top-user-img img-responsive"/>
				<h3><a href="#"> Ishtique</a></h3>
				<p><span class="fa fa-users"></span> Male</p>
				<p><span class="fa fa-calendar"></span> 20 May 1993</p>
				<p><span class="fa fa-facebook-square"></span> <a href="#"> Find here</a></p>
				<p><span class="fa fa-map-marker"></span> Khalishpur,Khulna,Bangladesh</p>
			</div>
		</div>
		
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 top-user">			
			<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>			
			<div class="col-lg-11 col-md-11 col-sm-12 col-xs-12 top-user-list wow flipInY">			
				<img src="<?php echo base_url();?>/assest/images/user/4.jpg" class="img-circle top-user-img img-responsive"/>
				<h3><a href="#">Yousuf</a></h3>
				<p><span class="fa fa-users"></span> Male</p>
				<p><span class="fa fa-calendar"></span> 20 May 1965</p>
				<p><span class="fa fa-facebook-square"></span> <a href="#"> Find here</a></p>
				<p><span class="fa fa-map-marker"></span> Khalishpur,Khulna,Bangladesh</p>
			</div>
		</div>
	
		
	</div>
	<!--end user-->
	
	
	<!--paralex-->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-paralex2">				
	   <?php if(count($portfolio_list)):?>
	   <?php foreach($portfolio_list as $portfolio_row):?>	   
		<h1 class="bernhardfashion_bt"><?php echo $portfolio_row->portfolio_title; ?></h1>
		<p class="wow zoomIn"><?php echo $portfolio_row->portfolio_description; ?></p>
	  <?php endforeach;?>
	  <?php endif;?>
	</div>
	<!--end paralex-->
	
<?php include("footer.php"); ?>