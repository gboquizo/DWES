<?php
/**
 * @author Rafael Carmona Arrabal
 * @version  [Maquetación de una página módular.]
 * Date 07/12/2017
 */
?>
<!DOCTYPE html>
<!--
Template Name: Nonuxor
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>Maquetación básica.</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/><link rel="shortcut icon" href="/~qbsagu/favicon.ico" type="image/png"/>
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('images/demo/backgrounds/01.png');">
<div>
<!-- header -->
<?php include ("includes/header.php");?>
</div>
<!--main -->
<div>
<?php include ("includes/pages.php");?>
<br style="clear:both;" />
</div>

<div>
<!-- footer-->
<?php include ("includes/footer.php");?>
</div>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>