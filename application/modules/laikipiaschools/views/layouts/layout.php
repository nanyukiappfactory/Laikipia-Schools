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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMfrWKiELcjgQDzNq1n3LTVMSQAXGSs6E">
    </script>
    <script src="<?php echo base_url(); ?>assets/vendor/script.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/script1.js"></script>
    <script src="<?php echo base_url(); ?>assets/custom/js/custom.js"></script>
    <script src="<?php echo base_url(); ?>assets/themes/website/assets/vendor/owlcarousel/dist/owl.carousel.min.js" type="text/javascript">
    </script>
    <script src="<?php echo base_url(); ?>assets/themes/website/assets/vendor/tweenmax/js/TweenMax.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/themes/website/assets/custom/js/main.js" type="text/javascript"></script>

	<script defer src="<?php echo base_url(); ?>assets/tinymce/js/tinymce/jquery.tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript">

		$(document).ready(function() {
			
			$('#datepicker').datepicker();
			
			tinymce.init({
				selector: "textarea",
				plugins: "textcolor code emoticons image imagetools insertdatetime link advlist media paste searchreplace spellchecker table wordcount",
				font_formats: 'Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats',
				fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
				toolbar: ["bold italic underline strikethrough alignleft aligncenter alignright alignjustify fontselect fontsizeselect cut copy paste bullist numlist outdent indent blockquote undo redo removeformat",
				"subscript superscript undo redo | forecolor backcolor emoticons image insertdatetime link media paste searchreplace spellchecker table code"],
			});
		});
	</script>
</body>

</html>
