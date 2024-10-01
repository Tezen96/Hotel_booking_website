
<?php
  include_once("includes/header.php");
    include_once("includes/menu.php");
    ?>
   <style>
    .carousel-inner .carousel-item img{
        width: 100%;
        height: 89vh;
      }
      .carousel-control-prev-icon {
        padding: 40px;
        background-color: rgba(0, 0, 0, 0.7);
      }
      .carousel-control-next-icon{
        padding: 40px;
        background-color: rgba(0, 0, 0, 0.7);

      }
      .custom-bg{
        background-color: rgb(25, 0, 255);
        border: 1px solid ;
      }
      .custom-bg:hover{
        background-color: #ff0000;
      }
      .availability-form{
        margin-top: -50px;
        z-index: 2;
        position: relative;
      }
      @media screen and (max-width:575px){
        .availability-form{
        margin-top: 25px;
        padding: 0  35;
      }
      }
   </style>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/img/1.jpg" class="d-block" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/img/2.jpg" class="d-block" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/img/3.jpg" class="d-block" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/img/4.jpg" class="d-block" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/img/5.jpg" class="d-block" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/img/6.jpg" class="d-block" alt="..."> 
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
   

<br>

<!-- check availability form -->
<!-- <div class="container availability-form">
  <div class="row">
    <div class="col-lg-12 bg-white shadow p-4 rounded">
      <h5 class="md-4">Check Booking availability</h5>
      <form >
        <div class="row align-items-end">
          <div class="col-lg-3 md-3">
            <label class="form-label" style="font-weight:500;">Check-in</label>
            <input type="date" class="form-control shadow-none">
          </div>
          <div class="col-lg-3 md-3">
            <label class="form-label" style="font-weight:500;">Check-out</label>
            <input type="date" class="form-control shadow-none">
          </div>
          <div class="col-lg-3 md-3">
          <label class="form-label" style="font-weight:500;">Adult</label>
          <select class="form-select shadow-none">
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
          </div>
          <div class="col-lg-2 md-3">
          <label class="form-label" style="font-weight:500;">Children</label>
          <select class="form-select shadow-none">
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
          </div>
          <div class="col-lg-1 mb-lg-3 md-2">
            <button type="submit" class="btn tex-white shadow-none custom-bg">SUBMIT</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div> -->

  





<!--Our Rooms-->
<h2 class="rooms mt-5 pt-4 mb-4 text-center fw-bold">OUR ROOMS</h2>

<div class="container">
  <div class="row">
<?php 

include_once("templates/config.php");


$sql = "SELECT * FROM room ORDER BY id ASC LIMIT 3";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    // Check if the room is already booked
    $checkSql = "SELECT status FROM booked_users WHERE room_id = '{$row['id']}'";
    $checkResult = mysqli_query($conn, $checkSql);
    $isBooked = false;

    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
      $bookedData = mysqli_fetch_assoc($checkResult);
      $isBooked = ($bookedData['status'] == 1);
    }

    ?>
    <div class="col-lg-4 col-lg-1 my-3">
      <div class="card border-0 shadow" style="max-width: 300px; margin:auto;">
        <img src="./admin/uploads/<?php echo $row['image']; ?>" class="card-img-top">
        <div class="card-body">
          <h5><?php echo $row['name']; ?></h5>
          <h6 class="mb-4"><?php echo $row['price']; ?></h6>
          <!-- <div class="features mb-4">
            <h6 class="mb-1">Features</h6>
            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
            <?php echo $row['features']; ?>
            </span>
          </div> -->
          <div class="Facilities mb-4">
            <h6 class="mb-1">Facilities</h6>
            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
            <?php echo $row['facilities']; ?>
            </span>
          </div>
          <div class="Facilities mb-4">
            <h6 class="mb-1">Availability</h6>
            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
            <?php 
            if ($row['availability'] == 1) {
              echo "Available";
            } else {
              echo "Not available";
            }
            ?>
            </span>
          </div>
          <div class="rating mb-4">
            <h6 class="mb-1">Rating</h6>
            <span class="badge rounded-pill bg-light">
              <i class="fa-solid fa-star text-warning"></i>
              <i class="fa-solid fa-star text-warning"></i>
              <i class="fa-solid fa-star text-warning"></i>
              <i class="fa-solid fa-star text-warning"></i>
              <i class="fa-solid fa-star text-warning"></i>
            </span>
          </div>
            <div class="d-flex justify-content-evenly mb-2">
              <a href="booking.php?id=<?php echo $row['id']; ?>" class="btn btn-primary custom-bg shadow-none">Book Now</a>
            </div>
        </div>
      </div>
    </div>
    <?php
  }
}
?>
  </div>
</div>


<div class="text-center">
  <a href="http://localhost/hbwebsite/rooms.php"><button class="btn btn-primary">More Rooms</button></a>
</div>
<?php include_once("templates/facilities.php"); ?>
<div class="text-center py-5">
  <a href="http://localhost/hbwebsite/facilitites.php"><button class="btn btn-primary">More Facilities</button></a>
</div>
<?php include_once("templates/testimonials.php"); ?>
<?php include_once("templates/reach_us.php"); ?>

<?php
include_once("includes/footer.php");
?>
<script>
$('.silkSlider').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 2,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
</script>












