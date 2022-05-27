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
    case '404':
      require 'pages/404.php';
      break;
    default:
      echo "404.";
      // required '404.php';
  }
}

?>