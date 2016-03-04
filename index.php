<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php bloginfo('description'); ?></title>
  <link rel="stylesheet" href="<?php bloginfo(stylesheet_url); ?>">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
</head>
<body>
  <header class="header">
    <h1><?php bloginfo('name'); ?></h1>
    <h2><?php bloginfo('description'); ?></h2>
  </header>

  <section class="content">
    <?php rewind_posts(); ?>
    <?php query_posts('posts_per_page=3'); ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article class="the_post">
        <header class="the_header">
          <h3><?php the_title(); ?></h3>
          <div class="post-data">
            <strong><?php the_author(); ?></strong>, <span><?php the_date(); ?></span> - <?php the_category(", "); ?>
          </div>
        </header>
        <div class="the_content">
          <?php the_content(); ?>
        </div>
        <footer class="the_static_footer">Creado por dp</footer>
      </article>
      <!-- post -->
    <?php endwhile; ?>
    <!-- post navigation -->
  <?php else: ?>
    <h3>Sorry, no posts.</h3>
    <!-- no posts found -->
  <?php endif; ?>
</section>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/gyro.js"></script>
<script>
var works = false;
gyro.frequency = 200;

setTimeout(function() {
  if (!works) {
    gyro.stopTracking();
  }
}, 2000);

gyro.startTracking(function(o) {
  if (o.gamma != null) {
    works = true;
  }

  var articles = document.querySelectorAll("article");
  var text = "rotateZ("+ (-o.gamma / 10) +"deg)";

  for (i = 0; i < articles.length; i++) {
    articles[i].style.transform = text;
  }
});
</script>
</body>
</html>
