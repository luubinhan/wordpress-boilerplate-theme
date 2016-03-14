<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
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
