<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Archive <?php } ?> <?php wp_title(); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_get_archives('type=monthly&format=link'); ?>

	<?php wp_head(); ?>
</head>
<body><div id="container"><div id="page">

<!-- ######### TITLE -->
<!-- <h1><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1> -->
<!-- ######### END TITLE -->


<!-- ######### DESCRIPTION -->
<!-- <div class="description">
<p><?php bloginfo('description'); ?></p>
</div> -->
<!-- ######### END DESCRIPTION -->

<div id="banner">
    <a href="<?php bloginfo('url'); ?>/"></a>
</div>

<!--<a href="<?php bloginfo('url'); ?>/"><img id="banner" src="<?php bloginfo('template_directory'); ?>/images/bannerandwords.jpg" alt="mary's having thumb fun"/></a> -->

<!-- ######### MAIN MENU -->
<!--
<div id="top-menu">
</div>
-->
<!--
<p>
<a href="<?php bloginfo('url'); ?>/">Home</a>
<a href="<?php bloginfo('url'); ?>/about/">About</a>
</p>
</div> -->
<!-- ######### END MAIN MENU -->

