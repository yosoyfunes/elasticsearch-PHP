<?php

namespace yosoyfunes\ElasticsearchPHP;

//Cargamos las librerias
require '01-connect.php';

//Cargamos el array con los parametros de la consulta
$params = [
  //Nombre del index (bd) a llamar
  'index' => 'customer',
  //Nombre del type (tabla)
  'type' => '_doc',
  //Nombre del id del documento autogenerado
  'id' => '1'
];

/*
La funcion $client->get llamamos los datos del index (bd)
*/

//Pasamos los parametros a la funcion get de elasticseach
$response = $client->get($params);
//Mostramos la respuesta
print_r($response);
