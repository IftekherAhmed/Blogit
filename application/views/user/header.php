
		<!--favicon-->
		<link rel="shortcut icon" href="<?php echo base_url();?>assest/images/site/fevicon.png" />  
		<!--End favicon-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assest/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assest/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assest/css/custome.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assest/css/panel.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assest/css/custome-fonts.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assest/css/custome-responsive.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assest/css/login.css">
         <!--animete-->       
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assest/animate/animate.css"/>        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assest/animate/animate2.css"/>         
        <!--owl-->
        <link rel="stylesheet" href="<?php echo base_url();?>assest/owl-carousel/owl.carousel.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assest/owl-carousel/owl.theme.default.min.css"> 
	</head>

<body class="open-sans">


	<!--header-->
	<div class="container row col-lg-12 col-md-12 col-sm-12 col-xs-12 home_page_header">
	
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header home_page_header-logo col-lg-6 col-md-5">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <?php echo anchor("user/index", '<img src="'.base_url().'/assest/images/site/logo.png" width="110" />');?>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse col-lg-6 col-md-7 main-menu" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav">
				
				<li><?php echo anchor("user/index", 'Home');?></li>
				<li><?php echo anchor("login/index", 'Login');?></li>
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category <span class="caret"></span></a>
				  <ul class="dropdown-menu">            
				   <?php if(count($main_menu)):?>
				   <?php foreach($main_menu as $menu_row):?>
				   <?php echo "<li>";?>
				   <?php echo anchor("user/category_view/{$menu_row->category_id}", $menu_row->category_title);?>
				   <?php echo "</li>";?>
				   <?php endforeach;?>
				   <?php endif;?>
				  </ul>
				</li>
			  <form method="post" class="navbar-form navbar-left menu_form" action="<?php echo site_url('user/search_post');?>">
				<div class="form-group">				  
					<div class="inner-addon right-addon">
					  <i class="glyphicon glyphicon-search"></i>
					  <input name="post_title" type="text" class="form-control" placeholder="Search" />
					</div>
				</div>
			  </form>
			  </ul>
			</div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	
	</div>
	<!--end header-->
	
	
