### PROYECTO PRUEBA TECNICA OPPERWEB 

## Ejecutar XAMMP e Iniciar MySql para acceder a base de datos
## Crear base de daros en MySQL back_end_opperweb

### Correr comandos

### Instalar librerias necesarias en el composer

composer install

### Ejecutar para migrar base de datos

php artisan migrate

### Ejecutar para llenar base de datos con factorias utilizando faker

php artisan db:seed    

## Ejecutar para poder consumir los Apis
php artisan serve 




## APIS DE CATEGORIAS ##

## Post crear categoria 
tipo: post
url: http://127.0.0.1:8000/api/categoria
json a enviar : 
{
	"nombre":"ejemploDeCategoria"
}

## Get traer categorias
tipo: get
url: http://127.0.0.1:8000/api/categoria

## Get traer categorias por id
tipo: get
url: http://127.0.0.1:8000/api/categoria/{id}
## Put editar categorias por id
tipo: put
url: http://127.0.0.1:8000/api/categoria/{id}
json a enviar : 
{
	"nombre":"ejemploDeCategoria"
}

## Delete  categorias por id
tipo: delete
url: http://127.0.0.1:8000/api/categoria/{id}




## APIS DE POSTS ##

## Post crear post 
tipo: post
url: http://127.0.0.1:8000/api/post
json a enviar : 
{
	"titulo":"Post Ejemplo",
	"contenido":"Ejemplo de contenido",
	"categorias_id":1
}

## Get traer posts
tipo: get
url: http://127.0.0.1:8000/api/post

## Get traer post por id
tipo: get
url: http://127.0.0.1:8000/api/post/{id}
## Put editar post por id
tipo: put
url: http://127.0.0.1:8000/api/post/{id}
json a enviar : 
{
	"titulo":"Post Ejemplo 4",
	"contenido":"Ejemplo de contenido",
	"categorias_id":2,
}

## Delete  post por id
tipo: delete
url: http://127.0.0.1:8000/api/post/{id}



## APIS DE COMENTARIOS ##

## Post crear comentario 
tipo: post
url: http://127.0.0.1:8000/api/comentario
json a enviar : 
{
	"contenido":"Ejemplo de contenido",
	"post_id":1
}

## Get traer comentarios
tipo: get
url: http://127.0.0.1:8000/api/comentario
## Get traer comentario por id
tipo: get
url: http://127.0.0.1:8000/api/comentario/{id}

## Put editar comentario por id
tipo: put
url: http://127.0.0.1:8000/api/comentario/{id}
json a enviar : 
{
	"contenido":"Ejemplo de contenido actualizado",
	"post_id":1
}

## Delete  comentario por id
tipo: delete
url: http://127.0.0.1:8000/api/comentario/{id}

