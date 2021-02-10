
# Test Frontend

## Build
- Clonar repositorio
- Copiar el archivo `.env.example` y renonbrarlo como `.env`, configurar dentro la referencia a la base de datos mySql
- Ejecutar `npm install`
- Ejecutar `npm run dev`
- Ejecutar `php artisan migrate`
- Ejecutar `php artisan storage:link`
- Ejecutar `php artisan serve`

## Api
api/productos = retorna un json con todos los productos
api/productos/{id} = retorna un json con el producto segun el ID
api/productos/buscar/{clave} = retorna un json con los productos donde el nombre contiene la palabra clave
