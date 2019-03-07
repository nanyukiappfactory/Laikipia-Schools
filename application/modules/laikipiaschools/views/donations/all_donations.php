<div class="card shadow mb-4">
    <div class="card-header py-3">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createDonation">Add
            Donation</button>
            <a href="<?php echo site_url() . "administration/export-donations" ?>" target="_blank"
            class="btn btn-default pull-right"><i class="fas fa-file-export"></i> Export</a>

        <div class="modal fade" id="createDonation" tabindex="-1" role="dialog" aria-labelledby="createDonationLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createDonationLabel">Add Donation</h5>
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        
                    </div>
                    <div class="modal-body">
                        <?php echo form_open($this->uri->uri_string()); ?>

                        <div class="form-group row">

                            <div class="col-sm-12 col-md-12">
                                <input type="number" class="form-control" id="donation_amount" name="donation_amount"
                                    placeholder="Donation Amount" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-12">
                                <select class="custom-select my-1 mr-sm-2" name="post_id" required>
                                    <option selected>Choose Partner...</option>
                                    <?php  
                                        
                                        foreach ($categories->result() as $row) {
                                            if(strtolower($row->category_name) == strtolower("partner")){?>
                                                 <option value="<?php echo $row->post_id; ?>"><?php echo $row->post_title; ?></option>
                                            <?php }
                                            if(strtolower($row->category_name) == strtolower("Donor")){?>
                                                <option value="<?php echo $row->post_id; ?>"><?php echo $row->post_title; ?></option>
                                            <?php }
}

?>

                                </select>
                            </div>
                            </div>

                        <div class="form-group row">
                            <div class="col-sm-12 col-md-12">
                                <select class="custom-select my-1 mr-sm-2" name="school_id" required>
                                    <option selected>Choose School...</option>
                                    <?php
if ($schools->num_rows() > 0) {
    foreach ($schools->result() as $row) {?>
                                    <option value="<?php echo $row->school_id; ?>">
                                        <?php echo $row->school_name; ?>
                                    </option>
                                    <?php
}
}
?>
                                </select>
                            </div>

                        </div>
                        <div class="form-group">
                                    <label for="donation_status">Status</label>
                                    <div class="col-sm-10 row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="donation_status"
                                                id="donation_status" value="1" checked>
                                            <label class="form-check-label mr-5" for="gridRadios1">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="donation_status"
                                                id="donation_status" value="0">
                                            <label class="form-check-label mb-3" for="gridRadios2">
                                                Inactive
                                            </label>
                                        </div>
                                    </div>
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        <?php form_close();?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <!-- <th>Partner</th> -->
                        <th>Donor</th>
                        <th>School</th>
                        <!-- <th>Amount</th> -->
                        <th><?php echo anchor("administration/donations/donation.donation_amount/" . $order_method, "Amount"); ?>
                    </th>
                        <!-- <th>Donation Date</th> -->
                       <th> <?php echo anchor("administration/donations/donation.created_on/" . $order_method,"Donation Date"); ?></th>
                        <th>Status</th>

                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Donor</th>
                        <th>School</th>
                        <th>Amount</th>
                        <th>Donation Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                        
                    </tr>
                </tfoot>
                <tbody>
                    <?php
if ($query->num_rows() > 0) {
    $count = 0;
    foreach ($query->result() as $row) {
        $count++;
        ?>
                    <tr>
                        <td>
                            <?php echo $count ?>
                        </td>
                        <td>
                            <?php echo $row->post_title; ?>
                        </td>
                        <td>
                            <?php echo $row->school_name; ?>
                        </td>
                        <td>
                            <?php echo number_format($row->donation_amount); ?>
                        </td>

                        <td>
                            <?php echo date('jS M Y', strtotime($row->created_on)); ?>
                        </td>
                        <td>
                            <?php if($row->donation_status == 1){?>
                                <span class="badge badge-pill badge-success">Active</span>
                                <?php } else {?>
                                <span class="badge badge-pill badge-secondary">Inactive</span>
                                <?php }?>
                        </td>
                        <td>
                        <?php if ($row->donation_status == 1) {?>
                            <a href="" class="btn btn-dark btn-sm" data-toggle="modal"
                                data-target="#modalLoginAvatar<?php echo $row->donation_id; ?>"><i
                                    class="fas fa-eye"></i></a>
                            <?php }?>

                            <!--Modal: Login with Avatar Form-->
                            <div class="modal fade" id="modalLoginAvatar<?php echo $row->donation_id; ?>" tabindex="-1"
                                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog cascading-modal modal-avatar modal-md" role="document">
                                    <!--Content-->
                                    <div class="modal-content" style="margin-left:0px;">

                                        <!--Body-->
                                        <div class="modal-body">

                                            <h5 class=" pb-3"><b>Retrieved Donor:</b> <br /> <?php echo $row->post_title; ?>
                                            </h5>

                                            <div class=" ml-1 pb-3" style="font-size:20px;list-style-type:none;">
                                                <li><b>Donation Amount:</b> <br /> <?php echo $row->donation_amount; ?>
                                                </li>
                                            </div>
                                            
                                            <div class="ml-1 pb-3" style="font-size:20px;list-style-type:none;">
                                                <li><b>School Name: </b> <br /><?php echo $row->school_name; ?></li>
                                            </div>
                                            <div class="ml-1 pb-3" style="font-size:20px;list-style-type:none;">
                                                <li><b>Donation Status: </b> <br /><?php if($row->donation_status == 1){?>
                                                    <span class="badge badge-pill badge-success">Active</span>
                                                    <?php } else {?>
                                                    <span class="badge badge-pill badge-secondary">Inactive</span>
                                                    <?php }?>
                                                </li>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary"
                                                    data-dismiss="modal">Close</button>
                                            </div>

                                        </div>

                                    </div>
                                    <!--/.Content-->
                                </div>
                            </div>
                            <!--Modal: Login with Avatar Form-->


                        <?php echo anchor("administration/edit-donation/" . $row->donation_id, "<i class='fas fa-edit'></i>", "class='btn btn-warning btn-sm p-left-10'", "style='padding-left:10px;'"); ?>

<?php if ($row->donation_status == 1) {
echo anchor("administration/deactivate-donation/" . $row->donation_id . "/" . $row->donation_status, "<i class='far fa-thumbs-down'></i>", array("class" => "btn btn-info btn-sm p-left-10", "onclick" => "return confirm('Are you sure you want to deactivate?')"));
} else {
echo anchor("administration/deactivate-donation/" . $row->donation_id . "/" . $row->donation_status, "<i class='far fa-thumbs-up'></i>", array("class" => "btn btn-info btn-sm", "onclick" => "return confirm('Are you sure you want to activate?')"));
}?>
<?php echo anchor("administration/delete-donation/" . $row->donation_id, "<i class='fas fa-trash-alt'></i>", array("class" => "btn btn-danger btn-sm", "onclick" => "return confirm('Are you sure you want to Delete?')")); ?>
                        </td>
                    </tr>
                    <?php
}
}
?>
                </tbody>
            </table>
        </div>

        <p>
            <?php echo $links; ?>
        </p>
    </div>
</div>