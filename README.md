# Prueba Técnica PHP - Stiwar Julian Marin Ospina

Este proyecto es una prueba técnica que implementa la gestión de usuarios en PHP utilizando PHPUnit para las pruebas. Incluye la implementación de una clase `User`, un repositorio `UserRepository`, y casos de uso para manejar la creación y obtención de usuarios.

## Estructura del Proyecto

- **src/**: Contiene el código fuente del proyecto.
  - **User.php**: Implementación de la clase `User`.
  - **UserRepository.php**: Implementación de la interfaz y repositorio para gestionar usuarios.
  - **CreateUser.php**: Caso de uso para crear un nuevo usuario.
  - **UserGetById.php**: Caso de uso para obtener un usuario por ID.
  - **Exceptions/**: Contiene excepciones personalizadas.
    - **UserDoesNotExistException.php**: Excepción para manejar casos donde el usuario no existe.
- **tests/**: Contiene las pruebas del proyecto.
  - **UserTest.php**: Pruebas unitarias para la clase `User`.
  - **CreateUserTest.php**: Pruebas unitarias para el caso de uso `CreateUser`.
  - **UserGetByIdTest.php**: Pruebas unitarias para el caso de uso `UserGetById`.
- **composer.json**: Archivo de configuración para Composer que incluye las dependencias necesarias.

## Requisitos

- PHP 7.4 o superior
- Composer
- PHPUnit

## Instalación

1. **Clona el repositorio**:

   ```bash
   git clone https://github.com/StiwarJulian/prueba-tecnica-php-StiwarJulianMarinOspina.git
   cd prueba-tecnica-php-tunombre

2. **Instala las dependencias**:

   ```bash
   composer install
   ```
## Uso
Para ejecutar las pruebas unitarias con PHPUnit, utiliza el siguiente comando:

   ```bash
   vendor/bin/phpunit
   ```

Este comando ejecutará todas las pruebas en el directorio tests y mostrará los resultados en la consola.

## Casos de Uso
### Crear un Usuario

El caso de uso **CreateUser** se encarga de crear un nuevo usuario en el sistema. Para utilizar este caso de uso, debes instanciarlo junto con el repositorio de usuarios y luego llamar al método `execute` con los datos del nuevo usuario.

#### Ejemplo de uso:

```php
use App\User;
use App\UseCases\CreateUser;
use App\Repositories\UserRepository;

// Crear una instancia del repositorio de usuarios
$userRepository = new UserRepository();

// Crear una instancia del caso de uso CreateUser
$createUser = new CreateUser($userRepository);

// Ejecutar el caso de uso para crear un nuevo usuario
$user = $createUser->execute('John Doe', 'john@example.com', 'password123'); 
```

### Obtener un Usuario por ID

El caso de uso **UserGetById** se encarga de obtener un usuario existente en el sistema utilizando su ID. Para utilizar este caso de uso, debes instanciarlo junto con el repositorio de usuarios y luego llamar al método `execute` con el ID del usuario que deseas obtener.

#### Ejemplo de uso:

```php
use App\User;
use App\UseCases\UserGetById;
use App\Repositories\UserRepository;

// Crear una instancia del repositorio de usuarios
$userRepository = new UserRepository();

// Crear una instancia del caso de uso UserGetById
$userGetById = new UserGetById($userRepository);

// Ejecutar el caso de uso para obtener un usuario por ID
$user = $userGetById->execute(1); 
```
### Explicación de las Secciones

1. **Descripción del Proyecto**: Proporciona una visión general del proyecto y su propósito.
2. **Estructura del Proyecto**: Detalla la organización de los archivos y carpetas.
3. **Requisitos**: Lista los requisitos necesarios para ejecutar el proyecto.
4. **Instalación**: Explica cómo clonar el repositorio e instalar las dependencias.
5. **Uso**: Instrucciones para ejecutar las pruebas unitarias.
6. **Casos de Uso**: Ejemplos de cómo usar los casos de uso `CreateUser` y `UserGetById`.

Este `README.md` proporciona una visión clara y completa de tu proyecto, cómo configurarlo, y cómo usar y probar la funcionalidad implementada. Ajusta cualquier detalle específico según las necesidades de tu proyecto.