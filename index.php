<?php 

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Meu Tema
 * @since Meu Tema
 */

get_header(); ?>
    <div id="container">

        <div id="content">
        <?php /* Navegação para o Topo */ ?>
		<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
		    <div id="nav-above" class="navigation">
		     <div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">«</span> Older posts', 'your-theme' )) ?></div>
		     <div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">»</span>', 'your-theme' )) ?></div>
		    </div><!– #nav-above –>
		<?php } ?>
            <?php /* O Ciclo — com comentários! */ ?>
            <?php while ( have_posts() ) : the_post() ?>
            <?php /* Criando uma div com um ID único graças ao the_ID() e classes semânticas com o post_class() */ ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php /* um título h2 */ ?>
                <h2 class="entry-title">
                    <a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'meutema'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
                        <?php the_title(); ?>
                    </a>
                </h2>
                <?php /* Meta dados da postagem com possibilidade de tradução */ ?>
                <div class="entry-meta">
                    <span class="meta-prep meta-prep-author"><?php _e('By ', 'meutema'); ?></span>
                    <span class="author vcard"><a class="url fn n" href="<?php echo get_author_link( false, $authordata->ID, $authordata->user_nicename ); ?>" title="<?php printf( __( 'View all posts by %s', 'meutema' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span>
                    <span class="meta-sep"> | </span>
                    <span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'meutema'); ?></span>
                    <span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
                    <?php edit_post_link( __( 'Edit', 'meutema' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
                </div>
                <!– .entry-meta –>
                <?php /* O conteúdo da postagem */ ?>
                <div class="entry-content">
                    <?php the_content( __( 'Continue reading <span class="meta-nav">»</span>', 'meutema' )  ); ?>
                    <?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'meutema' ) . '&after=</div>') ?>
                </div>
                <!– .entry-content –>
                <?php /* Categoria micro-formatada e links para tags junto com link para comentários */ ?>
                <div class="entry-utility">
                    <span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'meutema' ); ?></span>
                    <?php echo get_the_category_list(', '); ?>
                    </span>
                    <span class="meta-sep"> | </span>
                    <?php the_tags( '<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('Tagged ', 'meutema' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\">|</span>\n" ) ?>
                    <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'meutema' ), __( '1 Comment', 'meutema' ), __( '% Comments', 'meutema' ) ) ?></span>
                    <?php edit_post_link( __( 'Edit', 'meutema' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ) ?>
                </div>
                <!– #entry-utility –>
            </div>
            <!– #post-<?php the_ID(); ?>–>
            <?php /* Encerrar a div e terminar o ciclo com endwhile */ ?>
            <?php endwhile; ?>
            <?php /* Navegação para o Fundo */ ?>
			<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
			    <div id="nav-below" class="navigation">
			     <div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">«</span> Older posts', 'your-theme' )) ?></div>
			     <div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">»</span>', 'your-theme' )) ?></div>
			    </div><!– #nav-below –>
			<?php } ?>
        </div>
        <!– #content –>

    </div>
    <!– #container –>

    <div id="primary" class="widget-area">
    </div>
    <!– #primary .widget-area –>

    <div id="secondary" class="widget-area">
    </div>
    <!– #secondary –>
    <?php get_footer(); ?>