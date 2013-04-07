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
									<h1 class="entry-title"><?php single_cat_title(); ?></h1>
								</header>
								<!-- .entry-header -->
								<!-- .entry-content -->
								<div class="entry-content">
									<!-- FILTERS -->
									<ul id="filters">
										<?php
											$for_sub_cats = get_categories( array( 'type' => 'portfolio', 'taxonomy' => 'department' ) );
											$for_sub_cat_out = "";
											
											foreach ( $for_sub_cats as $for_sub_cat ) :
											
												if ( single_cat_title( '', false ) == $for_sub_cat->name )
												{
													$for_sub_cat_out = $for_sub_cat->term_taxonomy_id;
												}
												
											endforeach;
											
											$pf_terms = get_categories( array( 'type' => 'portfolio', 'taxonomy' => 'department', 'parent' => $for_sub_cat_out ) );
											
											if ( count( $pf_terms ) >= 2 )
											{
												?>
													<li class="current">
														<a href="#" data-filter="*"><?php echo __( 'all', 'read' ); ?></a>
													</li>
												<?php
											}
											
											foreach ( $pf_terms as $pf_term ) :
												?>
													<li>
														<a href="<?php echo get_home_url() . '/department/' . $pf_term->slug; ?>" data-filter=".<?php echo $pf_term->slug; ?>"><?php echo $pf_term->name; ?></a>
													</li>
												<?php
											endforeach;
										?>
									</ul>
									<!-- FILTERS -->
									<!-- PORTFOLIO -->
									<?php
										$pf_ajax = get_option( 'pf_ajax', 'Yes' );
										
										if ( ( $pf_ajax == 'No' ) || ( isset( $_GET['pf_ajax'] ) ) )
										{
											?>
												<div class="portfolio-items">
													<?php
														$args_department = array( 'post_type' => 'portfolio', 'department' => single_cat_title( '', false ), 'posts_per_page' => -1 );
														$loop_department = new WP_Query( $args_department );
														
														if ( $loop_department->have_posts() ) :
															while ( $loop_department->have_posts() ) : $loop_department->the_post();
																
																$pf_type = get_option( $post->ID . 'pf_type' );
																
																if ( $pf_type == 'Standard' )
																{
																	get_template_part( 'portfolio', 'standard' );
																}
																elseif ( $pf_type == 'Lightbox Image' )
																{
																	get_template_part( 'portfolio', 'image' );
																}
																elseif ( $pf_type == 'Lightbox Video' )
																{
																	get_template_part( 'portfolio', 'video' );
																}
																elseif ( $pf_type == 'Direct URL' )
																{
																	get_template_part( 'portfolio', 'url' );
																}
																
															endwhile;
														endif;
														wp_reset_query();
													?>
												</div>
											<?php
										}
										else
										{
											$pf_item_per_page = get_option( 'pf_item_per_page', '5' );
											
											?>
												<div class="portfolio-items loading" data-itemPerPage="<?php echo $pf_item_per_page; ?>"></div>
												<a id="loadmore" class="loadmore" href="?pf_ajax"><?php echo __( 'MORE ITEMS', 'read' ); ?></a>	
											<?php
										}
									?>
									<!-- PORTFOLIO -->
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