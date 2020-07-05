# Pedidos

### Requisitos Funcionales

* Usuarios Generan Pedidos
* Administrador Visualiza Pedidos
* Administrador Modifica Pedidos

### Requisitos no Funcionales

* Usabilidad

## Crear

## Crear Manualmente

## Modificar

## Eliminar

Elimina un pedido.

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
    <td>/orders</td>
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
    <td>ID del pedido a eliminar</td>
  </tr>
</table>

### Respuesta

Si el pedido se elimina con éxito, retorna "Ok".
