<?php get_header(); ?>

<div class="widecolumn">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>


<div class="post rounded-corners" id="post-<?php the_ID(); ?>">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<?php the_content(); ?>
<?php wp_link_pages('before=<p><strong>Pages:</strong>&after=</p>&next_or_number=number'); ?>
	
<div class="post-date"><?php the_time('F jS, Y') ?> <?php edit_post_link('Edit this entry.', '', ''); ?></div>
</div>

<div class="clear">&nbsp;</div>
<?php endwhile; ?>

<?php else : ?>

	<div class="post rounded-corners">
<h2 class="center">Not Found</h2>
<p>Sorry, but you are looking for something that isn't here.</p>
	</div>

<?php endif; ?>

</div>

<?php get_footer(); ?>