<?php
include 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://kit.fontawesome.com/9a86d78b3d.js" crossorigin="anonymous"></script>
  <title>Entry Report</title>
  <style>
    table {
      border-collapse: collapse;
      margin: 0 auto;
      /* Center the table horizontally */
    }

    th,
    td {
      border: 1px solid black;
      padding: 8px;
    }
  </style>
</head>

<body>
  <!--start navigation bar code line from -->
  <!--start navigation bar code line from -->
   <nav class="navbar navbar-expand-lg" style="background-color: #e1e1e1;">
  <div class="container-fluid">
    <a href="https://omsnepal.com/home/" style="width:55px; height:55px;"><img src="../dos_logo.png" width="55" height="55"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link text-dark fw-bold" aria-current="page" href="http://omsnepal.com/entry.php">Entry</a>
        <a class="nav-link text-dark fw-bold" href="https://omsnepal.com/eventreport/">Event</a>
        <a class="nav-link text-dark fw-bold" href="https://omsnepal.com/notice/">Notice</a>
        <a class="nav-link text-dark fw-bold" href="https://omsnepal.com/about/">About</a>
      </div>
       <div style="display:flex; justify-content:center;">
        <a href="../assets/User_Dashboard/" style="color:black; text-decoration:none; padding-right:10px;"><i class="fa-solid fa-user mt-2"></i>&nbsp; <?php if (isset($_SESSION['username'])) {echo $_SESSION['username'];} ?></a>
        <a href="logout.php" style="color:black; text-decoration:none;"><i class="fa-solid fa-right-from-bracket mt-2"></i>&nbsp; Logout</a>
      </div>
    </div>
         
  </div>
</nav>

  <!--end navigation bar code line from -->
  <!--end navigation bar code line from -->

  <!--this div given for the creating space on the bottom -->
  <!--this div given for the creating space on the bottom -->
  <div style="margin:10px;"></div>
  <!--<button onclick="myFunction()">Excel</button>-->

  <div class="container-fluid">
    <!-- <div class="row"  style="display: flex; width: 100%; justify-content: center; background-color:#dbdbdb; color: black; margin: 0px; paddind:0px; margin-bottom: 4px;">
        <div class="col-md-12"  style="display: flex; width: 100%; justify-content: center; background-color:#dbdbdb; color: black; margin: 0px; paddind:0px; margin-bottom: 4px;">
          <h4>परिचय विवरण</h4>
        </div>
      </div> -->
    <div class="row" style="margin-bottom:40px;">
      <div class="col-md-12">
        <div style="text-align: left;">
          <table style="width:100%;">
            <thead>
              <?php
              $con = connectMyDB();
              $ids = $_GET['ids'];
              $sql = "SELECT * FROM introductiondetails where id = $ids";
              $result = mysqli_query($con, $sql);

              $row = mysqli_fetch_assoc($result)

              ?>
              <tr>
                <th colspan="4" style="text-align: center; background-color:#dbdbdb;">परिचय विवरण</th>
              </tr>
              <tr>
                <!-- <th rowspan="11">TCB</th> -->
                <th>User-ID:</th>
                <td colspan="1"><?php echo $row['rUser_Id']; ?></td>
                <th rowspan="5">
                  <div style="display:flex; justify-content:center;">
                <!-- <strong>Photo</strong> -->
                  <img src="<?php $img1 = $row['imagepath'] . $row['image']; echo $img1; ?>" onerror="this.src='user_icon.png'" class="card images-img-top image" id="backup_picture" alt="" style="height:10rem; width:10rem;">
                </div>
                </th>
              </tr>
              <tr>
                <th>Role:</th>
                <td colspan="1" id="memberID"><?php echo $row['rRole']; ?></td>
              </tr>
              <tr>
                <th>नाम थर:</th>
                <td colspan="1"><?php echo $row['rName']; ?></td>
              </tr>
              <tr>
                <th>Name (In Block Letter):</th>
                <td colspan="1"><?php echo $row['rNameCapital']; ?></td>
              </tr>
              <tr>
                <th>जन्म मिति: बि.सं.</th>
                <td colspan="1"><?php echo $row['rDOB']; ?></td>
              </tr>
              <tr>
                <th>ई.सं.</th>
                <td colspan="2"><?php echo $row['eDate']; ?></td>
              </tr>
              <tr>
                <th>उमेर</th>
                <td colspan="2"><?php echo $row['rAge']; ?></td>
              </tr>
              <tr>
                <th>राष्ट्रियता</th>
                <td colspan="2"><?php echo $row['rNational']; ?></td>
              </tr>
              <tr>
                <th>शैक्षिक याेग्यता:</th>
                <td colspan="2"><?php echo $row['rEducation']; ?></td>
              </tr>
              <tr>
                <th>पेशा:</th>
                <td colspan="2"><?php echo $row['rProfession']; ?></td>
              </tr>
              <tr>
                <th>लिङ्ग:</th>
                <td colspan="2"><?php echo $row['rGender']; ?></td>
              </tr>
              <tr>
                <th>विशेष याेग्यता:</th>
                <td colspan="2"><?php echo $row['rSpecialAbility']; ?></td>
              </tr>
              <tr>
                <th>वैवाहिक अवस्था:</th>
                <td colspan="2"><?php echo $row['rMarital']; ?></td>
              </tr>
              <tr>
                <th>मातृ भाषा:</th>
                <td colspan="2"><?php echo $row['rMotherToungue']; ?></td>
              </tr>
              <tr>
                <th>नागरिकता नं:</th>
                <td colspan="2"><?php echo $row['rCitizenshipNo']; ?></td>
              </tr>
              <tr>
                <th>जारी गरेको मिति:</th>
                <td colspan="2"><?php echo $row['rIssuedDate']; ?></td>
              </tr>
              <tr>
                <th>जारी गरेको स्थान:</th>
                <td colspan="2"><?php echo $row['rIssuedLocation']; ?></td>
              </tr>
            </thead>
          </table>
        </div>
      </div>

      <!-- Start 2nd part table from here  -->
      <!-- Start 2nd part table from here  -->
      <div class="col-md-12">
        <div style="text-align: left;">
          <table style="width:100%;">
            <thead>
              <?php
              $con = connectMyDB();
              $ids = $_GET['ids'];
              $sql = "SELECT * FROM currentaddress where intro_id = $ids";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_assoc($result);
              ?>
              <tr>
                <th colspan="4" style="text-align: center; background-color:#dbdbdb;">हालको ठेगाना</th>
              <tr>
                <th style="width:40%;">प्रदेश:</th>
                <td colspan="2"><?php echo $row['rProvince']; ?></td>
              </tr>
              <tr>
                <th>जिल्ला:</th>
                <td colspan="2"><?php echo $row['rDistrict']; ?></td>
              </tr>
              <tr>
                <th>न.पा/गा.पा.</th>
                <td colspan="2"><?php echo $row['rMunici']; ?></td>
              </tr>
              <tr>
                <th>वाड नं.</th>
                <td colspan="2"><?php echo $row['rWard']; ?></td>
              </tr>
              <tr>
                <th>टेलिफोन नं.</th>
                <td colspan="2"><?php echo $row['rTelephoneNo']; ?></td>
              </tr>
              <tr>
                <th>माेबाईल नं.</th>
                <td colspan="2"><?php echo $row['rMobileNo']; ?></td>
              </tr>
              <tr>
                <th>इमेल</th>
                <td colspan="2"><?php echo $row['rEmail']; ?></td>
              </tr>
            </thead>
          </table>
        </div>
      </div>
      <!-- </div> -->
      <!-- End 2nd Part table form code line from here  -->
      <!-- End 2nd Part table form code line from here  -->



      <!-- Start 3th part table from here  -->
      <!-- Start 3th part table from here  -->
      <div class="col-md-12">
        <div style="text-align: left;">
          <table style="width:100%;">
            <thead>
              <?php
              $con = connectMyDB();
              $ids = $_GET['ids'];
              $sql = "SELECT * FROM permanentaddress where intro_id = $ids";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_assoc($result);
              ?>
              <tr>
                <th colspan="4" style="text-align: center; background-color:#dbdbdb;">स्थायी ठेगाना</th>
              <tr>
                <th style="width:40%;">प्रदेश:</th>
                <td colspan="2"><?php echo $row['rProvince']; ?></td>
              </tr>
              <tr>
                <th>जिल्ला:</th>
                <td colspan="2"><?php echo $row['rDistrict']; ?></td>
              </tr>
              <tr>
                <th>न.पा/गा.पा.</th>
                <td colspan="2"><?php echo $row['rMunici']; ?></td>
              </tr>
              <tr>
                <th>वाड नं.</th>
                <td colspan="2"><?php echo $row['rWard']; ?></td>
              </tr>
              <tr>
                <th>टेलिफोन नं.</th>
                <td colspan="2"><?php echo $row['rTelephoneNo']; ?></td>
              </tr>
              <tr>
                <th>माेबाईल नं.</th>
                <td colspan="2"><?php echo $row['rMobileNo']; ?></td>
              </tr>
              <tr>
                <th>इमेल</th>
                <td colspan="2"><?php echo $row['rEmail']; ?></td>
              </tr>
            </thead>
          </table>
        </div>
      </div>
      <!-- </div> -->
      <!-- End 3th Part table form code line from here  -->
      <!-- End 3th Part table form code line from here  -->

      <!-- Start 4th part table from here  -->
      <!-- Start 4th part table from here  -->
      <div class="col-md-12">
        <div style="text-align: left;">
          <table style="width:100%;">
            <thead>
              <?php
              $con = connectMyDB();
              $ids = $_GET['ids'];
              $sql = "SELECT * FROM agps where intro_id = $ids";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_assoc($result);
              ?>
              <tr>
                <th colspan="4" style="text-align: center; background-color:#dbdbdb;">AGPS सँगको विवरण</th>
              <tr>
                <th style="width:40%;">क्षेत्र:</th>
                <td colspan="2"><?php echo $row['reason']; ?></td>
              </tr>
              <tr>
                <th>जिल्ला:</th>
                <td colspan="2"><?php echo $row['rDistrict']; ?></td>
              </tr>
              <tr>
                <th>केन्द्र:</th>
                <td colspan="2"><?php echo $row['rCenter']; ?></td>
              </tr>
              <tr>
                <th>ज्ञान प्राप्त साल:</th>
                <td colspan="2"><?php echo $row['rQualificationYears']; ?></td>
              </tr>
              <tr>
                <th>स्मार्ट कार्ड नं.</th>
                <td colspan="2"><?php echo $row['rSmartCardNo']; ?></td>
              </tr>
            </thead>
          </table>
        </div>
      </div>
      <!-- </div> -->
      <!-- End 4th Part table form code line from here  -->
      <!-- End 4th Part table form code line from here  -->

      <!-- Start 5th part table from here  -->
      <!-- Start 5th part table from here  -->
      <div class="col-md-12">
        <div style="text-align: left;">
          <table style="width:100%;">
            <thead>
                <?php
        $con = connectMyDB();
        $ids=$_GET['ids'];
        $sql = "SELECT * FROM alternative_contact where intro_id = $ids";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
       ?>
              <tr>
                <th colspan="4" style="text-align: center; background-color:#dbdbdb;">वैकल्पिक सम्पर्क</th>
              <tr>
                <th style="width:40%;">नाम:</th>
                <td colspan="2"><?php echo $row['alternative_rName']; ?></td>
              </tr>
              <tr>
                <th>सम्पर्क नं.</th>
                <td colspan="2"><?php echo $row['alternative_rContact_No']; ?></td>
              </tr>
              <tr>
                <th>सम्बन्ध:</th>
                <td colspan="2"><?php echo $row['alternative_rRelationship']; ?></td>
              </tr>
            </thead>
          </table>
        </div>
      </div>
      <!-- </div> -->
      <!-- End 5th Part table form code line from here  -->
      <!-- End 5th Part table form code line from here  -->

      <!-- Start 6th part table from here  -->
      <!-- Start 6th part table from here  -->
      <div class="col-md-12">
        <div style="text-align: left;">
          <table style="width:100%;">
            <thead>
              <?php
              $con = connectMyDB();
              $ids = $_GET['ids'];
              $sql = "SELECT * FROM languagedetails where intro_id = $ids";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_assoc($result);
              ?>
              <tr>
                <th colspan="4" style="text-align: center; background-color:#dbdbdb;">भाषा विवरण</th>
              <tr>
                <th style="width:40%;">प्रथम भाषा:</th>
                <td colspan="2"><?php echo $row['rFirstLanguage']; ?></td>
              </tr>
              <tr>
                <th>दोस्रो भाषा:</th>
                <td colspan="2"><?php echo $row['rSecondLanguage']; ?></td>
              </tr>
              <tr>
                <th>तेस्रो भाषा:</th>
                <td colspan="2"><?php echo $row['rThirdLanguage']; ?></td>
              </tr>
              <tr>
                <th>चौथो भाषा:</th>
                <td colspan="2"><?php echo $row['rForthLanguage']; ?></td>
              </tr>
            </thead>
          </table>
        </div>
      </div>
      <!-- </div> -->
      <!-- End 6th Part table form code line from here  -->
      <!-- End 6th Part table form code line from here  -->

      <!-- Start 7th part table from here  -->
      <!-- Start 7th part table from here  -->
      <div class="col-md-12">
        <div style="text-align: left;">
          <table style="width:100%;">
            <thead>
              <?php
              $con = connectMyDB();
              $ids = $_GET['ids'];
              $sql = "SELECT * FROM healthdetails where intro_id = $ids";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_assoc($result);
              ?>
              <tr>
                <th colspan="4" style="text-align: center; background-color:#dbdbdb;">स्वास्थ्य विवरण</th>
              <tr>
                <th style="width:40%;">रक्त समुह:</th>
                <td colspan="2"><?php echo $row['rBloodGroup']; ?></td>
              </tr>
              <tr>
                <th>तपाईलाई स्वास्थ्य सम्बन्धी केही समस्या छ ?:</th>
                <td colspan="2"><?php echo $row['rChecked']; ?></td>
              </tr>
              <tr>
                <th>यदी भए उल्लेख गर्नुहोस:</th>
                <td colspan="2"><?php echo $row['rWrite']; ?></td>
              </tr>
            </thead>
          </table>
        </div>
      </div>
      <!-- </div> -->
      <!-- End 7th Part table form code line from here  -->
      <!-- End 7th Part table form code line from here  -->

      <!-- Start 8th part table from here  -->
      <!-- Start 8th part table from here  -->
      <div class="col-md-12" id="service_attached">
        <div style="text-align: left;">
          <table style="width:100%;">
            <thead>
              <?php
              $conn = connectMyDB();
              $ids = $_GET['ids'];
              $sql = "SELECT department_name,experience,interest FROM servicedepartment  where intro_id='$ids'";
              $result = mysqli_query($conn, $sql);
              $experiences = '';
              $intrest = '';
              while ($data = mysqli_fetch_assoc($result)) {
                if ($data['experience'] == '1') {
                  $experiences .= $data['department_name'] . "<br>";
                }
                if ($data['interest'] == '1') {
                  $intrest .= $data['department_name'] . "<br>";
                }
              }
              ?>
              <tr>
                <th colspan="4" style="text-align: center; background-color:#dbdbdb;">सेवामा संलग्न विवरण</th>
              <tr>
                <th style="width:40%;">अ.</th>
                <td colspan="2"><?php
                                if ($experiences != '') {
                                  echo $experiences;
                                } else {
                                  echo "Nothing";
                                }
                                ?></td>
              </tr>
              <tr>
                <th>ई.</th>
                <td colspan="2"> <?php
                                  if ($intrest != '') {
                                    echo $intrest;
                                  } else {
                                    echo "Nothing";
                                  }
                                  ?></td>
              </tr>
            </thead>
          </table>
        </div>
      </div>
      <!-- </div> -->
      <!-- End 8th Part table form code line from here  -->
      <!-- End 8th Part table form code line from here  -->

      <!-- Start 9th part table from here  -->
      <!-- Start 9th part table from here  -->
      <div class="col-md-12" id="service_time">
        <div style="text-align: left;">
          <table style="width:100%;">
            <thead>
              <?php
              $con = connectMyDB();
              $ids = $_GET['ids'];
              $sql = "SELECT * FROM servicetimedetails where intro_id = $ids";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_assoc($result);
              ?>
              <tr>
                <th colspan="4" style="text-align: center; background-color:#dbdbdb;">सेवा समय अवधी विवरण</th>
              <tr>
                <th style="width:40%;">नियमित सेवका लागि दिन सक्ने समय:</th>
                <td colspan="2"><?php echo $row['rCertainTime']; ?></td>
              </tr>
              <tr>
                <th> सक्ने समय प्रति हप्ता | अर्थ मासिक | महिना:</th>
                <td colspan="2"><?php echo $row['rCertainDays']; ?></td>
              </tr>
              <tr>
                <th>आफ्नो सहरमा मात्रै | आफ्नो क्षेत्रमा मात्रै | देशभरि जहाँसुकै | देश बाहिर:</th>
                <td colspan="2"><?php echo $row['rWorld']; ?></td>
              </tr>
              <tr>
                <th>इभेन्ट सेवका लागि दिन सक्ने समय:</th>
                <td colspan="2"><?php echo $row['rInvestmentTime']; ?></td>
              </tr>
              <tr>
                <th>प्रति हप्ता | अर्थ मासिक | महिना:</th>
                <td colspan="2"><?php echo $row['rInvestmentWeek']; ?></td>
              </tr>
              <tr>
                <th>आफ्नो सहरमा मात्रै | आफ्नो क्षेत्रमा मात्रै | देशभरि जहाँसुकै | देश बाहिर:</th>
                <td colspan="2"><?php echo $row['rPlace']; ?></td>
              </tr>
              <tr>
                <th>कैफियत:</th>
                <td colspan="2"><?php echo $row['rDescription']; ?></td>
              </tr>
            </thead>
          </table>
        </div>
      </div>
      <!-- </div> -->
      <!-- End 9th Part table form code line from here  -->
      <!-- End 9th Part table form code line from here  -->

    </div>
  </div>
  <!--start footer part here -->
  <!--start footer part here -->
  <script>
  $(document).ready(function(){
    let member = $("#memberID").text().trim(); // Use .text() to get the text content
    $("#service_time").show();
  $("#service_attached").show();
if (member == "Member") {
  $("#service_time").hide();
  $("#service_attached").hide();
} else {
  $("#service_time").show();
  $("#service_attached").show();
}
  });
</script>
  <?php
  include('include/footer_file.php');
  ?>