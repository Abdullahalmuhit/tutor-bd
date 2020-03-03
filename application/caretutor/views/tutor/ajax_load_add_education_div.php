<table class="uk-table">
	<thead>
        <tr>
            <th class="uk-width-5-10 uk-text-nowrap">Add educational information</th>
            <th class="uk-width-5-10 uk-text-nowrap" style="text-align: right;">
            	<div class="uk-clearfix md-card-overlay-header">
                    <i class="md-icon md-icon material-icons md-card-overlay-toggler remove_education_div">&#xE5CD;</i>
                </div>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
        	<td>
        		<!--<input type="text" class="md-input md-input-width-medium uk-width-5-10" placeholder="Level of education" value="" />-->
        		<div class="md-input-wrapper">
        			<input type="text" id="user_edit_level_of_education_control" class="md-input md-input-width-medium uk-width-5-10" placeholder="Level of education" value="">
        			<span class="md-input-bar"></span>
        		</div>
        	</td>
        	<td>
        		<!--<input type="text" class="md-input md-input-width-medium uk-width-5-10" placeholder="Exam/Degree title" value="" />-->
        		<div class="md-input-wrapper">
        			<input type="text" id="user_edit_exam_degree_title_control" class="md-input md-input-width-medium uk-width-5-10" placeholder="Exam/Degree title" value="">
        			<span class="md-input-bar"></span>
        		</div>
        	</td>
        </tr>
        <tr>
        	<td>
        		<div class="uk-autocomplete uk-form" data-uk-autocomplete="{source:'my-autocomplete.json'}">
				    <div class="md-input-wrapper">
				    	<input type="text" class="md-input md-input-width-medium" placeholder="Concentration / Major / Group" value="">
				    	<span class="md-input-bar"></span>
				    </div>
				</div>	
        	</td>
        	<td>
        		<!--<div class="uk-autocomplete uk-form" data-uk-autocomplete="{source:'my-autocomplete.json'}">
				    <div class="md-input-wrapper">
				    	<input type="text" class="md-input md-input-width-medium" placeholder="Institute Name" value="">
				    	<span class="md-input-bar"></span>
				    </div>
				</div>-->
        		<div class="md-input-wrapper">
        			<input type="text" class="md-input md-input-width-medium" placeholder="Institute Name" value="">
        			<span class="md-input-bar"></span>
        		</div>
        	</td>
        </tr>
        <tr>
        	<td>
        		<div class="md-input-wrapper">
        			<input type="text" class="md-input md-input-width-medium uk-width-5-10" placeholder="Result" value="">
        			<span class="md-input-bar"></span>
        		</div>
        	</td>
        	<td>
        		<div class="md-input-wrapper">
        			<input type="text" id="kUI_masked_pass_year" class="md-input md-input-width-medium uk-width-5-10 k-textbox" placeholder="Year of passing" value="" data-role="maskedtextbox" autocomplete="off">
        			<span class="md-input-bar"></span>
        		</div>
        	</td>
        </tr>
        <tr>
        	<td>
        		<div class="md-input-wrapper">
        			<input type="text" class="md-input md-input-width-medium" placeholder="Duration" value="">
        			<span class="md-input-bar"></span>
        		</div>
        	</td>
        	<td class="uk-text-center uk-text-middle">
                <div class="icheckbox_md">
                	<input type="checkbox" name="checkbox_demo" data-md-icheck style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);">
                	<ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                </div>
                <label for="checkbox_demo_2" class="inline-label">Current institute?</label>
        	</td>
        </tr>
    </tbody>
</table>