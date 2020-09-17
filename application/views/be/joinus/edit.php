<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->    
    <head>
        <meta charset="utf-8" />
        <title>Syston Iterations | Join Us</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <!-- BEGIN GLOBAL STYLES -->
        <?php $this->load->view('be/layout/styles'); ?>
        <!-- END GLOBAL STYLES -->

        <link href="<?php echo base_url('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/global/plugins/bootstrap-summernote/summernote.css');?>" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url('assets/css/pages/be/blog-edit.css');?>?<?php echo time(); ?>" rel="stylesheet" type="text/css" />
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
                            <h1><?php echo ($ID == 0 ? "New Job" : "Job Edit");?>
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
                                                <span class="caption-subject font-green bold uppercase">Job Content</span>
                                            </div>                                         
                                        </div>
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <form action="#" class="form-horizontal form-bordered " id='jobForm'>
                                                <input type='hidden' name='ID' id='ID' value='<?php echo $ID;?>'>
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Title</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class='form-control' id='Title' name='Title' value='<?php echo $Title;?>' required>
                                                        </div>
                                                    </div>                                                        
                                                    <div class='form-group'>
                                                        <label class='control-label col-md-2'>Enable</label>
                                                        <div class='col-md-10'>
                                                            <select class='form-control' name='Enable' id='Enable'>
                                                                <option value='YES' <?php echo $Enable == 'YES' ? 'selected' : '';?>>YES</option>
                                                                <option value='NO' <?php echo $Enable == 'NO' ? 'selected' : '';?>>NO</option>
                                                            </select>
                                                        </div>
                                                        
                                                    </div>
                                                        
                                                    <div class="form-group last">
                                                        <label class="control-label col-md-2">Content</label>
                                                        <div class="col-md-10">
                                                            <div id="sumnoteContent"><?php echo $Content;?></div>
                                                            <input type='hidden' id='inputContent' name='Content'>
                                                        </div>
                                                    </div>             
                                                    
                                                </div>
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-2 col-md-10">
                                                            <button type="button" class="btn green" id='btnUpdate'>
                                                                <i class="fa fa-check"></i> <?php echo ($ID == 0 ? "Save" : "Update");?>
                                                            </button>
                                                            <a type='button' class='btn default' href='<?php echo base_url('admin/join-us');?>'><i class='fa fa-mail-reply-all'></i> Cancel</a>
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- END FORM-->                                       
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
        <!-- BEGIN PAGE LEVEL SCRIPTS -->      
        <script src="<?php echo base_url('assets/layouts/layout3/scripts/pages/join-us/edit.js');?>" type="text/javascript"></script>  
        <!-- END PAGE LEVEL SCRIPTS -->
    </body>

</html>