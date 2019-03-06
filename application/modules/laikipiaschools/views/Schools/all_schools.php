<!--
<div class="container"> -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <?php echo anchor("administration/add-school", "<i class='fas fa-edit'></i>Add School", ['class' => 'btn btn-primary', 'style' => 'padding-left:10px']); ?>
        <!-- <input type="file" class="btn btn-default pull-right" placeholder="Import" /> -->
        <a href="<?php echo site_url() . " administration/export-schools" ?>" target="_blank"
            class="btn btn-default pull-right"><i class="fas fa-file-export"></i> Export</a>
    </div>
</div>

<div class=" table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th> School Picture</th>
                <th>School Name</th>
                <th>Number of Boys</th>
                <th>Number of Girls</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#</th>
                <th>School Picture</th>
                <th>School Name</th>
                <th>Number of Boys</th>
                <th>Number of Girls</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </tfoot>
        <tbody>
            <?php $this->load->view('view_edit_school');?>
        </tbody>
    </table>
</div>
<p>
    <?php echo $links; ?>
</p>