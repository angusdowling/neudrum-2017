<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WDFKFZN"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    include( locate_template('templates/common/common-masthead.php') );
  ?>

  <div class="page-container" role="document">
    <div class="content">
      <main class="main" role="main">
        <?php include roots_template_path(); ?>
      </main>
    </div> 
  </div>

  <?php include( locate_template('templates/common/common-footer.php') ); ?>
</body>
</html>
