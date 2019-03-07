    <!doctype html>
    <html lang="en">
    <head>
        <?php $this->load->view('site/layouts/header');?>
    </head>
    <body>
        <?php echo $this->load->view('site/layouts/navigation'); ?>
    
    <div class='container-fluid'>
        <div class='row'>
            <?php echo $this->$content;?>
        </div>
    </div>
    <script src="../../jquery-3.3.1.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/owlcarousel/dist/owl.carousel.min.js"></script>
	<script src="assets/vendor/tweenmax/js/TweenMax.min.js"></script>
	<script src="assets/custom/js/main.js"></script>
    </body>
    </html>