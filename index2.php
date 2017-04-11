<html>
    <head>
        <title>Bem vindo ao meu site</title>
    </head>
    <body>
        
        <?php
            include_once 'config/autoloader.php';
            include_once 'config/database.php';
                
                
            
            $user = new User();            
            $user->setEmail('edigleyssonsilva@gmail.com');
            $user->setPassword(sha1('123'));
            $user->setAtivo(0);
            
            if($user->save()){
                echo "ID ".$user->getId()." inserido";
            }
        ?>
        
    </body>
</html>
