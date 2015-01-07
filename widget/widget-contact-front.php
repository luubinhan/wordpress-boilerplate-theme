<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php echo ot_get_option('contact_adrress'); ?>
<?php echo ot_get_option('contact_email'); ?>
<?php echo ot_get_option('contact_phone'); ?>
<?php echo ot_get_option('contact_fax'); ?>