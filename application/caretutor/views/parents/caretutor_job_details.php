<?php defined('safe_access') or die('Restricted access!'); ?>


    <div id="page_content">
        <div id="page_heading">
            <h1 class="page_title"><a href="#">Need a <?php echo $job[0]->category.' - '.$job[0]->sub_cat; ?> Tutor</a></h1>
            <?php if(!empty($job[0]->subs)){ ?>
            	 <div class="uk-form-row md-input-wrapper">
                 <label>Subjects : </label><span class="uk-text-muted uk-text-upper uk-text-small"><?php echo $job[0]->subs; ?></span>
                 </div>
            <?php } ?>
      

            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
            	<div class="uk-width-xLarge-2-10 uk-width-large-1-1 uk-margin-top">
                    
                        <h1 class="page_title">
                                    Contact Info
                        </h1>
                        <div class="md-card-content">
                            <div class="uk-grid uk-grid-medium">
                                <div class="uk-width-large-1-2 uk-width-medium-1-1">
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-1">
                                            <span class="uk-text-hilight">Name</span>
                                        </div>
                                        <div class="uk-width-large-1-1">
                                            <span class="uk-text-large uk-text-middle"><?php echo $job[0]->full_name; ?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-1">
                                            <span class="uk-text-hilight">E-mail</span>
                                        </div>
                                        <div class="uk-width-large-1-1">
                                            <?php echo $job[0]->email; ?>
                                        </div>
                                    </div>
                                    
                                </div>
                                  <div class="uk-width-large-1-2 uk-width-medium-1-1">
                                   
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-1">
                                            <span class="uk-text-hilight">Phone</span>
                                        </div>
                                        <div class="uk-width-large-1-1">
                                            <span class="uk-text-large uk-text-middle"><?php echo $job[0]->mobile_no; ?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-1">
                                            <span class="uk-text-hilight">Address</span>
                                        </div>
                                        <div class="uk-width-large-1-1">
                                            <?php echo $job[0]->address; ?>
                                        </div>
                                    </div>
                                    <hr class="uk-grid-divider uk-hidden-large">
                                </div>
                            </div>
                        </div>
                    
                    
                </div>

            	<div class="uk-width-xLarge-2-10 uk-width-large-1-1 uk-margin-top">
                   
                            <h1 class="page_title uk-margin-top">
                                Requirement details
                            </h1>
                       
                        <div class="md-card-content large-padding">
                            <div class="uk-grid uk-grid-medium">
                                <div class="uk-width-large-1-1">
                                     <div class="uk-form-row">                                                
                                        <div class="uk-form-row md-input-wrapper">
                                          <label>Job ID</label>                                                   
                                          <span class="uk-text-large uk-text-middle"><?php echo $job[0]->id; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-width-large-1-2">                       
                                    
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-1">
                                            <span class="uk-text-hilight">Category</span>
                                        </div>
                                        <div class="uk-width-large-1-1">
                                            <span class="uk-text-large uk-text-middle"><?php echo $job[0]->category; ?></span>
                                        </div>
                                    </div>
                                   
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-1">
                                            <span class="uk-text-hilight">Class</span>
                                        </div>
                                        <div class="uk-width-large-1-1">
                                            <?php echo $job[0]->sub_cat; ?>
                                        </div>
                                    </div>
                                   
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-1">
                                            <span class="uk-text-hilight">Preferred gender</span>
                                        </div>
                                        <div class="uk-width-large-1-1">
                                            <?php echo $job[0]->preferred_gender; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-1">
                                            <span class="uk-text-hilight">Weekly</span>
                                        </div>
                                        <div class="uk-width-large-1-1">
                                            <?php echo $job[0]->days_per_week; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-1">
                                            <span class="uk-text-hilight">Student Gender</span>
                                        </div>
                                        <div class="uk-width-large-1-1">
                                            <?php echo $job[0]->student_gender; ?>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="uk-width-large-1-2">
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-1">
                                            <span class="uk-text-hilight">Salary</span>
                                        </div>
                                        <div class="uk-width-large-1-1">
                                            Tk. <?php echo $job[0]->salary_range; ?>
                                        </div>
                                    </div>
									
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-1">
                                            <span class="uk-text-hilight">Hire Date</span>
                                        </div>
                                        <div class="uk-width-large-1-1">
                                            <?php echo date("jS F \, Y",strtotime($job[0]->date_to_hire)); ?>
                                        </div>
                                    </div>
                                    
                                    <p>
                                        <span class="uk-text-hilight uk-display-block uk-margin-small-bottom">Description</span>
                                        <?php echo $job[0]->other_req; ?>
                                    </p>
                                </div>
                                <div class="uk-width-large-1-1">
                                    <?php if ($job[0]->status == 'post'): ?>
                                        <div class="uk-form-row uk-float-right">
                                            <a class="md-btn md-btn-success uk-margin-medium-top uk-margin-medium-bottom " href="<?php echo base_url('parents/job_edit/'.$job[0]->id);?>" style="padding: 10px 25px;">Edit</a>  
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    
                </div>
            
                               
                
            </div>
			
        </div>
    </div>