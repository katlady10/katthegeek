<?php
/*
Template Name: Page with Sidebar
*/
?>

<?php
	get_header();
?>
                <!-- #primary -->
                <div id="primary" class="site-content span7">
					<!-- #content -->
					<div id="content" role="main">
                        <!-- .blog-posts -->
						<div class="blog-posts row">
							<?php
								if ( have_posts() ) :
									while ( have_posts() ) : the_post();
										?>
											<!-- .hentry -->
											<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
												<!-- .entry-header -->
												<header class="entry-header">
													<h1 class="entry-title"><?php the_title(); ?></h1>
												</header>
												<!-- .entry-header -->
												<!-- .entry-content -->
												<div class="entry-content">
												
													<?php
														the_content();
													?>
													
													<?php
														wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'read' ), 'after' => '</div>' ) );
													?>
													
												</div>
												<!-- .entry-content -->
											</article>
											<!-- .hentry -->
										<?php
									endwhile;
								endif;
								wp_reset_query();
							?>
							<?php
								comments_template( "", true );
							?>
						</div>
						<!-- .blog-posts -->
					</div>
					<!-- #content -->
                </div>
                <!-- #primary -->
				<!-- #secondary -->
				<?php
					get_sidebar();
				?>
				<!-- #secondary --> 
<?php
	get_footer();
?>