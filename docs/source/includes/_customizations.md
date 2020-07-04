# Customizaciones

## Crear

Añade una propiedad customizable a un producto. Por ejemplo "Tipo de Cuero".

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
    <td>Identifica la petición, debe contener "newCustomization"</td>
  </tr>
  <tr>
    <td>productId</td>
    <td>Entero</td>
    <td>ID del producto</td>
  </tr>
  <tr>
    <td>name</td>
    <td>String</td>
    <td>Nombre de la customiación</td>
  </tr>
</table>

### Respuesta

Retorna el ID de la nueva customización.

## Modificar

Cambia el nombre de una customización.

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
    <td>Identifica la petición, debe contener "updateCustomization"</td>
  </tr>
  <tr>
    <td>id</td>
    <td>Entero</td>
    <td>ID de la customización</td>
  </tr>
  <tr>
    <td>name</td>
    <td>String</td>
    <td>Nuevo nombre de la customiación</td>
  </tr>
</table>

### Respuesta

Si se modifica con éxito, retorna "OK".

## Eliminar

Elimina una customización, junto con sus opciones, y por ende las variaciones que generó del producto.

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
    <td>Identifica la petición, debe contener "deleteCustomization"</td>
  </tr>
  <tr>
    <td>id</td>
    <td>Entero</td>
    <td>ID de la customización</td>
  </tr>
</table>

### Respuesta

Si se elimina con éxito, retorna "OK".
