<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS
        ================================================== -->       
        <!-- Font awesome css file-->
        <link href="https://caretutors.com/assets/landing/css/font-awesome.min.css" rel="stylesheet">
        <!-- Main structure css file -->

    </head>
    <body>
        <!-- <div>
            <img style="float: center;" src="<?php echo base_url(); ?>assets/img/caretutor_logo_w.png" alt="Caretutors Logo" />
        </div> -->
        <div>
            <h3 style="font-size: 20px; text-align: center; color:#2ad8e2;"><b><u>Tuition Confirmation Letter</u></b></h3>
        </div>
        <div>
            Dear Tutor &amp; Employer,<br/><br/>
            We <b>Caretutors.com</b> are very happy to match you both for Job ID <?php echo $assigned_jobs[0]->job_id; ?>. The vacancy details are in the following:
        </div>
        <?php
        if ($assigned_jobs) {
            foreach ($assigned_jobs as $job) {
                ?>
                <div>
                    <p style="color:#2ad8e2;"><b>Tuition Vacancy Details: Job ID <?php echo $job->id; ?></b></p>
                    <p><b>Category: </b><?php echo $job->category; ?><b>, Curriculum: </b><b>,Class: </b><?php echo $job->sub_cat; ?><b>, Student Gender: </b><?php echo $job->student_gender; ?> </p>
                    <p><b>Days per week: </b><?php echo $job->days_per_week; ?><b>, Salary: </b><?php echo $job->salary_range; ?><b>, Tutor Gender Preference: </b><?php echo $job->preferred_gender; ?></p>
                    <p><b>Subjects: </b><?php echo $job->subs; ?>, <b>Location: </b><?php echo $job->city; ?>, <?php echo $job->location; ?></p>
                    <p><b>Other Requirements: </b><?php echo $job->other_req; ?></p>
                </div>
                </br></br>
                <div>
                    <p><b>Employer Name: </b>Mr / Mrs <?php echo $job->guardian_name; ?>, <b>Guardian ID: </b><?php echo $job->parent_id; ?></p>
                    <p><b>Guardian Contact No: </b><?php echo $job->add_contact_num; ?></p>
                    <p><b>Tutor Name: </b> Mr / Mrs <?php echo $user_data->full_name; ?>, <b>Tutor ID: </b><?php echo $user_data->id; ?></p>
                    <p><b>Tutor Contact No: </b><?php echo $user_data->mobile_no; ?></p>
                    <p><b>Date of Hiring: </b><?php
                        $hire_date = strtotime($job->date_to_hire);
                        $format_hire_date = date('j F Y', $hire_date);
                        echo $format_hire_date;
                        ?></p>
                </div>
                </br>
                <div>
                    # Both parties match with each other by using caretutor's platform & knowing its "Terms of Use & Privacy Policy"
                </div>
                <div>
                    <table style="width:100%">
                        <tr>
                            <td style="color:#2ad8e2;"><h3>Employer Name: </h3></td>
                            <td style="color:#2ad8e2;"><h3>Tutor Name: </h3></td>
                        </tr>
                        <tr>
                            <td><?php echo $job->guardian_name; ?> </td>
                            <td><?php echo $user_data->full_name; ?></td>
                        </tr>
                        <tr>
                            <td><p>Signature......................................... </p></td>
                            <td><p>Signature......................................... </p></td>
                        </tr>
                        <tr>
                            <td>Date................................ </td>
                            <td>Date................................ </td>
                        </tr>
                    </table>
                    </br>
                    <p style="text-align:justify;line-height: 20px;">
                        <b>Note:</b> Caretutors.com is an online tutor matching platform. Our process is done virtually. Hence, we strongly recommend both parties to check our “Terms of Use & Privacy Policy” & our “Safety Guidelines” precisely. For any further assistance, we request to contact our support service (01756441122). </p>
                        <br/><u><h2 style="text-align: center;">Thank you for using our platform</h2></u>
                </div>
                <?php
            }
        }
        ?>
    </body>
</html>