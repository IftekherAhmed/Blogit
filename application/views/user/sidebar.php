
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sidebar-single-part">
			<div class="sidebar-single-part-title-bar">
				<h3>Top Post</h3>
			</div>
			<div class="sidebar-single-part-content-bar">				
			   <?php if(count($top_post_list)):?>
			   <?php foreach($top_post_list as $post_row):?>
			   <p><?php echo anchor("user/post_view/{$post_row->post_id}", "<span class='fa fa-arrow-right'></span> {$post_row->post_title}", ['class'=>'wow headShake']);?></p>
			   <?php endforeach;?>
			   <?php endif;?>
			</div>
		</div>
	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sidebar-single-part">
			<div class="sidebar-single-part-title-bar">
				<h3>Category</h3>
			</div>
			<div class="sidebar-single-part-content-bar">				
			   <?php if(count($main_menu)):?>
			   <?php foreach($main_menu as $menu_row):?>
			   <p><?php echo anchor("user/category_view/{$menu_row->category_id}", "<span class='fa fa-arrow-right'></span> {$menu_row->category_title} ({$controller->post_count_by_category($menu_row->category_id)})", ['class'=>'wow headShake']);?></p>
			   <?php endforeach;?>
			   <?php endif;?>
			</div>
		</div>
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sidebar-single-part">
			<div class="sidebar-single-part-title-bar">
				<h3>Login</h3>
			</div>
			<div class="sidebar-single-part-content-bar">				
				<?php if($this->session->flashdata('errors')): ?>
					<div class="text-danger">
					<?php echo $this->session->flashdata('errors'); ?>
					</div>
				<?php endif; ?>

	 			<?php echo form_open('login/check_user', ['class'=>'', 'method'=>'post']);?>
	 			<?php echo form_error('user_email', '<div class="text-danger">', '</div>');?>
	 			<?php echo form_input(['type'=>'text', 'name'=>'user_email', 'placeholder'=>'Email', 'class'=>'form-control']);?>

	 			<?php echo form_error('user_password', '<div class="text-danger">', '</div>');?>
	 			<?php echo form_input(['type'=>'password', 'name'=>'user_password', 'placeholder'=>'Password', 'class'=>'form-control']);?>
				<?php echo form_input(['type'=>'submit', 'name'=>'login', 'value'=>'Login', 'class'=>'form-control btn btn-primary']);?>
				<?php echo form_close();?>
			</div>
		</div>