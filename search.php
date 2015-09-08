<?php get_header(); ?>

<div class="container-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-8" id="search-excerpt-container">
				<h1>Search</h1>
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
								<?php echo get_the_post_thumbnail(); ?>
							</div>
						<?php }
						echo $content; ?>
					</span>
					<a href="<?php the_permalink();?>">Read More</a>
					<div class="clearfix"></div>
					</div>
					<?php }
				wp_reset_query();
				} else{
					echo 'No Search Results Found.';
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