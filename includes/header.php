<?php include 'config/config.php'; ?>
<?php include 'libraries/Database.php'; ?>
<?php include 'helpers/format_helper.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Dojo Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item" href="index.php">Home</a>
          <a class="blog-nav-item" href="posts.php">All Posts</a>
          <a class="blog-nav-item pull-right" href="admin/index.php">Admin Area</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
      	<div class="logo"><img class="logoimg" src="images/PHP_Logo.png" /></div>
        <h1 class="blog-title">Dojo PHP Blog</h1>
        <p class="lead blog-description">News, tutorials, videos & more</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">