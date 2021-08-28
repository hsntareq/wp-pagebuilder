<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class WPPB_Addon_Tile_card {

	public function get_name() {
		return 'wppb_tile_card';
	}
	public function get_title() {
		return 'Tile Card Addon';
	}
	public function get_icon() {
		return 'wppb-font-image';
	}

	public function get_enqueue_script() {
		return array('jquery.magnific-popup');
	}

	public function get_enqueue_style() {
		return array('magnific-popup');
	}

	// image Settings Fields
	public function get_settings() {

		$settings = array(

			'upload_image' => array(
				'type' => 'media',
				'title' => __('Upload image', 'wp-pagebuilder'),
				'std' => array('url' => WPPB_DIR_URL . 'assets/img/placeholder/wppb-medium.jpg'),
			),
			'tile_card_bg' => array(
				'type' => 'color2',
				'title' => 'Card background',
				'clip' => false,
				'std' => array(
					'colorType' => 'color',
					'colorColor' => '#ffffff',
					'clip' => false
				),
				'selector' => '{{SELECTOR}} .wppb-tile-card-addon',
			),
			'tile_card_title' => array(
				'type' => 'text',
				'title' => 'Card Title text',
				'std' => 'Tile Card Addon',
			),
			'tile_card_selector' => array(
				'type' => 'select',
				'title' => __('Card Title Tag', 'wp-pagebuilder'),
				'values' => array(
					'h2' => 'h2',
					'h3' => 'h3',
					'h4' => 'h4',
					'h5' => 'h5',
					'h6' => 'h6',
					'p' => 'p',
					'div' => 'div',
				),
				'std' => 'h3',
			),
			'tile_card_title_color' => array(
				'type' => 'color2',
				'title' => 'Card Title Color',
				'clip' => true,
				'std' => array('colorType' => 'color', 'clip' => true, 'colorColor' => ''),
				'selector' => '{{SELECTOR}} .wppb-addon-tile-card-title .wppb-tile-card-heading',
			),
			'tile_title_bg' => array(
				'type' => 'color2',
				'title' => 'Card Title Background',
				'clip' => false,
				'std' => array(
					'colorType' => 'color',
					'colorColor' => '#ffffff',
					'clip' => false
				),
				'selector' => '{{SELECTOR}} .wppb-addon-tile-card-title',
			),
			'tile_card_padding' => array(
				'type' => 'dimension',
				'title' => 'Card Title Padding',
				'unit' => array('px', 'em', '%'),
				'responsive' => true,
				'selector' => '{{SELECTOR}} .wppb-addon-tile-card-title { padding: {{data.tile_card_padding}}; }',
			),
			'tile_title_align' => array(
				'type' => 'alignment',
				'title' => __('Card Title Alignment', 'wp-pagebuilder'),
				'responsive' => true,
				'selector' => '{{SELECTOR}} .wppb-addon-tile-card-title { text-align: {{data.tile_title_align}}; }'
			),
			'link' => array(
				'type' => 'switch',
				'title' => __('Enable link', 'wp-pagebuilder'),
				'std' => '0'
			),
			'image_link' => array(
				'type' => 'link',
				'title' => __('Link', 'wp-pagebuilder'),
				'std' =>   array('link' => '', 'window' => true, 'nofolow' => false),
				'depends' => array(array('link', '!=', '0')),
			),
			'image_display' => array(
				'type' => 'select',
				'title' => __('Card Image display', 'wp-pagebuilder'),
				'values' => array(
					'imgblock' => __('Block', 'wp-pagebuilder'),
					'imginlineblock' => __('Inline Block', 'wp-pagebuilder'),
					'imginline' => __('Inline', 'wp-pagebuilder'),
				),
				'std' => 'imginlineblock',
			),
			'image_align' => array(
				'type' => 'alignment',
				'title' => __('Card Image Alignment', 'wp-pagebuilder'),
				'responsive' => true,
				'selector' => '{{SELECTOR}} .wppb-tile-card-addon-image { text-align: {{data.image_align}}; }'
			),

			//style
			'image_width' => array(
				'type' => 'slider',
				'title' => __('Width', 'wp-pagebuilder'),
				'unit' => array('px', 'em', '%'),
				'range' => array(
					'em' => array(
						'min' => 0,
						'max' => 40,
						'step' => .1,
					),
					'px' => array(
						'min' => 0,
						'max' => 500,
						'step' => 1,
					),
					'%' => array(
						'min' => 0,
						'max' => 100,
						'step' => 1,
					),
				),
				'std' => array(
					'md' => '',
					'sm' => '',
					'xs' => '',
				),
				'tab' => 'style',
				'responsive' => true,
				'selector' => array(
					'{{SELECTOR}} .wppb-tile-card-addon-img { width: {{data.image_width}}; }',
					'{{SELECTOR}} .wppb-addon-image-overlay { width: {{data.image_width}}; }'
				),
			),
			'image_height' => array(
				'type' => 'slider',
				'title' => __('Height', 'wp-pagebuilder'),
				'unit' => array('px', 'em', '%'),
				'range' => array(
					'em' => array(
						'min' => 0,
						'max' => 40,
						'step' => .1,
					),
					'px' => array(
						'min' => 0,
						'max' => 500,
						'step' => 1,
					),
					'%' => array(
						'min' => 0,
						'max' => 100,
						'step' => 1,
					),
				),
				'std' => array(
					'md' => '',
					'sm' => '',
					'xs' => '',
				),
				'responsive' => true,
				'tab' => 'style',
				'selector' => '{{SELECTOR}} .wppb-tile-card-addon-img, {{SELECTOR}} .wppb-addon-image-overlay { height: {{data.image_height}}; }',
			),

			'border_radius' => array(
				'type' => 'dimension',
				'title' => __('border radius', 'wp-pagebuilder'),
				'unit' => array('%', 'px', 'em'),
				'responsive' => true,
				'tab' => 'style',
				'section' => 'Border Radius',
				'selector' => '{{SELECTOR}} .wppb-tile-card-addon-content, {{SELECTOR}} .wppb-tile-card-addon-img,{{SELECTOR}} .wppb-addon-image-overlay  { border-radius: {{data.border_radius}}; }',
			),
			'border_hover_radius' => array(
				'type' => 'dimension',
				'title' => __('Hover border radius', 'wp-pagebuilder'),
				'responsive' => true,
				'unit' => array('%', 'px', 'em'),
				'tab' => 'style',
				'section' => 'Border Radius',
				'selector' => '{{SELECTOR}} .wppb-tile-card-addon-content:hover, {{SELECTOR}} .wppb-tile-card-addon-content:hover img, {{SELECTOR}} .wppb-tile-card-addon-content:hover .wppb-addon-image-overlay { border-radius: {{data.border_hover_radius}}; }',
			),
			'image_border' => array(
				'type' => 'border',
				'title' => 'Border',
				'std' => array(
					'borderWidth' => array('top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px'),
					'borderStyle' => 'solid',
					'borderColor' => '#cccccc'
				),
				'tab' => 'style',
				'section' => 'Border',
				'selector' => '{{SELECTOR}} .wppb-tile-card-addon-img, {{SELECTOR}} .wppb-addon-image-overlay'
			),
			'image_border_hover' => array(
				'type' => 'border',
				'title' => 'hover Border',
				'std' => array(
					'borderWidth' => array('top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px'),
					'borderStyle' => 'solid',
					'borderColor' => '#cccccc'
				),
				'tab' => 'style',
				'section' => 'Border',
				'selector' => '{{SELECTOR}} .wppb-tile-card-addon-img:hover, {{SELECTOR}} .wppb-addon-image-overlay:hover'
			),
			'image_boxshadow' => array(
				'type' => 'boxshadow',
				'title' => 'Box shadow',
				'std' => array(
					'shadowValue' => array('top' => '0px', 'right' => '0px', 'bottom' => '5px', 'left' => '0px'),
					'shadowColor' => 'rgba(0,0,0,.3)'
				),
				'selector' => '{{SELECTOR}} .wppb-tile-card-addon-img, {{SELECTOR}} .wppb-addon-image-overlay',
				'tab' => 'style',
				'section' => 'Box Shadow',
			),
			'image_hboxshadow' => array(
				'type' => 'boxshadow',
				'title' => 'hover box shadow',
				'std' => array(
					'shadowValue' => array('top' => '0px', 'right' => '0px', 'bottom' => '5px', 'left' => '0px'),
					'shadowColor' => 'rgba(0,0,0,.3)'
				),
				'selector' => '{{SELECTOR}} .wppb-tile-card-addon-img:hover, {{SELECTOR}} .wppb-addon-image-overlay:hover',
				'tab' => 'style',
				'section' => 'Box Shadow',
			),

			//light box
			'overlay_icon' => array(
				'type' => 'color',
				'title' => __('icon color', 'wp-pagebuilder'),
				'tab' => 'style',
				'section' => 'Overlay',
				'depends' => array(array('lightbox', '!=', '')),
				'selector' => '{{SELECTOR}} .wppb-addon-image-overlay-icon { color: {{data.overlay_icon}}; }'
			),

			'overlay_bg' => array(
				'type' => 'color',
				'title' => __('Background color', 'wp-pagebuilder'),
				'tab' => 'style',
				'section' => 'Overlay',
				'depends' => array(array('lightbox', '!=', '')),
				'selector' => '{{SELECTOR}} .wppb-addon-image-overlay{ background: {{data.overlay_bg}}; }'
			),

			//caption
			'caption_color' => array(
				'type' => 'color',
				'title' => __('Color', 'wp-pagebuilder'),
				'tab' => 'style',
				'section' => 'Caption',
				'depends' => array(array('tile_card_title', '!=', '')),
				'selector' => '{{SELECTOR}} .wppb-addon-image-caption{ color: {{data.caption_color}}; }'
			),
			'caption_fontstyle' => array(
				'type' => 'typography',
				'title' => __('Typography', 'wp-pagebuilder'),
				'std' => array(
					'fontFamily' => '',
					'fontSize' => array('md' => '12px', 'sm' => '', 'xs' => ''),
					'lineHeight' => array('md' => '', 'sm' => '', 'xs' => ''),
					'fontWeight' => '700',
					'textTransform' => '',
					'fontStyle' => '',
					'letterSpacing' => array('md' => '', 'sm' => '', 'xs' => ''),
				),
				'selector' => '{{SELECTOR}} .wppb-addon-image-caption',
				'section' => 'Caption',
				'tab' => 'style',
			),
			'caption_margin' => array(
				'type' => 'dimension',
				'title' => 'Margin',
				'unit' => array('px', 'em', '%'),
				'responsive' => true,
				'tab' => 'style',
				'section' => 'Caption',
				'selector' => '{{SELECTOR}} .wppb-addon-image-caption { margin: {{data.caption_margin}}; }',
			),

			'opacity' => array(
				'type' => 'slider',
				'title' => 'Opacity',
				'range' => array(
					'min' => 0,
					'max' => 1,
					'step' => .01,
				),
				'selector' => '{{SELECTOR}} img.wppb-tile-card-addon-img{ opacity:{{data.opacity}}; }',
				'tab' => 'style',
				'section' => 'Opacity',
			),

		);

		return $settings;
	}


	// Image Render HTML
	public function render($data = null) {
		$settings 		= $data['settings'];
		$upload_image 	= isset($settings['upload_image']) ? $settings['upload_image'] : array();
		$tile_card_title = isset($settings['tile_card_title']) ? $settings['tile_card_title'] : '';
		$image_display  = isset($settings["image_display"]) ? $settings["image_display"] : 'imginlineblock';
		$tile_card_selector 		= isset($settings["tile_card_selector"]) ? $settings["tile_card_selector"] : '';

		$img_url = '';
		$output = '';

		if (!empty($upload_image['url'])) {
			$img_url = $upload_image['url'];
		}

		$tile_card_selector = $tile_card_selector ? $tile_card_selector : "h2";

		$output  .= '<div class="wppb-tile-card-addon">';
		$output  .= '<div class="wppb-tile-card-addon-content wppb-' . esc_attr($image_display) . '">';
		$output  .= '<div class="wppb-tile-card-addon-image">';

		$output  .= '<img class="wppb-tile-card-addon-img" src="' . esc_url($img_url) . '" alt="' . esc_attr($tile_card_title) . '">';

		$output .= '</div>';
		if ($tile_card_title) {
			$output .= '<div class="wppb-addon-tile-card-title">';
			$output .= '<' . esc_attr($tile_card_selector) . ' class="wppb-tile-card-heading">' . wp_kses_post($tile_card_title) . '</' . esc_attr($tile_card_selector) . '>';
			$output .= '</div>';
		}
		$output .= '</div>';
		$output .= '</div>';

		return $output;
	}

	// Image Template
	public function getTemplate() {
		$output = '
		<#
		var tile_card_selector = data.tile_card_selector ? data.tile_card_selector : "h3";

		#>
		<div class="wppb-tile-card-addon">
			<div class="wppb-tile-card-addon-content wppb-{{ data.image_display }}">
				<div class="wppb-tile-card-addon-image">
					<# if( data.upload_image ) { #>
						<# if( data.upload_image.url ) { #>
							<img class="wppb-tile-card-addon-img" src="{{data.upload_image.url }}">
						<# } #>
					<# } #>
				</div>
				<# if(data.tile_card_title) { #>
					<div class="wppb-addon-tile-card-title">
					<{{tile_card_selector}} class="wppb-tile-card-heading">{{ data.tile_card_title }}</{{tile_card_selector}}>
					</div>
				<# } #>
			</div>
		</div>
		';
		return $output;
	}
}
