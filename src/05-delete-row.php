<?php

namespace yosoyfunes\ElasticsearchPHP;

//Cargamos las librerias
require '01-connect.php';

//Cargamos el array con los parametros del documento a borrar
$params = [
  //Nombre del index (bd)
  'index' => 'empresa',
  //Nombre del type (tabla)
  'type' => 'empleados',
  //Nombre del id
  'id' => '5be4f4287a731'];

/*
  La funcion $client->delete es usada para eliminar documentos

*/

//Pasamos los parametros a la funcion delete de elasticseach
$response = $client->delete($params);
//Mostramos la respuesta
print_r($response);
