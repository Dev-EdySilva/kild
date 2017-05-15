
        <?php        
            #realiza as devidas importações
            require_once 'config/autoloader.php';
            
            # importando configurações do banco de dados
            require_once 'config/database.php';
            
            # incluir configurações de rotas
            require_once './routes.php';
            
            # incluis helpers e configurações de urls
            require_once './config/urls.php';
            
            require_once './helpers.php';
            
            use Controller\Routes\Route;
            
            $URL = URI::getUri();
            
            if($URL[0]==""){
               $url = '/';
            }else{
                $url = '/'.implode('/', $URL);
            }
            
            
            
            
            echo Route::run($url);
            
           