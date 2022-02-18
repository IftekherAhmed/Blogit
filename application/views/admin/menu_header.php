	<!-- Main Header -->
	<header class="main-header">
		<!-- Logo -->
		<a href="<?php echo'index';?>" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini">Bi</span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><img src="<?php echo base_url();?>/assest/images/site/logo.png" width="110" /></span>
		</a>
		<!--End Logo -->

		<!-- Header Navbar -->
		<nav class="navbar navbar-static-top" role="navigation">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
				<span class="sr-only">Toggle navigation</span>
			</a>

		
			<ul class="nav navbar-top-links navbar-right pull-right profile-box">
			 <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> Iftekhar <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
							<?php echo anchor("admin_ct/profile_view",'<i class="fa fa-user fa-fw"></i> Profile');?>
                        </li>
                        <li>
							<?php echo anchor("admin_ct/profile_setting",'<i class="fa fa-gear fa-fw"></i> Settings');?>
                        </li>
                        <li class="divider"></li>
                        <li>
							<?php echo anchor("admin_ct/logout",'<i class="fa fa-sign-out fa-fw"></i> Logout');?>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>		
			
		</nav>
	</header>
	<!-- Left side column. contains the logo and sidebar -->