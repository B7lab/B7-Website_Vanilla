<?php get_header(); ?>

<main>

    <!-- <div class="container"> -->

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article class="post">
            <h2><?php the_title(); ?></h2>
            <p><?php the_content(); ?></p>
        </article>

    <?php endwhile; endif; ?>

    <!-- </div> -->

</main>

<?php get_footer(); ?>

