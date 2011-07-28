<?php
/*
Plugin Name: Pixel Solitaire - Skin Admin Classic Foncé
Plugin URI: http://pixel-solitaire.com/telechargements/skin-admin-classic-fonce/
Description: Plugin de modification des styles du système d'administration de Wordpress.
Author: le Pixel Solitaire
Version: 1.2
Author URI: http://pixel-solitaire.com/
*/

if (is_admin()) {

	function pixel_bouton_admin_bar() {
		global $wp_admin_bar;
		$wp_admin_bar->add_menu( array( 
			'id' => 'lien_perso', 
			'title' => __('Pixel Solitaire'),  
			'href' => 'http://pixel-solitaire.com',
			'meta' => array( target => '_blank', title => 'Les nouvelles du Pixel Solitaire' )
		));
		$wp_admin_bar->add_menu( array( 
			'parent' => 'lien_perso', 
			'title' => __('Page du "Skin Classic foncé"'),  
			'href' => 'http://pixel-solitaire.com/telechargements/skin-admin-classic-fonce/',
			'meta' => array( target => '_blank', title => 'Documentation officielle du plugin' )
		));
	}
	add_action( 'wp_before_admin_bar_render', 'pixel_bouton_admin_bar' );
	
	function pixel_admin_css() {
		$lien_vers_le_CSS = WP_PLUGIN_URL . '/pixel-admin/classic-fonce.css';
        $le_fichier_CSS = WP_PLUGIN_DIR . '/pixel-admin/classic-fonce.css';
        if ( file_exists($le_fichier_CSS) ) {
            wp_register_style('pixel_classic_css', $lien_vers_le_CSS);
            wp_enqueue_style( 'pixel_classic_css');
        };
	}
	add_action( 'admin_init', 'pixel_admin_css' );
	
	function pied_de_page_admin_sur_mesure () {
		echo '© <a href="http://pixel-solitaire.com" target="_blank" title="Les nouvelles du Pixel Solitaire">Pixel Solitaire</a> 2011, tous droits réservés. || Communauté <a href="http://www.wordpress-fr.net/" target="_blank" title="Actualités, téléchargements, forums, FAQ, etc.">WordPress francophone</a>'; 
	}
	add_filter('admin_footer_text', 'pied_de_page_admin_sur_mesure'); 
	
};
?>