<?php echo $header; ?>
<?php $this->load->view('frontend_menu'); ?>
<body>

    <!--Header area start-->
    <div id="filterSidenav" class="filter_sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="filterCloseNav()">&times;</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
    </div>

    <div id="filterMain">

    

        <section class="tutoring-area">
            <div class="container">
                <div class="tutoring-header">
                    <div class="loking-text">
                        <label> <strong> I am looking for <br> Tutor</strong></label>
                    </div>
                    <div class="filter">
                        <button onclick="filterOpenNav()" type="button" class="btn btn-primary">Filters<i class="fas fa-filter"></i></button>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="search-box">
                            <label for=""> Enter address</label>
                            <input type="text" placeholder="E.g Mirpur DOHS">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group field-signupform-locale required fiter-km">
                            <label for="">Within</label>
                            <select id="signupform-locale" class="form-control" name="" aria-required="true">
                                <option value="">1 km</option>
                                <option value="">2 km</option>
                                <option value="">3 km</option>
                                <option value="">5 km</option>
                                <option value="">10 km</option>
                                <option value="">15 km</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="tutor-page-body">
                    <div class="d-flex justify-content-between find-area mb-3">
                        <div class="p-2">
                            <button type="button" class="btn btn-primary">Find</button>
                        </div>

                        <div class="p-2">
                            <div class="font-weight-bold text-right"><span class="hidden-xs-only">
                                    Showing &nbsp;
                                </span>
                                1 - 12 of 27146 result(s)
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 no-padding">
                            <div class="tutor-profile-content">
                                <div class="row">
                                    <div class="col-md-3 ">
                                        <img src="<?php echo base_url(); ?>assets/img/male.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="tutor-details">
                                            <a href="#">
                                                <h5 data-toggle="modal" data-target="#tutorDetailsModal">Najmus Sakib</h5>
                                            </a>
                                            <p> Ispahani Public School & Collee</p>
                                            <p class="text2"> Comilla Victoria Govt. College</p>
                                            <p class="text3">with 2 years of experience</p>
                                        </div>
                                        <!-- Button trigger modal -->


                                        <!-- Modal -->
                                        <div class="modal fade" id="tutorDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered tutor-details-modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Tutor Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="tutor-details-content text-center">
                                                            <div class="image">
                                                                <img src="<?php echo base_url(); ?>assets/img/2.jpg" class="img-fluid" alt="">
                                                            </div>
                                                            <div class="name-location">
                                                                <h5>Najmus Sakib</h5>
                                                                <p><i class="fas fa-map-marker-alt"></i>Wireless Gate ,Mohakhali,Dhaka-1212, Dhaka, Bangladesh</p>
                                                            </div>
                                                            <div class="area">
                                                                <p>Mahakhali and Banani area.</p>
                                                            </div>
                                                            <div class="educational">
                                                                <p>SSC (Scicene) from Banani Bidyaniketan school and college</p>
                                                                <p>HSC (Scicene) from Shaheed bir uttam lt.anwar girls college</p>
                                                                <p>BBA from Southeast universit</p>
                                                            </div>
                                                            <div class="subject">
                                                                <ul class="nav">
                                                                    <li><i class="fas fa-bookmark"></i>Class 1</li>
                                                                    <li><i class="fas fa-bookmark"></i>Class 2</li>
                                                                    <li><i class="fas fa-bookmark"></i>Class 3</li>
                                                                    <li><i class="fas fa-bookmark"></i>Class 4</li>
                                                                    <li><i class="fas fa-bookmark"></i>Class 5</li>
                                                                    <li><i class="fas fa-bookmark"></i>Class 6</li>
                                                                    <li><i class="fas fa-bookmark"></i>Class 7</li>
                                                                    <li><i class="fas fa-bookmark"></i>Class 8</li>
                                                                    <li><i class="fas fa-bookmark"></i>KG 1</li>
                                                                    <li><i class="fas fa-bookmark"></i>KG 2</li>
                                                                    <li><i class="fas fa-bookmark"></i>Nursary</li>
                                                                </ul>
                                                            </div>
                                                            <div class="version">
                                                                <button type="button" class="btn btn-primary">Bangla  Medium</button>
                                                                <button type="button" class="btn btn-secondary">English Medium</button>
                                                            </div>
                                                            <div class="contact">
                                                                 <button type="button" class="btn btn-secondary">Contact</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 no-padding">
                            <div class="tutor-profile-content">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="<?php echo base_url(); ?>assets/img/2.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="tutor-details">
                                            <h5>HM Masum billah</h5>
                                            <p> Ispahani Public School & Collee</p>
                                            <p class="text2"> Comilla Victoria Govt. College</p>
                                            <p class="text3">with 2 years of experience</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 no-padding">
                            <div class="tutor-profile-content">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="<?php echo base_url(); ?>assets/img/1.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="tutor-details">
                                            <h5>Abu Bakr Siddique</h5>
                                            <p> Ispahani Public School & Collee</p>
                                            <p class="text2"> Comilla Victoria Govt. College</p>
                                            <p class="text3">with 2 years of experience</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 no-padding">
                            <div class="tutor-profile-content">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="<?php echo base_url(); ?>assets/img/1.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="tutor-details">
                                            <h5>Shiblu Hossain</h5>
                                            <p> Ispahani Public School & Collee</p>
                                            <p class="text2"> Comilla Victoria Govt. College</p>
                                            <p class="text3">with 2 years of experience</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 no-padding">
                            <div class="tutor-profile-content">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="<?php echo base_url(); ?>assets/img/2.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="tutor-details">
                                            <h5>Shams Mahabub</h5>
                                            <p> Ispahani Public School & Collee</p>
                                            <p class="text2"> Comilla Victoria Govt. College</p>
                                            <p class="text3">with 2 years of experience</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 no-padding">
                            <div class="tutor-profile-content">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="<?php echo base_url(); ?>assets/img/3.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="tutor-details">
                                            <h5>Maruf hasan Rion</h5>
                                            <p> Ispahani Public School & Collee</p>
                                            <p class="text2"> Comilla Victoria Govt. College</p>
                                            <p class="text3">with 2 years of experience</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>


    <!--Header area End-->



    <!----Header sidenav Area Start----->

    <div class="sidenav">
        <div id="mySidenav" class="sidenav">

            <div class="sidenav-header">
                <div class="row">
                    <div class="col-sm-4">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="col-sm-4">
                        <p>Help Center</p>
                    </div>
                    <div class="col-sm-4">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    </div>
                </div>
            </div>
            <div class="help-content text-center">
                <div class="row">
                    <div class="col-md-4">
                        <a href="#">
                            <i class="fas fa-info-circle"></i>
                            <p>Help Center</p>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <i class="far fa-newspaper"></i>
                            <p>Aritical</p>
                        </a>

                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <i class="fas fa-id-card"></i>
                            <p>Contact</p>
                        </a>

                    </div>
                </div>
            </div>
            <div class="aritical-suggetion">
                <div class="row">
                    <div class="col-sm-12">
                        <span>Suggested articles</span>
                        <p>Requesting transfer of funds among tutors</p>
                        <p>Requesting transfer of funds among tutors</p>
                        <p>Requesting transfer of funds among tutors</p>
                    </div>
                </div>

            </div>
            <div class="help-faq">
                <div class="row">
                    <div class="col-sm-12">
                        <h5>Help BdTutor?</h5>
                        <div class="bs-example">
                            <div class="accordion" id="accordionExample">
                                <div class="card sidenav-card">
                                    <div class="card-header sidenav-card-header" id="newUser">

                                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"><i class="fa fa-plus"></i>New in Bdtutors?</button>

                                    </div>
                                    <div id="collapseOne" class="collapse" aria-labelledby="newUser" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p><a href="#">Register as a Student</a></p>
                                            <p><a href="#">Rules Violation and Penalties</a></p>
                                            <p><a href="#">How to Contact BDTutor</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card sidenav-card">
                                    <div class="card-header sidenav-card-header" id="studentHelp">

                                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"><i class="fa fa-plus"></i>Tutor Help</button>

                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="studentHelp" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p><a href="#">Registration and Rules</a></p>
                                            <p><a href="#How to Find students"></a></p>
                                            <p><a href="#">Profile</a></p>
                                            <p><a href="#">Calender</a></p>
                                            <p><a href="#">My Request</a></p>
                                            <p><a href="#">Money Withdrawals</a></p>
                                            <p><a href="#">Setting</a></p>
                                            <p><a href="#">Tutor profile Guidelines</a></p>
                                            <p><a href="#">Top tips foe tutor</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card sidenav-card">
                                    <div class="card-header sidenav-card-header" id="teacherHelp">

                                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"><i class="fa fa-plus"></i>Student Help</button>

                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="teacherHelp" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p><a href="">Registration</a></p>
                                            <p><a href="">Profile Setting</a></p>
                                            <p><a href="">How to find a tutor</a></p>
                                            <p><a href="#">How to know if tutor is good?</a></p>

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

    <!----Header sidenav Area End----->





    <script>
        function filterOpenNav() {
            document.getElementById("filterSidenav").style.width = "250px";
            document.getElementById("filterSidenav").style.transition = "2s ease";
            document.getElementById("filterMain").style.marginRight = "250px";
            document.getElementById("filterMain").style.transition = "2s ease";
        }

        function filterCloseNav() {
            document.getElementById("filterSidenav").style.width = "0";
            document.getElementById("filterSidenav").style.transition = "2s";
            document.getElementById("filterMain").style.marginRight = "0";
            document.getElementById("filterMain").style.transition = "2s ease";
        }

    </script>

</body>
<?php echo $footer; ?>