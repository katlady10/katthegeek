<?php
	get_header();
?>

                <div id="primary" class="site-content">
                    <div id="content" role="main">
						<div class="readable-content row-fluid page">
							<?php
								if ( have_posts() ) :
									while ( have_posts() ) : the_post();
										?>
											<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
												<header class="entry-header">
													<h1 class="entry-title"><?php the_title(); ?></h1>
												</header>
												<!-- end .entry-header -->
												
												<div class="entry-content">
													<?php
														the_content();
													?>
													
													<?php
														wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'read' ), 'after' => '</div>' ) );
													?>
												</div>
												<!-- end .entry-content -->
											</article>
											<!-- end .hentry -->
										<?php
									endwhile;
								endif;
								wp_reset_query();
							?>
							
							<?php
								comments_template( "", true );
							?>
						</div>
						<!-- end .readable-content -->
                    </div>
                    <!-- end #content -->
                </div>
                <!-- end #primary -->
				
<?php
	get_footer();
?>