<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="list-group-flush">
        <ul class="nav flex-column" style="list-style-type:none;">

            <li class="nav-item pl-4 ">

                <div class="menu-block customscroll">
                    <div class="sidebar-menu">
                        <ul id="accordion-menu">
                            <li class="dropdown">
                                <a href="<?php echo base_url(); ?>administration/schools" class="">
                                    <span class="fas fa-graduation-cap"></span><span
                                        class="mtext"><b>&nbsp;School</b></span>
                                </a>
                            </li>
                            <hr>
                            <li class="dropdown">
                                <a href="javascript:;" class="">
                                    <span class="fa fa-table"></span><b>&nbsp;Content</b>
                                </a>
                                <ul class="submenu">
                                    <li><a href="<?php echo base_url(); ?>administration/categories">Category</a></li>

                                    <li><a href="<?php echo base_url(); ?>administration/posts">Posts</a></li>
                                </ul>
                            </li>
                            <hr>
                            <li class="dropdown">
                                <a href="<?php echo base_url(); ?>administration/donations" class="">
                                    <span class="fas fa-gift"></span><span
                                        class="mtext"><b>&nbsp;Donations</b></span>
                                </a>
                            </li>
    
                        </ul>
                    </div>
                </div>
            </li>

        </ul>
    </div>
</nav>