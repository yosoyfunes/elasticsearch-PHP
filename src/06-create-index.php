<?php

namespace yosoyfunes\ElasticsearchPHP;

//Cargamos las librerias
require '01-connect.php';

//Cargamos el array con los parametros del index (db) a crear
$params = [
    'index' => 'empresa',
    'body' => [
        'settings' => [
            'number_of_shards' => 2,
            'number_of_replicas' => 0
        ]
    ]
];

/*
  La funcion $client->indices()->create crea un indice en elasticsearch

*/

//Pasamos los parametros a la funcion indices()->create de elasticseach
$response = $client->indices()->create($params);
//Mostramos la respuesta
print_r($response);
