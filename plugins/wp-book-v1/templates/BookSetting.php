<?php
/**
 * @package wp-book-v1
 */
?>
<div class="wrap">
<?php settings_errors(); ?>
<form method="post" action="options.php">
<?php settings_fields( 'custom-db-book' ); ?>
<?php do_settings_sections( 'book' ); ?>
<?php submit_button(); ?>
</form>
</div>
<?php
?>