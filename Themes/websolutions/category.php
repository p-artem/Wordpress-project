<?php 
    $cat_id = get_query_var('cat');
    if($cat_id == 4){
        include(TEMPLATEPATH.'/clients.php');
        exit;
    }elseif($cat_id == 6){
        include(TEMPLATEPATH.'/testimonials.php');
        exit;
    }
?>
<?php get_header(); ?>
<!--==============================content================================-->

    <section id="content">
        <div class="main zerogrid">
            <div class="row">
                <article class="col-full">
                    <?php
                        $id_business_serv = 9; //номер категории
                        $posts_bus_serv = new WP_Query(array('cat' => $id_business_serv, 'posts_per_page' => 6));
                    ?>

                    <h3><?php echo get_cat_name( $id_business_serv ); ?></h3>
                    <div class="row">
                        <?php if ($posts_bus_serv->have_posts()) :  ?>

                            <?php while ($posts_bus_serv->have_posts()) : $posts_bus_serv->the_post(); ?>

                            <article class="col-1-3">
                                <div class="wrap-col">
                                    <figure class="img-indent2"><?php the_post_thumbnail(); ?></figure>
                                    <div class="extra-wrap">
                                        <strong class="title-1"><?php the_title(); ?></strong>
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </article>                        
                            <?php endwhile; ?>
                        <?php else: ?>
                            <h2>Место для постов категории</h2>
                        <?php endif; ?>
                    </div>

                    <?php
                        $id_main_serv = 10; //номер категории
                        $posts_main_serv = new WP_Query(array('cat' => $id_main_serv, 'posts_per_page' => 3));
                    ?>
                    <h3 class="prev-indent-bot2"><?php echo get_cat_name( $id_main_serv ); ?></h3>
                    <div class="row">
                        <?php $arr = array(); ?>
                        <?php if ($posts_main_serv->have_posts()) :  ?>
                            <?php $num=0; ?>
                             <?php while ($posts_main_serv->have_posts()) : $posts_main_serv->the_post(); ?>
                            <article class="col-1-3">
                                <div class="wrap-col">
                                    <strong class="circle"><?php echo str_letter($num); ?></strong>
                                    <?php $num++; ?>
                                    <div class="extra-wrap">
                                        <div class="indent-top3">
                                            <strong class="title-1 color-2"><?php echo main_serv_title(get_the_title()); ?></strong>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <?php the_content(); ?>
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

