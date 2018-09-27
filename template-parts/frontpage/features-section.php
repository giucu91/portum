<?php
/**
 * Template part for displaying a frontpage section
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Portum
 */

$frontpage          = Epsilon_Page_Generator::get_instance( 'portum_frontpage_sections_' . get_the_ID(), get_the_ID() );
$fields             = $frontpage->sections[ $section_id ];
$grouping           = array(
	'values'   => $fields['features_grouping'],
	'group_by' => 'feature_title',
);
$fields['features'] = $frontpage->get_repeater_field( $fields['features_repeater_field'], array(), $grouping );

$attr_helper = new Epsilon_Section_Attr_Helper( $fields, 'services', Portum_Repeatable_Sections::get_instance() );

$parent_attr = array(
	'id'    => $fields['features_section_unique_id'] ? array( $fields['features_section_unique_id'] ) : array(),
	'class' => array(
		'section-services',
		'section',
		'ewf-section',
		'contrast',
		'ewf-section-' . $fields['features_section_visibility'],
	),
	'style' => array( 'background-image', 'background-position', 'background-size', 'background-repeat' ),
);
$counter     = 1;

foreach ( $fields['features'] as $key => $feature ) {
	if ( $counter <= 3 ) {
		$array_left[ $key ] = $feature;
	} else if ( $counter >= 3 && $counter <= 6 ) {
		$array_right[ $key ] = $feature;
		if ( $counter === 6 ) {
			$counter = 0; // reset counter as we've reached the 8th element
		}
	}
	$counter++;
}

?>

<section data-customizer-section-id="portum_repeatable_section" data-section="<?php echo esc_attr( $section_id ); ?>">
	<?php //Portum_Helper::generate_inline_css( $section_id, 'services', $fields ); ?>
	<?php echo wp_kses( Epsilon_Helper::generate_pencil( 'Portum_Repeatable_Sections', 'services' ), Epsilon_Helper::allowed_kses_pencil() ); ?>
	<div <?php $attr_helper->generate_attributes( $parent_attr ); ?>>
		<?php $attr_helper->generate_color_overlay(); ?>

		<div class="ewf-section__content">
			<div class="<?php echo esc_attr( Portum_Helper::container_class( 'services', $fields ) ); ?>">

				<div class="row">

					<!-- Check if we have a title/subtitle -->
					<?php if ( ! empty( $fields['features_subtitle'] ) || ! empty( $fields['features_title'] ) ) { ?>
						<div class="col-xs-12">
							<div class="ewf-section-text ewf-text-align--center">
								<?php echo wp_kses_post( Portum_Helper::generate_section_title( $fields['features_subtitle'], $fields['features_title'] ) ); ?>
								<?php echo wpautop( wp_kses_post( $fields['features_description'] ) ); ?>
							</div><!--/.ewf-section-text-->
						</div><!--/.col-->
					<?php }//endif  ?>
					<!-- // End Title Check -->

					<!-- Check if we have values in our field repeater -->
					<?php if ( ! empty( $fields['features'] ) ) { ?>
					<div class="col-xs-12 col-sm-4 ">

						<?php foreach ( $array_left as $key => $feature ) { ?>
							<?php
							$icon_style = 'color: ' . ( ! empty( $feature['feature_icon_color'] ) ? esc_attr( $feature['feature_icon_color'] ) : 'inherit' ) . ';';
							$icon_style .= 'background-color: ' . ( ! empty( $feature['feature_bg_icon_color'] ) ? esc_attr( $feature['feature_bg_icon_color'] ) : 'inherit' ) . ';';
							$icon_style .= 'border-color: ' . ( ! empty( $feature['feature_border_icon_color'] ) ? esc_attr( $feature['feature_border_icon_color'] ) : 'inherit' ) . ';';
							$icon_style .= 'font-size: ' . ( ! empty( $feature['feature_icon_size'] ) ? esc_attr( $feature['feature_icon_size'] ) : 'inherit' ) . 'px;';
							$icon_style .= 'border-width: ' . ( ! empty( $feature['feature_border_icon_size'] ) ? esc_attr( $feature['feature_border_icon_size'] ) : '0' ) . 'px;';
							$icon_style .= 'border-radius: ' . ( ! empty( $feature['feature_border_icon_radius'] ) ? esc_attr( $feature['feature_border_icon_radius'] ) : '0' ) . 'px;';
							if ( ! empty( $feature['feature_icon_size'] ) && ! empty( $feature['feature_border_icon_size'] ) ) {
								$icon_style .= 'padding: ' . esc_attr( $feature['feature_icon_size'] / 3 . 'px;' );
							}

							$item_style = 'background-color: ' . ( ! empty( $feature['features_bg_color'] ) ? esc_attr( $feature['features_bg_color'] ) : '' );
							?>

							<div class="features-left features-item <?php echo esc_attr( $item_effect_style ); ?>" style="<?php echo esc_attr( $item_style ); ?>">
								<?php
								echo wp_kses( Epsilon_Helper::generate_field_repeater_pencil( $key, 'portum_features_section', 'portum_services' ), Epsilon_Helper::allowed_kses_pencil() );
								?>
								<?php if ( ! empty( $feature['feature_icon'] ) ) { ?>
									<i class="<?php echo esc_attr( $feature['feature_icon'] ); ?>" style="<?php echo esc_attr( $icon_style ); ?>"></i>
								<?php } ?>

								<?php if ( ! empty( $feature['feature_title'] ) ) { ?>
									<div class="ewf-like-h6">
										<?php echo wp_kses_post( $feature['feature_title'] ); ?>
									</div><!--/.ewf-like-h6-->
								<?php } ?>

								<?php if ( ! empty( $feature['feature_description'] ) ) { ?>
									<p><?php echo wp_kses_post( $feature['feature_description'] ); ?></p>
								<?php } ?>
							</div><!--/.features-item-->

						<?php }//end foreach ?>
					</div>

					<div class="col-xs-12 col-sm-4">
						<div class="features-image">
							<img src="<?php echo esc_url( $fields['features_image'] ); ?>" />
						</div>
					</div>

					<div class="col-xs-12 col-sm-4">
						<?php foreach ( $array_right as $key => $feature ) { ?>
							<?php
							$icon_style = 'color: ' . ( ! empty( $feature['feature_icon_color'] ) ? esc_attr( $feature['feature_icon_color'] ) : 'inherit' ) . ';';
							$icon_style .= 'background-color: ' . ( ! empty( $feature['feature_bg_icon_color'] ) ? esc_attr( $feature['feature_bg_icon_color'] ) : 'inherit' ) . ';';
							$icon_style .= 'border-color: ' . ( ! empty( $feature['feature_border_icon_color'] ) ? esc_attr( $feature['feature_border_icon_color'] ) : 'inherit' ) . ';';
							$icon_style .= 'font-size: ' . ( ! empty( $feature['feature_icon_size'] ) ? esc_attr( $feature['feature_icon_size'] ) : 'inherit' ) . 'px;';
							$icon_style .= 'border-width: ' . ( ! empty( $feature['feature_border_icon_size'] ) ? esc_attr( $feature['feature_border_icon_size'] ) : '0' ) . 'px;';
							$icon_style .= 'border-radius: ' . ( ! empty( $feature['feature_border_icon_radius'] ) ? esc_attr( $feature['feature_border_icon_radius'] ) : '0' ) . 'px;';
							if ( ! empty( $feature['feature_icon_size'] ) && ! empty( $feature['feature_border_icon_size'] ) ) {
								$icon_style .= 'padding: ' . esc_attr( $feature['feature_icon_size'] / 3 . 'px;' );
							}

							$item_style = 'background-color: ' . ( ! empty( $feature['features_bg_color'] ) ? esc_attr( $feature['features_bg_color'] ) : '' );
							?>

							<div class="features-right features-item <?php echo esc_attr( $item_effect_style ); ?>" style="<?php echo esc_attr( $item_style ); ?>">
								<?php
								echo wp_kses( Epsilon_Helper::generate_field_repeater_pencil( $key, 'portum_features_section', 'portum_services' ), Epsilon_Helper::allowed_kses_pencil() );
								?>
								<?php if ( ! empty( $feature['feature_icon'] ) ) { ?>
									<i class="<?php echo esc_attr( $feature['feature_icon'] ); ?>" style="<?php echo esc_attr( $icon_style ); ?>"></i>
								<?php } ?>

								<?php if ( ! empty( $feature['feature_title'] ) ) { ?>
									<div class="ewf-like-h6">
										<?php echo wp_kses_post( $feature['feature_title'] ); ?>
									</div><!--/.ewf-like-h6-->
								<?php } ?>

								<?php if ( ! empty( $feature['feature_description'] ) ) { ?>
									<p><?php echo wp_kses_post( $feature['feature_description'] ); ?></p>
								<?php } ?>
							</div><!--/.features-item-->

						<?php }//end foreach ?>

					</div><!--/.col-sm--->
				</div><!--/.row-->
				<?php } ?>
			</div>
		</div>
	</div>
</section>