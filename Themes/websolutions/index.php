
<?php get_header(); ?>
    
<!--==============================content================================-->
    <section id="content">
        <div class="main zerogrid">
            <div class="row">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            <?php endwhile; ?>
            <?php else: ?>
                <div><h2>Место для контента</h2></div>
            <?php endif; ?> 
            </div>
        </div>
    </section>
    
<?php get_footer(); ?>

