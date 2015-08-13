<?php get_header(); ?>
<!--==============================content================================-->
    <section id="content">
        <div class="main zerogrid">
            <div class="row">
                <article class="col-3-4">
                    <div class="wrap-col">
                        <h3>Our Testimonials</h3>                           
                            <?php if (have_posts()) :  ?>
                                <?php while (have_posts()) : the_post(); ?>
                                <article>
                                    <div class="wrap-col">
                                        <h5><?php the_title(); ?></h5>
                                        <em><?php tags_testimonials(get_the_ID()); ?></em>
                                        <p class="p0"><?php the_excerpt(); ?></p>
                                        <a class="link" href="<?php the_permalink(); ?>">Learn More</a>
                                    </div>
                                </article>
                                <?php endwhile; ?>    
                            <?php else: ?>
                            <h2>Место для постов категории</h2>
                            <?php endif; ?>
                    </div>
                </article>
            </div>
        </div>
    </section>
<?php get_footer(); ?>