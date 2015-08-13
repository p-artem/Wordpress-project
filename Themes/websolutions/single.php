<?php get_header(); ?>
<!--==============================content================================-->
    <section id="content">
        <div class="main zerogrid">
                <div class="row p2">
                    <article class="col-full">
			<div class="wrap-col">
                                                   
	                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <h3><?php the_title(); ?></h3> 
                                <?php the_content(); ?>
                            <?php endwhile; ?>
                            <?php else: ?>
                                <div><h2>Место для контента</h2></div>
                            <?php endif; ?>     
			</div>
                    </article>
                </div>
        </div>
    </section>
<?php get_footer(); ?>