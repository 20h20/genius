<?php
	/* Template Name: Template Modulable */
	get_header();
?>
	<div class="cbo-page">
		<?php
			global $flexible_count;
			if( have_rows('flexible_layout') ):
				while ( have_rows('flexible_layout') ) : the_row();
				++$flexible_count;

					///////////////////
					// HERO
					if( get_row_layout() == 'herorich' ):
						get_template_part( 'templates/blocks/herorich');

					///////////////////
					// SECTION TEXT PICTURE
					elseif( get_row_layout() == 'textpicture' ):
						get_template_part( 'templates/blocks/textpicture');

					///////////////////
					// SECTION BLOCS ENRICHIS
					elseif( get_row_layout() == 'richblocs' ):
						get_template_part( 'templates/blocks/richblocs');

					///////////////////
					// SECTION TEAM
					elseif( get_row_layout() == 'team' ):
						get_template_part( 'templates/blocks/team');

					///////////////////
					// SECTION CHIFFRES CLES
					elseif( get_row_layout() == 'keynumbers' ):
						get_template_part( 'templates/blocks/keynumbers');

					///////////////////
					// SECTION BLOCS
					elseif( get_row_layout() == 'blocs' ):
						get_template_part( 'templates/blocks/blocs');

					///////////////////
					// SECTION BLOCS BACKGROUND
					elseif( get_row_layout() == 'blocsbackground' ):
						get_template_part( 'templates/blocks/blocsbackground');

					///////////////////
					// SECTION TEXT PICTURE LIST
					elseif( get_row_layout() == 'textpicturelist' ):
						get_template_part( 'templates/blocks/textpicturelist');

					///////////////////
					// SECTION TESTIMONIALS LIST
					elseif( get_row_layout() == 'testimonials' ):
						get_template_part( 'templates/blocks/testimonials');

					///////////////////
					// SECTION PARTNERS
					elseif( get_row_layout() == 'partners' ):
						get_template_part( 'templates/blocks/partners');

					///////////////////
					// SECTION RELATION
					elseif( get_row_layout() == 'relation' ):
						get_template_part( 'templates/blocks/relation');

					///////////////////
					// CALL TO ACTION
					elseif( get_row_layout() == 'cta' ):
						get_template_part( 'templates/blocks/cta');

					///////////////////
					// SECTION TEXT
					elseif( get_row_layout() == 'text' ):
						get_template_part( 'templates/blocks/text');

					///////////////////
					// SECTION PICTURE FULL
					elseif( get_row_layout() == 'picfull' ):
						get_template_part( 'templates/blocks/picfull');

					///////////////////
					// SECTION CONTEXT BLOCS
					elseif( get_row_layout() == 'context' ):
						get_template_part( 'templates/blocks/context');

					///////////////////
					// SECTION BLOCS SIMPLE
					elseif( get_row_layout() == 'blocssimple' ):
						get_template_part( 'templates/blocks/blocssimple');

					endif;
				endwhile;
			endif;
		?>
	</div>
<?php
	get_footer();
?>