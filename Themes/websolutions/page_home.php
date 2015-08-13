<?php 
/*   
Template Name: Главная страница
*/
?>

<?php get_header('home'); ?>
	<!--==============================content================================-->
    <section id="content">
        <div class="main zerogrid">
            <div class="row">
                <article class="col-1-2">
                    <div class="wrap-col">
                        <?php
                            $id_news = 5; //номер категории
                            $posts_news = new WP_Query(array('cat' => $id_news, 'posts_per_page' => 3));
                        ?>
                        <h3><?php echo get_cat_name( $id_news ); ?></h3>
                        <?php if ($posts_news->have_posts()) :  ?>
                           <div class="indent-bot">
                            <?php while ($posts_news->have_posts()) : $posts_news->the_post(); ?>
                               <time class="tdate-1" datetime="2011-12-24"><strong><?php echo get_post_time('j'); ?></strong><?php echo get_post_time('F'); ?></time>
                               <div class="extra-wrap">
                                   <h6><a class="link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                    <?php the_excerpt(); ?>
                               </div>
                            <?php endwhile; ?>
                             </div>
                             <span class="button-2">
                                 <a href="<?php echo get_category_link($id_news); ?>"><strong>News Archive</strong></a>
                            </span>
                        <?php else: ?>
                            <h2>Место для постов категории</h2>
                        <?php endif; ?>
                    </div>
                </article>
                <article class="col-1-2">
                	<div class="wrap-col indent-top">
                        <?php
                            $id_about_intex = 40;
                            $id_compamny = 4;
                            echo get_the_content_by_id($id_about_intex); 
                        ?>   
                        <span class="button-2">
                            <a href="<?php echo get_page_link($id_compamny); ?>"><strong>aBOUT cOMPANY</strong></a>
                        </span>
                    </div>                        
                </article>
            </div>
        </div>
    </section>
    
<?php get_footer(); ?>

