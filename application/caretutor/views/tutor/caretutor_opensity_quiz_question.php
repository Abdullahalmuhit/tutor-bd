<style type="text/css">
     @media (max-width: 960px) {
        #page_content{
            margin-top: 20px;
        }
     }
</style>
<div id="qz">
	<div id="page_content">
        <div id="page_content_inner">

            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1">
                    <div class="md-card">
                        <div class="md-card-toolbar toolbar_blue">
                            <h3 class="md-card-toolbar-heading-text">
                                <?php echo "Quiz" ?>
                            </h3>
                            <h3 class="md-card-toolbar-heading-text" style="float: right;">
                            	<?php 
                            		$minutes = floor(($time / 60) % 60);
									$seconds = $time % 60;
								?>
                                <?php echo "Remaining Time : ".$minutes." Minutes ".$seconds." Seconds"; ?>
                            </h3>
                        </div>
                        <div class="md-card-content">
                            <div class="uk-grid" data-uk-grid-margin>
		                        <div class="uk-width-medium-1-1">
		                        
		                        	<input type="hidden" name="question_id" value="<?php echo $question->questionid; ?>" >
									<input type="hidden" name="que_point" value="<?php echo $question->marks; ?>" >
									
		                            <ul class="md-list">
		                                <li>
		                                    <div class="md-list-content">
		                                        <h3 class="md-list-heading"><?php echo $this->session->userdata('ques_no'); ?>. <?php echo $question->question; ?> </h3>
		                                        <?php 
												//if ($this->session->userdata('question_type') == 'quiz')
												//{
													//foreach ($question_answers as $answer)
													//{
														
												?>
		                                        <p>
			                                        <input type="radio" name="quiz_ans" id="quiz_ans" value="A" data-md-icheck />
			                                        <label for="quiz_ans" class="inline-label"><?php echo $question->optiona; ?></label>
			                                    </p>
			                                    <p>
			                                        <input type="radio" name="quiz_ans" id="quiz_ans" value="B" data-md-icheck />
			                                        <label for="quiz_ans" class="inline-label"><?php echo $question->optionb; ?></label>
			                                    </p>
			                                    <p>
			                                        <input type="radio" name="quiz_ans" id="quiz_ans" value="C" data-md-icheck />
			                                        <label for="quiz_ans" class="inline-label"><?php echo $question->optionc; ?></label>
			                                    </p>
			                                    <p>
			                                        <input type="radio" name="quiz_ans" id="quiz_ans" value="D" data-md-icheck />
			                                        <label for="quiz_ans" class="inline-label"><?php echo $question->optiond; ?></label>
			                                    </p>
			                                    <?php 
													//}
												//}
												//else 
												//{
			                                    ?>
			                                    <!-- <input type="hidden" name="text_ans" value="<?php echo $question_answers[0]->id; ?>">
												<textarea rows="" cols="" name="quiz_text_ans" class="form-control"></textarea> -->
			                                    <?php 
												//}
			                                    ?>
		                                    </div>
		                                </li>
		                            </ul>
		                        </div>
		                        <div class="uk-width-medium-1-1 uk-text-right">
		                        	<button type="button" class="md-btn md-btn md-btn-primary next_question">NEXT</button>
		                        </div>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>