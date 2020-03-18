<?php defined('safe_access') or die('Restricted access!'); ?>
<style type="text/css">
    ::-webkit-input-placeholder {
        /* Chrome/Opera/Safari */
        color: #ffffff;
    }

    ::-moz-placeholder {
        /* Firefox 19+ */
        color: #ffffff;
    }

    :-ms-input-placeholder {
        /* IE 10+ */
        color: #ffffff;
    }

    :-moz-placeholder {
        /* Firefox 18- */
        color: #ffffff;
    }

    @media (max-width: 767px) {
        .uk-position-bottom-right {
            bottom: 0;
            left: 28px;
            top: -10px;
            text-align: left !important;
        }

        .md-card .md-card-content {
            padding-bottom: 75px;
        }

    }

</style>
<div id="page_content">
    <div id="page_content_inner">

        <div class="tutor-home-header">
            <div class="home-header-item ">
                <div class="form-group field-signupform-locale required">

                    <select id="filter_city" name="filter_city" class="form-control">
                        <option value="">City</option>
                        <?php
                                foreach ($city as $cit) {
                                    ?>
                        <option value="<?php echo ($cit->city == 'Select City') ? '1' : $cit->id; ?>"><?php echo $cit->city; ?></option>
                        <?php
                                }
                                ?>
                    </select>
                </div>
            </div>
            <div class="home-header-item panel-job-location">
                <div class="form-group field-signupform-locale required" id="location_show">

                    <select id="filter_location" name="filter_location" class="form-control">
                        <option value="">Location</option>
                    </select>
                </div>
            </div>
            <div class="home-header-item">
                <div class="form-group field-signupform-locale required">

                    <select id="filter_category" name="filter_category" class="form-control">
                        <option value="">Category</option>
                        <?php if (!empty($category)) {
                                    // unset($category[0]);
                                    ?>
                        <?php
                                    foreach ($category as $cat) {
                                        ?>
                        <option value="<?php echo $cat->id; ?>"><?php echo $cat->category; ?></option>
                        <?php
                                    }
                                }
                                ?>
                    </select>
                </div>
            </div>
            <div class="home-header-item panel-job-location">
                <div class="form-group field-signupform-locale required" class="form-control" id="class_show">

                    <select id="filter_class" name="filter_class" class="form-control">
                        <option value="">Class</option>
                    </select>
                </div>
            </div>
            <div class="home-header-item ">
                <div class="form-group field-signupform-locale required">

                    <select id="filter_gender" name="filter_gender" class="form-control">
                        <option value="">Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1" id="job_list_show">

                <!-new--->


                    <?php
                foreach ($jobs as $job) {
                    ?>

                    <div class="tutor-post-block">

                        <div class="tutor-post-header">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Need a tutor for <?php echo $job->sub_cat; ?> student</h4>
                                </div>
                                <div class="job-id">
                                    Job ID - <?php echo $job->id; ?>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="p-2 p-r">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span> <?php echo $job->city; ?>, <?php echo $job->location; ?></span>
                                </div>
                                <div class="p-2 posted-date p-r">
                                    <?php echo date('jS F, Y', strtotime($job->created_at)); ?>
                                </div>
                            </div>
                        </div>
                        <div class="tutor-post-body-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class=" class">Class: <span> <?php echo $job->sub_cat; ?></span></p>

                                    <?php if($job->subs != ''){ ?>
                                    <p>Subjects : <span class="all-sub"><?php echo $job->subs; ?></span> </p>
                                    <?php } ?>

                                    <?php if($job->tutoring_time != ''){ ?>
                                    <p>Tutoring Time : <span class="time"><?php echo date('h:i a', strtotime($job->tutoring_time)); ?></span> </p>
                                    <?php } ?>
                                    <p>tutoring duration : <span>1 hour</span></p>

                                    <p><?php echo $job->days_per_week; ?> <?php echo $job->days_per_week == 1 ? 'day' : 'days' ?> per week</p>

                                    <p>Salary: <span class="sallery-text"><?php echo $job->salary_range; ?> Tk</span> </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="tutor-gender">Tutor gender requrement : <span> <?php echo $job->preferred_gender; ?></span> </p>

                                    <p>Requirements : <span><?php echo $job->other_req; ?></span></p>
                                    <p>Special notes : <span></span></p>
                                </div>
                            </div>
                        </div>

                        <div class="tutor-footer-top">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class=" category">Category: <span><?php echo $job->category; ?></span></p>
                                </div>
                                <div>
                                    <p class=" gender">Student Gender: <span> <?php echo $job->student_gender; ?></span> </p>
                                </div>
                                <div>
                                    <p> No. of Students : <span class="student-txt"><?php echo $job->no_of_student; ?></span> </p>
                                </div>
                            </div>
                        </div>


                        <div class="d-flex justify-content-between">
                            <div class="">
                                <div class="outer_share" style="">
                                    <div id="inner_share">
                                        <share-button style="color: #1f2c44;" data-url="<?php echo base_url('landing/job_board_single/'.$job->id); ?>" data-title="Need a tutor for <?php echo $job->sub_cat; ?> student"></share-button>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="tutor-post-footer text-right">
                                    <?php
                                        $tutor_applied_jobs = array();
                                        foreach ($applied_jobs as $applied_job) {
                                            $tutor_applied_jobs[] = $applied_job['job_id'];
                                        }
                                        ?>
                                    <div id="apply_button_disabled_<?php echo $job->id; ?>">
                                        <?php if (in_array($job->id, $tutor_applied_jobs)) { ?>
                                        <div class="uk-width-medium-1">
                                            <a class="md-btn md-btn-flat disabled" style="padding-top: 8px; padding-bottom: 8px; font-size: 14px;background: #eaeaea !important;" href="javascript:void(0)">Applied</a>
                                        </div>
                                        <!--<a class="uk-badge uk-badge-success uk-badge-square-edge uk-width-1-2 disabled" href="javascript:void(0)">Applied</a>-->
                                        <?php } else { ?>
                                        <div class="uk-grid" style="margin: 10px 0px 10px 0px">
                                            <?php if ($job->latitude != 0 && $job->longitude != 0): ?>
                                            <a class="get_location uk-badge uk-badge-danger uk-badge-square-edge uk-width-1-3" style="padding: 8px !important; font-size: 14px;" href="javascript::" data-map_gen="false" data-map_lat="<?php echo $job->latitude ?>" data-map_lng="<?php echo $job->longitude ?>" data-job_id="<?php echo $job->id; ?>" data-uk-toggle="{target:'#collapse_<?php echo $job->id ?>'}">Location</a><br>

                                            <!-- Map Javascript Api -->
                                            <!-- <a class="get_location uk-badge uk-badge-danger uk-badge-square-edge uk-width-1-3" style="padding: 8px !important; font-size: 14px;" href="javascript::" data-map_lat="<?php echo $job->latitude ?>" data-map_lng="<?php echo $job->longitude ?>" data-job_id="<?php echo $job->id; ?>">Location</a><br>
                                                        <a class="get_direction uk-badge uk-badge-warning uk-badge-square-edge uk-width-1-3" style="padding: 8px !important; font-size: 14px;" href="javascript::" data-map_lat="<?php echo $job->latitude ?>" data-map_lng="<?php echo $job->longitude ?>" data-job_id="<?php echo $job->id; ?>">Direction</a><br> -->

                                            <!-- Map Static Api -->
                                            <!-- <a class="get_location uk-badge uk-badge-danger uk-badge-square-edge uk-width-1-3" style="padding: 8px !important; font-size: 14px;" href="javascript::" data-map_gen="false" data-map_lat="<?php echo $job->latitude ?>" data-map_lng="<?php echo $job->longitude ?>" data-job_id="<?php echo $job->id; ?>">Location</a><br> -->
                                            <a class="get_direction uk-badge uk-badge-warning uk-badge-square-edge uk-width-1-3" style="padding: 8px !important; font-size: 14px;" href="javascript::" data-map_lat="<?php echo $job->latitude ?>" data-map_lng="<?php echo $job->longitude ?>" data-job_id="<?php echo $job->id; ?>">Direction</a><br>
                                            <?php endif; ?>
                                            <a class="uk-badge uk-badge-success uk-badge-square-edge uk-width-1-3" style="padding: 8px !important; font-size: 14px;" href="#apply_confirmation_<?php echo $job->id; ?>" data-job_id="<?php echo $job->id; ?>" data-uk-modal="{center:true}">Apply</a><br>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>









                    </div>






                    <div id="collapse_<?php echo $job->id ?>" class="uk-hidden">
                        <div class="uk-grid" data-uk-grid-margin style="margin: 10px 0px 10px 3px; position: relative">
                            <div class="uk-width-medium-4-4 uk-width-large-4-4 uk-text-right">
                                <button id="close_map" data-job_id="<?php echo $job->id; ?>" class="uk-badge uk-badge-danger uk-badge-square-edge" style="width: 10px 5px 10px 5px" type="button" name="button">X</button>
                            </div>

                            <!-- Map Javascript Api -->
                            <div class="uk-width-medium-4-4 uk-width-large-2-4"></div>
                            <div class="uk-width-medium-4-4 uk-width-large-2-4" id="map_location_<?php echo $job->id; ?>" style="height: 300px"></div>
                            <!-- <div class="uk-width-medium-2-4 uk-width-large-2-4" id="map_direction_panel_<?php echo $job->id; ?>" style="height: 300px; overflow: scroll"></div> -->

                            <!-- Map Static Api -->
                            <!-- <div class="uk-width-medium-4-4 uk-width-large-2-4" id="static_api_image_<?php echo $job->id; ?>" style="height: 300px"></div> -->
                            <!-- <div class="uk-width-medium-4-4 uk-width-large-4-4" style="padding-left: 0 !important">
                                        <hr>
                                        <p>The exact location of this tuition job is inside this 100-meter circle</p>
                                    </div> -->
                        </div>
                    </div>
                    <?php
                }
                ?>
                    <!-new--->




                        <br />
                        <nav>
                            <center style="border-bottom: none;"><?php echo $links; ?></center>
                        </nav>
            </div>
        </div>
    </div>

    <?php foreach ($jobs as $job) { ?>
    <div class="uk-modal" id="apply_confirmation_<?php echo $job->id; ?>">
        <div class="uk-modal-dialog">
            <button class="uk-modal-close uk-close" type="button"></button>
            <div class="uk-modal-header" style="border-bottom: 1px solid #ddd !important;">
                <h3 class="uk-modal-title">Please Confirm</h3>
            </div>

            <div class="uk-margin-medium-bottom" id="generic_question_div_<?php echo $job->id; ?>">
                <p>You are applying to teach a <b><?php echo $job->student_gender; ?> <?php echo $job->category; ?></b> student of <b><?php echo $job->sub_cat; ?></b>.</p>
                <p>You have to teach <b><?php echo $job->days_per_week; ?> <?php echo $job->days_per_week == 1 ? 'day' : 'days' ?> per week</b> and you'll be paid <b>BDT <?php echo $job->salary_range; ?></b> per month.</p>
                <p>Are you sure to apply for this job?</p>
            </div>

            <div class="uk-modal-footer" id="uk_modal_footer_<?php echo $job->id; ?>">
                <div class="uk-form-row">
                    <button type="button" class="uk-float-right md-btn md-btn-primary apply_job_yes" data-salary_range="<?php echo $job->salary_range; ?>" data-days_per_week="<?php echo $job->days_per_week; ?>" data-student_gender="<?php echo $job->student_gender; ?>" data-sub_cat="<?php echo $job->sub_cat; ?>" data-category="<?php echo $job->category; ?>" data-job_id="<?php echo $job->id; ?>">Yes</button>
                    <button type="button" id="btnNo" class="uk-modal-close uk-float-right md-btn md-btn-warning apply_job_no">No</button>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
