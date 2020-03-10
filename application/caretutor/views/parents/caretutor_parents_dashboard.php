<?php defined('safe_access') or die('Restricted access!'); ?>
<style type="text/css">
    @media (max-width: 480px) {
        .uk-width-small-1-3, .uk-width-small-2-3{
          width: auto;
        }
    }
</style>
<div id="page_content">
    <div id="page_content_inner">
    <?php if ($this->session->userdata('gretings')) { ?>
            <div class="uk-alert uk-alert-success uk-text-bold uk-text-center"> You have successfully posted your tutor requirements. Best matched tutor profile coming soon. Thank you for choosing our platform. </div>
        <?php } ?>
<div  class="wrapper d-flex align-items-stretch">
        <!-- Page Content  -->
        <div id="content" class="">
            <div class="container">
                <!-- <?php if ($this->session->userdata('gretings')) { ?>
            <div class="uk-alert uk-alert-success uk-text-bold uk-text-center"> You have successfully posted your tutor requirements. Best matched tutor profile coming soon. Thank you for choosing our platform. </div>
        <?php } ?> -->
                <div class="tutor-profile-header text-center">
                    <h4>Tutor Profile</h4>
                </div>
                <div class="tutor-profile">
                    <div class="row">
                        
                        <div class="item-b col-md-4">
                            <div style="margin-right: 15px;" class="tutor-profile-content">
                                <div class="tutor-profile-content-header text-center">
                                    <img src="<?php echo base_url();?>assets/img/h3.png" class="img-fluid" alt="">
                                    <p>Rizvi Ahmed</p>
                                    <button type="button" class="btn">View profile</button>
                                </div>

                            </div>
                            <div class="tutor-profile-body">
                                <div class="p-institute">
                                    <h5>Current Institute</h5>
                                    <span>Dhaka University</span>
                                </div>
                                <div class="p-experience">
                                    <h5>Experience</h5>
                                    <span>5 Years</span>
                                </div>
                                <div class="p-requirment-match">
                                    <h5>Requirment Match</h5>
                                    <div class="progress requirment-progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">75%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            

            <div class="container">
                <div class="tutor-profile-header text-center">
                    <h4>Job Details</h4>
                </div>
                <div class="job-details">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">

                                <div class="item col-md-4">
                                    <div class="job-details-content text-center">
                                        <span>Job ID 197654</span>
                                        <h5>Need a tutor for Class 2</h5>
                                        <span class="date-text">Posted on Feb 18, 2020</span>
                                    </div>
                                    <div class="job-details-btn text-center">
                                        <button style="margin-right: 10px" type="button" class="btn"><a href="parent-job-edit.html">Edit</a></button>
                                        <button style="margin-left: 10px" type="button" class="btn "><a href="parent-job-view.html">View</a></button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="job-details-content text-center">
                                        <span>Job ID 197654</span>
                                        <h5>Need a tutor for Class 4</h5>
                                        <span class="date-text">Posted on Feb 18, 2020</span>
                                    </div>
                                    <div class="job-details-btn text-center">
                                        <button style="margin-right: 10px" type="button" class="btn"><a href="parent-job-edit.html">Edit</a></button>
                                        <button style="margin-left: 10px" type="button" class="btn "><a href="parent-job-view.html">View</a></button>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="job-details-content text-center">
                                        <span>Job ID 197654</span>
                                        <h5>Need a tutor for Class 3</h5>
                                        <span class="date-text">Posted on Feb 18, 2020</span>
                                    </div>
                                    <div class="job-details-btn text-center">
                                        <button style="margin-right: 10px" type="button" class="btn"><a href="parent-job-edit.html">Edit</a></button>
                                        <button style="margin-left: 10px" type="button" class="btn "><a href="parent-job-view.html">View</a></button>
                                    </div>
                                </div>



                            </div>

                        </div>
                    </div>
                </div>


            </div>

            <div class="container">

            </div>
        </div>
    </div>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <div class="uk-modal" id="mailbox_new_message" id="page_content">
        
    <div class="uk-modal-dialog" id="page_content_inner">
        <button class="uk-modal-close uk-close" type="button"></button>
        <form method="post" id="job_add_form" class="uk-form-stacked new_job_add">
            <input type="hidden" value="1" name="step" id="step" />
            <div id="req_step_one">
                <div class="uk-modal-header">
                    <h3 class="uk-modal-title">New Requirements</h3>
                </div>

                <div class="uk-form-row">
                    <label for="selcity" class="uk-form-label">City</label>
                    <select class="selcity" id="selcity" name="selcity" data-md-selectize >
                        <option value="">Select One</option>
                        <?php
                        foreach ($city as $cit) {
                            ?>
                            <option value="<?php echo ($cit->city == 'Select City') ? '' : $cit->id; ?>"><?php echo $cit->city; ?></option>
    <?php
}
?>
                    </select>
                </div>

                <div class="uk-form-row">
                    <label for="selcity" class="uk-form-label">Location</label>
                    <div class="location_dropdown">
                        <select id="sellocation" class="sellocation" name="sellocation" data-md-selectize>
                            <option value="">Select Location</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label for="selcat" class="uk-form-label">Category</label>
                    <select id="selcat" name="selcat" class="selcat" data-md-selectize >
                        <option value="">Select One</option>
                        <?php
                        foreach ($category as $cat) {
                            ?>
                            <option value="<?php echo ($cat->category == 'Select Category') ? '' : $cat->id; ?>"><?php echo $cat->category; ?></option>
    <?php
}
?>
                    </select>
                </div>

                <div class="uk-form-row">
                    <label for="selsubcat" class="uk-form-label">Class / Course</label>
                    <div class="sub_category_dropdown">
                        <select id="selsubcat" class="selsubcat" name="selsubcat" data-md-selectize >
                            <option value="">Select Class/Course</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label for="selstgender" class="uk-form-label">Student Gender</label>
                    <div class="selstgender_dropdown">
                        <select id="selstgender" class="selstgender" name="selstgender" data-md-selectize >
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label for="institute_name" class="uk-form-label">Institute Name</label>
                    <input type="text" class="md-input" id="institute_name" name="institute_name" placeholder="Institute Name"/>
                </div>
            </div>

            <div id="req_step_two" style="display: none;">

                <div class="subject_show">

                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="subject">Curriculum: </label>
                    <div id="english_medium" style="display: none;">
                        <p>
                            <input type="radio" name="english_medium_from" id="Cambridge" value='cambridge' data-md-icheck />
                            <label for="Cambridge" class="inline-label">Cambridge</label>
                        </p>

                        <p>
                            <input type="radio" name="english_medium_from" id="Ed-excel" value='ed_excel' data-md-icheck />
                            <label for="Ed-excel" class="inline-label"> Ed-excel </label>
                        </p>

                        <p>
                            <input type="radio" name="english_medium_from" id="IB" value='ib' data-md-icheck />
                            <label for="IB" class="inline-label"> IB </label>
                        </p>
                    </div>

                    <div id="bangla_medium" style="display: none;">
                        <p>
                            <input type="radio" name="bangla_medium_from" id="Bangla version" value='bangla_version' data-md-icheck />
                            <label for="Bangla version" class="inline-label"> Bangla version </label>
                        </p>

                        <p>
                            <input type="radio" name="bangla_medium_from" id="English version" value='english_version' data-md-icheck />
                            <label for="English version" class="inline-label"> English version </label>
                        </p>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label for="selgender" class="uk-form-label">Tutor gender reference</label>
                    <select id="selgender" name="selgender" class="selgender" data-md-selectize>
                        <option value="">Tutor gender reference</option>
                        <option value="Any">Any</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="uk-form-row">
                    <label for="selday" class="uk-form-label">Days in a week</label>
                    <select id="selday" name="selday" class="selday" data-md-selectize>
                        <option value="">Days in a week</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                </div>

                <div class="uk-form-row">
                    <label for="tutoring_time" class="uk-form-label">Tutoring Time</label>
                    <input type="text" class="md-input" id="tutoring_time" name="tutoring_time" data-uk-timepicker="{format:'12h'}" placeholder="Tutoring Time"/>
                </div>

                <div class="uk-form-row">
                    <label for="salary_range" class="uk-form-label">Salary</label>
                    <input type="number" class="md-input" id="salary_range" name="salary" placeholder="Salary range"/>
                </div>

                <div class="uk-form-row">
                    <label for="date_to_hire" class="uk-form-label">Hire Date</label>
                    <input class="md-input" name="date_to_hire" type="text" id="date_to_hire" data-uk-datepicker="{format:'DD.MM.YYYY'}"  />
                </div>

                <div class="uk-form-row" id="skype_id_div" style="display: none;">
                    <label for="name"></label>
                    <input type="text" class="md-input" id="skype_id" name="skype_id" placeholder="Please provide your Skype ID" >
                </div>

                <div class="uk-form-row">
                    <label for="select_city" class="uk-form-label">Details address</label>
                    <textarea name="address" id="address" cols="30" rows="6" class="md-input" ></textarea>
                </div>

                <div class="uk-form-row">
                    <label for="selday" class="uk-form-label">No of students</label>
                    <select id="selday" name="selday" class="selday" data-md-selectize>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>

                <div class="uk-form-row">
                    <label for="selday" class="uk-form-label">How did you hear about us</label>
                    <select class="form-control selhear" id="selhear" name="selhear" data-md-selectize>
                        <!-- <option value="0">How did you hear about us?</option> -->
                        <option value="1">From Friends & Family</option>
                        <option value="2">From Facebook</option>
                        <option value="3">From Google</option>
                        <option value="4">From Shop</option>
                        <option value="5">Others</option>
                    </select>
                </div>
                <div class="uk-form-row">
                    <label for="select_city" class="uk-form-label">More about your  requirement</label>
                    <textarea name="otherreq" id="otherreq" cols="30" rows="6" class="md-input" data-uk-tooltip="{pos:'bottom'}" title="Describe elaborately if you <br/>select multiple students."></textarea>
                </div>
            </div>

            <div class="uk-modal-footer" style="margin-top: 20px;">
                <div class="uk-form-row">
                    <button type="submit" class="uk-float-right md-btn md-btn-primary" id="submit_form">Continue</button>
                    <button type="button" id="back_to_first_form" class="uk-float-left md-btn md-btn-success" style="display: none;">Back</button>
                </div>
            </div>
        </form>
    </div>
</div>

    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 3,
                        nav: false
                    },
                    1000: {
                        items: 3,
                        nav: true,
                        loop: false,
                        margin: 20
                    }
                }
            })
        })
    </script>
</body>


