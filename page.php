<?php get_header(); ?>
<div class="container-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <?php if('posts' == get_option( 'show_on_front' )){ ?>

                    <?php   

                    $default_posts_per_page = get_option( 'posts_per_page' );

                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page'    => $default_posts_per_page,
                    );

                    $query = NEW WP_Query($args);

                    if($query->have_posts()){
                    while ($query->have_posts()){
                        $query->the_post(); ?>
                        <div class="blog-post-wrapper">
                        <a href="<?php the_permalink(); ?>"><h3 style="margin:0"><?php the_title(); ?></h3></a>
                        <?php
                        $content = get_the_content();
                        $content = strip_tags($content);
                        $content = strip_tags(substr($content, 0, 360)) . '...'; ?>

                        <span class="post-author post-meta"><?php echo 'Posted: ' . get_the_date(); ?></span>
                        <span class="post-date post-meta"><?php echo ' by ' . get_the_author(); ?></span>
                        <br/>
                        <span class="post-excerpt-content">
                            <?php 
                            $thumbnail = get_the_post_thumbnail();
                            if(!empty($thumbnail)){ ?>
                                <div class="blog-excerpt-thumb-wrapper">
                                    <?php echo get_the_post_thumbnail(); ?>
                                </div>
                            <?php }
                            echo $content; ?>
                        </span>
                        <a href="<?php the_permalink();?>">Read More</a>
                        <div class="clearfix"></div>
                        </div>
                        <?php }
                    wp_reset_postdata();
                    } else{
                        echo 'There are no blog posts yet.';
                    }
                    ?>

                <?php } else{ ?>

                <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
                 
                <div class="content">
                <h1><?php the_title(); ?></h1>
                    <div class="entry">
                    <?php the_content(); ?>
                    <?php if(comments_open()){ ?>
                        <p class="postmetadata">
                        <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
                        </p>
                    <?php } else{
                    } 
                    ?>
                    </div>
                </div>
                <div class="comments-template">
                    <?php comments_template(); ?>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php edit_post_link('Edit'); ?>
                </div>
                <?php } ?>
                </div>
                <div class="col-md-4" id="right-sidebar">
                    <?php dynamic_sidebar('right-sidebar'); ?>  
                </div>
        </div>
    </div>
</div>
  
<?php get_footer(); ?>