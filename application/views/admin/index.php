<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html lang="en">
	<head>
		<title>Dashbord</title> 
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
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-content">	
							<!-- Breadcrumbs-->
							<ol class="breadcrumb">
							    <li class="breadcrumb-item">
									<a href="#">Dashbord</a>
							    </li>
							    <li class="breadcrumb-item active">index</li>
						    </ol>
							<!-- /.notifications -->								

							<p> Welcome, <?php echo $this -> session -> userdata('user_name') ?> </p>
							
							<!-- notifications -->
								<div class="col-lg-3 col-md-6">
									<div class="panel panel-default">
										<div class="panel-heading">
											<div class="row">
												<div class="col-xs-3">
													<i class="fa fa-image fa-5x"></i>
												</div>
												<div class="col-xs-9 text-right">
													<div class="huge">										
													<?php echo $total_slide; ?>   
													</div>
													<div>Total slide</div>	
												</div>
											</div>
										</div>
										<a href="<?php echo 'slider';?>">
											<div class="panel-footer">
												<span class="pull-left">View Details</span>
												<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
												<div class="clearfix"></div>
											</div>
										</a>
									</div>
								</div>	
								
								
								
								<div class="col-lg-3 col-md-6">
									<div class="panel panel-default">
										<div class="panel-heading">
											<div class="row">
												<div class="col-xs-3">
													<i class="fa fa-magic fa-5x"></i>
												</div>
												<div class="col-xs-9 text-right">
													<div class="huge">
													<?php echo $total_portfolio; ?>   
													</div>
													<div>Total portfolio</div>
												</div>
											</div>
										</div>
										<a href="<?php echo 'portfolio';?>">
											<div class="panel-footer">
												<span class="pull-left">View Details</span>
												<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
												<div class="clearfix"></div>
											</div>
										</a>
									</div>
								</div>	
								
								
								
								<div class="col-lg-3 col-md-6">
									<div class="panel panel-default">
										<div class="panel-heading">
											<div class="row">
												<div class="col-xs-3">
													<i class="fa fa-bookmark fa-5x"></i>
												</div>
												<div class="col-xs-9 text-right">
													<div class="huge">										
													<?php echo $total_category; ?>   
													</div>
													<div>Total category</div>
												</div>
											</div>
										</div>
										<a href="<?php echo 'category';?>">
											<div class="panel-footer">
												<span class="pull-left">View Details</span>
												<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
												<div class="clearfix"></div>
											</div>
										</a>
									</div>
								</div>
								
								
								
								<div class="col-lg-3 col-md-6">
									<div class="panel panel-default">
										<div class="panel-heading">
											<div class="row">
												<div class="col-xs-3">
													<i class="fa fa-book fa-5x"></i>
												</div>
												<div class="col-xs-9 text-right">
													<div class="huge">
													<?php echo $total_post; ?>   										
													</div>
													<div>Total post</div>
												</div>
											</div>
										</div>
										<a href="<?php echo 'post';?>">
											<div class="panel-footer">
												<span class="pull-left">View Details</span>
												<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
												<div class="clearfix"></div>
											</div>
										</a>
									</div>
								</div>	
					
							
						
							<p>
								<b>Nb:</b> Hi, this is a ready blog application and it is very user friendly thereafter if you have any complain by using our application then you can knock me all time.<br/>
								Mail : iftekharemon33@gmail.com<br/>
								Thanks for stay with us.
							</p>
						
						</div>						
						<!-- /.row -->
					</div>
					<!-- /.container-fluid -->
				</div>
				<!-- /#page-wrapper -->
			</div>
			
		</section>
		<!-- /#content-wrapper -->
	</div>
	<!-- /#wrapper -->



	<!-- footer -->
	<?php require("footer.php");?>
	<!--end footer-->

	</div>
	</body>

</html>