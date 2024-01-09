<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php 

    if(!isset($_SESSION['username'])) {
          
      header("location: ".APPURL."");
      
    }

    if(isset($_GET['upd_id'])) {

        $id = $_GET['upd_id'];

        if($_SESSION['id'] !== $id ) {
          
          header("location: ".APPURL."");
          
        }

        $select = $conn->query("SELECT * FROM users WHERE id='$id'");
        $select->execute();
        $profile = $select->fetch(PDO::FETCH_OBJ);

        if(isset($_post['submit'])) {

          if(empty($_POST['username']) OR empty($_POST['email'])) {
            echo "<script>alert('username or email is empty')</script>";
          } else {

            $username = $_POST['username'];
            $email = $_POST['email'];
            $title = $_POST['title'];
            $bio = $_POST['bio'];
            $facebook = $_POST['facebook'];
            $twitter = $_POST['twitter'];
            $linkedin = $_POST['linkedin'];
            // $img = $_FILES['img']['name'];
             
            //condition ?  perform smth : perform smth else
            $profile->type == "Worker" ? $cv = $_FILES['cv']['name'] : $cv = 'NULL';
            $dir_img = 'user-images/' . basename($img);
            $dir_cv = 'user-cvs/' . basename($cv);

            $update = $conn->prepare("UPDATE users SET username = :username, email = :email, title = :title, 
            bio = :bio, facebook = :facebook, twitter = :twitter, linkedin = :linkedin, img = :img, cv = :cv WHERE id = '$id'");
            
            
            if($img !== '' AND $cv !== '') {

              unlink("user-images/".$profile->img."");
              unlink("user-cvs/".$profile->cv."");
              $update->execute([
                ':username' => $username,
                ':email' => $email,
                ':title' => $title,
                ':bio' => $bio,
                ':facebook' => $facebook,
                ':twitter' => $twitter,
                ':linkedin' => $linkedin,
                ':img' => $img,
                ':cv' => $cv,
              ]);
            } else {
              $update->execute([
                ':username' => $username,
                ':email' => $email,
                ':title' => $title,
                ':bio' => $bio,
                ':facebook' => $facebook,
                ':twitter' => $twitter,
                ':linkedin' => $linkedin,
                ':img' => $profile->img,
                ':cv' => $profile->cv,
              ]);

                header("location: ".APPURL."");

            }
            
            if(move_uploaded_file($_FILES['img']['tmp_name'], $dir_img) AND move_uploaded_file($_FILES['cv']['tmp_name'], $dir_cv)) {
              header("location: ".APPURL."");
            }

          }
        }

    } else {

        echo "404";
    }


?>

<!-- HOME -->
<section class="section-hero overlay inner-page bg-image" style="background-image: url('../images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Update Profile</h1>
            <div class="custom-breadcrumbs">
              <a href="<?php echo APPURL; ?>">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Update Profile</strong></span>
            </div>
          </div>
        </div>
      </div>
</section>

<section class="site-section" id="next-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <form action="update-profile.php?upd_id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data" class="">

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="username">Username</label>
                  <input type="text" id="username" value="<?php echo $profile->username; ?>" name="username" class="form-control">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">Email</label>
                  <input type="email" id="email" value="<?php echo $profile->email; ?>" name="email" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="email" class="form-control">
                </div>
              </div>
                <?php if(isset($_SESSION['type']) AND $_SESSION['type'] == "Worker") : ?>
                      <div class="row form-group">
                                
                        <div class="col-md-12">
                       <!-- <label class="text-black" for="title">Title</label> --> 
                        <input type="text" id="" value="<?php echo $profile->title; ?>" name="title" class="form-control">
                      </div>
                            </div>
                <?php else: ?>

                  <div class="row form-group">
                                
                      <div class="col-md-12">
                        <!-- <label class="text-black" for="title">Title</label> --> 
                        <input type="hidden" id="" value="NULL" name="title" class="form-control">
                         </div>
                      </div>
                      <?php endif; ?>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Bio</label> 
                  <textarea name="bio" id="" value="" cols="30" rows="7" name="bio" class="form-control" placeholder="Enter bio here" ><?php echo $profile->bio; ?></textarea>
                </div>
              </div> 

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="facebook">Facebook</label> 
                  <input type="subject" id="facebook" value="<?php echo $profile->facebook; ?>" name="facebook" class="form-control">
                </div>
                </div>

                <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="twitter">Twitter</label> 
                  <input type="subject" id="twitter" value="<?php echo $profile->twitter; ?>" name="twitter" class="form-control">
                </div>
                </div>

                <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="linkedin">LinkedIn</label> 
                  <input type="subject" id="linkedin" value="<?php echo $profile->linkedin; ?>" name="linkedin" class="form-control">
                </div>
                </div>

                <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="img">Image</label>
                  <input type="file" name="img" id="" class="form-control">
                </div>
                </div>

                <?php if(isset($_SESSION['type']) AND $_SESSION['type'] == "Worker") : ?>
                <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="cv">CV</label> 
                  <input type="file" name="cv" id="" class="form-control">
                </div>
                </div>
                <?php else: ?>

                <div class="row form-group">
                <div class="col-md-12">
                 <!-- <label class="text-black" for="cv">CV</label> --> 
                  <input type="hidden" value="NULL" name="cv" id="" class="form-control">
                </div>
                </div>
                <?php endif; ?>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Update" class="btn btn-primary btn-md text-white">
                </div>
              </div>

  
            </form>
          </div>
        </div>
      </div>
</section>

<?php require "../includes/footer.php"; ?>