# Introducción

## Introducción a la API

El sitio web cuenta con una API REST, para facilitar una futura implementación en dispositivos móviles.<br>
Se utiliza principalmente el método POST, estructurando la información de envío y respuesta en formato JSON.

En los llamados con método POST, puede existir más de una función para un mismo servicio, los cuales se diferencian por llave "request" del mensaje JSON.

Se indicará la nececidad de autentificación ( admin ), para algunos llamados.

Las rutas a la cual se hacen todos los llamados se ecuentran en el directorio <code>/api/v1/</code>, por lo tanto
todos los servicios descritos a continuación partirán desde ese directorio.
