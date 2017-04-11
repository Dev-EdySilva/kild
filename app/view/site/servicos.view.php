<style>
    
    .list-services li a{
        display: block;
        padding: 5px;
    }
    
    .title-services{
        text-align: center;
        padding-bottom: 30px;
    }
    
    .images-services div{
        margin-top: 20px;
    }
    
    .images-services div img{
        box-shadow: 1px 1px 3px #333;
    }
    
    .text-service p{
        font-size: 14px;
    }
    
    .text-service p strong{
        font-weight: bolder;
    }
</style>


<section id="subheader">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>NOSSOS SERVIÇOS</h1>
                        <ul class="subdetail">
                            <li><a href="<?=url()?>">INÍCIO</a></li>
                            <li class="sep">/</li>
                            <li>SERVIÇOS</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- subheader end -->

      <!-- section about -->
      <section class="whitepage" id="about" style="padding-top: 40px;">
        
        <!-- text -->
<!--        <div class="container" style="display:none;">
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <h2 class="text-center onStep" data-animation="fadeInUp" data-time="0">
                Quem somos <span class="devider-black"></span>
              </h2>

              <div class="space-single">
              </div>
            </div>

            <div class="col-md-12">
              <div class="text-center onStep" data-animation="fadeInUp" data-time="300">
                <p>
                   Empresa online de comunicação visual. Original de Maranguape, região
                    metropolitana de Fortaleza. Fundada em 2015, a 2D Media vem destacando-se na cidade de Maranguape e demais regiões pelo seu rápido e eficiente atendimento. Material de qualidade também é um dos principais pontos. A empresa atualmente conta com estudantes de publicidade e propaganda. Temos como público alvo as pequenas e novas empresas do mercado, buscando crescer juntamente com cada uma.
                </p>
              </div>

              <div class="space-double">
              </div>
            </div>
          </div>
        </div>-->
        <!-- text end -->
        
        <!-- service-about -->
        <div class="container-fluid">

        
        <br>

          <div class="row">
              
              <div class="col-md-4">
                   
                  
                  <ul class="list-group list-services">
                        <li class="list-group-item">
                            <a href="#">Desenvolvimento/remaker de logotipo</a>
                        </li>
                        
                        <li class="list-group-item">
                            <a href="">Banner/lona</a>
                        </li>
                        
                        <li class="list-group-item">
                            <a href="">Cartões de visita</a>
                        </li>
                        
                        <li class="list-group-item">
                            <a href="">Arte de convite/casamento</a>
                        </li>
                        
                        <li class="list-group-item">
                            <a href="">Arte de camisa</a>
                        </li>
                        
                        <li class="list-group-item">
                            <a href="">Placa em PVC</a>
                        </li>
                        
                        <li class="list-group-item">
                            <a href="">Panfletos</a>
                        </li>  
                        
                        <li class="list-group-item">
                            <a href="">Marcador de páginas</a>
                        </li>
                        
                        <li class="list-group-item">
                            <a href="">Porta-copos</a>
                        </li>
                        
                        <li class="list-group-item">
                            <a href="">Cardápios</a>
                        </li>
                        
                        <li class="list-group-item">
                            <a href="">Blocos</a>
                        </li>
                        
                        <li class="list-group-item">
                            <a href="">Folhas timbradas</a>
                        </li>
                        
                        <li class="list-group-item">
                            <a href="">Receituários</a>
                        </li>
                        
                        <li class="list-group-item">
                            <a href="">Crachás</a>
                        </li>
                        
                        <li class="list-group-item">
                            <a href="">TAG</a>
                        </li>
                        
                        <li class="list-group-item">
                            <a href="">Capa de celular</a>
                        </li>
                        
                        <li class="list-group-item">
                            <a href="">Criação para web/eventos</a>
                        </li>
                        
                        <li class="list-group-item">
                            <a href="">Adesivos</a>
                        </li>   
                  
                  </ul>                  
                  
              </div>
            
            <div class="col-md-8 images-services">
                
                <h4 class="title-services">Desenvolvimento/remaker de logotipo</h4>
                
                <?php for($i=0; $i<6; $i++): ?>
                
                <div class="col-md-4">
                    <img src="<?=asset('site/img/projects/img5.jpg')?>" class="img-responsive" />
                    
                    <div class="text-service">
                        <p>
                            <strong>Tam. arte:</strong> 55mm
                        </p>

                        <p>
                            <strong>Impressão:</strong> OFFSET
                        </p>

                        <p>
                            <strong>Tempo de prod.:</strong> 1 dia útil
                        </p>
                    </div>
                   
                </div>
                
                <?php endfor; ?>
                
                 
                
                
<!--                <div id="service-about">



                  <div class="projects visit-cars crachas">
                    <div class="hovereffect big-img">
                      <a href="<?=asset('site/img/projects/big/img5.jpg')?>"><img alt="imageportofolio" class="img-responsive" src="<?=asset('site/img/projects/img5.jpg')?>">
                      <div class="overlay">
                        <h3>more detail</h3>
                      </div></a>
                    </div>
                  </div>


                </div>-->
            </div>
          </div>


          <hr>
        </div>
        <!-- service-about end -->
        
      </section>
      
      
      <script src="<?=asset('js/jquery-3.2.0.js')?>"></script>
      <script src="<?=asset('js/bootstrap.min.js')?>"></script>
      