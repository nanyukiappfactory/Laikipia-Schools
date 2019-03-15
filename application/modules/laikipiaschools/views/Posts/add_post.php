
<div class="shadow-lg p-3 mb-5 bg-white rounded">
	<h3>Add Post</h3>
	<?php echo form_open_multipart($this->uri->uri_string()); ?>
		<div class="form-group row">
			<div class="col-sm-12 col-md-12">
				<label for="post_title">Post Title</label>
				<input type="text" class="form-control" id="post_title" name="post_title"
					placeholder="Post Title" required>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-12 col-md-12">
				<label for="category_id">Categories</label>
				<select id="inputState" class="form-control" name="category_id" required>
					<option selected>Choose Category</option>

					<?php if ($categories->num_rows() > 0) {foreach ($categories->result() as $row) {?>
					<option value="<?php echo $row->category_id; ?>">
						<?php echo $row->category_name; ?></option>
					<?php
	}
	}?>
				</select>

			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-12 col-md-12">
				<label for="post_image_name">Post Image</label>
				<input type="file" id="post_image_name" name="post_image_name">
			</div>
		</div>

		<!--
		<div class="form-group row">
			<div class="col-sm-12 col-md-12">
				<label for="post_views">Post Views</label>
				<input type="Numeric" class="form-control" id="post_views" name="post_views"
					placeholder="Views" required>
			</div>
		</div> -->
		<div class="form-group row">
			<div class="col-sm-12 col-md-12">
				<label for="post_date">Post Date</label>
				<input type="date" class="form-control" id="form-control form_datetime" name="post_date" placeholder="Post Date" required>
			</div>
		</div>

		<div class="form-group row">
			<!-- <fieldset class="form-group"> -->
			<div class="col-sm-12 col-md-12">
				<label for="post_image_name">Status</label>
				<br>
				<div class="col-sm-10">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="post_status"
							id="post_status" value="1" checked>
						<label class="form-check-label" for="gridRadios1">
							Active
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="post_status"
							id="post_status" value="0">
						<label class="form-check-label" for="gridRadios2">
							Inactive
						</label>
					</div>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label for="post_description">Post Description</label>
			<textarea name="post_description" class="form-control" rows="30"><?php echo set_value("post_description");?></textarea>
		</div>

		<div class="modal-footer">
			<a href="<?php echo site_url()."administration/posts";?>" class="btn btn-secondary"><i class="fas fa-times"></i>Back</a>
			<button type="submit" class="btn btn-primary"><i class="fas fa-check"></i>Add Post</button>
		</div>
	<?php echo form_close(); ?>
</div>
