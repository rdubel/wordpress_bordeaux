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
                <p>test !</p>
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
                $args = array(
                                'orderby' => 'date',
                                'posts_per_page' => 1
                );
                $firstpost = get_posts($args);
                    foreach ($firstpost as $post) {
                        setup_postdata( $post );
                            $do_not_duplicate = $post->ID;
                            get_template_part( 'template-parts/content' );
                    }

                // $categories = get_categories( array( 'orderby' => 'name', 'order' => 'ASC' ) );
                // foreach( $categories as $category ) {
                //     echo '<h2>'.$category->name.'</h2>';
                //         $args = array( 'posts_per_page' => -1, 'order'=> 'ASC', 'orderby' => 'title', 'category' => $category->cat_ID );
                //         $postslist = get_posts( $args );
                //             foreach ( $postslist as $post ) :
                // $my_query = new WP_Query('showposts=1');
                // while ( $my_query->have_posts() ) : $my_query->the_post();
                // endwhile;
                ?>
            </div>
            <h3>ACTUALITES</h3>
            <div id="post-wrapper2" class="post-wrapper clearfix">
                <?php
                $args = array(
                    'orderby' => 'date',
                    'posts_per_page' => 6,
                    'category_name' => 'actualites'
                );
                $secposts = get_posts($args);
                foreach ($secposts as $post) {
                    setup_postdata( $post );
                        if ( $post->ID != $do_not_duplicate && 'post' === get_post_type() ) :
                            get_template_part( 'template-parts/content' );
                        endif;
                }
                    ?>

    			</div>
                <div class="">
                    <iframe src="//v.calameo.com/library/?type=account&id=1480121&rows=1&sortBy=latestIssue&theme=any&bgColor=ebebeb&thumbSize=normal&showTitle=false&showShadow=true&showGloss=false&showInfo=no&linkTo=embed" height="185" width="100%" frameborder="0" allowfullscreen allowtransparency></iframe>
                </div>
                <div class="middle">
                    <div class="video">
                        <h3>VIDEOS</h3>
                        <iframe id="dm_jukebox_iframe" allowfullscreen="true" allowtransparency="true" style="overflow:hidden; margin:0; padding:0; width: 100%; height: 302px;" marginwidth="0" marginheight="0" src="http://www.dailymotion.com/widget/jukebox?list[]=%2Fplaylist%2Fx2a4hy_villedebordeaux_a-la-une%2F1&&autoplay=0&mute=0" width="100%" frameborder="0" align="middle"></iframe>
                    </div>
                    <div class="politique">
                        <h3>POLITIQUE</h3>
                        <?php
                        $args = array(
                            'orderby' => 'date',
                            'posts_per_page' => 2,
                            'category_name' => 'politique'
                        );
                        $politiqueposts = get_posts($args);
                        foreach ($politiqueposts as $post) {
                            setup_postdata( $post );
                                get_template_part( 'template-parts/content' );
                        }
                            ?>
                    </div>
                </div>

		<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
