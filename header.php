<!doctype html>
<html lang="ru-RU" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/site.webmanifest">
    <?php wp_head(); ?>
   
  </head>
  <body>
    <header class="header" data-js-overlay-menu="">
      <div class="header__inner container">
        <dialog class="header__overlay-menu-dialog" data-js-overlay-menu-dialog="">
          <nav class="header__menu">
            <?php
             wp_nav_menu( [
              'theme_location'  => 'header',
              'container'       => false,
              'menu_class'      => 'header__menu-list',
              'echo'            => true,
              'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
] ); ?>
          </nav>
        </dialog>
        <button class="burger-button header__burger-button visible-mobile" type="button" aria-label="Open menu" title="Open menu" data-js-overlay-menu-burger-button="">
          <svg class="burger-button__svg" width="30" height="30" viewBox="0 0 100 100">
            <path class="burger-button__line burger-button__line--1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058"></path>
            <path class="burger-button__line burger-button__line--2" d="M 20,50 H 80"></path>
            <path class="burger-button__line burger-button__line--3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942"></path>
          </svg>
        </button>
      </div>
    </header>