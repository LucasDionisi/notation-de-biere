<?php

$url = '';
if (isset($_GET['url'])) {
  $url = explode('/', $_GET['url']);
}

if ($url == '') {
  require 'pages/home.php';
} else {
  switch ($url[0]) {
    case 'biere':
      $beerName = $url[1];
      require 'pages/beer.php';
      break;
    case 'rediger':
      $beerName = $url[1];
      require 'pages/write.php';
      break;
    case 'ajouter':
      require 'pages/add.php';
      break;
    case 'connexion':
      require 'pages/connection.php';
      break;
    case 'inscription':
      require 'pages/register.php';
      break;
    case 'validation':
      $validationToken = $url[1];
      require 'pages/validation.php';
      break;
    case '404':
      require 'pages/404.php';
      break;
    default:
    require 'pages/404.php';
  }
}

?>