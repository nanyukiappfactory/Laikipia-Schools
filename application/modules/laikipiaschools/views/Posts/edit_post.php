<?php
if ($query->num_rows() > 0) {
	foreach ($query->result() as $row)
	{
        $post_id = $row->post_id;
		$post_thumb_name = $row->post_thumb_name;
		$post_title = $row->post_title;
		$category_id = $row->category_id;
		$post_status = $row->post_status;
		$post_description = $row->post_description;
		$post_date = $row->post_date;
		$post_image = base_url() . 'assets/uploads/' . $post_thumb_name;
	}
}

$error = $this->session->flashdata("error");

if(!empty($error))
{
	$post_title = set_value("post_title");
	$category_name = set_value("category_name");
	$post_status = set_value("post_status");
	$post_description = set_value("post_description");
	$post_date = set_value("post_date");
}
?>
<div class="shadow-lg p-3 mb-5 bg-white rounded">
	<h3>Edit Post</h3>
	<?php echo form_open_multipart(base_url() . 'administration/edit-post/' . $row->post_id); ?>
		<div class="form-group row">
			<label for="post_title" class="col-sm-2 col-form-label">Post Title</label>

			<div class="col-md-10">
				<?php echo form_input(['name' => 'post_title', 'placeholder' => 'Post Name', 'class' => 'form-control', 'value' => set_value('post_title', $post_title)]) ?>
			</div>
		</div>
		<div class="form-group row">
			<label for="post_title" class="col-sm-2 col-form-label">Category</label>
			<div class="col-md-10">
				<select id="inputState" class="form-control" name="category_id">

					<?php 
					if ($categories->num_rows() > 0) {
						foreach ($categories->result() as $row2) {?>
							<option value="<?php echo $row2->category_id; ?>"
								<?php echo $row2->category_id == $category_id ? 'selected' : ''; ?>>
								<?php echo $row2->category_name; ?></option>
							<?php
						}
					}?>

				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="post_title" class="col-sm-2 col-form-label">Post Image</label>
			<div class="col-md-10">
				<img src="<?php echo $post_image;?>" class="img-fluid">
				<input type="file" id="post_image_name" name="post_image_name" class="form-control">
			</div>
		</div>

		<div class="form-group row">
			<label for="post_status">Status</label>
			<div class="col-sm-10 row">
				<?php if($post_status == 1){?>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="post_status" id="post_status"
							value="1" checked>
						<Legend class="form-check-label" for="gridRadios1">
							Active
						</Legend>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="post_status" id="post_status"
							value="0">
						<Legend class="form-check-label" for="gridRadios2">
							Inactive
						</Legend>
					</div>
				<?php } else{?>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="post_status" id="post_status"
							value="1">
						<Legend class="form-check-label" for="gridRadios1">
							Active
						</Legend>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="post_status" id="post_status"
							value="0" checked>
						<Legend class="form-check-label" for="gridRadios2">
							Inactive
						</Legend>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="form-group row">
			<label for="event_name">Post Date</label>
			<div class="input-group">
				<input data-date-format="yyyy-mm-dd" class="form-control" id="datepicker" name="post_date" value="<?php echo $post_date;?>">
				<span class="input-group-addon">
					<i class="fas fa-calendar"></i>
				</span>
			</div>
		</div>
		<div class=" form-group row">
			<label for="post_description">Post Description</label>
			<div class="col-md-10">
				<textarea name="post_description" class="form-control" rows="30"><?php echo $post_description;?></textarea>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-10">
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary"><i class="fas fa-check"></i>Edit Post</button>
				</div>
			</div>
		</div>
	<?php echo form_close(); ?>
</div>
