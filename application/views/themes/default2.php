<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
        <meta name="description" content="TODO List - sample application for NetBeans IDE" />
        <meta name="keywords" content="NetBeans, PHP" />
        <meta name="author" content="NetBeans PHP team" />

        <?php require 'application/views/head.php'; ?>

        <link type="text/css" href="<?php echo base_url(); ?>assets/themes/default/css/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/themes/default/css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/themes/default/css/layout.css" rel="stylesheet" type="text/css" />

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url(); ?>assets/themes/default/css/bootstrap-responsive.css" rel="stylesheet">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    </head>
    <body id="page">
        <div class="container">
            <div class="tail-top-right"></div>
            <div id="main">
                <!-- header -->
                <div id="header"></div>
                <!-- content -->
                <div id="content">
                    <div class="wrapper">
                        <div class="col-1">
                            <div class="box">
                                <div class="inner">
                                    <div class="title"><a href="http://netbeans.org/features/php/">NetBeans IDE PHP</a></div>
                                    <ul class="list">
                                        <li><span><a href="<?php echo site_url('auth'); ?>">Home</a></span></li>
                                        <li><span><a href=""
                                                     ><img src="<?php echo base_url(); ?>assets/themes/default/images/status/PENDING.png" alt="" title="Pending TODOs" class="icon" />Pending TODOs</a></span></li>
                                        <li><span><a href=""
                                                     ><img src="<?php echo base_url(); ?>assets/themes/default/images/status/DONE.png" alt="" title="Done TODOs" class="icon" />Done TODOs</a></span></li>
                                        <li><span><a href=""
                                                     ><img src="<?php echo base_url(); ?>assets/themes/default/images/status/VOIDED.png" alt="" title="Voided TODOs" class="icon" />Voided TODOs</a></span></li>
                                        <li class="last"><span><a href=""
                                                                  ><img src="<?php echo base_url(); ?>assets/themes/default/images/action/add.png" alt="" title="Add TODO" class="icon" />Add TODO</a></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="indent">
                                <div style="text-align: right;">
                                    <?php if ($this->session->userdata('is_logged_in')): ?>


                                        <a href="<?php echo site_url('auth/logout'); ?>">Sign out</a>
                                    <?php else: ?>
                                        <!--                                ajax login modal dialog-->
                                        <a href="#" class="btn btn-lg btn-success"
                                           data-toggle="modal"
                                           data-target="#basicModal">Sign in</a>


                                    <?php endif; ?>
                                </div>
                                <?php echo $output; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer -->
                <div id="footer">
                    <div class="indent">
                        <div class="fleft"><a href="https://blogs.oracle.com/netbeansphp/">NetBeans PHP team</a>, 2011 &copy; Copyright Oracle corp., All rights reserved</div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Sign In</h4>
                        </div>
                        <form <form onsubmit="login()">
                        <div class="modal-body">
                            

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input class="form-control" name="username"/>    
                                </div>
                                <div class="form-group">
                                    <label for="password">Username</label>
                                    <input class="form-control" name="password" type="password"/>
                                </div>
                                	


                                <?php echo "Don't have an account? " . anchor('auth/signup', "Create an account."); ?>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit"  class="btn btn-primary">Sign In</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">

            function login() {
                alert("hello");
            }

        </script>
    </body>
</html>
