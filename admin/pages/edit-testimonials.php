<?php 
// session_start();
// if( isset($_SESSION['$username'] ) ) {

include_once("./includes/config.php");

$id = $_GET['id'];

if (isset($_POST['update'])) {

    $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : $_POST['name'];
    $description = isset($_POST['description']) ? mysqli_real_escape_string($conn, $_POST['description']) : $_POST['description'];
    
    // Handle image upload only if an image is provided
    if (!empty($_FILES["image"]["name"])) {
        if (!file_exists('uploads')) {
            mkdir('uploads', 0777, true);
        }

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
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
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
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
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        // If no new image is uploaded, retain the existing image
        $sql = "SELECT image FROM testimonials WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $image = $row['image'];
    }

    // Update the database with the new or retained image
    $sql = "UPDATE testimonials SET name = '{$name}', description = '{$description}', image = '{$image}' WHERE id = $id ";
    
    if (mysqli_query($conn, $sql)) {
        echo "<div class='text-info text-center fs-5'>Record updated successfully</div>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

$sql2 = "SELECT * FROM testimonials WHERE id = $id";
$result2 = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result2) > 0) {
    while ($row2 = mysqli_fetch_assoc($result2)) {
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="input-group mb-5">
                <span class="input-group-text" id="basic-addon1">testimonials's Name</span>
                <input type="text" class="form-control" value="<?php echo $row2['name']; ?>" name="name" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="form-floating mb-5">
                <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 200px"><?php echo $row2['description']; ?></textarea>
                <label for="floatingTextarea2">testimonials's Description</label>
            </div>

            <h4 class="text-light">Image</h4>
            <h5>Previous Image</h5>
            <img src="uploads/<?php echo $row2['image']; ?>" class="img-fluid rounded" width="180px" height="180px" style="border: 1px solid #fff; margin: 10px;" alt="">
            <div class="input-group mb-5">
                <input type="file" name="image" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            

            <button type="submit" name="update" class="btn btn-primary text-uppercase py-2 px-5 fs-4">Update</button>
        </form>
        <?php
    }
}
?>
