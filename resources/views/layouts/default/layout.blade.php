<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
    <!-- BEGIN HEAD -->
     <head>
        <meta charset="utf-8" />
        <title>Resturant Forecasting Tool</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #2 for blank page layout" name="description" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN UPLOADFORM PLUGINS -->
        <link href="/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css" />
        <link href="/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet" type="text/css" />
        <link href="/global/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css" />
        <link href="/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css" />
        <!-- END UPLOAD PLUGINS -->
        <!-- BEGIN MULTI SELECT PLUGINS -->
        <link href="/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <link href="/global/plugins/jquery-multi-select/css/multi-select.css" rel="stylesheet" type="text/css" />
        <link href="/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END MULTI SELECT PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="/layouts/admin2/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="/layouts/admin2/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="/layouts/admin2/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link href="/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <link href="/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->
    <style type="text/css">
        thead{
            background-color: #E1E5EC;
        }
    </style>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
    	@include('headers.default.header')
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
        @include('sidebars.default.sidebar')
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content bg-white">
                    <!-- BEGIN PAGE HEADER-->
                    @yield('content')
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2016 &copy; Metronic Theme By
                <a target="_blank" href="http://keenthemes.com">Keenthemes</a> &nbsp;|&nbsp;
                <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <!-- END FOOTER -->

                       <!--[if lt IE 9]>
<script src="/global/plugins/respond.min.js"></script>
<script src="/global/plugins/excanvas.min.js"></script> 
<script src="/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
            <!-- BEGIN CORE PLUGINS -->
            <script src="/global/plugins/jquery.min.js" type="text/javascript"></script>
            <script src="/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="/global/plugins/js.cookie.min.js" type="text/javascript"></script>
            <script src="/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
            <script src="/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
            <script src="/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
            <!-- BEGIN UPLOADFORM PLUGINS -->
            <script src="/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
            <script src="/global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
            <script src="/global/plugins/jquery-file-upload/js/vendor/tmpl.min.js" type="text/javascript"></script>
            <script src="/global/plugins/jquery-file-upload/js/vendor/load-image.min.js" type="text/javascript"></script>
            <script src="/global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js" type="text/javascript"></script>
            <script src="/global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js" type="text/javascript"></script>
            <script src="/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js" type="text/javascript"></script>
            <script src="/global/plugins/jquery-file-upload/js/jquery.fileupload.js" type="text/javascript"></script>
            <script src="/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js" type="text/javascript"></script>
            <script src="/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js" type="text/javascript"></script>
            <script src="/global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js" type="text/javascript"></script>
            <script src="/global/plugins/jquery-file-upload/js/jquery.fileupload-video.js" type="text/javascript"></script>
            <script src="/global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js" type="text/javascript"></script>
            <script src="/global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js" type="text/javascript"></script>
            <script src="/pages/scripts/form-fileupload.min.js" type="text/javascript"></script>
            <!-- END UPLOADFORM PLUGINS -->
            <!-- BEGIN MULTI SELECT PLUGINS -->
            <script src="/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
            <script src="/global/plugins/jquery-multi-select/js/jquery.multi-select.js" type="text/javascript"></script>
            <script src="/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
            <!-- END MULTI SELECT PLUGINS -->
            <!-- BEGIN MULTI SELECT SCRIPTS -->
            <script src="/js/supplier_items_multi_select.js" type="text/javascript"></script>
            <!-- END MULTI SELECT SCRIPTS -->
            <!-- END CORE PLUGINS -->
            <!-- BEGIN THEME GLOBAL SCRIPTS -->
            <script src="/global/scripts/app.min.js" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->
            </script>
            <script src="/pages/scripts/components-bootstrap-select.min.js" type="text/javascript"></script>
            <script src="/global/scripts/datatable.js" type="text/javascript"></script>
            <script src="/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
            <script src="/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
             <!-- BEGIN FORM REPEATER PLUGINS -->
            <script src="/global/plugins/jquery-repeater/jquery.repeater.js" type="text/javascript"></script>
            <script src="/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
            <!-- END FORM REAPETER PLUGINS -->
            <!-- BEGIN FORM REAPETER SCRIPTS -->
            <script src="/pages/scripts/form-repeater.min.js" type="text/javascript"></script>
            <script src="/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
            <!-- END FORM REPEATER SCRIPTS -->
            <!-- BEGIN THEME LAYOUT SCRIPTS -->
            <script src="/layouts/admin2/scripts/layout.min.js" type="text/javascript"></script>
            <script src="/layouts/admin2/scripts/demo.min.js" type="text/javascript"></script>
            <script src="/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
            <script src="/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
            <!-- END THEME LAYOUT SCRIPTS -->
            <!-- BEGIN AUTHER SCRIPTS -->
            <script src="/js/branches-datatable.js" type="text/javascript"></script>
            <script src="/js/users-datatable.js" type="text/javascript"></script>
            <script src="/js/menu_items.js" type="text/javascript"></script>
            <script src="/js/inventory_items.js" type="text/javascript"></script>
            <script src="/js/suppliers.js" type="text/javascript"></script>
            <script src="/js/ingredients.js" type="text/javascript"></script>
            <script src="/js/purchase_restrictions.js" type="text/javascript"></script>
            <script src="/js/storages.js" type="text/javascript"></script>
            <!-- END AUTHER SCRIPTS -->

    </body>

</html>