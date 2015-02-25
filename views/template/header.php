<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $_SESSION['courseProfile']['coursecode'];?> Course Blogs</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/cosmo/bootstrap.min.css">

        <link rel="stylesheet" href="/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- jQuery -->
        <script src="/js/jquery-1.11.0.min.js"></script>

        <!-- Lightbox -->
	<script src="/js/lightbox.min.js"></script>
        <link href="/css/lightbox.css" rel="stylesheet" />
    </head>
    <body>
        <!--=========================================================================-->
        <!-- Start Header Section                                                    -->
        <!--=========================================================================-->
        <nav class="navbar navbar-default navbar-fixed-top navbar-white" id="topNavBar" role="navigation">
  <div class="container">
    <div class="navbar-header">
        <h1><?php echo $_SESSION['courseProfile']['coursecode'];?> Course Blogs</h1>
    </div>
    </div>
  </div><!-- /.container-fluid -->
</nav>
<nav class="navbar navbar-default navbar-lower" id="bottomNavBar" role="navigation">
  <div class="container">
    <div class="collapse navbar-collapse collapse-buttons">
      <ul class="nav navbar-nav smallCap">
                        <li><a href="/">Home</a></li>
                        <li class="divider"><a href="#">&bull;</a></li>
                        <li><a href="/assignments">Assignments</a></li>
                        <li><a href="/inspiration">Inspiration</a></li>
                        <li><a href="/resources">Resources</a></li>
                        <!-- <li class="divider"><a href="#">&bull;</a></li> -->
                        <li><a href="/blog">Blogs</a></li>

                        <!-- <li><a href="/images">Files</a></li> -->
                        <li class="divider"><a href="#">&bull;</a></li>
                        <li><a href="//google.com" target="_blank">Google</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php if ($_SESSION['guest'] == "Guest") {echo "Guest";} else {echo $userDetails["givenName"] . " " . $userDetails["familyName"];}?> <span class="caret"></span></a>
                            <ul class="dropdown-menu smallCap" role="menu">
                                <li class="disabled"><a href="#"><?php echo $_SESSION['userName'] . " - " . $userDetails["name"];?></a></li>
                                <li class="divider"></li>
                                <?php if ($_SESSION['isStaff']) {?>
                            <li><a href="/students">Students</a></li>
                            <li><a href="/groups">Groups</a></li>
                            <li class="divider"></li>
                        <?php }?>

                                <li><a href="http://api.uqcloud.net/logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
    </div>
  </div>
</nav>

        <!--=========================================================================-->
        <!-- Stop Header Section                                                     -->
        <!--=========================================================================-->