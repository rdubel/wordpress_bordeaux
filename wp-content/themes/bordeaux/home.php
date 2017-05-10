<?php
/**
 * The template for displaying the blog index (latest posts)
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wellington
 */

get_header(); ?>

	<section id="primary" class="content-archive content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Display Magazine Homepage Widgets.
		if ( ! is_paged() && is_active_sidebar( 'magazine-homepage' ) ) : ?>

			<div id="magazine-homepage-widgets" class="widget-area clearfix">

				<?php dynamic_sidebar( 'magazine-homepage' ); ?>

			</div><!-- #magazine-homepage-widgets -->

			<?php
		endif;

		if ( have_posts() ) :

			wellington_blog_title(); ?>

            <div id="post-wrapper" class="post-wrapper clearfix">

				<?php
                $my_query = new WP_Query('showposts=1');
                while ( $my_query->have_posts() ) : $my_query->the_post();
                    $do_not_duplicate = $post->ID;
                    get_template_part( 'template-parts/content' );
                endwhile;
                ?>
            </div>
            <h3>ACTUALITES</h3>
            <div id="post-wrapper2" class="post-wrapper clearfix">
                <?php
                    query_posts('showposts=4');
                        while ( have_posts() ) : the_post();
                            if ( $post->ID != $do_not_duplicate && 'post' === get_post_type() ) :
                                get_template_part( 'template-parts/content' );
                            endif;
                        endwhile; ?>

    			</div>

                	<iframe src="//v.calameo.com/library/?type=account&id=1480121&rows=1&sortBy=latestIssue&theme=any&bgColor=ebebeb&thumbSize=normal&showTitle=false&showShadow=true&showGloss=false&showInfo=no&linkTo=embed" height="185" width="100%" frameborder="0" allowfullscreen allowtransparency></iframe>
                    

		<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
