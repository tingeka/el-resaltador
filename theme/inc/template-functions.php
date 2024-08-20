<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package El_Resaltador
 */

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function cmlt_er_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'cmlt_er_pingback_header' );

/**
 * Changes comment form default fields.
 *
 * @param array $defaults The default comment form arguments.
 *
 * @return array Returns the modified fields.
 */
function cmlt_er_comment_form_defaults( $defaults ) {
	$comment_field = $defaults['comment_field'];

	// Adjust height of comment form.
	$defaults['comment_field'] = preg_replace( '/rows="\d+"/', 'rows="5"', $comment_field );

	return $defaults;
}
add_filter( 'comment_form_defaults', 'cmlt_er_comment_form_defaults' );

/**
 * Filters the default archive titles.
 *
 * This function is hooked to the `get_the_archive_title` filter and modifies the default
 * archive titles by adding screen-reader-only text before them. The modified titles are
 * returned by the function.
 *
 * @param string $title The default archive title.
 * @return string The modified archive title.
 */
function cmlt_er_get_the_archive_title( $title = '' ) {
	/**
	 * Function to wrap text in a span element with a class of 'sr-only'.
	 *
	 * @param string $str The string to wrap.
	 * @return string The wrapped string.
	 */
	$prepend = function ( $str ) {
		return cmlt_er_content_tag(
			'span',
			$str,
			array(
				'class' => 'sr-only',
			)
		);
	};

	// Check the archive type and modify the title accordingly.
	if ( is_category() ) {
		// Traducción: Prefijo del título del archivo de categoría.
		$title = $prepend( esc_html_x( 'Sección: ', 'Prefijo del título del archivo de categoría', 'el-resaltador' ) ) . single_cat_title( '', false );
	} elseif ( is_tag() ) {
		// Traducción: Prefijo del título del archivo de etiquetas.
		$title = $prepend( esc_html_x( 'Etiqueta: ', 'Prefijo del título del archivo de etiquetas', 'el-resaltador' ) ) . single_cat_title( '', false );
	} elseif ( is_author() ) {
		// Traducción: Prefijo del título del archivo de autor.
		$title = $prepend( esc_html_x( 'Autor/a: ', 'Prefijo del título del archivo de autor', 'el-resaltador' ) ) . get_the_author_meta( 'display_name' );
	} elseif ( is_year() ) {
		// Traducción: Prefijo del título del archivo anual.
		$title = $prepend( esc_html_x( 'Anuario: ', 'Prefijo del título del archivo anual', 'el-resaltador' ) ) . get_the_date( _x( 'Y', 'formato de fecha de los archivos anuales', 'el-resaltador' ) );
	} elseif ( is_month() ) {
		// Traducción: Prefijo del título del archivo mensual.
		$title = $prepend( esc_html_x( 'Mes: ', 'Prefijo del título del archivo mensual', 'el-resaltador' ) ) . get_the_date( _x( 'F Y', 'formato de fecha de los archivos mensuales', 'el-resaltador' ) );
	} elseif ( is_day() ) {
		// Traducción: Prefijo del título del archivo diario.
		$title = $prepend( esc_html_x( 'Día: ', 'Prefijo del título del archivo diario', 'el-resaltador' ) ) . get_the_date( _x( 'F j, Y', 'formato de fecha de los archivos diarios', 'el-resaltador' ) );
	} elseif ( is_post_type_archive() ) {
		// Get the post type object.
		$cpt = get_post_type_object( get_queried_object()->name );
		// Traducción: Prefijo del título del archivo de tipo de contenido.
		$title = $prepend( esc_html_x( 'Archivo de tipo de contenido: ', 'Prefijo del título del archivo de tipo de contenido', 'el-resaltador' ) ) . $cpt->labels->singular_name;
	} elseif ( is_tax() ) {
		// Get the taxonomy object.
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		// Traducción: Prefijo del título del archivo de taxonomía.
		$title = $prepend( esc_html_x( 'Taxonomía: ', 'Prefijo del título del archivo de taxonomía', 'el-resaltador' ) ) . $tax->labels->singular_name;
	} elseif ( is_search() ) {
		// Check if search query is set and nonce is valid.
		if ( isset( $_GET['s'] ) && isset( $_GET['_wpnonce'] ) ) {
			$nonce = sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) );
			if ( wp_verify_nonce( $nonce, 'search_nonce' ) ) {
				$query = sanitize_text_field( wp_unslash( $_GET['s'] ) );
				$query = cmlt_er_is_empty_value( $query )
					? 'Buscar: '
					: esc_html_x( 'Buscaste: ', 'Prefijo del título de resultados de búsqueda', 'el-resaltador' ) . $query;
				// Traducción: Prefijo del título de resultados de búsqueda.
				$title = $query;
			}
		}
	} else {
		// Traducción: Título genérico de archivo.
		$title = esc_html_x( 'Archivos:', 'Título genérico de archivo', 'el-resaltador' );
	}

	return $title;
}
add_filter( 'get_the_archive_title', 'cmlt_er_get_the_archive_title' );

/**
 * Filters the search query to only include posts.
 *
 * This function is hooked to the `pre_get_posts` filter and modifies the search
 * query to only include posts, excluding other post types.
 *
 * @param WP_Query $query The current query object.
 * @return WP_Query The modified query object.
 */
function cmlt_er_search_filter( $query ) {
	if ( $query->is_search ) {
		$query->set( 'post_type', array( 'post' ) );
	}
	return $query;
}
add_filter( 'pre_get_posts', 'cmlt_er_search_filter' );

/**
 * Filters the NavXT breadcrumbs output on the search results page when no results are found.
 *
 * This function is hooked to the `bcn_before_fill` filter and modifies the breadcrumbs
 * output to display a custom message when the search query is empty and there are no
 * search results.
 *
 * @param object $trail The NavXT breadcrumbs trail object.
 * @return object The modified breadcrumbs trail object.
 */
function cmlt_er_filter_navxt_template_empty_search( $trail ) {
	if (
		isset(
			$_GET['s']
		)
		&& isset(
			$_GET['_wpnonce']
		)
	) {
		$nonce = sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) );
		if ( wp_verify_nonce( $nonce, 'search_nonce' ) ) {
			$search_query = sanitize_text_field( wp_unslash( $_GET['s'] ) );
			if ( cmlt_er_is_empty_value( $search_query ) ) {
				$trail->opt['Hsearch_template_no_anchor'] = '<span class="search current-item">Buscador</span>';
			}
		}
	}
	return $trail;
}
add_filter( 'bcn_before_fill', 'cmlt_er_filter_navxt_template_empty_search' );

/**
 * Determines whether the post thumbnail can be displayed.
 */
function cmlt_er_can_show_post_thumbnail() {
	return apply_filters( 'cmlt_er_can_show_post_thumbnail', ! post_password_required() && ! is_attachment() && has_post_thumbnail() );
}

/**
 * Returns the size for avatars used in the theme.
 */
function cmlt_er_get_avatar_size() {
	return 60;
}

/**
 * Create the continue reading link
 *
 * @param string $more_string The string shown within the more link.
 */
function cmlt_er_continue_reading_link( $more_string ) {

	if ( ! is_admin() ) {
		$continue_reading = sprintf(
			/* translators: %s: Name of current post. */
			wp_kses( __( 'Continuar leyendo %s', 'el-resaltador' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="sr-only">"', '"</span>', false )
		);

		$more_string = '<span>...</span><a class="sr-only" href="' . esc_url( get_permalink() ) . '">' . $continue_reading . '</a>';
	}

	return $more_string;
}

// Filter the excerpt more link.
add_filter( 'excerpt_more', 'cmlt_er_continue_reading_link' );

// Filter the content more link.
add_filter( 'the_content_more_link', 'cmlt_er_continue_reading_link' );

/**
 * Outputs a comment in the HTML5 format.
 *
 * This function overrides the default WordPress comment output in HTML5
 * format, adding the required class for Tailwind Typography. Based on the
 * `html5_comment()` function from WordPress core.
 *
 * @param WP_Comment $comment Comment to display.
 * @param array      $args    An array of arguments.
 * @param int        $depth   Depth of the current comment.
 */
function cmlt_er_html5_comment( $comment, $args, $depth ) {
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

	$commenter          = wp_get_current_commenter();
	$show_pending_links = ! empty( $commenter['comment_author'] );

	if ( $commenter['comment_author_email'] ) {
		$moderation_note = __( 'Your comment is awaiting moderation.', 'el-resaltador' );
	} else {
		$moderation_note = __( 'Your comment is awaiting moderation. This is a preview; your comment will be visible after it has been approved.', 'el-resaltador' );
	}
	?>
	<<?php echo esc_attr( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $comment->get_children() ? 'parent' : '', $comment ); ?>> 
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
					if ( 0 !== $args['avatar_size'] ) {
						echo get_avatar( $comment, $args['avatar_size'] );
					}
					?>
					<?php
					$comment_author = get_comment_author_link( $comment );

					if ( '0' === $comment->comment_approved && ! $show_pending_links ) {
						$comment_author = get_comment_author( $comment );
					}

					printf(
						/* translators: %s: Comment author link. */
						wp_kses_post( __( '%s <span class="says">says:</span>', 'el-resaltador' ) ),
						sprintf( '<b class="fn">%s</b>', wp_kses_post( $comment_author ) )
					);
					?>
				</div><!-- .comment-author -->

				<div class="comment-metadata">
					<?php
					printf(
						'<a href="%s"><time datetime="%s">%s</time></a>',
						esc_url( get_comment_link( $comment, $args ) ),
						esc_attr( get_comment_time( 'c' ) ),
						esc_html(
							sprintf(
							/* translators: 1: Comment date, 2: Comment time. */
								__( '%1$s at %2$s', 'el-resaltador' ),
								get_comment_date( '', $comment ),
								get_comment_time()
							)
						)
					);

					edit_comment_link( __( 'Edit', 'el-resaltador' ), ' <span class="edit-link">', '</span>' );
					?>
				</div><!-- .comment-metadata -->

				<?php if ( '0' === $comment->comment_approved ) : ?>
				<em class="comment-awaiting-moderation"><?php echo esc_html( $moderation_note ); ?></em>
				<?php endif; ?>
			</footer><!-- .comment-meta -->

			<div <?php cmlt_er_content_class( 'comment-content' ); ?>>
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			<?php
			if ( '1' === $comment->comment_approved || $show_pending_links ) {
				comment_reply_link(
					array_merge(
						$args,
						array(
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<div class="reply">',
							'after'     => '</div>',
						)
					)
				);
			}
			?>
		</article><!-- .comment-body -->
	<?php
}

/**
 * Renders the post sidebar pautas.
 *
 * This function checks if the `\Cmlt\Gestor_Pautas\render_cmlt_gestor_pautas` function exists, and if so, it calls that function to render the pautas content in the 'notas-lateral' location. If the function does not exist, it logs an error message.
 *
 * This function is hooked to the `cmlt_er_action_post_sidebar` action.
 */
function cmlt_er_render_post_sidebar_pautas() {
	if ( function_exists( '\Cmlt\Gestor_Pautas\render_cmlt_gestor_pautas' ) ) {
		echo \Cmlt\Gestor_Pautas\render_cmlt_gestor_pautas( 'notas-lateral', true ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
add_action( 'cmlt_er_action_post_sidebar', 'cmlt_er_render_post_sidebar_pautas' );

/**
 * Renders the post top pautas.
 *
 * This function checks if the `\Cmlt\Gestor_Pautas\render_cmlt_gestor_pautas` function exists, and if so, it calls that function to render the pautas content in the 'notas-superior' location. If the function does not exist, it logs an error message.
 *
 * This function is hooked to the `cmlt_er_action_post_before_content` action.
 */
function cmlt_er_render_post_top_pautas() {
	if ( function_exists( '\Cmlt\Gestor_Pautas\render_cmlt_gestor_pautas' ) ) {
		echo \Cmlt\Gestor_Pautas\render_cmlt_gestor_pautas( 'notas-superior', true ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
add_action( 'cmlt_er_action_post_before_content', 'cmlt_er_render_post_top_pautas' );

/**
 * Renders the post after header pautas.
 *
 * This function checks if the `\Cmlt\Gestor_Pautas\render_cmlt_gestor_pautas` function exists, and if so, it calls that function to render the pautas content in the 'notas-debajo-tapa' location. If the function does not exist, it logs an error message.
 *
 * This function is hooked to the `cmlt_er_action_post_after_header` action.
 */
function cmlt_er_render_post_after_header_pautas() {
	if ( function_exists( '\Cmlt\Gestor_Pautas\render_cmlt_gestor_pautas' ) ) {
		echo \Cmlt\Gestor_Pautas\render_cmlt_gestor_pautas( 'notas-debajo-tapa', true ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
add_action( 'cmlt_er_action_post_after_header', 'cmlt_er_render_post_after_header_pautas' );