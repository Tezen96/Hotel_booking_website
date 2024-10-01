<?php 

// session_start();
if( isset( $_SESSION['username'] ) ) {
   

    include_once("./includes/config.php");





if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $facilities = mysqli_real_escape_string($conn, $_POST['facilities']);
    // $features = mysqli_real_escape_string($conn, $_POST['features']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    
    // Handle image upload
    if (!file_exists('uploads')) {
        mkdir('uploads', 0777, true);
    }

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 5000000) { // 5MB limit
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = basename($_FILES["image"]["name"]);
            $sql = "INSERT INTO room (name, description, image, facilities, price, availability, status, action ) VALUES ('{$name}', '{$description}', '{$image}', '{$facilities}', '{$price}', 1, 0, 0 )";
            
            if (mysqli_query($conn, $sql)) {
                // echo "The file ". htmlspecialchars(basename($_FILES["image"]["name"])). " has been uploaded.";
                echo "<div class='text-info text-center fs-5'>New record created successfully</div>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="input-group mb-5">
        <span class="input-group-text" id="basic-addon1">Room's Name</span>
        <input type="text" class="form-control" name="name" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <div class="form-floating mb-5">
        <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 200px"></textarea>
        <label for="floatingTextarea2">Room's Description</label>
    </div>

    <h4 class="text-light">Room's image</h4>
    <div class="input-group mb-5">
        <input type="file" name="image" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-5">
        <span class="input-group-text" id="basic-addon1">Price</span>
        <input type="number" name="price" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <!-- <div class="form-floating mb-5">
        <textarea name="features" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 200px"></textarea>
        <label for="floatingTextarea2">Features</label>
    </div> -->

    <div class="input-group mb-5">
        <span class="input-group-text" id="basic-addon1">Facilities</span>
        <input name="facilities" type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <button type="submit" name="submit" class="btn btn-primary text-uppercase py-2 px-5 fs-4">Submit</button>
</form>
<?php
} else {
    header("Location: http://localhost/hbwebsite/admin/login.php");
}

