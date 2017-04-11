 <!-- preloader -->
    <div class="bg-preloader"></div>
    <div class="preloader">
      <div class="mainpreloader">
        <img alt="preloaderlogo" src="<?=asset('site/img/logo-2d-media.png')?>"> <span class="logo-preloader">please wait</span>
      </div>
    </div>
    <!-- preloader end -->

<div class="navbar navbar-default navbar-fixed-top onStep" data-animation="fadeInDown" data-time="0">
        <div class="container">
        
          <!-- menu mobile display -->
           <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse">
           <span class="icon icon-bar"></span> 
           <span class="icon icon-bar"></span> 
           <span class="icon icon-bar"></span></button> 
          
          <!-- logo --> 
          <a class="navbar-brand" href="<?=url()?>"><img alt="" src="<?=asset('site/img/logo-2d-media.png')?>"></a> 
          
          <!-- mainmenu start -->
          <div class="menu-init" id="main-menu">
            <nav>
              <ul>
                <li><a href="<?=url()?>">início</a></li>
                <li><a href="<?=url('servicos')?>">serviços</a></li>
                    <li><a href="<?=url('orcamento')?>">orçamento</a></li>
                <li><a href="<?=url('institucional')?>">institucional</a></li>
                <li><a href="<?=url('fale-conosco')?>">fale conosco</a></li>
              </ul>
            </nav>
          </div>
          <!-- mainmenu end -->
          
        </div>
        <!-- .container -->
      </div>