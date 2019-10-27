<?php 
get_header(); 
get_template_part( 'templates/page', 'banner' );

while ( have_posts() ) :
	the_post();
?>
<section class="innerpage-con-wrap">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <article class="default-page-con">
      		<?php the_content(); ?>
        </article>
      </div>
    </div>
  </div>
</section>
<?php 
get_template_part('templates/footer', 'top');

endwhile; get_footer(); ?>