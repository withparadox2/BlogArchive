<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Azimeng
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/prettify/prettify-mma.css" type="text/css" media="screen, projection" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/prettify/prettify.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/prettify/lang-mma.js"></script>
<script type="text/javascript"
   src="<?php bloginfo( 'wpurl' ); ?>/wp-content/mathjax/MathJax.js?config=TeX-AMS-MML_HTMLorMML">

</script>
<script type="text/x-mathjax-config">
    MathJax.Hub.Config({
        TeX: {
            equationNumbers: {
                autoNumber: ["AMS"],
                useLabelIds: true
            }
        },
        "HTML-CSS": {
            linebreaks: {
                automatic: true
            },
            scale: 100,
            imageFont: null
        },
        SVG: {
            linebreaks: {
                automatic: true
            }
        }
    });
</script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> onload="prettyPrint()">
<div id="page" class="hfeed site">
<!--<img id="background-knot" src="<?php bloginfo('template_directory'); ?>/pic/knot.png" />-->

	<header id="masthead" class="site-header" role="banner">
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary','menu_class'=>'menu-background' ) ); ?>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
