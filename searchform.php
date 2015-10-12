<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page' );
}
?>
<?php
/**
 * Search Form Template
 *
 */
?>
<form method="get" class="form-search top-search-form" action="<?php echo home_url( '/' ); ?>" >
	<div class="input-append">
		<input type="text" class="search-query" name="s" id="search-query" value="" placeholder="<?php _e('Search'); ?>" />
		<button type="submit" class="btn" name="submit"><i class="icon-search"></i> Search
        </button>	
	</div>  
</form>
