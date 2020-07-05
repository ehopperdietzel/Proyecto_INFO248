# Imágenes

### Requisitos Funcionales

* Modificar Slides de la Página de Inicio
* Asignar Imagen a Productos

### Requisitos no Funcionales

* Optimización

## Listar

Lista de todas las imágenes almacenadas.

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
    <td>/images</td>
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
    <td>Identifica la petición, debe contener "list".</td>
  </tr>
</table>

### Respuesta

Retorna un arreglo de objetos en formato JSON, donde cada objeto posee la siguiente estructura:

<table class="jsn">
  <tr>
    <td>Key</td>
    <td>Tipo</td>
    <td>Descripción</td>
  </tr>
  <tr>
    <td>id</td>
    <td>Entero</td>
    <td>ID de la imagen</td>
  </tr>
  <tr>
    <td>url</td>
    <td>String</td>
    <td>URL de la imagen</td>
  </tr>
</table>

## Crear

Crea una nueva imagen.

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
    <td>/images</td>
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
  <tr>
    <td>imageURL</td>
    <td>String</td>
    <td>Url de la imagen (Opcional)</td>
  </tr>
  <tr>
    <td>image</td>
    <td>Bytes</td>
    <td>Data de la imagen (Opcional), en este caso se debe utilizar FormData y los formatos aceptados son JPEG y PNG.</td>
  </tr>
</table>

### Respuesta

Retorna el URL de la nueva imagen.

## Eliminar

Elimina una imagen.

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
    <td>/images</td>
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
    <td>ID de la imagen a eliminar</td>
  </tr>

</table>

### Respuesta

Si la imagen se elimina, retorna "Ok".
