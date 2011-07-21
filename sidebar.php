<!-- ######### SIDEBAR -->
<div id="sidebar">

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

<div class="bl"><div class="br"><div class="tl"><div class="tr">
<ul>
	<li><!--<h2><?php _e('Me'); ?></h2>-->
		<ul>
			<li><img src="http://merriecontrary.com/blog/wp-content/themes/flickred-202/images/momage3.jpg"></li>
			<?php wp_list_pages('depth=1&title_li='); ?>
			<li><?php echo antispambot(get_the_author_meta('email')); ?></li>
		</ul>
	</li>
</ul>
</div></div></div></div>
<div class="clear">&nbsp;</div>

<div class="bl"><div class="br"><div class="tl"><div class="tr"><ul>
	<li>
		<ul>
			<li>
<!-- Start of Flickr Badge -->
<style type="text/css">
.zg_div {margin:0px 5px 5px 0px; width:117px;}
.zg_div_inner {border: solid 1px #000000; background-color:#FFFFFF;  color:#666666; text-align:center; font-family:arial, helvetica; font-size:11px;}
.zg_div a, .zg_div a:hover, .zg_div a:visited {color:#3993ff; background:inherit !important; text-decoration:none !important;}
</style>
<script type="text/javascript">
zg_insert_badge = function() {
var zg_bg_color = 'FFFFFF';
var zgi_url = 'http://www.flickr.com/apps/badge/badge_iframe.gne?zg_bg_color='+zg_bg_color+'&zg_person_id=56806485%40N00';
document.write('<iframe style="background-color:#'+zg_bg_color+'; border-color:#'+zg_bg_color+'; border:none;" width="113" height="151" frameborder="0" scrolling="no" src="'+zgi_url+'" title="Flickr Badge"><\/iframe>');
if (document.getElementById) document.write('<div id="zg_whatlink"><a href="http://www.flickr.com/badge.gne"	style="color:#3993ff;" onclick="zg_toggleWhat(); return false;">What is this?<\/a><\/div>');
}
zg_toggleWhat = function() {
document.getElementById('zg_whatdiv').style.display = (document.getElementById('zg_whatdiv').style.display != 'none') ? 'none' : 'block';
document.getElementById('zg_whatlink').style.display = (document.getElementById('zg_whatdiv').style.display != 'none') ? 'none' : 'block';
return false;
}
</script>
<div class="zg_div"><div class="zg_div_inner"><a href="http://www.flickr.com">www.<strong style="color:#3993ff">flick<span style="color:#ff1c92">r</span></strong>.com</a><br>
<script type="text/javascript">zg_insert_badge();</script>
<div id="zg_whatdiv">This is a Flickr badge showing public photos from <a href="http://www.flickr.com/photos/56806485@N00">merriecontrary</a>. Make your own badge <a href="http://www.flickr.com/badge.gne">here</a>.</div>
<script type="text/javascript">if (document.getElementById) document.getElementById('zg_whatdiv').style.display = 'none';</script>
</div>
</div>
<!-- End of Flickr Badge -->
</li>
		</ul>
	</li>
</ul></div></div></div></div>
<div class="clear">&nbsp;</div>

<div class="bl"><div class="br"><div class="tl"><div class="tr"><ul>
	<li>
		<p style="text-align:center"><a href="http://www.amazon.com/gp/registry/wishlist/1FZ31KM8Q7GS3/ref=wl_web/"><img src="http://ec1.images-amazon.com/images/G/01/gifts/registries/wishlist/v2/web/wl-btn-129-b._V46776269_.gif" width="129" alt="My Amazon.com Wish List" height="42" border="0" /></a></p>
	</li>
</ul></div></div></div></div>
<div class="clear">&nbsp;</div>

<div class="bl"><div class="br"><div class="tl"><div class="tr"><ul>
	<li>
		<ul>
			<li><?php get_calendar(); ?></li>
		</ul>
	</li>
</ul></div></div></div></div>
<div class="clear">&nbsp;</div>

<!--
<ul>
<?php wp_list_pages('depth=1&title_li=<h2>' . __('Pages') . '</h2>' ); ?>
</ul>
-->

<div class="bl"><div class="br"><div class="tl"><div class="tr"><ul>
	<li><h2><?php _e('Categories'); ?></h2>
		<ul>
			<!-- <?php wp_list_cats('sort_column=ID&optioncount=0&children=0'); ?> -->
   <form action="<?php bloginfo('url'); ?>" method="get">
   <?php wp_dropdown_categories(); ?>
   <input type="submit" name="submit" value="view" />
   </form>
		</ul>
	</li>
</ul></div></div></div></div>
<div class="clear">&nbsp;</div>

<div class="bl"><div class="br"><div class="tl"><div class="tr"><ul>
	<li><h2><?php _e('Archives'); ?></h2>
		<ul>
			<!-- <?php wp_get_archives('type=monthly'); ?> -->
<select name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'> 
  <option value=""><?php echo attribute_escape(__('Select Month')); ?></option> 
  <?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?> </select>
		</ul>
	</li>
</ul></div></div></div></div>
<div class="clear">&nbsp;</div>

<div class="bl"><div class="br"><div class="tl"><div class="tr"><ul>
<?php get_links_list(); ?>
</ul></div></div></div></div>
<div class="clear">&nbsp;</div>

<div class="bl"><div class="br"><div class="tl"><div class="tr"><ul>
	<li><h2><?php _e('Search'); ?></h2>
		<ul>
			<li><?php include(TEMPLATEPATH . '/searchform.php'); ?></li>
		</ul>
	</li>
</ul></div></div></div></div>
<div class="clear">&nbsp;</div>

<!-- <ul>
	<li><h2><?php _e('Meta'); ?></h2>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<li><a href="<?php echo bloginfo('rss2_url'); ?>"><?php _e('Entries RSS'); ?></a></li>
			<li><a href="<?php echo bloginfo('comments_rss2_url'); ?>"><?php _e('Comments RSS'); ?></a></li>
			<li><a href="http://validator.w3.org/check?uri=referer"><?php _e('Valid XHTML'); ?></a></li>
			<?php wp_meta(); ?>
		</ul>
	</li>
</ul> -->

<!-- <ul>
	<li><h2><?php _e('Syndicate'); ?></h2>
		<ul>
			<li>
<a href="http://my.msn.com/addtomymsn.armx?id=rss&amp;ut=<?php echo bloginfo('rss2_url'); ?>&amp;ru=<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/addmymsn.gif" alt="Add to MyMSN" /></a>
			</li>

			<li>
<a href="http://add.my.yahoo.com/rss?url=<?php echo bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/addmyyahoo.gif" alt="Add to MyYahoo" /></a>
			</li>

			<li>
<a href="http://fusion.google.com/add?feedurl=<?php echo bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/addgoogle.gif" alt="Add to Google Reader" /></a>
			</li>

			<li>
<a href="http://www.bloglines.com/sub/<?php echo bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/addbloglines.gif" alt="Add to Bloglines" /></a>
			</li>

			<li>
<a href="http://www.newsgator.com/ngs/subscriber/subext.aspx?url=<?php echo bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/addnewsgator.gif" alt="Add to Newsgator" /></a>
			</li>

			<li>
<a href="http://www.newsisfree.com/user/sub/?url=<?php echo bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/addnewsisfree.gif" alt="Add to NewsIsFree" /></a>
			</li>
		</ul>
	</li>
</ul> -->

<?php endif; ?>

</div>
<!-- ######### END SIDEBAR -->