                                <!-- .post .format-aside -->
								<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
                                    <header class="entry-header">
                                        <h1 class="entry-title">
											<?php
												$hide_post_title = get_option( $post->ID . 'hide_post_title', false );
												
												if ( $hide_post_title )
												{
													$hide_post_title_out = 'style="display: none;"';
												}
												else
												{
													$hide_post_title_out = "";
												}
											?>
                                            <a <?php echo $hide_post_title_out; ?> rel="bookmark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h1>
                                    </header>
                                    <!-- .entry-header -->
									
                                    <footer class="entry-meta">
                                        <a href="<?php the_permalink(); ?>" title="<?php the_time(); ?>" rel="bookmark"><time class="entry-date" datetime="2012-11-09T23:15:57+00:00"><?php echo get_the_date(); ?></time></a>
										
                                        <span class="comments-link">
											<?php
												comments_popup_link( __( '0 Comment', 'read' ), __( '1 Comment', 'read' ), __( '% Comments', 'read' ) );
											?>
                                        </span>
										
										<?php
											edit_post_link( __( 'Edit', 'read' ), '<span class="edit-link">', '</span>' );
										?>
                                    </footer>
                                    <!-- end .entry-meta -->
									
									<?php
										if ( has_post_thumbnail() )
										{
											?>
												<div class="featured-image">
													<?php
														the_post_thumbnail( 'blog_feat_img', array( 'alt' => get_the_title(), 'title' => "" ) );
													?>
												</div>
												<!-- end .featured-image -->
											<?php
										}
										// end if
									?>
									
                                    <div class="entry-content">
                                        <?php
											the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'read' ) );
										?>
										
										<?php
											wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'read' ), 'after' => '</div>' ) );
										?>
                                    </div>
                                    <!-- end .entry-content -->
                                </article>
                                <!-- end .post .format-aside -->