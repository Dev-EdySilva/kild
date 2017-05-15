<?php

define('BASE_URL', 'http://localhost/Projetos/2dmedia');
//define('BASE_URL', 'http://codesilva.esy.es/2dmedia');

// split URL
$uri = (isset($_GET['url'])) ? $_GET['url'] : '';
$uri = explode('/', $uri);

URI::setUri($uri);
