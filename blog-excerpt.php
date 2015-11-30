<?php 
if(have_posts()){
while(have_posts()){
	the_post(); ?>
	<div class="blog-post-wrapper">
		<a href="<?php the_permalink(); ?>"><h3 style="margin:0"><?php the_title(); ?></h3></a>
		<span class="post-author post-meta"><?php echo __('Posted: ', 'lightning-monkey') . get_the_date(); ?></span>
		<span class="post-date post-meta"><?php echo __(' by ', 'lightning-monkey') . get_the_author(); ?></span>
		<br/>
		<span class="post-excerpt-content">
			<?php 
			$thumbnail = get_the_post_thumbnail();
			if(!empty($thumbnail)){ ?>
				<div class="blog-excerpt-thumb-wrapper">
					<?php the_post_thumbnail('medium'); ?>
				</div>
			<?php }
			the_excerpt(); ?>
		</span>
		<a href="<?php the_permalink();?>" class="read-more"><?php echo __('Read More', 'lightning-monkey'); ?></a>
		<div class="clearfix"></div>
	</div>
	<?php } ?>
	<div class="navigation">  
		<div class="row" id="blog-navigation">
			<div class="col-xs-6">
				<?php next_posts_link( '<i class="fa fa-arrow-left"></i>' . __('Older Posts', 'lightning-monkey') ); ?>
			</div>
			<div class="col-xs-6" style="text-align:right;">
				<?php previous_posts_link( __('Newer Posts', 'lightning-monkey') . '<i class="fa fa-arrow-right" style="margin-left:10px;"></i>' ); ?>
			</div>
		</div>
	</div>	
<?php
	} else{
		echo __('There are no blog posts yet.', 'lightning-monkey');
	}
?>