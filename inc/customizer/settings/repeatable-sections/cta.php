<?php
/**
 * Portum Theme Customizer repeatable section
 *
 * @package Portum
 * @since   1.0
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once dirname( __FILE__ ) . '/repeatable-section.php';

/**
 * Class Repeatable_Section_Call_To_Action
 */
class Repeatable_Section_Call_To_Action extends Repeatable_Section {
	/**
	 * Sets the section id
	 */
	public function set_id() {
		$this->id = 'cta';
	}

	/**
	 * Sets section title
	 */
	public function set_title() {
		$this->title = esc_html__( 'Call To Action', 'portum' );
	}

	/**
	 * Description
	 */
	public function set_description() {
		$this->description = esc_html__( 'A simple call to action section', 'portum' );
	}

	/**
	 * Sets section image
	 */
	public function set_image() {
		$this->image = esc_url( get_template_directory_uri() . '/assets/images/sections/ewf-icon-section-cta.png' );
	}

	/**
	 * Creates groups
	 */
	public function create_groups() {
		$this->groups = array(
			'regular'    => array(
				'icon'  => 'dashicons dashicons-welcome-write-blog',
				'label' => esc_html__( 'Content', 'epsilon-framework' ),
			),
			'background' => array(
				'icon'  => 'dashicons dashicons-admin-customizer',
				'label' => esc_html__( 'Background', 'epsilon-framework' ),
			),
			'layout'     => array(
				'icon'  => 'dashicons dashicons-layout',
				'label' => esc_html__( 'Layout', 'epsilon-framework' ),
			),
			'colors'     => array(
				'icon'  => 'dashicons dashicons-admin-appearance',
				'label' => esc_html__( 'Style', 'epsilon-framework' ),
			),
		);
	}

	/**
	 * Creates the section fields
	 */
	public function create_fields() {
		$this->fields = array_merge(
			$this->layout_fields(),
			$this->background_fields(),
			$this->color_fields(),
			$this->normal_fields()
		);
	}

	/**
	 * Layout fields
	 *
	 * @return array
	 */
	public function layout_fields() {
		return array(
			'cta_row_title_align'           => array(
				'id'          => 'cta_row_title_align',
				'type'        => 'select',
				'label'       => esc_html__( 'Section Layout', 'epsilon-framework' ),
				'description' => esc_html__( 'All sections support an alternating layout. The layout changes based on a section\'s title position. Currently available options are: title left / content right -- title center / content center -- title right / content left ', 'epsilon-framework' ),
				'group'       => 'layout',
				'choices'     => array(
					'top'    => esc_html__( 'Top', 'epsilon-framework' ),
					'bottom' => esc_html__( 'Bottom', 'epsilon-framework' ),
					'left'   => esc_html__( 'Left', 'epsilon-framework' ),
					'right'  => esc_html__( 'Right', 'epsilon-framework' ),
				),
				'default'     => ''
			),
			'cta_column_stretch'            => array(
				'id'          => 'cta_column_stretch',
				'type'        => 'select',
				'label'       => esc_html__( 'Section Width', 'epsilon-framework' ),
				'description' => esc_html__( 'Make the section stretch to full-width. Contained is default. There\'s also the option of boxed center. ', 'epsilon-framework' ),
				'group'       => 'layout',
				'choices'     => array(
					'fullwidth' => esc_html__( 'Fullwidth (100% width)', 'epsilon-framework' ),
					'boxedin'   => esc_html__( 'Contained (1170px width)', 'epsilon-framework' ),
				),
				'default'     => 'boxedin',
			),
			'cta_row_spacing_top'           => array(
				'id'          => 'cta_row_spacing_top',
				'type'        => 'select',
				'label'       => esc_html__( 'Padding Top', 'epsilon-framework' ),
				'description' => esc_html__( 'Adds padding top. ', 'epsilon-framework' ),
				'group'       => 'layout',
				'choices'     => array(
					'lg'   => esc_html__( 'Large (105px)', 'epsilon-framework' ),
					'md'   => esc_html__( 'Medium (75px)', 'epsilon-framework' ),
					'sm'   => esc_html__( 'Small (35px)', 'epsilon-framework' ),
					'none' => esc_html__( 'None (0px)', 'epsilon-framework' ),
				),
				'default'     => '',
			),
			'cta_row_spacing_bottom'        => array(
				'id'          => 'cta_row_spacing_bottom',
				'type'        => 'select',
				'label'       => esc_html__( 'Padding Bottom', 'epsilon-framework' ),
				'description' => esc_html__( 'Adds padding bottom.', 'epsilon-framework' ),
				'group'       => 'layout',
				'choices'     => array(
					'lg'   => esc_html__( 'Large (105px)', 'epsilon-framework' ),
					'md'   => esc_html__( 'Medium (75px)', 'epsilon-framework' ),
					'sm'   => esc_html__( 'Small (35px)', 'epsilon-framework' ),
					'none' => esc_html__( 'None (0px)', 'epsilon-framework' ),
				),
				'default'     => ''
			),
			'cta_column_alignment'          => array(
				'id'          => 'cta_column_alignment',
				'type'        => 'select',
				'label'       => esc_html__( 'Horizontal Alignment', 'epsilon-framework' ),
				'description' => esc_html__( 'Center/Left/Right align all of a sections content.', 'epsilon-framework' ),
				'group'       => 'layout',
				'choices'     => array(
					'left'   => esc_html__( 'Left', 'epsilon-framework' ),
					'center' => esc_html__( 'Center', 'epsilon-framework' ),
					'right'  => esc_html__( 'Right', 'epsilon-framework' ),
				),
				'default'     => 'center'
			),
			'cta_column_vertical_alignment' => array(
				'id'          => 'cta_column_vertical_alignment',
				'type'        => 'select',
				'label'       => esc_html__( 'Vertical Alignment', 'epsilon-framework' ),
				'description' => esc_html__( 'We recommend leaving this to center, but feel free to experiment with the options. Top/Bottom align can be useful when you have a layout of text + image on the same line.', 'epsilon-framework' ),
				'group'       => 'layout',
				'choices'     => array(
					'top'    => esc_html__( 'Top', 'epsilon-framework' ),
					'middle' => esc_html__( 'Middle', 'epsilon-framework' ),
					'bottom' => esc_html__( 'Bottom', 'epsilon-framework' ),
				),
				'default'     => 'middle'
			),
		);
	}

	/**
	 * Styling fields
	 *
	 * @return array
	 */
	public function background_fields() {
		$sizes = Epsilon_Helper::get_image_sizes();

		return array(
			'cta_background_type'     => array(
				'id'      => 'cta_background_type',
				'label'   => esc_html__( 'Background Type', 'epsilon-framework' ),
				'default' => false,
				'type'    => 'epsilon-toggle',
				'group'   => 'background',
			),
			'cta_background_color'    => array(
				'id'         => 'cta_background_color',
				'label'      => esc_html__( 'Background Color', 'epsilon-framework' ),
				//'description' => esc_html__( 'Setting a value for this field will create a color overlay on top of background image/videos.', 'epsilon-framework' ),
				'default'    => '',
				'type'       => 'epsilon-color-picker',
				'mode'       => 'rgba',
				'defaultVal' => '',
				'group'      => 'background',
			),
			'cta_background_image'    => array(
				'id'          => 'cta_background_image',
				'label'       => esc_html__( 'Background Image', 'epsilon-framework' ),
				'description' => esc_html__( 'Use this field to set a background image. Content will overlay on top of the image.', 'epsilon-framework' ),
				'type'        => 'epsilon-image',
				'default'     => '',
				'group'       => 'background',
				'size'        => 'full',
				'sizeArray'   => $sizes,
				'mode'        => 'url',
			),
			'cta_background_position' => array(
				'id'          => 'cta_background_position',
				'label'       => esc_html__( 'Background Position', 'epsilon-framework' ),
				'description' => esc_html__( 'We recommend using Center. Experiment with the options to see what works best for you.', 'epsilon-framwework' ),
				'default'     => '',
				'type'        => 'select',
				'group'       => 'background',
				'choices'     => array(
					'topleft'     => __( 'Top Left', 'epsilon-framework' ),
					'top'         => __( 'Top', 'epsilon-framework' ),
					'topright'    => __( 'Top Right', 'epsilon-framework' ),
					'left'        => __( 'Left', 'epsilon-framework' ),
					'center'      => __( 'Center', 'epsilon-framework' ),
					'right'       => __( 'Right', 'epsilon-framework' ),
					'bottomleft'  => __( 'Bottom Left', 'epsilon-framework' ),
					'bottom'      => __( 'Bottom', 'epsilon-framework' ),
					'bottomright' => __( 'Bottom Right', 'epsilon-framework' ),
				),
			),
			'cta_background_size'     => array(
				'id'          => 'cta_background_size',
				'label'       => esc_html__( 'Background Stretch', 'epsilon-framework' ),
				'description' => esc_html__( 'We usually recommend using cover as a default option.', 'epsilon-framework' ),
				'default'     => '',
				'type'        => 'select',
				'group'       => 'background',
				'choices'     => array(
					'cover'   => __( 'Cover', 'epsilon-framework' ),
					'contain' => __( 'Contain', 'epsilon-framework' ),
					'initial' => __( 'Initial', 'epsilon-framework' ),
				),
			),
			'cta_background_repeat'   => array(
				'id'          => 'cta_background_repeat',
				'label'       => esc_html__( 'Background Repeat', 'epsilon-framework' ),
				'description' => esc_html__( 'Set to background-repeat if you are using patterns. For parallax, we recommend setting to no-repeat.', 'epsilon-framework' ),
				'default'     => '',
				'type'        => 'select',
				'group'       => 'background',
				'choices'     => array(
					'no-repeat' => __( 'No Repeat', 'epsilon-framework' ),
					'repeat'    => __( 'Repeat', 'epsilon-framework' ),
					'repeat-y'  => __( 'Repeat Y', 'epsilon-framework' ),
					'repeat-x'  => __( 'Repeat X', 'epsilon-framework' ),
				),
			),
			'cta_background_parallax' => array(
				'id'          => 'cta_background_parallax',
				'label'       => esc_html__( 'Background Parallax', 'epsilon-framework' ),
				'description' => esc_html__( 'Toggling this to ON will enable the parallax effect. Make sure you have a  background image set before enabling it.', 'epsilon-framework' ),
				'default'     => false,
				'type'        => 'epsilon-toggle',
				'group'       => 'background',
			),
		);
	}

	/**
	 * Colors fields
	 *
	 * @return array
	 */
	public function color_fields() {
		return array(
			'cta_heading_color' => array(
				'selectors'     => array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ),
				'css-attribute' => 'color',
				'default'       => '',
				'label'         => __( 'Section Title Color', 'epsilon-framework' ),
				'description'   => '',
				'type'          => 'epsilon-color-picker',
				'mode'          => 'hex',
				'defaultVal'    => '',
				'group'         => 'colors',
			),
			'cta_text_color'    => array(
				'selectors'     => array( 'p' ),
				'css-attribute' => 'color',
				'default'       => '',
				'label'         => __( 'Section Paragraph Color', 'epsilon-framework' ),
				'description'   => '',
				'type'          => 'epsilon-color-picker',
				'mode'          => 'hex',
				'defaultVal'    => '',
				'group'         => 'colors',
			),
		);
	}

	/**
	 * Normal fields
	 *
	 * @return array
	 */
	public function normal_fields() {
		return array(
			'cta_title'                             => array(
				'label'             => esc_html__( 'Title', 'portum' ),
				'description'       => esc_html__( 'Section title', 'portum' ),
				'type'              => 'text',
				'default'           => esc_html__( 'Big, bold statement here.', 'portum' ),
				'sanitize_callback' => 'wp_kses_post',
			),
			'cta_description'                       => array(
				'label'             => esc_html__( 'Description', 'portum' ),
				'description'       => esc_html__( 'Use this to emphasize your Call To Action message.', 'portum' ),
				'type'              => 'text',
				'default'           => esc_html__( 'Small text cta your CTA here.', 'portum' ),
				'sanitize_callback' => 'wp_kses_post',
			),
			'cta_button_1_enable'                   => array(
				'label'   => esc_html__( 'Enable CTA button 1' ),
				'type'    => 'epsilon-toggle',
				'default' => true,
			),
			'cta_button_2_enable'                   => array(
				'label'   => esc_html__( 'Enable CTA button 2' ),
				'type'    => 'epsilon-toggle',
				'default' => true,
			),
			'cta_button_primary_label'              => array(
				'label'             => esc_html__( 'Primary button label', 'portum' ),
				'type'              => 'text',
				'default'           => esc_html__( 'Buy Now', 'portum' ),
				'sanitize_callback' => 'sanitize_textfield',
				'condition'         => array( 'cta_button_1_enable', true ),
			),
			'cta_button_primary_url'                => array(
				'label'             => esc_html__( 'Primary button URL', 'portum' ),
				'type'              => 'text',
				'default'           => esc_url( 'https://google.com' ),
				'sanitize_callback' => 'esc_url_raw',
				'condition'         => array( 'cta_button_1_enable', true ),
			),
			'cta_primary_btn_size'                  => array(
				'label'     => esc_html__( 'Primary Button Size', 'portum' ),
				'type'      => 'select',
				'default'   => 'ewf-btn--huge',
				'choices'   => array(
					'ewf-btn--huge'   => __( 'Huge', 'portum' ),
					'ewf-btn--medium' => __( 'Medium', 'portum' ),
					'ewf-btn--small'  => __( 'Small', 'portum' ),
				),
				'condition' => array( 'cta_button_1_enable', true ),
			),
			'cta_primary_btn_radius'                => array(
				'label'     => esc_html__( 'Primary Button Radius', 'portum' ),
				'type'      => 'epsilon-slider',
				'default'   => 0,
				'choices'   => array(
					'min'  => 0,
					'max'  => 50,
					'step' => 5,
				),
				'condition' => array( 'cta_button_1_enable', true ),
			),
			'cta_primary_button_background_color'   => array(
				'label'             => esc_html__( 'Primary Button Bg. Color', 'portum' ),
				'type'              => 'epsilon-color-picker',
				'default'           => '#000',
				'sanitize_callback' => 'wp_kses_post',
				'condition'         => array( 'cta_button_1_enable', true ),
			),
			'cta_primary_button_text_color'         => array(
				'label'             => esc_html__( 'Primary Button Text Color', 'portum' ),
				'type'              => 'epsilon-color-picker',
				'default'           => '#FFF',
				'sanitize_callback' => 'wp_kses_post',
				'condition'         => array( 'cta_button_1_enable', true ),
			),
			'cta_primary_button_border_color'       => array(
				'label'             => esc_html__( 'Primary Button Border Color', 'portum' ),
				'type'              => 'epsilon-color-picker',
				'default'           => '#EEE',
				'sanitize_callback' => 'wp_kses_post',
				'condition'         => array( 'cta_button_1_enable', true ),
			),
			'cta_button_secondary_label'            => array(
				'label'             => esc_html__( 'Secondary button label', 'portum' ),
				'type'              => 'text',
				'default'           => esc_html__( 'Secondary button', 'portum' ),
				'sanitize_callback' => 'sanitize_textfield',
				'condition'         => array( 'cta_button_2_enable', true ),
			),
			'cta_button_secondary_url'              => array(
				'label'             => esc_html__( 'Secondary button URL', 'portum' ),
				'type'              => 'text',
				'default'           => esc_url( 'https://google.com' ),
				'sanitize_callback' => 'esc_url_raw',
				'condition'         => array( 'cta_button_2_enable', true ),
			),
			'cta_secondary_btn_size'                => array(
				'label'     => esc_html__( 'Secondary Button Size', 'portum' ),
				'type'      => 'select',
				'default'   => 'ewf-btn--huge',
				'choices'   => array(
					'ewf-btn--huge'   => __( 'Huge', 'portum' ),
					'ewf-btn--medium' => __( 'Medium', 'portum' ),
					'ewf-btn--small'  => __( 'Small', 'portum' ),
				),
				'condition' => array( 'cta_button_2_enable', true ),
			),
			'cta_secondary_btn_radius'              => array(
				'label'     => esc_html__( 'Secondary Button Radius', 'portum' ),
				'type'      => 'epsilon-slider',
				'default'   => 0,
				'choices'   => array(
					'min'  => 0,
					'max'  => 50,
					'step' => 5,
				),
				'condition' => array( 'cta_button_2_enable', true ),
			),
			'cta_secondary_button_background_color' => array(
				'label'             => esc_html__( 'Secondary Button Bg. Color', 'portum' ),
				'type'              => 'epsilon-color-picker',
				'default'           => '#000',
				'sanitize_callback' => 'wp_kses_post',
				'condition'         => array( 'cta_button_2_enable', true ),
			),
			'cta_secondary_button_text_color'       => array(
				'label'             => esc_html__( 'Secondary Button Text Color', 'portum' ),
				'type'              => 'epsilon-color-picker',
				'default'           => '#FFF',
				'sanitize_callback' => 'wp_kses_post',
				'condition'         => array( 'cta_button_2_enable', true ),
			),
			'cta_secondary_button_border_color'     => array(
				'label'             => esc_html__( 'Secondary Button Border Color', 'portum' ),
				'type'              => 'epsilon-color-picker',
				'default'           => '#EEE',
				'sanitize_callback' => 'wp_kses_post',
				'condition'         => array( 'cta_button_2_enable', true ),
			),
			'cta_section_unique_id'                 => array(
				'label'             => esc_html__( 'Unique Section ID', 'portum' ),
				'description'       => esc_html__( 'Section Unique ID. Useful if you are looking to target this particular section with CSS / jQuery. Very useful as well for creating the one-page effect with smooth scrolling to section.', 'portum' ),
				'type'              => 'text',
				'sanitize_callback' => 'sanitize_key',
			),
		);
	}
}