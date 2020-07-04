# Slides

## Crear

Crea un nuevo slide.

### Método

<table class="met">
  <tr>
    <td>Método</td>
    <td>POST</td>
  </tr>
  <tr>
    <td>Clasificación</td>
    <td>Utilitario</td>
  </tr>
  <tr>
    <td>Path</td>
    <td>/slides</td>
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

Retorna el ID del nuevo slide.

## Listar Visibles

Lista los slides visibles.

### Método

<table class="met">
  <tr>
    <td>Método</td>
    <td>POST</td>
  </tr>
  <tr>
    <td>Clasificación</td>
    <td>Utilitario</td>
  </tr>
  <tr>
    <td>Path</td>
    <td>/slides</td>
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

Arreglo de objetos en formato JSON, donde cada objeto tiene la siguiente estructura:

<table class="jsn">
  <tr>
    <td>Key</td>
    <td>Tipo</td>
    <td>Descripción</td>
  </tr>
  <tr>
    <td>id</td>
    <td>Entero</td>
    <td>ID del slide</td>
  </tr>
  <tr>
    <td>contain</td>
    <td>Bool</td>
    <td>Modo de visualización</td>
  </tr>
  <tr>
    <td>image</td>
    <td>String</td>
    <td>URL de la imagen</td>
  </tr>
</table>

## Listar Todos

Lista todos los slides.

### Método

<table class="met">
  <tr>
    <td>Método</td>
    <td>POST</td>
  </tr>
  <tr>
    <td>Clasificación</td>
    <td>Utilitario</td>
  </tr>
  <tr>
    <td>Path</td>
    <td>/slides</td>
  </tr>
  <tr>
    <td>Autentificación</td>
    <td>Administador</td>
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

Arreglo de objetos en formato JSON, donde cada objeto tiene la siguiente estructura:

<table class="jsn">
  <tr>
    <td>Key</td>
    <td>Tipo</td>
    <td>Descripción</td>
  </tr>
  <tr>
    <td>id</td>
    <td>Entero</td>
    <td>ID del slide</td>
  </tr>
  <tr>
    <td>visible</td>
    <td>Bool</td>
    <td>Si el slide es visible</td>
  </tr>
  <tr>
    <td>contain</td>
    <td>Bool</td>
    <td>Modo de visualización</td>
  </tr>
  <tr>
    <td>image</td>
    <td>String</td>
    <td>URL de la imagen</td>
  </tr>
  <tr>
    <td>position</td>
    <td>Entero</td>
    <td>Orden del slide</td>
  </tr>
</table>

## Eliminar

Elimina un slide.

### Método

<table class="met">
  <tr>
    <td>Método</td>
    <td>POST</td>
  </tr>
  <tr>
    <td>Clasificación</td>
    <td>Utilitario</td>
  </tr>
  <tr>
    <td>Path</td>
    <td>/slides</td>
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
    <td>Identifica la petición, debe contener "delete".</td>
  </tr>
  <tr>
    <td>id</td>
    <td>Entero</td>
    <td>ID del slide a eliminar.</td>
  </tr>
</table>

### Respuesta

Si se elimina correctamente, retorna "Ok".

## Modificar

Modifica un slide.

### Método

<table class="met">
  <tr>
    <td>Método</td>
    <td>POST</td>
  </tr>
  <tr>
    <td>Clasificación</td>
    <td>Utilitario</td>
  </tr>
  <tr>
    <td>Path</td>
    <td>/slides</td>
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
    <td>Identifica la petición, debe contener "update"</td>
  </tr>
  <tr>
    <td>id</td>
    <td>Entero</td>
    <td>ID del slide a eliminar</td>
  </tr>
  <tr>
    <td>image</td>
    <td>Entero</td>
    <td>ID de la nueva imagen del slide (Opcional)</td>
  </tr>
  <tr>
    <td>contain</td>
    <td>Bool</td>
    <td>Modo en que se visualiza la imagen en su contenedor (Opcional)<br>Si es True: La imagen se muestra completa.<br>Si es False: La imagen ocupa todo el espacio del contenedor.</td>
  </tr>
  <tr>
    <td>visible</td>
    <td>Bool</td>
    <td>Indica si el slide será visible por los clientes (Opcional)</td>
  </tr>
  <tr>
    <td>position</td>
    <td>Entero</td>
    <td>Modifica el orden del slide (Opcional)</td>
  </tr>
</table>

### Respuesta

Si se elimina correctamente, retorna "Ok".
