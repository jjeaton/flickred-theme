<?php get_header(); ?>

<div class="narrowcolumn">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>


<div class="post rounded-corners" id="post-<?php the_ID(); ?>">
<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<?php the_content("Continue reading " . the_title('', '', false)); ?>

<div class="post-date"><?php the_time('F jS, Y') ?> <?php edit_post_link('Edit this entry', '', ''); ?></div>
<p class="postmetadata"><?php _e('tags&#58;'); ?> <?php the_category(', ') ?> <?php _e('comments&#58;'); ?> <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></p>
</div>

<div class="clear">&nbsp;</div>
<?php endwhile; ?>

<div class="navigation"><?php posts_nav_link('','','previous page') ?> <?php posts_nav_link('','next page','') ?></div>

<?php else : ?>

	<div class="post rounded-corners">
<h2 class="center">Not Found</h2>
<p>Sorry, but you are looking for something that isn't here.</p>
	</div>

<?php endif; ?>

</div>

<?php get_footer(); ?>