<?php 
    if(in_category(4)){
        include 'portfolio.php';
        exit;
    }
?>
<?php get_header(); ?>

<div class="page-title">
    <?php $cat =  get_the_category(); ?>
    <h1><?php echo $cat[0]->name; ?></h1>
    <p class="page-title-map">
        <a href="<?php echo home_url(); ?>">Home</a>  /  
        <a href="<?php echo get_category_link($cat[0]->cat_ID) ?>">
            <?php echo $cat[0]->name; ?>
        </a> / <?php the_title(); ?>
    </p>
    </div>
    
    <div class="content-main">
    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_post_thumbnail('full', array('class' => 'img-lefter')); ?>
            <h1 class="center-n"><span class="hnc"><?php the_title(); ?></span></h1>
            <?php the_content(); ?>
        <?php endwhile; ?>
        
        <?php else: ?>
            <div><h2>Место для слайдера</h2></div>
        <?php endif; ?>   
        
        <?php
            $id_team = 3; //номер категории
            $posts_team = new WP_Query(array('cat' => $id_team, 'posts_per_page' => 3, 'order' => 'ASC'));
        ?>
        
        <h1 class="center-n"><span class="hnc">Meet Our Team</span> <span class="hnl">/ <a href="<?php echo get_category_link($id_team); ?>">View The Team</a></span></h1>
        <?php if ($posts_team->have_posts()) :  ?>
            <div class="our-team-main">
            <?php while ($posts_team->have_posts()) : $posts_team->the_post(); ?>
                <div>
                <h2><a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full') ?></a>
                    <br />
                    <?php the_title(); ?><br />
                    <span><?php my_list_tags(); ?></span>
                </h2>
                <?php the_excerpt(); ?>
                </div>
            <?php endwhile; ?>
             </div>
        <?php else: ?>

        <?php endif; ?>
        
        <h1 class="center-n"><span class="hnc">Our Clients</span></h1>
        
        <div class="our-clients">
            <?php if(!dynamic_sidebar('clients')): ?>
                <ul id="carousel" class="elastislide-list">
                    <li><p>Место для клиентов</p></li>
                </ul>
            <?php endif; ?>
        </div>
           
    </div>

<?php get_footer(); ?>
