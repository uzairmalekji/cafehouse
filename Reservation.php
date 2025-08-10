<!doctype html>
<html lang="en">


<?php 

session_start();
include('includes/dbconnection.php');


$common_list_view = 'Reservation.php';
$common_form_view = 'Reservation.php';
$common_table = 'reservation';

$ID = 0;
$Name = '';
$MobileNumber = '';
$Time = '';
$Date = '';
$NumberofPeople = '';
$Description = '';

if (isset($_GET['ID']) && $_GET['ID'] > 0) {
    $get_id = $_GET['ID'];
    $sth = $conn->prepare("SELECT * FROM $common_table WHERE ID = ?");
    $sth->execute([$get_id]);
    $sth->execute();
    $result = $sth->fetch(\PDO::FETCH_ASSOC);
    $ID             = $result['ID'];
    $Name           = $result['Name'];
    $MobileNumber   = $result['MobileNumber'];
    $Time           = $result['Time'];
    $Date           = $result['Date'];
    $NumberofPeople = $result['NumberofPeople'];
    $Description    = $result['Description'];
}


?>


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="Description" content="">
        <meta name="author" content="">

        <title>Barista Cafe - HTML Reservation Form</title>

        <!-- CSS FILES -->                
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,400;0,600;0,700;1,200;1,700&display=swap" rel="stylesheet">
            
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/vegas.min.css" rel="stylesheet">

        <link href="css/tooplate-barista.css" rel="stylesheet">
<!--

Tooplate 2137 Barista

https://www.tooplate.com/view/2137-barista-cafe

Bootstrap 5 HTML CSS Template

-->
    </head>
    
    <body class="reservation-page">
                
            <main>
                <nav class="navbar navbar-expand-lg">                
                    <div class="container">
                        <a class="navbar-brand d-flex align-items-center" href="CafeHome.php">
                            <img src="images/coffee-beans.png" class="navbar-brand-image img-fluid" alt="">
                            Coffeehouse.Co
                        </a>
        
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
        
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-lg-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="CafeHome.php">Home</a>
                                </li>
        
                                <li class="nav-item">
                                    <a class="nav-link" href="CafeAbout.php">About us</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="CafeOurMenu.php">Our Menu</a>
                                </li>


                                <li class="nav-item">
                                    <a class="nav-link" href="CafeContact.php">Contact</a>
                                </li>
                            </ul>

                            <div class="ms-lg-3">
                                <a class="btn custom-btn custom-border-btn" href="Reservation.php">
                                    Reservation
                                    <i class="bi-arrow-up-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
     <section class="booking-section section-padding">
           <div class="container">
                <div class="row">

                    <div class="col-lg-10 col-12 mx-auto">
                        <div class="booking-form-wrap">
                            <div class="row">
                                <div class="col-lg-7 col-12 p-0">
                                    <form class="custom-form booking-form" action="https://formspree.io/f/mldlallk" method="post" role="form">
                                        <div class="text-center mb-4 pb-lg-2">
                                            <em class="text-white">Fill out the booking form</em>

                                            <h2 class="text-white">Book a table</h2>
                                        </div>

                                        <div class="booking-form-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-12">
                                                    <input type="text" name="Name" id="Name" class="form-control" placeholder="Full Name" value="<?php echo $Name; ?>">
                                                </div>

                                                    <div class="col-lg-6 col-12">
                                                         <input type="text" name="MobileNumber" id="MobileNumber" class="form-control" placeholder="Phone: 092 456 8001" value="<?php echo $MobileNumber; ?>">
                                                    </div>

                                                    <div class="col-lg-6 col-12">
                                                         <input type="text" name="Time" id="Time" class="form-control" placeholder="Uzair" value="18:30" value="<?php echo $Time; ?>">
                                                    </div>

                                                    <div class="col-lg-6 col-12">
                                                         <input type="date" name="Date" id="Date" class="form-control" placeholder="Date" value="<?php echo $Date; ?>">
                                                    </div>

                                                    <div class="col-lg-12 col-12">
                                                        <input type="text" name="NumberofPeople" id="NumberofPeople" class="form-control" placeholder="Number of People" value="<?php echo $NumberofPeople; ?>">

                                                        <textarea class="form-control" id="Description" name="Description" placeholder="Comment (Optional)" rows="3"><?php echo $Description; ?></textarea>
                                                    </div>

                                                    <div class="col-lg-4 col-md-10 col-8 mx-auto mt-2">
                                                         <input type="hidden" name="ID" id="ID" value="<?php echo $ID; ?>">
                                                         <button type="submit" class="btn btn-primary" name="btn_save" id="btn_save">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-lg-5 col-12 p-0">
                                        <div class="booking-form-image-wrap">
                                            
                                            <img src="images/barman-with-fruits.jpg" class="booking-form-image img-fluid" alt="">
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
 <!-- <?php if (isset($_POST['btn_save'])) {
    $ID           = $_POST['ID'];
    $Name         = $_POST['Name'];
    $MobileNumber = $_POST['MobileNumber'];
    $Time         = $_POST['Time'];
    $Date         = $_POST['Date'];
    $NumberofPeople= $_POST['NumberofPeople'];
    $Description  = $_POST['Description'];

    if ($ID > 0) {
        $sql = "UPDATE $common_table SET Name=?, MobileNumber=?, Time=?, Date=?, NumberofPeople=?, Description=? WHERE ID=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$Name, $MobileNumber, $Time, $Date, $NumberofPeople, $Description, $ID]);
    } else {
        $sql = "INSERT INTO $common_table (Name, MobileNumber, Time, Date, NumberofPeople, Description) VALUES (?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$Name, $MobileNumber, $Time, $Date,$NumberofPeople, $Description]);
    }
    $script = "<script>window.location = '$common_list_view';</script>";
    echo $script;
} ?> -->



<?php include("includes/footer.php"); ?>