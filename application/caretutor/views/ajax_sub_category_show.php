
    <select id="selsubcat" class="selsubcat selectized" name="selsubcat" data-md-selectize tabindex="-1" style="display: none;">
        <?php foreach($courses as $cour){ ?>
		<option value="<?php echo $cour->id; ?>"><?php echo $cour->category; ?></option>
		<?php } ?>
    </select>
    <div class="selectize-control selsubcat single plugin-dropdown_append_page">
    	<div class="selectize-input items has-options full has-items">
    		<div class="item" data-value=""></div>
    		<input type="text" autocomplete="off" tabindex="" style="width: 4px; opacity: 0; position: absolute; left: -10000px;">
    	</div>
    </div>
    <div class="selectize_fix"></div>
