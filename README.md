# Mini-CRM Laravel

Este proyecto es un mini-CRM creado con Laravel 12 que permite gestionar
empresas y empleados, con funcionalidades básicas de CRUD (Crear, Leer,
Actualizar, Eliminar). Este proyecto fue realizado para la prueba tecnica de
Digito.pe

## Requisitos previos

Antes de empezar, asegúrate de tener instalados los siguientes componentes:

- PHP 8.1 o superior
- Composer (para gestionar dependencias)
- Node.js (opcional, para la compilación de assets frontend)
- Un servidor de bases de datos compatible (MySQL, SQLite, PostgreSQL, etc.)

## Instalación

### 1. Clonar el repositorio

Primero, clona este repositorio en tu máquina local:

```bash
git clone https://github.com/ETORRES1908/mini-crm-test.git
cd mini-crm-test
```

### 2. Instalar dependencias

Usa Composer para instalar las dependencias del proyecto:

```bash
composer install
```

### 3. Configurar variables de entorno

Copia el archivo `.env.example` a un nuevo archivo `.env` y configura las
variables según tu entorno:

```bash
cp .env.example .env
```

Dentro del archivo `.env`, configura las siguientes variables:

- `DB_CONNECTION` (selecciona la base de datos que estés utilizando)
- `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` (configura
  los detalles de conexión a la base de datos)

### 4. Generar clave de aplicación

Laravel necesita una clave de aplicación única. Para generar una, ejecuta:

```bash
php artisan key:generate
```

### 5. Migrar la base de datos y cargar datos de prueba

Ejecuta las migraciones para crear las tablas necesarias en la base de datos y
carga los datos de ejemplo (seeders) ejecutando el siguiente comando:

```bash
php artisan migrate --seed
```

Este comando ejecutará las migraciones y luego cargará los datos de prueba
preconfigurados en los seeders, lo que te permitirá tener empresas y empleados
de ejemplo para interactuar con la aplicación.

### 6. Instalar dependencias de frontend

Para compilar los archivos de frontend (CSS y JS), ejecuta:

```bash
npm install
npm run dev
```

Para compilar los archivos de frontend para producción, ejecutar:
```bash
npm run build
```

### 7. Servir la aplicación

Para ejecutar el servidor de desarrollo de Laravel, usa el siguiente comando:

```bash
php artisan serve
```

La aplicación estará disponible en `http://localhost:8000`.

---

## Características del Proyecto

1. **Gestión de Empresas:**
   - CRUD para empresas (Crear, Leer, Editar, Eliminar).
   - Búsqueda y filtrado de empresas por nombre, email y website.

2. **Gestión de Empleados:**
   - CRUD para empleados (Crear, Leer, Editar, Eliminar).
   - Búsqueda y filtrado de empleados por nombre, apellido, email y empresa.

3. **Interfaz Responsiva:**
   - Las tablas de empresas y empleados se muestran de forma responsiva,
     adaptándose a diferentes tamaños de pantalla (móviles, tablets,
     escritorios).
   - Paginación en ambas tablas para mejorar la navegación.

4. **Validación y Mensajes:**
   - Validación de formularios de creación y edición.
   - Mensajes claros para acciones exitosas y errores.
