<?php get_header(); ?>
<!--==============================content================================-->
    <section id="content">
        <div class="main zerogrid">
                <div class="row">
                    <article class="col-1-4">
			<div class="wrap-col">
	                    <h3 class="p0">Conditions</h3>
                            <?php if(!dynamic_sidebar('conditions')): ?>
                                <p>Место для информации клиентов</p>
                            <?php endif; ?>
                        </div>
                    </article>
                    <article class="col-3-4">
			<div class="wrap-col">
	                    <h3>Our Clients</h3>
                                <?php $id_clients = get_query_var('cat'); 
                                $posts_clients = new WP_Query(array('cat' => $id_clients, 'posts_per_page' => 6));
                                ?>
                                <?php if ($posts_clients->have_posts()) :  ?>

                                    <?php while ($posts_clients->have_posts()) : $posts_clients->the_post(); ?>
                                    <article class="col-1-3">
					<div class="wrap-col">
                                            <?php $attr = array('class' => 'img-border'); ?>
                                            <figure class="p2"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full', $attr); ?></a></figure>
                                            <strong><?php the_title(); ?></strong>
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