<?php get_header(); ?>

<div class="container-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-8" id="blog-excerpt-container">
				<?php 
				if(have_posts()){
				while (have_posts()){
					the_post(); ?>
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
								<?php the_post_thumbnail('medium'); ?>
							</div>
						<?php }
						echo $content; ?>
					</span>
					<a href="<?php the_permalink();?>">Read More</a>
					<div class="clearfix"></div>
					</div>
					<?php }
				wp_reset_query(); ?>
				<div class="navigation">  
                	<div class="row" id="blog-navigation">

						<div class="col-xs-6">
							<?php next_posts_link( '<i class="fa fa-arrow-left"></i>Older Posts' ); ?>
						</div>

						<div class="col-xs-6" style="text-align:right;">
							<?php previous_posts_link( 'Newer Posts<i class="fa fa-arrow-right" style="margin-left:10px;"></i>' ); ?>
						</div>

					</div>
            	</div>	
            	<?php
				} else{
					echo 'There are no blog posts yet.';
				}
				?>
			</div>
			<div class="col-md-4" id="right-sidebar">
				<?php dynamic_sidebar('right-sidebar'); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>