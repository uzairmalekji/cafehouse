<!-- <?php 
session_start();
include('includes/dbconnection.php');
include("includes/header.php");


$common_list_view = 'CafeContact.php';
$common_form_view = 'CafeContact.php';
$common_table = 'category';

$id = 0;
$name = '';
$email = '';
$description = '';

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $get_id = $_GET['id'];
    $sth = $conn->prepare("SELECT * FROM $common_table WHERE id = ?");
    $sth->execute([$get_id]);
    $sth->execute();
    $result = $sth->fetch(\PDO::FETCH_ASSOC);
    $id = $result['id'];
    $name = $result['name'];
    $email = $result['email'];
    $description = $result['description'];
}

if (empty($name)) {
    $error_msg = "Name is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)) {
    $error_msg = "Invalid email format.";
} else {
    // proceed with insert/update
}

?> -->

<section class="contact-section section-padding" id="section_5">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <em class="text-white">Say Hello</em>
                <h2 class="text-white mb-4 pb-lg-2">Contact</h2>
            </div>

            <div class="col-lg-6 col-12">
                <form action="https://formspree.io/f/mqalwlvw" method="post" class="custom-form contact-form" role="form">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <label for="name" class="form-label">Name <sup class="text-danger">*</sup></label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Uzair" value="<?php echo $name; ?>">
                        </div>

                        <div class="col-lg-6 col-12">
                            <label for="email" class="form-label">email Address</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="uzair@gmail.com"  value="<?php echo $email; ?>">
                        </div>

                        <div class="col-12">
                            <label for="message" class="form-label">How can we help?</label>
                                <textarea class="form-control" id="description" name="description" rows="4"><?php echo $description; ?></textarea>
                        </div>
                    </div>

                  
                      <div class="col-lg-5 col-12 mx-auto mt-3">
            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
            <button type="submit" class="btn btn-primary" name="btn_save" id="btn_save">Submit</button>
    </div>
         </form>
            </div>

            <div class="col-lg-6 col-12 mx-auto mt-5 mt-lg-0 ps-lg-5">
                <iframe class="google-map"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5039.668141741662!2d72.81814769288509!3d19.043340656729775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c994f34a7355%3A0x2680d63a6f7e33c2!2sLover%20Point!5e1!3m2!1sen!2sth!4v1692722771770!5m2!1sen!2sth"
                    width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
    </div>
</section>
<?php if (isset($_POST['btn_save'])) {
    $id         = $_POST['id'];
    $name      = $_POST['name'];
    $email     = $_POST['email'];
    $description = $_POST['description'];

    if ($id > 0) {
        $sql = "UPDATE $common_table SET name=?, email=?, description=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name,$email, $description, $id]);
    } else {
        $sql = "INSERT INTO $common_table (name, email, description) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name,$email, $description]);
    }
    $script = "<script>window.location = '$common_list_view';</script>";
    echo $script;
} ?>


<?php include("includes/footer.php"); ?>
