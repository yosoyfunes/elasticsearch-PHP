#   Elasticsearch por bash.

|   MySQL         |  elasticsearch   |
|   -----------   |  -------------   |
|   database      |  _index          |
|   table         |  _type           |
|   Row           |  _source         |

> Vamos a utilizar **curl** para hacer consultas, y vamos a obtener un resultado en formato JSON de esta manera:

```
    {
      "_index" : "customer",
      "_type" : "_doc",
      "_id" : "1",
      "_version" : 3,
      "found" : true,
      "_source" : {
        "name" : "John Doe"
      }
    }
```

### Instalar Elasticsearch con Docker

```
docker run -d -p 9200:9200 -p 9300:9300 --name=elasticsearch \
  -v /Users/$(whoami)/.elasticsearch:/usr/share/elasticsearch/data \
  -Etransport.host=0.0.0.0 -Ediscovery.zen.minimum_master_nodes=1 summasolutions/elasticsearch:6.4.2
```


### Hola Mundo

```
curl -X GET 'http://localhost:9200'
```

### Ver cluster y health (status)

> se utiliza **?pretty** para obtener una respuesta de forma clara y comprensible

```
curl -X GET 'http://localhost:9200/_cluster/health?pretty'
```

### Crear indices

> NOTA: "number_of_replicas": 0 -> si no tengo más de una máquina no tiene sentido tener más de una replica

```
curl -H 'Content-type: application/json' \
     -X PUT \
     'http://localhost:9200/productos?pretty' \
     -d '{
       "settings": {
         "number_of_shards": 1,
         "number_of_replicas": 0
       }
     }'
```

### Obtener indices
```
curl -X GET 'http://localhost:9200/_cat/indices?pretty'
```

### Ver comandos
```
curl -X GET 'http://localhost:9200/_cat?pretty'
```

### Borrar indice
```
curl -X DELETE 'http://localhost:9200/productos?pretty'
```

### Insertar un registro asignando el número de ID

|  database  |  table  |  ID  |  source   |
|  -------   |  ------ |  --- |  ------   |
|  customer  |   _doc  |   1  |  John Doe |

```
curl -H 'Content-type: application/json' \
     -X PUT \
     'http://localhost:9200/customer/_doc/1?pretty' \
     -d '{
       "name": "John Doe"
     }'
```

### Actualizar un registro

```
curl -H 'Content-type: application/json' \
     -X POST \
     'http://localhost:9200/customer/_doc/1/_update?pretty' \
     -d '{
       "doc": {
         "name": "Jane Doe"
       }
     }'
```

### Eliminar un registro

```
curl -X DELETE "localhost:9200/customer/_doc/1"
```

___

# Elasticsearch con PHP

También podemos usar librerias de PHP para trabajar con Elasticsearch

> https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/index.html

Vamos a descargar una por composer y mostrar algúnos ejemplos. 

```
 composer require "elasticsearch/elasticsearch:~6.0"
``` 

### Nos conectamos con Elasticsearch

```
php ./src/01-connect.php
```

### Agregamos un registro

```
php ./src/02-create-row.php
```


y tendremos una respuesta de este estilo:

```
Conexion exitosa
Array
(
    [_index] => empresa
    [_type] => empleados
    [_id] => 5cdb550a08b99
    [_version] => 1
    [result] => created
    [_shards] => Array
        (
            [total] => 2
            [successful] => 1
            [failed] => 0
        )

    [created] => 1
)
```

### Leemos información

> Tener en cuenta que en el archivo estamos pasando como parametro: 'id' => '1', si no existe el ID nos va a dar error.
> Podemos pasar al punto 4 para hacer una consulta de todos los registros, y luego capturar el ID

```
php ./src/03-read-data.php
```

### Buscamos en la base de registros

```
php ./src/04-search.php
```

### Eliminamos un registro

```
php ./src/05-delete-row.php
```

### Creamos un nuevo Indice (DB)

```
php ./src/06-create-index.php
```

### Eliminamos un Indice (DB)

```
php ./src/07-delete-index.php
```





 






