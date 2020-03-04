<?php echo $header;?>
<style>
	.modal-header hr {
	    margin-top: 0 !important;
	    margin-bottom: 0 !important;
	}

	.modal-body{
		padding: 30px !important;
	}

	.modal-footer{
		padding-top : 15px !important;
	}
	body.modal-open {
		overflow: auto !important;
	}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<body>
    <!-- SCROLL TOP BUTTON -->
    <!--<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>-->
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
   <?php $this->load->view('frontend_menu'); ?>

    <!--=========== End HEADER SECTION ================-->

    <!--=========== BEGAIN BLOG SECTION ================-->
    <section id="blog">
 
    <div class="job-board-main-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="job-board-header">
                        <h4>Tutor jobs in Dhaka City</h4>
                        <div class="breadcumb">
                            <span><a href="index.html">Home</a></span> <span class="arrow">></span> <span class="bread-active"><a href="job-board.html">Jobs board</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="job-board-body-content">
                        <div class="d-flex justify-content-between job-board-body-header  mb-3">
                            <div class="p-2 job-p">
                                1 - 25 of 1911 jobs
                            </div>
                            <div class="p-2 job-p">
                                <span>show</span>
                                <select name="itemno">
                                    <option value="25" selected="">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <span>Per Page</span>
                            </div>
                        </div>
                        <!--item1-->
                        <div class="tutor-post-block">
                            <div class="tutor-post-header">
                                <h4>Need a Bangla Medium - Class 2 Tutor</h4>
                                <div class="d-flex justify-content-between">
                                    <div class="p-2">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span> Dhaka, Shewrapara</span>
                                    </div>
                                    <div class="p-2 posted-date">
                                        Posted 9 Mins ago (19/02/20)
                                    </div>
                                </div>
                            </div>
                            <div class="tutor-post-header-bottom">
                                <div class="d-flex justify-content-between">
                                    <div class="p-2 ">
                                        <p class=" category">Category: <span>Bangla Medium</span></p>
                                        <p class=" class">Class: <span>Class 2</span></p>
                                        <p class=" gender">Student Gender: <span>Male</span> </p>
                                        <p class="tutor-gender">Tutor gender preference : <span>Female</span> </p>
                                    </div>
                                    <div class="p-2 tutor-post-body">
                                        <p>3 days per week</p>
                                        <p>Tutoring Time : <span class="time">05:00 pm</span> </p>
                                        <p>Subjects : <span class="all-sub">All</span> </p>
                                        <span>Salary: <span class="sallery-text">3000,</span> </span>
                                        <span> No. of Students : <span class="student-txt">1</span> </span>
                                    </div>
                                    <div class="p-2 tutor-apply-content">
                                        <i class="far fa-eye"></i>
                                        <span>viewed by 3 person</span><br>
                                        <button type="button" class="btn job-board-btn">Apply Now</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tutor-post-footer">
                                <div class="d-flex justify-content-between">
                                    <div class="p-2">
                                        <a class="btn  job-location-btn" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            Job Location
                                        </a>
                                    </div>
                                    <div class="p-2">
                                        <button type="button" class="btn job-board-btn direction-btn">Get Direction</button>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <div id="map" class="text-center">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.23642489241!2d90.3649163142974!3d23.774593893770092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1b10690db93%3A0x176c9d404786555b!2sIQSA%20SOFT-software%20company!5e0!3m2!1sen!2sbd!4v1582173360634!5m2!1sen!2sbd" width="100%" height="300px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--item 2-->
                        <div class="tutor-post-block">
                            <div class="tutor-post-header">
                                <h4>Need a tutor for Class 4 student</h4>
                                <div class="d-flex justify-content-between">
                                    <div class="p-2">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span> Dhaka, Shantinagar</span>
                                    </div>
                                    <div class="p-2 posted-date">
                                        Posted 9 Mins ago (19/02/20)
                                    </div>
                                </div>
                            </div>
                            <div class="tutor-post-header-bottom">
                                <div class="d-flex justify-content-between">
                                    <div class="p-2 ">
                                        <p class=" category">Category: <span>Bangla Medium</span></p>
                                        <p class=" class">Class: <span>Class 2</span></p>
                                        <p class=" gender">Student Gender: <span>Male</span> </p>
                                        <p class="tutor-gender">Tutor gender preference : <span>Female</span> </p>
                                    </div>
                                    <div class="p-2 tutor-post-body">
                                        <p>3 days per week</p>
                                        <p>Tutoring Time : <span class="time">05:00 pm</span> </p>
                                        <p>Subjects : <span class="all-sub">All</span> </p>
                                        <span>Salary: <span class="sallery-text">3000,</span> </span>
                                        <span> No. of Students : <span class="student-txt">1</span> </span>
                                    </div>
                                    <div class="p-2 tutor-apply-content">
                                        <i class="far fa-eye"></i>
                                        <span>viewed by 3 person</span><br>
                                        <button type="button" class="btn job-board-btn">Apply Now</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tutor-post-footer">
                                <div class="d-flex justify-content-between">
                                    <div class="p-2">
                                        <a class="btn  job-location-btn" data-toggle="collapse" href="#jobLocation2" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            Job Location
                                        </a>
                                    </div>
                                    <div class="p-2">
                                        <button type="button" class="btn job-board-btn direction-btn">Get Direction</button>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse" id="jobLocation2">
                                <div class="card card-body">
                                    <div id="map" class="text-center">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.23642489241!2d90.3649163142974!3d23.774593893770092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1b10690db93%3A0x176c9d404786555b!2sIQSA%20SOFT-software%20company!5e0!3m2!1sen!2sbd!4v1582173360634!5m2!1sen!2sbd" width="100%" height="300px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--item 3-->
                        <div class="tutor-post-block">
                            <div class="tutor-post-header">
                                <h4>Need a tutor for English student</h4>
                                <div class="d-flex justify-content-between">
                                    <div class="p-2">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span> Dhaka, Shewrapara</span>
                                    </div>
                                    <div class="p-2 posted-date">
                                        Posted 9 Mins ago (19/02/20)
                                    </div>
                                </div>
                            </div>
                            <div class="tutor-post-header-bottom">
                                <div class="d-flex justify-content-between">
                                    <div class="p-2 ">
                                        <p class=" category">Category: <span>Bangla Medium</span></p>
                                        <p class=" class">Class: <span>Class 2</span></p>
                                        <p class=" gender">Student Gender: <span>Male</span> </p>
                                        <p class="tutor-gender">Tutor gender preference : <span>Female</span> </p>
                                    </div>
                                    <div class="p-2 tutor-post-body">
                                        <p>3 days per week</p>
                                        <p>Tutoring Time : <span class="time">05:00 pm</span> </p>
                                        <p>Subjects : <span class="all-sub">All</span> </p>
                                        <span>Salary: <span class="sallery-text">3000,</span> </span>
                                        <span> No. of Students : <span class="student-txt">1</span> </span>
                                    </div>
                                    <div class="p-2 tutor-apply-content">
                                        <i class="far fa-eye"></i>
                                        <span>viewed by 3 person</span><br>
                                        <button type="button" class="btn job-board-btn">Apply Now</button>
                                    </div>
                                </div>
                                <div class="">

                                </div>
                            </div>
                            <div class="tutor-post-footer">
                                <div class="d-flex justify-content-between">
                                    <div class="p-2">
                                        <a class="btn  job-location-btn" data-toggle="collapse" href="#jobLocation3" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            Job Location
                                        </a>
                                    </div>
                                    <div class="p-2">
                                        <button type="button" class="btn job-board-btn direction-btn">Get Direction</button>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse" id="jobLocation3">
                                <div class="card card-body">
                                    <div id="map" class="text-center">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.23642489241!2d90.3649163142974!3d23.774593893770092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1b10690db93%3A0x176c9d404786555b!2sIQSA%20SOFT-software%20company!5e0!3m2!1sen!2sbd!4v1582173360634!5m2!1sen!2sbd" width="100%" height="300px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--item 4-->
                        <div class="tutor-post-block">
                            <div class="tutor-post-header">
                                <h4>Need a tutor for Islamic Studies student</h4>
                                <div class="d-flex justify-content-between">
                                    <div class="p-2">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span> Cumilla, Police Line</span>
                                    </div>
                                    <div class="p-2 posted-date">
                                        Posted 30 Mins ago (19/02/20)
                                    </div>
                                </div>
                            </div>
                            <div class="tutor-post-header-bottom">
                                <div class="d-flex justify-content-between">
                                    <div class="p-2 ">
                                        <p class=" category">Category: <span>Bangla Medium</span></p>
                                        <p class=" class">Class: <span>Class 2</span></p>
                                        <p class=" gender">Student Gender: <span>Male</span> </p>
                                        <p class="tutor-gender">Tutor gender preference : <span>Female</span> </p>
                                    </div>
                                    <div class="p-2 tutor-post-body">
                                        <p>3 days per week</p>
                                        <p>Tutoring Time : <span class="time">05:00 pm</span> </p>
                                        <p>Subjects : <span class="all-sub">All</span> </p>
                                        <span>Salary: <span class="sallery-text">3000,</span> </span>
                                        <span> No. of Students : <span class="student-txt">1</span> </span>
                                    </div>
                                    <div class="p-2 tutor-apply-content">
                                        <i class="far fa-eye"></i>
                                        <span>viewed by 3 person</span><br>
                                        <button type="button" class="btn job-board-btn">Apply Now</button>
                                    </div>
                                </div>
                                <div class="">

                                </div>
                            </div>
                            <div class="tutor-post-footer">
                                <div class="d-flex justify-content-between">
                                    <div class="p-2">
                                        <a class="btn  job-location-btn" data-toggle="collapse" href="#jobLocation4" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            Job Location
                                        </a>
                                    </div>
                                    <div class="p-2">
                                        <button type="button" class="btn job-board-btn direction-btn">Get Direction</button>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse" id="jobLocation4">
                                <div class="card card-body">
                                    <div id="map" class="text-center">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.23642489241!2d90.3649163142974!3d23.774593893770092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1b10690db93%3A0x176c9d404786555b!2sIQSA%20SOFT-software%20company!5e0!3m2!1sen!2sbd!4v1582173360634!5m2!1sen!2sbd" width="100%" height="300px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--item 5-->
                        <div class="tutor-post-block">
                            <div class="tutor-post-header">
                                <h4>Need a tutor for School Admission Test student</h4>
                                <div class="d-flex justify-content-between">
                                    <div class="p-2">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span> Cumilla, Kaptan Bazar</span>
                                    </div>
                                    <div class="p-2 posted-date">
                                        Posted 50 Mins ago (19/02/20)
                                    </div>
                                </div>
                            </div>
                            <div class="tutor-post-header-bottom">
                                <div class="d-flex justify-content-between">
                                    <div class="p-2 ">
                                        <p class=" category">Category: <span>Bangla Medium</span></p>
                                        <p class=" class">Class: <span>Class 2</span></p>
                                        <p class=" gender">Student Gender: <span>Male</span> </p>
                                        <p class="tutor-gender">Tutor gender preference : <span>Female</span> </p>
                                    </div>
                                    <div class="p-2 tutor-post-body">
                                        <p>3 days per week</p>
                                        <p>Tutoring Time : <span class="time">05:00 pm</span> </p>
                                        <p>Subjects : <span class="all-sub">All</span> </p>
                                        <span>Salary: <span class="sallery-text">3000,</span> </span>
                                        <span> No. of Students : <span class="student-txt">1</span> </span>
                                    </div>
                                    <div class="p-2 tutor-apply-content">
                                        <i class="far fa-eye"></i>
                                        <span>viewed by 3 person</span><br>
                                        <button type="button" class="btn job-board-btn">Apply Now</button>
                                    </div>
                                </div>
                                <div class="">

                                </div>
                            </div>
                            <div class="tutor-post-footer">
                                <div class="d-flex justify-content-between">
                                    <div class="p-2">
                                        <a class="btn  job-location-btn" data-toggle="collapse" href="#jobLocation5" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            Job Location
                                        </a>
                                    </div>
                                    <div class="p-2">
                                        <button type="button" class="btn job-board-btn direction-btn">Get Direction</button>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse" id="jobLocation5">
                                <div class="card card-body">
                                    <div id="map" class="text-center">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.23642489241!2d90.3649163142974!3d23.774593893770092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1b10690db93%3A0x176c9d404786555b!2sIQSA%20SOFT-software%20company!5e0!3m2!1sen!2sbd!4v1582173360634!5m2!1sen!2sbd" width="100%" height="300px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--item 6-->
                        <div class="tutor-post-block">
                            <div class="tutor-post-header">
                                <h4>Need a tutor for Microsoft Office student</h4>
                                <div class="d-flex justify-content-between">
                                    <div class="p-2">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>Chattogram, Chandgaon R/A, Block B</span>
                                    </div>
                                    <div class="p-2 posted-date">
                                        Posted 9 Mins ago (19/02/20)
                                    </div>
                                </div>
                            </div>
                            <div class="tutor-post-header-bottom">
                                <div class="d-flex justify-content-between">
                                    <div class="p-2 ">
                                        <p class=" category">Category: <span>Bangla Medium</span></p>
                                        <p class=" class">Class: <span>Class 2</span></p>
                                        <p class=" gender">Student Gender: <span>Male</span> </p>
                                        <p class="tutor-gender">Tutor gender preference : <span>Female</span> </p>
                                    </div>
                                    <div class="p-2 tutor-post-body">
                                        <p>3 days per week</p>
                                        <p>Tutoring Time : <span class="time">05:00 pm</span> </p>
                                        <p>Subjects : <span class="all-sub">All</span> </p>
                                        <span>Salary: <span class="sallery-text">3000,</span> </span>
                                        <span> No. of Students : <span class="student-txt">1</span> </span>
                                    </div>
                                    <div class="p-2 tutor-apply-content">
                                        <i class="far fa-eye"></i>
                                        <span>viewed by 3 person</span><br>
                                        <button type="button" class="btn job-board-btn">Apply Now</button>
                                    </div>
                                </div>
                                <div class="">

                                </div>
                            </div>
                            <div class="tutor-post-footer">
                                <div class="d-flex justify-content-between">
                                    <div class="p-2">
                                        <a class="btn  job-location-btn" data-toggle="collapse" href="#jobLocation6" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            Job Location
                                        </a>
                                    </div>
                                    <div class="p-2">
                                        <button type="button" class="btn job-board-btn direction-btn">Get Direction</button>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse" id="jobLocation6">
                                <div class="card card-body">
                                    <div id="map" class="text-center">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.23642489241!2d90.3649163142974!3d23.774593893770092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1b10690db93%3A0x176c9d404786555b!2sIQSA%20SOFT-software%20company!5e0!3m2!1sen!2sbd!4v1582173360634!5m2!1sen!2sbd" width="100%" height="300px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--item 7-->
                        <div class="tutor-post-block">
                            <div class="tutor-post-header">
                                <h4>Need a tutor for Music student</h4>
                                <div class="d-flex justify-content-between">
                                    <div class="p-2">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span> Dhaka, Shewrapara</span>
                                    </div>
                                    <div class="p-2 posted-date">
                                        Posted 9 Mins ago (19/02/20)
                                    </div>
                                </div>
                            </div>
                            <div class="tutor-post-header-bottom">
                                <div class="d-flex justify-content-between">
                                    <div class="p-2 ">
                                        <p class=" category">Category: <span>Bangla Medium</span></p>
                                        <p class=" class">Class: <span>Class 2</span></p>
                                        <p class=" gender">Student Gender: <span>Male</span> </p>
                                        <p class="tutor-gender">Tutor gender preference : <span>Female</span> </p>
                                    </div>
                                    <div class="p-2 tutor-post-body">
                                        <p>3 days per week</p>
                                        <p>Tutoring Time : <span class="time">05:00 pm</span> </p>
                                        <p>Subjects : <span class="all-sub">All</span> </p>
                                        <span>Salary: <span class="sallery-text">3000,</span> </span>
                                        <span> No. of Students : <span class="student-txt">1</span> </span>
                                    </div>
                                    <div class="p-2 tutor-apply-content">
                                        <i class="far fa-eye"></i>
                                        <span>viewed by 3 person</span><br>
                                        <button type="button" class="btn job-board-btn">Apply Now</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tutor-post-footer">
                                <div class="d-flex justify-content-between">
                                    <div class="p-2">
                                        <a class="btn  job-location-btn" data-toggle="collapse" href="#jobLocation7" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            Job Location
                                        </a>
                                    </div>
                                    <div class="p-2">
                                        <button type="button" class="btn job-board-btn direction-btn">Get Direction</button>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse" id="jobLocation7">
                                <div class="card card-body">
                                    <div id="map" class="text-center">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.23642489241!2d90.3649163142974!3d23.774593893770092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1b10690db93%3A0x176c9d404786555b!2sIQSA%20SOFT-software%20company!5e0!3m2!1sen!2sbd!4v1582173360634!5m2!1sen!2sbd" width="100%" height="300px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--item 8-->
                        <div class="tutor-post-block">
                            <div class="tutor-post-header">
                                <h4>Need a tutor for IELTS student</h4>
                                <div class="d-flex justify-content-between">
                                    <div class="p-2">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span> Chattogram, Khulshi West</span>
                                    </div>
                                    <div class="p-2 posted-date">
                                        Posted 1 Days ago (19/02/20)
                                    </div>
                                </div>
                            </div>
                            <div class="tutor-post-header-bottom">
                                <div class="d-flex justify-content-between">
                                    <div class="p-2 ">
                                        <p class=" category">Category: <span>Bangla Medium</span></p>
                                        <p class=" class">Class: <span>Class 2</span></p>
                                        <p class=" gender">Student Gender: <span>Male</span> </p>
                                        <p class="tutor-gender">Tutor gender preference : <span>Female</span> </p>
                                    </div>
                                    <div class="p-2 tutor-post-body">
                                        <p>3 days per week</p>
                                        <p>Tutoring Time : <span class="time">05:00 pm</span> </p>
                                        <p>Subjects : <span class="all-sub">All</span> </p>
                                        <span>Salary: <span class="sallery-text">3000,</span> </span>
                                        <span> No. of Students : <span class="student-txt">1</span> </span>
                                    </div>
                                    <div class="p-2 tutor-apply-content">
                                        <i class="far fa-eye"></i>
                                        <span>viewed by 3 person</span><br>
                                        <button type="button" class="btn job-board-btn">Apply Now</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tutor-post-footer">
                                <div class="d-flex justify-content-between">
                                    <div class="p-2">
                                        <a class="btn  job-location-btn" data-toggle="collapse" href="#jobLocation8" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            Job Location
                                        </a>
                                    </div>
                                    <div class="p-2">

                                        <button type="button" class="btn job-board-btn direction-btn">Get Direction</button>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse" id="jobLocation8">
                                <div class="card card-body">
                                    <div id="map" class="text-center">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.23642489241!2d90.3649163142974!3d23.774593893770092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1b10690db93%3A0x176c9d404786555b!2sIQSA%20SOFT-software%20company!5e0!3m2!1sen!2sbd!4v1582173360634!5m2!1sen!2sbd" width="100%" height="300px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="" class="pagination_holder">
                                    <ul class="clearfix">
                                        <li style="margin-right:10px"><a href="javascript:void(0);">Pre</a></li>
                                        <li><a href="#" class="active">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="job-board-filter">
                        <div class="filter-header">
                            <div class="d-flex justify-content-between  mb-3">
                                <div class="p-2 job-p">
                                    <i class="fas fa-filter"></i>
                                    <span class="f-t">Filter</span>
                                </div>
                                <div class="p-2 job-p">
                                    <a href="#"><span><i>Reset all fields</i></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="filter-city-content">
                            <h4>City</h4>
                            <div class="form-group field-signupform-locale required">
                                <select id="city" class="form-control" name="" aria-required="true">
                                    <option value="">Select City</option>
                                    
                                    <?php
												foreach ($city as $cit)
												{
												?>
                                    <option value="<?php echo ($cit->city == 'Select City')?'1':$cit->id; ?>"><?php echo $cit->city; ?></option>
                                   <?php
												}
												?>
                                </select>
                            </div>
                             <div class="filter-location-content">
                            <h4>Location</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="location_show" class="checkbox s-location">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Abdullahpur
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkbox s-location">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Mirpur 6
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkbox s-location">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Mirpur 8
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkbox s-location">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Dhanmondi
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkbox s-location">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Azimpur
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkbox s-location">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            shyamoli
                                        </label>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="checkbox s-location">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Aftabnagar
                                        </label>
                                    </div>
                                </div>
                                  <div class="col-md-6">
                                    <div class="checkbox s-location">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                           Agargaon
                                        </label>
                                    </div>
                                </div>
                                  <div class="col-md-6">
                                    <div class="checkbox s-location">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Mirpur DOHS
                                        </label>
                                    </div>
                                </div>
                                  <div class="col-md-6">
                                    <div class="checkbox s-location">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Asad Gate
                                        </label>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="checkbox s-location">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Mohakhali
                                        </label>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="checkbox s-location">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Ashkona
                                        </label>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="checkbox s-location">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Badda
                                        </label>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="checkbox s-location">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Baily Road
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkbox s-location">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Banani
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkbox s-location">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Motijheel
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkbox s-location">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Banasree
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkbox s-location">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Mugda
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                     <div class="show-more">Show more</div>
                                </div>
                            </div>
                        </div>
                        </div>
                       
                        <div class="filter-category-content">
                            <h4>Category</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Bangla Medium
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            English Medium
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            English version
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Religious Studies
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Admission Test
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Arts
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Language Learning
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Test Preparation
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Project/Assignment
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Special Skill Development
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Professional Skill Development
                                        </label>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="filter-cls-course-content">
                            <h4>Class/Courses</h4>
                            <span class="filter-cls-text">Bangla Medium</span>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Pre-Schooling
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Class 5
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Play
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Class 6
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                          Nursery
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Class 7
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            KG
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Class 8
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Class 1
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Class 9
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Class 2
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Class 10
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Class 3
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            HSC- 1st Year
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Class 4
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            HSC- 2nd Year
                                        </label>
                                    </div>
                              </div>                                                        
                            </div>
                            
                           
                            
                        </div>
                        <div class="filter-cls-course-eng">
                              <h4>Class/Courses</h4>
                              <span class="filter-cls-text">English version</span>
                               <div class="row">
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Pre-Schooling
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Class 5
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Play
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Class 6
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                          Nursery
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Class 7
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            KG
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Class 8
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Class 1
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Class 9
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Class 2
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Class 10
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Class 3
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            HSC- 1st Year
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Class 4
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            HSC- 2nd Year
                                        </label>
                                    </div>
                                </div>
                               
                               
                            </div>
                        </div>
                        <div class="filter-gender-content">
                             <h4>Gender</h4>
                             <div class="row">
                                 <div class="col-md-6">
                                      <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Male
                                        </label>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                      <div class="checkbox">
                                        <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                            <input type="checkbox" value="1" />
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Female
                                        </label>
                                    </div>
                                 </div>
                             </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
   </div>
</section>
    <!--=========== END BLOG SECTION ================-->
	<?php echo $footer;?>
<style media="screen">
	@media only screen and (max-width: 600px) {
		.map-static-image {
			width: 100%;
		}
	}
</style>
<script type="text/javascript">
	$( "body" ).delegate( ".get_location", "click", function() {
		// Map Javascript Api
		var job_id = $(this).data('job_id');
		var lat = $(this).data('map_lat');
		var lng = $(this).data('map_lng');
		var gen = $(this).data('map_gen');

		if (gen === false) {
			var tuitionLatLng = {lat: lat, lng: lng};
			
			var map = new google.maps.Map(document.getElementById('map_location_'+job_id), {
				zoom: 17,
				center: tuitionLatLng,
				gestureHandling: 'greedy'
			});
			
			var marker = new google.maps.Marker({
				position: tuitionLatLng,
				map: map,
				icon: "<?php echo base_url('assets/img/mini_marker.png') ?>"
				// title: 'Hello World!'
			});
			
			var sunCircle = {
		        strokeColor: "#0675c1",
		        strokeOpacity: 0.8,
		        strokeWeight: 2,
		        fillColor: "#0675c1",
		        fillOpacity: 0.35,
		        map: map,
		        center: tuitionLatLng,
		        radius: 100 // in meters
		    };
		    cityCircle = new google.maps.Circle(sunCircle)
		    cityCircle.bindTo('center', marker, 'position');
		    $(this).data('map_gen',true);
		}

		// Map Static Api
		// var job_id = $(this).data('job_id');
		// var gen = $(this).data('map_gen');
		// var lat = $(this).data('map_lat');
		// var lng = $(this).data('map_lng');

		// var mq = window.matchMedia( "(max-width: 600px)" );
		// var size = '650x250';
		// var zoom = '17';
		// if (mq.matches) {
		// 	size = '300x250';
		// 	zoom = '16';
		// }

		// if (gen === false) {
		// 	$('.static_api_image_'+job_id).html('<img class="map-static-image" src="https://maps.googleapis.com/maps/api/staticmap?center='+ lat +','+ lng +'&zoom='+ zoom +'&size='+ size +'&maptype=roadmap&markers=label:C%7Ccolor:red%7C'+ lat +','+ lng +'&key=AIzaSyCdo_CRxtGWcZOr7MxI2ihcSr9d-t0V_Kk">');
		// 	$(this).data('map_gen',true);
		// }

	});

	$( "body" ).delegate( ".get_direction", "click", function() {

		// Map Javascript Api

		// var job_id = $(this).data('job_id');
		// var lat = $(this).data('map_lat');
		// var lng = $(this).data('map_lng');
		//
		// $('#map_direction_panel_'+job_id).parents('.col-md-6').removeClass('hidden');
		//
		// var tuitionLatLng = {lat: lat, lng: lng};
		//
		// if( navigator.geolocation ) {
	    //    navigator.geolocation.getCurrentPosition( success, fail );
	    // } else {
	    //    alert("Sorry, your browser does not support geolocation services.");
	    // }
		//
		// function success(position) {
		// 	var myLat = position.coords.latitude;
		// 	var myLng = position.coords.longitude;
		//
		// 	var myLatLng = {lat: myLat, lng: myLng};
		// 	console.log(myLatLng);
		//
		// 	var directionsService = new google.maps.DirectionsService();
		// 	var directionsDisplay = new google.maps.DirectionsRenderer();
		//
		// 	var map = new google.maps.Map(document.getElementById('map_location_'+job_id), {
		// 		zoom:16,
		// 		mapTypeId: google.maps.MapTypeId.ROADMAP,
		// 		gestureHandling: 'greedy'
		// 	});
		//
		// 	directionsDisplay.setMap(map);
		// 	directionsDisplay.setPanel(document.getElementById('map_direction_panel_'+job_id));
		//
		// 	var request = {
		// 		origin: myLatLng,
		// 		destination: tuitionLatLng,
		// 		travelMode: google.maps.DirectionsTravelMode.DRIVING
		// 	};
		//
		// 	directionsService.route(request, function(response, status) {
		// 		if (status == google.maps.DirectionsStatus.OK) {
		// 			directionsDisplay.setDirections(response);
		// 		}
		// 	});
		//
		// }
		//
		// function fail() {
		// 	// Could not obtain location
		// }

		// Redirect to Google
		window.open('https://www.google.com/maps/dir/?api=1&destination='+ $(this).data('map_lat') +','+ $(this).data('map_lng'), '_blank');
	});
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPgyQ1fqOQy3kgl2xgRgXDeow1C7cot_0" async defer></script>