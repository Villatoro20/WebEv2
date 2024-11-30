# Halcon App

Halcon App es una aplicación web diseñada para automatizar los procesos internos de la distribuidora de materiales de construcción "Halcon". La aplicación permite gestionar usuarios, pedidos y estados de órdenes, mejorando la eficiencia en el manejo de las operaciones del negocio.

## **Características principales**

1. **Gestión de usuarios**:
   - Registro de usuarios con asignación de roles (ventas, compras, almacén, ruta).
   - Edición de datos de usuarios, cambio de roles y posibilidad de desactivarlos.
   - Listado general de usuarios activos e inactivos.

2. **Gestión de pedidos**:
   - Creación de pedidos con campos como número de factura, cliente, datos fiscales, dirección de entrega y notas adicionales.
   - Actualización de pedidos con cambios de estado según el flujo del negocio:
     - **Ordered**: Pedido creado por ventas.
     - **In process**: Preparación de materiales.
     - **In route**: En distribución.
     - **Delivered**: Pedido entregado (con evidencia fotográfica).
   - Búsqueda de pedidos por número de factura, cliente, fecha o estado.
   - Eliminación lógica y recuperación de pedidos.

3. **Consultas para usuarios no registrados**:
   - Pantalla inicial que permite a los clientes buscar su pedido por número de factura.
   - Visualización del estado del pedido, junto con evidencia fotográfica si el pedido está "Entregado".

4. **Protección de vistas**:
   - Las vistas administrativas solo están disponibles para usuarios registrados.
   - Las funcionalidades están protegidas según los roles asignados.

5. **Diseño y notificaciones**:
   - Uso de Bootstrap para un diseño atractivo y responsivo.
   - Implementación de notificaciones dinámicas con Toastr.

---

## **Requisitos del sistema**

- PHP >= 8.0
- Laravel 9
- Composer
- MySQL o cualquier base de datos compatible
- Node.js y npm (opcional, para manejar paquetes frontend como Toastr y Bootstrap)

---

## **Instalación**

1. Clona el repositorio:
   ```bash
   git clone https://github.com/tu-usuario/halcon-app.git
   cd halcon-app
# Flujo del Proyecto

## **Evidencia 1**
Se desarrolló el modelo inicial del proyecto:

- Creación de **modelos**, **migraciones** y **controladores**.
- Configuración de **relaciones** entre entidades:
  - Usuarios y roles.
  - Pedidos y estados.
  - Pedidos y evidencias fotográficas.
- Generación de datos de prueba utilizando **seeders** y **factories**.

---

## **Evidencia 2**
Se implementó la lógica básica del proyecto:

- Creación de las **vistas iniciales**:
  - Pantalla de inicio para usuarios no registrados.
  - Dashboard para usuarios registrados.
- Desarrollo de la funcionalidad **CRUD** para usuarios y pedidos.
- Protección de vistas utilizando el middleware **auth**.

---

## **Evidencia 3**
Se completaron las vistas funcionales y su diseño:

- Uso de **Blade** para generar vistas atractivas y reutilizables.
- Implementación de **Bootstrap** para un diseño responsivo.
- Configuración de **alertas** y **notificaciones dinámicas** con Toastr.
- Protección adicional de rutas según roles y autenticación.
- Actualización de las funcionalidades de las vistas:
  - Creación, edición y eliminación lógica de pedidos.
  - Carga de fotografías de evidencia para los estados "En ruta" y "Entregado".
  - Visualización de pedidos archivados y posibilidad de restaurarlos.

---

## **Actualizaciones recientes**
- **Vistas finalizadas**: Todas las vistas están funcionales y cuentan con un diseño atractivo.
- **Notificaciones implementadas**: Las acciones del sistema (creación, actualización, errores) ahora muestran alertas dinámicas con Toastr.
- **Documentación actualizada**: Se añadió esta descripción completa al archivo `README.md`.

---

## **Uso**

### **Acceso público**
- Los usuarios no registrados pueden acceder a la pantalla de búsqueda de pedidos ingresando el número de factura.
- Visualización del estado del pedido:
  - Si está "En proceso", se muestra la fecha.
  - Si está "Entregado", se muestra la evidencia fotográfica.

### **Acceso administrativo**
- Los usuarios registrados tienen acceso al Dashboard, con opciones según su rol:
  - **Ventas**: Crear pedidos.
  - **Almacén**: Cambiar estados a "En proceso" o "En ruta".
  - **Ruta**: Cargar fotografías de evidencias.
  - **Compras**: Visualizar pedidos que necesitan materiales externos.
