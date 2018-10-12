<?php 
function osome_shortcode($atts, $content = null){

	/* Enqueue Style and Scripts only when Shortcode will used*/
     wp_enqueue_style('osomepost_slider_style');
	 wp_enqueue_style('osomepost_owl_slider_style');
	 wp_enqueue_style('osomepost_slider_default_style');
	 wp_enqueue_script('osomepost_slider_js');
    ob_start();

	extract(shortcode_atts( array(  
			'category' => '-1',
			'auto_play' => 'true',
		), $atts));
		global $post;
		$randslid = rand(1,1000);
		// 	query posts
		$arg =	array( 'post_type' => 'post',
						'posts_per_page' => $number,
						'orderby' => $order_by,
						'order' => $order 
					  );			
	if($category > -1) {
			$arg['tax_query'] = array(array('taxonomy' => 'category','field' => 'id','terms' => $category ));
	}
	
	$slider_loop = new WP_Query($arg);
	$result='';
	$result .='<script>
				jQuery(document).ready(function() {
				  jQuery("#owl_osome_slider_show-'.$randslid.'").owlCarousel({
					loop:true,
					margin:10,
					nav:true,
					autoplay:true,
					navText : ["<",">"],
					responsive:{
						0:{
							items:1
						},
						600:{
							items:3
						},
						1000:{
							items:3
						}
					}
				})
			});
		</script>';
		$result .='
		<style>
			#owl-demo .item img{
				display: block;
				width: 100%;
				height: auto;
			}
		</style>';
		$result .='
		<div id="owl_osome_slider_show-'.$randslid.'" class="owl-carousel owl-theme">';
	if($slider_loop->have_posts()){	
		while($slider_loop->have_posts()):$slider_loop->the_post(); 
			$catid = get_the_ID();
			$cats = get_the_category($catid);
			setup_postdata( $post );
			$excerpt = get_the_excerpt();
		
		$result .='<div class="item">';
			if ( has_post_thumbnail() ) {
					$result .= '<a href="'.esc_url(get_the_permalink()).'">'.get_the_post_thumbnail( $post->ID, 'post-slider-thumb', array( 'class' => "img-responsive" ) ).'</a>';
				}
		$result .='<div class="post_title_carausel"><h3>'.get_the_title().'</h3></div>';
		$result .='<div class="post_title_carausel">'.get_the_excerpt().'</div>';		
		$result .='</div>';
		endwhile;
		wp_reset_postdata();
		$result .='</div>';
		return $result; 
		}
		else{
			echo 'Nothing Found !!';	
		}
}
add_shortcode('osomepost_slider','osome_shortcode');