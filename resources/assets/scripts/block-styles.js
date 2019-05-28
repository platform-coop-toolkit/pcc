const { registerBlockStyle, unregisterBlockStyle } = wp.blocks

registerBlockStyle( 'core/button', {
  name: 'primary',
  label: 'Primary',
} );
registerBlockStyle( 'core/button', {
  name: 'primary-on-dark',
  label: 'Primary (Dark Background)',
} );
registerBlockStyle( 'core/button', {
    name: 'secondary',
    label: 'Secondary',
} );
registerBlockStyle( 'core/button', {
    name: 'secondary-on-white',
    label: 'Secondary (White Background)',
} );

registerBlockStyle( 'core/paragraph', {
  name: 'subhead',
  label: 'Subhead',
} );

wp.domReady( function() {
  unregisterBlockStyle( 'core/button', '3d' );
  unregisterBlockStyle( 'core/button', 'circular' );
  unregisterBlockStyle( 'core/button', 'default' );
  unregisterBlockStyle( 'core/button', 'outline' );
  unregisterBlockStyle( 'core/button', 'shadow' );
  unregisterBlockStyle( 'core/button', 'squared' );
} );
