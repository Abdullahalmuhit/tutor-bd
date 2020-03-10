<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <!--Google fonts--->

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
    <!-- Font Awesome CSS -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <title>Student/Parent Dashboard</title>
    <!--Main css--->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/style2.css">
</head>

<body style="background-color: #edeff0;">

    <nav class="navbar navbar-expand-lg dashboard-header">
        <div class="container-fluid">
            <div class="navbar-brand">
                <!-- <img src="images/" alt="">-->
                <h5 style="color: #fff; margin-right: 20px;"><a href="index.html">BDTutor</a></h5>
            </div>
            <button type="button" id="sidebarCollapse" class="btn  collapse-btn">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item dropdown user-dropdown message-a">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope-open"></i>
                        </a>
                        <div class="dropdown-menu message-dropdown-menu" aria-labelledby="navbarDropdown">
                            <span class="notification-header">Message</span>
                            <a class="dropdown-item" href="#">Review Your Profile</a>
                            <p><i class="fas fa-clock"></i>12 mins ago</p>
                            <a class="dropdown-item" href="#">Review Your Profile</a>
                            <p><i class="fas fa-clock"></i>12 mins ago</p>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Review Your Profile</a>
                            <p><i class="fas fa-clock"></i>12 mins ago</p>
                            <div class="dropdown-divider"></div>
                            <a href=""><span class="notification-header">view all Message</span></a>
                        </div>
                    </li>
                    <li class="nav-item dropdown user-dropdown notification-a">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell"></i>
                        </a>
                        <div class="dropdown-menu notofication-dropdown-menu" aria-labelledby="navbarDropdown">
                            <span class="notification-header">Notification</span>
                            <a class="dropdown-item" href="#">Review Your Profile</a>
                            <p><i class="fas fa-clock"></i>12 mins ago</p>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Review Your Profile</a>
                            <p><i class="fas fa-clock"></i>14 mins ago</p>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Review Your Profile</a>
                            <p><i class="fas fa-clock"></i>2 0 mins ago</p>
                            <div class="dropdown-divider"></div>
                            <a href=""><span class="notification-header">view all Notification</span></a>
                        </div>
                    </li>
                    <li class="nav-item dropdown user-dropdown">
                        <a style="padding-top: 0px" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="images/user.png" class="img-fluid" alt="user image">
                        </a>
                        <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">My Profile</a>
                            <a class="dropdown-item" href="#">Setting</a>
                            <a class="dropdown-item" href="#">Logout</a>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4">
                <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/user-img2.jpeg);"></a>
                <div class="sidebar-profile">
                    <p class="p-text">Hello Mamun</p>
                    <p>Gradiant Id: 186768</p>
                </div>

                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <a href="student-parent-dashboard.html">Dashboard</a>
                    </li>
                    <li><a href="#">Post tutor job</a></li>
                    <li><a href="parent-profile.html">profile</a></li>
                    <li><a href="parent-setting.html">Setting</a></li>
                </ul>
            </div>
        </nav>
        <!-- Page Content  -->
        <div id="content" class="">
            <section class="post-tutor-area">
                <div class="container">
                    <div class="dashboard-right-side parent-profile-right-side">
                        <div class="tutor-profile-header job-view text-center">
                            <h4>New Requirements</h4>
                        </div>

                        <fieldset id="first">
                            <div class="row">
                                <div class="col-sm-12 col-text-center">
                                    <!--signup Start--->

                                    <div class="enter-box submit-box post-tutor-box">
                                        <form id="signup-form" class="" action="" method="post">

                                            <div class="form-group field-signupform-locale required">
                                                <label for="">City</label>
                                                <select id="signupform-locale" class="form-control" name="" aria-required="true">
                                        <option value="">Select City</option>
                                        <option value="">Dhaka</option>
                                        <option value="">Chattogram</option>
                                        <option value="">Rajshahi</option>
                                        <option value="">Sylhet</option>
                                        <option value="">Khulna</option>
                                        <option value="">Rangpur</option>
                                        <option value="">Barishal</option>
                                        <option value="">Mymensingh</option>
                                        <option value="">Narayanganj</option>
                                        <option value="">Savar</option>
                                        <option value="">Gazipur</option>
                                        <option value="">Cumilla</option>
                                    </select>
                                            </div>
                                            <div class="form-group field-signupform-locale required">
                                                <label for="">Location</label>
                                                <select id="signupform-locale" class="form-control" name="" aria-required="true">
                                        <option value="">Select Location</option>
                                        <option value="">Mohammadpur</option>
                                        <option value="">Shyamoli</option>
                                        <option value="">Dhanmondi</option>
                                        <option value="">Farmgate</option>
                                        <option value="">Panthopath</option>
                                        <option value="">Kolabagan</option>
                                        <option value="">New Market</option>
                                        <option value="">Azimpur</option>
                                        <option value="">Narayanganj</option>
                                        <option value="">Bosila</option>
                                        <option value="">Gazipur</option>
                                        <option value="">Uttora</option>
                                    </select>
                                            </div>
                                            <div class="form-group field-signupform-locale required">
                                                <label for="">Category</label>
                                                <select id="signupform-locale" class="form-control" name="" aria-required="true">
                                        <option value="">Select Category</option>
                                        <option value="">Bangla Medium</option>
                                        <option value="">English Version</option>
                                        <option value="">English Medium</option>
                                        <option value="">Religious Studies</option>
                                        <option value="">Admission Test</option>
                                        <option value="">Arts</option>
                                        <option value="">Language Learning</option>
                                        <option value="">Test Preparation</option>
                                        <option value="">Professional Skill Development</option>
                                        <option value="">Special Skill Development</option>
                                        <option value="">Project/Assignment</option>
                                        <option value="">Madrasa Medium </option>
                                    </select>
                                            </div>
                                            <div class="form-group field-signupform-locale required">
                                                <label for="">Class/Course</label>
                                                <select id="signupform-locale" class="form-control" name="" aria-required="true">
                                        <option value="">Select Class/Course</option>
                                        <option value="">Pre-Schooling</option>
                                        <option value="">Play</option>
                                        <option value="">Nursery</option>
                                        <option value="">KG</option>
                                        <option value="">Class 1</option>
                                        <option value="">Class 2</option>
                                        <option value="">Class 3</option>
                                        <option value="">Class 4</option>
                                        <option value="">Class 5</option>
                                        <option value="">Class 6</option>
                                        <option value="">Class 7</option>
                                        <option value="">Class 8</option>
                                        <option value="">Class 9</option>
                                        <option value="">Class 10</option>
                                        <option value="">HSC- 1st Year</option>
                                        <option value="">HSC- 2nd Year</option>
                                    </select>
                                            </div>
                                            <div class="form-group field-signupform-locale required">
                                                <label for="">Student Gender</label>
                                                <select id="signupform-locale" class="form-control" name="" aria-required="true">
                                        <option value="">Select Student Gender</option>
                                        <option value="">Male</option>
                                        <option value="">Female</option>
                                    </select>
                                            </div>
                                            <div class="form-group field-salary required">
                                                <label for="">Institute Name</label>
                                                <input type="text" id="institute name" class="form-control" name="" title="Institute Name" placeholder="Institute Name" aria-required="true">
                                            </div>

                                        </form>
                                        <input id="next_btn1" onclick="next_step1()" type="button" value="Continue">
                                    </div>

                                    <!--signup Start--->
                                </div>
                            </div>

                        </fieldset>
                        <fieldset id="second">
                            <div class="row">
                                <div class="col-sm-12 col-text-center">
                                    <div class="enter-box submit-box">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <h4 class="signup-subject-header">Subject</h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                                    <input type="checkbox" value="1" />
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                    C
                                                </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label style="font-size:13px;font-family: 'Poppins', sans-serif; cursor: pointer;">
                                                    <input type="checkbox" value="1" />
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                    C++
                                                </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                                    <input type="checkbox" value="1" />
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                    java
                                                </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                                    <input type="checkbox" value="1" />
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                    PHP
                                                </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                                    <input type="checkbox" value="1" />
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                    Laravel
                                                </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">
                                                    <input type="checkbox" value="1" />
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                    Asp.net
                                                </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">

                                                <div style="margin-top: 20px;" class="form-group field-signupform-locale required">
                                                    <label for="">Tutor gender reference</label>
                                                    <select id="signupform-locale" class="form-control" name="" aria-required="true">
                                            <option value="">Tutor Gender Reference</option>
                                            <option value="">Male</option>
                                            <option value="">Female</option>
                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div style="margin-top: 20px;" class="form-group field-signupform-locale required">
                                                    <label for="">Days in a week</label>
                                                    <select id="signupform-locale" class="form-control" name="" aria-required="true">
                                            <option value="">Days in a Week</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">5</option>
                                            <option value="">6</option>
                                            <option value="">7</option>
                                        </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group field-salary required">
                                                    <label for="">Salary</label>
                                                    <input type="number" id="salary" class="form-control" name="" title="Salary" placeholder="Salary" aria-required="true">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group field-date required">
                                                    <label for="">When Are You Looking To Hire</label>
                                                    <input type="text" id="datepicker" class="form-control" name="" title="Date" placeholder="mm/dd/yyyy" aria-required="true">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group field-address required">
                                                    <label for="">Address</label>
                                                    <input type="text" id="datepicker" class="form-control" name="" title="Address" placeholder="Address" aria-required="true">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group field-signupform-locale required">
                                                    <label for="">No. of student</label>
                                                    <select id="signupform-locale" class="form-control" name="" aria-required="true">
                                            <option value="">No of Student</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">5</option>
                                            <option value="">6</option>
                                            <option value="">7</option>
                                            <option value="">8</option>
                                            <option value="">9</option>
                                            <option value="">10</option>
                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group field-time required">
                                                    <label for="">Tutoring Time</label>
                                                    <input type="text" id="datepicker" class="form-control" name="" title="Tutoring Time" placeholder="Tutoring Time" aria-required="true">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group field-signupform-locale required">
                                                    <label for="">How Did You Hear About Us?</label>
                                                    <select id="signupform-locale" class="form-control" name="" aria-required="true">
                                            <option value="">What did you here about us</option>
                                            <option value="">From Friends & Family</option>
                                            <option value="">From Facebook </option>
                                            <option value="">From Google</option>
                                            <option value="">From Shop</option>
                                            <option value="">Other</option>

                                        </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group field-message">
                                            <label for="">Requirements</label>
                                            <textarea id="message" class="form-control signupform-text-area" name="" title="Requirment" placeholder="Please tell us a bit more about your requirement" style=""></textarea>
                                        </div>


                                        <input id="pre_btn1" onclick="prev_step1()" type="button" value="Previous">
                                        <input id="next_btn2" name="next" onclick="next_step2()" type="button" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </fieldset>



                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>


    <script>
        /*---------------------------------------------------------*/
        // Function that executes on click of first next button.
        function next_step1() {
            document.getElementById("first").style.display = "none";
            document.getElementById("second").style.display = "block";
            document.getElementById("active2").style.color = "red";
        }
        // Function that executes on click of first previous button.
        function prev_step1() {
            document.getElementById("first").style.display = "block";
            document.getElementById("second").style.display = "none";
            document.getElementById("active1").style.color = "red";
            document.getElementById("active2").style.color = "gray";
        }
        // Function that executes on click of second next button.
        function next_step2() {
            document.getElementById("second").style.display = "none";
            document.getElementById("third").style.display = "block";
            document.getElementById("active3").style.color = "red";
        }
        // Function that executes on click of second previous button.
        function prev_step2() {
            document.getElementById("third").style.display = "none";
            document.getElementById("second").style.display = "block";
            document.getElementById("active2").style.color = "red";
            document.getElementById("active3").style.color = "gray";
        }
    </script>
</body>

</html>