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
    <link href="<?=asset('site/css/animated-black.css')?>" rel="stylesheet">
    <link href="<?=asset('site/css/black-style.css')?>" rel="stylesheet">
    <link href="<?=asset('site/css/queries-black.css')?>" media="all" rel="stylesheet" type="text/css">
  </head>
  <body>
  
    <!-- preloader -->
<!--    <div class="bg-preloader"></div>
    <div class="preloader">
      <div class="mainpreloader">
        <img alt="preloaderlogo" src="img/image10.png"> <span class="logo-preloader">Carregando...</span>
      </div>
    </div>-->
    <!-- preloader end -->
    
    <!-- content wraper -->
    <div class="content-wrapper">
      <!-- nav -->
      <?php if(isset($params['header'])) include_once $params['header']; ?>
      <!-- nav end -->

        <!-- subheader -->
        <?php if(isset($params['content'])) include_once $params['content']; ?>
      <!-- section about end -->
        
        
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
                                <a href="about.html#"><i class="fa fa-facebook fa-lg"></i></a>
                                <a href="about.html#"><i class="fa fa-twitter fa-lg "></i></a>
                                <a href="about.html#"><i class="fa fa-rss fa-lg "></i></a>
                                <a href="about.html#"><i class="fa fa-skype fa-lg "></i></a>
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

    <!-- plugin JS -->
    <script src="<?=asset('site/plugin/pluginsblack.js')?>" type="text/javascript"></script> 
    <!-- black JS -->
    <script src="<?=asset('site/js/black.js')?>" type="text/javascript"></script>
    
  </body>
</html>