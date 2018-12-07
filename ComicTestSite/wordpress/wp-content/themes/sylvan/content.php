
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<header>
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-header">', '</h1>' );
		else :
			the_title( sprintf( '<h2 class="entry-header"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		endif;
		?>
		
	</header><!-- .entry-header -->

	<div class="blog-post clearfix">
		<p class="blog-post-meta"><?php the_date(); ?> by <a href="#"><?php the_author(); ?></a></p>
			
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'sylvan' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

		?>
	</div>
</article>		
