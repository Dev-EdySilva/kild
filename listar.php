<html>
    <head>
        <title>Bem vindo</title>
    </head>
    <body>
        
        <?php
            include_once 'config/autoloader.php';
            include_once 'config/database.php';
                
                
            echo "<pre>";
            $user = new User();
            var_dump($users=$user->all());
            echo "</pre>";
            
            
            $user = new User();
            $user->setEmail('edigleyssonsilva@outlook.com');
            $user->setId($users[0]->user_id);
            echo $user->update('user_id');
            
          
        ?>
        
    </body>
</html>
