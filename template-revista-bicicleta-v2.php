<?php
/**
 * Template Name: Revista Bicicleta v2
 * Description: Template actualizado para Revista Bicicleta basado en diseño definitivo
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <style>
        /* Estilos para la cabecera (logo y menú) */
        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            flex-wrap: wrap;
        }

        .header-logo img {
            max-width: 350px;
            height: auto;
        }

        .header-menu a {
            margin-left: 15px;
            text-decoration: none;
            color: #000;
        }

        /* Media Query para pantallas pequeñas */
        @media (max-width: 768px) {
            .header-section {
                flex-direction: column;
                align-items: center;
            }

            .header-logo {
                margin-bottom: 20px;
            }

            .header-menu a {
                margin: 0 10px;
            }
        }

        /* Estilos para las entradas */
        .hoy-en-ckuri-section {
            padding: 40px 20px;
            background-color: #f9f9f9;
        }

        .section-title-dark {
            text-align: center;
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 40px;
            color: #333;
        }

        .articles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .article-item {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 600px; /* Altura aumentada para más espacio */
        }

        .article-item:hover {
            transform: translateY(-5px);
        }

        .article-image {
            height: 280px; /* Altura aumentada para imágenes más grandes */
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f5f5f5;
            padding: 10px;
            flex-shrink: 0;
        }

        .article-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px;
        }

        .article-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            justify-content: space-between;
            min-height: 0; /* Permite que el contenido se ajuste */
        }

        .article-content h3 {
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: #333;
            line-height: 1.4;
            flex-shrink: 0; /* El título no se encoge */
        }

        .article-content h3 a {
            text-decoration: none;
            color: inherit;
        }

        .article-content h3 a:hover {
            color: #674ea7;
        }

        .article-subtitle {
            color: #674ea7;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 0.9rem;
            text-transform: uppercase;
            flex-shrink: 0;
        }

        .article-description {
            color: #666;
            margin-bottom: 15px;
            line-height: 1.5;
            flex-grow: 1; /* Ocupa el espacio disponible */
            overflow: hidden;
        }

        .article-meta {
            color: #999;
            font-size: 0.9rem;
            margin-bottom: 15px;
            flex-shrink: 0; /* La fecha no se encoge */
            white-space: nowrap; /* Evita que se corte */
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .btn-leer-mas {
            display: inline-block;
            background: #f39c12;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background 0.3s ease;
            align-self: flex-start; /* Se alinea al inicio */
            flex-shrink: 0; /* El botón no se encoge */
        }

        .btn-leer-mas:hover {
            background: #e67e22;
        }

        .no-posts {
            text-align: center;
            padding: 40px;
            color: #666;
        }
    </style>
</head>
<body <?php body_class(); ?>>

<style>
    .hero-section-v2 {
        background: var(--revista-salmon);
        padding: 0;
        min-height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .hero-section-v2 .container {
        width: 100%;
        height: 100%;
    }

    .hero-section-v2 img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
</style>

<main id="main" class="site-main revista-bicicleta-v2-template">
     <section class="header-section">
        <div class="header-logo">
           <img src="https://revistabicicleta.cl/wp-content/themes/twentytwentyfive/assets/images/logo.png"/>
        </div>
        <div class="header-menu">
                <a href="#inicio" onclick="scrollToSection('hero-section-v2')">Inicio</a>
                <a href="#quienes-somos" onclick="showQuienesSomos()">Quienes Somos</a>
                <a href="#articulos" onclick="scrollToSection('hoy-en-ckuri-section')">Artículos</a>
                <a href="#revista" onclick="showEdiciones()">Revista</a>
                <a href="#contacto" onclick="scrollToSection('revista-footer')">Contacto</a>
            </div>
    </section>
    <!-- Hero Section -->
    <section class="hero-section-v2" id="hero-section-v2">
        <div class="container">
            <img src="https://revistabicicleta.cl/wp-content/themes/twentytwentyfive/assets/images/BANNER.png"/>
        </div>
    </section>

    <!-- Ediciones Anteriores Header -->
    <!--<section class="ediciones-header">
        <div class="container">
            <h2 class="section-title-gray">Ediciones Anteriores</h2>
            <div class="section-divider"></div>
        </div>
    </section>-->

    <!-- HOY EN CKURI Section con entradas dinámicas -->
    <section class="hoy-en-ckuri-section" id="hoy-en-ckuri-section">
        <div class="container">
            <h2 class="section-title-dark">HOY EN BICICLETA</h2>
            <div class="articles-grid">
                <?php
                // Query para obtener las entradas más recientes
                $recent_posts = new WP_Query(array(
                    'posts_per_page' => 6, // Número de entradas a mostrar
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));

                if ($recent_posts->have_posts()) :
                    while ($recent_posts->have_posts()) : $recent_posts->the_post();
                ?>
                <article class="article-item">
                    <div class="article-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium_large', array('alt' => get_the_title())); ?>
                            </a>
                        <?php else : ?>
                            <!-- Imagen por defecto si no tiene imagen destacada -->
                            <a href="<?php the_permalink(); ?>">
                                <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjI1MCIgdmlld0JveD0iMCAwIDQwMCAyNTAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iMjUwIiBmaWxsPSIjNjc0ZWE3Ii8+Cjx0ZXh0IHg9IjIwMCIgeT0iMTI1IiBmaWxsPSJ3aGl0ZSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZm9udC1mYW1pbHk9IkFyaWFsIiBmb250LXNpemU9IjE2Ij5SZXZpc3RhIEJpY2ljbGV0YTwvdGV4dD4KPC9zdmc+" alt="<?php the_title(); ?>">
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="article-content">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        
                        <?php 
                        // Mostrar excerpt o resumen
                        if (has_excerpt()) : 
                        ?>
                            <p class="article-description"><?php the_excerpt(); ?></p>
                        <?php else : ?>
                            <p class="article-description"><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></p>
                        <?php endif; ?>
                        
                        <a href="<?php the_permalink(); ?>" class="btn-leer-mas">Leer más</a>
                    </div>
                </article>
                <?php 
                    endwhile;
                    wp_reset_postdata();
                else : 
                ?>
                <div class="no-posts">
                    <p>No hay entradas publicadas todavía.</p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Revista Bicicleta Info Section -->
    <section class="revista-info-section">
        <div class="container">
            <div class="revista-info-content">
                <div class="revista-text">
                    <h2 class="revista-title">Revista Bicicleta</h2>
                    <p class="revista-subtitle">Contenidos culturales, creativos y entretenidos para niños y niñas</p>
                    <div class="revista-description">
                        <p>Un proyecto editorial que conecta con las nuevas generaciones en un entorno digital dinámico, ofreciendo un espacio de encuentro entre lo educativo, lo lúdico y lo cultural.</p>
                    </div>
                </div>
                <div class="revista-magazine">
                    <img src="https://revistabicicleta.cl/wp-content/uploads/2025/09/Bicicleta-edicion-03-imagenes-0-scaled.jpg" alt="Revista Bicicleta - Patrimonio" style="width: 100%; height: auto; max-width: 400px; border-radius: 10px; box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);">
                </div>
            </div>
        </div>
    </section>

    <!-- HOY EN CKURI - Ediciones Anteriores -->
    <section class="ediciones-anteriores-section" id="ediciones-section">
        <div class="container">
            <div class="section-headers">
                <h2 class="section-title-center" id="section-title">Ediciones Anteriores</h2>
            </div>
            
            <!-- Contenido de Ediciones Anteriores (por defecto visible) -->
            <div id="ediciones-content">
                <div class="revistas-grid-v2">
                    <!-- Revista 1 -->
                    <div class="revista-card">
                        <div class="revista-cover-small-v2">
                            <img src="https://revistabicicleta.cl/wp-content/uploads/2025/09/portada-ib.jpg" alt="Revista Bicicleta N°1 - Aventuras y Descubrimientos" style="width: 100%; height: auto; object-fit: contain; border-radius: 8px;">
                        </div>
                    </div>

                    <!-- Revista 2 -->
                    <div class="revista-card">
                        <div class="revista-cover-small-v2">
                            <img src="https://revistabicicleta.cl/wp-content/uploads/2025/09/Portada.jpg" alt="Revista Bicicleta N°2 - Naturaleza y Medio Ambiente" style="width: 100%; height: auto; object-fit: contain; border-radius: 8px;">
                        </div>
                    </div>

                    <!-- Revista 3 -->
                    <div class="revista-card">
                        <div class="revista-cover-small-v2">
                            <img src="https://revistabicicleta.cl/wp-content/uploads/2025/09/Bicicleta-edicion-03-imagenes-0-scaled.jpg" alt="Revista Bicicleta N°3 - Ciencia y Tecnología" style="width: 100%; height: auto; object-fit: contain; border-radius: 8px;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenido de Quienes Somos (inicialmente oculto) -->
            <div id="quienes-somos-content" style="display: none;">
                <div class="quienes-somos-text">
                    <p><strong>Revista Bicicleta</strong> es un proyecto editorial dedicado a promover contenidos culturales, creativos y entretenidos pensados especialmente para niños y niñas. Este proyecto adjudicado por el Fondo del Libro y la Lectura 2024, desarrolla temáticas actuales y transversales desde una mirada cercana, amigable y accesible, utilizando diversos estilos narrativos orientados a la infancia.</p>
                    
                    <p>Nuestra propuesta busca conectar con las nuevas generaciones que crecen y aprenden en un entorno digital dinámico y en constante cambio. En un contexto donde lo impreso ha cedido espacio frente a los formatos digitales, Revista Bicicleta responde a los cambios en los hábitos de lectura, el acceso a la información y el consumo de contenidos de niños y niñas, ofreciendo un espacio de encuentro entre lo educativo, lo lúdico y lo cultural.</p>
                    
                    <p>El proyecto es liderado por <strong>Fernanda Stumptner</strong> como Editora General y Directora de Editorial Hamelín Books. Es Ingeniera Comercial de la Universidad Católica del Norte y Periodista de la Universidad Gabriela Mistral. Posee especializaciones en Gestión Editorial y un Máster en Escritura Creativa por la Universidad de Salamanca. Su pasión por la literatura infantil la ha llevado a publicar libros que abordan temas como la minería, la inclusión, el patrimonio y la adopción animal, entre ellos: "Yo Aprendo Minería", "Las Señas de Gaspar"</p>
                </div>
            </div>
        </div>
    </section>

    <style>
            .quienes-somos-text {
                max-width: 800px;
                margin: 0 auto;
                padding: 40px 20px;
                text-align: left;
                line-height: 1.8;
            }

            .quienes-somos-text p {
                margin-bottom: 20px;
                font-size: 1.1rem;
                color: #333;
            }

            .quienes-somos-text strong {
                color: #674ea7;
            }

            .revistas-grid-v2 {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
                gap: 30px;
                padding: 40px 20px;
                max-width: 1400px;
                margin: 0 auto;
            }
            
            .revista-card {
                background: white;
                border-radius: 15px;
                padding: 40px;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 500px;
                width: 100%;
            }
            
            .revista-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
            }
            
            .revista-cover-small-v2 {
                width: 100%;
                max-width: 350px;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            
            @media (max-width: 768px) {
                .revistas-grid-v2 {
                    grid-template-columns: 1fr;
                    gap: 20px;
                    padding: 20px 10px;
                }
                
                .revista-card {
                    padding: 30px;
                    min-height: 400px;
                }
                
                .revista-cover-small-v2 {
                    max-width: 280px;
                }
            }
            
            @media (max-width: 480px) {
                .revista-card {
                    padding: 20px;
                    min-height: 350px;
                }
                
                .revista-cover-small-v2 {
                    max-width: 250px;
                }
            }
            </style>
        </div>
    </section>

    <!-- Patrocinadores Section -->
    <section class="patrocinadores-section">
        <div class="container">
            <h2 class="patrocinadores-title">Patrocinadores</h2>
            <div class="patrocinadores-carousel">
                <div class="patrocinadores-track">
                    <div class="patrocinador-item">
                        <img src="https://revistabicicleta.cl/wp-content/uploads/2025/09/6-1.jpg" alt="CFT CENCO">
                    </div>
                    <div class="patrocinador-item">
                        <img src="https://revistabicicleta.cl/wp-content/uploads/2025/09/5-1.jpg" alt="Biblioteca Municipal Mariano Latorre">
                    </div>
                    <div class="patrocinador-item">
                        <img src="https://revistabicicleta.cl/wp-content/uploads/2025/09/4-1.jpg" alt="Universidad de Antofagasta C-TyS">
                    </div>
                    <div class="patrocinador-item">
                        <img src="https://revistabicicleta.cl/wp-content/uploads/2025/09/3-1.jpg" alt="Biblioteca Regional de Antofagasta">
                    </div>
                    <div class="patrocinador-item">
                        <img src="https://revistabicicleta.cl/wp-content/uploads/2025/09/2-1.jpg" alt="Ministerio de las Culturas">
                    </div>
                    <div class="patrocinador-item">
                        <img src="https://revistabicicleta.cl/wp-content/uploads/2025/09/1-1.jpg" alt="Liceo Experimental Artístico Antofagasta">
                    </div>
                    <!-- Duplicamos los logos para efecto continuo -->
                    <div class="patrocinador-item">
                        <img src="https://revistabicicleta.cl/wp-content/uploads/2025/09/6-1.jpg" alt="CFT CENCO">
                    </div>
                    <div class="patrocinador-item">
                        <img src="https://revistabicicleta.cl/wp-content/uploads/2025/09/5-1.jpg" alt="Biblioteca Municipal Mariano Latorre">
                    </div>
                    <div class="patrocinador-item">
                        <img src="https://revistabicicleta.cl/wp-content/uploads/2025/09/4-1.jpg" alt="Universidad de Antofagasta C-TyS">
                    </div>
                    <div class="patrocinador-item">
                        <img src="https://revistabicicleta.cl/wp-content/uploads/2025/09/3-1.jpg" alt="Biblioteca Regional de Antofagasta">
                    </div>
                    <div class="patrocinador-item">
                        <img src="https://revistabicicleta.cl/wp-content/uploads/2025/09/2-1.jpg" alt="Ministerio de las Culturas">
                    </div>
                    <div class="patrocinador-item">
                        <img src="https://revistabicicleta.cl/wp-content/uploads/2025/09/1-1.jpg" alt="Liceo Experimental Artístico Antofagasta">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
    .patrocinadores-section {
        background: #ffffff;
        padding: 60px 0;
        overflow: hidden;
    }

    .patrocinadores-title {
        text-align: center;
        color: #333333;
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 40px;
    }

    .patrocinadores-carousel {
        overflow: hidden;
        white-space: nowrap;
        position: relative;
    }

    .patrocinadores-track {
        display: inline-flex;
        animation: scroll 30s linear infinite;
        gap: 40px;
    }

    .patrocinador-item {
        flex-shrink: 0;
        width: 200px;
        height: 120px;
        background: black;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .patrocinador-item:hover {
        transform: scale(1.05);
        animation-play-state: paused;
    }

    .patrocinador-item img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        filter: brightness(1.1);
    }

    @keyframes scroll {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-50%);
        }
    }

    /* Pausar animación al hacer hover sobre el carrusel */
    .patrocinadores-carousel:hover .patrocinadores-track {
        animation-play-state: paused;
    }

    @media (max-width: 768px) {
        .patrocinador-item {
            width: 150px;
            height: 90px;
            padding: 15px;
        }
        
        .patrocinadores-track {
            gap: 20px;
        }
        
        .patrocinadores-title {
            font-size: 2rem;
        }
    }
    </style>

</main>

<!-- Footer personalizado -->
<footer class="revista-footer" id="revista-footer">
    <div class="container">
        <div class="footer-content-horizontal">
            <div class="contact-section">
                <h4>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" style="vertical-align: middle; margin-right: 8px;">
                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                    </svg>
                    Email
                </h4>
                <p><a href="mailto:contacto@revistabicicleta.cl">contacto@revistabicicleta.cl</a></p>
                <p><a href="mailto:ediciongeneral@revistabicicleta.cl">ediciongeneral@revistabicicleta.cl</a></p>
            </div>
            
            <div class="contact-section">
                <h4>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" style="vertical-align: middle; margin-right: 8px;">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893A11.821 11.821 0 0020.893 3.488"/>
                    </svg>
                    WhatsApp
                </h4>
                <p><a href="https://wa.me/56995048358">+56 9 95048358</a></p>
            </div>
            
            <div class="contact-section">
                <h4>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" style="vertical-align: middle; margin-right: 8px;">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                    Instagram
                </h4>
                <p><a href="https://instagram.com/revistabicicletachile" target="_blank">@revistabicicletachile</a></p>
                <p><a href="https://instagram.com/hamelinbooks" target="_blank">@hamelinbooks</a></p>
            </div>
        </div>
        
        <div class="footer-credits">
            <p>Desarrollado por Revista Bicicleta 2025</p>
        </div>
    </div>
    
    <style>
    .revista-footer {
        background: #4CAF50;
        color: white;
        padding: 40px 0;
        text-align: center;
    }
    
    .footer-content-horizontal {
        display: flex;
        justify-content: space-around;
        align-items: flex-start;
        max-width: 1000px;
        margin: 0 auto;
        gap: 40px;
    }
    
    .contact-section {
        flex: 1;
        min-width: 200px;
    }
    
    .contact-section h4 {
        color: white;
        font-size: 1.2rem;
        margin-bottom: 15px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    
    .contact-section p {
        margin-bottom: 8px;
        line-height: 1.6;
    }
    
    .contact-section a {
        color: white;
        text-decoration: none;
        transition: opacity 0.3s ease;
        font-size: 0.95rem;
    }
    
    .contact-section a:hover {
        opacity: 0.8;
        text-decoration: underline;
    }
    
    .footer-credits {
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid rgba(255, 255, 255, 0.2);
        text-align: center;
    }
    
    .footer-credits p {
        margin: 0;
        font-size: 0.9rem;
        opacity: 0.8;
        font-style: italic;
    }
    
    @media (max-width: 768px) {
        .footer-content-horizontal {
            flex-direction: column;
            gap: 30px;
            text-align: center;
        }
        
        .contact-section {
            min-width: auto;
        }
    }
    </style>
</footer>

<?php wp_footer(); ?>

<script>
// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    const mainNav = document.querySelector('.main-nav');
    
    if (mobileToggle && mainNav) {
        mobileToggle.addEventListener('click', function() {
            mainNav.classList.toggle('active');
        });
    }
});

// Función para mostrar Quienes Somos
function showQuienesSomos() {
    document.getElementById('section-title').textContent = '¿Quiénes Somos?';
    document.getElementById('ediciones-content').style.display = 'none';
    document.getElementById('quienes-somos-content').style.display = 'block';
    
    // Scroll suave a la sección
    document.getElementById('ediciones-section').scrollIntoView({ 
        behavior: 'smooth' 
    });
}

// Función para mostrar Ediciones Anteriores
function showEdiciones() {
    document.getElementById('section-title').textContent = 'Ediciones Anteriores';
    document.getElementById('ediciones-content').style.display = 'block';
    document.getElementById('quienes-somos-content').style.display = 'none';
    
    // Scroll suave a la sección
    document.getElementById('ediciones-section').scrollIntoView({ 
        behavior: 'smooth' 
    });
}

// Función para hacer scroll a cualquier sección
function scrollToSection(sectionId) {
    const element = document.getElementById(sectionId);
    if (element) {
        element.scrollIntoView({ 
            behavior: 'smooth',
            block: 'start'
        });
    }
}
</script>

</body>
</html>

<?php
// Función fallback para el menú si no existe uno configurado
function revista_fallback_menu() {
    echo '<ul class="main-nav">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Inicio</a></li>';
    echo '<li><a href="#quienes-somos">Quienes Somos</a></li>';
    echo '<li><a href="#articulos">Artículos</a></li>';
    echo '<li><a href="#revista">Revista</a></li>';
    echo '<li><a href="#contacto">Contacto</a></li>';
    echo '</ul>';
}
?>
