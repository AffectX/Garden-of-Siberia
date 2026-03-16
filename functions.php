<?php
// --------------------------------------------------
// 1. Настройка темы
// --------------------------------------------------
if (!function_exists('garden_of_siberia_setup')) {
    function garden_of_siberia_setup() {

        add_theme_support('title-tag');
        add_theme_support('site-icon');
        add_theme_support('post-thumbnails');
        // размеры изображений
        add_image_size('catalog-card', 600, 600, true); 
        add_image_size('catalog-single', 900, 900, false);

        register_nav_menus([
            'header' => __('Меню в шапке', 'garden-of-siberia'),
            'footer_catalog' => __('Меню Каталог в футере', 'garden-of-siberia'),
        ]);
    }
    add_action('after_setup_theme', 'garden_of_siberia_setup');
}


// --------------------------------------------------
// 2. Подключение стилей и скриптов
// --------------------------------------------------
add_action('wp_enqueue_scripts', 'garden_of_siberia_scripts');
function garden_of_siberia_scripts() {

    wp_enqueue_style('main', get_stylesheet_uri());
    wp_enqueue_style('bundle', get_template_directory_uri() . '/assets/bundle.css', ['main'], null);

    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/main.js', [], null, true);
}


// --------------------------------------------------
// 3. Добавление классов к меню
// --------------------------------------------------

add_filter('nav_menu_css_class', 'garden_of_siberia_add_li_class', 10, 2);
function garden_of_siberia_add_li_class($classes, $item) {
    global $menu_args;

    if (!empty($menu_args) && isset($menu_args->theme_location) && $menu_args->theme_location === 'header') {
        $classes[] = 'header__menu-item';
    }

    return $classes;
}

add_filter('nav_menu_link_attributes', 'garden_of_siberia_add_a_class', 10, 3);
function garden_of_siberia_add_a_class($atts, $item, $args) {
    if ($args->theme_location === 'header') {
        $atts['class'] = 'header__menu-link';

        if ($item->current || $item->current_item_ancestor) {
            $atts['class'] .= ' is-active';
        }
    }
    return $atts;
}

function gos_footer_li_class($classes, $item, $args) {
    if (isset($args->theme_location) && str_contains($args->theme_location, 'footer')) {
        $classes = ['footer__menu-item'];
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'gos_footer_li_class', 10, 3);

function gos_footer_link_class($atts, $item, $args) {
    if (isset($args->theme_location) && str_contains($args->theme_location, 'footer')) {
        $atts['class'] = 'footer__menu-link';

        if ($item->current || $item->current_item_ancestor) {
            $atts['class'] .= ' is-active';
        }
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'gos_footer_link_class', 10, 3);


// --------------------------------------------------
// 4. Тип записи "Каталог"
// --------------------------------------------------

function register_catalog_post_type() {
    register_post_type('card', [
        'labels' => [
            'name' => 'Каталог',
            'singular_name' => 'Карточка товара',
            'add_new' => 'Добавить карточку товара',
            'add_new_item' => 'Добавить новую карточку товара',
            'edit_item' => 'Редактировать карточку товара',
            'new_item' => 'Новая карточка товара',
            'view_item' => 'Просмотр карточки товара',
            'search_items' => 'Поиск карточек товаров',
        ],
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-products',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'catalog'],
        'show_in_rest' => true
    ]);
}
add_action('init', 'register_catalog_post_type');

// Регистрируем таксономию для карточек

function register_catalog_taxonomy() {
    register_taxonomy('catalog_category', 'card', [
        'label' => 'Разделы каталога',
        'hierarchical' => true,
        'rewrite' => ['slug' => 'catalog-category'],
        'show_in_rest' => true
    ]);
}
add_action('init', 'register_catalog_taxonomy');


// --------------------------------------------------
// 5. Транслитерация slug для карточек
// --------------------------------------------------

function transliterate_cyr_to_lat($text) {
    $cyr = [
        'а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п',
        'р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',
        'А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П',
        'Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я'
    ];
    $lat = [
        'a','b','v','g','d','e','e','zh','z','i','y','k','l','m','n','o','p',
        'r','s','t','u','f','h','c','ch','sh','sch','','y','','e','yu','ya',
        'A','B','V','G','D','E','E','Zh','Z','I','Y','K','L','M','N','O','P',
        'R','S','T','U','F','H','C','Ch','Sh','Sch','','Y','','E','Yu','Ya'
    ];
    return str_replace($cyr, $lat, $text);
}

add_action('save_post_card', function($post_id){

    if (wp_is_post_autosave($post_id) || wp_is_post_revision($post_id)) return;

    $post = get_post($post_id);
    $new_slug = sanitize_title(transliterate_cyr_to_lat($post->post_title));

    if ($post->post_name !== $new_slug) {
        wp_update_post([
            'ID' => $post_id,
            'post_name' => $new_slug
        ]);
    }
});


// --------------------------------------------------
// 6. Тип записи "FAQ"
// --------------------------------------------------

function register_faq_post_type() {
    register_post_type('faq', [
        'labels' => [
            'name' => 'FAQ',
            'singular_name' => 'Вопрос',
            'add_new' => 'Добавить вопрос',
            'add_new_item' => 'Добавить новый вопрос',
            'edit_item' => 'Редактировать вопрос',
        ],
        'public' => true,
        'has_archive' => false,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-editor-help',
        'supports' => ['title', 'editor', 'page-attributes'],
        'rewrite' => ['slug' => 'faq'],
        'show_in_rest' => true,
        'hierarchical' => true,
    ]);
}
add_action('init', 'register_faq_post_type');


// --------------------------------------------------
// 7. Колонка "Порядок" для FAQ в админке
// --------------------------------------------------

add_filter('manage_faq_posts_columns', function($columns) {
    $columns['menu_order'] = 'Порядок';
    return $columns;
});

add_action('manage_faq_posts_custom_column', function($column, $post_id) {
    if ($column === 'menu_order') {
        echo get_post_field('menu_order', $post_id);
    }
}, 10, 2);

add_filter('manage_edit-faq_sortable_columns', function($columns) {
    $columns['menu_order'] = 'menu_order';
    return $columns;
});

add_action('pre_get_posts', function($query) {
    if (!is_admin()) return;
    if ($query->get('post_type') !== 'faq') return;

    if (!$query->get('orderby')) {
        $query->set('orderby', 'menu_order');
        $query->set('order', 'ASC');
    }
});


// --------------------------------------------------
// 8. Регистрация типа записи "Отзывы"
// --------------------------------------------------

function register_review_cpt() {
    $labels = [
        'name' => 'Отзывы',
        'singular_name' => 'Отзыв',
        'add_new' => 'Добавить отзыв',
        'add_new_item' => 'Добавить новый отзыв',
        'edit_item' => 'Редактировать отзыв',
        'new_item' => 'Новый отзыв',
        'all_items' => 'Все отзывы',
        'view_item' => 'Просмотреть отзыв',
        'search_items' => 'Искать отзывы',
        'not_found' => 'Отзывы не найдены',
        'not_found_in_trash' => 'В корзине отзывы не найдены',
        'menu_name' => 'Отзывы'
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'menu_position' => 5,
        'supports' => ['title'],
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-format-quote',
    ];

    register_post_type('review', $args);
}
add_action('init', 'register_review_cpt');


// --------------------------------------------------
// 9. Функция для хлебных крошек
// --------------------------------------------------

function garden_catalog_breadcrumbs() {

    echo '<nav class="breadcrumbs" aria-label="Хлебные крошки">';
    echo '<ul class="breadcrumbs__list">';

    echo '<li class="breadcrumbs__item"><a class="breadcrumbs__link" href="' . home_url() . '">Главная</a></li>';

    if (is_post_type_archive('card')) {

        echo '<li class="breadcrumbs__item breadcrumbs__item--current">Каталог</li>';

    } elseif (is_singular('card')) {

        echo '<li class="breadcrumbs__item"><a class="breadcrumbs__link" href="' . get_post_type_archive_link('card') . '">Каталог</a></li>';

        $terms = get_the_terms(get_the_ID(), 'catalog_category');

        if ($terms && !is_wp_error($terms)) {
            $term = $terms[0];

            if ($term->parent) {
                $parent = get_term($term->parent, 'catalog_category');
                echo '<li class="breadcrumbs__item"><a class="breadcrumbs__link" href="' . get_term_link($parent) . '">' . $parent->name . '</a></li>';
            }

            echo '<li class="breadcrumbs__item"><a class="breadcrumbs__link" href="' . get_term_link($term) . '">' . $term->name . '</a></li>';
        }

        echo '<li class="breadcrumbs__item breadcrumbs__item--current">' . get_the_title() . '</li>';

    } elseif (is_tax('catalog_category')) {

        echo '<li class="breadcrumbs__item"><a class="breadcrumbs__link" href="' . get_post_type_archive_link('card') . '">Каталог</a></li>';

        $term = get_queried_object();

        if ($term->parent) {
            $parent = get_term($term->parent, 'catalog_category');
            echo '<li class="breadcrumbs__item"><a class="breadcrumbs__link" href="' . get_term_link($parent) . '">' . $parent->name . '</a></li>';
        }

        echo '<li class="breadcrumbs__item breadcrumbs__item--current">' . $term->name . '</li>';
    }

    echo '</ul>';
    echo '</nav>';
}


// --------------------------------------------------
// 10. Увеличиваем количество постов для таксономии catalog_category
// --------------------------------------------------

add_action('pre_get_posts', function($query) {
    if (!is_admin() && $query->is_main_query() && is_tax('catalog_category')) {
        $query->set('posts_per_page', -1); // выводим все посты без ограничения
    }
});


// --------------------------------------------------
// 11. Фильтр по таксономии "Разделы каталога" для CPT "card"
// --------------------------------------------------

// 1. Добавляем выпадающий список в админке
add_action('restrict_manage_posts', function($post_type){
    if ($post_type !== 'card') return;

    $taxonomy = 'catalog_category';
    $terms = get_terms([
        'taxonomy' => $taxonomy,
        'hide_empty' => false,
    ]);

    if (!empty($terms) && !is_wp_error($terms)) {
        $current = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        echo '<select name="' . $taxonomy . '">';
        echo '<option value="">Все разделы</option>';
        foreach ($terms as $term) {
            printf(
                '<option value="%s"%s>%s</option>',
                $term->slug,
                selected($current, $term->slug, false),
                $term->name
            );
        }
        echo '</select>';
    }
});

// 2. Применяем фильтр к запросу
add_action('pre_get_posts', function($query){
    global $pagenow;
    $post_type = isset($_GET['post_type']) ? $_GET['post_type'] : '';

    if ($pagenow === 'edit.php' && $post_type === 'card' && !empty($_GET['catalog_category'])) {
        $query->set('tax_query', [[
            'taxonomy' => 'catalog_category',
            'field'    => 'slug',
            'terms'    => $_GET['catalog_category'],
        ]]);
    }
});