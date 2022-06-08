# pruebaCafeteria
Prueba técnica 2022 desarrollo de sistema que gestiona productos y registra venta.

Me gustaría agradecer por la oportunidad de presentar esta prueba.


Presento esta solución a lo planteado, con las siguientes tecnologías:

Para el front-end utilicé HTML, CSS y JS con una pequeña librería que me he creado basandome en CSS Grid y tomando referencias de la ya conocida tecnoligía Bootstrap.
Para el Back-end utilicé PHP nativo y estructural, para hacer todos los contactos con el servidor utilicé AJAX, JQuery y JS.
Para la Base de Datos Utilicé MySQL.

El conjunto de lo antes mencionado lo he llamado EasyAll, tecnología que me proporciona una facilidad a la hora de programar y organizar las páginas que deseo emplear.
Sumulando una aplicación hecha con Angular 2+, React JS o demás tipos de plataformas para realizar aplicaciones SPA, donde nunca se recarga la plataforma. Esta tecnología la he contruido juntando todos los conocimientos que he obtenido a lo largo de mi carrera como desarrollador web.


Para poder  ejecutar esta web de manera local, se debe de configurar el archivo para la conexion a la base de datos llamado 'conexion-bd.php' ubicado en la carpeta 'php'.
La base de datos se puede importar a nuestro gestor, tomando el archivo 'cafeteria.sql' ubicado en la carpeta 'database'.

El archivo 'index.php' ubicado en la raiz de nuestro proyecto contiene un formulario de inicio de sesión, al que podremos digitar las siguientes credenciales:
email: admin@mail.com
contraseña: 123
Estas mismas registradas en la base de datos en la tabla 'usuarios'
sí no tenemos inicada una sesión nos redirigirá a este archivo 'index.php'

El archivo 'welcome.php' ubicado en la raiz de nuestro proyecto contiene y gestiona todo la aplicación.

Por medio de funciones JS cargaran las 'pages' o vistas que deseamos, por defecto welcome. En esta misma veremos las dos consultas solicitadas en la prueba de el producto con mayor stock y el producto más vendido.

En la carpeta 'extensions' tenemos las librerías utilizadas para este proyecto tales como, SweetAlert, DataTables, Fuentes e Iconos de una plataforma llamada '**https://icomoon.io/**'.

En la carpeta 'includes' tenemos las partes en común como la inlución de archivos de estilo, archivos JavaScript y demás.

Quiza, haya algunas pequeñas lineas de código que no se utilicen ya que como dije, este conjunto de tecnologías las tengo como base para iniciar cualquier proyecto web.

![image](https://user-images.githubusercontent.com/42647741/172732567-face61da-1c32-453a-a0cc-205a0b8d2224.png)
