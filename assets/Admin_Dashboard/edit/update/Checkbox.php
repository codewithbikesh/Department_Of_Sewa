
                <!-- start second checkbox section from here  -->
                  <div class="row">
                  <?php
        $conn = connectMyDB();
        $id = $_GET['id'];
        // $sql = "SELECT * FROM introductiondetails i join servicedepartment s on s.intro_id = i.id where i.id = '$id'";
        $sql = "select d.department department_name, ifnull(s.experience,0)experience, ifnull(s.interest,0)interest, s.intro_id  from department d LEFT JOIN servicedepartment s on d.department = s.department_name AND s.intro_id ='$id'";
        $result = mysqli_query($conn, $sql);
         while ($row=mysqli_fetch_assoc($result)){
        ?>
                              <?php
                                  switch ($row['department_name']) {
                                  case"प्रचार":
                                 ?>
                        <div class="col-md-12 col-sm-12"> 
                          <div class="row" style="margin-top: 20px;"><!--padding: 10px-->
                            <div class="col-md-12">
                              <div class="col-md-2">
                                <label for="">प्रचार</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <label for="">अ.</label>
                                  <input type="checkbox" id="pracharExperience" class="serviceChecked" name="p_yes" value="प्रचार" <?php if ($row['department_name'] == 'प्रचार') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>
                                  ></span>
                                &nbsp;&nbsp;
                                <span>
                                  <label for="">ई.</label>
                                  <input type="checkbox" name="p_yes_1" class="serviceChecked" id="pracharInterest" value="प्रचार" <?php if ($row['department_name'] == 'प्रचार') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                              <?php
                                 break;
                                 case"एम्. सि.": 
                                     ?>
                              <div class="col-md-2">
                                <label for="">एम्. सि.</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <label for="">अ.</label>
                                  <input type="checkbox" name="ac_yes" class="serviceChecked" id="mcExperience" value="एम्. सि." <?php if ($row['department_name'] == 'एम्. सि.') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;
                                <span>
                                  <label for="">ई.</label>
                                  <input type="checkbox" name="ac_yes_1" class="serviceChecked" id="mcInterest" value="एम्. सि." <?php if ($row['department_name'] == 'एम्. सि.') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                                    <?php
                                    break;
                                    case"प्रकाशन": 
                                        ?>
                              <div class="col-md-2">
                                <label for="">प्रकाशन</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <label for="">अ.</label>
                                  <input type="checkbox" name="pra_yes" class="serviceChecked" id="prakashanExperience" value="प्रकाशन" <?php if ($row['department_name'] == 'प्रकाशन') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;
                                <span>
                                  <label for="">ई.</label>
                                  <input type="checkbox" name="pra_yes_1" class="serviceChecked" id="prakashanInterest" value="प्रकाशन"<?php if ($row['department_name'] == 'प्रकाशन') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                                <?php
                                  break;
                                  case"आइ. टि":
                                ?>
                              <div class="col-md-2">
                                <label for="">आइ. टि</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <label for="">अ.</label>
                                  <input type="checkbox" name="it_yes" class="serviceChecked" id="itExperience" value="आइ. टि" <?php if ($row['department_name'] == 'आइ. टि') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;
                                <span>
                                  <label for="">ई.</label>
                                  <input type="checkbox" name="it_yes_1" class="serviceChecked" id="itInterest" value="आइ. टि" <?php if ($row['department_name'] == 'आइ. टि') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                            </div>
                          </div>
                             <?php
                             break;
                             case"मोवाइल टेन्ट":
                             ?>
                          <!-- start second row from here  -->
                          <div class="row" style="margin-top: 5px;"><!--padding: 10px-->
                            <div class="col-md-12">
                              <div class="col-md-2">
                                <label for="">मोवाइल टेन्ट</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="mo_yes" class="serviceChecked" id="mobileTentExperience" value="मोवाइल टेन्ट" <?php if($row['experience'] == 1){echo "checked";} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="mo_yes_1" class="serviceChecked" id="mobileTentInterest" value="मोवाइल टेन्ट"  <?php if($row['department_name'] == 'मोवाइल टेन्ट') {
                                    if($row['interest'] != 0){
                                      echo "checked";
                                    }else{
                                      echo "";
                                    }
                                    } ?>>
                                </span>
                              </div>
                               <?php
                              break;
                              case"प्रेमी स्वागत":
                               ?>
                              <div class="col-md-2">
                                <label for="">प्रेमी स्वागत</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="pre_yes" class="serviceChecked" id="premiSwagatExperience" value="प्रेमी स्वागत" <?php if ($row['department_name'] == 'प्रेमी स्वागत') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="pre_yes_1" class="serviceChecked" id="premiSwagatInterest" value="प्रेमी स्वागत" <?php if ($row['department_name'] == 'प्रेमी स्वागत') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                            <?php
                             break;
                             case"सरसफाइ":
                            ?>
                              <div class="col-md-2">
                                <label for="">सरसफाइ</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="sir_yes" class="serviceChecked" id="sirsafaiExperience" value="सरसफाइ" <?php if ($row['department_name'] == 'सरसफाइ') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="sir_yes_1" class="serviceChecked" id="sirsafaiExperience" value="सरसफाइ" <?php if ($row['department_name'] == 'सरसफाइ') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                            <?php
                             break;
                             case"भिडियोग्रफी":
                            ?>
                              <div class="col-md-2">
                                <label for="">भिडियोग्रफी</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="vi_yes" class="serviceChecked" id="videographiExperience" value="भिडियोग्रफी" <?php if ($row['department_name'] == 'भिडियोग्रफी') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="vi_yes_1" class="serviceChecked" id="videographiInterest" value=" भिडियोग्रफी" <?php if ($row['department_name'] == 'भिडियोग्रफी') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                            </div>
                          </div>
                          <!-- end second row from here  -->
                           <?php
                           break;
                           case"विजुली":
                           ?>
                          <!-- start second row from here -->
                          <div class="row" style="margin-top: 5px;"><!--padding: 10px-->
                            <div class="col-md-12">
                              <div class="col-md-2">
                                <label for="">विजुली</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="bi_yes" class="serviceChecked" id="bijuliExperience" value="विजुली" <?php if ($row['department_name'] == 'विजुली') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="bi_yes_1" class="serviceChecked" id="bijuliInterest" value="विजुली" <?php if ($row['department_name'] == 'विजुली') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                                 <?php
                                 break;
                                 case"सुरक्षा":
                                 ?>
                              <div class="col-md-2">
                                <label for="">सुरक्षा</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="su_yes" class="serviceChecked" id="surakchhaExperience" value="सुरक्षा" <?php if ($row['department_name'] == 'सुरक्षा') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="su_yes_1" class="serviceChecked" id="surakchhaInterest" value="सुरक्षा" <?php if ($row['department_name'] == 'सुरक्षा') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                               <?php
                               break;
                               case"अस्रिङ":
                               ?>
                              <div class="col-md-2">
                                <label for="">अस्रिङ</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="aa_yes" class="serviceChecked" id="asringExperience" value="अस्रिङ" <?php if ($row['department_name'] == 'अस्रिङ') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>> 
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="aa_yes_1" class="serviceChecked" id="asringInterest" value="अस्रिङ" <?php if ($row['department_name'] == 'अस्रिङ') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                               <?php
                               break;
                               case"फोटोग्राफर":
                               ?>
                              <div class="col-md-2">
                                <label for="">फोटोग्राफर</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="pho_yes" class="serviceChecked" id="photographiExperience" value="फोटोग्राफर" <?php if ($row['department_name'] == 'फोटोग्राफर') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="pho_yes_1" class="serviceChecked" id="photographiInterest" value="फोटोग्राफर" <?php if ($row['department_name'] == 'फोटोग्राफर') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                            </div>
                          </div>
                          <!-- end second row from here -->
                          <?php
                          break;
                          case"प्रशिक्षक":
                          ?>
                          <!-- start third row from here  -->
                          <div class="row" style="margin-top: 5px;"><!--padding: 10px-->
                            <div class="col-md-12">
                              <div class="col-md-2">
                                <label for="">प्रशिक्षक</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="prashi_yes" class="serviceChecked" id="prashikchhakExperience" value="प्रशिक्षक" <?php if ($row['department_name'] == 'प्रशिक्षक') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="prashi_yes_1" class="serviceChecked" id="prashikchhakInterest" value="प्रशिक्षक" <?php if ($row['department_name'] == 'प्रशिक्षक') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                                <?php
                                break;
                                case"मेडिकल":
                                ?>
                              <div class="col-md-2">
                                <label for="">मेडिकल</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="medi_yes" class="serviceChecked" id="medicalExperience" value="मेडिकल" <?php if ($row['department_name'] == 'मेडिकल') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="medi_yes_1" class="serviceChecked" id="medicalExperience" value="मेडिकल" <?php if ($row['department_name'] == 'मेडिकल') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                              <?php
                                break;
                                case"रजिष्ट्रेशन":
                              ?>
                              <div class="col-md-2">
                                <label for="">रजिष्ट्रेशन</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="regis_yes" class="serviceChecked" id="registrationExperience" value="रजिष्ट्रेशन" <?php if ($row['department_name'] == 'रजिष्ट्रेशन') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="regis_yes_1" class="serviceChecked" id="registrationInterest" value="रजिष्ट्रेशन" <?php if ($row['department_name'] == 'रजिष्ट्रेशन') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                                <?php
                                break;
                                case"भिडियाे एडिटर":
                                ?>
                              <div class="col-md-2">
                                <label for="">भिडियाे एडिटर</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="video_yes" class="serviceChecked" id="videoEditorExperience" value="भिडियाे एडिटर" <?php if ($row['department_name'] == 'भिडियाे एडिटर') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="video_yes_1" class="serviceChecked" id="videoEditorInterest" value="भिडियाे एडिटर" <?php if ($row['department_name'] == 'भिडियाे एडिटर') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                            </div>
                          </div>
                          <!-- end thir row from here  -->
                           <?php
                           break;
                           case"जन सम्पर्क":
                           ?>
                          <!-- start forth row from here  -->
                          <div class="row" style="margin-top: 5px;"><!--padding: 10px-->
                            <div class="col-md-12">
                              <div class="col-md-2">
                                <label for="">जन सम्पर्क</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="jan_yes" class="serviceChecked" id="janSamparkExperience" value="जन सम्पर्क" <?php if ($row['department_name'] == 'जन सम्पर्क') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="jan_yes_1" class="serviceChecked" id="janSamparkInterest" value="जन सम्पर्क" <?php if ($row['department_name'] == 'जन सम्पर्क') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                                <?php
                                 break;
                                 case"खरिद बिक्री":
                                ?>
                              <div class="col-md-2">
                                <label for="">खरिद बिक्री</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="kharid_yes" class="serviceChecked" id="kharidBikriExperience" value="खरिद बिक्री" <?php if ($row['department_name'] == 'खरिद बिक्री') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="kharid_yes_1" class="serviceChecked" id="kharidBikriInterest" value="खरिद बिक्री" <?php if ($row['department_name'] == 'खरिद बिक्री') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                                 <?php
                                  break;
                                  case"कम्प्यटर अप्रेटर":
                                 ?>
                              <div class="col-md-2">
                                <label for="">कम्प्यटर अप्रेटर</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="computer_yes" class="serviceChecked" id="computerOperatorExperience" value="कम्प्यटर अप्रेटर" <?php if ($row['department_name'] == 'कम्प्यटर अप्रेटर') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="computer_yes_1" class="serviceChecked" id="computerOperatorExperience" value=" कम्प्यटर अप्रेटर" <?php if ($row['department_name'] == 'कम्प्यटर अप्रेटर') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                                <?php
                                break;
                                case"अडियाे एडिटर":
                                ?>
                              <div class="col-md-2">
                                <label for="">अडियाे एडिटर</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="audio_yes" class="serviceChecked" id="audioEditorExperience" value="अडियाे एडिटर" <?php if ($row['department_name'] == 'अडियाे एडिटर') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="audio_yes_1" class="serviceChecked" id="audioEditorInterest" value="अडियाे एडिटर" <?php if ($row['department_name'] == 'अडियाे एडिटर') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                            </div>
                          </div>
                          <!-- end forth row from here  -->
                          <!-- start fifth row from here  -->
                          <?php
                          break;
                          case"ट्रान्सलेसन":
                          ?>
                          <div class="row" style="margin-top: 5px;"><!--padding: 10px-->
                            <div class="col-md-12">
                              <div class="col-md-2">
                                <label for="">ट्रान्सलेसन</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="trans_yes" class="serviceChecked" id="translationExperience" value="ट्रान्सलेसन" <?php if ($row['department_name'] == 'ट्रान्सलेसन') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="trans_yes_1" class="serviceChecked" id="translationInterest" value="ट्रान्सलेसन" <?php if ($row['department_name'] == 'ट्रान्सलेसन') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                             <?php
                             break;
                             case"कुक":
                                 ?>
                              <div class="col-md-2">
                                <label for="">कुक</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="cock_yes" class="serviceChecked" value="कुक" id="cockExperience" <?php if ($row['department_name'] == 'कुक') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="cock_yes_1" class="serviceChecked" value="कुक" id="cockInterest" <?php if ($row['department_name'] == 'कुक') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                             <?php
                             break;
                             case"टाइपिस्ट":
                             ?>
                              <div class="col-md-2">
                                <label for="">टाइपिस्ट</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="typist_yes" class="serviceChecked" id="typistExperience" value="टाइपिस्ट" <?php if ($row['department_name'] == 'टाइपिस्ट') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="typist_yes_1" class="serviceChecked" id="typistInterest" value="टाइपिस्ट" <?php if ($row['department_name'] == 'टाइपिस्ट') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                             <?php
                             break;
                             case"अडियाे रेकर्डिष्ट":
                             ?>
                              <div class="col-md-2">
                                <label for="">अडियाे रेकर्डिष्ट</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="audioRec_yes" class="serviceChecked" id="audioRecordistExperience" value="अडियाे रेकर्डिष्ट" <?php if ($row['department_name'] == 'अडियाे रेकर्डिष्ट') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="audioRec_yes_1" class="serviceChecked" id="audioRecordistInterest" value="अडियाे रेकर्डिष्ट" <?php if ($row['department_name'] == 'अडियाे रेकर्डिष्ट') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                            </div>
                          </div>
                          <?php
                            break;
                          case"सेवा विभाग (DoS)":
                          ?>
                          <!-- end fifth row from here  -->
                          <!-- start sixth row from here  -->
                          <div class="row" style="margin-top: 5px;"><!--padding: 10px-->
                            <div class="col-md-12">
                              <div class="col-md-2">
                                <label for="">सेवा विभाग (DoS)</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="sewa_yes" class="serviceChecked" id="sewaBibhagExperience" value="सेवा विभाग (DoS)" <?php if ($row['department_name'] == 'सेवा विभाग (DoS)') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="sewa_yes_1" class="serviceChecked" id="sewaBibhagInterest" value="सेवा विभाग (DoS)" <?php if ($row['department_name'] == 'सेवा विभाग (DoS)') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                             <?php
                             break;
                             case"क्याट्रिन हेल्पर": 
                             ?>
                              <div class="col-md-2">
                                <label for="">क्याट्रिन हेल्पर</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="kyatrin_yes" class="serviceChecked" id="kyatrinHelperExperience" value="क्याट्रिन हेल्पर" <?php if ($row['department_name'] == 'क्याट्रिन हेल्पर') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="kyatrin_yes_1" class="serviceChecked" id="kyatrinHelperInterest" value="क्याट्रिन हेल्पर"  <?php if ($row['department_name'] == 'क्याट्रिन हेल्पर') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                              <?php
                              break;
                              case"सांस्कृतिक":
                              ?>
                              <div class="col-md-2">
                                <label for="">सांस्कृतिक</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="sans_yes" class="serviceChecked" id="sanskritExperience" value="सांस्कृतिक"  <?php if ($row['department_name'] == 'सांस्कृतिक') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="sans_yes_1" class="serviceChecked" id="sanskritInterest" value="सांस्कृतिक" <?php if ($row['department_name'] == 'सांस्कृतिक') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                             <?php
                             break;
                             case"कानुन":
                             ?>
                              <div class="col-md-2">
                                <label for="">कानुन</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="kanun_yes" class="serviceChecked" id="kanunExperience" value="कानुन" <?php if ($row['department_name'] == 'कानुन') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="kanun_yes_1" class="serviceChecked" id="kanunInterest" value="कानुन" <?php if ($row['department_name'] == 'कानुन') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                            </div>
                          </div>
                          <!-- end sixth row from here  -->

                          <!-- Start seventh row from here  -->
                          <?php
                          break;
                          case"प्राेडक्शन":
                          ?>
                          <div class="row" style="margin-top: 5px;"><!--padding: 10px-->
                            <div class="col-md-12">
                              <div class="col-md-2">
                                <label for="">प्राेडक्शन</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="pro_yes" class="serviceChecked" id="productionExperience" value="प्राेडक्शन" <?php if ($row['department_name'] == 'प्राेडक्शन') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="pro_yes_1" class="serviceChecked" id="productionInterest" value="प्राेडक्शन" <?php if ($row['department_name'] == 'प्राेडक्शन') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                             <?php
                             break;
                             case"आवास":
                             ?>
                              <div class="col-md-2">
                                <label for="">आवास</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="awas_yes" class="serviceChecked" id="awashExperience" value="आवास" <?php if ($row['department_name'] == 'आवास') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="awes_yes_12" class="serviceChecked" id="awashInterest" value="आवास" <?php if ($row['department_name'] == 'आवास') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                              <?php
                               break;
                               case"स्मार्ट कार्ड":
                              ?>
                              <div class="col-md-2">
                                <label for="">स्मार्ट कार्ड</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="smart_yes" class="serviceChecked" id="smartCardExperience" value="स्मार्ट कार्ड" <?php if ($row['department_name'] == 'स्मार्ट कार्ड') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="smart_yes_1" class="serviceChecked" id="smartCardExperience" value="स्मार्ट कार्ड" <?php if ($row['department_name'] == 'स्मार्ट कार्ड') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                                <?php
                                break;
                                case"निर्माण":
                                ?>
                              <div class="col-md-2">
                                <label for="">निर्माण</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="nirman_yes" class="serviceChecked" id="nirmaanExperience" value="निर्माण" <?php if ($row['department_name'] == 'निर्माण') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="nirman_yes_1" class="serviceChecked" id="nirmaanInterest" value="निर्माण" <?php if ($row['department_name'] == 'निर्माण') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                            </div>
                          </div>
                          <!-- End Seventh row from here  -->

                          <!-- Start Eight row from here  -->
                          <?php
                          break;
                          case"अफिस असिस्टेन्ट":
                          ?>
                          <div class="row" style="margin-top: 5px;"><!--padding: 10px-->
                            <div class="col-md-12">
                              <div class="col-md-2">
                                <label for="">अफिस असिस्टेन्ट</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="office_yes" class="serviceChecked" id="officeAssistantExperience" value="अफिस असिस्टेन्ट" <?php if ($row['department_name'] == 'अफिस असिस्टेन्ट') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="office_yes_1" class="serviceChecked" id="officeAssistantInterest" value="अफिस असिस्टेन्ट" <?php if ($row['department_name'] == 'अफिस असिस्टेन्ट') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                              <?php
                              break;
                              case"अडियाे/भिडियाे अपरेटर":
                              ?>
                              <div class="col-md-2">
                                <label for="">अडियाे/भिडियाे अपरेटर</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="audioVideo_yes" class="serviceChecked" id="audioVideoOperatorExperience" value="अडियाे/भिडियाे अपरेटर" <?php if ($row['department_name'] == 'अडियाे/भिडियाे अपरेटर') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="audioVideo_yes_1" class="serviceChecked" id="audioVideoOperatorInterest" value="अडियाे/भिडियाे अपरेटर" <?php if ($row['department_name'] == 'अडियाे/भिडियाे अपरेटर') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                               <?php
                               break;
                               case"वर्कशप (फलाम/काठ)":
                               ?>
                              <div class="col-md-2">
                                <label for="">वर्कशप (फलाम/काठ)</label>
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="workshop_yes" id="workshopExperience" class="serviceChecked" value="वर्कशप (फलाम/काठ)" <?php if ($row['department_name'] == 'वर्कशप (फलाम/काठ)') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="workshop_yes_1" class="serviceChecked" id="workshopInterest" value="वर्कशप (फलाम/काठ)" <?php if ($row['department_name'] == 'वर्कशप (फलाम/काठ)') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                             <?php
                             break;
                             case"जनरल सेवा":
                             ?>
                              <div class="col-md-2">
                                <label for="">जनरल सेवा</label> <!--(शारीरिक कार्य, बगैँबचा आदी)-->
                              </div>
                              <div class="col-md-1 CheckBoxStyle">
                                <span>
                                  <!-- <label for="">अ.</label> -->
                                  <input type="checkbox" name="jenral_yes" class="serviceChecked" id="generalSewaExperience" value="जनरल सेवा" <?php if ($row['department_name'] == 'जनरल सेवा') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  <!-- <label for="">ई.</label> -->
                                  <input type="checkbox" name="jenral_yes_1" class="serviceChecked" id="generalSewaExperience" value="जनरल सेवा" <?php if ($row['department_name'] == 'जनरल सेवा') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
                                </span>
                              </div>
                            </div>
                        
        
                          </div>
                          <!-- End Eight row from here  -->
                          

                 <!-- Start 10th Part Code Line From Here -->
         <div class="row" style="margin-top: 5px;"><!--padding: 10px-->
          <div class="col-md-12">
                             <?php
                             break;
                             case"लेखा":
                             ?>
            <div class="col-md-2">
              <label for="">लेखा</label>
            </div>
            <div class="col-md-1 CheckBoxStyle">
              <span>
                <input type="checkbox" class="serviceChecked" name="writer_yes" class="serviceChecked" id="writerExperience" value="लेखा" <?php if ($row['department_name'] == 'लेखा') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>> 
              </span>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <span>
                <input type="checkbox" class="serviceChecked" name="writer_yes_1" class="serviceChecked" id="writerInterest" value="लेखा" <?php if ($row['department_name'] == 'लेखा') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
              </span>
            </div>
                            <?php
                             break;
                             case"इभेन्ट म्यानेजर (नियमित कार्यक्रम)":
                             ?>
            <div class="col-md-2">
              <label for="">इभेन्ट म्यानेजर (नियमित कार्यक्रम)</label>
            </div>
            <div class="col-md-1 CheckBoxStyle">
              <span>
                <input type="checkbox" class="serviceChecked" name="invent_menager" class="serviceChecked" id="invent_menagerExperience" value="इभेन्ट म्यानेजर (नियमित कार्यक्रम)" <?php if ($row['department_name'] == 'इभेन्ट म्यानेजर (नियमित कार्यक्रम)') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
              </span>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <span>
                <input type="checkbox" class="serviceChecked" name="invent_menager_1" class="serviceChecked" id="invent_menagerInterest" value="इभेन्ट म्यानेजर (नियमित कार्यक्रम)" <?php if ($row['department_name'] == 'इभेन्ट म्यानेजर (नियमित कार्यक्रम)') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
              </span>
            </div>
                             <?php
                             break;
                             case"अन्य":
                             ?>
            <div class="col-md-2">
              <label for="">अन्य</label>
            </div>
            <div class="col-md-1 CheckBoxStyle">
              <span>
                <input type="checkbox" class="serviceChecked" name="other_yes" class="serviceChecked" id="otherExperience" value="अन्य" <?php if ($row['department_name'] == 'अन्य') {
                                    if($row['experience'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
              </span>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <span>
                <input type="checkbox" class="serviceChecked" name="other_yes_1" class="serviceChecked" id="otherInterest" value="अन्य" <?php if ($row['department_name'] == 'अन्य') {
                                    if($row['interest'] != 0) {  
                                    echo "checked"; }else{
                                      echo "";
                                    }} ?>>
              </span>
            </div>
          </div>
          <?php 
                             
                                  }
                                
                            ?>
                            <?php
                                 }
                                  ?>
        </div>
        <!-- End 10th Part Code Line From Here  -->