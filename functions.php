<?php
/**
 * Twenty Twenty-Five functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

// Adds theme support for post formats.
if ( ! function_exists( 'twentytwentyfive_post_format_setup' ) ) :
	/**
	 * Adds theme support for post formats.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_post_format_setup() {
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
	}
endif;
add_action( 'after_setup_theme', 'twentytwentyfive_post_format_setup' );

// Enqueues editor-style.css in the editors.
if ( ! function_exists( 'twentytwentyfive_editor_style' ) ) :
	/**
	 * Enqueues editor-style.css in the editors.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_editor_style() {
		add_editor_style( 'assets/css/editor-style.css' );
	}
endif;
add_action( 'after_setup_theme', 'twentytwentyfive_editor_style' );

// Enqueues style.css on the front.
if ( ! function_exists( 'twentytwentyfive_enqueue_styles' ) ) :
	/**
	 * Enqueues style.css on the front.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_enqueue_styles() {
		wp_enqueue_style(
			'twentytwentyfive-style',
			get_parent_theme_file_uri( 'style.css' ),
			array(),
			wp_get_theme()->get( 'Version' )
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'twentytwentyfive_enqueue_styles' );

// Registers custom block styles.
if ( ! function_exists( 'twentytwentyfive_block_styles' ) ) :
	/**
	 * Registers custom block styles.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_block_styles() {
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'twentytwentyfive' ),
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_block_styles' );

// Registers pattern categories.
if ( ! function_exists( 'twentytwentyfive_pattern_categories' ) ) :
	/**
	 * Registers pattern categories.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_pattern_categories() {

		register_block_pattern_category(
			'twentytwentyfive_page',
			array(
				'label'       => __( 'Pages', 'twentytwentyfive' ),
				'description' => __( 'A collection of full page layouts.', 'twentytwentyfive' ),
			)
		);

		register_block_pattern_category(
			'twentytwentyfive_post-format',
			array(
				'label'       => __( 'Post formats', 'twentytwentyfive' ),
				'description' => __( 'A collection of post format patterns.', 'twentytwentyfive' ),
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_pattern_categories' );

// Registers block binding sources.
if ( ! function_exists( 'twentytwentyfive_register_block_bindings' ) ) :
	/**
	 * Registers the post format block binding source.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_register_block_bindings() {
		register_block_bindings_source(
			'twentytwentyfive/format',
			array(
				'label'              => _x( 'Post format name', 'Label for the block binding placeholder in the editor', 'twentytwentyfive' ),
				'get_value_callback' => 'twentytwentyfive_format_binding',
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_register_block_bindings' );

// Registers block binding callback function for the post format name.
if ( ! function_exists( 'twentytwentyfive_format_binding' ) ) :
	/**
	 * Callback function for the post format name block binding source.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return string|void Post format name, or nothing if the format is 'standard'.
	 */
	function twentytwentyfive_format_binding() {
		$post_format_slug = get_post_format();

		if ( $post_format_slug && 'standard' !== $post_format_slug ) {
			return get_post_format_string( $post_format_slug );
		}
	}
endif;




/**
 * Functions para Template Revista Bicicleta v2
 * Agregar estas funciones al functions.php del tema Twenty Twenty-Five
 */

// Cargar estilos del template Revista Bicicleta v2
function revista_bicicleta_v2_enqueue_styles() {
    // Solo cargar en páginas que usen el template v2
    if (is_page_template('template-revista-bicicleta-v2.php')) {
        wp_enqueue_style(
            'revista-bicicleta-v2-styles',
            get_template_directory_uri() . '/assets/css/revista-bicicleta-styles-v2.css',
            array(),
            '2.0.0'
        );
        
        // Cargar Google Fonts
        wp_enqueue_style(
            'revista-bicicleta-v2-fonts',
            'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap',
            array(),
            null
        );
    }
}
add_action('wp_enqueue_scripts', 'revista_bicicleta_v2_enqueue_styles');

// Agregar soporte para menús personalizados v2
function revista_bicicleta_v2_setup() {
    // Registrar menú de navegación principal
    register_nav_menus(array(
        'revista-primary-v2' => __('Menú Principal Revista v2', 'twentytwentyfive'),
    ));
}
add_action('after_setup_theme', 'revista_bicicleta_v2_setup');

// Personalizar el menú de navegación v2
function revista_bicicleta_v2_nav_menu() {
    $menu_items = array(
        'inicio' => array(
            'title' => 'Inicio',
            'url' => home_url('/'),
            'active' => is_front_page()
        ),
        'quienes-somos' => array(
            'title' => 'Quienes Somos',
            'url' => home_url('/quienes-somos/'),
            'active' => is_page('quienes-somos')
        ),
        'articulos' => array(
            'title' => 'Artículos',
            'url' => home_url('/articulos/'),
            'active' => is_page('articulos')
        ),
        'revista' => array(
            'title' => 'Revista',
            'url' => home_url('/revista/'),
            'active' => is_page('revista')
        ),
        'contacto' => array(
            'title' => 'Contacto',
            'url' => home_url('/contacto/'),
            'active' => is_page('contacto')
        )
    );
    
    return $menu_items;
}

// Shortcode para mostrar artículos de HOY EN CKURI
function revista_bicicleta_hoy_en_ckuri_shortcode($atts) {
    $atts = shortcode_atts(array(
        'cantidad' => 2,
        'categoria' => 'ckuri'
    ), $atts);
    
    ob_start();
    ?>
    <div class="articles-grid">
        <article class="article-item">
            <div class="article-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/festival-blues.jpg" alt="Festival de Blues">
            </div>
            <div class="article-content">
                <h3>El festival día del blues por blueseras chilenas llegará espacio fitz</h3>
                <a href="#" class="btn-leer-mas">Leer más</a>
            </div>
        </article>
        <article class="article-item">
            <div class="article-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/elevar-piel.jpg" alt="Elevar la piel">
            </div>
            <div class="article-content">
                <h3>Elevar la piel</h3>
                <p class="article-subtitle">GUILLERMO LEDEZMA</p>
                <p class="article-description">El desierto como memoria, Thomas Gallardo presenta su muestra "Reflejar la presencia"</p>
                <a href="#" class="btn-leer-mas">Leer más</a>
            </div>
        </article>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('hoy_en_ckuri', 'revista_bicicleta_hoy_en_ckuri_shortcode');

// Shortcode para mostrar las revistas v2
function revista_bicicleta_revistas_v2_shortcode($atts) {
    $atts = shortcode_atts(array(
        'cantidad' => 3,
        'tipo' => 'grid'
    ), $atts);
    
    $revistas = array(
        1 => array(
            'titulo' => 'Aventuras y Descubrimientos',
            'fecha' => 'Enero - Febrero 2024',
            'mes' => 'Enero 2024'
        ),
        2 => array(
            'titulo' => 'Naturaleza y Medio Ambiente',
            'fecha' => 'Marzo - Abril',
            'mes' => 'Marzo 2024'
        ),
        3 => array(
            'titulo' => 'Ciencia y Tecnología',
            'fecha' => 'Mayo - Junio',
            'mes' => 'Mayo 2024'
        )
    );
    
    ob_start();
    ?>
    <div class="revistas-grid-v2">
        <?php for ($i = 1; $i <= $atts['cantidad']; $i++) : 
            $revista = $revistas[$i];
        ?>
        <div class="revista-card">
            <div class="revista-header">
                <span class="revista-brand">REVISTA BICICLETA</span>
                <span class="revista-numero-circle"><?php echo $i; ?></span>
            </div>
            <div class="revista-cover-small-v2">
                <div class="cover-illustration-small"></div>
            </div>
            <div class="revista-info-v2">
                <h3><?php echo $revista['titulo']; ?></h3>
                <p class="revista-date"><?php echo $revista['fecha']; ?></p>
                <p class="revista-edition">Edición Digital</p>
                <h4>Revista Bicicleta N°<?php echo $i; ?> - <?php echo $revista['mes']; ?></h4>
                <a href="#" class="btn-leer-revista">Leer</a>
            </div>
        </div>
        <?php endfor; ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('revista_bicicleta_revistas_v2', 'revista_bicicleta_revistas_v2_shortcode');

// Shortcode para patrocinadores
function revista_bicicleta_patrocinadores_shortcode($atts) {
    $atts = shortcode_atts(array(
        'cantidad' => 3
    ), $atts);
    
    ob_start();
    ?>
    <div class="patrocinadores-grid">
        <?php for ($i = 1; $i <= $atts['cantidad']; $i++) : ?>
        <div class="patrocinador-placeholder">
            <p>Logo Patrocinador <?php echo $i; ?></p>
        </div>
        <?php endfor; ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('patrocinadores', 'revista_bicicleta_patrocinadores_shortcode');

// Agregar meta box para configuración de página v2
function revista_bicicleta_v2_add_meta_box() {
    add_meta_box(
        'revista-bicicleta-v2-config',
        'Configuración Revista Bicicleta v2',
        'revista_bicicleta_v2_meta_box_callback',
        'page'
    );
}
add_action('add_meta_boxes', 'revista_bicicleta_v2_add_meta_box');

function revista_bicicleta_v2_meta_box_callback($post) {
    wp_nonce_field('revista_bicicleta_v2_save_meta_box_data', 'revista_bicicleta_v2_meta_box_nonce');
    
    $hero_title = get_post_meta($post->ID, '_revista_v2_hero_title', true);
    $hero_subtitle = get_post_meta($post->ID, '_revista_v2_hero_subtitle', true);
    $mostrar_ckuri = get_post_meta($post->ID, '_revista_v2_mostrar_ckuri', true);
    $mostrar_patrocinadores = get_post_meta($post->ID, '_revista_v2_mostrar_patrocinadores', true);
    
    ?>
    <table class="form-table">
        <tr>
            <th scope="row">Título Hero</th>
            <td><input type="text" name="revista_v2_hero_title" value="<?php echo esc_attr($hero_title); ?>" class="regular-text" placeholder="Un pedaleo por tradiciones, historia y lugares que nos inspiran" /></td>
        </tr>
        <tr>
            <th scope="row">Subtítulo Revista</th>
            <td><input type="text" name="revista_v2_hero_subtitle" value="<?php echo esc_attr($hero_subtitle); ?>" class="regular-text" placeholder="Contenidos culturales, creativos y entretenidos para niños y niñas" /></td>
        </tr>
        <tr>
            <th scope="row">Mostrar sección HOY EN CKURI</th>
            <td>
                <label>
                    <input type="checkbox" name="revista_v2_mostrar_ckuri" value="1" <?php checked($mostrar_ckuri, '1'); ?> />
                    Mostrar artículos de HOY EN CKURI
                </label>
            </td>
        </tr>
        <tr>
            <th scope="row">Mostrar Patrocinadores</th>
            <td>
                <label>
                    <input type="checkbox" name="revista_v2_mostrar_patrocinadores" value="1" <?php checked($mostrar_patrocinadores, '1'); ?> />
                    Mostrar sección de patrocinadores
                </label>
            </td>
        </tr>
    </table>
    <?php
}

function revista_bicicleta_v2_save_meta_box_data($post_id) {
    if (!isset($_POST['revista_bicicleta_v2_meta_box_nonce'])) {
        return;
    }
    
    if (!wp_verify_nonce($_POST['revista_bicicleta_v2_meta_box_nonce'], 'revista_bicicleta_v2_save_meta_box_data')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return;
        }
    } else {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    }
    
    if (isset($_POST['revista_v2_hero_title'])) {
        update_post_meta($post_id, '_revista_v2_hero_title', sanitize_text_field($_POST['revista_v2_hero_title']));
    }
    
    if (isset($_POST['revista_v2_hero_subtitle'])) {
        update_post_meta($post_id, '_revista_v2_hero_subtitle', sanitize_text_field($_POST['revista_v2_hero_subtitle']));
    }
    
    update_post_meta($post_id, '_revista_v2_mostrar_ckuri', isset($_POST['revista_v2_mostrar_ckuri']) ? '1' : '0');
    update_post_meta($post_id, '_revista_v2_mostrar_patrocinadores', isset($_POST['revista_v2_mostrar_patrocinadores']) ? '1' : '0');
}
add_action('save_post', 'revista_bicicleta_v2_save_meta_box_data');

// Función helper para obtener datos personalizados v2
function get_revista_v2_data($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    
    return array(
        'hero_title' => get_post_meta($post_id, '_revista_v2_hero_title', true) ?: 'Un pedaleo por tradiciones, historia y lugares que nos inspiran',
        'hero_subtitle' => get_post_meta($post_id, '_revista_v2_hero_subtitle', true) ?: 'Contenidos culturales, creativos y entretenidos para niños y niñas',
        'mostrar_ckuri' => get_post_meta($post_id, '_revista_v2_mostrar_ckuri', true) === '1',
        'mostrar_patrocinadores' => get_post_meta($post_id, '_revista_v2_mostrar_patrocinadores', true) === '1'
    );
}

// Agregar clase CSS al body cuando se usa el template v2
function revista_bicicleta_v2_body_class($classes) {
    if (is_page_template('template-revista-bicicleta-v2.php')) {
        $classes[] = 'revista-bicicleta-v2-page';
    }
    return $classes;
}
add_filter('body_class', 'revista_bicicleta_v2_body_class');

// Personalizar el header para el template v2
function revista_bicicleta_v2_custom_header() {
    if (is_page_template('template-revista-bicicleta-v2.php')) {
        ?>
        <style>
            .wp-site-blocks .site-header {
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(10px);
                box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
                position: sticky;
                top: 0;
                z-index: 1000;
            }
            
            .site-header .wp-block-navigation ul {
                gap: 2rem;
            }
            
            .site-header .wp-block-navigation a {
                font-weight: 500;
                color: #2c3e50;
                transition: color 0.3s ease;
            }
            
            .site-header .wp-block-navigation a:hover {
                color: #e74c3c;
            }
        </style>
        <?php
    }
}
add_action('wp_head', 'revista_bicicleta_v2_custom_header');

// Función para generar el menú personalizado
function revista_bicicleta_v2_render_menu() {
    $menu_items = revista_bicicleta_v2_nav_menu();
    
    echo '<nav class="revista-nav-v2">';
    echo '<ul class="revista-menu-v2">';
    
    foreach ($menu_items as $key => $item) {
        $active_class = $item['active'] ? ' class="active"' : '';
        echo '<li' . $active_class . '>';
        echo '<a href="' . esc_url($item['url']) . '">' . esc_html($item['title']) . '</a>';
        echo '</li>';
    }
    
    echo '</ul>';
    echo '</nav>';
}

// Widget personalizado para información de la revista
class Revista_Bicicleta_V2_Widget extends WP_Widget {
    
    function __construct() {
        parent::__construct(
            'revista_bicicleta_v2_widget',
            __('Revista Bicicleta Info v2', 'twentytwentyfive'),
            array('description' => __('Muestra información sobre Revista Bicicleta', 'twentytwentyfive'))
        );
    }
    
    public function widget($args, $instance) {
        echo $args['before_widget'];
        
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        
        echo '<div class="revista-widget-content">';
        echo '<p>' . esc_html($instance['description']) . '</p>';
        echo '<a href="' . esc_url($instance['link']) . '" class="btn-widget">Ver más</a>';
        echo '</div>';
        
        echo $args['after_widget'];
    }
    
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Revista Bicicleta', 'twentytwentyfive');
        $description = !empty($instance['description']) ? $instance['description'] : '';
        $link = !empty($instance['link']) ? $instance['link'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Título:'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php _e('Descripción:'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>"><?php echo esc_attr($description); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('link')); ?>"><?php _e('Enlace:'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link')); ?>" name="<?php echo esc_attr($this->get_field_name('link')); ?>" type="url" value="<?php echo esc_attr($link); ?>">
        </p>
        <?php
    }
    
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['description'] = (!empty($new_instance['description'])) ? sanitize_textarea_field($new_instance['description']) : '';
        $instance['link'] = (!empty($new_instance['link'])) ? esc_url_raw($new_instance['link']) : '';
        
        return $instance;
    }
}

// Registrar el widget
function register_revista_bicicleta_v2_widget() {
    register_widget('Revista_Bicicleta_V2_Widget');
}
add_action('widgets_init', 'register_revista_bicicleta_v2_widget');
?>

