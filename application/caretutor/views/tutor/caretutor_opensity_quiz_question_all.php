<!--div id="qz">

</div-->
<style type="text/css">
    @media (max-width: 960px) {
        #page_content{
            margin-top: 20px;
        }
    }
</style>
<div id="page_content" >
    <div id="page_content_inner">

        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-3-4">
                <div class="md-card">
                    <div class="md-card-toolbar toolbar_blue">
                        <h3 class="md-card-toolbar-heading-text" style="text-align: left;">
                            <?php echo (isset($exams_data) && isset($exams_data->examname) ? $exams_data->examname : "Quiz") ?>
                        </h3>

                    </div>
                    <div class="md-card-content">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">


                                <ul class="md-list">


                                    <?php
                                    $ques_no = 1;
                                    //echo var_dump($all_questions);
                                    foreach ($all_questions as $question) {
                                        ?>
                                        <li>
                                            <div class="md-list-content">
                                                <h3 class="md-list-sub-heading"><?php echo $ques_no; ?>. <?php echo $question->question; ?> </h3>
                                                <p>
                                                    <input type="radio" name="quiz_ans_<?php echo $question->questionid; ?>" id="quiz_ans" value="A" data-md-icheck />
                                                    <label for="quiz_ans_<?php echo $question->questionid; ?>" class="inline-label"><?php echo $question->optiona; ?></label>
                                                </p>
                                                <p>
                                                    <input type="radio" name="quiz_ans_<?php echo $question->questionid; ?>" id="quiz_ans" value="B" data-md-icheck />
                                                    <label for="quiz_ans_<?php echo $question->questionid; ?>" class="inline-label"><?php echo $question->optionb; ?></label>
                                                </p>
                                                <p>
                                                    <input type="radio" name="quiz_ans_<?php echo $question->questionid; ?>" id="quiz_ans" value="C" data-md-icheck />
                                                    <label for="quiz_ans_<?php echo $question->questionid; ?>" class="inline-label"><?php echo $question->optionc; ?></label>
                                                </p>
                                                <p>
                                                    <input type="radio" name="quiz_ans_<?php echo $question->questionid; ?>" id="quiz_ans" value="D" data-md-icheck />
                                                    <label for="quiz_ans_<?php echo $question->questionid; ?>" class="inline-label"><?php echo $question->optiond; ?></label>
                                                </p>
                                                <input type="hidden" name="question_id[]" value="<?php echo $question->questionid; ?>" >
                                                <input type="hidden" name="correct_ans_<?php echo $question->questionid; ?>" value="<?php echo $question->correctanswer; ?>" >
                                                <input type="hidden" name="que_point_<?php echo $question->questionid; ?>" value="<?php echo $question->marks; ?>" >
                                            </div>
                                        </li>
                                        <?php
                                        $ques_no = $ques_no + 1;
                                    }
                                    ?>


                                </ul>
                            </div>
                            <div class="uk-width-medium-1-1 uk-text-right">
                                <button type="button" class="md-btn md-btn md-btn-primary submit_quiz">SUBMIT</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-width-medium-1-4">

                <div class="md-card" data-uk-sticky="{ top: 73 }">
                    <div class="md-card-toolbar toolbar_blue">
                        <h3 class="md-card-toolbar-heading-text" style="text-align: center;">
                            <?php
                            //$minutes = floor(($time / 60) % 60);
                            //$seconds = $time % 60;
                            ?>
                            <?php //echo "Remaining Time : ".$minutes." Minutes ".$seconds." Seconds"; ?>
                            Time Remaining

                        </h3>
                    </div>
                    <div class="md-card-content">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1" style="text-align: center;">
                                <span id ="timer" style="font-size: 70px; line-height: 70px;  color: #1f2c44; font-weight: 300;"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<script>

    var timeDuration = "<?php echo $exams_data->duration ?>";
    document.getElementById('timer').innerHTML = timeDuration + ":" + 00;
    startTimer();

    function startTimer() {
        var presentTime = document.getElementById('timer').innerHTML;
        var timeArray = presentTime.split(/[:]+/);
        var m = timeArray[0];
        var s = checkSecond((timeArray[1] - 1));
        if (s == 59) {
            m = m - 1
        }
        if (m < 0) {
            window.location = BASE_URL + "quizes/quiz_completed";
        }

        document.getElementById('timer').innerHTML =
                m + ":" + s;
        setTimeout(startTimer, 1000);
    }

    function checkSecond(sec) {
        if (sec < 10 && sec >= 0) {
            sec = "0" + sec
        }
        ; // add zero in front of numbers < 10
        if (sec < 0) {
            sec = "59"
        }
        ;
        return sec;
    }
</script>
