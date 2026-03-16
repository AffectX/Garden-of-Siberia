<?php get_header(); ?>

<main class="content">
      <?php
      // Вставляем секцию Hero
      get_template_part('template-parts/sections/hero'); 
      ?> 

      
      <?php
      // Вставляем секцию популярных товаров
      get_template_part('template-parts/sections/popular-cards'); 
      ?>

                                    
      <?php 
      // Вставляем секцию доставки
      get_template_part('template-parts/sections/delivery'); ?> 


      <?php 
      // Вставляем секцию FAQ
      get_template_part('template-parts/sections/faq'); ?>
      
        <?php
        //  Вставляем баннер с призывом к действию
        get_template_part('template-parts/banner', null, [
            'title'       => 'Не нашли ответ на свой вопрос?',
            'description' => 'Напишите нам - с радостью подскажем и поможем оформить заказ',
            'button_text' => 'Задать вопрос в Telegram',
            'button_link' => 'https://t.me/Rayssad'
        ]);
        ?>

     
        <?php
        //  Вставляем секцию с отзывами
        get_template_part('template-parts/sections/reviews');?>

      
      <?php
        //  Вставляем баннер с призывом к действию
        get_template_part('template-parts/banner', null, [
            'title'       => 'Свяжитесь с нами',
            'description' => 'Поможем выбрать растения и ответим на любые вопросы',
            'button_text' => 'Telegram-сообщество',
            'button_link' => 'https://t.me/Rayssad'
        ]);
      ?>

    </main>


<?php get_footer(); ?>