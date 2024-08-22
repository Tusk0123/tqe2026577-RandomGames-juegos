<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <style>
        /* Estilos generales para el cuerpo */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        /* Estilos para el encabezado */
        header {
            background-color: #333; /* Color de fondo oscuro */
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Añadir sombra al header */
        }

        /* Estilo para el título */
        header h1 {
            font-size: 2.5rem;
            margin: 0;
            font-weight: 700;
            letter-spacing: 1px;
        }

        /* Estilo para el contenedor de navegación */
        nav {
            background-color: #444; /* Fondo oscuro para el menú de navegación */
            padding: 10px 0;
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        /* Estilo para los enlaces de navegación */
        nav a {
            color: #ffffff; /* Color de texto blanco */
            font-size: 1.2rem;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        /* Estilo cuando se pasa el cursor sobre los enlaces */
        nav a:hover {
            background-color: #555; /* Fondo más oscuro al pasar el mouse */
        }

        /* Botón de menú para pantallas pequeñas */
        .menu-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Estilo para pantallas pequeñas */
        @media (max-width: 768px) {
            header {
                padding: 10px;
            }

            header h1 {
                font-size: 2rem;
            }

            nav {
                flex-direction: column;
                display: none; /* Esconder menú de navegación por defecto */
            }

            nav a {
                font-size: 1.2rem;
                padding: 10px 0;
            }

            .menu-toggle {
                display: block; /* Mostrar ícono de menú */
            }
        }

        /* Mostrar el menú cuando se clickea el ícono de sándwich */
        .menu-toggle.active + nav {
            display: flex;
        }
    </style>
</head>
<body>
    <header>
        <h1>Panel de Administración</h1>
        <div class="menu-toggle">☰</div> <!-- Ícono de menú -->
    </header>
    <nav>
        <a href="juegos_fisicos.php">Juegos Físicos</a>
        <a href="crud_order.php">ordenes</a>
        <a href="juegos_fisicos.php">Juegos Físicos</a>
        <a href="juegos_fisicos.php">Juegos Físicos</a>

        <!-- Agrega aquí más enlaces a otros CRUDs según sea necesario -->
    </nav>

    <main>
        <!-- Contenido principal de la página -->
    </main>

    <script>
        // Script para alternar el menú en pantallas pequeñas
        const menuToggle = document.querySelector('.menu-toggle');
        const nav = document.querySelector('nav');

        menuToggle.addEventListener('click', () => {
            menuToggle.classList.toggle('active');
            nav.classList.toggle('active');
        });
    </script>
</body>
</html>
