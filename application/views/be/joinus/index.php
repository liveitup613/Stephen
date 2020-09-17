<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->    
    <head>
        <meta charset="utf-8" />
        <title>Syston Iterations | Home Title</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <!-- BEGIN GLOBAL STYLES -->
        <?php $this->load->view('be/layout/styles'); ?>
        <!-- END GLOBAL STYLES -->

        <link href="<?php echo base_url('assets/css/pages/be/blog.css');?>" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="<?php echo base_url('favicon.png');?>" />
     </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-boxed">     
        <!-- BEGIN HEADER -->           
        <?php 
            $menu['parent'] = 'join-us';
            $menu['current'] = 'join-us';
            $this->load->view('be/layout/header', $menu);
            ?>
        <!-- END HEADER -->

        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Join Us
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->                       
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container">
                        <!-- BEGIN PAGE BREADCRUMBS -->
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="index.html">Main</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span href="#">Join Us</span>  
                            </li>                            
                        </ul>
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN PORTLET-->
                                    <div class="portlet light form-fit ">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="icon-social-dribbble font-green"></i>
                                                <span class="caption-subject font-green bold uppercase">Join Us Content</span>
                                            </div>                                         
                                        </div>
                                        <div class="portlet-body">
                                            <div class='blog-new'>
                                                <a type='button' class='btn green' href="<?php echo base_url('admin/join-us/edit/0');?>"><i class='icon-plus'></i>&nbsp;&nbsp;Add New</a>
                                            </div>
                                            <div class="table-scrollable">
                                                <table class="table table-striped table-bordered table-advance table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class='blog-title'>
                                                                <i class="fa fa-quote-right"></i> Title </th>                                                            
                                                            <th class='blog-date'>
                                                                <i class="fa fa-calendar-check-o"></i> Created Date </th>
                                                            <th> </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            foreach ($jobs as $job) {
                                                                ?>
                                                                <tr>
                                                                    <td class="highlight">
                                                                        <div class="success">
                                                                            <span class='blog-title'><?php echo $job['Title'];?></span>
                                                                        </div>                                                                
                                                                    </td>
                                                                    <td class='blog-date'> <?php echo $job['CreatedDate'];?> </td>
                                                                    <td>
                                                                        <a href="<?php echo base_url('admin/join-us/edit/'.$job['ID']);?>" class="btn btn-outline btn-circle btn-sm purple">
                                                                            <i class="fa fa-edit"></i> Edit </a>
                                                                        <a href="javascript:deleteJob(<?php echo $job['ID'];?>);" class="btn btn-outline btn-circle dark btn-sm black">
                                                                            <i class="fa fa-trash-o"></i> Delete </a>
                                                                    </td>
                                                                </tr> 
                                                                <?php
                                                            }
                                                        ?>                                                                                                                 
                                                    </tbody>
                                                </table>
                                            </div>                                            
                                        </div>
                                    </div>
                                    <!-- END PORTLET-->
                                </div>
                            </div>
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php $this->load->view('be/layout/footer'); ?>
        <!-- END FOOTER -->
        <!-- BEGIN GLOBAL SCRIPTS -->
        <?php $this->load->view('be/layout/scripts'); ?>
        <!-- END GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <!-- END PAGE LEVEL PLUGINS -->
    </body>

</html>