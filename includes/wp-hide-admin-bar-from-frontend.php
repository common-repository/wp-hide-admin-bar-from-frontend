
<?php
  if (!defined('ABSPATH')) die ('No direct access allowed');
global $wpdb;
ob_start();
//getting all settings
$codepopular_hide_admin_bar= get_option('codepopular_hide_admin_bar');

//sanitize all post values
if (isset($_POST['add_opt_submit'])){
	$add_opt_submit= sanitize_text_field( $_POST['add_opt_submit'] );
	if($add_opt_submit!='') { 
    
	$codepopular_hide_admin_bar= sanitize_text_field( $_POST['codepopular_hide_admin_bar'] );	
	$saved= sanitize_text_field( $_POST['saved'] );


    if(isset($codepopular_hide_admin_bar) ) {
		update_option('codepopular_hide_admin_bar', $codepopular_hide_admin_bar);
    }

	if($saved==true) {
		
		echo ' <div class="updated"><p><strong>Settings Saved.</strong></p></div>';
	} 
}
}

?>
 
   
    <div class="wrap">
        <form method="post" id="settingForm" action="">
		<h2 class="hd_bd_styl"><?php _e('Hide/Show Admin Bar Setting','');?></h2>
		<table class="form-table">
		
	
	    <tr valign="top">
			<th scope="row" style="width: 370px;">
				<label for="codepopular_hide_admin_bar"><?php _e('Hide/Show Admin Bar From Front End','');?></label>
			</th>
			<td>
			<select style="width:250px" name="codepopular_hide_admin_bar" id="codepopular_hide_admin_bar">
			<option value='show' <?php if($codepopular_hide_admin_bar == 'show') { echo "selected='selected'" ; } ?>>Show
			<option value='hide' <?php if($codepopular_hide_admin_bar == 'hide') { echo "selected='selected'" ; } ?>>Hide</option>
			</option>
		   </select>
		   <br />
			</td>
		</tr>
	   
		<tr>
		  <td>
		  <p class="submit">
		<input type="hidden" name="saved"  value="saved"/>
        <input type="submit" name="add_opt_submit" class="button-primary" value="Save Changes" />
		  <?php if(function_exists('wp_nonce_field')) wp_nonce_field('add_opt_submit', 'add_opt_submit'); ?>
        </p></td>
		</tr>
		</table>
		
        
       </form>


       <div class="codepopular_support">
       	 
           <a target="blank" class ="btn btn-danger text-white btn-sm" href="http://www.codepopular.com">Hire Us To Get Help</a>
       </div>
      
    </div>

