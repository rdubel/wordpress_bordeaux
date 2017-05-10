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
                // $categories = get_categories( array( 'orderby' => 'name', 'order' => 'ASC' ) );
                // foreach( $categories as $category ) {
                //     echo '<h2>'.$category->name.'</h2>';
                //         $args = array( 'posts_per_page' => -1, 'order'=> 'ASC', 'orderby' => 'title', 'category' => $category->cat_ID );
                //         $postslist = get_posts( $args );
                //             foreach ( $postslist as $post ) :
                //                 setup_postdata( $post );
                //                 // if ( is_user_logged_in() ) {
                //                     edit_post_link();
                $args = array(
                    'order' => 'date',
                    'posts_per_page'   => 1
                );
                $firstpost = get_posts($args);
                foreach ($firstpost as $post ) {
                    $do_not_duplicate = $post->ID;
                    setup_postdata( $firstpost );
                    get_template_part( 'template-parts/content' );
                }


                // $my_query = new WP_Query('showposts=1');
                // while ( $my_query->have_posts() ) : $my_query->the_post();
                //     $do_not_duplicate = $post->ID;
                //     get_template_part( 'template-parts/content' );
                // endwhile;
                ?>
            </div>
            <h3>ACTUALITES</h3>
            <div id="post-wrapper2" class="post-wrapper clearfix">
                <?php
                $args = array(
                    'order' => 'date',
                    'posts_per_page' => 4,
                    'category_name' => 'actualites'
                );
                    $secposts = get_posts($args);;
                        foreach($secposts as $post):
                            setup_postdata( $secposts );

                            if ( $post->ID != $do_not_duplicate && 'post' === get_post_type() ) :
                                get_template_part( 'template-parts/content' );
                            endif;
                        endforeach; ?>

    			</div>

    			<?php wellington_pagination(); ?>

		<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
