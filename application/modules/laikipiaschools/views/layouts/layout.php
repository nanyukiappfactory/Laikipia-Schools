<!doctype html>
<html lang="en">

<head>
    <?php $this->load->view('laikipiaschools/layouts/includes/header');?>
</head>

<body>
    <?php echo $this->load->view('laikipiaschools/layouts/includes/navigation'); ?>

    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('laikipiaschools/layouts/includes/sidebar');?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10">
                <?php
$error = $this->session->flashdata('error');
$success = $this->session->flashdata('success');
if (!empty($error)) {
    ?>
                <div class="alert alert-danger">
                    <?php echo $error; ?>
                </div>
                <?php
}
if (!empty($success)) {
    ?>
                <div class="alert alert-success">
                    <?php echo $success; ?>
                </div>
                <?php
}

echo $content;
?>
            </main>
        </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/js/bootstrap.min.js"></script>
    <script defer src="<?php echo base_url(); ?>assets/fontawesome/js/all.js"></script>
    <script defer src="<?php echo base_url(); ?>assets/tinymce/js/tinymce/jquery.tinymce.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMfrWKiELcjgQDzNq1n3LTVMSQAXGSs6E">
    </script>
    <script src="<?php echo base_url(); ?>assets/vendor/script.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/script1.js"></script>
    <script src="<?php echo base_url(); ?>assets/custom/js/custom.js"></script>
    <link
        href="<?php echo base_url(); ?>assets/themes/website/assets/vendor/owlcarousel/docs/assets/vendors/jquery.min.js"
        rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/themes/website/assets/vendor/owlcarousel/dist/owl.carousel.min.js"
        type="text/javascript">
    </script>
    <script src="<?php echo base_url(); ?>assets/themes/website/assets/vendor/tweenmax/js/TweenMax.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/themes/website/assets/custom/js/main.js" type="text/javascript">
    </script>



</body>

</html>