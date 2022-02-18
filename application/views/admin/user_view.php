<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>	
<?php
	$user = $this->session->userdata();
	//echo"<pre>";
	//print_r($user);
	//echo"</pre>";
	$user_id = $user['user_id'];
	$user_name = $user['user_name'];
	$user_email = $user['user_email'];
	$user_number = $user['user_number'];
	$user_birthday = $user['user_birthday'];
	$user_work = $user['user_work'];
	$user_gender = $user['user_gender'];
	$user_religion = $user['user_religion'];
	$user_country = $user['user_country'];
	$user_loves = $user['user_loves'];
	$user_about = $user['user_about'];
	$user_address = $user['user_address'];
	$user_image_address = $user['user_image_address'];
	?>
<html lang="en">
	<head>
		<title><?php echo $user_name;?></title> 
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
					<!-- Breadcrumbs-->
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="<?php echo 'index';?>">Dashbord</a>
							</li>
							<li class="breadcrumb-item active">View</li>
						</ol>
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="page-heading"> <i class="fa fa-user"></i> <?php echo $user_name; ?></div>
							</div> <!-- /panel-heading -->
							<div class="panel-body">
								<div class="col-lg-12">	
									<!-- /.notifications -->
									<div>
										<!-- Nav tabs -->
										<ul class="nav nav-tabs admin-tabs">
											<li class="active"><a href="#create-user" data-toggle="tab"><span class="fa fa-eye"></span> Profile </a>
											</li>
										</ul>

										<!-- Tab panes -->
										<div class="tab-content">

											<div class="tab-pane fade in active" id="create-user">
												<div class="panel panel-default">														
													<!-- /.panel-heading -->
													<div class="panel-body"> 
	<div class="user-view">
	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12"></div>
			<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">	
				<div class="form-group">
				<?php echo"<img src='". base_url('assest/images/user/'.$user_image_address)."' width='100' class='img-responsive' />";	
				?>
			</div>	
			</div>
		</div>
	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">	
				<span class="glyphicon glyphicon-user"></span> Name: 
			</div>
			<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">	
				<?php echo $user_name; ?>
			</div>
		</div>
	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">	
				<span class="fa fa-phone"></span> Number: 
			</div>
			<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">	
				<?php echo $user_number; ?>
			</div>
		</div>
	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">	
				<span class="fa fa-child "></span> Birthday: 
			</div>
			<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">	
				<?php echo $user_birthday; ?>
			</div>
		</div>
	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">	
				<span class="fa fa-envelope"></span> Email: 
			</div>
			<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">	
				<?php echo $user_email; ?>	
			</div>
		</div>
	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">	
				<span class="fa fa-briefcase"></span> Work:  
			</div>
			<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">	
				<?php echo $user_work; ?>
			</div>
		</div>
	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">	
				<span class="fa fa-users"></span> Gender: 
			</div>
			<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">	
				<?php echo $user_gender; ?>
			</div>
		</div>
	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">	
				<span class="fa fa-cubes"></span> Reiligion: 
			</div>
			<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">	
				<?php echo $user_religion; ?>
			</div>
		</div>
	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">	
				<span class="fa fa-flag"></span> Country: 
			</div>
			<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">	
				<?php echo $user_country; ?>
			</div>
		</div>
	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">	
				<span class="fa fa-heart"></span> Loves: 
			</div>
			<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">	
				<?php echo $user_loves; ?>
			</div>
		</div>
	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">	
				<span class="fa fa-circle"></span> About: 
			</div>
			<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">	
				<?php echo $user_about; ?>	
			</div>
		</div>
	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">	
				<span class="fa fa-map-marker"></span> Address: 
			</div>
			<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">	
				<?php echo $user_address; ?>
			</div>
		</div>
		
		
		
		
	</div>

	
	
	
											</div>
											<!-- /.panel-body -->
											</div>
											<!-- /.panel -->
											</div>	
										</div><!--end tab con-->
									</div>
								</div> <!-- /panel-body -->
							</div> <!-- /panel -->		
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
	<script type="text/javascript">
		function readURL(input) {
		$('#previewLoad').show();
		if (input.files && input.files[0]) {
		  var reader = new FileReader();

		  reader.onload = function (e) {
			$('.image_preview').html('<img src="'+e.target.result+'" alt="'+reader.name+'" class="img-thumbnail" width="150" height="150"/>');
		  }

		  reader.readAsDataURL(input.files[0]);
		  $('#previewLoad').hide();
		}
		}
		
		function reset(){
		$('#image').val("");
		$('.image_preview').html("");
		}
    </script>
	<!-- footer -->
	<?php require("footer.php");?>
	<!--end footer-->

	</div>
	</body>

</html>