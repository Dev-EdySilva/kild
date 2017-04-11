<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="utf-8">
    <title>
        <?php if(isset($params['title'])) echo $params['title'] ?>
    </title>
    <meta content="" name="description">
    <meta content="" name="author">
    <meta content="" name="keywords">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <!-- favicon -->
    <link href="<?=asset('site/img/favicon.png')?>" rel="icon" sizes="32x32" type="image/png">
    <!-- Bootstrap CSS -->
    <link href="<?=asset('site/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- font awesome CSS -->
    <link href="<?=asset('site/font-awesome/css/font-awesome.css')?>" rel="stylesheet">
    <!-- black CSS -->
    <link href="<?=asset('site/css/owl.transitions.css') ?>" rel="stylesheet">
    <link href="<?=asset('site/css/animated-black.css')?>" rel="stylesheet">
    <link href="<?=asset('site/css/black-style.css')?>" rel="stylesheet">
    <link href="<?=asset('site/css/queries-black.css')?>" media="all" rel="stylesheet" type="text/css">
  </head>
  <body>
  
   
    
    <!-- content wraper -->
    <div class="content-wrapper">

      <!-- nav -->
      <?php
      if(isset($params['header'])) include_once $params['header'];
      ?>
      <!-- nav end -->
      
      <!-- home -->
	  <!-- background slider -->
          <?php if(isset($params['slider'])) include_once $params['slider']; ?>
      <!-- background slider end -->
      <!-- home end -->
      
      <!-- section about -->
        <?php if(isset($params['content'])) include_once $params['content']; ?>
      <!-- section contact end -->
      
      <!-- footer -->
      <section class="footer" aria-label="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                        <div class="onStep" data-animation="fadeInRight" data-time="0">
                            2DMedia &copy; Copyright 2017 desenvolvido por Edigleysson Silva
                        </div>                 
                        </div>
                        <div class="col-md-6">
                        <div class="right">
                            <div class="social-icons  onStep" data-animation="fadeInLeft" data-time="600">
                                <a href="index-multi.html#"><i class="fa fa-facebook fa-lg"></i></a>
                                <a href="index-multi.html#"><i class="fa fa-twitter fa-lg "></i></a>
                                <a href="index-multi.html#"><i class="fa fa-rss fa-lg "></i></a>
                                <a href="index-multi.html#"><i class="fa fa-skype fa-lg "></i></a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
      </section>
      <!-- footer end -->
      
      <!-- ScrolltoTop -->
      <div id="totop">
        <i class="fa fa-angle-up"></i>
      </div>
      
    </div>
    <!-- content wraper end -->
    
    <!-- Subscribe start -->
    <div class="white-popup-block mfp-hide animbouncefall" data-time="0" id="subwrap">
      <h5>PLEASE FILL <span class="color">YOUR EMAIL</span> BELOW</h5>
      <div class="space-half"></div>
      <form action="http://on3-step.com/demolink/tf/bl4ck/black/subscribe.php" id="subscribe" method="post" name="subscribe">
        <input class="subscribfield subscribeemail" id="subscribeemail" name="subscribeemail" type="text"> 
        <button class="btn-form" id="submit-2" type="submit">Subscribe</button>
      </form>
      <div class="subscribesuccess">Thank you for fill your email</div>
    </div>
    <!-- Subscribe end -->
    
    <!-- plugin JS -->
    <script src="<?=asset('site/plugin/pluginsblack.js')?>" type="text/javascript"></script> 
    <!--  map google -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyCQ5KODzqooIP496GPLRaMAsZ4eN8Vro_U"></script> 
    <script src="<?=asset('site/js/map.js')?>" type="text/javascript"></script> 
    <!-- black JS -->
    <script src="<?=asset('site/js/black.js')?>" type="text/javascript"></script>
    
  </body>
</html>