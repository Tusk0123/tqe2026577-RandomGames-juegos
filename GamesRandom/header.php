<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bienvenido a la tienda de juegos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        header {
            background-color: #000; /* Fondo negro */
            color: white;
            padding: 20px;
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            transition: all 0.3s ease-in-out;
        }
        header img.logo {
            height: 50px;
            margin-right: 20px;
        }
        header h1 {
            font-size: 2rem;
            margin: 0;
            font-weight: 700;
            text-align: center;
            flex: 1;
        }
        header nav {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }
        header nav a {
            color: white;
            margin-left: 20px;
            text-decoration: none;
            font-size: 1.2rem;
            transition: color 0.3s ease-in-out;
        }
        header nav a:hover {
            color: #e0bb16; /* Texto dorado al pasar el mouse */
        }
        main {
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        /* Menú sándwich */
        .menu-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            header {
                padding: 10px;
                flex-direction: column;
                align-items: center;
            }
            header img.logo {
                height: 40px;
                margin-right: 0;
                margin-bottom: 10px;
            }
            header h1 {
                font-size: 1.5rem;
            }
            header nav {
                display: none; /* Esconder menú de navegación */
                flex-direction: column;
                width: 100%;
                text-align: center;
            }
            header nav a {
                font-size: 1rem;
                margin-left: 0;
                margin-bottom: 10px;
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
    <img src="imagenes/Multimedia.png" alt="Logo" class="logo">
    <h1>Bienvenido a la tienda de juegos</h1>
    <span class="menu-toggle">&#9776;</span> <!-- Ícono de menú sándwich -->
    <nav>
        <a href="index.php">Inicio</a>
        
        <a href="juegos_fisicos.php">Juegos</a>
        <a href="login.php">Iniciar sesión</a>
        <a href="logout.php">Cerrar sesión</a>
    </nav>
</header>

<script>
    // Manejo del clic en el menú sándwich
    const menuToggle = document.querySelector('.menu-toggle');
    menuToggle.addEventListener('click', () => {
        menuToggle.classList.toggle('active');
    });
</script>

</body>
</html>
