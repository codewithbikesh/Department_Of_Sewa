<!-- start new update for languagedetails query from here  -->

<div class="container mt-4 mb-4" style="background-color: #f2f2f2;" id="ContainerStyle">
                <div class="row" id="rowStyle">
                  <!-- start second AGPS सँगको विवरण form section from here  -->
                  <div class="row">
                  <?php 
    $conn = connectMyDB();
   $id = $_GET['id'];
   $sql = "select * from languagedetails where intro_id ='$id'";
   $result = mysqli_query($conn, $sql);
                  while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-md-12 col-sm-12 mt-2">
                      <span class="SpanStyle">
                        <label for="inputZip" class="form-label" style="width: 8%;  display:flex; text-align:center; align-items:center;">प्रथम भाषा:<span class="member_form_validation" style="color:red; display:flex; font-size:20px;">*</span></label>
                        <input type="text" name="first_Language" class="form-control Language" id="inputZip" value="<?php echo $row['rFirstLanguage']; ?>">
                      </span>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 col-sm-12 mt-2">
                      <span class="SpanStyle">
                        <label for="inputZip" class="form-label" style="width: 8%;">दोस्रो भाषा :</label>
                        <input type="text" name="second_Language" class="form-control Language" id="inputZip" value="<?php echo $row['rSecondLanguage']; ?>">
                      </span>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 col-sm-12 mt-2">
                      <span class="SpanStyle">
                        <label for="inputZip" class="form-label" style="width: 8%;">तेस्रो भाषा :</label>
                        <input type="text" name="third_Language" class="form-control Language" id="inputZip" value="<?php echo $row['rThirdLanguage']; ?>">
                      </span>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 col-sm-12 mt-2">
                      <span class="SpanStyle">
                        <label for="inputZip" class="form-label" style="width: 8%;">चौथो भाषा :</label>
                        <input type="text" name="forth_Language" class="form-control Language" id="inputZip" value="<?php echo $row['rForthLanguage']; ?>">
                      </span>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                  <!-- end second AGPS सँगको विवरण form section from here  -->
                </div>
              <!-- </div> -->
<!-- end new update for languagedetails query from here  -->
