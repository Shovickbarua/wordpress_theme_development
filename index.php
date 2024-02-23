<?php
/*
* The main template file
*/
    get_header() ;
?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <?php 
                        if ( have_posts() ) : 
                            while ( have_posts() ) : the_post();
                    ?>
                    <div class="blog_area">
                        <div class="post_thumb">
                            <?php echo the_post_thumbnail( 'post-thumbnails' )?>
                        </div>
                        <div class="post_details">
                            <h2><a href="<?php get_permalink();  ?>"><?php the_title(); ?></a></h2>
                            <?php the_excerpt(  ); ?>
                        </div>
                    </div>
                    <?php
                    endwhile;
                        else :
                        _e('No post found');
                        endif;
                        ?>
                </div>
                <div class="col-md-9">
                    <h2>This is sidebar Area</h2>
                </div>
            </div>
        </div>
    </section>

<?php get_footer( ); ?>

