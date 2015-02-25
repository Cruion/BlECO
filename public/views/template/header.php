<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DECO3801/7381 Group Blogs</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/cosmo/bootstrap.min.css">

        <link rel="stylesheet" href="/public/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- jQuery -->
        <script src="/public/js/jquery-1.11.0.min.js"></script>
        
        <!-- Lightbox -->
	<script src="/public/js/lightbox.min.js"></script>
        <link href="/public/css/lightbox.css" rel="stylesheet" />
    </head>
    <body>
        <!--=========================================================================-->
        <!-- Start Header Section                                                    -->
        <!--=========================================================================-->
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand smallCap" href="<?php echo Util::getHost(); ?>/public/">DECO3801/7381 Group Blogs</a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav smallCap">
                        <li><a href="/public/blog">Blogs</a></li>
                        <li><a href="/public/groups">Groups</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Guest <span class="caret"></span></a>
                            <ul class="dropdown-menu smallCap" role="menu">
                                <li class="disabled"><a href="#">Guest</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo Util::getHost(); ?>">Login with UQ credentials</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--=========================================================================-->
        <!-- Stop Header Section                                                     -->
        <!--=========================================================================-->