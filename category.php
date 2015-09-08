<?php get_header(); ?>

<div class="container-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-8" id="blog-excerpt-container">
          <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
            <?php /* If this is a category archive */ if (is_category()) { ?>
              <h2 class="archive-header">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category:</h2>
            <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
              <h2 class="archive-header">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
            <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
              <h2 class="archive-header">Archive for <?php the_time('F jS, Y'); ?>:</h2>
            <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
              <h2 class="archive-header">Archive for <?php the_time('F, Y'); ?>:</h2>
            <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
              <h2 class="archive-header">Archive for <?php the_time('Y'); ?>:</h2>
            <?php /* If this is an author archive */ } elseif (is_author()) { ?>
              <h2 class="archive-header">Author Archive</h2>
            <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
              <h2 class="archive-header">Blog Archives</h2>
          <?php } ?>
          
          <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>  
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
            </div>
             
          <?php endwhile; ?>
       
            <div class="navigation">
                <?php posts_nav_link(); ?>
            </div>
       
          <?php endif; ?>

    </div>
     <div class="col-md-4" id="right-sidebar">
          <?php dynamic_sidebar('right-sidebar'); ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>