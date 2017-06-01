<?
global $post;

$prefix = $param['prefix'];
$field = $param['box']['field'];

$post_id = $post->ID;

$this->tpl('wp-admin/metabox/_style', array());
?>
<div class="azbnbasetheme-metabox" >
<?

wp_nonce_field('azbn_page', $prefix.'wpnonce', false, true);

foreach ($field as $f) {
	$name =  $prefix.$f['name'];
	$in_db = get_post_meta($post_id, $name, true);
	if(!$in_db || $in_db == '') {
		//$value = $f['default'];
	} else {
		$value = $in_db;
	}
	?>
	
	<div class="input-block " >
		<label><?=$f['label'];?></label>
		<div class="" >
		<?
		switch($f['type']) {
			
			default: {
				echo '<input type="text" id="'.$name.'" name="'.$name.'" value="'.$value.'" />';
			}
			break;
			
		}
		?>
		</div>
	</div>
	
	<?
}

?>

</div>