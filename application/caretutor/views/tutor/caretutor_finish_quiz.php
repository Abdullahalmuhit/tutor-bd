<div id="quiz_result">
	<div id="page_content">
        <div id="page_content_inner">

            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1">
                    <div class="md-card">
                        <div class="md-card-toolbar toolbar_blue">
                            <h3 class="md-card-toolbar-heading-text">
                                <?php echo "Quiz" ?>
                            </h3>
                        </div>
                        <div class="md-card-content">
                            <div class="uk-grid" data-uk-grid-margin>
		                        <div class="uk-width-medium-1-1">
		                        	<?php echo "EXAM FINISHED"; ?>
		                        	<br/>
		                        	<?php echo ($user_exam_info->correctlyanswered >= $exam_info->passmark)?"Congratulations! You have passed the exam.":"Sorry. You didn't pass the exam."; echo "You have gained : ".$user_exam_info->correctlyanswered.'/'.$exam_info->questions; echo ($user_exam_info->correctlyanswered >= $exam_info->passmark)?"":"." ?>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>
