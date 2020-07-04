# Opciones

## Añadir

Añade una opción a una customización, por ejemplo "Cuero Liso", y genera nuevas variaciones del producto.

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
    <td>Identifica la petición, debe contener "addOptionToCustomization"</td>
  </tr>
  <tr>
    <td>id</td>
    <td>Entero</td>
    <td>ID de la customización</td>
  </tr>
  <tr>
    <td>name</td>
    <td>String</td>
    <td>Nombre de la opción</td>
  </tr>
</table>

### Respuesta

Retorna el ID de la nueva opción.

## Modificar

Cambia el nombre de una opción de una customización.

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
    <td>Identifica la petición, debe contener "updateCustomizationOption"</td>
  </tr>
  <tr>
    <td>id</td>
    <td>Entero</td>
    <td>ID de la opción</td>
  </tr>
  <tr>
    <td>name</td>
    <td>String</td>
    <td>Nuevo nombre de la opción</td>
  </tr>
</table>

### Respuesta

Si se modifica con éxito, retorna "OK".

## Eliminar

Elimina una opción de una customización, eliminando también las variaciones del productos generadas por esta.

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
    <td>Identifica la petición, debe contener "deleteOptionFromCustomization"</td>
  </tr>
  <tr>
    <td>id</td>
    <td>Entero</td>
    <td>ID de la opción</td>
  </tr>
</table>

### Respuesta

Si se elimina con éxito, retorna "OK".
