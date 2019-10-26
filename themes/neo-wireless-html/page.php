<?php 
get_header(); 
get_template_part( 'templates/page', 'banner' );

while ( have_posts() ) :
	the_post();
?>
<section class="pagecontent-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
      	<div class="pagecontent-inner">
      		<?php the_content(); ?>
      	</div>
      </div>
    </div>
  </div>
</section><!-- end of contact-form-sec-wrp -->
<?php endwhile; get_footer(); ?>