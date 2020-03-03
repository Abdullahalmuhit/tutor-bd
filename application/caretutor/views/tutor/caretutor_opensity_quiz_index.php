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
                <div class="uk-width-medium-1">
                    <div class="md-card">
                        <div class="md-card-toolbar toolbar_blue">
                            <div class="md-card-toolbar-actions">
                                <div class="md-card-dropdown" data-uk-dropdown>
                                    <i style="color: #FFFFFF;" class="md-icon material-icons">&#xE5D4;</i>
                                    <div class="uk-dropdown uk-dropdown-flip">
                                        <ul class="uk-nav">
                                            <li><a href="#">Start Quiz</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <h3 class="md-card-toolbar-heading-text" style="text-align: left;">
                                <?php echo $exam->examname; ?>
                            </h3>
                        </div>
                        <div class="md-card-content">
                            <div class="uk-grid" data-uk-grid-margin>
		                        <div class="uk-width-medium-1-2">
		                            <ul class="md-list">
		                                <li>
		                                    <div class="md-list-content">
		                                        <span class="uk-text-small uk-text-muted">Exam Title </span>
		                                        <span class="md-list-heading"> <?php echo $exam->examname; ?></span>
		                                    </div>
		                                </li>
		                                <li>
		                                    <div class="md-list-content">
		                                        <span class="uk-text-small uk-text-muted">Total Question</span>
		                                        <span class="md-list-heading"><?php echo $exam->questions; ?> </span>
		                                    </div>
		                                </li>
		                            </ul>
		                        </div>
		                        <div class="uk-width-medium-1-2">
		                            <ul class="md-list">
		                                <li>
		                                    <div class="md-list-content">
		                                        <span class="uk-text-small uk-text-muted">Total Time</span>
		                                        <span class="md-list-heading"><?php echo $exam->duration; ?> mins</span>
		                                    </div>
		                                </li>
		                                <li>
		                                    <div class="md-list-content">
		                                        <span class="uk-text-small uk-text-muted">Appearence</span>
		                                        <span class="md-list-heading">All at once</span>
		                                    </div>
		                                </li>
		                            </ul>
		                        </div>
		                        <div class="uk-width-medium-1-1">
		                            <p>Please do not reload or leave your browser during test. You will find remaining time at top right corner. Please watch your time.</p> 
		                        </div>
		                        <div class="uk-width-medium-1-1 uk-text-right">
		                        	<a style="padding: 10px 25px;" href="<?php echo base_url().'quizes/load_all_quiz_question'; ?>" class="md-btn md-btn md-btn-primary">Start Quiz</a>
		                        </div>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>