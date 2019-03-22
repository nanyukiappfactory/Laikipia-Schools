<nav class="navbar navbar-expand-lg navbar-light border-bottom box-shadow bg-light navbar-fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
        aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Administration</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">ec
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        </ul>
        
    	<a class="p-2 text-dark" href="#">
        	<span class="user-name">
				<?php 
				if ($this->session->userdata('laikipia_admin')) {
					echo ($this->session->userdata('laikipia_admin'))['other_name'];
				}
				else {
					redirect('administration/login');
				}
				?>
			</span>
		</a>
		<a class="btn btn-outline-danger btn-sm" href="<?php echo base_url(); ?>administration/logout">
			<i class="fas fa-sign-out-alt"></i>Log Out
		</a>
	</div>
</nav>
