<?php get_header(); ?>

<div class="container-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <div id="blog">
                    <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
                     
                    <div class="content <?php post_class(); ?>">
                    <h1><?php the_title(); ?></h1>
                        <span class="post-author post-meta"><?php echo __('Posted: ', 'lightning-monkey') . get_the_date(); ?></span>
                        <span class="post-date post-meta"><?php echo __(' by ', 'lightning-monkey') . get_the_author(); ?></span>
                        <div class="categories-meta">
                            <?php 

                                $categories = get_the_category( get_the_ID() );

                                if(!empty($categories)){
                                    echo __('Posted In: ', 'lightning-monkey');
                                    foreach($categories as $category){
                                        echo $category->name . ' | ';
                                    }
                                }

                            ?>
                        </div>
                        <div class="entry">   
                            <?php the_content(); ?>

                            <div class="navigation">
                               <?php wp_link_pages(); ?>
                            </div>
                            <?php
                                $posttags = get_the_tags();
                                if(!empty($posttags)){ ?>
                            <hr/>
                            <div class="tags-meta">
                                <?php
                                    echo __('Post Tags: ', 'lightning-monkey');
                                    
                                    if ($posttags) {
                                      foreach($posttags as $tag) {
                                        echo $tag->name . ' | '; 
                                      }
                                    }
                                ?>
                            </div>

                            <?php 
                                }
                            ?>

                            <hr/>

                            <div class="navigation">  
                                <div class="prev-post-wrapper">
                                    <?php previous_post_link('%link', '<i class="fa fa-arrow-left"></i>' . __('Previous Post', 'lightning-monkey')  ?>
                                </div> 
                                <div class="next-post-wrapper">
                                    <?php next_post_link(' %link', __('Next Post', 'lightning-monkey') . '<i class="fa fa-arrow-right"></i>') ?>
                                </div>
                            </div>

                            <div class="clearfix"></div>
             

                            <p class="postmetadata">
                            <hr/>
                            <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?>
                            </p>
             
                        </div>
                    </div>

                    <div class="comments-template">
                        <?php comments_template(); ?>
                    </div>
                <?php endwhile; ?>
                <?php endif; ?>
                </div>
            </div>
            <div class="col-md-4" id="right-sidebar">
                <?php dynamic_sidebar('right-sidebar'); ?>
            </div>
        </div>
    </div>
</div>
 
<?php get_footer(); ?>