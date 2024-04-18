<?php
//  Connection to the database 
//  include('../db_connection.php');
  $conn = connectMyDB();
if (isset($_POST['updateVolunteer'])) {
    $id = $_GET['id'];
    $get_id = "SELECT case when isnull(max(id))then 1 else  (max(id))+1 end as id FROM introductiondetails;";
    $new_id = mysqli_query($conn, $get_id);
    $intro_id = '';
    if ($new_id) {
      $id = mysqli_fetch_assoc($new_id);
      // echo "my new id. ".$id['id'];
      $intro_id = $id['id'];
    } else {
      $intro_id = 1;
    }
    //for service Department Id
    $get_id_from = "SELECT case when isnull(max(id))then 1 else  (max(id))+1 end as id FROM servicedepartment;";
    $new_id_from = mysqli_query($conn, $get_id_from);
    $new_id_is = '';
    if ($new_id) {
      $id = mysqli_fetch_assoc($new_id_from);
      // echo "my new id. ".$id['id'];
      $new_id_is = $id['id'];
    } else {
      $new_id_is = 1;
    }
    
    // echo "Submit Clicked";
  $rUserID = $_POST['user_id'];
  $rRole = ($_POST['Role'] == null)? 'Member':$_POST['Role'];
  $path = "../image_upload/profilPicture/";
  $image = basename($_FILES["image_upload_file"]["name"]);
  //   echo "image aayo".$image;
  $rName = $_POST['name'];
  $rNameCapital = $_POST['nameCapital'];
  $rDOB = $_POST['dob'];
  $rEdate = $_POST['eDate'];
  $rAge = $_POST['age'];
  $Nationality = $_POST['nationality'];
  $Education = $_POST['Education'];
  $Profession = $_POST['profession'];
  $Gender = $_POST['gender'];
  $SpecialAbility = $_POST['specialAbility'];
  $MarriedStatus = $_POST['maritalStatus'];
  $MotherToungue = $_POST['motherToungue'];
  $CitizenshipNo = $_POST['citizenshipNo'];
  $IssuedDate = $_POST['issuedDate'];
  $issuedLocation = $_POST['issuedLocation'];
  // $intro_id = $_POST['id'];
  
  // current address part 2
  $r_c_Ward = $_POST['cwardNo'];
  $rProvince = $_POST['cprovince'];
  $r_c_District = $_POST['cdistrict'];
  $rMunicipality = $_POST['cmunicipality'];
  $rTelephone = $_POST['ctelephoneNo'];
  $rMobile = $_POST['cmobileNo'];
  $rEmail = $_POST['cemail'];

  //  permanent address part 3
  $r_Ward = $_POST['pWardNo'];
  $r_Province = $_POST['pprovince'];
  $r_District = $_POST['district'];
  $r_Municipality = $_POST['municipality'];
  $r_Telephone = $_POST['pTelephoneNo'];
  $r_Mobile = $_POST['pMobileNo'];
  $r_Email = $_POST['pEmail'];

  //  agps details part 4
  $rison = $_POST['rison'];
  $rDistrict = $_POST['agpsDistrict'];
  $rCenter = $_POST['agpscenter'];
  $rEducation = $_POST['d_QualificationYears'];
  $rSmartCardNo = $_POST['d_SmartCardNo'];

    //  alternative_contact part 5
  $alternative_rName = $_POST['alternative_name'];
  $alternative_rContactNo = $_POST['alternative_contactNo'];
  $alternative_rRelationship = $_POST['alternative_relationship'];
  
  //   language details part 5
  $rFirst_Language = $_POST['first_Language'];
  $rSecond_Language = $_POST['second_Language'];
  $rThird_Language = $_POST['third_Language'];
  $rForth_Language = $_POST['forth_Language'];

  //   Health details part 6
  $rBloodGroup = $_POST['blood_Group'];
  $rYesNo = $_POST['YesNo'];
  $rtextField = $_POST['text_Field'];

  //   service attached details part 7
$ServiceDepartmentinsQuery='';




function assign_if_exist($department, $name1, $name2)
{
    $d = $department;
    $id = $_GET['id'];
    global $new_id_is;
    static $individual_id = 0;

    if ($individual_id == 0) {
        $individual_id = $new_id_is;
    }

    if (isset($_POST[$name1]) || isset($_POST[$name2])) {
        $value1 = isset($_POST[$name1]) ? 1 : 0;
        $value2 = isset($_POST[$name2]) ? 1 : 0;

        $cons = connectMyDB();

        // Check if the department exists for the given intro_id
        $check = "SELECT department_name FROM servicedepartment WHERE intro_id = '$id';";
        $query = mysqli_query($cons, $check);
        $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $departmentExists = false;
        foreach ($rows as $result) {
            if ($result['department_name'] == $d) {
                $departmentExists = true;
                break;
            }
        }

        if ($departmentExists) {
            // Department exists, perform an update
            $sql = "UPDATE `servicedepartment` SET `experience`='$value1', `interest`='$value2' WHERE `intro_id`='$id' AND `department_name`='$d';";
        } else {
            // Department doesn't exist, get a new ID and perform an insert
            $get_id_from = "SELECT case when isnull(max(id))then 1 else  (max(id))+1 end as id FROM servicedepartment;";
            $new_id_from = mysqli_query($cons, $get_id_from);
            $new_id = mysqli_fetch_assoc($new_id_from)['id'];
            $new_id_is = $new_id + 1;

            $sql = "INSERT INTO `servicedepartment` (`id`, `intro_id`, `department_name`, `experience`, `interest`) VALUES ('$new_id', '$id', '$d', $value1, $value2);";
        }

        return $sql;
    } else {
        return '';
    }
}


$ServiceDepartmentinsQuery .= assign_if_exist('प्रचार','p_yes','p_yes_1');
$ServiceDepartmentinsQuery .= assign_if_exist('एम्. सि.','ac_yes','ac_yes_1');
$ServiceDepartmentinsQuery .= assign_if_exist('प्रकाशन','pra_yes','pra_yes_1');
$ServiceDepartmentinsQuery .= assign_if_exist('आइ. टि','it_yes','it_yes_1');
$ServiceDepartmentinsQuery .= assign_if_exist('मोवाइल टेन्ट','mo_yes','mo_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('प्रेमी स्वागत','pre_yes','pre_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('सरसफाइ','sir_yes','sir_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('भिडियोग्रफी','vi_yes','vi_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('विजुली','bi_yes','bi_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('सुरक्षा','su_yes','su_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('अस्रिङ','aa_yes','aa_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('फोटोग्राफर','pho_yes','pho_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('प्रशिक्षक','prashi_yes','prashi_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('मेडिकल','medi_yes','medi_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('रजिष्ट्रेशन','regis_yes','regis_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('भिडियाे एडिटर','video_yes','video_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('जन सम्पर्क','jan_yes','jan_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('खरिद बिक्री','kharid_yes','kharid_yes');
$ServiceDepartmentinsQuery .=assign_if_exist('कम्प्यटर अप्रेटर','computer_yes','computer_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('अडियाे एडिटर','audio_yes','audio_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('ट्रान्सलेसन','trans_yes','trans_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('कुक','cock_yes','cock_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('टाइपिस्ट','typist_yes','typist_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('अडियाे रेकर्डिष्ट','audioRec_yes','audioRec_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('सेवा विभाग (DoS)','sewa_yes','sewa_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('क्याट्रिन हेल्पर','kyatrin_yes','kyatrin_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('सांस्कृतिक','sans_yes','sans_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('कानुन','kanun_yes','kanun_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('प्राेडक्शन','pro_yes','pro_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('आवास','awas_yes','awas_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('स्मार्ट कार्ड','smart_yes','smart_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('निर्माण','nirman_yes','nirman_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('अफिस असिस्टेन्ट','office_yes','office_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('अडियाे/भिडियाे अपरेटर','audioVideo_yes','audioVideo_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('वर्कशप (फलाम/काठ)','workshop_yes','workshop_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('जनरल सेवा','jenral_yes','jenral_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('लेखा','writer_yes','writer_yes_1');
$ServiceDepartmentinsQuery .=assign_if_exist('इभेन्ट म्यानेजर (नियमित कार्यक्रम)','invent_menager','invent_menager_1');
$ServiceDepartmentinsQuery .=assign_if_exist('अन्य','other_yes','other_yes_1');
// echo "<hr><hr>Ham yeha hai.<hr>".$ServiceDepartmentinsQuery."<hr>";
function insert_serviceDepartment($long_sql){
    global $conn;
$sqls = explode(';',$long_sql);// echo "<hr>count array length :".count($sqls)."<br>".var_dump($sqls);
$executed_status = 0;
    foreach($sqls as $sql){
        // echo $sql.";<br>";
        if($sql!=''){
        if($conn->query($sql) == TRUE){
            $executed_status = 1;
        }else{
            echo "Problem is ".mysqli_error($conn);
            $executed_status = 0;
        }}
    }
    // echo "<hr>Execute status : ".$executed_status;
return $executed_status;
}
// print ();

  // service time details part 8
  $rLimitedTime = $_POST['limited_Time'];
  $rDuration = $_POST['duration'];
  $rCountry = $_POST['country'];
  $rInventSewa = $_POST['invent_Sewa'];
  $rEveryWeek = $_POST['every_Week'];
  $rOwnCountry1 = $_POST['own_Country1'];
  $rMoodDescription = $_POST['mood_Description'];


    $id = $_GET['id'];
    
    // introduction part 1 
    $intro_sql = "UPDATE `introductiondetails` SET `rUser_Id` = '$rUserID',`rRole` = '$rRole',`imagepath` = '$path',`image` = '$image',`rName`='$rName',`rNameCapital`='$rNameCapital',`rDOB`='$rDOB',`eDate`='$rEdate',`rNational`='$Nationality',`rEducation`=' $Education',`rProfession`='$Profession',`rGender`='$Gender',`rSpecialAbility`='$SpecialAbility',`rMarital`='$MarriedStatus',`rMotherToungue`='$MotherToungue',`rCitizenshipNo`='$CitizenshipNo',`rIssuedDate`='$IssuedDate',`rIssuedLocation`='$issuedLocation' WHERE id='$id'";
    // echo "<hr><hr><hr>".$intro_sql."<hr><hr><hr>";

    //   current address part 2 
    $current_add_sql = "UPDATE `currentaddress` SET `rWard`=' $r_c_Ward',`rMunici`='$rMunicipality',`rProvince`='$rProvince',`rDistrict`=' $r_c_District',`rTelephoneNo`='$rTelephone',`rMobileNo`='$rMobile',`rEmail`='$rEmail' WHERE intro_id='$id'";
    // echo "<hr><hr><hr>".$current_add_sql."<hr><hr><hr>";

    //  permanent address part 3
    $Permanent_add_sql = "UPDATE `permanentaddress` SET `rWard`='$r_Ward ',`rMunici`='$r_Municipality',`rProvince`='$r_Province',`rDistrict`='$r_District',`rTelephoneNo`='$r_Telephone',`rMobileNo`='$r_Mobile',`rEmail`='$r_Email' WHERE intro_id = '$id'";
    // echo "<hr><hr><hr>".$Permanent_add_sql."<hr><hr><hr>";
     
    //   agps details part 4
    // $agps_details_sql = " INSERT INTO `agps`(`intro_id`, `rDistrict`, `rCenter`, `rQualificationYears`, `rSmartCardNo`) VALUES ('$intro_id','$rDistrict','$rCenter ','$rEducation',5);";
    $agps_details_sql = "UPDATE `agps` SET `reason`='$rison',`rDistrict`='$rDistrict',`rCenter`='$rCenter',`rQualificationYears`='$rEducation',`rSmartCardNo`='$rSmartCardNo' WHERE intro_id = '$id'";
    // echo "<hr><hr><hr>".$agps_details_sql."<hr><hr><hr>";

     //  alternative_contact
    $alternative_contact_sql = "UPDATE `alternative_contact` SET `alternative_rName`='$alternative_rName',`alternative_rContact_No`='$alternative_rContactNo',`alternative_rRelationship`='$alternative_rRelationship' WHERE intro_id = '$id'";
    //   echo "<hr><hr><hr>".$alternative_contact_sql."<hr><hr><hr>";       
           
    //   language details part 5
    $language_sql = "UPDATE `languagedetails` SET `rFirstLanguage`='$rFirst_Language',`rSecondLanguage`='$rSecond_Language',`rThirdLanguage`='$rThird_Language',`rForthLanguage`='$rForth_Language' WHERE intro_id ='$id'";
    //  echo "<hr><hr><hr>".$language_sql."<hr><hr><hr>";
     
    //    health details part 6
    $healthdetails_sql = "UPDATE `healthdetails` SET `rBloodGroup`='$rBloodGroup',`rChecked`=' $rYesNo',`rWrite`='$rtextField' WHERE intro_id ='$id'";
    // echo "<hr><hr><hr>".$healthdetails_sql."<hr><hr><hr>";
  
    //    service attached details part 7 
    // echo "<hr><hr>Ham yeha hai.<hr>".$ServiceDepartmentinsQuery."<hr>";
    //  service time details part 8
    $service_time_sql = "UPDATE `servicetimedetails` SET `rCertainTime`='$rLimitedTime',`rCertainDays`='$rDuration',`rWorld`='$rCountry',`rInvestmentTime`='$rInventSewa',`rInvestmentWeek`='$rEveryWeek',`rPlace`='$rOwnCountry1',`rDescription`='$rMoodDescription' WHERE intro_id = '$id'";
    // echo "<hr><hr><hr>".$service_time_sql."<hr><hr>";
   
    // echo $sql; 
    if ($conn->query($intro_sql) == TRUE) {
    
        // echo "<br>Executed 1 : ".$intro_sql;
      if ($conn->query($current_add_sql) == TRUE) {
 
        // echo "<br>Executed 2: ".$current_add_sql;
        if ($conn->query($Permanent_add_sql) == TRUE) {
        
        // echo "<br>Executed 3: ".$Permanent_add_sql;
          if ($conn->query($agps_details_sql) == TRUE) {
       
        // echo "<br>Executed 4: ".$agps_details_sql;
            if ($conn->query($alternative_contact_sql) == TRUE) {       
       
        // echo "<br>Executed 3: ".$alternative_contact_sql;
            if ($conn->query($language_sql) == TRUE) {
          
        // echo "<br>Executed 5: ".$language_sql;
              if ($conn->query($healthdetails_sql) == TRUE) {
             
        // echo "<br>Executed 6: ".$healthdetails_sql;
                if (insert_serviceDepartment($ServiceDepartmentinsQuery)) {
                 
        // echo "<br>Executed 7: ".$ServiceDepartmentinsQuery;
                  if ($conn->query($service_time_sql) == TRUE) {
                 
        // echo "<br>Executed 8: ".$service_time_sql;

         $regmsg = '<div class="alert alert-success" id="alertDiv" role="alert" style="font-size:20px;">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> Update operation has been executed successfully.!
</div>';
            //   echo "<script> window.location.href = 'https://omsnepal.com/assets/User_Dashboard/index.php';</script>";
                  } else {
                    echo mysqli_error($conn);
                    $regmsg = '<div class="alert alert-danger" id="alertDiv" role="alert" style="font-size:20px;">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Failure!</strong>Update operation has not been successfully!
</div>';
                  }
                }
                else{
                    echo mysqli_error($conn);
                }
              } else {
                $regmsg = '<div class="alert alert-danger" id="alertDiv" role="alert" style="font-size:20px;">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Failure!</strong>Update operation has not been successfully!
</div>';
              }
            }
           }
          }
        }
      }
    }
    else{
         $regmsg = '<div class="alert alert-danger" id="alertDiv" role="alert" style="font-size:20px;">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Failure!</strong>Not executed !
</div>';
    }
  }
  
  
  
//   This query only for member form 
//   This query only for member form 
    $conn = connectMyDB();
if (isset($_POST['updateMember'])) {
    $id = $_GET['id'];
    $get_id = "SELECT case when isnull(max(id))then 1 else  (max(id))+1 end as id FROM introductiondetails;";
    $new_id = mysqli_query($conn, $get_id);
    $intro_id = '';
    if ($new_id) {
      $id = mysqli_fetch_assoc($new_id);
      // echo "my new id. ".$id['id'];
      $intro_id = $id['id'];
    } else {
      $intro_id = 1;
    }
   
    // echo "Submit Clicked";
  $rUserID = $_POST['user_id'];
  $rRole = ($_POST['Role'] == null)? 'Member':$_POST['Role'];
  $path = "../image_upload/profilPicture/";
  $image = basename($_FILES["image_upload_file"]["name"]);
  //   echo "image aayo".$image;
  $rName = $_POST['name'];
  $rNameCapital = $_POST['nameCapital'];
  $rDOB = $_POST['dob'];
  $rEdate = $_POST['eDate'];
  $rAge = $_POST['age'];
  $Nationality = $_POST['nationality'];
  $Education = $_POST['Education'];
  $Profession = $_POST['profession'];
  $Gender = $_POST['gender'];
  $SpecialAbility = $_POST['specialAbility'];
  $MarriedStatus = $_POST['maritalStatus'];
  $MotherToungue = $_POST['motherToungue'];
  $CitizenshipNo = $_POST['citizenshipNo'];
  $IssuedDate = $_POST['issuedDate'];
  $issuedLocation = $_POST['issuedLocation'];
  // $intro_id = $_POST['id'];

  // current address part 2
  $r_c_Ward = $_POST['cwardNo'];
  $rProvince = $_POST['cprovince'];
  $r_c_District = $_POST['cdistrict'];
  $rMunicipality = $_POST['cmunicipality'];
  $rTelephone = $_POST['ctelephoneNo'];
  $rMobile = $_POST['cmobileNo'];
  $rEmail = $_POST['cemail'];

  //  permanent address part 3
  $r_Ward = $_POST['pWardNo'];
  $r_Province = $_POST['pprovince'];
  $r_District = $_POST['district'];
  $r_Municipality = $_POST['municipality'];
  $r_Telephone = $_POST['pTelephoneNo'];
  $r_Mobile = $_POST['pMobileNo'];
  $r_Email = $_POST['pEmail'];

  //  agps details part 4
  $rison = $_POST['rison'];
  $rDistrict = $_POST['agpsDistrict'];
  $rCenter = $_POST['agpscenter'];
  $rEducation = $_POST['d_QualificationYears'];
  $rSmartCardNo = $_POST['d_SmartCardNo'];

    //  alternative_contact part 5
  $alternative_rName = $_POST['alternative_name'];
  $alternative_rContactNo = $_POST['alternative_contactNo'];
  $alternative_rRelationship = $_POST['alternative_relationship'];
  
  //   language details part 5
  $rFirst_Language = $_POST['first_Language'];
  $rSecond_Language = $_POST['second_Language'];
  $rThird_Language = $_POST['third_Language'];
  $rForth_Language = $_POST['forth_Language'];

  //   Health details part 6
  $rBloodGroup = $_POST['blood_Group'];
  $rYesNo = $_POST['YesNo'];
  $rtextField = $_POST['text_Field'];


    $id = $_GET['id'];
    
    // introduction part 1 
    $intro_sql = "UPDATE `introductiondetails` SET `rUser_Id` = '$rUserID',`rRole` = '$rRole',`imagepath` = '$path',`image` = '$image',`rName`='$rName',`rNameCapital`='$rNameCapital',`rDOB`='$rDOB',`eDate`='$rEdate',`rNational`='$Nationality',`rEducation`=' $Education',`rProfession`='$Profession',`rGender`='$Gender',`rSpecialAbility`='$SpecialAbility',`rMarital`='$MarriedStatus',`rMotherToungue`='$MotherToungue',`rCitizenshipNo`='$CitizenshipNo',`rIssuedDate`='$IssuedDate',`rIssuedLocation`='$issuedLocation' WHERE id='$id'";
    // echo "<hr><hr><hr>".$intro_sql."<hr><hr><hr>";

    //   current address part 2 
    $current_add_sql = "UPDATE `currentaddress` SET `rWard`=' $r_c_Ward',`rMunici`='$rMunicipality',`rProvince`='$rProvince',`rDistrict`=' $r_c_District',`rTelephoneNo`='$rTelephone',`rMobileNo`='$rMobile',`rEmail`='$rEmail' WHERE intro_id='$id'";
    // echo "<hr><hr><hr>".$current_add_sql."<hr><hr><hr>";

    //  permanent address part 3
    $Permanent_add_sql = "UPDATE `permanentaddress` SET `rWard`='$r_Ward ',`rMunici`='$r_Municipality',`rProvince`='$r_Province',`rDistrict`='$r_District',`rTelephoneNo`='$r_Telephone',`rMobileNo`='$r_Mobile',`rEmail`='$r_Email' WHERE intro_id = '$id'";
    // echo "<hr><hr><hr>".$Permanent_add_sql."<hr><hr><hr>";
     
    //   agps details part 4
    // $agps_details_sql = " INSERT INTO `agps`(`intro_id`, `rDistrict`, `rCenter`, `rQualificationYears`, `rSmartCardNo`) VALUES ('$intro_id','$rDistrict','$rCenter ','$rEducation',5);";
    $agps_details_sql = "UPDATE `agps` SET `reason`='$rison',`rDistrict`='$rDistrict',`rCenter`='$rCenter',`rQualificationYears`='$rEducation',`rSmartCardNo`='$rSmartCardNo' WHERE intro_id = '$id'";
    // echo "<hr><hr><hr>".$agps_details_sql."<hr><hr><hr>";

     //  alternative_contact
    $alternative_contact_sql = "UPDATE `alternative_contact` SET `alternative_rName`='$alternative_rName',`alternative_rContact_No`='$alternative_rContactNo',`alternative_rRelationship`='$alternative_rRelationship' WHERE intro_id = '$id'";
    //   echo "<hr><hr><hr>".$alternative_contact_sql."<hr><hr><hr>";       
           
    //   language details part 5
    $language_sql = "UPDATE `languagedetails` SET `rFirstLanguage`='$rFirst_Language',`rSecondLanguage`='$rSecond_Language',`rThirdLanguage`='$rThird_Language',`rForthLanguage`='$rForth_Language' WHERE intro_id ='$id'";
    //  echo "<hr><hr><hr>".$language_sql."<hr><hr><hr>";
     
    //    health details part 6
    $healthdetails_sql = "UPDATE `healthdetails` SET `rBloodGroup`='$rBloodGroup',`rChecked`=' $rYesNo',`rWrite`='$rtextField' WHERE intro_id ='$id'";
    // echo "<hr><hr><hr>".$healthdetails_sql."<hr><hr><hr>";
  
    // echo $sql; 
    if ($conn->query($intro_sql) == TRUE) {
    
        // echo "<br>Executed 1 : ".$intro_sql;
      if ($conn->query($current_add_sql) == TRUE) {
 
        // echo "<br>Executed 2: ".$current_add_sql;
        if ($conn->query($Permanent_add_sql) == TRUE) {
        
        // echo "<br>Executed 3: ".$Permanent_add_sql;
          if ($conn->query($agps_details_sql) == TRUE) {
       
        // echo "<br>Executed 4: ".$agps_details_sql;
            if ($conn->query($alternative_contact_sql) == TRUE) {       
       
        // echo "<br>Executed 3: ".$alternative_contact_sql;
            if ($conn->query($language_sql) == TRUE) {
          
        // echo "<br>Executed 5: ".$language_sql;
              if ($conn->query($healthdetails_sql) == TRUE) {
             
        // echo "<br>Executed 6: ".$healthdetails_sql;
                // if (insert_serviceDepartment($ServiceDepartmentinsQuery)) {
                 
        // echo "<br>Executed 7: ".$ServiceDepartmentinsQuery;
                //   if ($conn->query($service_time_sql) == TRUE) {
                 
        // echo "<br>Executed 8: ".$service_time_sql;

        $regmsg = '<div class="alert alert-success" id="alertDiv" role="alert" style="font-size:20px;">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> Update operation has been executed successfully.!
</div>';
            //   echo "<script> window.location.href = 'https://dos.globaltech.com.np/index1.php';</script>";
                  } else {
                    echo mysqli_error($conn);
                    $regmsg = '<div class="alert alert-danger" id="alertDiv" role="alert" style="font-size:20px;">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Failure!</strong>Update operation has not been successfully!
</div>';
                  }
                }
                else{
                    echo mysqli_error($conn);
                }
              } else {
               $regmsg = '<div class="alert alert-danger" id="alertDiv" role="alert" style="font-size:20px;">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Failure!</strong>Update operation has not been successfully!
</div>';
              }
            }
           }
          }
        }
    //   }
    // }
    else{
        $regmsg = '<div class="alert alert-danger" id="alertDiv" role="alert" style="font-size:20px;">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Failure!</strong>Not executed!
</div>';
    }
  }
 ?>
 
