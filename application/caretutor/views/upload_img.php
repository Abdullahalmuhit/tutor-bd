<div class="" ><!--view profile-->
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading" style="text-align: left;">
				<h5 class="panel-title" style="font-size: 18px;"><b><i class="fa fa-image"></i> Profile Picture</b></h5>
			</div>
			<div class="panel-body">
				<div class="row">
					<div>
						<div class="col-md-9">
						
							<?php 
							echo $error;
							$myarr = array('id' => 'profile_pic');
							?>
							<?php echo form_open_multipart('tutor/do_upload', $myarr);?>							
							<input type="file" name="userfile" size="20" />							
							<br /><br />							
							<button class="btn btn-success" type="submit" >Upload</button>							
							</form>
							
						</div>
						<div class="col-md-3 pull-right row">
							<img class="thumb" src="<?php echo ((count($profile)>0) && ($profile->profile_pic != ''))?base_url().'assets/upload/'.$profile->profile_pic:base_url().'assets/img/images.jpg';?>" alt="Profile Picture" />
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>