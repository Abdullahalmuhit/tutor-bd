<div class="clearfix">

    <?php foreach ($jobs as $key => $job): ?>
        <div class="item" data-toggle="collapse" data-target="#collapse_<?php echo $job->id; ?>">
            <p><b>job id: <?php echo $job->id ?></b></p>
            <h3 class="map-h3">Need a tutor for <?php echo $job->sub_cat; ?> student</h3>
            <p style="margin-bottom: 10px! important"><i class="fa fa-map-marker"></i> <?php echo $job->city; ?>, <?php echo $job->location; ?></p>
            <div class="row">
                <div class="col-md-6">
                    <p><b>Category:</b> <?php echo $job->category; ?> <br> <b>Gender:</b> <?php echo $job->student_gender; ?></p>
                </div>
                <div class="col-md-6">
                    <p><b>Class:</b> <?php echo $job->sub_cat; ?> <br> <b>Curriculum:</b> </p>
                </div>
            </div>
            <div id="collapse_<?php echo $job->id; ?>" class="collapse" style="margin-top: 10px">
                <div class="row">
                    <div class="col-md-6">
                        <p><b><?php echo $job->days_per_week; ?> days per week</b></p>
                        <p><b>Salary:</b> <?php echo $job->salary_range; ?> tk <br> <b>Tutor Gender Preference: </b> <?php echo $job->preferred_gender; ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><b>Subjects:</b> <?php echo $job->subs; ?> <br> <b>No. of Students:</b> <?php echo $job->no_of_student; ?> </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-7">
                        <p><?php echo $job->other_req; ?> </p>
                    </div>
                    <div class="col-md-5 text-right">
                        <?php if ($job->latitude != 0 && $job->longitude != 0): ?>
                            <button type="button" data-map_lat="<?php echo $job->latitude ?>" data-map_lng="<?php echo $job->longitude ?>" class="btn btn-xs btn-danger map_zoom_in" name="button">Zoom In</button>
                        <?php endif; ?>
                        <button type="button" class="btn btn-xs btn-primary applyJobSignInButton" data-job_id="<?php echo $job->id ?>" name="button">Apply Now</button>
                        <p>posted on 03/02/2018</p>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
