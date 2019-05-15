<?php

namespace yosoyfunes\ElasticsearchPHP;

//Cargamos las librerias
require 'vendor/autoload.php';

//Llamamos las librerias de  elasticsearch
use Elasticsearch\ClientBuilder;

//Inicializamos el cliente de elasticsearch
$client = ClientBuilder::create()->build();

//Si la conexion fue exitosa mostramos este mensaje
if ($client) {
  echo 'Conexion exitosa' . PHP_EOL;
}

//Si no se pudo realizar la conexion mostramos este otro mensaje y nos salimos
else{
  echo 'Conexion fallida';
  exit;
}


// https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/index.html
