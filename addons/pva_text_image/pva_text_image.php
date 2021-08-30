<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class WPPB_Addon_Text_Image_Block {

	public function get_name() {
		return 'wppb_text_image_block';
	}
	public function get_title() {
		return 'Text Image Block';
	}
	public function get_icon() {
		return 'wppb-font-image-break';
	}

	// text block Settings Fields
	public function get_settings() {

		$settings = array(
			'image_upload' => array(
				'type' => 'media',
				'title' => __('Upload image', 'wp-pagebuilder'),
				'std' => array('url' => WPPB_DIR_URL . 'assets/img/placeholder/wppb-medium.jpg'),
			),
			'image_title' => array(
				'type' => 'text',
				'title' => __('Image Title', 'wp-pagebuilder'),
				'std' => 'Image title',
			),
			'text' => array(
				'type' => 'editor',
				'title' => __('Content', 'wp-pagebuilder'),
				'std' => 'Integer adipiscing erat eget risus sollicitudin pellentesque et non erat. Maecenas nibh dolor, malesuada et bibendum a, sagittis accumsan ipsum. Pellentesque ultrices ultrices sapien, nec tincidunt nunc posuere ut. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque tristique dolor vitae tincidunt. Aenean quis massa uada mi elementum elementum. Nec sapien convallis vulputate rhoncus vel dui.'
			),
			'text_image_bgs' => array(
				'type' => 'color2',
				'title' => 'Addon background',
				'clip' => false,
				'std' => array(
					'colorType' => 'color',
					'colorColor' => '#ffffff',
					'clip' => false
				),
				'selector' => '{{SELECTOR}} .wppb-image-text-block-addon',
				'tab' => 'style',
			),
			'text_image_title_color' => array(
				'type' => 'color2',
				'title' => 'Title Color',
				'clip' => true,
				'std' => array('colorType' => 'color', 'clip' => true, 'colorColor' => '#000'),
				'selector' => '{{SELECTOR}} .wppb-addon-tile-card-title .wppb-tile-image-heading',
				'tab' => 'style',
			),
			'text_color' => array(
				'type' => 'color2',
				'title' => 'Text Color',
				'clip' => true,
				'std' => array('colorType' => 'color', 'clip' => true, 'colorColor' => '#000'),
				'selector' => '{{SELECTOR}} .wppb-addon-tile-card-content',
				'tab' => 'style',
			),
			'tile_title_bg' => array(
				'type' => 'color2',
				'title' => 'Title Background',
				'clip' => false,
				'std' => array(
					'colorType' => 'color',
					'colorColor' => '',
					'clip' => false
				),
				'selector' => '{{SELECTOR}} .wppb-addon-tile-card-title',
				'tab' => 'style',
			),
			'title_padding' => array(
				'type' => 'dimension',
				'title' => 'Title Padding',
				'unit' => array('px', 'em', '%'),
				'responsive' => true,
				'selector' => '{{SELECTOR}} .wppb-addon-tile-card-title { padding: {{data.title_padding}}; }',
				'tab' => 'style',
			),
			'text_padding' => array(
				'type' => 'dimension',
				'title' => 'Text Padding',
				'unit' => array('px', 'em', '%'),
				'responsive' => true,
				'selector' => '{{SELECTOR}} .wppb-addon-tile-card-content { padding: {{data.text_padding}}; }',
				'tab' => 'style',
			),
			'text_image_opacity_distance' => array(
				'type' => 'number',
				'title' => __('Image Opacity Distance', 'wp-pagebuilder'),
				'std' => '20',
				'tab' => 'style',
			),
			'text_image_bg_repeat' => array(
				'type' => 'select',
				'title' => 'Background Repeat',
				'values' => array(
					'no-repeat' => 'No Repeat',
					'repeat' => 'Repeat',
				),
				'std' => 'no-repeat',
				'selector' => '{{SELECTOR}} .wppb-image-block-left, {{SELECTOR}} .wppb-image-block-right {background-repeat: {{data.text_image_bg_repeat}}}',
				'tab' => 'style',
			),
			'text_image_bg_size' => array(
				'type' => 'select',
				'title' => 'Background Size',
				'values' => array(
					'contain' => 'Contain',
					'cover' => 'Cover',
				),
				'std' => 'cover',
				'selector' => '{{SELECTOR}} .wppb-image-block-left, {{SELECTOR}} .wppb-image-block-right {background-size: {{data.text_image_bg_size}}}',
				'tab' => 'style',
			),
			'text_image_bg_position' => array(
				'type' => 'select',
				'title' => 'Background Position',
				'values' => array(
					'center' => 'Center',
					'top' => 'Top',
					'bottom' => 'Bottom',
					'left' => 'Left',
					'right' => 'Right',
				),
				'std' => 'center',
				'selector' => '{{SELECTOR}} .wppb-image-block-left, {{SELECTOR}} .wppb-image-block-right {background-position: {{data.text_image_bg_position}}}',
				'tab' => 'style',
			),
			'text_image_selector' => array(
				'type' => 'select',
				'title' => __(' Image Selector', 'wp-pagebuilder'),
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
				'tab' => 'style',
			),
			'image_position' => array(
				'type' => 'select',
				'title' => __('Image position', 'wp-pagebuilder'),
				'values' => array(
					'left' => 'Left',
					'right' => 'Right',
				),
				'std' => 'right',
				'tab' => 'style',
			),
			'image_spacing_right' => array(
				'type' => 'number',
				'title' => __('Image right space', 'wp-pagebuilder'),
				'std' => '20',
				'depends' => array(array('image_position', '=', 'left')),
				'selector' => '{{SELECTOR}} .wppb-image-block-left { padding-right: {{data.image_spacing_right}}px; }',
				'tab' => 'style',
			),
			'image_spacing_left' => array(
				'type' => 'number',
				'title' => __('Image left space', 'wp-pagebuilder'),
				'std' => '20',
				'depends' => array(array('image_position', '=', 'right')),
				'selector' => '{{SELECTOR}} .wppb-image-block-right { padding-left: {{data.image_spacing_left}}px; }',
				'tab' => 'style',
			),

			//style
			'color' => array(
				'type' => 'color',
				'title' => __('Content color', 'wp-pagebuilder'),
				'tab' => 'style',
				'selector' => '{{SELECTOR}} .wppb-text-block-content { color: {{data.color}}; }',
				'tab' => 'style',
			),
			'text_fontstyle' => array(
				'type' => 'typography',
				'title' => __('Typography', 'wp-pagebuilder'),
				'std' => array(
					'fontFamily' => '',
					'fontSize' => array('md' => '14px', 'sm' => '', 'xs' => ''),
					'lineHeight' => array('md' => '', 'sm' => '', 'xs' => ''),
					'fontWeight' => '400',
					'textTransform' => '',
					'fontStyle' => '',
					'letterSpacing' => array('md' => '', 'sm' => '', 'xs' => ''),
				),
				'selector' => '{{SELECTOR}} .wppb-text-block-content',
				'tab' => 'style',
			),
			'drop_fontstyle' => array(
				'type' => 'typography',
				'title' => __('Drop Cap Typography', 'wp-pagebuilder'),
				'std' => array(
					'fontFamily' => '',
					'fontSize' => array('md' => '50px', 'sm' => '', 'xs' => ''),
					'lineHeight' => array('md' => '', 'sm' => '', 'xs' => ''),
					'fontWeight' => '400',
					'textTransform' => '',
					'fontStyle' => '',
					'letterSpacing' => array('md' => '', 'sm' => '', 'xs' => ''),
				),
				'selector' => '{{SELECTOR}} .wppb-text-block-drop:first-letter',
				'tab' => 'style',
				'depends' => array(array('drop_cap', '=', '1')),
				'tab' => 'style',
			),
			'drop_padding' => array(
				'type' => 'dimension',
				'title' => 'Padding',
				'unit' => array('px', 'em', '%'),
				'responsive' => true,
				'tab' => 'style',
				'selector' => '{{SELECTOR}} .wppb-text-block-drop:first-letter { padding: {{data.drop_padding}}; }',
				'depends' => array(array('drop_cap', '=', '1')),
				'tab' => 'style',
			),
		);
		return $settings;
	}

	// text block Render HTML
	public function render($data = null) {
		$settings 		= $data['settings'];
		$text 			= isset($settings['text']) ? wp_kses_post($settings['text']) : '';
		$image_title 	= isset($settings['image_title']) ? wp_kses_post($settings['image_title']) : '';
		$image_position = isset($settings['image_position']) ? $settings['image_position'] : '';
		$image_spacing_right = isset($settings['image_spacing_right']) ? $settings['image_spacing_right'] : '20';
		$image_spacing_left = isset($settings['image_spacing_left']) ? $settings['image_spacing_left'] : '20';
		$image_upload 	= isset($settings['image_upload']) ? $settings['image_upload'] : array();
		$text_image_bg 	= isset($settings['text_image_bgs']) ? $settings['text_image_bgs'] : '#ffffff';
		$text_image_opacity_distance 	= isset($settings['text_image_opacity_distance']) ? $settings['text_image_opacity_distance'] : '#ffffff';
		$text_image_selector 	= isset($settings["text_image_selector"]) ? $settings["text_image_selector"] : '';
		$img_url 		= $image_upload['url'];

		$output = '';
		$output  .= '<div class="wppb-image-text-block-addon">';
		if (!empty($image_upload['url']) && $image_position == 'left') {
			$output .= '<div class="wppb-image-block-left" style="background-image: linear-gradient(to left, ' . $text_image_bg['colorColor'] . ' 0%, rgba(0,0,0,0) ' . $text_image_opacity_distance . 'px,  rgba(0,0,0,0) 100%), url(' . esc_url($img_url) . ')"></div>';
		}
		if ($image_title) {
			$output .= '<div class="wppb-text-block-content">';
		}
		if ($image_title) {
			$output .= '<div class="wppb-addon-tile-card-title">';
			$output .= '<' . esc_attr($text_image_selector) . ' class="wppb-tile-image-heading">' . wp_kses_post($image_title) . '</' . esc_attr($text_image_selector) . '>';
			$output .= '</div>';
		}
		if ($text) {
			$output .= '<div class="wppb-addon-tile-card-content">' . $text . '</div>';
		}
		if ($image_title) {
			$output .= '</div>';
		}
		if (!empty($image_upload['url']) && $image_position == 'right') {
			$output .= '<div class="wppb-image-block-right" style="background-image: linear-gradient(to right, ' . $text_image_bg['colorColor'] . ' 0%, rgba(0,0,0,0) ' . $text_image_opacity_distance . 'px,  rgba(0,0,0,0) 100%), url(' . esc_url($img_url) . ')"></div>';
		}
		$output .= '</div>';

		return $output;
	}

	// text block Template
	public function getTemplate() {
		$output = '
		<#
		var image_upload = data.image_upload??"";
		var image_position = data.image_position??"";
		var image_title = data.image_title??"";
		var text_image_opacity_distance = data.text_image_opacity_distance??"20";
		var text_image_selector = data.text_image_selector ? data.text_image_selector : "h3";
		var text_image_bg = data.text_image_bgs? data.text_image_bgs.colorColor : "#fff";
		#>
		<# if(data.text){ #>
			<div class="wppb-image-text-block-addon">
				<# if(image_position=="left" && image_upload) { #>
					<div class="wppb-image-block-left" style="background-image: linear-gradient(to left, {{text_image_bg}} 0%, rgba(0,0,0,0) {{text_image_opacity_distance}}px,  rgba(0,0,0,0) 100%), url({{image_upload.url}})"></div>
				<# } #>

				<# if(data.image_title || data.text) { #>
					<div class="wppb-text-block-content">
				<# } #>

				<# if(data.image_title) { #>
					<div class="wppb-addon-tile-card-title">
					<{{text_image_selector}} class="wppb-tile-image-heading">{{ data.image_title }}</{{text_image_selector}}>
					</div>
				<# } #>

				<# if(data.text) { #>
					<div class="wppb-addon-tile-card-content"><# print(data.text) #></div>
				<# } #>

				<# if(data.image_title || data.text) { #>
					</div>
				<# } #>
				<# if(image_position=="right" && image_upload) { #>
					<div class="wppb-image-block-right" style="background-image: linear-gradient(to right, {{text_image_bg}} 0%, rgba(0,0,0,0) {{text_image_opacity_distance}}px,  rgba(0,0,0,0) 100%), url({{image_upload.url}})"></div>
				<# } #>
			</div>
		<# } #> ';
		return $output;
	}
}
