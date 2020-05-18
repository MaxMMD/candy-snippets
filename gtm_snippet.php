function wp222_custom_button_field( $button, $args ) {

  $button->add_control(
    'onclick_attr',
    [
      'label' => __( 'OnClick attribute', 'text-domain' ),
      'type' => \Elementor\Controls_Manager::TEXT,
    ]
  );
}
add_action( 'elementor/element/button/section_button/before_section_end', 'wp222_custom_button_field', 10, 2 );


function wp222_custom_render_button( $button ) {
  //Check if we are on a button
  if( 'button' === $button->get_name() ) {
    // Get the settings
    $settings = $button->get_settings();

    // Adding our type as an attribute to the button
    if( $settings['onclick_attr'] ) {
      $button->add_render_attribute( 'button', 'onclick', $settings['onclick_attr'], true );
    }
  }
}
add_action( 'elementor/widget/before_render_content', 'wp222_custom_render_button' );
