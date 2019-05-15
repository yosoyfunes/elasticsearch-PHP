<?php

namespace yosoyfunes\ElasticsearchPHP;

//Cargamos las librerias
require '01-connect.php';

//Cargamos el array con los parametros de la busquda
$params = [
  //Nombre del index (bd)
  'index' => 'empresa',
  //Nombre del type (tabla)
  'type' => 'empleados',
  //Le decimos que vamos a buscar dentro del cuerpo del documetno
  'body' => [
    'query' => [
      //Donde debe coincidir el campo
      'match' => [
        'name' => 'Matias'
      ]
    ]
  ]
];

/*
  La funcion $client->search podemos hacer un consulta con DSL (Domain Specific Language)
  más info en este link: https://www.elastic.co/guide/en/elasticsearch/reference/current/query-dsl.html

*/

//Pasamos los parametros a la funcion search de elasticseach
$response = $client->search($params);
//Mostramos la respuesta
print_r($response);
