<h2 class="rooms mt-5 pt-4 mb-4 text-center fw-bold">OUR ROOMS</h2>
<div class="container">
  <div class="row">
    <?php 
    include_once("config.php");

    // Fetch all rooms
    $sql = "SELECT * FROM room";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        // Check if the room is booked
        $checkSql = "SELECT status FROM booked_users WHERE room_id = '{$row['id']}'";
        $checkResult = mysqli_query($conn, $checkSql);
        $isBooked = false;

        if ($checkResult && mysqli_num_rows($checkResult) > 0) {
          $bookedData = mysqli_fetch_assoc($checkResult);
          $isBooked = ($bookedData['status'] === '1');
        }

        // Display room only if it is not duplicated
        if (!$isBooked) {
          ?>
          <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 300px; margin:auto;">
              <img src="./admin/uploads/<?php echo $row['image']; ?>" class="card-img-top">
              <div class="card-body">
                <h5><?php echo $row['name']; ?></h5>
                <h6 class="mb-4"><?php echo $row['price']; ?></h6>

                
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
                    <a href="more-details.php?id=<?php echo $row['id']; ?>" class="btn btn-success custom-bg shadow-none">More Details</a>
                    <a href="booking.php?id=<?php echo $row['id']; ?>" class="btn btn-success custom-bg shadow-none">Book Now</a>
                </div>
        
              </div>
            </div>
          </div>
          <?php
        }
      }
    }
    ?>
  </div>
</div>
