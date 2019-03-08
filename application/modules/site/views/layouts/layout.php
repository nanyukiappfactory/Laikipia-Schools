    <!doctype html>
    <html lang="en">

    <head>
        <?php $this->load->view('site/layouts/header');?>
    </head>

    <body>
        <?php echo $this->load->view('site/layouts/navigation'); ?>

        <div class='container-fluid'>
            <?php echo $content; ?>
        </div>
        <div class='container-fluid'>
            <?php echo $content2; ?>
        </div>
        <script src="<?php echo base_url(); ?>assets/jquery-3.3.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/themes/website/assets/vendor/bootstrap/js/bootstrap.min.js">
        </script>
        <script src="<?php echo base_url(); ?>assets/themes/website/assets/vendor/owlcarousel/dist/owl.carousel.min.js">
        </script>
        <script src="<?php echo base_url(); ?>assets/themes/website/assets/vendor/tweenmax/js/TweenMax.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/themes/website/assets/custom/js/main.js"></script>
    </body>
    <div>
        <?php echo $this->load->view('site/layouts/footer'); ?>
    </div>

    </html>