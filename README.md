# Halcon - Sistema de Gestión de Pedidos

Este proyecto es una aplicación web desarrollada con Laravel para automatizar los procesos internos de la distribuidora de materiales de construcción "Halcon". La aplicación permite gestionar pedidos, usuarios, roles y realizar un seguimiento del estado de los pedidos, incluyendo la posibilidad de cargar y visualizar fotografías como evidencia de entregas.

## Características Principales

1. **Gestión de Pedidos**:
   - Crear, actualizar y eliminar pedidos (lógica de eliminación).
   - Seguimiento del estado de los pedidos: Ordenado, En proceso, En ruta, Entregado.
   - Carga de fotografías como evidencia durante el proceso de entrega.
   - Búsqueda de pedidos por número de factura, número de cliente, fecha y estado.
   - Restauración de pedidos eliminados lógicamente.

2. **Gestión de Usuarios y Roles**:
   - Usuarios categorizados por roles: Ventas, Compras, Almacén, Ruta.
   - Creación, edición y desactivación de usuarios.
   - Roles definidos para asegurar que los usuarios solo accedan a las funciones asignadas a su departamento.

3. **Gestión de Clientes**:
   - Creación y edición de clientes con datos fiscales.
   - Búsqueda de clientes registrados.

4. **Fotos de Evidencia**:
   - Opción para que los empleados del departamento de Ruta carguen fotografías al iniciar y finalizar la entrega de un pedido.

## Requisitos del Sistema

- PHP >= 7.4
- Composer
- Laravel >= 8.x
- MySQL o cualquier otra base de datos compatible con Laravel

## Instalación

Sigue estos pasos para instalar y configurar el proyecto en tu entorno local:

1. **Clonar el repositorio**:
   ```bash
   git clone https://github.com/TuUsuario/halcon-laravel.git
## Uso del Sistema

### Usuarios sin registro
- Los usuarios pueden buscar el estado de un pedido utilizando su número de cliente y el número de factura.
- Si el pedido ha sido entregado, se mostrará la fotografía de la entrega como evidencia.

### Usuarios registrados
- Acceso a un **dashboard** con enlaces a la gestión de pedidos, usuarios y otras funcionalidades según el rol asignado.
- Los usuarios pueden crear, modificar o eliminar pedidos según su rol dentro de la empresa.

## Estructura del Proyecto

- **Models**: Definidos para gestionar la lógica de los datos de la aplicación, como `Cliente`, `Pedido`, `Usuario`, `Rol`, etc.
- **Controllers**: Manejan las peticiones HTTP y coordinan las operaciones entre los modelos y las vistas.
- **Migrations**: Estructuran las tablas de la base de datos, incluyendo claves foráneas y eliminaciones en cascada.
- **Seeders**: Pueblan la base de datos con datos iniciales para testing.
- **Factories**: Generan datos ficticios para pruebas.

## Migraciones y Seeders

Se han definido migraciones para cada tabla y seeders para poblar la base de datos con datos iniciales. Asegúrate de ejecutar:

```bash
php artisan migrate --seed
