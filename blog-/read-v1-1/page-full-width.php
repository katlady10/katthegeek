<?php
/*
Template Name: Full width Page
*/
?>

<?php
	get_header();
?>
                <!-- #primary -->
                <div id="primary" class="site-content">
                    <!-- #content -->
                    <div id="content" role="main">
						<!-- .row -->
						<div class="row-fluid page">
							<!-- .hentry -->
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
								<!-- .entry-header -->
								<header class="entry-header">
									<h1 class="entry-title"><?php single_post_title(); ?></h1>
								</header>
								<!-- .entry-header -->
								<!-- .entry-content -->
								<div class="entry-content">
									<?php
										if ( have_posts() ) :
											while ( have_posts() ) : the_post();
												
												the_content();
												
												wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'read' ), 'after' => '</div>' ) );
												
											endwhile;
										endif;
										wp_reset_query();
									?>
								</div>
								<!-- .entry-content -->
							</article>
							<!-- .hentry -->
							<?php
								comments_template( "", true );
							?>
						</div>
						<!-- .row -->
                    </div>
                    <!-- #content -->
                </div>
                <!-- #primary -->
<?php
	get_footer();
?>