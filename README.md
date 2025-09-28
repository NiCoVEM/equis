comandos sql:
para iniciar: docker exec -it mi-proyecto-node-docker-postgres_db-1 psql -U user -d mydb

Crear una base de datos: CREATE DATABASE nombre_nuevo;

Ver las bases de datos disponibles: \l

Ver en qué base estás conectado: \c

cambiar de base con: \c nombre_de_la_base

Listar tablas dentro de la base: \dt

Ver las columnas de una tabla específica: \d nombre_tabla

Eliminar una base de datos: DROP DATABASE nombre_de_la_base;

Salir de psql: \q
