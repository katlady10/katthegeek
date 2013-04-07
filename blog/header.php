<!doctype html>

<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php echo get_bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
	<title><?php wp_title( '|', true, 'right' ); ?></title>
    
    <!--[if lte IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/selectivizr-min.js"></script>
    <![endif]-->
	
	<?php
		if ( is_singular() && get_option( 'thread_comments' ) )
		{
			wp_enqueue_script( 'comment-reply' );
		}
	?>
	<link rel="stylesheet" type="text/css" href="http://katthegeek.com/_assets/styles/fonts.css">
	<?php
		wp_head();
	?>
</head>

<body <?php body_class(); ?>>

    <div id="page" class="hfeed site"> 
        <header class="site-header wrapper" role="banner">
			<nav id="site-navigation" class="main-navigation wrapper" role="navigation">
				<div class="row">
					<ul class="menu-default">
						<li class="page_item"><a href="http://katthegeek.com/">home</a></li>
						<li class="page_item"><a href="http://katthegeek.com/blog">blog</a></li>
						<li class="page_item" style="float:right; margin-right:0px;"><a href="http://katthegeek.com/blog/contact">contact me</a></li>
					</ul>
					</div>
			    </nav>

        </header>
        <!-- end .site-header -->
		
		<?php
			if ( is_home() || is_archive() )
			{
				$blog_type = get_option( 'blog_type', 'Sidebar' );
				
				if ( $blog_type == 'Sidebar' )
				{
					$blog_type_out = 'blog-with-sidebar';
				}
				else
				{
					$blog_type_out = "";
				}
			}
			else
			{
				$blog_type_out = "";
			}
			// end if
		?>
		
        <section id="main" class="middle wrapper">
			<div class="row row-fluid <?php echo $blog_type_out; ?>">