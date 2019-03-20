<?php
$result = "";

if ($query->num_rows() > 0) {
    $count = $page;

	foreach ($query->result() as $row)
	{
        $count++;
        $post_id = $row->post_id;
		$post_thumb_name = $row->post_thumb_name;
		$post_title = $row->post_title;
		$category_name = $row->category_name;
		$post_status = $row->post_status;
		$post_description = $row->post_description;
		$post_date = $row->post_date;
		$post_image = base_url() . 'assets/uploads/' . $post_thumb_name;

		if ($post_status == 1) {
			$status = '<span class="badge badge-pill badge-success">Active</span>';
			$status_button = anchor("administration/deactivate-post/" . $post_id . "/" . $post_status, "<i class='far fa-thumbs-down'></i>", array("class" => "btn btn-default btn-sm", "onclick" => "return confirm('Are you sure you want to deactivate?')"));
		} else {
			$status = '<span class="badge badge-pill badge-secondary">Inactive</span>';
			$status_button = anchor("administration/deactivate-post/" . $post_id . "/" . $post_status, "<i class='far fa-thumbs-up'></i>", array("class" => "btn btn-info btn-sm", "onclick" => "return confirm('Are you sure you want to activate?')"));
		}

		$delete_button = anchor("administration/delete-post/" . $post_id, "<i class='fas fa-trash-alt'></i>", array("class" => "btn btn-danger btn-sm", "onclick" => "return confirm('Are you sure you want to Delete?')"));
        $result .= '
			<tr>
				<td>
					'.$count.'
				</td>
				<td>
					<img src="'.$post_image.'" class="img-fluid">
				</td>
				<td>
					'.$post_title.'
				</td>

				<td>
					'.$category_name.'
				</td>
				<td>
					'.$status.'
				</td>
				<td>
					'.$post_date.'
				</td>

				<td>
					<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalQuickView'.$post_id.'"><i class="fas fa-eye"></i></button>
					<!-- Modal: modalQuickView -->
					<div class="modal fade" id="modalQuickView'.$post_id.'" tabindex="-1"
						role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content primary">
								<div class="modal-header">
									<strong>
										<h3 class="text-center">'.$post_title.'
										</h3>
									</strong>
								</div>
								<div class="modal-body primary">
									<table class="table table-responsive table-striped table-bordered table-condensed">
										<tr>
											<th>Image</th>
											<td><img src="'.$post_image.'" class="img-fluid"></td>
										</tr>
										<tr>
											<th>Category</th>
											<td>'.$category_name.'</td>
										</tr>
										<tr>
											<th>Status</th>
											<td>'.$status.'</td>
										</tr>
										<tr>
											<th>Date</th>
											<td>'.$post_date.'</td>
										</tr>
										<tr>
											<th>Description</th>
											<td>'.$post_description.'</td>
										</tr>
									</table>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-times"></i>Close</button>
								</div>
							</div>
						</div>
					</div>
				</td>
				<td>
					<a href="'.site_url()."posts/edit-post/".$post_id.'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
				</td>
				<td>
					'.$status_button.'
				</td>
				<td>
					'.$delete_button.'
				</td>
			</tr>
		';
	}
}
?>

<div class="shadow-lg p-3 mb-5 bg-white rounded">
    <div class="card-body">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
				<div class="row">
					<div class="col-md-2">
						<a href="<?php echo site_url()."posts/add-post";?>" class="btn btn-success btn-sm">Add Post</a>
					</div>
					<div class="col-md-10">
						<div class="pull-right">
							<?php echo form_open('administration/search-posts', array("class" => "form-inline my-2 my-lg-0")) ?>

								<select class="custom-select2 form-control mr-sm-2" name="categories_search">
									<option value="">Choose category..</option>
									<?php 
									if($categories->num_rows() > 0)
									{
										foreach ($categories->result() as $row) 
										{
											?>
												<option value="<?php echo $row->category_id; ?>"><?php echo $row->category_name; ?></option>
											<?php 
										}
									}
									?>
								</select>
								
								<input type="text" name="post_titles_search" class="form-control"/>

								<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">
									<i class="fas fa-search"></i>
								</button>

							<?php echo form_close(); 
							
							if ($this->session->userdata("posts_search")) {?>
								<a class="btn btn-outline-primary btn-sm m-2" href="<?php echo base_url() . 'administration/posts/close-search'; ?>">
									Close Search
								</a>
							<?php 
							}
							?>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>

    <div class=" table-responsive">
        <table class="table table-bordered table-striped table-condensed table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Post Image</th>
                    <th>Post Title</th>
                    <th>Post Category</th>
                    <th>Post Status</th>
                    <th>Post Date</th>
                    <th colspan="4">Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Post Image</th>
                    <th>Post Title</th>
                    <th>Post Category</th>
                    <th>Post Status</th>
                    <th>Post Date</th>
                    <th colspan="4">Actions</th>
                </tr>
            </tfoot>
            <tbody>
				<?php echo $result;?>
			</tbody>

		</table>
	</div>

	<?php echo $links;?>

</div>
