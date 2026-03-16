<?php
$title       = $args['title'] ?? '';
$description = $args['description'] ?? '';
$button_text = $args['button_text'] ?? '';
$button_link = $args['button_link'] ?? '#';
$bg_url      = get_template_directory_uri() . '/assets/images/bg.jpg';
?>

<section class="banner"
         style="background: url('<?php echo esc_url($bg_url); ?>') center/cover no-repeat;">
    <div class="banner__inner container">
        <h2 class="banner__title"><?php echo esc_html($title); ?></h2>

        <div class="banner__description">
            <p><?php echo esc_html($description); ?></p>
        </div>

        <a class="button banner__button button--red"
           href="<?php echo esc_url($button_link); ?>"
           target="_blank">
            <span class="button__label">
                <?php echo esc_html($button_text); ?>
            </span>
        </a>
    </div>
</section>