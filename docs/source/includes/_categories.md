# Categorías

## Crear

Crea una nueva categoría de productos.

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
    <td>Identifica la petición, debe contener "newCategory".</td>
  </tr>
  <tr>
    <td>name</td>
    <td>String</td>
    <td>Nombre de la categoría.</td>
  </tr>
</table>

### Respuesta

Retorna el ID de la nueva categoría.

## Eliminar

Elimina una categoría de productos, sin eliminar los productos.

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
    <td>Identifica la petición, debe contener "deleteCategory".</td>
  </tr>
  <tr>
    <td>id</td>
    <td>Entero</td>
    <td>ID de la categoría.</td>
  </tr>
</table>

### Respuesta

Si se elimina con éxito, retorna "OK".

## Modificar

Cambia el nombre de una categoría de productos.

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
    <td>Identifica la petición, debe contener "updateCategory".</td>
  </tr>
  <tr>
    <td>id</td>
    <td>Entero</td>
    <td>ID de la categoría.</td>
  </tr>
</table>

### Respuesta

Si se cambia con éxito, retorna "OK".

## Añadir Producto

Añade un producto a una categoría.

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
    <td>Identifica la petición, debe contener "addToCategory"</td>
  </tr>
  <tr>
    <td>productId</td>
    <td>Entero</td>
    <td>ID del producto</td>
  </tr>
  <tr>
    <td>categoryId</td>
    <td>Entero</td>
    <td>ID de la categoría</td>
  </tr>
</table>

### Respuesta

Si se añade con éxito, retorna "OK".

## Quitar Producto

Elimina un producto de una categoría.

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
    <td>Identifica la petición, debe contener "deleteFromCategory"</td>
  </tr>
  <tr>
    <td>productId</td>
    <td>Entero</td>
    <td>ID del producto</td>
  </tr>
  <tr>
    <td>categoryId</td>
    <td>Entero</td>
    <td>ID de la categoría</td>
  </tr>
</table>

### Respuesta

Si se elimina con éxito, retorna "OK".
