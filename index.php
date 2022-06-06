<?php 
  $servername = "localhost";
  $username = "root";
  $password = "mysql";

    $conn = new mysqli($servername, $username, $password);
    
  $sql = "CREATE DATABASE IF NOT EXISTS voyage";

  $conn -> query($sql);

  $sql1 = "CREATE TABLE IF NOT EXISTS customers (
    firstName VARCHAR(20),
    lastName VARCHAR(20),
    package VARCHAR(20),
    email VARCHAR(40),
    traveldate DATE,
    phoneNo int
    );";

    $sql5 = "CREATE TABLE IF NOT EXISTS subscribers (
      email VARCHAR(40)
      );";

$use = "USE voyage;";
$conn -> query($use);
$conn -> query($sql1);
$conn -> query($sql5);

$fnerr = $lnerr = $pkgerr = $emerr = $dateerr = $noerr = $email2 = $firstname = $lastname = $package = $email = $traveldate = "";
$phoneNo =0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
    $fnerr = "This is required";
  } else {
    $firstname = input($_POST["firstname"]);
  }
  
  if (empty($_POST["email"])) {
    $emerr = "This is required";
  } else {
    $email = input($_POST["email"]);
  }

  if (empty($_POST["lastname"])) {
    $lnerr = "This is required";
  } else {
    $lastname = input($_POST["lastname"]);
  }
  
  if (empty($_POST["package"])) {
    $pkgerr = "This is required";
  } else {
    $package = input($_POST["package"]);
  }

  if (empty($_POST["traveldate"])) {
    $dateerr = "This is required";
  } else {
    $traveldate = input($_POST["traveldate"]);
  }
  
  if (empty($_POST["phoneNo"])) {
    $noerr = "This is required";
  } else {
    $phoneNo = input($_POST["phoneNo"]);
  }
    
}

if(isset($_POST["email2"])){
  $email2 = input($_POST["email2"]);
}

  function input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

<!DOCTYPE html>
<html>
<script>
function checkbook(str) {
    if (str.length == 0) {
        document.getElementById("s1").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("s1").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "get.php?q=" + str, true);
        xmlhttp.send();
    }
}
function checksub(str) {
    if (str.length == 0) {
        document.getElementById("s2").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("s2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "sub.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Voyage</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,500,700&display=swap"
    rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
  <script type="text/javascript" src="ajax.js"></script>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <div class="fk_width" id="">
            <div class="custom_menu-btn">
            </div>
          </div>
          <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="" />
          </a>
          <div class="user_option">
            <a href="#">
              <img style="visibility: hidden;" src="images/user-icon.png" alt="" />
            </a>
            <form class="form-inline my-2 my-lg-0  mb-3 mb-lg-0">
              <button style="visibility: hidden;" class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
            </form>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->

    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div class="detail-box">
        <div class="row">
          <div class="col-md-8 col-lg-6 mx-auto">
            <h1>
              Book Now <br />
              Voyage
            </h1>
            <p>
              Voyage takes you deep into top-rated cruise ports and off-the-beaten-path jewels anywhere you choose to go
              in the globe, so you can experience each one like a native. It all starts with the world's most daring
              cruise ships, which have received honors for everything from world-class dining and stunning entertainment
              to record-breaking onboard thrills and ground-breaking innovation.
            </p>
            <div>
              <a href="#sect">
                Book now
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="img-box">
        <!-- <div class="play_btn">
          <a href="#">
            <img src="images/play.png" alt="" />
          </a>
        </div> -->
        <img src="images/slider-img.png" class="slider-img" alt="" />
      </div>
    </section>
    <!-- end slider section -->
  </div>


  <!-- book section -->

  <section class="book_section ">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="heading_container">
            <h2 id="sect">
              Enquire now!
            </h2>
            <p>
              We offer many packages for every budget.
            </p>
          </div>
          <form id="custform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-row ">
              <div class="form-group col-lg-4">
                <label for="inputPrice">First Name</label>
                <input name="firstname" type="text" class="form-control" id="inputPrice">
                <span style="color: red;"><?php echo $fnerr?></span>
              </div>
              <div class="form-group col-lg-4">
                <label for="inputPrice">Last Name</label>
                <input name="lastname" type="text" class="form-control" id="inputPrice">
                <span style="color: red;"><?php echo $lnerr?></span>
              </div>
              <div class="form-group col-lg-4">
                <label for="inputAddress1">Package</label>
                <select id="pkg" class="custom-select" name="package">
                  <option></option>
                  <option value="Carribean">Carribean Cruise</option>
                  <option value="Europe">Europe Cruise</option>
                  <option value="Pacific">Pacific Coast Cruise</option>
                  <option value="Canada">Canada Cruise</option>
                  <option value="Asia">Asia Cruise</option>
                  <option value="Mediterranean">Mediterranean Cruise</option>
                </select>
                <span style="color: red;"><?php echo $pkgerr?></span>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-lg-4">
                <label for="inputEmail4">Email</label>
                <input name="email" type="email" class="form-control" onkeyup="checkbook(this.value)" id="inputEmail4">
                <span style="color: red;" id="s1"><?php echo $emerr?></span>
              </div>
              <div class="form-group col-lg-4">
                <label for="inputDate">Date</label>
                <input name="traveldate" type="date" class="form-control" id="inputDate">
                <span style="color: red;"><?php echo $dateerr?></span>
              </div>
              <div class="form-group col-lg-4">
                <label for="inputPhone">Phone Number</label>
                <input name="phoneNo" type="number" class="form-control" id="inputPhone">
                <span style="color: red;"><?php echo $noerr?></span>
              </div>
            </div>
            <div class="d-flex justify-content-center">
              <button id="button" type="submit" class="btn ">Book Now</button>
            </div>
          </form>
          <?php 
          $database = "USE voyage;";
          $conn -> query($database);
          $sql2 = "INSERT INTO customers VALUES('$firstname', '$lastname', '$package', '$email', '$traveldate', $phoneNo);";
          $conn -> query($sql2);
          ?>
        </div>
      </div>
    </div>
  </section>


  <!-- end book section -->


  <!-- package section -->
  <section class="package_section layout_padding-top">
    <div class="container">
      <div class="heading_container">
        <h2>
          Packages
        </h2>
        <p>
          Our most popular choices right now!
        </p>
      </div>
    </div>
    <div class="container">
      <div class="package_container">
        <div class="box">
          <div class="detail-box">
            <h4>
              Carribean Cruise
            </h4>
            <div class="price_detail">
              <h5>
                $900
              </h5>
              <p>
                Enjoy poolside drinks or fun at the arcade with views of Carribean islands!
              </p>
            </div>
              <a onclick="document.getElementById('pkg').value = 'Carribean'" href="#sect">
              Book Now
            </a><
          </div>
        </div>
        <div class="box">
          <div class="detail-box">
            <h4>
             Europe Cruise
            </h4>
            <div class="price_detail">
              <h5>
                $1100
              </h5>
              <p>
                Incredible views of Europe with many stops in cosy beach towns!
              </p>
            </div>
            <a onclick="document.getElementById('pkg').value = 'Europe'" href="#sect">
              Book Now
            </a>
          </div>
        </div>
        <div class="box ">
          <div class="detail-box">
            <h4>
              Pacific Coast Cruise
            </h4>
            <div class="price_detail">
              <h5>
                $2000
              </h5>
              <p>
                Take in the beauty of the Pacific and its many coastal cities!
              </p>
            </div>
            <a onclick="document.getElementById('pkg').value = 'Pacific'" href="#sect">
              Book Now
            </a>
          </div>
        </div>
        <div class="box ">
          <div class="detail-box">
            <h4>
              Canada Cruise
            </h4>
            <div class="price_detail">
              <h5>
                $1300
              </h5>
              <p>
                Breathtaking journey into the North Pole with every luxury you can think of!
              </p>
            </div>
            <a onclick="document.getElementById('pkg').value = 'Canada'" href="#sect">
              Book Now
            </a>
          </div>
        </div>
        <div class="box ">
          <div class="detail-box">
            <h4>
              Asia Cruise
            </h4>
            <div class="price_detail">
              <h5>
                $1000
              </h5>
              <p>
                Experience energetic cities, traditional architecture and exotic landscapes will overwhelm your senses.
              </p>
            </div>
            <a onclick="document.getElementById('pkg').value = 'Asia'" href="#sect">
              Book Now
            </a>
          </div>
        </div>
        <div class="box ">
          <div class="detail-box">
            <h4>
                Mediterranean Cruise
            </h4>
            <div class="price_detail">
              <h5>
                $700
              </h5>
              <p>
                Explore the charming, ancient harbors of Spain, France, Egypt, Italy, and Greece!
              </p>
            </div>
            <a onclick="document.getElementById('pkg').value = 'Mediterranean'" href="#sect">
              Book Now
            </a>
            </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end package section -->


  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="heading_container">
      <h2>
        About Us
      </h2>
      <p style="width: 80%;">
        Whether you're traveling alone or with the whole family, there are plenty of ahh-inducing cruise rooms to choose
        from, including budget-friendly connecting staterooms that are ideal for groups, romantic rooms for couples
        seeking rejuvenation and relaxation, and even a thrill-filled Ultimate Family Suite with a private game room and
        in-suite slide.
      </p>
    </div>
    <div class="img-box">
      <img src="images/about-img.png" class="slider-img" alt="" />
    </div>
    <div class="btn-box">
      <a href="#">
        Read More
      </a>
    </div>
  </section>

  <!-- end about section -->


  <!-- client section -->
  <section class="client_section ">
    <div class="container">
      <div class="heading_container">
        <h2>
          What Our Customers Say
        </h2>
        <p>
          See what our passengers had to say!
        </p>
      </div>
    </div>
    <div class="swiper">
      <div class="swiper-wrapper">

        <div class="container">
          <div id="myCarousel" class="carousel slide">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li class="item1 active"></li>
              <li class="item2"></li>
              <li class="item3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <div class="client_card">
                      <div class="client_info">
                        <div class="image_section">
                          <img src="images/7.jpg" alt="" />
                        </div>
                        <div class="name">
                          <h5>Emme Gossa</h5>
                          <p>Passenger</p>
                        </div>
                      </div>
                      <div class="review">
                        <p>
                          If you're looking for an amazing Canada cruise, then you need to check out Voyage. Their ships are top-notch, and the staff are incredibly friendly and helpful. The itinerary was packed with awesome activities, and the food was fantastic. I would definitely recommend Voyage to anyone looking for a great cruise experience.
                        </p>
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide">
                    <div class="client_card">
                      <div class="client_info">
                        <div class="image_section">
                          <img src="images/2.jpg" alt="" />
                        </div>
                        <div class="name">
                          <h5>Guss29322</h5>
                          <p>Passenger</p>
                        </div>
                      </div>
                      <div class="review">
                        <p>
                          I had an amazing time on my Mediterranean cruise with this company! The ship was beautiful and the staff was so friendly and helpful. The ports of call were all wonderful and I loved being able to explore different countries and cultures. I would definitely recommend this cruise to anyone looking for an amazing and memorable experience.

                        </p>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="item">
                <div class="swiper-wrapper">

                  <div class="swiper-slide">
                    <div class="client_card">
                      <div class="client_info">
                        <div class="image_section">
                          <img src="images/3.jpg" alt="" />
                        </div>
                        <div class="name">
                          <h5>Justinova</h5>
                          <p>Passenger</p>
                        </div>
                      </div>
                      <div class="review">
                        <p>
                          I had an amazing time on my Asian cruise! The ship was beautiful and the staff was so friendly and helpful. I loved being able to explore all the different ports and learn about the different cultures. The food was amazing and I loved being able to try so many different dishes. I would definitely recommend this cruise to anyone looking for an amazing and unforgettable experience.

                        </p>
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide">
                    <div class="client_card">
                      <div class="client_info">
                        <div class="image_section">
                          <img src="images/5.jpg" alt="" />
                        </div>
                        <div class="name">
                          <h5>Eloise Bridgerton</h5>
                          <p>Passenger</p>
                        </div>
                      </div>
                      <div class="review">
                        <p>
                          I had an amazing time on my cruise in the Caribbean with this Voyage! The ship was beautiful and the staff was so friendly and accommodating. I loved all of the activities and entertainment options onboard and there was always something to do. I  loved being able to explore different islands and beaches each day. Overall, I had an incredible experience and would highly recommend this company to anyone looking for a great cruise in the Caribbean!

                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="swiper-wrapper">

                  <div class="swiper-slide">
                    <div class="client_card">
                      <div class="client_info">
                        <div class="image_section">
                          <img src="images/8.jpg" alt="" />
                        </div>
                        <div class="name">
                          <h5>Kate Sharma</h5>
                          <p>Passenger</p>
                        </div>
                      </div>
                      <div class="review">
                        <p>
                          The Queen Elizabeth event captures the glamour of yesteryear when steamer trunks, formal dining and ballroom galas were all the rage at sea. At the same time, it provides the expected conveniences of modern times like computer lounges and plenty of shopping opportunities.
                        </p>
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide">
                    <div class="client_card">
                      <div class="client_info">
                        <div class="image_section">
                          <img src="images/4.jpg" alt="" />
                        </div>
                        <div class="name">
                          <h5>Jane Doe</h5>
                          <p>Passenger</p>
                        </div>
                      </div>
                      <div class="review">
                        <p>
                          Celebrity Eclipse is, without a doubt, one of the most beautiful big ships we've ever sailed. Its interiors blend sophistication with a bit of whimsy -- akin to a trendy W Hotel but with softer edges.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


            </div>

          </div>
        </div>
      </div>
    </div>

  </section>

  <!-- end client section -->

  <!-- info section -->

  <section class="info_section ">
    <div class="info_container layout_padding-top">
      <div class="container">
        <div class="heading_container">
          <h2>
            Contact Us
          </h2>
        </div>
        <div class="info_logo">
          <img src="images/logo.png" alt="">
        </div>
        <div class="info_top">
          <div class="info_form">
            <form method="post">
              <input style="color: black;" type="email" name="email2" onkeyup="checksub(this.value)" placeholder="Enter Your Email" required>
              <button type="submit">
                Subscribe
              </button>
              <span id="s2" style="color: red;"></span>
            </form>
            <?php
            $sql7 = "INSERT INTO subscribers VALUES('$email2');";
            $conn -> query($use);
            $conn -> query($sql7);
            ?>
          </div>
          <div class="social_box">
            <a href="https://facebook.com">
              <img src="images/facebook.png" alt="">
            </a>
            <a href="https://twitter.com">
              <img src="images/twitter.png" alt="">
            </a>
            <a href="https://instagram.com">
              <img src="images/instagram.png" alt="">
            </a>
            <a href="https://youtube.com">
              <img src="images/youtube.png" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-9 col-md-10 mx-auto">
        <div class="info_contact layout_padding2">
          <div class="row">
            <div class="col-md-5">
              <a href="#" class="link-box">
                <div class="img-box">
                  <img src="images/call.png" alt="">
                </div>
                <div class="detail-box">
                  <h6 style="font-size: 1.6rem;">
                    Questions? Call +01 123467890
                  </h6>
                </div>
              </a>
            </div>
            <div class="col-md-5">
              <a href="#" class="link-box">
                <div class="img-box">
                  <img src="images/mail.png" alt="">
                </div>
                <div class="detail-box">
                  <h6 style="font-size: 1.6rem;">
                    support@voyage.com
                  </h6>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>
    </div>
  </section>
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script type="text/javascript" src="js/custom.js"></script>

  <script>
    $(document).ready(function () {
      // Activate Carousel
      $("#myCarousel").carousel();

      // Enable Carousel Indicators
      $(".item1").click(function () {
        $("#myCarousel").carousel(0);
      });
      $(".item2").click(function () {
        $("#myCarousel").carousel(1);
      });
      $(".item3").click(function () {
        $("#myCarousel").carousel(2);
      });

    });
  </script>
</body>

</html>