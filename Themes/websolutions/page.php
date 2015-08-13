<?php get_header(); ?>
<!--==============================content================================-->
    <section id="content">
        <div class="main zerogrid">
                <div class="row p2">
                    <article class="col-full">
			<div class="wrap-col">
                            <h3>How We Work</h3>                        
	                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <?php the_content(); ?>
                            <?php endwhile; ?>
                            <?php else: ?>
                                <div><h2>Место для контента</h2></div>
                            <?php endif; ?>     
			</div>
                    </article>
                </div>
                <div class="wrapper">
                	<article class="col-full">
                        <?php $id_testimonials = 6; 
                              $posts_testimonials = new WP_Query(array('cat' => $id_testimonials, 'posts_per_page' => 2));
                        ?>
                            <h3 class="prev-indent-bot2"><?php echo get_the_category_by_ID($id_testimonials); ?></h3>
                        <?php if ($posts_testimonials->have_posts()) :  ?>
                           <div class="wrapper"> 
                            <?php while ($posts_testimonials->have_posts()) : $posts_testimonials->the_post(); ?>
                            <article class="col-1-2">
				<div class="wrap-col">
                            	<div class="indent-right img-indent-bot">
                                    <blockquote>
                                        <div class="quote">
                                            <div class="padding">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        </div>
                                    </blockquote>
                                    <div class="aligncenter text-2">
                                        <strong><?php the_title(); ?></strong>
                                        <p class="p0 color-1"><?php tags_testimonials(get_the_ID()); ?></p>
                                    </div>
                                </div>
				</div>
                            </article>
                        <?php endwhile; ?>    
                             </div>
                                <span class="button-2">
                                    <a href="<?php echo get_category_link($id_testimonials); ?>"><strong>All Testimonials</strong></a>
                                </span>
                        <?php else: ?>
                        <div class="wrapper">
                            <h2>Место для информации о работниках</h2>
                        </div>
                        <?php endif; ?>

                    </article>
                </div>
        </div>
    </section>
<?php get_footer(); ?>