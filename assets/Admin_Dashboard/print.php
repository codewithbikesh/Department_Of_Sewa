<?php
include('library/db_conn.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Department Of Sewa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
      .table>:not(caption)>*>* {
    padding: .2rem .2rem;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
}
 th,td {
  font-size: 12px;
 }
 .fontStyle{
  font-family: monospace;
  font-size: 16px;
 }
 
    </style>
  </head>
  <body>
    <!-- first column start from here  -->
    <!-- first column start from here  -->
    <!-- <div class="container"><button onclick="window.print()">Print</button></div> -->
    <div class="container-fluid">
    <table class="table">
      <tr>
        <th colspan="12" class="fontStyle">परिचय विवरण</th>
      </tr>
      <?php
        $con = connectMyDB();
        $ids=$_GET['ids'];
        $sql = "SELECT * FROM introductiondetails where id = $ids";
        $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_assoc($result);
                ?>
      <tr>
        <th colspan="2"><span style="height:100px; text-align:center; justify-content:center; display:flex; align-items: center;">User-ID</span></th>
        <td colspan="2"><span style="height:100px; text-align:center; justify-content:center; display:flex; align-items: center;"><?php echo $row['rUser_Id']; ?></span></td>
        <th colspan="2"><span style="height:100px; text-align:center; justify-content:center; display:flex; align-items: center;">Role</span></th>
        <td colspan="2" id="memberID"><span style="height:100px; text-align:center; justify-content:center; display:flex; align-items: center;"><?php echo $row['rRole']; ?></span></td>
        <th colspan="2"><span style="height:100px; text-align:center; justify-content:center; display:flex; align-items: center;"><img src="<?php $img1 = $row['imagepath'] . $row['image']; echo $img1; ?>" onerror="this.src='user_icon.png'" class="card images-img-top image" id="backup_picture" alt="" style="height:6rem; width:6rem;"></span></th>
        <td colspan="2"><span style="height:100px; text-align:center; justify-content:center; display:flex; align-items: center;"></span></td>
      </tr>
    <tr>
      <th colspan="3">नाम:</th>
      <td colspan="3"><?php echo $row['rName']; ?></td>
      <th colspan="3">Name:</th>
      <td colspan="3"><?php echo $row['rNameCapital']; ?></td>
    </tr>
    <tr>
      <th>जन्म मिति: बि.सं.</th>
      <td colspan="2"><?php echo $row['rDOB']; ?></td>
      <th>ई.सं.</th>
      <td colspan="2"><?php echo $row['eDate']; ?></td>
      <th>उमेर:</th>
      <td colspan="2"><?php echo $row['rAge']; ?></td>
      <th>राष्ट्रियता:</th>
      <td colspan="2"><?php echo $row['rNational']; ?></td>
    </tr>
    <tr>
      <th>शैक्षिक याेग्यता:</th>
      <td colspan="3"><?php echo $row['rEducation']; ?></td>
      <th>पेशा:</th>
      <td colspan="3"><?php echo $row['rProfession']; ?></td>
      <th>लिङ्ग:</th>
      <td colspan="3"><?php echo $row['rGender']; ?></td>
    </tr>
    <tr>
      
    <th>विशेष याेग्यता:</th>
      <td colspan="2"><?php echo $row['rSpecialAbility']; ?></td>
      <th>वैवाहिक अवस्था:</th>
      <td colspan="2"><?php echo $row['rMarital']; ?></td>
      <th>मातृ भाषा:</th>
      <td colspan="2"><?php echo $row['rMotherToungue']; ?></td>
      <th>नागरिकता नं:</th>
      <td colspan="2"><?php echo $row['rCitizenshipNo']; ?></td>
    </tr>
    <tr>
    <th>जारी गरेको मिति:</th>
      <td colspan="2"><?php echo $row['rIssuedDate']; ?></td>
      <th>जारी गरेको स्थान:</th>
      <td colspan="8"><?php echo $row['rIssuedLocation']; ?></td>
    </tr>
</table>
 <!-- 2nd page code line from here  -->
 <!-- 2nd page code line from here  -->
 <table class="table">
      <tr>
        <th colspan="12" class="fontStyle">स्थायी ठेगाना</th>
      </tr>
      <?php
              $con = connectMyDB();
              $ids = $_GET['ids'];
              $sql = "SELECT * FROM permanentaddress where intro_id = $ids";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_assoc($result);
              ?>
      <tr>
      <th>प्रदेश:</th>
      <td colspan="2"><?php echo $row['rProvince']; ?></td>
      <th>जिल्ला:</th>
      <td colspan="2"><?php echo $row['rDistrict']; ?></td>
      <th>न.पा/गा.पा. :</th>
      <td colspan="2"><?php echo $row['rMunici']; ?></td>
      <th>वाड नं. :</th>
      <td colspan="2"><?php echo $row['rWard']; ?></td>
    </tr>

      <tr>
      <th>टेलिफोन नं. :</th>
      <td colspan="3"><?php echo $row['rTelephoneNo']; ?></td>
      <th>माेबाईल नं. :</th>
      <td colspan="3"><?php echo $row['rMobileNo']; ?></td>
      <th>इमेल:</th>
      <td colspan="3"><?php echo $row['rEmail']; ?></td>
    </tr>

</table>

<!-- 3rd page code line from here  -->
<!-- 3rd page code line from here  -->
<table class="table">
      <tr>
        <th colspan="12" class="fontStyle">हालको ठेगाना</th>
      </tr>
      <?php
              $con = connectMyDB();
              $ids = $_GET['ids'];
              $sql = "SELECT * FROM currentaddress where intro_id = $ids";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_assoc($result);
              ?>
      <tr>
      <th>प्रदेश:</th>
      <td colspan="2"><?php echo $row['rProvince']; ?></td>
      <th>जिल्ला:</th>
      <td colspan="2"><?php echo $row['rDistrict']; ?></td>
      <th>न.पा/गा.पा. :</th>
      <td colspan="2"><?php echo $row['rMunici']; ?></td>
      <th>वाड नं. :</th>
      <td colspan="2"><?php echo $row['rWard']; ?></td>
    </tr>

      <tr>
      <th>टेलिफोन नं. :</th>
      <td colspan="3"><?php echo $row['rTelephoneNo']; ?></td>
      <th>माेबाईल नं. :</th>
      <td colspan="3"><?php echo $row['rMobileNo']; ?></td>
      <th>इमेल:</th>
      <td colspan="3"><?php echo $row['rEmail']; ?></td>
    </tr>

</table>

<!-- 4th page code line from here  -->
<!-- 4th page code line from here  -->
<table class="table">
      <tr>
        <th colspan="12" class="fontStyle">AGPS सँगको विवरण</th>
      </tr>
      <?php
              $con = connectMyDB();
              $ids = $_GET['ids'];
              $sql = "SELECT * FROM agps where intro_id = $ids";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_assoc($result);
              ?>
      <tr>
      <th>क्षेत्र :</th>
      <td colspan="2"><?php echo $row['reason']; ?></td>
      <th>जिल्ला:</th>
      <td colspan="2"><?php echo $row['rDistrict']; ?></td>
      <th>केन्द्र:</th>
      <td colspan="2"><?php echo $row['rCenter']; ?></td>
      <th>ज्ञान प्राप्त साल:</th>
      <td colspan="2"><?php echo $row['rQualificationYears']; ?></td>
    </tr>

      <tr>
      <th>ज्ञान प्राप्त साल:</th>
      <td colspan="10"><?php echo $row['rSmartCardNo']; ?></td>
    </tr>

</table>

<!-- 4th page code line from here  -->
<!-- 4th page code line from here  -->
<table class="table">
      <tr>
        <th colspan="12" class="fontStyle">वैकल्पिक सम्पर्क</th>
      </tr>
      <?php
        $con = connectMyDB();
        $ids=$_GET['ids'];
        $sql = "SELECT * FROM alternative_contact where intro_id = $ids";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
       ?>
      <tr>
      <th>नाम :</th>
      <td colspan="3"><?php echo $row['alternative_rName']; ?></td>
      <th>सम्पर्क नं.:</th>
      <td colspan="2"><?php echo $row['alternative_rContact_No']; ?></td>
      <th>सम्बन्ध:</th>
      <td colspan="2"><?php echo $row['alternative_rRelationship']; ?></td>
    </tr>
</table>

<!-- 5th page code line from here  -->
<!-- 5th page code line from here  -->
<table class="table">
      <tr>
        <th colspan="12" class="fontStyle">भाषा विवरण</th>
      </tr>
      <?php
              $con = connectMyDB();
              $ids = $_GET['ids'];
              $sql = "SELECT * FROM languagedetails where intro_id = $ids";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_assoc($result);
              ?>
      <tr>
      <th>प्रथम भाषा :</th>
      <td colspan="2"><?php echo $row['rFirstLanguage']; ?></td>
      <th>दोस्रो भाषा :</th>
      <td colspan="2"><?php echo $row['rSecondLanguage']; ?></td>
      <th>दोस्रो भाषा :</th>
      <td colspan="2"><?php echo $row['rThirdLanguage']; ?></td>
      <th>दोस्रो भाषा :</th>
      <td colspan="2"><?php echo $row['rForthLanguage']; ?></td>
    </tr>
</table>

<!-- 6th page code line from here -->
<!-- 6th page code line from here -->
<table class="table">
      <tr>
        <th colspan="12" class="fontStyle">स्वास्थ्य विवरण</th>
      </tr>
      <?php
              $con = connectMyDB();
              $ids = $_GET['ids'];
              $sql = "SELECT * FROM healthdetails where intro_id = $ids";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_assoc($result);
              ?>
      <tr>
      <th>रक्त समुह:</th>
      <td colspan="2"><?php echo $row['rBloodGroup']; ?></td>
      <th>तपाईलाई स्वास्थ्य सम्बन्धी केही समस्या छ ?</th>
      <td colspan="2"><?php echo $row['rChecked']; ?></td>
      <th>यदी भए उल्लेख गर्नुहोस:</th>
      <td colspan="2"><?php echo $row['rWrite']; ?></td>
    </tr>
</table>

<!-- 7th page code line from here   -->
<!-- 7th page code line from here   -->
<table class="table" id="service_attached">
      <tr>
        <th colspan="12" class="fontStyle">सेवामा संलग्न विवरण</th>
      </tr>
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
      <th>अ.</th>
      <td colspan="2"><?php
                                if ($experiences != '') {
                                  echo $experiences;
                                } else {
                                  echo "Nothing";
                                }
                                ?></td>
      <th>ई.</th>
      <td colspan="2"><?php
                                  if ($intrest != '') {
                                    echo $intrest;
                                  } else {
                                    echo "Nothing";
                                  }
                                  ?></td>
    </tr>
</table>

<!-- 8th page code line from here  -->
<!-- 8th page code line from here  -->
<table class="table" id="service_time">
      <tr>
        <th colspan="12" class="fontStyle">सेवा समय अवधी विवरण</th>
      </tr>
      <?php
              $con = connectMyDB();
              $ids = $_GET['ids'];
              $sql = "SELECT * FROM servicetimedetails where intro_id = $ids";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_assoc($result);
              ?>
      <tr>
      <th>नियमित सेवाका लागि दिन सक्ने समय:</th>
      <td colspan="2"><?php echo $row['rCertainTime']; ?></td>
      <th>प्रति हप्ता | अर्थ मासिक | महिना:</th>
      <td colspan="2"><?php echo $row['rCertainDays']; ?></td>
    </tr>
    <tr>
    <th>आफ्नो सहरमा मात्रै | आफ्नो क्षेत्रमा मात्रै | देशभरि जहाँसुकै | देश बाहिर:</th>
      <td colspan="2"><?php echo $row['rWorld']; ?></td>
      <th>इभेन्ट सेवका लागि दिन सक्ने समय:</th>
      <td colspan="2"><?php echo $row['rInvestmentTime']; ?></td>
    </tr>
    <tr>
      <th>प्रति हप्ता | अर्थ मासिक | महिना:</th>
      <td colspan="2"><?php echo $row['rInvestmentWeek']; ?></td>
      <th>आफ्नो सहरमा मात्रै | आफ्नो क्षेत्रमा मात्रै | देशभरि जहाँसुकै | देश बाहिर:</th>
      <td colspan="2"><?php echo $row['rPlace']; ?></td>
    </tr>
    <tr>
      <th>कैफियत:</th>
      <td colspan="10"><?php echo $row['rDescription']; ?></td>
    </tr>
</table>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
  </body>
</html>