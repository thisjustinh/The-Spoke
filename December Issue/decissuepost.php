<?php
/*
 * Template Name: DecIssuePost
 * Template Post Type: post, page, product
 */
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- PAGE settings -->
  <link rel="icon" href="https://spoke.news/wp-content/themes/newsfront/spoke.ico">
  <title>
    <?php 
      while ( have_posts() ) : the_post();
        the_title();
      endwhile;
    ?>
  </title>
  <!-- TODO: Update article meta -->
  <!-- CSS dependencies -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://spoke.news/wp-content/themes/newsfront/dec_issue/css/wireframe.css">
  <link rel="stylesheet" href="https://spoke.news/wp-content/themes/newsfront/dec_issue/css/bootstrap.css">

  <style>
    @import url('https://fonts.googleapis.com/css?family=Raleway:700|Raleway:500|Libre+Franklin');
    
    .bg-dark {
      background-color: #333333 !important;
    }
    
    .navbar-nav a,
    .nav a,
    .social-media a{
      color: white;
      text-decoration: none;
    }
    
    /* Fonts */

    @media (min-width: 768px) {
      .py-5.text-right {
        height: 100%;
      }
    }
    
    .headline {
      font-family: "Raleway", sans-serif;
      font-weight: 700;
      font-size: 40px;
    }

    .byline {
      font-family: "Raleway", sans-serif;
      font-weight: 500;
      font-size: 20px;
    }

    .lead {
      font-size: 20px;
    }

    .copy {
      font-family: "Libre Franklin", sans-serif;
      font-size: 15px;
    }

    figcaption {
      padding-bottom: 0.5em;
      padding-top: 0.5em;
      border-bottom: thick solid #333333;
    }

  </style>

</head>

<body class="">
  <!-- Global Site Tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-66878525-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-66878525-1');
  </script>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
    <div class="container"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar13">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar13"> <a class="navbar-brand d-none d-md-block" href="https://spoke.news/">
          <img src="http://spoke.news/wp-content/themes/newsfront/candidates/spokelogo2.png" width="180" height="32">
        </a>
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"> <a class="nav-link" href="https://spoke.news/december-issue" style="color: white;">Home</a> </li>
          <li class="nav-item"> <a class="nav-link" href="https://spoke.news/december-news" style="color: white;">News</a> </li>
          <li class="nav-item"> <a class="nav-link" href="https://spoke.news/december-life" style="color: white;">T/E Life</a> </li>
          <li class="nav-item"> <a class="nav-link" href="https://spoke.news/december-opinion" style="color: white;">Opinion</a> </li>
          <li class="nav-item"> <a class="nav-link" href="https://spoke.news/december-sports" style="color: white;">Sports</a> </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item"> <a class="nav-link" href="https://twitter.com/thespoke">
              <i class="fa fa-twitter fa-fw" style="color: white;"></i>
            </a> </li>
          <li class="nav-item"> <a class="nav-link" href="https://facebook.com/thespoke">
              <i class="fa fa-facebook fa-fw" style="color: white;"></i>
            </a> </li>
          <li class="nav-item"> <a class="nav-link" href="https://instagram.com/thespoke">
              <i class="fa fa-instagram fa-fw" style="color: white;"></i>
            </a> </li>
          <li class="nav-item"> <a class="nav-link" href="https://soundcloud.com/the_spoke">
              <i class="fa fa-soundcloud fa-fw" style="color: white;"></i>
            </a> </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' ); ?>
  <div class="py-5 text-right" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(<?php echo $url ?>); background-position: top; background-size: cover; background-repeat: repeat; background-attachment: fixed;">
    <div class="container d-inline-flex">
      <div class="row">
        <div class="mx-auto mx-md-0 ml-md-auto col-10 col-md-9 p-5" style="">
          <h3 class="display-1 text-light headline">
            <?php 
            while ( have_posts() ) : the_post();
                the_title();
            endwhile;
            ?><br></h3>
          <h4 class="text-white" style=""><b><u>___________________</u></b></h4>
          <?php $excerpt = get_the_excerpt($post->ID); ?>
          <p class="mb-3 lead text-light" style="">
            <?php echo $excerpt ?>
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="pt-2 pb-5" style="">
    <div class="container">
      <div class="row">
        <div class="col-md-12 copy">
          <?php
            while ( have_posts() ) : the_post();
                the_content(); 
            endwhile;
              ?>
        </div>
      </div>
    </div>
  </div>
  <div class="py-3 bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center d-md-flex align-items-center"> <img src="http://spoke.news/wp-content/themes/newsfront/candidates/spokelogo2.png" width="120">
          <ul class="nav mx-md-auto d-flex justify-content-center">
            <li class="nav-item"> <a class="nav-link" href="https://spoke.news/december-issue">Home</a> </li>
            <li class="nav-item"> <a class="nav-link" href="https://spoke.news/december-news">News</a> </li>
            <li class="nav-item"> <a class="nav-link" href="https://spoke.news/december-life">T/E Life</a> </li>
            <li class="nav-item"> <a class="nav-link" href="https://spoke.news/december-opinion">Opinion</a> </li>
            <li class="nav-item"> <a class="nav-link" href="https://spoke.news/december-sports">Sports</a> </li>
          </ul>
          <div class="row social-media">
            <div class="col-md-12 d-flex align-items-center justify-content-md-between justify-content-center my-2"> <a href="https://facebook.com/thespoke">
                <i class="d-block fa fa-facebook-official fa-lg mx-2"></i>
              </a> <a href="https://instagram.com/thespoke">
                <i class="d-block fa fa-instagram fa-lg mx-2"></i>
              </a> <a href="https://twitter.com/thespoke">
                <i class="d-block fa fa-twitter fa-lg ml-2"></i>
              </a> 
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <p class="mt-2 mb-0 text-white">© 2018 Spoke.News. All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>