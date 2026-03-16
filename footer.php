<?php
// Ensure get_field function exists (provided by Advanced Custom Fields plugin)
if (!function_exists('get_field')) {
    function get_field($field, $post_id = false) {
        return '';
    }
}
?>

<footer class="footer">
  <div class="footer__inner container">
    <nav class="footer__menu">

      <!-- Колонка Каталог -->
      <div class="footer__menu-column">
        <a class="footer__menu-title" href="<?php echo get_post_type_archive_link('card'); ?>">Каталог</a>
        <ul class="footer__menu-list">
          <?php
            $terms = get_terms([
                'taxonomy'   => 'catalog_category',
                'hide_empty' => true,
            ]);

            if (!empty($terms) && !is_wp_error($terms)):
              foreach ($terms as $term): ?>
                <li class="footer__menu-item">
                  <a class="footer__menu-link" href="<?php echo esc_url(get_term_link($term)); ?>">
                    <?php echo esc_html($term->name); ?>
                  </a>
                </li>
          <?php endforeach; endif; ?>
        </ul>
      </div>

      <!-- Колонка Контакты -->
      <div class="footer__menu-column">
        <a class="footer__menu-title">Контакты</a>
        <?php 
          $contacts_page = get_page_by_path('contacts');
          if ($contacts_page) : 
              $phone   = get_field('phone', $contacts_page->ID);
              $email   = get_field('email', $contacts_page->ID);
              $address = get_field('address', $contacts_page->ID);
        ?>
        <ul class="footer__menu-list">
          <?php if ($phone) : ?>
            <li class="footer__menu-item">
              <a class="footer__menu-link" href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>">
                <?php echo esc_html($phone); ?>
              </a>
            </li>
          <?php endif; ?>
          <?php if ($email) : ?>
            <li class="footer__menu-item">
              <a class="footer__menu-link" href="mailto:<?php echo esc_attr($email); ?>">
                <?php echo esc_html($email); ?>
              </a>
            </li>
          <?php endif; ?>
          <?php if ($address) : ?>
            <li class="footer__menu-item">
              <span class="footer__menu-link"><?php echo esc_html($address); ?></span>
            </li>
          <?php endif; ?>
        </ul>
        <?php endif; ?>
      </div>

      <!-- Колонка Соцсети -->
      <div class="footer__menu-column">
        <a class="footer__menu-title">Следите за нами</a>
        <div class="footer__socials soc1als">
          <ul class="soc1als__list">
            <li class="socials__item">
              <a class="button socials__link button--transparent" title="Telegram" aria-label="Telegram" href="https://t.me/Rayssad" target="_blank">
                <span class="icon button__icon">
                  <svg fill="currentColor" stroke="none">
                    <use href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#telegram"></use>
                  </svg>
                </span>
              </a>
            </li>
          </ul>
        </div>
      </div>

      <!-- Колонка Заказ -->
      <div class="footer__menu-column">
        <a class="footer__menu-title">Хотите оформить заказ?</a>
        <div class="footer__menu-button-wrapper">
          <a class="button footer__menu-button" href="https://t.me/Rayssad" target="_blank">
            <span class="button__label">Написать в Telegram</span>
          </a>
        </div>
      </div>

    </nav>

    <div class="footer__extra">
      <div class="footer__copyright">
        <p>
          © <time datetime="<?php echo esc_attr(current_time('Y')); ?>">
            <?php echo esc_html(current_time('Y')); ?>
          </time> Райский сад Сибири. Все права защищены. Выращиваем с любовью
        </p>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>