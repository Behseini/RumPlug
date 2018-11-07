<?php
/**
 * Plugin Name: Women Eyeglasses
 * Plugin URI: http://goproweb.ca
 * Description: This plugin is  for adding Custom Post Types and Taxonomies into WP. This Plugin is developed by Goproweb.ca .
 * Version: 1.0
 * Author: Behrouz - Go Pro Web
 * Author URI: http://goproweb.ca
 * Copyright 2016  Behrouz Hosseini  (Email : info@goproweb.ca)
 */


// Register Custom Taxonomy
function tax_we_brands() {

	$labels = array(
		'name'                       => 'Brands',
		'singular_name'              => 'Brand',
		'menu_name'                  => 'Brands',
		'all_items'                  => 'All Brands',
		'parent_item'                => 'Parent Brands',
		'parent_item_colon'          => 'Parent Brands',
		'new_item_name'              => 'Brand Name',
		'add_new_item'               => 'Add New Brand',
		'edit_item'                  => 'Edit Brand',
		'update_item'                => 'Update Brand Type',
		'separate_items_with_commas' => 'Separate Brand with commas',
		'search_items'               => 'Search Brand',
		'add_or_remove_items'        => 'Add or remove Brand Type',
		'choose_from_most_used'      => 'Choose from the most used Brand',
		'not_found'                  => 'Brand Not Found',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'we-brands', array( ), $args );

}

add_action( 'init', 'tax_we_brands', 0 );

function tax_we_shapes() {

        $labels = array(
            'name'                       => 'Shapes',
            'singular_name'              => 'Shape',
            'menu_name'                  => 'Shapes',
            'all_items'                  => 'All Shapes',
            'parent_item'                => 'Parent Shapes',
            'parent_item_colon'          => 'Parent Shapes',
            'new_item_name'              => 'Shape Name',
            'add_new_item'               => 'Add New Shape',
            'edit_item'                  => 'Edit Shape',
            'update_item'                => 'Update Shape Type',
            'separate_items_with_commas' => 'Separate Shape with commas',
            'search_items'               => 'Search Shape',
            'add_or_remove_items'        => 'Add or remove Shape Type',
            'choose_from_most_used'      => 'Choose from the most used Shape',
            'not_found'                  => 'Shape Not Found',
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        );
        register_taxonomy( 'we-shapes', array( ), $args );

    }

    add_action( 'init', 'tax_we_shapes', 0 );

function cpt_women_eyeglasses() {

	$labels = array(
		'name'                 => 'Women Eyeglasses',
		'singular_name'        => 'Women Eyeglass',
		'menu_name'            => 'Women Eyeglasse',
        'name_admin_bar'       => 'Women Eyeglasses',
		'parent_item_colon'    => 'Parent Women Eyeglasses',
		'all_items'            => 'All Women Eyeglasses',
		'view_item'            => 'View Women Eyeglass',
		'add_new_item'         => 'Add New Women Eyeglass',
		'add_new'              => 'Add New Women Eyeglass',
        'new_item'             => 'New Women Eyeglasses',
		'edit_item'            => 'Edit Women Eyeglassese Item',
		'update_item'          => 'Update Women Eyeglasses Item',
		'search_items'         => 'Search Women Eyeglasses Item',
		'not_found'            => 'Women Eyeglassese Not found',
		'not_found_in_trash'   => 'Women Eyeglassese Not found in Trash',
	);
	$args = array(
		'label'                => 'Women Eyeglasses',
		'description'          => 'This Post Type Adds Women Eyeglasses to Website',
		'labels'               => $labels,
		'supports'             => array('title'),
		'taxonomies'           => array( ),
		'hierarchical'         => true,
		'public'               => true,
		'show_ui'              => true,
		'show_in_menu'         => true,
		'show_in_nav_menus'    => true,
		'show_in_admin_bar'    => true,
		'menu_position'        => 5,
        'menu_icon'            => 'dashicons-layout',
        'rewrite'              => array( 'slug' => 'women-eyeglasses', 'with_front' => false ),
		'can_export'           => true,
		'has_archive'          => true,
		'exclude_from_search'  => false,
		'publicly_queryable'   => true,
		'capability_type'      => 'post',
	);
	register_post_type( 'women_eyeglasses', $args );

}

add_action( 'init', 'cpt_women_eyeglasses', 0 );


add_action( 'add_meta_boxes', 'women_eyeglasses_mtbox' );

function women_eyeglasses_mtbox()
{
$post_types = array ( 'women_eyeglasses');
 foreach( $post_types as $post_type ){
    add_meta_box(
        "product-detail",
        "Women Eyeglasses Details ",
        "render_women_metas",
        $post_type,
        "normal",
        "high"
    );
	}

}
// pName:null,
// pBrand:null,
// pPrice:null,
// pSKU:null,
// pMaterial:null,
// pGender:null,
// pColorsNumber:null,
// pColorsName:[],
// pColorsImages:[],
// pSizesNumber:null,
// pSizesDetails:[],
// pShape:null,
// pRim:null,
// pThumbnail:null,

function render_women_metas( $post )
{
$we_productMetas = get_post_custom( $post->ID );
$onSale =  isset( $we_productMetas['onSale_box'] );
$onSaleDiscount = isset( $we_productMetas['onSaleDiscount_box'] ) ? esc_attr( $we_productMetas['onSaleDiscount_box'][0] ) : '';
$name = isset( $we_productMetas['name_box'] ) ? esc_attr( $we_productMetas['name_box'][0] ) : '';
$brand = isset( $we_productMetas['brand_box'] ) ? esc_attr( $we_productMetas['brand_box'][0] ) : '';
$price = isset( $we_productMetas['price_box'] ) ? esc_attr( $we_productMetas['price_box'][0] ) : '';
$SKU = isset( $we_productMetas['sku_box'] ) ? esc_attr( $we_productMetas['sku_box'][0] ) : '';
$material = isset( $we_productMetas['material_box'] ) ? esc_attr( $we_productMetas['material_box'][0] ) : '';
$gender = isset( $we_productMetas['gender_box'] ) ? esc_attr( $we_productMetas['gender_box'][0] ) : '';
$colorsNumber = isset( $we_productMetas['cNumber_box'] ) ? esc_attr( $we_productMetas['cNumber_box'][0] ) : '';
$colorsNames = isset( $we_productMetas['cNames_box'] ) ? esc_attr( $we_productMetas['cNames_box'][0] ) : '';
$colorIDs = isset( $we_productMetas['cIDs_box'] ) ? esc_attr( $we_productMetas['cIDs_box'][0] ) : '';
$colorImages = isset( $we_productMetas['cImages_box'] ) ? esc_attr( $we_productMetas['cImages_box'][0] ) : '';
$sizeNumber = isset( $we_productMetas['sNumber_box'] ) ? esc_attr( $we_productMetas['sNumber_box'][0] ) : '';
$sizeOptions = isset( $we_productMetas['sOptions_box'] ) ? esc_attr( $we_productMetas['sOptions_box'][0] ) : '';
$shape = isset( $we_productMetas['shape_box'] ) ? esc_attr( $we_productMetas['shape_box'][0] ) : '';
$rim = isset( $we_productMetas['rim_box'] ) ? esc_attr( $we_productMetas['rim_box'][0] ) : '';
$thumbnail = isset( $we_productMetas['thumbnail_box'] ) ? esc_attr( $we_productMetas['thumbnail_box'][0] ) : '';


wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
    <table style="width:35%">
    <tr>
            <td><label for="onSale-box">For Sale</label></td>
            <td align="left">
            <input type="checkbox" name="onSale_box" id="onSale-box" value="yes" <?php if ( $onSale ) checked( $we_productMetas['onSale_box'][0], 'yes' ); ?> />

   </td>
        </tr>
        <tr>
            <td><label for="onSaleDiscount-box">Discount Percentage:</label></td>
            <td align="left"><input type="text" class="widefat"  name="onSaleDiscount_box" id="onSaleDiscount-box" value="<?php echo $onSaleDiscount; ?>" /></td>
        </tr>
        <tr>
            <td><label for="name-box">Product Name:</label></td>
            <td align="left"><input type="text" class="widefat"  name="name_box" id="name-box" value="<?php echo $name; ?>" /></td>
        </tr>
    <tr>
        <td ><label for="brands-box">Brand Options</label></td>
        <td align="left">
        <select name="brand_box" id="brandsOpy-box" class="widefat" >
            <option value="Superflex" <?php selected( $brand, 'Superflex' ); ?>>Superflex</option>
            <option value="Bertellei" <?php selected( $brand, 'Bertellei' ); ?>>Bertellei</option>
            <option value="Jill Stuart" <?php selected( $brand, 'Jill Stuart' ); ?>>Jill Stuart</option>
            <option value="Moleskine" <?php selected( $brand, 'Moleskine' ); ?>>Moleskine</option>
            <option value="Perry Ellis" <?php selected( $brand, 'Perry Ellis' ); ?>>Perry Ellis</option>
            <option value="Elizabeth Arden" <?php selected( $brand, 'Elizabeth Arden' ); ?>>Elizabeth Arden</option>
		</select>

        </td>
        </tr>
        <tr>
        <td><label for="price-box">Product Price: $</label></td>
        <td align="left"><input type="text" class="widefat"  name="price_box" id="price-box" value="<?php echo $price; ?>" /></td>
        </tr>
        <tr>
        <td><label for="sku-box">SKU</label></td>
        <td align="left"><input type="text" class="widefat"  name="sku_box" id="sku-box" value="<?php echo $SKU; ?>" /></td>
        </tr>

            <tr>
        <td ><label for="material-box">Material</label></td>
        <td align="left">
        <select name="material_box" id="material-box" class="widefat" >
            <option value="Acetate" <?php selected( $material, 'Acetate' ); ?>>Acetate</option>
            <option value="Metal" <?php selected( $material, 'Metal' ); ?>>Metal</option>
            <option value="Plastic" <?php selected( $material, 'Plastic' ); ?>>Plastic</option>
            <option value="Combination" <?php selected( $material, 'Combination' ); ?>>Combination</option>
		</select>

        </td>
        </tr>
        <tr>
        <td ><label for="gender-box">Gender </label></td>
        <td align="left"><input type="text" class="widefat" name="gender_box" id="gender-box" value="<?php echo $gender; ?>" /></td>
        </tr>

        <tr>
        <td ><label for="cNumber-box">Available Colors </label></td>
        <td align="left"><input type="text" class="widefat" name="cNumber_box" id="cNumber-box" value="<?php echo $colorsNumber; ?>" /></td>
        </tr>
        <tr>
        <td ><label for="cNames-box">Color Names </label></td>
        <td align="left"><input type="text" class="widefat" name="cNames_box" id="cNames-box" value="<?php echo $colorsNames; ?>" /></td>
        </tr>
        <tr>
        <td ><label for="cIDs-box">Color IDs </label></td>
        <td align="left"><input type="text" class="widefat" name="cIDs_box" id="cIDs-box" value="<?php echo $colorIDs; ?>" /></td>
        </tr>
        <tr>
        <tr>
        <td ><label for="cImages-box">Color Images </label></td>
        <td align="left"><input type="text" class="widefat" name="cImages_box" id="cImages-box" value="<?php echo $colorImages; ?>" /></td>
        </tr>
        <tr>
        <td ><label for="sNumber-box">Available Size Number </label></td>
        <td align="left"><input type="text" class="widefat" name="sNumber_box" id="sNumber-box" value="<?php echo $sizeNumber; ?>" /></td>
        </tr>
        <tr>
        <td ><label for="sOptions-box">Size Options </label></td>
        <td align="left"><input type="text" class="widefat" name="sOptions_box" id="sOptions-box" value="<?php echo $sizeOptions; ?>" /></td>
        </tr>
        <tr>
        <td ><label for="shape-box">Shape</label></td>
        <td align="left">
        <select name="shape_box" id="shape-box" class="widefat" >
            <option value="Oval" <?php selected( $shape, 'Oval' ); ?>>Oval</option>
            <option value="Round" <?php selected( $shape, 'Round' ); ?>>Round</option>
            <option value="Square" <?php selected( $shape, 'Square' ); ?>>Square</option>
            <option value="Rectangle" <?php selected( $shape, 'Rectangle' ); ?>>Rectangle</option>
		</select>

        </td>
        </tr>

                    <tr>
        <td ><label for="rim-box">Rim</label></td>
        <td align="left">
        <select name="rim_box" id="rim-box" class="widefat" >
            <option value="full-rim" <?php selected( $rim, 'full-rim' ); ?>>Full Rim</option>
            <option value="semi-rimless" <?php selected( $rim, 'semi-rimless' ); ?>>Semi Rimless</option>
            <option value="rimless" <?php selected( $rim, 'rimless' ); ?>>Rimless</option>
      	</select>

        </td>
        </tr>
        <tr>
        <td ><label for="thumbnail-box">Thumbnail Image </label></td>
        <td align="left"><input type="text" class="widefat" name="thumbnail_box" id="thumbnail-box" value="<?php echo $thumbnail; ?>" /></td>
        </tr>
    </table>
<?php
}


add_action( 'save_post', 'we_metas_save' );
function we_metas_save( $post_id )
{
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;

	// now we can actually save the data
	$allowed = array(
		'a' => array( // on allow a tags
			'href' => array() // and those anchords can only have href attribute
		)
	);

    // Probably a good idea to make sure your data is set

    if( isset( $_POST['onSale_box'] ) ){
        update_post_meta( $post_id, 'onSale_box', 'yes' );
    } else {
        update_post_meta( $post_id, 'onSale_box', 'no' );
    }
	if( isset( $_POST['onSaleDiscount_box'] ) ){
        update_post_meta( $post_id, 'onSaleDiscount_box', wp_kses( $_POST['onSaleDiscount_box'], $allowed ) );
    }
	if( isset( $_POST['name_box'] ) ){
        update_post_meta( $post_id, 'name_box', wp_kses( $_POST['name_box'], $allowed ) );
    }
	if( isset( $_POST['brand_box'] ) ){
        update_post_meta( $post_id, 'brand_box', wp_kses( $_POST['brand_box'], $allowed ) );
    }
	if( isset( $_POST['price_box'] ) ){
		update_post_meta( $post_id, 'price_box', wp_kses( $_POST['price_box'], $allowed ) );
    }
	if( isset( $_POST['sku_box'] ) ){
		update_post_meta( $post_id, 'sku_box', wp_kses( $_POST['sku_box'], $allowed ) );
    }
	if( isset( $_POST['material_box'] ) ){
		update_post_meta( $post_id, 'material_box', wp_kses( $_POST['material_box'], $allowed ) );
    }
	if( isset( $_POST['gender_box'] ) ){
		update_post_meta( $post_id, 'gender_box', wp_kses( $_POST['gender_box'], $allowed ) );
    }
	if( isset( $_POST['cNumber_box'] ) ){
		update_post_meta( $post_id, 'cNumber_box', wp_kses( $_POST['cNumber_box'], $allowed ) );
    }
	if( isset( $_POST['cNames_box'] ) ){
		update_post_meta( $post_id, 'cNames_box', wp_kses( $_POST['cNames_box'], $allowed ) );
    }
	if( isset( $_POST['cIDs_box'] ) ){
		update_post_meta( $post_id, 'cIDs_box', wp_kses( $_POST['cIDs_box'], $allowed ) );
    }
	if( isset( $_POST['cImages_box'] ) ){
		update_post_meta( $post_id, 'cImages_box', wp_kses( $_POST['cImages_box'], $allowed ) );
    }
	if( isset( $_POST['sNumber_box'] ) ){
		update_post_meta( $post_id, 'sNumber_box', wp_kses( $_POST['sNumber_box'], $allowed ) );
    }
	if( isset( $_POST['sOptions_box'] ) ){
		update_post_meta( $post_id, 'sOptions_box', wp_kses( $_POST['sOptions_box'], $allowed ) );
    }
	if( isset( $_POST['shape_box'] ) ){
		update_post_meta( $post_id, 'shape_box', wp_kses( $_POST['shape_box'], $allowed ) );
    }
	if( isset( $_POST['rim_box'] ) ){
		update_post_meta( $post_id, 'rim_box', wp_kses( $_POST['rim_box'], $allowed ) );
    }
    if( isset( $_POST['thumbnail_box'] ) ){
		update_post_meta( $post_id, 'thumbnail_box', wp_kses( $_POST['thumbnail_box'], $allowed ) );
    }


}
add_filter( 'manage_edit-women_eyeglasses_columns', 'we_columns' ) ;

function we_columns( $columns ) {

	$columns = array(

		'cb' => '<input type="checkbox" />',
		'title' => __( 'Women Eyeglass Title' ),
		'thumbnail'=> __('Product Image'),
		'price' => __( 'Price' ),
        'brand' => __( 'Brand' ),
		'date' => __( 'Publish Date' )
	);

	return $columns;
}

add_action( 'manage_women_eyeglasses_posts_custom_column', 'my_manage_movie_columns', 10, 2 );


function my_manage_movie_columns( $column, $post_id ) {
	$uploads  = wp_upload_dir();
	$upload_path = $uploads['baseurl'];
	global $post;

	switch( $column ) {
		case 'price' :
		$price = get_post_meta( $post_id, 'price_box', true );
		if ( empty( $price ) )
			echo 'Unknown';
		else
		echo '$'.$price;

		break;
		case 'brand' :
                    $barand = get_post_meta( $post_id, 'brand_box', true );
                    if ( empty( $barand ) )
                        echo 'Unknown';
                    else
                    echo $barand;

                    break;
		case 'thumbnail' :
                    $thumbnail = get_post_meta( $post_id, 'thumbnail_box', true );
                    if ( empty( $thumbnail ) )
                        echo 'Unknown';
                    else
                    echo '<img src="'.$upload_path.'/thumbs/'.$thumbnail.'" width="200" height="106" />';

                    break;
		default :
			break;
	}
}

?>
