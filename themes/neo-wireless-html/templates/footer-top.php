<?php
$mounting = get_field('mounting', HOMEID);
$wifi = get_field('wifi_sec', HOMEID);
$show__hidemwifi = get_field('show__hidemwifi', HOMEID);
if($show__hidemwifi){ 
  $customClass = '';
  //if(is_shop() OR is_product()) $customClass = ' wcftmargin';
?>
<section class="footer-top-sec-wrp<?php echo $customClass; ?> clearfix">
   <div class="footer-top-lft">
     <div class="footer-top-lft-bg" style="background: url(<?php echo $mounting['image']; ?>);">
       <div class="footer-top-dsc">
        <?php 
          if( !empty( $mounting['title'] ) ) printf( '<h2>%s</h2>', $mounting['title']); 
          if( !empty( $mounting['content'] ) ) echo wpautop($mounting['content']);

          $link7 = $mounting['link'];
          if( is_array( $link7 ) &&  !empty( $link7['url'] ) ){
            printf('<a href="%s" target="%s">%s</a>', $link7['url'], $link7['target'], $link7['title']); 
          }
        ?> 
       </div>
     </div>
   </div>
   <div class="footer-top-rgt">
     <div class="footer-top-rgt-bg" style="background: url(<?php echo $wifi['image']; ?>);">
       <div class="footer-top-dsc">
        <?php 
          if( !empty( $wifi['title'] ) ) printf( '<h2>%s</h2>', $wifi['title']); 
          if( !empty( $wifi['content'] ) ) echo wpautop($wifi['content']);

          $link8 = $wifi['link'];
          if( is_array( $link8 ) &&  !empty( $link8['url'] ) ){
            printf('<a href="%s" target="%s">%s</a>', $link8['url'], $link8['target'], $link8['title']); 
          }
        ?> 
       </div>
     </div>
   </div>
</section><!--end of footer-top-sec-wrp -->
<?php } ?>