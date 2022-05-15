# Promedik Ecommerce

1. Tener instalado AppServ 9.3.0
https://www.appserv.org/en/

2. Clonar el repositorio en la siguiente ubicación:
```
C:\AppServ\www
```

El resultado debe de ser el siguiente:
![Promedik](https://github.com/erickbarcenas/prod_limpieza/blob/main/static/imgs/readme/location.jpeg)

3. Ingresar a la siguiente url
```
http://localhost/phpmyadmin/index.php
```

4. Escribir las credenciales para acceder a phpMyAdmin, por ejemplo:
```
Usuario: root
Contraseña: 12345678
```

5. Pegar las consultas migrations.sql en la consola de PhpMyAdmin 

![Promedik](https://github.com/erickbarcenas/prod_limpieza/blob/main/static/imgs/readme/before_migrations.jpeg)

Presionar el botón continuar.
El resultado debe de ser el siguiente:

![Promedik](https://github.com/erickbarcenas/prod_limpieza/blob/main/static/imgs/readme/after_migrations.jpeg)


6. Ingresar a la siguiente dirección:
```
http://localhost/prod_limpieza/index.php
```

El resultado debe de ser el siguiente:
![Promedik](https://github.com/erickbarcenas/prod_limpieza/blob/main/static/imgs/readme/promedik.jpeg)



## Referencers

1. (Generate Data)[https://generatedata.com/generator]
2. (Database diagram)[https://app.quickdatabasediagrams.com/#/]