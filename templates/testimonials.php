<!--Our Testimonials-->
<div class="slick-slider bg-info py-3">
  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold">OUR TESTIMONIALS</h2>
  <div class="container ">
    <?php 

    $sql = "SELECT * FROM testimonials";
    $result = mysqli_query( $conn, $sql );
    if( mysqli_num_rows( $result ) > 0 ){





?>
<style>
  .silkSlider .col-12 img{
    width: 100%;
    height: 20vh I !important;
  }
  .slick-slide img{
    width: 100%;
    height: 40vh;
  }
  .silkSlider img{
    max-width: 300px;
    width: 100%;
    max-height: 300px;
    height: 100%;
  }
</style>
    <div class="row silkSlider">
      <?php while( $row = mysqli_fetch_assoc( $result ) ) { ?>

      <div class="col-12 col-md-6 col-lg-4 text-center pe-3">
        <img src="./admin/uploads/<?php echo htmlspecialchars( $row['image'] ); ?>"  alt="" >
        <h4><?php echo htmlspecialchars( htmlspecialchars_decode( $row['name'] ) ); ?></h4>
        <p>"<?php echo htmlspecialchars( htmlspecialchars_decode( $row['description'] ) ); ?>"</p>
        <div class="rating">
          <i class="fa-solid fa-star text-warning"></i>
          <i class="fa-solid fa-star text-warning"></i>
          <i class="fa-solid fa-star text-warning"></i>
          <i class="fa-solid fa-star text-warning"></i>
          <i class="fa-solid fa-star text-warning"></i>
        </div>

      </div>
      <?php } ?>
    </div>
    <?php  } ?>
  </div>
</div>

<div class="col-lg-12 text-center mt-5">
  <a href="http://localhost/hbwebsite/aboutus.php" class="btn btn-primary text-light mb-3 btn-outline-dark rounded-0 fw-bold shadow-none">Know more>>></a>
</div>