<?php 
date_default_timezone_set("asia/kathmandu");
session_start(); 
if (isset($_SESSION['admin_email'])) {
    //   echo $_SESSION['admin_email'];
}
 else if ($_SESSION['admin_email'] == '') {
     echo "no sesssion";
    echo"<script>window.location.href='https://dos.omsnepal.com/admin/';</script>";
 }

//session part
//session part
include "../assets/library/database.php";
$conn = connectMyDB();

//   $conn = connectMyDB();
  $sql = "SELECT `rProvince`,COUNT(`rProvince`)as countTotal FROM permanentaddress GROUP BY `rProvince`;";
  $req = mysqli_query($conn, $sql);
  $dataPoints='';
  if($req){
  $province_1 = 0;
  $madesh = 0;
  $bagmati = 0;
  $gandaki = 0;
  $lumbini = 0;
  $karnali = 0;
  $sudurpaschim = 0;
    while($data = mysqli_fetch_assoc($req)){
    // echo $data['rProvince'] . "has ".$data['countTotal'] ."<br>";
    switch($data['rProvince']){
      case 'Province 1':
        $province_1 = $data['countTotal'] ;
        break;
      case 'Madesh':
        $madesh = $data['countTotal'] ;
        break;
      case 'Bagmati':
        $bagmati = $data['countTotal'] ;
        break;
      case 'Gandaki':
        $gandaki = $data['countTotal'] ;
        break;
      case 'Lumbini':
        $lumbini = $data['countTotal'] ;
        break;
      case 'Karnali':
        $karnali = $data['countTotal'] ;
        break;
      case 'Sudurpaschim':
        $sudurpaschim = $data['countTotal'] ;
        break;
    }
    }
    $dataPoints = array(
      array("label" => "Province 1", "y" => $province_1),
      array("label" => "Madesh", "y" => $madesh),
      array("label" => "Bagmati", "y" => $bagmati),
      array("label" => "Gandaki", "y" => $gandaki),
      array("label" => "Lumbini", "y" => $lumbini),
      array("label" => "Karnali", "y" => $karnali),
      array("label" => "Sudurpaschim", "y" => $sudurpaschim)
    );
  }else{
    $dataPoints = array(
      array("label" => "Chrome", "y" => 64.02),
      array("label" => "Firefox", "y" => 12.55),
      array("label" => "IE", "y" => 8.47),
      array("label" => "Safari", "y" => 6.08),
      array("label" => "Edge", "y" => 4.29),
      array("label" => "Others", "y" => 4.59)
    );
  }

  // Show no of eductional field in pie chat
  $edu_sql = "SELECT `rEducation`,COUNT(`rEducation`)as countTotal FROM introductiondetails GROUP BY `rEducation`;";
  $edu_req = mysqli_query($conn, $edu_sql);
  $dataPoints1='';
  if($edu_req){
  $Literate = 0;
  $Below = 0;
  $SEE = 0;
  $twelveclear = 0;
  $Graduate = 0;
  $Postgraduate = 0;
  $Doctorate = 0; 
  $Other = 0; 
  while($data = mysqli_fetch_assoc($edu_req)){
    // echo $data['rProvince'] . "has ".$data['countTotal'] ."<br>";
    switch($data['rEducation']){
      case 'Literate साक्षर':
        $Literate = $data['countTotal'] ;
        break;
      case 'Below SEE साक्षरता':
        $Below = $data['countTotal'] ;
        break;
      case 'SEE एस.इ.इ.':
        $SEE = $data['countTotal'] ;
        break;
      case '10+2 or PCL प्लस टु वा प्रविणता प्रमाणपत्र तह':
        $twelveclear = $data['countTotal'] ;
        break;
      case 'Graduate स्नातक':
        $Graduate = $data['countTotal'] ;
        break;
      case 'Postgraduate स्नाकोत्तर':
        $Postgraduate = $data['countTotal'] ;
        break;
      case 'Doctorate पि.एज.डि.':
        $Doctorate = $data['countTotal'] ;
        break;
        case 'Other अन्य Specify.....':
          $Other = $data['countTotal'] ;
          break;
    }
    }
    $dataPoints1 = array(
      array("label" => "Literate साक्षर", "y" => $Literate),
      array("label" => "Below SEE साक्षरता", "y" => $Below),
      array("label" => "SEE एस.इ.इ.", "y" => $SEE),
      array("label" => "10+2 or PCL प्लस टु वा प्रविणता प्रमाणपत्र तह", "y" => $twelveclear),
      array("label" => "Graduate स्नातक", "y" => $Graduate),
      array("label" => "Postgraduate स्नाकोत्तर", "y" => $Postgraduate),
      array("label" => "Doctorate पि.एज.डि.", "y" => $Doctorate),
      array("label" => "Other अन्य Specify.....", "y" => $Other)
    );
  }else{
    $dataPoints1 = array(
      array("label" => "Chrome", "y" => 64.02),
      array("label" => "Firefox", "y" => 12.55),
      array("label" => "IE", "y" => 8.47),
      array("label" => "Safari", "y" => 6.08),
      array("label" => "Edge", "y" => 4.29),
      array("label" => "Others", "y" => 4.59)
    );
  }

  // No of Genders in pie chart 
  $gen_sql = "SELECT `rGender`,COUNT(`rGender`)as countTotal FROM introductiondetails GROUP BY `rGender`;";
  $gen_req = mysqli_query($conn, $gen_sql);
  $dataPoints2='';
  if($req){
  $male = 0;
  $female = 0;
  $other = 0;
    while($data = mysqli_fetch_assoc($gen_req)){
    // echo $data['rProvince'] . "has ".$data['countTotal'] ."<br>";
    switch($data['rGender']){
      case 'पुरुष':
        $male = $data['countTotal'] ;
        break;
      case 'महिला':
        $female = $data['countTotal'] ;
        break;
      case 'अन्य':
        $other = $data['countTotal'] ;
        break;
    }
    }
    $dataPoints2 = array(
      array("label" => "पुरुष ", "y" => $male),
      array("label" => "महिला", "y" => $female),
      array("label" => "अन्य", "y" => $other)
    );
  }else{
    $dataPoints2 = array(
      array("label" => "Chrome", "y" => 64.02),
      array("label" => "Firefox", "y" => 12.55),
      array("label" => "IE", "y" => 8.47),
      array("label" => "Safari", "y" => 6.08),
      array("label" => "Edge", "y" => 4.29),
      array("label" => "Others", "y" => 4.59)
    );
  }
  
// age
 $sql = "SELECT
    SUM(IF(`rAge` < 10,1,0)) as '0-10',
    SUM(IF(`rAge` BETWEEN 10 and 19,1,0)) as '10 - 19',
    SUM(IF(`rAge` BETWEEN 20 and 29,1,0)) as '20 - 29',
    SUM(IF(`rAge` BETWEEN 30 and 39,1,0)) as '30 - 39',
    SUM(IF(`rAge` BETWEEN 40 and 49,1,0)) as '40 - 49',
    SUM(IF(`rAge` BETWEEN 40 and 49,1,0)) as '50 - 59',
    SUM(IF(`rAge` BETWEEN 40 and 49,1,0)) as '60 - 69',
    SUM(IF(`rAge` BETWEEN 40 and 49,1,0)) as '70 - 79',
    SUM(IF(`rAge` BETWEEN 40 and 49,1,0)) as '80 - 89',
    SUM(IF(`rAge` BETWEEN 40 and 49,1,0)) as '90 - 100'
 	FROM introductiondetails;";
  $req = mysqli_query($conn, $sql);
  $dataPointsage='';
  if($req){
      $rAge =0;
      $values[]='';
    while($data = mysqli_fetch_assoc($req)){

        // $rAge = $data['Age'] ;
        $starter=0;$ender=10;
        $i=1;
        foreach($data as $value){
        $values[$i] = $value;
        $i++;
        }
        // echo "Total values : ".count($values);
    }
    $dataPointsage = array(
      array("label" => "0-10", "y" => $values['1']),
      array("label" => "10-20", "y" => $values['2']),
      array("label" => "20-30", "y" =>$values['3']),
      array("label" => "30-40", "y" => $values['4']),
      array("label" => "40-50", "y" => $values['5']),
      array("label" => "50-60", "y" => $values['6']),
      array("label" => "60-70", "y" => $values['7']),
      array("label" => "70-80", "y" => $values['8']),
      array("label" => "80-90", "y" => $values['9']),
      array("label" => "90-100", "y" => $values['10'])
    );
  }else{
    $dataPointsage = array(
      array("label" => "Chrome", "y" => 64.02),
      array("label" => "Firefox", "y" => 12.55),
      array("label" => "IE", "y" => 8.47),
      array("label" => "Safari", "y" => 6.08),
      array("label" => "Edge", "y" => 4.29),
      array("label" => "Others", "y" => 4.59)
    );
  }
//   another
//   another


 // No of department in pie chart 
  $gen_sql = "SELECT `rGender`,COUNT(`rGender`)as countTotal FROM introductiondetails GROUP BY `rGender`;";
  $gen_req = mysqli_query($conn, $gen_sql);
  $dataPoints2='';
  if($req){
  $male = 0;
  $female = 0;
  $other = 0;
    while($data = mysqli_fetch_assoc($gen_req)){
    // echo $data['rProvince'] . "has ".$data['countTotal'] ."<br>";
    switch($data['rGender']){
      case 'पुरुष':
        $male = $data['countTotal'] ;
        break;
      case 'महिला':
        $female = $data['countTotal'] ;
        break;
      case 'अन्य':
        $other = $data['countTotal'] ;
        break;
    }
    }
    $dataPoints2 = array(
      array("label" => "पुरुष ", "y" => $male),
      array("label" => "महिला", "y" => $female),
      array("label" => "अन्य", "y" => $other)
    );
  }else{
    $dataPoints2 = array(
      array("label" => "Chrome", "y" => 64.02),
      array("label" => "Firefox", "y" => 12.55),
      array("label" => "IE", "y" => 8.47),
      array("label" => "Safari", "y" => 6.08),
      array("label" => "Edge", "y" => 4.29),
      array("label" => "Others", "y" => 4.59)
    );
  }
// two bar wala data
// two bar wala data
$dataCol1 = bringData('experience');
$dataCol2= bringData('intrest');
function bringData($name){
    global $conn;
    switch($name){
        case 'experience':
            $sql = "SELECT DISTINCT `department_name`,COUNT(`experience`) as experience FROM servicedepartment WHERE `experience`=1 GROUP BY `department_name`;";
            $datas = get_my_Table_Data($sql);
            return build_array($datas,'department_name','experience');
            break;
        case 'intrest':
            $sql="SELECT DISTINCT `department_name`, COUNT( `interest`) as intrest FROM servicedepartment WHERE `interest`=1 GROUP BY `department_name`;";
            $datas = get_my_Table_Data($sql);
            return build_array($datas,'department_name','intrest');
            break;
    }
}
function build_array($datas,$colName_name,$colName_value){
    $count=count($datas);// echo "<br><hr>count:".$count;
    $my_values='';
    $my_datas=array();
    foreach($datas as $data){
        $data=array("label"=>$data[$colName_name], "y"=>intval($data[$colName_value]));
        array_push($my_datas,$data);
    }
    return $my_datas;
}
// two bar wala data
// two bar wala data

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>
    <!--<link rel="icon" href="assets/image/logo/favicon.ico">-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- datatable -->
    <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.4/css/select.dataTables.css" />
    <!-- datatable -->
    <!-- datatable -->

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="stylesheet" href="../assets/css/table_style.css">

    <!-- jquery script -->
    <!-- jquery script -->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.session@1.0.0/jquery.session.min.js"></script>
    <!-- jquery script -->
    <!-- jquery script -->

    <!-- bootstrap cdn -->
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- bootstrap cdn -->
    <!-- bootstrap cdn -->
    
      <!--font awesome icon cdn -->
      <!--font awesome icon cdn -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
   <!--font awesome icon cdn -->
   <!--font awesome icon cdn -->
   
   
    <!--jquery cdn-->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
   <!--jquery session-->
  <script src="https://cdn.jsdelivr.net/npm/jquery.session@1.0.0/jquery.session.min.js"></script>
  <!--jquery code line from here -->
   <!--jquery code line from here -->

 <script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "No of people according to province"
	},
	subtitles: [{
		text: "January 2023"
	}],
	data: [{
		type: "pie",
		yValueFormatString: "#,##0\"\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
 
 //no of people age in piechart
var chart2 = new CanvasJS.Chart("chartContainerNo2", {
	animationEnabled: true,
	title: {
		text: "No of people according to age group"
	},
	subtitles: [{
		text: "January 2023"
	}],
	data: [{
		type: "pie",
		yValueFormatString: "#,##0\"\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPointsage, JSON_NUMERIC_CHECK); ?>
	}]
});
chart2.render();


//department
var chart2 = new CanvasJS.Chart("chartContainerNo3", {
	animationEnabled: true,
	title: {
		text: "No of people according department"
	},
	subtitles: [{
		text: "January 2023"
	}],
	data: [{
		type: "pie",
		yValueFormatString: "#,##0\"\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPointsage, JSON_NUMERIC_CHECK); ?>
	}]
});
chart2.render();

// no of education in pie chart 
var chart = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	title: {
		text: "No of people according to Education"
	},
	subtitles: [{
		text: "January 2023"
	}],
	data: [{
		type: "bar",
		yValueFormatString: "#,##0\"\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

// no of gender in pie chart 
var chart = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	title: {
		text: "No of people according to Gender"
	},
	subtitles: [{
		text: "January 2023"
	}],
	data: [{
		type: "line",
		yValueFormatString: "#,##0\"\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

var chartTwoBar = new CanvasJS.Chart("chartContainerNo3", {
    	animationEnabled: true,
    	theme: "light2",
    	title:{
    		text: "Experience And Intrest on Various Department"
    	},
    	axisY:{
    		includeZero: true
    	},
    	legend:{
    		cursor: "pointer",
    		verticalAlign: "center",
    		horizontalAlign: "right",
    		itemclick: toggleDataSeries
    	},
    	data: [{
    		type: "column",
    		name: "अनुभव",
    		indexLabel: "{y}",
    		yValueFormatString: "###",
    		showInLegend: true,
    		dataPoints: <?php echo json_encode($dataCol1, JSON_NUMERIC_CHECK); ?>
    	},{
    		type: "column",
    		name: "इच्छा",
    		indexLabel: "{y}",
    		yValueFormatString: "###",
    		showInLegend: true,
    		dataPoints: <?php echo json_encode($dataCol2, JSON_NUMERIC_CHECK); ?>
    	}]
    });
    chartTwoBar.render();
    
    function toggleDataSeries(e){
    	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
    		e.dataSeries.visible = false;
    	}
    	else{
    		e.dataSeries.visible = true;
    	}
    	chartTwoBar.render();
    }
}

// window.onload = function (){

// }
</script>
</head>
 <script>
//   var re=$.session.get("user");
//   alert(re);
 </script>
 

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background:black;">

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
             <a class="nav-link">
                    <i class="bi bi-person-circle"></i>
                    <span  id='email_here' type="<?php  echo $_SESSION['admin_email'] ?>" title="<?php  echo $_SESSION['admin_email'] ?>"><?php if (isset($_SESSION['admin_email'])) {echo $_SESSION['admin_email'];} ?></span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="../index.php">
                 <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            
             <li class="nav-item">
                <a href="#submenu1" data-bs-toggle="collapse" class="nav-link align-middle text-white">
                  <i class="fa fa-file" aria-hidden="true"></i>
                  <span href="#submenu1" class="ms-1 d-none d-sm-inline text-white">Report</span>
                </a>
                <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                  <li class="w-100 text-white">
                    <a href="../member.php" class="nav-link text-white">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                      <span class="d-none d-sm-inline text-white">Member</span>
                    </a>
                  </li>
                   <li class="w-100 text-white">
                    <a href="../volunteer.php" class="nav-link text-white">
                        <i class="fa-solid fa-handshake"></i>
                      <span class="d-none d-sm-inline text-white">Volunteer</span>
                    </a>
                  </li>
                </ul>
              </li>
              
             <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>User Activities</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../eventDetails.php">
                    <i class="bi bi-list-ol"></i>
                    <span>Event Details</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../changePassword.php">
                   <i class="fa fa-key" aria-hidden="true"></i>
                    <span>Change Passwod</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
              <li class="nav-item">
                <a class="nav-link" href="https://dos.omsnepal.com/assets/Admin_Dashboard/index.php">
                   <i class="bi bi-shop"></i>
                    <span>Go to Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span></a>
            </li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle text-dark border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">