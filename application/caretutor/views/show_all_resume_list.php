<div class="" ><!--view profile-->
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading" style="text-align: left;">
				<h5 class="panel-title" style="font-size: 18px;"><b><i class="fa fa-file-text"></i> All CV</b></h5>
			</div>
			<div class="panel-body">
				<div class="row">
					<?php 
					if (count($profile)>0)
					{
						$num = 0;
						//echo "<pre>";
						//var_dump($profile);
						//echo "</pre>";
						foreach ($profile as $row)
						{
					?>
						<div>
							<div class="col-md-5">
								<p>
									<?php
										if ($row->status != 'done')
										{
									?>
											<input type="radio" style="margin-right:10px;" name="selected_tutor" value="<?php echo $row->tutor_id; ?>" <?php if(!$num++){ echo "checked=\"checked\""; } ?> /> 
									<?php
										}
									?>
									<?php echo $row->full_name;?>
								</p>
							</div>
							<div class="col-md-2">
								<p>
									<?php 
										if ($row->status != 'done')
										{
											echo "<a target='_blank' href='".base_url()."parents/show_profile/".$row->tutor_id."'>show</a>";
										}
									?>
								</p>
							</div>
							<div class="clearfix"></div>
						</div>
					<?php
						}
					?>
						<div class="clearfix"></div>
						<div><button type="button" data-job_id="<?php echo $profile[0]->job_id; ?>" class="btn btn-success pull-right select_tutor" style="padding:6px 12px; border-radius:4px; margin-right:20px;"><span class="fa fa-check" style="color:#FFF;"></span> SELECT TUTOR</button></div>
					<?php
					}
					else 
					{
					?>
					<div>
						<b>No cv found</b>
					</div>
					<?php 
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>