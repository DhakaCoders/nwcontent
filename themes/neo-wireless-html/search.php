<?php get_header(); 

$searchResult = ''; $typeResult = '';
if(isset($_GET['s']) && !empty($_GET['s'])) $searchResult = $_GET['s'];
if(isset($_GET['type']) && !empty($_GET['type'])) $typeResult = $_GET['type'];
$scrollId = '';
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
if($typeResult == 'products'){
  $proQuery = new WP_Query(array(
      'post_type' => 'product',
      's' => esc_sql($searchResult),
      'posts_per_page'=> 2,
      'order'=> 'DESC',
      'paged' => $paged
    ));
    $artQuery = new WP_Query();
    $scrollId = 'filterSearch';
}elseif($typeResult == 'articles'){
    $proQuery = new WP_Query();
    $artQuery = new WP_Query(array(
      'post_type' => 'post',
      's' => esc_sql($searchResult),
      'posts_per_page'=> 2,
      'order'=> 'DESC',
      'paged' => $paged
    ));
    $scrollId = 'filterSearch';
}else{
  $proQuery = new WP_Query(array(
      'post_type' => 'product',
      's' => esc_sql($searchResult),
      'posts_per_page'=> 2,
      'order'=> 'DESC',
      'paged' => $paged
    ));
    $artQuery = new WP_Query(array(
      'post_type' => 'post',
      's' => esc_sql($searchResult),
      'posts_per_page'=> 2,
      'order'=> 'DESC',
      'paged' => $paged
    ));
    $scrollId = 'filterSearch';
}

    $pcountQuery = new WP_Query(array(
      'post_type' => 'product',
      's' => esc_sql($searchResult),
      'posts_per_page'=> -1
    ));
    $acountQuery = new WP_Query(array(
      'post_type' => 'post',
      's' => esc_sql($searchResult),
      'posts_per_page'=> -1
    ));


$thisID = get_option('page_for_posts');
$standaardbanner = get_field('bannerafbeelding', $thisID);
?>
<section class="page-banner">
  <div class="page-banner-con">
    <?php if(!empty($standaardbanner)): ?>
    <div class="page-banner-bg" style="background-image: url(<?php echo $standaardbanner; ?>);"></div>
    <?php else: ?>
    <div class="main-bnr-bg" id="particles-js"></div>
    <?php endif; ?>
    <div class="page-banner-des">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="page-banner-des-innr">
              <strong class="banner-page-title"><?php _e( 'Search Result', 'neowireless' ); ?></strong>
              <div class="breadcrumbs">
                <?php cbv_breadcrumbs(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="search-result-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="search-result-con clearfix">
          <div class="search-result-left-sidebar matchHeightCol"> 
            <div class="search-box-wrp">
              <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <div class="search-box"> 
                  <input type="text" placeholder="<?php echo esc_attr__( 'Search Here', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                  <button>
                    <i>
                      <svg class="search-icon-svg" width="18" height="18" viewBox="0 0 18 18" fill="#8798B6;">
                        <use xlink:href="#search-icon-svg"></use>
                      </svg> 
                    </i> 
                  </button>
                </div>
              </form>             
            </div>
            <div class="radio-check-box-wrapper clearfix"> 
              <div class="radio-box-wrp">
                <?php _e( '<h2>Search Results</h2>', 'neowireless' ); ?>
                <div class="radio-box-block"> 
                  <form id="allproductartical" action="">
                    <input type="hidden" name="s" value="<?php echo get_search_query(); ?>">
                    <p>
                      <input type="radio" id="test1" name="type" value="all" <?php echo ($typeResult == 'all')? 'checked': ''; ?>>
                      <label for="test1">All</label>
                    </p>
                    <p>
                      <input type="radio" id="test2" name="type" value="products" <?php echo ($typeResult == 'products')? 'checked': ''; ?>>
                      <label for="test2">Products</label>
                    </p>
                    <p>
                      <input type="radio" id="test3" name="type" value="articles" <?php echo ($typeResult == 'articles')? 'checked': ''; ?>>
                      <label for="test3">Articles</label>
                    </p>                  
                  </form>
                </div>             
              </div>
<!--               <div class="check-box-wrp">
                <?php _e( '<h2>Search Filters</h2>', 'neowireless' ); ?>        
                <div class="check-box-block"> 
                  <form>
                    <div class="form-group">
                      <input type="checkbox" name="percent" id="30%">
                      <label for="30%">Lorem Ipsum </label>
                    </div>
                    <div class="form-group">
                      <input type="checkbox" name="percent" id="40%">
                      <label for="40%">Dolor sit amet </label>
                    </div>
                    <div class="form-group">
                      <input type="checkbox" name="percent" id="50%">
                      <label for="50%">maecenas edibus</label>
                    </div>
                  </form>
                </div> 
              </div> -->
            </div>
          </div>
          <div class="search-result-rgt-main matchHeightCol"> 
            <?php
             if ( $proQuery->have_posts() OR $artQuery->have_posts()) : 
              $productCount = $pcountQuery->found_posts;
              $postCount = $acountQuery->found_posts;
              $totalCount = 0;
              if(!empty($productCount) OR !empty($postCount)){
                $totalCount = $productCount + $postCount;
              }
              if($proQuery->max_num_pages > $artQuery->max_num_pages){
                $maxnum_pages = $proQuery->max_num_pages;
              }else{
                $maxnum_pages = $artQuery->max_num_pages;
              }
              

            ?>
            <div class="search-result-rgt-head" id="<?php echo $scrollId; ?>"> 
              <h1><span><?php echo $totalCount; ?></span> results for your search <span>“<?php echo get_search_query(); ?>”</span></h1>
            </div>
            <div class="search-pagi-controller"> 
              <div class="search-pagi-main"> 
 
            <?php
            if( $maxnum_pages > 1 ):
            global $wp_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links( array(
              'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
              'format' => '?paged=%#%',
              'current' => max( 1, get_query_var('paged') ),
              'total' => $maxnum_pages,
              'type'  => 'list',
              'show_all' => true,
              'prev_next' => false
            ) );
            endif; 
            ?>
                <span class="search-prev-link">   
                  <?php previous_posts_link( '<i>
                    <svg width="34" height="34" viewBox="0 0 34 34" fill="#8798B6;">
                      <use xlink:href="#search-prev-link-svg"></use>
                    </svg>                  
                  </i>' ); ?>
                </span>
                
                <span class="search-next-link">
                  <?php next_posts_link( '<i>
                    <svg width="34" height="34" viewBox="0 0 34 34" fill="#8798B6;">
                      <use xlink:href="#search-next-link-svg"></use>
                    </svg>                    
                  </i>', $maxnum_pages );?>
                </span>
              </div>
            </div>
            <div class="search-result-controller"> 
              <?php if ( $proQuery->have_posts() ) :  ?>
              <div class="product-search-result-wrp">
                <?php _e( '<h2>Products</h2>', 'neowireless' ); ?>
                <ul class="ulc"> 
                <?php while ( $proQuery->have_posts() ) : $proQuery->the_post();
                    $gridImage = get_post_thumbnail_id(get_the_ID());
                    if(!empty($gridImage)){
                      $pImgsrc = cbv_get_image_src($gridImage, 'srchgrid');
                    }else{
                      $pImgsrc = '';
                    }   
                  ?>
                  <li>
                    <div class="product-search-result clearfix "> 
                      <div class="product-search-result-lft matchHeightCol-search-grd" style="background: url(<?php echo $pImgsrc; ?>);">
                        <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
                      </div>
                      <div class="product-search-result-rgt matchHeightCol-search-grd">
                        <span><?php 
                        $term_obj_list = get_the_terms( get_the_ID(), 'product_cat' );
                        if ( $term_obj_list && ! is_wp_error( $term_obj_list ) ) : 
                          printf('%s', join(', ', wp_list_pluck($term_obj_list, 'name')));
                        endif;
                        ?></span>
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>"><?php _e( 'More Info', 'neowireless' ); ?></a>
                      </div>
                    </div>
                  </li> 
                  <?php endwhile; ?>
                </ul>


              </div>
              <?php endif; wp_reset_postdata(); if($artQuery->have_posts()): ?>
              <div class="article-search-result-wrp">
                <?php _e( '<h2>Articles</h2>', 'neowireless' ); ?>
                <ul class="ulc"> 
                  <?php while ( $artQuery->have_posts() ) : $artQuery->the_post();
                    $gridImage = get_post_thumbnail_id(get_the_ID());
                    if(!empty($gridImage)){
                      $pImgsrc = cbv_get_image_src($gridImage, 'srchgrid');
                    }else{
                      $pImgsrc = '';
                    }   
                  ?>
                  <li>
                    <div class="article-search-result clearfix "> 
                      <div class="article-search-result-lft matchHeightCol-search-grd" style="background: url(<?php echo $pImgsrc; ?>);">
                        <a href="<?php the_permalink(); ?>" class="overlay-link"></a>                        
                      </div>
                      <div class="article-search-result-rgt matchHeightCol-search-grd">
                        <div class="article-search-result-head">
                          <span><?php the_category(', '); ?></span>
                          <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>                          
                        </div>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>"><?php _e( 'Read More', 'neowireless' ); ?></a>
                        <div class="date"> 
                          <strong><?php echo get_the_date('d'); ?></strong>
                          <span><?php echo get_the_date('M'); ?></span>
                        </div>
                      </div>
                    </div>
                  </li> 
                  <?php endwhile; ?>
                </ul>
              </div>
              <?php endif; wp_reset_postdata(); ?>
            </div>
            <div class="search-pagi-controller"> 
              <div class="search-pagi-main"> 
                 
              <?php
              if( $maxnum_pages > 1 ):
              global $wp_query;
              $big = 999999999; // need an unlikely integer
              echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $maxnum_pages,
                'type'  => 'list',
                'show_all' => true,
                'prev_next' => false
              ) );
              endif; 

              
              ?>             
                <span class="search-prev-link">   
                  <?php previous_posts_link( '<i>
                    <svg width="34" height="34" viewBox="0 0 34 34" fill="#8798B6;">
                      <use xlink:href="#search-prev-link-svg"></use>
                    </svg>                  
                  </i>' ); ?>
                </span>
                
                <span class="search-next-link">
                  <?php next_posts_link( '<i>
                    <svg width="34" height="34" viewBox="0 0 34 34" fill="#8798B6;">
                      <use xlink:href="#search-next-link-svg"></use>
                    </svg>                    
                  </i>', $maxnum_pages );?>
                </span>
              </div>
            </div>
            <?php else: ?>
            <div class="dfnotfound">
              <p>Geen resultaten!</p>
            </div>
          <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php 
get_template_part('templates/footer', 'top');

get_footer(); ?>