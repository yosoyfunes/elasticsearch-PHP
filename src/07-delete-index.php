<?php

namespace yosoyfunes\ElasticsearchPHP;

//Cargamos las librerias
require '01-connect.php';

//Cargamos el array con los parametros del index (db) a borrar
$deleteParams = [
 //Nombre del index (db)
 'index' => 'empresa'
];

/*
  La funcion $client->indices()->delete Borra el indice que le pasemos

*/

//Pasamos los parametros a la funcion indices()->delete de elasticseach
$response = $client->indices()->delete($deleteParams);
//Mostramos la respuesta
print_r($response);
