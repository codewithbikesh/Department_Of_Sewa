
<?php
include 'db_connection.php';
?>
<?php
$con = connectMyDB();
if(isset($_POST['reportBy'])){
    $_repBy=$_POST['reportBy'];
    $_param='';
    if(isset($_POST['param'])){
        $_param=$_POST['param'];
    }
    $_row='';
       switch($_repBy){
        case "district":
            $selectQuery="SELECT introductiondetails.id,introductiondetails.rRole,introductiondetails.imagepath,introductiondetails.image,introductiondetails.rName,introductiondetails.rNameCapital,introductiondetails.rDOB,introductiondetails.eDate,introductiondetails.rAge,introductiondetails.rGender,introductiondetails.rNational,introductiondetails.rEducation,introductiondetails.rProfession,introductiondetails.rMarital,introductiondetails.rMotherToungue,introductiondetails.rCitizenshipNo,permanentaddress.rDistrict as pd,currentaddress.rDistrict as cd,currentaddress.rTelephoneNo,currentaddress.rMobileNo,currentaddress.rEmail FROM((introductiondetails INNER JOIN permanentaddress ON introductiondetails.id=permanentaddress.intro_id) INNER JOIN currentaddress on introductiondetails.id=currentaddress.intro_id) where  permanentaddress.rDistrict='".$_param."' AND introductiondetails.rRole='Volunteer'";
            $queryPass=mysqli_query($con,$selectQuery);
            // $i=1;
            while( $result = mysqli_fetch_assoc($queryPass)){
             $_row=$_row.'<tr><td><a href="report.php?ids='.$result['id'].'"><i class="fa-solid fa-eye"></i></a> <a href="updatepages/updatepage.php?id=' .$result['id'].'"><i class="fa-solid fa-edit" style="color:black; font-size:20px;"></i></a></td>';
             $_row=$_row.'<td><img src="' . $result['imagepath'] . $result['image'] . '" onerror="this.src=\'user_icon.png\'" class="card images-img-top image" id="backup_picture" alt="" style="height:2rem; width:3rem;"></td>';
             $_row=$_row.'<td>'.$result['rRole'].'</td>';
             $_row=$_row.'<td>'.$result['rName'].'</td>';
             $_row=$_row.'<td>'.$result['rNameCapital'].'</td>';
             $_row=$_row.'<td>'.$result['rDOB'].'</td>';
             $_row=$_row.'<td>'.$result['eDate'].'</td>';
             $_row=$_row.'<td>'.$result['rAge'].'</td>';
             $_row=$_row.'<td>'.$result['rGender'].'</td>';
             $_row=$_row.'<td>'.$result['rNational'].'</td>';
             $_row=$_row.'<td>'.$result['rEducation'].'</td>';
             $_row=$_row.'<td>'.$result['rProfession'].'</td>';
             $_row=$_row.'<td>'.$result['rMarital'].'</td>';
             $_row=$_row.'<td>'.$result['rMotherToungue'].'</td>';
             $_row=$_row.'<td>'.$result['rCitizenshipNo'].'</td>';
             $_row=$_row.'<td>'.$result['pd'].'</td>';
             $_row=$_row.'<td>'.$result['cd'].'</td>';
             $_row=$_row.'<td>'.$result['rTelephoneNo'].'</td>';
             $_row=$_row.'<td>'.$result['rMobileNo'].'</td>';
             $_row=$_row.'<td>'.$result['rEmail'].'</td></tr>';
            //  $_row=$_row.'<td><a href="report.php?ids='.$result['id'].'"><i class="fa-solid fa-eye"></i></a></td>';
            
             
            }
            if($_row==""){ 
             $response=array('message'=>'no record found', 'status_code'=>'404');
             echo json_encode($response);
         }else {
                $response=array('message'=>'record found', 'status_code'=>'200','data'=>$_row);
           echo json_encode($response);
            }
            break;
            case "Education":
                $selectQuery="SELECT introductiondetails.id,introductiondetails.rRole,introductiondetails.imagepath,introductiondetails.image,introductiondetails.rName,introductiondetails.rNameCapital,introductiondetails.rDOB,introductiondetails.eDate,introductiondetails.rAge,introductiondetails.rGender,introductiondetails.rNational,introductiondetails.rEducation,introductiondetails.rProfession,introductiondetails.rMarital,introductiondetails.rMotherToungue,introductiondetails.rCitizenshipNo,permanentaddress.rDistrict as pd,currentaddress.rDistrict as cd,currentaddress.rTelephoneNo,currentaddress.rMobileNo,currentaddress.rEmail FROM((introductiondetails INNER JOIN permanentaddress ON introductiondetails.id=permanentaddress.intro_id) INNER JOIN currentaddress on introductiondetails.id=currentaddress.intro_id) where  introductiondetails.rEducation='".$_param."' AND introductiondetails.rRole='Volunteer'";
                $queryPass=mysqli_query($con,$selectQuery);
                // $i=1;
                while( $result = mysqli_fetch_assoc($queryPass)){
                 $_row=$_row.'<tr><td><a href="report.php?ids='.$result['id'].'"><i class="fa-solid fa-eye"></i></a> <a href="updatepages/updatepage.php?id=' .$result['id'].'"><i class="fa-solid fa-edit" style="color:black; font-size:20px;"></i></a></td>';
                 $_row=$_row.'<td><img src="' . $result['imagepath'] . $result['image'] . '" onerror="this.src=\'user_icon.png\'" class="card images-img-top image" id="backup_picture" alt="" style="height:2rem; width:3rem;"></td>';
                 $_row=$_row.'<td>'.$result['rRole'].'</td>';
                 $_row=$_row.'<td>'.$result['rName'].'</td>';
                 $_row=$_row.'<td>'.$result['rNameCapital'].'</td>';
                 $_row=$_row.'<td>'.$result['rDOB'].'</td>';
                 $_row=$_row.'<td>'.$result['eDate'].'</td>';
                 $_row=$_row.'<td>'.$result['rAge'].'</td>';
                 $_row=$_row.'<td>'.$result['rGender'].'</td>';
                 $_row=$_row.'<td>'.$result['rNational'].'</td>';
                 $_row=$_row.'<td>'.$result['rEducation'].'</td>';
                 $_row=$_row.'<td>'.$result['rProfession'].'</td>';
                 $_row=$_row.'<td>'.$result['rMarital'].'</td>';
                 $_row=$_row.'<td>'.$result['rMotherToungue'].'</td>';
                 $_row=$_row.'<td>'.$result['rCitizenshipNo'].'</td>';
                 $_row=$_row.'<td>'.$result['pd'].'</td>';
                 $_row=$_row.'<td>'.$result['cd'].'</td>';
                 $_row=$_row.'<td>'.$result['rTelephoneNo'].'</td>';
                 $_row=$_row.'<td>'.$result['rMobileNo'].'</td>';
                 $_row=$_row.'<td>'.$result['rEmail'].'</td></tr>';
                
                }
                if($_row==""){ 
                 $response=array('message'=>'no record found', 'status_code'=>'404');
                 echo json_encode($response);
             }else {
                    $response=array('message'=>'record found', 'status_code'=>'200','data'=>$_row);
               echo json_encode($response);
                }
                break;
                case "Center":
                    $selectQuery="SELECT introductiondetails.id,introductiondetails.rRole,introductiondetails.imagepath,introductiondetails.image,introductiondetails.rName,introductiondetails.rNameCapital,introductiondetails.rDOB,introductiondetails.eDate,introductiondetails.rAge,introductiondetails.rGender,introductiondetails.rNational,introductiondetails.rEducation,introductiondetails.rProfession,introductiondetails.rMarital,introductiondetails.rMotherToungue,introductiondetails.rCitizenshipNo,permanentaddress.rDistrict as pd,currentaddress.rDistrict as cd,currentaddress.rTelephoneNo,currentaddress.rMobileNo,currentaddress.rEmail,agps.rCenter FROM(((introductiondetails INNER JOIN permanentaddress ON introductiondetails.id=permanentaddress.intro_id) INNER JOIN currentaddress on introductiondetails.id=currentaddress.intro_id) INNER JOIN agps on introductiondetails.id=agps.intro_id) where  agps.rCenter='".$_param."' AND introductiondetails.rRole='Volunteer'";
                    $queryPass=mysqli_query($con,$selectQuery);
                    // $i=1;
                    while( $result = mysqli_fetch_assoc($queryPass)){
                     $_row=$_row.'<tr><td><a href="report.php?ids='.$result['id'].'"><i class="fa-solid fa-eye"></i></a> <a href="updatepages/updatepage.php?id=' .$result['id'].'"><i class="fa-solid fa-edit" style="color:black; font-size:20px;"></i></a></td>';
                     $_row=$_row.'<td><img src="' . $result['imagepath'] . $result['image'] . '" onerror="this.src=\'user_icon.png\'" class="card images-img-top image" id="backup_picture" alt="" style="height:2rem; width:3rem;"></td>';
                     $_row=$_row.'<td>'.$result['rRole'].'</td>';
                     $_row=$_row.'<td>'.$result['rName'].'</td>';
                     $_row=$_row.'<td>'.$result['rNameCapital'].'</td>';
                     $_row=$_row.'<td>'.$result['rDOB'].'</td>';
                     $_row=$_row.'<td>'.$result['eDate'].'</td>';
                     $_row=$_row.'<td>'.$result['rAge'].'</td>';
                     $_row=$_row.'<td>'.$result['rGender'].'</td>';
                     $_row=$_row.'<td>'.$result['rNational'].'</td>';
                     $_row=$_row.'<td>'.$result['rEducation'].'</td>';
                     $_row=$_row.'<td>'.$result['rProfession'].'</td>';
                     $_row=$_row.'<td>'.$result['rMarital'].'</td>';
                     $_row=$_row.'<td>'.$result['rMotherToungue'].'</td>';
                     $_row=$_row.'<td>'.$result['rCitizenshipNo'].'</td>';
                     $_row=$_row.'<td>'.$result['pd'].'</td>';
                     $_row=$_row.'<td>'.$result['cd'].'</td>';
                     $_row=$_row.'<td>'.$result['rTelephoneNo'].'</td>';
                     $_row=$_row.'<td>'.$result['rMobileNo'].'</td>';
                     $_row=$_row.'<td>'.$result['rEmail'].'</td></tr>';
                     
                    }
                    if($_row==""){ 
                     $response=array('message'=>'no record found', 'status_code'=>'404');
                     echo json_encode($response);
                 }else {
                        $response=array('message'=>'record found', 'status_code'=>'200','data'=>$_row);
                   echo json_encode($response);
                    }
                break;
                case 'Volunteer':
                 $_row='';
                $selectQuery="SELECT introductiondetails.id,introductiondetails.rRole,introductiondetails.rRole,introductiondetails.imagepath,introductiondetails.image,introductiondetails.rName,introductiondetails.rNameCapital,introductiondetails.rDOB,introductiondetails.eDate,introductiondetails.rAge,introductiondetails.rGender,introductiondetails.rNational,introductiondetails.rEducation,introductiondetails.rProfession,introductiondetails.rMarital,introductiondetails.rMotherToungue,introductiondetails.rCitizenshipNo,permanentaddress.rDistrict as pd,currentaddress.rDistrict as cd,currentaddress.rTelephoneNo,currentaddress.rMobileNo,currentaddress.rEmail FROM((introductiondetails INNER JOIN permanentaddress ON introductiondetails.id=permanentaddress.intro_id) INNER JOIN currentaddress on introductiondetails.id=currentaddress.intro_id) where  introductiondetails.rRole='Volunteer' AND introductiondetails.rRole='Volunteer'";
                $queryPass=mysqli_query($con,$selectQuery);
                while( $result = mysqli_fetch_assoc($queryPass)){
                 $_row=$_row.'<tr><td><a href="report.php?ids='.$result['id'].'"><i class="fa-solid fa-eye"></i></a> <a href="updatepages/updatepage.php?id=' .$result['id'].'"><i class="fa-solid fa-edit" style="color:black; font-size:20px;"></i></a></td>';
                 $_row=$_row.'<td><img src="' . $result['imagepath'] . $result['image'] . '" onerror="this.src=\'user_icon.png\'" class="card images-img-top image" id="backup_picture" alt="" style="height:2rem; width:3rem;"></td>';
                 $_row=$_row.'<td>'.$result['rRole'].'</td>';
                 $_row=$_row.'<td>'.$result['rName'].'</td>';
                 $_row=$_row.'<td>'.$result['rNameCapital'].'</td>';
                 $_row=$_row.'<td>'.$result['rDOB'].'</td>';
                 $_row=$_row.'<td>'.$result['eDate'].'</td>';
                 $_row=$_row.'<td>'.$result['rAge'].'</td>';
                 $_row=$_row.'<td>'.$result['rGender'].'</td>';
                 $_row=$_row.'<td>'.$result['rNational'].'</td>';
                 $_row=$_row.'<td>'.$result['rEducation'].'</td>';
                 $_row=$_row.'<td>'.$result['rProfession'].'</td>';
                 $_row=$_row.'<td>'.$result['rMarital'].'</td>';
                 $_row=$_row.'<td>'.$result['rMotherToungue'].'</td>';
                 $_row=$_row.'<td>'.$result['rCitizenshipNo'].'</td>';
                 $_row=$_row.'<td>'.$result['pd'].'</td>';
                 $_row=$_row.'<td>'.$result['cd'].'</td>';
                 $_row=$_row.'<td>'.$result['rTelephoneNo'].'</td>';
                 $_row=$_row.'<td>'.$result['rMobileNo'].'</td>';
                 $_row=$_row.'<td>'.$result['rEmail'].'</td></tr>';
                }
                if($_row==""){ 
                    $response=array('message'=>'no record found', 'status_code'=>'404');
                    echo json_encode($response);
                }else {
                       $response=array('message'=>'record found', 'status_code'=>'200','data'=>$_row);
                  echo json_encode($response);
                   }
               break;
                
                case 'allRecords':
                 $_row='';
                $selectQuery="SELECT introductiondetails.id,introductiondetails.rRole,introductiondetails.imagepath,introductiondetails.image,introductiondetails.rName,introductiondetails.rNameCapital,introductiondetails.rDOB,introductiondetails.eDate,introductiondetails.rAge,introductiondetails.rGender,introductiondetails.rNational,introductiondetails.rEducation,introductiondetails.rProfession,introductiondetails.rMarital,introductiondetails.rMotherToungue,introductiondetails.rCitizenshipNo,permanentaddress.rDistrict as pd,currentaddress.rDistrict as cd,currentaddress.rTelephoneNo,currentaddress.rMobileNo,currentaddress.rEmail FROM((introductiondetails INNER JOIN permanentaddress ON introductiondetails.id=permanentaddress.intro_id)INNER JOIN currentaddress on introductiondetails.id=currentaddress.intro_id) Where introductiondetails.rRole='Volunteer'";
                $queryPass=mysqli_query($con,$selectQuery);
                while( $result = mysqli_fetch_assoc($queryPass)){
                 $_row=$_row.'<tr><td><a href="report.php?ids='.$result['id'].'"><i class="fa-solid fa-eye"></i></a> <a href="updatepages/updatepage.php?id=' .$result['id'].'"><i class="fa-solid fa-edit" style="color:black; font-size:20px;"></i></a></td>';
                 $_row=$_row.'<td><img src="' . $result['imagepath'] . $result['image'] . '" onerror="this.src=\'user_icon.png\'" class="card images-img-top image" id="backup_picture" alt="" style="height:2rem; width:3rem;"></td>';
                 $_row=$_row.'<td>'.$result['rRole'].'</td>';
                 $_row=$_row.'<td>'.$result['rName'].'</td>';
                 $_row=$_row.'<td>'.$result['rNameCapital'].'</td>';
                 $_row=$_row.'<td>'.$result['rDOB'].'</td>';
                 $_row=$_row.'<td>'.$result['eDate'].'</td>';
                 $_row=$_row.'<td>'.$result['rAge'].'</td>';
                 $_row=$_row.'<td>'.$result['rGender'].'</td>';
                 $_row=$_row.'<td>'.$result['rNational'].'</td>';
                 $_row=$_row.'<td>'.$result['rEducation'].'</td>';
                 $_row=$_row.'<td>'.$result['rProfession'].'</td>';
                 $_row=$_row.'<td>'.$result['rMarital'].'</td>';
                 $_row=$_row.'<td>'.$result['rMotherToungue'].'</td>';
                 $_row=$_row.'<td>'.$result['rCitizenshipNo'].'</td>';
                 $_row=$_row.'<td>'.$result['pd'].'</td>';
                 $_row=$_row.'<td>'.$result['cd'].'</td>';
                 $_row=$_row.'<td>'.$result['rTelephoneNo'].'</td>';
                 $_row=$_row.'<td>'.$result['rMobileNo'].'</td>';
                 $_row=$_row.'<td>'.$result['rEmail'].'</td></tr>';
                }
                if($_row==""){ 
                    $response=array('message'=>'no record found', 'status_code'=>'404');
                    echo json_encode($response);
                }else {
                       $response=array('message'=>'record found', 'status_code'=>'200','data'=>$_row);
                  echo json_encode($response);
                   }
               break;


               case 'ageGrp':
                $_row='';
               $selectQuery="SELECT introductiondetails.id,introductiondetails.rRole,introductiondetails.imagepath,introductiondetails.image,introductiondetails.rName,introductiondetails.rNameCapital,introductiondetails.rDOB,introductiondetails.eDate,introductiondetails.rAge,introductiondetails.rGender,introductiondetails.rNational,introductiondetails.rEducation,introductiondetails.rProfession,introductiondetails.rMarital,introductiondetails.rMotherToungue,introductiondetails.rCitizenshipNo,introductiondetails.rAge,permanentaddress.rDistrict as pd,currentaddress.rDistrict as cd,currentaddress.rTelephoneNo,currentaddress.rMobileNo,currentaddress.rEmail FROM((introductiondetails INNER JOIN permanentaddress ON introductiondetails.id=permanentaddress.intro_id)INNER JOIN currentaddress on introductiondetails.id=currentaddress.intro_id) where introductiondetails.rAge BETWEEN'".$_POST['from']."' AND '".$_POST['to']."' AND introductiondetails.rRole='Volunteer'";
               $queryPass=mysqli_query($con,$selectQuery);
               while( $result = mysqli_fetch_assoc($queryPass)){
                $_row=$_row.'<tr><td><a href="report.php?ids='.$result['id'].'"><i class="fa-solid fa-eye"></i></a> <a href="updatepages/updatepage.php?id=' .$result['id'].'"><i class="fa-solid fa-edit" style="color:black; font-size:20px;"></i></a></td>';
                $_row=$_row.'<td><img src="' . $result['imagepath'] . $result['image'] . '" onerror="this.src=\'user_icon.png\'" class="card images-img-top image" id="backup_picture" alt="" style="height:2rem; width:3rem;"></td>';
                $_row=$_row.'<td>'.$result['rRole'].'</td>';
                $_row=$_row.'<td>'.$result['rName'].'</td>';
                $_row=$_row.'<td>'.$result['rNameCapital'].'</td>';
                $_row=$_row.'<td>'.$result['rDOB'].'</td>';
                $_row=$_row.'<td>'.$result['eDate'].'</td>';
                $_row=$_row.'<td>'.$result['rAge'].'</td>';
                $_row=$_row.'<td>'.$result['rGender'].'</td>';
                $_row=$_row.'<td>'.$result['rNational'].'</td>';
                $_row=$_row.'<td>'.$result['rEducation'].'</td>';
                $_row=$_row.'<td>'.$result['rProfession'].'</td>';
                $_row=$_row.'<td>'.$result['rMarital'].'</td>';
                $_row=$_row.'<td>'.$result['rMotherToungue'].'</td>';
                $_row=$_row.'<td>'.$result['rCitizenshipNo'].'</td>';
                $_row=$_row.'<td>'.$result['pd'].'</td>';
                $_row=$_row.'<td>'.$result['cd'].'</td>';
                $_row=$_row.'<td>'.$result['rTelephoneNo'].'</td>';
                $_row=$_row.'<td>'.$result['rMobileNo'].'</td>';
                $_row=$_row.'<td>'.$result['rEmail'].'</td></tr>';
               }
               if($_row==""){ 
                   $response=array('message'=>'no record found', 'status_code'=>'404');
                   echo json_encode($response);
               }else {
                      $response=array('message'=>'record found', 'status_code'=>'200','data'=>$_row);
                 echo json_encode($response);
                  }
                  break;


                  case 'Experience':
                   $_row='';
                  $selectQuery="SELECT introductiondetails.id,introductiondetails.rRole,introductiondetails.imagepath,introductiondetails.image,introductiondetails.rName,introductiondetails.rNameCapital,introductiondetails.rDOB,introductiondetails.eDate,introductiondetails.rAge,introductiondetails.rGender,introductiondetails.rNational,introductiondetails.rEducation,introductiondetails.rProfession,introductiondetails.rMarital,introductiondetails.rMotherToungue,introductiondetails.rCitizenshipNo,introductiondetails.rAge,permanentaddress.rDistrict as pd,currentaddress.rDistrict as cd,currentaddress.rTelephoneNo,currentaddress.rMobileNo,currentaddress.rEmail,servicedepartment.department_name FROM(((introductiondetails INNER JOIN permanentaddress ON introductiondetails.id=permanentaddress.intro_id)INNER JOIN currentaddress on introductiondetails.id=currentaddress.intro_id) INNER JOIN servicedepartment on introductiondetails.id=servicedepartment.intro_id) where servicedepartment.department_name='".$_param."' AND introductiondetails.rRole='Volunteer'";
                  $queryPass=mysqli_query($con,$selectQuery);
                  while( $result = mysqli_fetch_assoc($queryPass)){
                   $_row=$_row.'<tr><td><a href="report.php?ids='.$result['id'].'"><i class="fa-solid fa-eye"></i></a> <a href="updatepages/updatepage.php?id=' .$result['id'].'"><i class="fa-solid fa-edit" style="color:black; font-size:20px;"></i></a></td>';
                   $_row=$_row.'<td><img src="' . $result['imagepath'] . $result['image'] . '" onerror="this.src=\'user_icon.png\'" class="card images-img-top image" id="backup_picture" alt="" style="height:2rem; width:3rem;"></td>';
                   $_row=$_row.'<td>'.$result['rRole'].'</td>';
                   $_row=$_row.'<td>'.$result['rName'].'</td>';
                   $_row=$_row.'<td>'.$result['rNameCapital'].'</td>';
                   $_row=$_row.'<td>'.$result['rDOB'].'</td>';
                   $_row=$_row.'<td>'.$result['eDate'].'</td>';
                   $_row=$_row.'<td>'.$result['rAge'].'</td>';
                   $_row=$_row.'<td>'.$result['rGender'].'</td>';
                   $_row=$_row.'<td>'.$result['rNational'].'</td>';
                   $_row=$_row.'<td>'.$result['rEducation'].'</td>';
                   $_row=$_row.'<td>'.$result['rProfession'].'</td>';
                   $_row=$_row.'<td>'.$result['rMarital'].'</td>';
                   $_row=$_row.'<td>'.$result['rMotherToungue'].'</td>';
                   $_row=$_row.'<td>'.$result['rCitizenshipNo'].'</td>';
                   $_row=$_row.'<td>'.$result['pd'].'</td>';
                   $_row=$_row.'<td>'.$result['cd'].'</td>';
                   $_row=$_row.'<td>'.$result['rTelephoneNo'].'</td>';
                   $_row=$_row.'<td>'.$result['rMobileNo'].'</td>';
                   $_row=$_row.'<td>'.$result['rEmail'].'</td></tr>';
                  }
                  if($_row==""){ 
                      $response=array('message'=>'no record found', 'status_code'=>'404');
                      echo json_encode($response);
                  }else {
                         $response=array('message'=>'record found', 'status_code'=>'200','data'=>$_row);
                    echo json_encode($response);
                     }
                     break;


                     case 'Interest':
                      $_row='';
                     $selectQuery="SELECT introductiondetails.id,introductiondetails.rRole,introductiondetails.imagepath,introductiondetails.image,introductiondetails.rName,introductiondetails.rNameCapital,introductiondetails.rDOB,introductiondetails.eDate,introductiondetails.rAge,introductiondetails.rGender,introductiondetails.rNational,introductiondetails.rEducation,introductiondetails.rProfession,introductiondetails.rMarital,introductiondetails.rMotherToungue,introductiondetails.rCitizenshipNo,introductiondetails.rAge,permanentaddress.rDistrict as pd,currentaddress.rDistrict as cd,currentaddress.rTelephoneNo,currentaddress.rMobileNo,currentaddress.rEmail,servicedepartment.department_name FROM(((introductiondetails INNER JOIN permanentaddress ON introductiondetails.id=permanentaddress.intro_id)INNER JOIN currentaddress on introductiondetails.id=currentaddress.intro_id) INNER JOIN servicedepartment on introductiondetails.id=servicedepartment.intro_id) where servicedepartment.department_name='".$_param."' AND introductiondetails.rRole='Volunteer'";
                     $queryPass=mysqli_query($con,$selectQuery);
                     while( $result = mysqli_fetch_assoc($queryPass)){
                      $_row=$_row.'<tr><td><a href="report.php?ids='.$result['id'].'"><i class="fa-solid fa-eye"></i></a> <a href="updatepages/updatepage.php?id=' .$result['id'].'"><i class="fa-solid fa-edit" style="color:black; font-size:20px;"></i></a></td>';
                      $_row=$_row.'<td><img src="' . $result['imagepath'] . $result['image'] . '" onerror="this.src=\'user_icon.png\'" class="card images-img-top image" id="backup_picture" alt="" style="height:2rem; width:3rem;"></td>';
                      $_row=$_row.'<td>'.$result['rRole'].'</td>';
                      $_row=$_row.'<td>'.$result['rName'].'</td>';
                      $_row=$_row.'<td>'.$result['rNameCapital'].'</td>';
                      $_row=$_row.'<td>'.$result['rDOB'].'</td>';
                      $_row=$_row.'<td>'.$result['eDate'].'</td>';
                      $_row=$_row.'<td>'.$result['rAge'].'</td>';
                      $_row=$_row.'<td>'.$result['rGender'].'</td>';
                      $_row=$_row.'<td>'.$result['rNational'].'</td>';
                      $_row=$_row.'<td>'.$result['rEducation'].'</td>';
                      $_row=$_row.'<td>'.$result['rProfession'].'</td>';
                      $_row=$_row.'<td>'.$result['rMarital'].'</td>';
                      $_row=$_row.'<td>'.$result['rMotherToungue'].'</td>';
                      $_row=$_row.'<td>'.$result['rCitizenshipNo'].'</td>';
                      $_row=$_row.'<td>'.$result['pd'].'</td>';
                      $_row=$_row.'<td>'.$result['cd'].'</td>';
                      $_row=$_row.'<td>'.$result['rTelephoneNo'].'</td>';
                      $_row=$_row.'<td>'.$result['rMobileNo'].'</td>';
                      $_row=$_row.'<td>'.$result['rEmail'].'</td></tr>';
                     }
                     if($_row==""){ 
                         $response=array('message'=>'no record found', 'status_code'=>'404');
                         echo json_encode($response);
                     }else {
                            $response=array('message'=>'record found', 'status_code'=>'200','data'=>$_row);
                       echo json_encode($response);
                        }
                        
                        break;

                              case "Gender":
                $selectQuery="SELECT introductiondetails.id,introductiondetails.rRole,introductiondetails.imagepath,introductiondetails.image,introductiondetails.rName,introductiondetails.rNameCapital,introductiondetails.rDOB,introductiondetails.eDate,introductiondetails.rAge,introductiondetails.rGender,introductiondetails.rNational,introductiondetails.rEducation,introductiondetails.rProfession,introductiondetails.rMarital,introductiondetails.rMotherToungue,introductiondetails.rCitizenshipNo,permanentaddress.rDistrict as pd,currentaddress.rDistrict as cd,currentaddress.rTelephoneNo,currentaddress.rMobileNo,currentaddress.rEmail FROM((introductiondetails INNER JOIN permanentaddress ON introductiondetails.id=permanentaddress.intro_id) INNER JOIN currentaddress on introductiondetails.id=currentaddress.intro_id) where  introductiondetails.rGender='".$_param."'";
                $queryPass=mysqli_query($con,$selectQuery);
                // $i=1;
                while( $result = mysqli_fetch_assoc($queryPass)){
                 $_row=$_row.'<tr><td><a href="report.php?ids='.$result['id'].'"><i class="fa-solid fa-eye"></i></a> <a href="updatepages/updatepage.php?id=' .$result['id'].'"><i class="fa-solid fa-edit" style="color:black; font-size:20px;"></i></a></td>';
                 $_row=$_row.'<td><img src="' . $result['imagepath'] . $result['image'] . '" onerror="this.src=\'user_icon.png\'" class="card images-img-top image" id="backup_picture" alt="" style="height:2rem; width:3rem;"></td>';
                 $_row=$_row.'<td>'.$result['rRole'].'</td>';
                 $_row=$_row.'<td>'.$result['rName'].'</td>';
                 $_row=$_row.'<td>'.$result['rNameCapital'].'</td>';
                 $_row=$_row.'<td>'.$result['rDOB'].'</td>';
                 $_row=$_row.'<td>'.$result['eDate'].'</td>';
                 $_row=$_row.'<td>'.$result['rAge'].'</td>';
                 $_row=$_row.'<td>'.$result['rGender'].'</td>';
                 $_row=$_row.'<td>'.$result['rNational'].'</td>';
                 $_row=$_row.'<td>'.$result['rEducation'].'</td>';
                 $_row=$_row.'<td>'.$result['rProfession'].'</td>';
                 $_row=$_row.'<td>'.$result['rMarital'].'</td>';
                 $_row=$_row.'<td>'.$result['rMotherToungue'].'</td>';
                 $_row=$_row.'<td>'.$result['rCitizenshipNo'].'</td>';
                 $_row=$_row.'<td>'.$result['pd'].'</td>';
                 $_row=$_row.'<td>'.$result['cd'].'</td>';
                 $_row=$_row.'<td>'.$result['rTelephoneNo'].'</td>';
                 $_row=$_row.'<td>'.$result['rMobileNo'].'</td>';
                 $_row=$_row.'<td>'.$result['rEmail'].'</td></tr>';
                }
                if($_row==""){ 
                 $response=array('message'=>'no record found', 'status_code'=>'404');
                 echo json_encode($response);
             }else {
                    $response=array('message'=>'record found', 'status_code'=>'200','data'=>$_row);
               echo json_encode($response);
                }
                break;
                case "region":
            $selectQuery="SELECT introductiondetails.id,introductiondetails.rRole,introductiondetails.imagepath,introductiondetails.image,introductiondetails.rName,introductiondetails.rNameCapital,introductiondetails.rDOB,introductiondetails.eDate,introductiondetails.rAge,introductiondetails.rGender,introductiondetails.rNational,introductiondetails.rEducation,introductiondetails.rProfession,introductiondetails.rMarital,introductiondetails.rMotherToungue,introductiondetails.rCitizenshipNo,permanentaddress.rDistrict as pd,currentaddress.rDistrict as cd,currentaddress.rTelephoneNo,currentaddress.rMobileNo,currentaddress.rEmail FROM(((introductiondetails INNER JOIN permanentaddress ON introductiondetails.id=permanentaddress.intro_id) INNER JOIN currentaddress on introductiondetails.id=currentaddress.intro_id)INNER JOIN agps on introductiondetails.id=agps.intro_id) where  agps.reason='".$_param."' AND introductiondetails.rRole='Volunteer'";
            $queryPass=mysqli_query($con,$selectQuery);
            // $i=1;
            while( $result = mysqli_fetch_assoc($queryPass)){ 
             $_row=$_row.'<tr><td><a href="report.php?ids='.$result['id'].'"><i class="fa-solid fa-eye"></i></a> <a href="updatepages/updatepage.php?id=' .$result['id'].'"><i class="fa-solid fa-edit" style="color:black; font-size:20px;"></i></a></td>';
             $_row=$_row.'<td><img src="' . $result['imagepath'] . $result['image'] . '" onerror="this.src=\'user_icon.png\'" class="card images-img-top image" id="backup_picture" alt="" style="height:2rem; width:3rem;"></td>';
             $_row=$_row.'<td>'.$result['rName'].'</td>';
             $_row=$_row.'<td>'.$result['rRole'].'</td>';
             $_row=$_row.'<td>'.$result['rNameCapital'].'</td>';
             $_row=$_row.'<td>'.$result['rDOB'].'</td>';
             $_row=$_row.'<td>'.$result['eDate'].'</td>';
             $_row=$_row.'<td>'.$result['rAge'].'</td>';
             $_row=$_row.'<td>'.$result['rGender'].'</td>';
             $_row=$_row.'<td>'.$result['rNational'].'</td>';
             $_row=$_row.'<td>'.$result['rEducation'].'</td>';
             $_row=$_row.'<td>'.$result['rProfession'].'</td>';
             $_row=$_row.'<td>'.$result['rMarital'].'</td>';
             $_row=$_row.'<td>'.$result['rMotherToungue'].'</td>';
             $_row=$_row.'<td>'.$result['rCitizenshipNo'].'</td>';
             $_row=$_row.'<td>'.$result['pd'].'</td>';
             $_row=$_row.'<td>'.$result['cd'].'</td>';
             $_row=$_row.'<td>'.$result['rTelephoneNo'].'</td>';
             $_row=$_row.'<td>'.$result['rMobileNo'].'</td>';
             $_row=$_row.'<td>'.$result['rEmail'].'</td></tr>';
            }
             break;
                case "occupation":
            $selectQuery="SELECT introductiondetails.id,introductiondetails.rRole,introductiondetails.imagepath,introductiondetails.image,introductiondetails.rName,introductiondetails.rNameCapital,introductiondetails.rDOB,introductiondetails.eDate,introductiondetails.rAge,introductiondetails.rGender,introductiondetails.rNational,introductiondetails.rEducation,introductiondetails.rProfession,introductiondetails.rMarital,introductiondetails.rMotherToungue,introductiondetails.rCitizenshipNo,permanentaddress.rDistrict as pd,currentaddress.rDistrict as cd,currentaddress.rTelephoneNo,currentaddress.rMobileNo,currentaddress.rEmail FROM((introductiondetails INNER JOIN permanentaddress ON introductiondetails.id=permanentaddress.intro_id) INNER JOIN currentaddress on introductiondetails.id=currentaddress.intro_id) where  introductiondetails.rEducation='".$_param."' AND introductiondetails.rRole='Volunteer'";
            $queryPass=mysqli_query($con,$selectQuery);
            // $i=1;
            while( $result = mysqli_fetch_assoc($queryPass)){ 
             $_row=$_row.'<tr><td><a href="report.php?ids='.$result['id'].'"><i class="fa-solid fa-eye"></i></a> <a href="updatepages/updatepage.php?id=' .$result['id'].'"><i class="fa-solid fa-edit" style="color:black; font-size:20px;"></i></a></td>';
             $_row=$_row.'<td><img src="' . $result['imagepath'] . $result['image'] . '" onerror="this.src=\'user_icon.png\'" class="card images-img-top image" id="backup_picture" alt="" style="height:2rem; width:3rem;"></td>';
             $_row=$_row.'<td>'.$result['rName'].'</td>';
             $_row=$_row.'<td>'.$result['rRole'].'</td>';
             $_row=$_row.'<td>'.$result['rNameCapital'].'</td>';
             $_row=$_row.'<td>'.$result['rDOB'].'</td>';
             $_row=$_row.'<td>'.$result['eDate'].'</td>';
             $_row=$_row.'<td>'.$result['rAge'].'</td>';
             $_row=$_row.'<td>'.$result['rGender'].'</td>';
             $_row=$_row.'<td>'.$result['rNational'].'</td>';
             $_row=$_row.'<td>'.$result['rEducation'].'</td>';
             $_row=$_row.'<td>'.$result['rProfession'].'</td>';
             $_row=$_row.'<td>'.$result['rMarital'].'</td>';
             $_row=$_row.'<td>'.$result['rMotherToungue'].'</td>';
             $_row=$_row.'<td>'.$result['rCitizenshipNo'].'</td>';
             $_row=$_row.'<td>'.$result['pd'].'</td>';
             $_row=$_row.'<td>'.$result['cd'].'</td>';
             $_row=$_row.'<td>'.$result['rTelephoneNo'].'</td>';
             $_row=$_row.'<td>'.$result['rMobileNo'].'</td>';
             $_row=$_row.'<td>'.$result['rEmail'].'</td></tr>';
            }
            if($_row==""){ 
             $response=array('message'=>'no record found', 'status_code'=>'404');
             echo json_encode($response);
         }else {
                $response=array('message'=>'record found', 'status_code'=>'200','data'=>$_row);
           echo json_encode($response);
            }
            break;
                     case 'Department':
                      $_row='';
                     $selectQuery="SELECT introductiondetails.id,introductiondetails.rRole,introductiondetails.imagepath,introductiondetails.image,introductiondetails.rName,introductiondetails.rNameCapital,introductiondetails.rDOB,introductiondetails.eDate,introductiondetails.rAge,introductiondetails.rGender,introductiondetails.rNational,introductiondetails.rEducation,introductiondetails.rProfession,introductiondetails.rMarital,introductiondetails.rMotherToungue,introductiondetails.rCitizenshipNo,introductiondetails.rAge,permanentaddress.rDistrict as pd,currentaddress.rDistrict as cd,currentaddress.rTelephoneNo,currentaddress.rMobileNo,currentaddress.rEmail,servicedepartment.department_name FROM(((introductiondetails INNER JOIN permanentaddress ON introductiondetails.id=permanentaddress.intro_id)INNER JOIN currentaddress on introductiondetails.id=currentaddress.intro_id) INNER JOIN servicedepartment on introductiondetails.id=servicedepartment.intro_id) where servicedepartment.department_name='".$_param."' AND introductiondetails.rRole='Volunteer'";
                     $queryPass=mysqli_query($con,$selectQuery);
                     while( $result = mysqli_fetch_assoc($queryPass)){
                      $_row=$_row.'<tr><td><a href="report.php?ids='.$result['id'].'"><i class="fa-solid fa-eye"></i></a> <a href="updatepages/updatepage.php?id=' .$result['id'].'"><i class="fa-solid fa-edit" style="color:black; font-size:20px;"></i></a></td>';
                      $_row=$_row.'<td><img src="' . $result['imagepath'] . $result['image'] . '" onerror="this.src=\'user_icon.png\'" class="card images-img-top image" id="backup_picture" alt="" style="height:2rem; width:3rem;"></td>';
                      $_row=$_row.'<td>'.$result['rRole'].'</td>';
                      $_row=$_row.'<td>'.$result['rName'].'</td>';
                      $_row=$_row.'<td>'.$result['rNameCapital'].'</td>';
                      $_row=$_row.'<td>'.$result['rDOB'].'</td>';
                      $_row=$_row.'<td>'.$result['eDate'].'</td>';
                      $_row=$_row.'<td>'.$result['rAge'].'</td>';
                      $_row=$_row.'<td>'.$result['rGender'].'</td>';
                      $_row=$_row.'<td>'.$result['rNational'].'</td>';
                      $_row=$_row.'<td>'.$result['rEducation'].'</td>';
                      $_row=$_row.'<td>'.$result['rProfession'].'</td>';
                      $_row=$_row.'<td>'.$result['rMarital'].'</td>';
                      $_row=$_row.'<td>'.$result['rMotherToungue'].'</td>';
                      $_row=$_row.'<td>'.$result['rCitizenshipNo'].'</td>';
                      $_row=$_row.'<td>'.$result['pd'].'</td>';
                      $_row=$_row.'<td>'.$result['cd'].'</td>';
                      $_row=$_row.'<td>'.$result['rTelephoneNo'].'</td>';
                      $_row=$_row.'<td>'.$result['rMobileNo'].'</td>';
                      $_row=$_row.'<td>'.$result['rEmail'].'</td></tr>';
                     }
                     if($_row==""){ 
                         $response=array('message'=>'no record found', 'status_code'=>'404');
                         echo json_encode($response);
                     }else {
                            $response=array('message'=>'record found', 'status_code'=>'200','data'=>$_row);
                       echo json_encode($response);
                        }

            }
      
    }

    
?>

