# Administrador

### Requisitos Funcionales

* Panel de Administrador

### Requisitos no Funcionales

* Seguridad

## Iniciar Sesión

Genera una PHP SESSION para manejar la sesión del administrador.<br>
El servidor retorna una cookie "admin_token", con el token de la sesión.<br>
Esta cookie se debe enviar en cada request para mantener la sesión.<br>

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
    <td>/admin/login</td>
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
    <td>username</td>
    <td>String</td>
    <td>Nombre de usuario del administrador.</td>
  </tr>
  <tr>
    <td>password</td>
    <td>String</td>
    <td>Constraseña del administrador.</td>
  </tr>
</table>

### Respuesta

Cookie de nombre "admin_token", con el token de la sesión.

## Cerrar Sesión

Elimina la sesión PHP del administrador, junto con sus cookies.

### Método

<table class="met">
  <tr>
    <td>Método</td>
    <td>GET</td>
  </tr>
  <tr>
    <td>Clasificación</td>
    <td>Utilitario</td>
  </tr>
  <tr>
    <td>Path</td>
    <td>/admin/logout</td>
  </tr>
  <tr>
    <td>Autentificación</td>
    <td>No</td>
  </tr>
</table>

### Respuesta

Retorna "Ok".
