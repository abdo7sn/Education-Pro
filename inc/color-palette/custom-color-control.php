<?php

$education_color_palette_css = '';

// Global Color
$education_first_color = education_get_option('education_first_color', '#FB7B18');

if ($education_first_color != false) {
    $education_color_palette_css .= ':root {';
    $education_color_palette_css .= '--primary-color: ' . esc_attr($education_first_color) . '!important;';
    $education_color_palette_css .= '}';
}

$education_color_palette_css .= '}';

/*-------------- Copyright Text Align-------------------*/
$education_copyright_text_align = education_get_option('education_copyright_text_align');
$education_color_palette_css .= '.site-footer{';
$education_color_palette_css .= 'text-align: ' . esc_attr($education_copyright_text_align) . ' !important;';
$education_color_palette_css .= '}';
$education_color_palette_css .= '
@media screen and (max-width:575px) {
.site-footer{';
$education_color_palette_css .= 'text-align: center !important;';
$education_color_palette_css .= '} }';

// copyright font size
$education_copyright_text_font_size = education_get_option('education_copyright_text_font_size');
$education_color_palette_css .= '#colophon p, #colophon a , #colophon{';
$education_color_palette_css .= 'font-size: ' . esc_attr($education_copyright_text_font_size) . 'px;';
$education_color_palette_css .= '}';

