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
					<!-- Breadcrumbs-->
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="<?php echo 'index';?>">Dashbord</a>
							</li>
							<li class="breadcrumb-item active">Portfolio</li>
						</ol>
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="page-heading"> <i class="fa fa-magic"></i> Portfolio</div>
							</div> <!-- /panel-heading -->
							<div class="panel-body">
								<div class="col-lg-12">	
									<!-- /.notifications -->
									<div>
										<!-- Nav tabs -->
										<ul class="nav nav-tabs admin-tabs">
											<li class="active"><a href="#create-portfolio" data-toggle="tab"><span class="fa fa-plus"></span> Create Portfolio</a>
											</li>
											<li><a href="#portfolio-list" data-toggle="tab"><span class="fa fa-th-list"></span> Portfolio List</a>
											</li>
										</ul>

										<!-- Tab panes -->
										<div class="tab-content">

											<div class="tab-pane fade in active" id="create-portfolio">
												<div class="panel panel-default">														
													<!-- /.panel-heading -->
													<div class="panel-body"> 
	
	<?php echo form_open_multipart('admin_ct/make_portfolio', ['class'=>'form-horizontal form-groups-bordered validate']); ?> 
	<?php 
		if($this->session->flashdata('errors')):
		 echo "<div class='text-danger'>".$this->session->flashdata('errors')."</div><br />";
		endif;
		
		if($this->session->flashdata('success')):
		 echo "<div class='text-success'>".$this->session->flashdata('success')."</div><br />";
		endif;
	?>
	<div class="form-group">
			<label class="col-sm-3 control-label"><span class="fa fa-file-text"></span> Name</label>
			<div class="col-sm-5">				
				<?php echo form_error('portfolio_title', '<div class="text-danger" style="padding-left:4%;">', '</div>');?>
				<?php echo form_input(['name'=>'portfolio_title', 'class'=>'form-control', 'type'=>'text', 'placeholder'=>'Name']); ?>
			</div>
		</div>
	
		<div class="form-group">
			<label class="col-sm-3 control-label"><span class="fa fa-eye"></span> Description</label>
			<div class="col-sm-5">	
				<?php echo form_error('portfolio_description', '<div class="text-danger" style="padding-left:4%;">', '</div>');?>
				<?php echo form_textarea(['name'=>'portfolio_description', 'maxlength'=>'235', 'class'=>'form-control tinymce', 'type'=>'text', 'placeholder'=>'Description']); ?>
				<div class="textarea_count"><div class="textarea_total">*Up to 220 letter.</div></div>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3 control-label"><span class="fa fa-image"></span> Image</label>
			<div class="col-sm-5">
				<div class="form-group" style="padding-left:3.5%;">
					<?php echo form_upload(['name'=>'portfolio_image_address', 'required'=>'', 'class'=>'file form-control', 'ata-preview-file-type'=>'any', 'accept'=>'image/*']);?>
				</div>	
			</div>
		</div>
			

		<div class="form-group">
		  <div class="col-sm-offset-3 col-sm-5">
			  <?php echo form_submit(['name'=>'submit', 'class'=>'btn btn-primary', 'type'=>'submit', 'value'=>'Publish']);?>
		  </div>
		</div>
	
	
				
	<?php echo form_close(); ?> 
											</div>
											<!-- /.panel-body -->
											</div>
											<!-- /.panel -->
											</div>
											
											
											<div class="tab-pane fade" id="portfolio-list">
												 
												<!-- /.row -->
												<div class="row">
													<div class="col-lg-12">
														<div class="panel panel-default r_data_table">
														
															<div class="panel-heading">
																<div class="page-heading"> <i class="fa fa-edit"></i> Manage Slide</div>
															</div> <!-- /panel-heading -->														
															<!-- /.panel-heading -->
															<div class="panel-body"> 
			<!--responsive table-->
			<div class="dataTable_wrapper">
				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
					<thead>
						<tr>
							<th><span class="fa fa-sort"></span> ID</th>
							<th><span class="fa fa-image"></span> Image</th>
							<th><span class="fa fa-file-text"></span> Name</th>
							<th><span class="fa fa-eye"></span> Description</th>
							<th><span class="fa fa-eraser"></span> Action</th>
						</tr>
					</thead>
					<tbody>
			
	<?php if(count($portfolio_list)):?>
	<?php foreach($portfolio_list as $portfolio_row):?>
	<?php
		echo"<tr>";
		
		echo"<td>". $portfolio_row->portfolio_id ."</td>";
		
		echo"<td><img src='". base_url('assest/images/portfolio/'.$portfolio_row->portfolio_image_address)."' width='30' class='img-responsive' /></td>";
		
		echo"<td><a href='single_portfolio/{$portfolio_row->portfolio_id}' class='right-tooltip' data-original-title='".$portfolio_row->portfolio_title."'>". $portfolio_row->portfolio_title ."</a></td>";
		
		echo"<td>". word_limiter($portfolio_row->portfolio_description,5) ."...</td>";		
		
		echo"<td>";
		
		echo"<a href='single_portfolio/{$portfolio_row->portfolio_id}' data-original-title='View' class='btn btn-primary btn-xs left-tooltip'> View</a>&nbsp;";
		
		echo"<a href='#' data-original-title='Edit' class='btn btn-warning btn-xs top-tooltip' data-toggle='modal' data-target='#modal_edit".$portfolio_row->portfolio_id."'> Edit</a>&nbsp;";
		
		echo"<a href='portfolio_delete/{$portfolio_row->portfolio_id}' data-original-title='Delete' class='btn btn-danger btn-xs right-tooltip' onClick='return confirm(\"Do you want to delete {$portfolio_row->portfolio_title}?\")'> Delete</a>&nbsp;";
		
		echo"</td>";
		
		echo"</tr>";
	
	
	?>
	<?php endforeach;?>
	<?php else:?>
	<p>There is nothing!</p>
	<?php endif;?>  
					</tbody>
				</table>
			</div>
			<!-- /.table-responsive -->                            
	
	
	<?php if(count($portfolio_list)):?>
    <!-- ============ MODAL EDIT slider =============== -->
   <?php foreach($portfolio_list as $portfolio_row):?>
        <div class="modal fade" id="modal_edit<?php echo $portfolio_row->portfolio_id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Edit</h3>
            </div>
			<?php echo form_open_multipart("admin_ct/update_portfolio/{$portfolio_row->portfolio_id}", ['class'=>'form-horizontal form-groups-bordered validate']); ?> 
                <div class="modal-body" style="height:400px; overflow:auto;">

                    <div class="form-group">
                        <label class="control-label col-xs-3" ></label>
                        <div class="col-xs-8">
                            <img src='<?php echo base_url('assest/images/portfolio/'.$portfolio_row->portfolio_image_address); ?>' width='300' class='img-responsive' />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Image</label>
                        <div class="col-xs-8">
                            <?php echo form_upload(['name'=>'portfolio_image_address', 'class'=>'file form-control', 'ata-preview-file-type'=>'any', 'accept'=>'image/*']);?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Name</label>
                        <div class="col-xs-8">
							<?php echo form_input(['name'=>'portfolio_title', 'class'=>'form-control', 'type'=>'text', 'placeholder'=>'Description', 'value'=>$portfolio_row->portfolio_title]); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Description</label>
                        <div class="col-xs-8">
							<?php echo form_textarea(['name'=>'portfolio_description', 'maxlength'=>'235', 'class'=>'form-control tinymce', 'type'=>'text', 'value'=>$portfolio_row->portfolio_description]); ?><div class="textarea_count"><div class="textarea_total">*Up to 235 letter</div></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" ></label>
                        <div class="col-xs-8">
                            <?php echo form_submit(['name'=>'update', 'class'=>'btn btn-warning', 'type'=>'submit', 'value'=>'Update']);?>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>                     
                </div>
            </form>
            </div>
            </div>
        </div>

    <?php endforeach;?>
	<?php endif;?>  
    <!--END MODAL ADD BARANG-->





														</div>
															<!-- /.panel-body -->
														</div>
														<!-- /.panel -->
													</div>
													<!-- /.col-lg-12 -->
												</div>
												<!-- /.row -->
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

	<!-- footer -->
	<?php require("footer.php");?>
	<!--end footer-->

	</div>
	</body>

</html>