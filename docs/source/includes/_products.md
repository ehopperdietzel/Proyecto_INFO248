# Productos

## Listar Visibles

Lista los productos visibles por los clientes.

### Método

<table class="met">
  <tr>
    <td>Método</td>
    <td>POST</td>
  </tr>
  <tr>
    <td>Path</td>
    <td>/products</td>
  </tr>
  <tr>
    <td>Autentificación</td>
    <td>No</td>
  </tr>
</table>

### Envío

<table class="jsn">
  <tr>
    <td>Key</td>
    <td>Tipo</td>
    <td>Descripción</td>
  </tr>
  <tr>
    <td>request</td>
    <td>String</td>
    <td>Identifica la petición, debe contener "list".</td>
  </tr>
</table>

### Respuesta

Retorna un arreglo de objetos en formato JSON con los siguientes parámetros:

<table class="jsn">
  <tr>
    <td>Key</td>
    <td>Tipo</td>
    <td>Descripción</td>
  </tr>
  <tr>
    <td>id</td>
    <td>Entero</td>
    <td>ID del producto</td>
  </tr>
  <tr>
    <td>title</td>
    <td>String</td>
    <td>Nombre del producto</td>
  </tr>
  <tr>
    <td>description</td>
    <td>String</td>
    <td>Descripción del producto</td>
  </tr>
  <tr>
    <td>defaultPrice</td>
    <td>Entero</td>
    <td>Precio por defecto</td>
  </tr>
  <tr>
    <td>defaultImage</td>
    <td>String</td>
    <td>URL de la imagen por defecto</td>
  </tr>
  <tr>
    <td>categories</td>
    <td>Arreglo de Objetos</td>
    <td>Lista de categorías a las cuales pertenece el producto</td>
  </tr>
  <tr>
    <td>customizable</td>
    <td>Bool</td>
    <td>Indica si el producto es customizable</td>
  </tr>
  <tr>
    <td>customizations</td>
    <td>Arreglo de Objetos</td>
    <td>Lista de customizaciones junto con sus opciones</td>
  </tr>
  <tr>
    <td>variations</td>
    <td>Arreglo de Objetos</td>
    <td>Lista de variaciones del producto</td>
  </tr>
</table>

Donde los objetos del parámetro "categories" tiene la siguiente estructura:

<table class="jsn">
  <tr>
    <td>Key</td>
    <td>Tipo</td>
    <td>Descripción</td>
  </tr>
  <tr>
    <td>id</td>
    <td>Entero</td>
    <td>ID de la categoría</td>
  </tr>
  <tr>
    <td>name</td>
    <td>String</td>
    <td>Nombre de la categoría</td>
  </tr>
</table>

Los objetos del parámetro "customizations" tiene la siguiente estructura:

<table class="jsn">
  <tr>
    <td>Key</td>
    <td>Tipo</td>
    <td>Descripción</td>
  </tr>
  <tr>
    <td>id</td>
    <td>Entero</td>
    <td>ID de la customización</td>
  </tr>
  <tr>
    <td>name</td>
    <td>String</td>
    <td>Nombre de la customización</td>
  </tr>
  <tr>
    <td>options</td>
    <td>Arreglo de Objetos</td>
    <td>Lista de opciones ( id y nombre de la opción)</td>
  </tr>
</table>

Los objetos del parámetro "variations" tiene la siguiente estructura:

<table class="jsn">
  <tr>
    <td>Key</td>
    <td>Tipo</td>
    <td>Descripción</td>
  </tr>
  <tr>
    <td>id</td>
    <td>Entero</td>
    <td>ID de la variación</td>
  </tr>
  <tr>
    <td>productId</td>
    <td>Entero</td>
    <td>ID del producto asociado</td>
  </tr>
  <tr>
    <td>image</td>
    <td>String</td>
    <td>URL de la imagen alternativa</td>
  </tr>
  <tr>
    <td>price</td>
    <td>Entero</td>
    <td>Precio de la variación</td>
  </tr>
  <tr>
    <td>optionsCombination</td>
    <td>Arreglo de Objetos</td>
    <td>Lista de las combinaciónes de customizaciones que generan esta variación (ID de la costomización, ID de su opción)</td>
  </tr>
</table>

## Listar Todos

Lista todos los productos.

### Método

<table class="met">
  <tr>
    <td>Método</td>
    <td>POST</td>
  </tr>
  <tr>
    <td>Path</td>
    <td>/products</td>
  </tr>
  <tr>
    <td>Autentificación</td>
    <td>Administrador</td>
  </tr>
</table>

### Envío

<table class="jsn">
  <tr>
    <td>Key</td>
    <td>Tipo</td>
    <td>Descripción</td>
  </tr>
  <tr>
    <td>request</td>
    <td>String</td>
    <td>Identifica la petición, debe contener "listAll".</td>
  </tr>
</table>

### Respuesta

Retorna un arreglo de objetos en formato JSON con los siguientes parámetros:

<table class="jsn">
  <tr>
    <td>Key</td>
    <td>Tipo</td>
    <td>Descripción</td>
  </tr>
  <tr>
    <td>id</td>
    <td>Entero</td>
    <td>ID del producto</td>
  </tr>
  <tr>
    <td>title</td>
    <td>String</td>
    <td>Nombre del producto</td>
  </tr>
  <tr>
    <td>description</td>
    <td>String</td>
    <td>Descripción del producto</td>
  </tr>
  <tr>
    <td>defaultPrice</td>
    <td>Entero</td>
    <td>Precio por defecto</td>
  </tr>
  <tr>
    <td>defaultImage</td>
    <td>String</td>
    <td>URL de la imagen por defecto</td>
  </tr>
  <tr>
    <td>categories</td>
    <td>Arreglo de Objetos</td>
    <td>Lista de categorías a las cuales pertenece el producto</td>
  </tr>
  <tr>
    <td>visible</td>
    <td>Bool</td>
    <td>Indica si el producto es visible por los clientes</td>
  </tr>
  <tr>
    <td>customizable</td>
    <td>Bool</td>
    <td>Indica si el producto es customizable</td>
  </tr>
  <tr>
    <td>customizations</td>
    <td>Arreglo de Objetos</td>
    <td>Lista de customizaciones junto con sus opciones</td>
  </tr>
  <tr>
    <td>variations</td>
    <td>Arreglo de Objetos</td>
    <td>Lista de variaciones del producto</td>
  </tr>
</table>

Donde los objetos del parámetro "categories" tiene la siguiente estructura:

<table class="jsn">
  <tr>
    <td>Key</td>
    <td>Tipo</td>
    <td>Descripción</td>
  </tr>
  <tr>
    <td>id</td>
    <td>Entero</td>
    <td>ID de la categoría</td>
  </tr>
  <tr>
    <td>name</td>
    <td>String</td>
    <td>Nombre de la categoría</td>
  </tr>
</table>

Los objetos del parámetro "customizations" tiene la siguiente estructura:

<table class="jsn">
  <tr>
    <td>Key</td>
    <td>Tipo</td>
    <td>Descripción</td>
  </tr>
  <tr>
    <td>id</td>
    <td>Entero</td>
    <td>ID de la customización</td>
  </tr>
  <tr>
    <td>name</td>
    <td>String</td>
    <td>Nombre de la customización</td>
  </tr>
  <tr>
    <td>options</td>
    <td>Arreglo de Objetos</td>
    <td>Lista de opciones ( id y nombre de la opción)</td>
  </tr>
</table>

Los objetos del parámetro "variations" tiene la siguiente estructura:

<table class="jsn">
  <tr>
    <td>Key</td>
    <td>Tipo</td>
    <td>Descripción</td>
  </tr>
  <tr>
    <td>id</td>
    <td>Entero</td>
    <td>ID de la variación</td>
  </tr>
  <tr>
    <td>productId</td>
    <td>Entero</td>
    <td>ID del producto asociado</td>
  </tr>
  <tr>
    <td>image</td>
    <td>String</td>
    <td>URL de la imagen alternativa</td>
  </tr>
  <tr>
    <td>price</td>
    <td>Entero</td>
    <td>Precio de la variación</td>
  </tr>
  <tr>
    <td>optionsCombination</td>
    <td>Arreglo de Objetos</td>
    <td>Lista de las combinaciónes de customizaciones que generan esta variación (ID de la costomización, ID de su opción)</td>
  </tr>
</table>

## Crear

Crea un nuevo producto.

### Método

<table class="met">
  <tr>
    <td>Método</td>
    <td>POST</td>
  </tr>
  <tr>
    <td>Path</td>
    <td>/products</td>
  </tr>
  <tr>
    <td>Autentificación</td>
    <td>Administrador</td>
  </tr>
</table>

### Envío

<table class="jsn">
  <tr>
    <td>Key</td>
    <td>Tipo</td>
    <td>Descripción</td>
  </tr>
  <tr>
    <td>request</td>
    <td>String</td>
    <td>Identifica la petición, debe contener "new".</td>
  </tr>
</table>

### Respuesta

Retorna el ID del nuevo producto.

## Eliminar

Elimina un producto junto con sus variaciones, y opciones de customización.

### Método

<table class="met">
  <tr>
    <td>Método</td>
    <td>POST</td>
  </tr>
  <tr>
    <td>Path</td>
    <td>/products</td>
  </tr>
  <tr>
    <td>Autentificación</td>
    <td>Administrador</td>
  </tr>
</table>

### Envío

<table class="jsn">
  <tr>
    <td>Key</td>
    <td>Tipo</td>
    <td>Descripción</td>
  </tr>
  <tr>
    <td>request</td>
    <td>String</td>
    <td>Identifica la petición, debe contener "delete"</td>
  </tr>
  <tr>
    <td>id</td>
    <td>Entero</td>
    <td>ID del producto a eliminar</td>
  </tr>
</table>

### Respuesta

Si el producto se elimina con éxito, retorna "Ok".
