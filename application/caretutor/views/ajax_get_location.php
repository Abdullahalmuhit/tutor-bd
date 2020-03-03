<div class="uk-form-row">
    <label for="sellocation" class="uk-form-label">Location</label>
    <select class="sellocation selectized" id="sellocation" name="sellocation" required data-md-selectize tabindex="-1" style="display: none;" data-parsley-id="8">
    	<option selected="selected" value="">Select location</option>
    	<?php foreach ($locations as $res)
		{ ?>
			<option value='<?php echo $res->id; ?>'><?php echo $res->location; ?></option>
		<?php } ?>
    </select>
</div>
<div class="selectize-control sellocation single plugin-dropdown_append_page">
	<div class="selectize-input items required not-full has-options">
		<input type="text" autocomplete="off" tabindex="" placeholder="Select location" style="width: 89px;" data-parsley-id="10">
	</div>
</div>
<div class="selectize_fix"></div>
