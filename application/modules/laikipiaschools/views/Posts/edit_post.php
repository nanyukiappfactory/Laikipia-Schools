   <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
        data-target="#editModal<?php echo $row->post_id; ?>"><i class="fas fa-edit"></i></button>
    <!-- Modal -->
    <div class="modal fade" id="editModal<?php echo $row->post_id; ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Update Post
                        Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Enter Post Details to
                        update</h5>

                    <?php echo form_open(base_url() . 'administration/edit-post/' . $row->post_id); ?>
                    <div class="form-group row">
                        <label for="post_title" class="col-sm-2 col-form-label">Post Title</label>

                        <div class="col-md-10">
                            <?php echo form_input(['name' => 'post_title', 'placeholder' => 'Post Name', 'class' => 'form-control', 'value' => set_value('post_title', $row->post_title)]) ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="post_title" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-md-10">
                            <select id="inputState" class="form-control" name="category_id">

                                <?php if ($categories->num_rows() > 0) {
            foreach ($categories->result() as $row2) {?>
                                <option value="<?php echo $row2->category_id; ?>"
                                    <?php echo $row2->category_id == $row->category_id ? 'selected' : ''; ?>>
                                    <?php echo $row2->category_name; ?></option>
                                <?php
}
        }?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="post_title" class="col-sm-2 col-form-label">Post
                            Image</label>
                        <div class="col-md-10">
                            <?php echo form_input(['name' => 'post_image_name', 'type' => 'file', 'class' => 'form-control']) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="post_status">Status</label>
                        <div class="col-sm-10 row">
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
                        </div>
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group row">
                        <label for="post_date" class="col-sm-2 col-form-label">Post
                            Date</label>
                        <div class="col-md-10">
                            <input class="form-control date-picker" name="post_date"
                                placeholder="<?php echo set_value('post_date', $row->post_date); ?>"
                                value="<?php echo set_value('post_date', $row->post_date); ?>" type="text">
                        </div>

                    </div>
                    <div class=" form-group row">
                        <label for="post_description">Post Description</label>
                        <div class="col-md-10">
                            <textarea id="editable" class="editable"
                                name="post_description"><?php echo set_value('post_description', $row->post_description); ?></textarea>
                        </div>
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                        class="fas fa-times"></i>Close</button>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i>Save
                                    Post</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>















































<div class="container">
    <div class="card-header">
        <h1> Update post Details</h1>
    </div>
    <div class="card-body">
        <h5 class="card-title">Enter post Details to update</h5>

        <?php echo
form_open($this->uri->uri_string()); ?>
        <div class="form-group row">
            <label for="post_title" class="col-sm-2 col-form-label">post Title</label>

            <div class="col-md-10">
                <?php echo form_input(['name' => 'post_title', 'placeholder' => 'Post Title', 'class' => 'form-control', 'value' => set_value('post_title', $post_title)]) ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="post_description" class="col-sm-2 col-form-label">Post Description</label>
            <div class="col-md-10">
                <?php echo form_textarea(['name' => 'post_description', 'placeholder' => 'Describe post', 'class' => 'form-control', 'value' => set_value('post_description', $post_description)]) ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="school_boys_number" class="col-sm-2 col-form-label">Number of Boys</label>
            <div class="col-md-10">
                <?php echo form_input(['name' => 'school_boys_number', 'placeholder' => 'Number of boys, eg. 10', 'class' => 'form-control', 'value' => set_value('school_boys_number', $school_boys_number)]) ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="school_girls_number" class="col-sm-2 col-form-label">Number of Girls</label>
            <div class="col-md-10">
                <?php echo form_input(['name' => 'school_girls_number', 'placeholder' => 'Enter First Name', 'class' => 'form-control', 'value' => set_value('firstname', $school_girls_number)]) ?>
            </div>

        </div>
        <div class="form-group row">
            <label for="school_latitude" class="col-sm-2 col-form-label">Latitude</label>
            <div class="col-md-10">
                <?php echo form_input(['name' => 'school_latitude', 'placeholder' => 'Enter Latitude', 'class' => 'form-control', 'value' => set_value('school_latitude', $school_latitude)]) ?>
            </div>
        </div>


        <div class="form-group row">
            <label for="school_longitude" class="col-sm-2 col-form-label">Longitude</label>
            <div class="col-md-10">
                <?php echo form_input(['name' => 'school_longitude', 'placeholder' => 'Longitude', 'class' => 'form-control', 'value' => set_value('school_longitude', $school_longitude)]) ?>
            </div>

        </div>

        <div class="form-group row">
            <label for="school_location_name" class="col-sm-2 col-form-label">Location Name</label>
            <div class="col-md-10">
                <?php echo form_input(['name' => 'school_location_name', 'placeholder' => 'Location Name', 'class' => 'form-control', 'value' => set_value('school_location_name', $school_location_name)]) ?>
            </div>
        </div>
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">School Status</legend>
            <div class="form-group">
                <input type="radio" name="status" value="1" <?php echo ($school_status == 'Active') ? 'checked' : '' ?>
                    size="17">Active
                <input type="radio" name="status" value="0"
                    <?php echo ($school_status == 'Inactive') ? 'checked' : '' ?> size="17">Inactive
            </div>
        </div>


        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Save School</button>
                <div class="modal-footer">
                    <?php echo anchor('laikipiaschools/schools', 'Cancel', ['class' => 'btn btn-primary']); ?>
                </div>
            </div>
        </div>

    </div>
    <?php
form_close();
?>


</div>
</div>