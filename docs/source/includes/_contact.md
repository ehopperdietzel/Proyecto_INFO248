# Contacto

### Requisitos Funcionales

* Modificar Información del Sitio Web

### Requisitos no Funcionales

* Usabilidad

## Crear

Crea un nuevo método de contácto.

### Método

<table class="met">
  <tr>
    <td>Método</td>
    <td>POST</td>
  </tr>
  <tr>
    <td>Clasificación</td>
    <td>Empresarial</td>
  </tr>
  <tr>
    <td>Path</td>
    <td>/contact</td>
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
    <td>Identifica la petición, debe contener "new"</td>
  </tr>
  <tr>
    <td>type</td>
    <td>Entero</td>
    <td>ID de tipo "contactType"</td>
  </tr>
  <tr>
    <td>href</td>
    <td>String</td>
    <td>Usuario, teléfono o URL</td>
  </tr>
</table>

### Respuesta

Retorna el ID del nuevo contacto.

## Modificar

Modifica un método de contacto.

### Método

<table class="met">
  <tr>
    <td>Método</td>
    <td>POST</td>
  </tr>
  <tr>
    <td>Clasificación</td>
    <td>Empresarial</td>
  </tr>
  <tr>
    <td>Path</td>
    <td>/contact</td>
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
    <td>ID del contacto</td>
  </tr>
  <tr>
    <td>type</td>
    <td>Entero</td>
    <td>ID de tipo "contactType"</td>
  </tr>
  <tr>
    <td>href</td>
    <td>String</td>
    <td>Usuario, teléfono o URL</td>
  </tr>
</table>

### Respuesta

Si se modifica con éxito, retorna "OK".

## Eliminar

Elimina un método de contacto.

### Método

<table class="met">
  <tr>
    <td>Método</td>
    <td>POST</td>
  </tr>
  <tr>
    <td>Clasificación</td>
    <td>Empresarial</td>
  </tr>
  <tr>
    <td>Path</td>
    <td>/contact</td>
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
    <td>ID del contacto</td>
  </tr>
</table>

### Respuesta

Si se elimina con éxito, retorna "OK".
