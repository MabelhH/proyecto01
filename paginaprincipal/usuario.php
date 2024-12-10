<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de hotel</title>
    <link rel="stylesheet" href="index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.min.js"></script>

</head>
<body>
    <div class="container">
        <header>
            <nav class="navbar">
                <div class="logo-container">
                    <img class="logo" src="/imagen/logo.png" alt="Logo de Blue Hotel">
                    <span class="online">Blue Hotel</span>
                </div>
                <ul class="menu">
                    <li><a href="/paginaprincipal/index.html">Nosotros</a></li>
                    <li><a href="/reserva/reserva.html">Registro</a></li>
                    <li><a href="/contactos/contactos.html">Contáctanos</a></li>
                </ul>
                <div class="buscador">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
                    <button class="btn btn-outline" type="submit">Buscar</button>
                </div>
                <div class="auth-buttons">
                    <a href="/iniciarsesion/usuarios.html" class="login">Inicia Sesión</a>
                    <a href="/cerrarsesion/cerrar.php" class="cerrarsesion">Cerrar Sesión</a>
                </div>
            </nav>
        </header>           
        <div class="carrucel">
            <div class="gallery js-flickity"
                data-flickity-options='{"wrapAround": true, "autoPlay": 3000, "pauseAutoPlayOnHover": true}'>
                <div class="gallery-cell">
                    <img src="/imagen/imagen1.webp" alt="Imagen 1">
                </div>
                <div class="gallery-cell">
                    <img src="/imagen/imagen2.jpg" alt="Imagen 2">
                </div>
                <div class="gallery-cell">
                    <img src="/imagen/imagen3.jpg" alt="Imagen 3">
                </div>
                <div class="gallery-cell">
                    <img src="/imagen/imagen4.avif" alt="Imagen 4">
                </div>
            </div>
        </div>        
        </div>
        <section>
            <h1>SERVICIOS</h1>
            <div class="card-container">
                <div class="card">
                    <i class="bi bi-water"></i>
                    <div class="card-body">
                        <h3 class="card-title">Agua caliente y complementos de aseo.</h3>
                        <p class="card-description">Description for card 1.</p>
                    </div>
                </div>
                <div class="card">
                    <i class="bi bi-door-open-fill"></i>
                    <div class="card-body">
                        <h3 class="card-title">Entrega de la correspondencia a la habitación</h3>
                    </div>
                </div>
                <div class="card">
                    <i class="bi bi-webcam"></i>
                    <div class="card-body">
                        <h3 class="card-title">Seguridad 24/7</h3>           
                    </div>
                </div>
                <div class="card">
                    <i class="bi bi-wifi" ></i>
                    <div class="card-body">
                        <h3 class="card-title">Conexión wifi-gratuita</h3>
                    </div>
                </div>
                <div class="card">
                    <i class="bi bi-shop-window"></i>
                    <div class="card-body">
                        <h3 class="card-title">Espacios recreativos</h3>
                        <p class="card-description">Description for card 5.</p>
                    </div>
                </div>
                <div class="card">
                    <i class="bi bi-trash3"></i>
                    <div class="card-body">
                        <h3 class="card-title">Limpieza diaria de habitaciones</h3>
                    </div>
                </div>
                <div class="card">
                    <i class="bi bi-egg-fried"></i>
                    <div class="card-body">
                        <h3 class="card-title">Desayuno incluido</h3>
                    </div>
                </div>
                <div class="card">
                    <i class="bi bi-car-front"></i>
                    <div class="card-body">
                        <h3 class="card-title">Playa de Estacionamiento</h3>
                    </div>
                </div>
            </div>
        </section>    
        <section>
            <h1>Te Presentamos todas nuestras habitaciones</h1>
            <div class="card-container">
                <?php include '../paginaprincipal/index.php'; ?>
            </div>
        </section>   
        <footer class="footer">
            <div class="footer-info">
                <h3>Casona Plaza Hotel Colonial</h3>
                <p>Dirección: C. Álvarez Thomas 435, Arequipa 04001</p>
                <p>Teléfono: 054214659</p>
                <p>Email: casonaplazahoteles.com/</p>
                <p>Síguenos en redes sociales:</p>
                <a href="#" class="social-link">Facebook</a> | 
                <a href="#" class="social-link">Instagram</a> | 
                <a href="#" class="social-link">Twitter</a>
            </div>
            <div class="footer-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7654.834600677478!2d-71.54081872508841!3d-16.403619484325393!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91424a4ef62ff9f9%3A0x49cb5960579ca31e!2sCasona%20Plaza%20Hotel%20Colonial!5e0!3m2!1sen!2sus!4v1731979711928!5m2!1sen!2sus" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </footer>
    </div>
</body>
</html>
