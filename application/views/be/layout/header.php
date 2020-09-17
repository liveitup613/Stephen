<div class="page-header">
    <!-- BEGIN HEADER TOP -->
    <div class="page-header-top">
        <div class="container">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="<?php echo base_url('');?>">                            
                    <img src="<?php echo base_url('assets/layouts/global/img/logo.png');?>" alt="logo" class="logo-default" style='width: 120px;'>
                </a>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler"></a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">                                                        
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="<?php echo base_url('admin/logout');?>" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="<?php echo base_url('assets/layouts/global/img/avatar.jpg');?>">
                            <span class="username username-hide-mobile">Admin</span>
                        </a>                                
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <li class="dropdown-extended quick-sidebar-toggler">    
                        <a href="<?php echo base_url('admin/logout');?>" style="padding: 0px; font-size: 20px; color: #8ea3b6;">                   
                            <i class="icon-logout"></i>
                        </a>
                    </li>
                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- END HEADER TOP -->
    <!-- BEGIN HEADER MENU -->
    <div class="page-header-menu">
        <div class="container">                    
            <!-- BEGIN MEGA MENU -->
            <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
            <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->            
            <div class="hor-menu">                
                <ul class="nav navbar-nav">
                    <li class="menu-dropdown classic-menu-dropdown <?php echo ($parent == 'home' ? 'active' : '');?>">
                        <a href="javascript:;"> Home
                            <span class="arrow"></span>
                        </a>
                        <ul class="dropdown-menu pull-left">
                            <li class="<?php echo ($current == 'home-title' ? 'active' : '');?>">
                                <a href="<?php echo base_url('admin/home/title');?>" class="nav-link  ">Home Title</a>
                            </li>
                            <li class="<?php echo ($current == 'who-we-serve' ? 'active' : '');?>">
                                <a href="<?php echo base_url('admin/home/who-we-serve');?>" class="nav-link  ">Who We Serve</a>
                            </li>                                    
                        </ul>
                    </li>
                    <li class="menu-dropdown classic-menu-dropdown <?php echo ($parent == 'what-we-do' ? 'active' : '');?>">
                        <a href="<?php echo base_url('admin/what-we-do');?>"> What We Do </a>                                
                    </li>
                    <li class="menu-dropdown classic-menu-dropdown <?php echo ($parent == 'about-us' ? 'active' : '');?>">
                        <a href="<?php echo base_url('admin/about-us');?>"> About Us </a>                                
                    </li>
                    <li class="menu-dropdown classic-menu-dropdown <?php echo ($parent == 'blog' ? 'active' : '');?>">
                        <a href="<?php echo base_url('admin/blog');?>"> Blog </a>                               
                    </li>
                    <li class="menu-dropdown classic-menu-dropdown <?php echo ($parent == 'join-us' ? 'active' : '');?>">
                        <a href="<?php echo base_url('admin/join-us');?>"> Join Us</a>                                
                    </li>                            
                </ul>
            </div>
            <!-- END MEGA MENU -->
        </div>
    </div>
    <!-- END HEADER MENU -->
</div>