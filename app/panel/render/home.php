<?php

/**
 * Render Home
 * 
 * @since 1.0
 * 
 */
include __DIR__ . "/../options/sample.php";
?>

<div class="wrap mt:lg" id="app_panel">
  <form method="post" action="options.php">
    <?php settings_fields('app_options'); ?>

    <!-- header -->
    <header class="panel-header pd:md">
      <div class="flex" flex="ai:center">

        <div class="flex" flex="ai:center">
          <h2 class="color:white mr:sm"><?php echo wp_get_theme()->name ?></h2>
          <p class="text:italic">v<?php echo wp_get_theme()->version ?></p>
        </div>

        <div class="save_button ml:a">
          <button type="submit">Publish</button>
        </div>

      </div>
    </header>

    <!-- panel-content -->
    <div class="panel-content" flex="">

      <!-- sidebar -->
      <div class="panel-sidebar expand mb:rem">
        <aside class="panel-sidebar-inner">
          <ul class="tab-menu">

            <?php $y = 0;
            foreach ($panel_options['tabs'] as $tab) :
              $y++;
              $current = "";
              if ($y == 1) $current = "current";

              $icon = $panel_options["default_tab_icon"];
              if (isset($tab['icon']) && !empty($tab['icon'])) :
                $icon = $tab['icon'];
              endif;

            ?>
              <li class="tab <?= $current ?>" data-options="<?= $tab['id'] ?>">
                <span class="dashicons <?= $icon ?>"></span>
                <span class="title"><?= $tab['title'] ?></span>
              </li>
            <?php endforeach; ?>

            <li class="tab" data-options="docs">
              <span class="dashicons dashicons-info"></span>
              <span class="title">Docs</span>
            </li>


          </ul>
        </aside>
      </div>
      <!-- sidebar end -->

      <!-- main -->
      <div class="wd:3/4 mb:rem ">
        <main class="panel-main">

          <ul class="tab-contents">


            <?php $x = 0;
            foreach ($panel_options['tabs'] as $tab) : $x++;
              $current = "";
              if ($x == 1) $current = "current";
            ?>
              <li class="tab-content <?= $current ?>" data-options="<?= $tab['id'] ?>">
                <?php
                foreach ($tab['fields'] as $field) :

                  $def_text = "";
                  if (isset($field['default_text']) && !empty($field['default_text'])) :
                    $def_text = $field['default_text'];
                  endif;

                  $value = "";
                  if (!empty(self::get_option($field['id']))) :
                    $value = self::get_option($field['id']);
                  endif;



                  include __DIR__ . "/fields/_{$field["type"]}.php";
                endforeach;
                ?>
              </li>
            <?php endforeach; ?>

            <li class="tab-content" data-options="docs">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem repudiandae qui obcaecati nesciunt. Eos non quidem doloremque, ut maiores tempora sed sit quo consequuntur, corrupti ipsum blanditiis, dicta amet quod!
                Architecto rerum totam illum molestias eius soluta, doloremque, facere odio aspernatur ratione fugiat earum alias iure eos voluptates exercitationem possimus suscipit! Expedita porro suscipit iste cupiditate. Hic vero aut exercitationem?
                Harum, temporibus! Obcaecati libero provident tenetur! Rem voluptate inventore beatae nulla modi eligendi ipsam, magnam fugiat quia reprehenderit tempora cumque ex, dolore natus ad quidem, soluta officiis autem placeat fugit?</p>
            </li>
          </ul>

        </main>
      </div>
      <!-- main end -->

    </div>
    <!-- panel-content end-->


  </form>
</div>
<!-- app panel end -->