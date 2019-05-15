<?php

namespace yosoyfunes\ElasticsearchPHP;

//Cargamos las librerias
require '01-connect.php';

//Generamos un id unico para colocarlo como id de este documento
$idDocumento=uniqid();
//Cargamos el array con los parametros a insertar
$params = [
 //Nombre del index (bd) donde sea va a crear el documento
  'index' => 'empresa',
 //Nombre del type (tabla) donde sea va a crear el documento
 'type' => 'empleados',
 //Generamos un id unico con php con el que se identificara este documento
  'id' => $idDocumento,
 //Creamos el cuerpo del documento con los campos y valores correspondientes
 'body' => ['name' => 'Matias','age' => 30]
];
//Pasamos los parametros a la funcion index de elasticseach para crear el docuemnto
$response = $client->index($params);
//Mostramos la respuesta

print_r($response);
