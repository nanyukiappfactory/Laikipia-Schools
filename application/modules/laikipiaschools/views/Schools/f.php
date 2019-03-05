 <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
     data-target="#editModal<?php echo $row->school_id; ?>"><i class="fas fa-edit"></i></button>
 <!-- Modal -->
 <div class="modal fade" id="editModal<?php echo $row->school_id; ?>" tabindex="-1" role="dialog"
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

                 <div class="row">
                     <label class="col-form-label col-sm-2 pt-0">Post Status</label>
                     <div class="form-group">
                         <input type="radio" name="post_status" value="1"
                             <?php echo ($row->post_status == 'Active') ? 'checked' : '' ?>>Active
                         <input type="radio" name="post_status" value="0"
                             <?php echo ($row->post_status == 'Inactive') ? 'checked' : '' ?>>Inactive
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="created_on" class="col-sm-2 col-form-label">Post
                         Date</label>
                     <div class="col-md-10">
                         <?php echo form_input(['name' => 'created_on', 'type' => 'date', 'class' => 'form-control', 'value' => set_value('created_on', $row->created_on)]) ?>
                     </div>
                 </div>
                 <div class="form-group">
                     <label for="post_description">Post Description</label>
                     <?php echo form_textarea(array('name' => 'post_description', 'placeholder' => 'Write a description of the post', 'class' => "editable", 'value' => set_value('created_on', $row->post_description))); ?>
                     <!-- <small id="emailHelp" class="form-text text-muted"></small> -->
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
 </div>