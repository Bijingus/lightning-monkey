<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p>This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<hr>

<?php if ( have_comments() ) : ?>
	<h3 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to “<?php the_title(); ?>”</h3>

	<ol>
		<?php 
			wp_list_comments(); //this is the important part that ensures we call our custom comment layout defined above 
        ?>
	</ol>
	<div></div>
	<div>
		<div><?php previous_comments_link() ?></div>
		<div><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>

<?php endif; ?>

<?php if ( comments_open() ) : ?>

<?php comment_form(); ?>

<?php endif; // If registration required and not logged in ?>