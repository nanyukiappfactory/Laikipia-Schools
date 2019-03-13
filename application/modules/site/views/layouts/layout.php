<!doctype html>
<html lang="en">

    <head>
        <?php $this->load->view('site/layouts/header');?>
    </head>

    <body>
        <?php echo $this->load->view('site/layouts/navigation'); ?>

        <div class="page-content">
            <?php echo $content; ?>
        </div>

        <?php echo $this->load->view('site/layouts/footer'); ?>

    </body>

</html>

