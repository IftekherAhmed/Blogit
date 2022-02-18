
	
	<!--footer-->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-footer">
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<p>Hi, my name is khan iftekhar ahmed Emon.<br />
			I live Bangladesh.
			I'm a student of English Language &amp; literature.<br />
			Thanks all.
			</p>
			<br/>
			<p>&copy; All copyright and designed by Iftekhar Emon</p>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">	
			<p><span class="fa fa-phone"></span> +8801946522456</p>
			<p><span class="fa fa-envelope-o"></span> <a href="mailto:iftekharemon33@gmail.com">iftekharemon33@gmail.com</a></p>
			<p><span class="fa fa-map-marker"></span> Khalishpur,Khulna,Bangladesh</p>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">				
		  <ul class="footer-menu"> 
		   <?php foreach($main_menu as $menu_row):?>
		   <?php echo "<li>";?>
		   <?php echo anchor("user/category_view/{$menu_row->category_id}", $menu_row->category_title);?>
		   <?php echo "</li>";?>
		   <?php endforeach;?>
		  </ul>
		</div>
	</div>
	<!--end footer-->
	


	
	
	
	
		
        <script src="<?php echo base_url();?>/assest/js/jquery.min.js"></script>
		<script src="<?php echo base_url();?>/assest/js/bootstrap.min.js"></script>
		
        <script src="<?php echo base_url();?>/assest/animate/wow.min.js"></script>
		<!--/animated-css-->	
		
		<script type="text/javascript" src="<?php echo base_url();?>/assest/js/custome.js">
		</script>	
		
		<!--/owl--->	
		<script src="<?php echo base_url();?>/assest/owl-carousel/owl.animate.js"></script>
		<script src="<?php echo base_url();?>/assest/owl-carousel/owl.carousel.min.js"></script>
		<script src="<?php echo base_url();?>/assest/owl-carousel/main.js"></script>
		
		
	</body>
</html>