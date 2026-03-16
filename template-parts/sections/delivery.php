<?php
// Получаем данные с ACF
$delivery_title = get_field('delivery_title');
?>

<?php if ($delivery_title): ?>
<section class="section container delivery" aria-labelledby="delivery-title">
  <header class="section__header">
    <div class="section__info">
      <h2 class="section__title" id="delivery-title"><?php echo esc_html($delivery_title); ?></h2>
    </div>
  </header>
  <div class="section__body">
    <ol class="instructions-group instructions-group--2-columns instructions-group--has-counter">
      <?php for ($i = 1; $i <= 6; $i++):
        $title = get_field("step_{$i}_title");
        $desc  = get_field("step_{$i}_description");
      ?>
        <?php if ($title): ?>
          <li class="instructions-group__item">
            <div class="instructions-group__info">
              <div class="instructions-group__item-title"><?php echo esc_html($title); ?></div>
              <?php if ($desc): ?>
                <div class="instructions-group__item-description">
                  <p><?php echo esc_html($desc); ?></p>
                </div>
              <?php endif; ?>
            </div>
          </li>
        <?php endif; ?>
      <?php endfor; ?>
    </ol>
  </div>
</section>
<?php endif; ?>