<!DOCTYPE html>
<html>
<head>
    <style>
        footer {
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 20px;
            width: 100%;
            transition: background-color 0.5s ease;
            margin-top: auto;
        }
        footer:hover {
            background-color: rgba(0, 0, 0, 0.9);
        }
        .footer-content {
            display: flex;
            flex-wrap: wrap; /* Permitir que los elementos se envuelvan en pantallas pequeñas */
            justify-content: space-between;
        }
        .footer-section {
            flex: 1;
            margin-right: 20px;
        }
        .footer-section h3 {
            margin-bottom: 10px;
        }
        .footer-section a {
            color: #ffffff;
            text-decoration: none;
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .footer-section a:hover {
            text-decoration: underline;
        }
        .footer-bottom {
            margin-top: 20px;
            font-size: 0.8em;
            display: flex;
            flex-wrap: wrap; /* Permitir que los elementos se envuelvan en pantallas pequeñas */
            justify-content: space-between;
        }
        .legal-links {
            margin-top: 10px;
        }
        .legal-links a {
            margin-right: 10px;
            color: #007bff;
            text-decoration: none;
        }
        .legal-links a:hover {
            text-decoration: underline;
        }
        .footer-bottom p {
            margin-top: 10px;
        }
        .social img {
            width: 30px;
            height: auto;
            margin-right: 10px;
        }
        @media (max-width: 768px) {
            .footer-section {
                margin-right: 0;
                margin-bottom: 20px;
            }
            .footer-bottom {
                flex-direction: column;
                align-items: center;
            }
            .legal-links {
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>
<footer>
    <div class="footer-content">
        <div class="footer-section about">
            <h3>Sistema Jurídico</h3>
            <p><a href="#">Objetivos de Legal Vault</a></p>
            <p><a href="#">Noticias y eventos</a></p>
        </div>
        <div class="footer-section contact">
            <h3>CONTACTATE CON NOSOTROS</h3>
            <p><a href="#">Encontrar un concesionario</a></p>
            <p><a href="#">Consulta en línea</a></p>
        </div>
        <div class="footer-section social">
            <h3>Encuentranos en</h3>
            <a href="https://www.facebook.com/"><img src="../img/facebook.jpg" alt="Facebook"> Facebook</a>
            <a href="https://www.instagram.com/"><img src="../img/insta.jpg" alt="Instagram"> Instagram</a>
            <a href="https://www.youtube.com/"><img src="../img/youtube.png" alt="YouTube"> YouTube</a>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="legal-links">
            <a href="#">Privacidad & Legal</a>
            <a href="#">Legal Vault</a>
        </div>
        <p>Random Games</p>
    </div>
</footer>
</body>
</html>
