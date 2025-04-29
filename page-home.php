<?php get_header(); ?>

<main>

    <div>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article class="post">
            <h2><?php //the_title(); ?></h2>
            <p><?php the_content(); ?></p>
        </article>

    <?php endwhile; endif; ?>
    <canvas id="myCanvas" width="200" height="200"></canvas>
    </div>

</main>

<?php get_footer(); ?>

assets/img/hero-banner.jpg