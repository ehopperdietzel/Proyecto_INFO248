## Realizar Pedido

Permite al cliente realizar un pedido.

### Método

<table class="met">
  <tr>
    <td>Método</td>
    <td>POST</td>
  </tr>
  <tr>
    <td>Path</td>
    <td>/client/orders.php</td>
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
    <td>Identifica la petición, debe contener "new".</td>
  </tr>
  <tr>
    <td>fname</td>
    <td>String</td>
    <td>Nombre del Cliente.</td>
  </tr>
  <tr>
    <td>lname</td>
    <td>String</td>
    <td>Apellido del Cliente.</td>
  </tr>
  <tr>
    <td>email</td>
    <td>String</td>
    <td>Email del Cliente.</td>
  </tr>
  <tr>
    <td>phone</td>
    <td>Entero</td>
    <td>Teléfono del Cliente.</td>
  </tr>
  <tr>
    <td>products</td>
    <td>Arreglo de Objetos</td>
    <td>Poductos del Pedido.</td>
  </tr>
</table>

### Respuesta

Retorna el ID del pedido.



## Listar de Productos

Retorna un arreglo con las noticias creadas por el administrador.

### Método

<table class="met">
  <tr>
    <td>Método</td>
    <td>GET</td>
  </tr>
  <tr>
    <td>Path</td>
    <td>/productos/list.php</td>
  </tr>
  <tr>
    <td>Autentificación</td>
    <td>No</td>
  </tr>
</table>

### Envío

...

### Respuesta

Retorna un arreglo de objetos JSON, con el siguiente formato...

## Login Admin

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
    <td>Path</td>
    <td>/admin/login.php</td>
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

## Logout Admin

Elimina la sesión PHP del administrador, junto con sus cookies.

### Método

<table class="met">
  <tr>
    <td>Método</td>
    <td>GET</td>
  </tr>
  <tr>
    <td>Path</td>
    <td>/admin/logout.php</td>
  </tr>
  <tr>
    <td>Autentificación</td>
    <td>No</td>
  </tr>
</table>

### Respuesta

Redirecciona a la página de inicio.

## Variables Globales

Retorna una lista de variables globales, tales como ciudades, bancos, etc.

### Método

<table class="met">
  <tr>
    <td>Método</td>
    <td>GET</td>
  </tr>
  <tr>
    <td>Path</td>
    <td>/lib/globalVariables.php</td>
  </tr>
  <tr>
    <td>Autentificación</td>
    <td>No</td>
  </tr>
</table>

### Respuesta

<table class="jsn">
  <tr>
    <td>Key</td>
    <td>Tipo</td>
    <td>Descripción</td>
  </tr>
  <tr>
    <td>banks</td>
    <td>Arreglo de Objetos</td>
    <td>Contiene una lista de objetos, con el ID, nombre e indicador de eliminación de cada banco.</td>
  </tr>
  <tr>
    <td>cities</td>
    <td>Arreglo de Objetos</td>
    <td>Contiene una lista de objetos, con el ID, nombre e indicador de eliminación de cada ciudad.</td>
  </tr>
  <tr>
    <td>colleges</td>
    <td>Arreglo de Objetos</td>
    <td>Contiene una lista de objetos, con el ID, nombre, ciudad, descuento e indicador de eliminación de cada colegio.</td>
  </tr>
  <tr>
    <td>sectors</td>
    <td>Arreglo de Objetos</td>
    <td>Contiene una lista de objetos, con el ID, nombre, ciudad, tarifa e indicador de eliminación de cada sector.</td>
  </tr>
  <tr>
    <td>bankAccountTypes</td>
    <td>Arreglo de Objetos</td>
    <td>Contiene una lista de objetos, con el ID, y nombre de tipo de cuenta bancaria ( Corriente, Vista y Ahorro ).</td>
  </tr>
  <tr>
    <td>colors</td>
    <td>Arreglo de Objetos</td>
    <td>Contiene una lista de objetos, con el ID, nombre, y código hexadecimal de los colores utilizados en el sitio web.</td>
  </tr>
  <tr>
    <td>months</td>
    <td>Arreglo de Objetos</td>
    <td>Contiene una lista de objetos, con el ID y nombre de los meses del año ( ID desde 1 a 12 ).</td>
  </tr>
  <tr>
    <td>weekDays</td>
    <td>Arreglo de Objetos</td>
    <td>Contiene una lista de objetos, con el ID y nombre de los días de la semana ( ID desde 1 a 7 ).</td>
  </tr>
  <tr>
    <td>depositStates</td>
    <td>Arreglo de Objetos</td>
    <td>Contiene una lista de objetos, con el ID y nombre de los estados de un depósito ( Pendiente, Aceptado y Rechazado ).</td>
  </tr>
  <tr>
    <td>orderStates</td>
    <td>Arreglo de Objetos</td>
    <td>Contiene una lista de objetos, con el ID y nombre de los estados de un pedido ( Pendiente, Concretada y Cancelada ).</td>
  </tr>
  <tr>
    <td>time</td>
    <td>String</td>
    <td>Contiene la fecha y hora del sevidor en el formato "YYY-MM-DD-HH-MM-SS"</td>
  </tr>
  <tr>
    <td>facebook</td>
    <td>String</td>
    <td>Contiene el usuario de Facebook de la Empresa.</td>
  </tr>
  <tr>
    <td>instagram</td>
    <td>String</td>
    <td>Contiene el usuario de Instagram de la Empresa.</td>
  </tr>
  <tr>
    <td>email</td>
    <td>String</td>
    <td>Contiene el email de contacto de la Empresa.</td>
  </tr>
  <tr>
    <td>whatsapp</td>
    <td>String</td>
    <td>Contiene el whatsapp de la Empresa.</td>
  </tr>
</table>
