<div class="" ><!--view profile-->
	<div class="col-md-9">
	
		<div class="panel panel-default">
			<div class="panel-heading" style="text-align: left;">
				<h5 class="panel-title" style="font-size: 18px;"><b><i class="fa fa-user"></i> All Request</b></h5>
			</div>
			<div class="panel-body">
		
				<div class="row">
					<?php 
					if (count($profile)>0)
					{
						foreach ($profile as $row)
						{
					?>
						<div>
							<div class="col-md-5">
								<p><?php echo $row->institute;?></p>
							</div>
							<div class="col-md-5">
								<p><?php echo $row->updated_at;?></p>
							</div>
							<div class="col-md-2">
								<p>
									<?php 
										if ($row->status != 'done')
										{
											echo "<a href='".base_url()."parents/show_req/".$row->id."'>show</a>";
										}
									?>
								</p>
							</div>
						</div>
					<?php 
						}
					}
					else 
					{
					?>
					<div>
						<b>No request found</b>
					</div>
					<?php 
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>