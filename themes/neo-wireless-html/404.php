<?php get_header(); ?>
<section class="page-banner">
  <div class="page-banner-con">
    <div class="main-bnr-bg" id="particles-js"></div>
    <div class="page-banner-des">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="page-banner-des-innr">
              <strong class="banner-page-title">404</strong>
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

<section class="error-404-wrap">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>404</h1>
				<p>Deze pagina bestaat niet.</p>
			</div>
		</div>
	</div>
</section>

<?php get_template_part('templates/footer', 'top'); get_footer(); ?>