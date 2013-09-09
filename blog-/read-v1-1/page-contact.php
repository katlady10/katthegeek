<?php
/*
Template Name: Contact
*/
?>

<?php
	get_header();
?>
<?php
					get_sidebar();
				?>

                <div id="primary" class="site-content span8" style="float:right;">
                    <div id="content" role="main">
						
							<?php
								if ( have_posts() ) :
									while ( have_posts() ) : the_post();
										?>
											<article style="text-align:left !important; padding:25px 30px;" id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> 
												<header class="entry-header">
													<h1 class="entry-title"><?php the_title(); ?></h1>
												</header>
												<!-- end .entry-header -->
												
												<?php
													$enable_map = stripcslashes( get_option( 'enable_map', 'No' ) );
													
													if ( $enable_map == 'Yes' )
													{
														$map_embed_code = stripcslashes( get_option( 'map_embed_code', "" ) );
														
														?>
															<div class="map">
																<h4><?php echo __( 'Where am I in this world?', 'read' ); ?></h4>
																
																<?php
																	echo $map_embed_code;
																?>
															</div>
															<!-- end map -->
														<?php
													}
													// end if
												?>
												
												<?php
													$disable_contact_form = stripcslashes( get_option( 'disable_contact_form', 'No' ) );
													
													if ( $disable_contact_form == 'No' )
													{
														$contact_form_email = stripcslashes( get_option( 'contact_form_email', "" ) );
														
														?>
															
															<div class="contact-form">
																<form id="contact-form" method="post" action="<?php echo get_template_directory_uri(); ?>/send-mail.php">
																	<input type="hidden" id="to" name="to" value="<?php echo $contact_form_email; ?>">
																	<p>
																	  <label for="name"><?php echo __( 'Your Name', 'read' ); ?></label>
																	  <input type="text" id="name" name="name" class="required">
																	</p>
																	<p>
																	  <label for="email"><?php echo __( 'Your Email', 'read' ); ?></label>
																	  <input type="text" name="email" id="email" class="required">
																	</p>
																	<p>
																	  <label for="subject"><?php echo __( 'Subject', 'read' ); ?></label>
																	  <input type="text" name="subject" id="subject" class="required">
																	</p>
																	<p>
																	  <label for="message"><?php echo __( 'Your Message', 'read' ); ?></label>
																	  <textarea name="message" id="message" class="required"></textarea>
																	</p>
																	<p>
																	  <input type="submit" value="<?php echo __( 'Send it', 'read' ); ?>">
																	  <img class="ajax-loader"  alt="Sending ..." src="<?php echo get_template_directory_uri(); ?>/images/bckg/loader_light.gif">
																	</p>
																</form>
															</div>
															<!-- end .contact-form -->
														<?php
													}
													// end if
												?>
												
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
						
						<!-- end .row -->
                    </div>
                    <!-- end #content -->
                </div>
                <!-- end #primary -->
				
<?php
	get_footer();
?>