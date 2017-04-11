<html>
    <head>
        <title>Testando rotas</title>
    </head>
    <body>
        
        <?php
            include_once 'config/autoloader.php';
            include_once 'config/database.php';
            include_once './routes.php';
            
            use Controller\Routes\Route;
            
             $url = "/";
            
             echo Route::run($url);
                
                
          
            
          
        ?>
        
    </body>
</html>
