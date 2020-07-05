# Configuraciones

### Requisitos Funcionales

* Automatización de Creación de Base de Datos
* Notificación de Pedidos por Email

### Requisitos no Funcionales

* Portabilidad
* Usabilidad

## Crear DB

Automatiza la creación de la base de datos MySQL, junto con sus tablas y parámetros por defecto, utilizando las credenciales definidas en el archivo conf.json, ubicado en la raíz del proyecto.<br>
Además le asigna el formato utf8_general_ci.

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
    <td>/setup</td>
  </tr>
  <tr>
    <td>Autentificación</td>
    <td>Administrador</td>
  </tr>
</table>

### Envío

Lee las credenciales MySQL desde el archivo conf.json, ubicado en la raíz del proyecto.

### Respuesta

Muestra en pantalla el estado de creación de la base de datos y cada una de sus tablas.

## Activar/Desactivar Notificaciones

Activa o desactiva las notificaciones via email.

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
    <td>/conf</td>
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
    <td>Identifica la petición, debe contener "updateNotifications"</td>
  </tr>
  <tr>
    <td>active</td>
    <td>Bool</td>
    <td>Activo o inactivo</td>
  </tr>
</table>

### Respuesta

Si se cambia con éxito, retorna "OK".

## Modificar Email de Notificaciones

Cambia el email al cual se envían las notificaciones.

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
    <td>/conf</td>
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
    <td>Identifica la petición, debe contener "setNotificationsEmail"</td>
  </tr>
  <tr>
    <td>email</td>
    <td>String</td>
    <td>Nuevo email</td>
  </tr>
</table>

### Respuesta

Si se cambia con éxito, retorna "OK".
