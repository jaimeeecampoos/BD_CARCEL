# 🏛️ Sistema de Gestión de Prisión - CRUD PHP & MySQL

Este repositorio contiene el proyecto completo de desarrollo, diseño y despliegue de una aplicación web tipo **CRUD** (Create, Read, Update, Delete) orientada a la gestión de una base de datos penitenciaria (`carcel`). El proyecto abarca desde el diseño conceptual en base de datos relacional hasta su despliegue final en producción.

---

## 🚀 Características del Proyecto
La aplicación permite la administración completa de las siguientes entidades de la base de datos:
* **Presos:** Registro, edición, actualización y baja de reclusos.
* **Actividades:** Gestión de los talleres, cursos y programas del centro.
* **Realiza (Tabla Intermedia):** Control de la relación muchos a muchos ($M:N$) entre los presos y las actividades, regulando las inscripciones por fecha y permitiendo el borrado en cascada (`ON DELETE CASCADE`).

---

## 🛠️ Tecnologías Utilizadas
* **Backend:** PHP 8.x (utilizando la extensión estructurada `mysqli` para la conexión de datos).
* **Frontend:** HTML5, CSS3 y diseño de interfaces limpias.
* **Bases de Datos:** MySQL / MariaDB (Entorno Web) y Microsoft Access (Esquema estructural).
* **Entorno Local:** XAMPP (Servidor Apache y phpMyAdmin).
* **Servidor de Producción / Despliegue:** InfinityFree (Hosting Cloud).
* **Transferencia de Archivos:** Cliente FTP FileZilla.

---

## 📂 Estructura Detallada del Repositorio

El proyecto se estructura de la siguiente manera en este repositorio:

* **Raíz del Proyecto:**
  * 📁 `crud/` -> Carpeta contenedora de toda la aplicación web.
  * 📄 `README.md` -> Este archivo de documentación técnica.
  * 📄 `LICENSE` -> Términos legales de distribución (Licencia MIT).
  * 📄 `carcel.sql` -> Script SQL para XAMPP.
  * 📄 `carcel.accdb` -> Archivo de la base de datos original en Microsoft Access.
  * 📄 `JAIME_CAMPOS_MEMORIA_BD_CARCEL.pdf` -> Documento de la memoria final del trabajo con explicaciones y capturas.

* **Dentro de la carpeta `crud/`:**
  * 📄 `index.php` -> Menú principal y enrutador de la aplicación en el servidor.
  * 📄 `dbConnection.php` -> Archivo de conexión activo (apunta a Local por defecto).
  * 📁 `preso/` -> Operaciones CRUD personalizadas para la tabla Presos (`index`, `add`, `addAction`, `edit`, `editAction`, `delete`).
  * 📁 `actividad/` -> Operaciones CRUD personalizadas para la tabla Actividades.
  * 📁 `realiza/` -> Operaciones CRUD personalizadas para la tabla intermedia muchos a muchos.

---

## ⚙️ Instrucciones de Instalación en Local (XAMPP)

Para replicar y testear el proyecto en tu ordenador local:

1. Descarga o clona este repositorio dentro de la ruta web de tu servidor (ejemplo: `C:\xampp\htdocs\`).
2. Abre el panel de **XAMPP** e inicia los servicios de **Apache** y **MySQL**.
3. Entra en `localhost/phpmyadmin` desde tu navegador.
4. Ve a la pestaña **Importar**, selecciona el archivo `carcel_local.sql` de la raíz de este proyecto y ejecútalo (este script se encarga de crear la base de datos y las tablas automáticamente).
5. Verifica que el archivo `crud/dbConnection.php` esté configurado con tus credenciales de XAMPP (por defecto: `127.0.0.1`, usuario `root` y clave vacía).
6. Ejecuta la aplicación web entrando a la URL: `http://localhost/crud/index.php`.

---

## 🌐 Enlace al Proyecto en Producción
La sección correspondiente a la relación intermedia muchos a muchos ha sido desplegada en la nube y puede ser testeada en tiempo real:

🔗 **URL del Despliegue:** http://campos-jaime-crud.rf.gd/crud

---

## ⚖️ Licencia
Este proyecto se distribuye bajo la **Licencia MIT**. Es un software de código abierto de uso libre para fines académicos. Para más información, consulta el archivo `LICENSE` adjunto.

---
**Desarrollado por:** Jaime Campos Cebrián

**Grado**: Administración de Sistemas Informáticos en Red

**Módulo:** Gestión de Bases de datos

**Fecha:** 19 de mayo de 2026
