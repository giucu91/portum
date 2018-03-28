<?php
/**
 * Template part for displaying a frontpage section
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Portum
 */

$frontpage = Epsilon_Page_Generator::get_instance( 'portum_frontpage_sections_' . get_the_ID(), get_the_ID() );
$fields    = $frontpage->sections[ $section_id ];
$video     = Portum_Helper::video_type( $fields['video_id'] );

wp_enqueue_style( 'plyr' );
wp_enqueue_script( 'plyr' );
?>

<section data-customizer-section-id="portum_repeatable_section" data-section="<?php echo esc_attr( $section_id ); ?>">
	<div class="section-video section" <?php echo ! empty( $fields['video_section_unique_id'] ) ? 'id="' . $fields['video_section_unique_id'] . '"' : ''; ?>>
		<?php if ( is_customize_preview() ) { ?>
			<div class="container">
				<?php echo wp_kses( Portum_Helper::generate_pencil( 'Portum_Repeatable_Sections', 'video' ), Epsilon_Helper::allowed_kses_pencil() ); ?>
			</div>
		<?php } ?>
		<?php if ( 'none' !== $video['video_type'] ) { ?>
			<div class="video-area auto-resizable-iframe">
				<div data-type="<?php echo esc_attr( $video['video_type'] ); ?>" data-video-id="<?php echo esc_attr( $video['video_id'] ); ?>"></div>
			</div>
		<?php } ?>
	</div>
</section>
