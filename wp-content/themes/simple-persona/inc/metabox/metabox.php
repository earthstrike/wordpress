<?php
/**
 * The template for displaying meta box in page/post
 *
 * This adds Select Sidebar, Header Featured Image Options, Single Page/Post Image
 * This is only for the design purpose and not used to save any content
 *
 * @package Simple Persona
 */



/**
 * Class to Renders and save metabox options
 *
 * @since Simple Persona 0.1
 */
class Simple_Persona_Metabox {
	private $meta_box;

	private $fields;

	/**
	* Constructor
	*
	* @since Simple Persona 0.1
	*
	* @access public
	*
	*/
	public function __construct( $meta_box_id, $meta_box_title, $post_type ) {

		$this->meta_box = array (
							'id'        => $meta_box_id,
							'title'     => $meta_box_title,
							'post_type' => $post_type,
							);

		$this->fields = array(
			'simple-persona-header-image',
			'simple-persona-featured-image',
		);


		// Add metaboxes
		add_action( 'add_meta_boxes', array( $this, 'add' ) );

		add_action( 'save_post', array( $this, 'save' ) );

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_metabox_scripts' ) );
	}

	/**
	* Add Meta Box for multiple post types.
	*
	* @since Simple Persona 0.1
	*
	* @access public
	*/
	public function add($postType) {
		if( in_array( $postType, $this->meta_box['post_type'] ) ) {
			add_meta_box( $this->meta_box['id'], $this->meta_box['title'], array( $this, 'show' ), $postType );
		}
	}

	/**
	* Renders metabox
	*
	* @since Simple Persona 0.1
	*
	* @access public
	*/
	public function show() {
		global $post;

		$header_image_options = array(
			'default' => esc_html__( 'Default', 'simple-persona' ),
			'enable'  => esc_html__( 'Enable', 'simple-persona' ),
			'disable' => esc_html__( 'Disable', 'simple-persona' ),
		);

		$featured_image_options = array(
			'default'        => esc_html__( 'Default', 'simple-persona' ),
			'disabled'       => esc_html__( 'Disabled', 'simple-persona' ),
			'post-thumbnail' => esc_html__( 'Post Thumbnail (470x470)', 'simple-persona' ),
			'simple-persona-slider' => esc_html__( 'Slider Image (1920x954)', 'simple-persona' ),
			'full'           => esc_html__( 'Original Image Size', 'simple-persona' ),
		);


		// Use nonce for verification
		wp_nonce_field( basename( __FILE__ ), 'simple_persona_custom_meta_box_nonce' );

		// Begin the field table and loop  ?>
		<div id="simple-persona-ui-tabs" class="ui-tabs">
			<ul class="simple-persona-ui-tabs-nav" id="simple-persona-ui-tabs-nav">
				<li><a href="#frag2"><?php esc_html_e( 'Header Featured Image Options', 'simple-persona' ); ?></a></li>
				<li><a href="#frag3"><?php esc_html_e( 'Single Page/Post Image ', 'simple-persona' ); ?></a></li>
			</ul>

			<div id="frag2" class="catch_ad_tabhead">
				<table id="header-image-metabox" class="form-table" width="100%">
					<tbody>
						<tr>
							<?php
							$metaheader = get_post_meta( $post->ID, 'simple-persona-header-image', true );

							if ( empty( $metaheader ) ){
								$metaheader = 'default';
							}

							foreach ( $header_image_options as $field => $label ) {
							?>
								<td style="width: 100px;">
									<label class="description">
										<input type="radio" name="simple-persona-header-image" value="<?php echo esc_attr( $field ); ?>" <?php checked( $field, $metaheader ); ?>/>&nbsp;&nbsp;<?php echo esc_html( $label ); ?>
									</label>
								</td>

							<?php
							} // end foreach
							?>
						</tr>
					</tbody>
				</table>
			</div>

			<div id="frag3" class="catch_ad_tabhead">
				<table id="featured-image-metabox" class="form-table" width="100%">
					<tbody>
						<tr>
							<select name="simple-persona-featured-image" id="custom_element_grid_class">
								 <?php
									foreach ( $featured_image_options as $field =>$label ) {
										$metaimage = get_post_meta( $post->ID, 'simple-persona-featured-image', true );
										if( empty( $metaimage ) ){
											$metaimage='default';
										}
									?>
										<option value="<?php echo esc_attr( $field ); ?>" <?php selected( $metaimage, $field ); ?>><?php echo esc_html( $label ); ?></option>
									<?php
									} // end foreach
								?>
							</select>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}

	/**
	 * Save custom metabox data
	 *
	 * @action save_post
	 *
	 * @since Simple Persona 0.1
	 *
	 * @access public
	 */
	public function save( $post_id ) {
		global $post_type;

		$post_type_object = get_post_type_object( $post_type );

		if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )                      // Check Autosave
		|| ( ! isset( $_POST['post_ID'] ) || $post_id != $_POST['post_ID'] )        // Check Revision
		|| ( ! in_array( $post_type, $this->meta_box['post_type'] ) )                  // Check if current post type is supported.
		|| ( ! check_admin_referer( basename( __FILE__ ), 'simple_persona_custom_meta_box_nonce') )    // Check nonce - Security
		|| ( ! current_user_can( $post_type_object->cap->edit_post, $post_id ) ) )  // Check permission
		{
		  return $post_id;
		}

		foreach ( $this->fields as $field ) {
			$new = $_POST[ $field ];

			delete_post_meta( $post_id, $field );

			if ( '' == $new || array() == $new ) {
				return;
			} else {
				if ( ! update_post_meta ( $post_id, $field, sanitize_key( $new ) ) ) {
					add_post_meta( $post_id, $field, sanitize_key( $new ), true );
				}
			}
		} // end foreach
	}

	public function enqueue_metabox_scripts( $hook ) {
		$allowed_pages = array( 'post-new.php', 'post.php' );

		// Bail if not on required page
		if ( ! in_array( $hook, $allowed_pages ) ) {
			return;
		}

		//Scripts
		wp_enqueue_script( 'simple-persona-metabox-script', get_template_directory_uri() . '/inc/metabox/metabox.js', array( 'jquery', 'jquery-ui-tabs' ), '20180103' );

		//CSS Styles
		wp_enqueue_style( 'simple-persona-metabox-style', get_template_directory_uri() . '/inc/metabox/metabox.css' );
	}
}

$simple_persona_metabox = new Simple_Persona_Metabox(
	'simple-persona-options',                  //metabox id
	esc_html__( 'Simple Persona Options', 'simple-persona' ), //metabox title
	array( 'page', 'post' )             //metabox post types
);
