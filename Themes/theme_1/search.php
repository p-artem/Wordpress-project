<?php get_header(); ?>

<div class="page-title">
    <h1>Результаты поиска</h1>
</div>

<?php if (have_posts()) : ?>
    <div class="content-main">
    <?php while (have_posts()) : the_post(); ?>
        <div class="artical-anons-main">
            <div class="artical-head">
                <h1><?php the_title(); ?></h1>
                <p><?php my_list_tags(); ?></p>
            </div>
            <?php the_excerpt(); ?>
            <p><a href="<?php the_permalink(); ?>" class="read-more">Read more</a></p>
        </div>
    <?php endwhile; ?>
        
    <?php wp_corenavi(); ?>
    </div>

    <?php else: ?>
        <div class="content-main">
            <p>Ничего не найдено</p>
        </div>
<?php endif; ?>   

<?php get_footer(); ?>