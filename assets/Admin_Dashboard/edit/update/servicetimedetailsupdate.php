<div class="container mt-4 mb-4" style="background-color: #f2f2f2;" id="ContainerStyle">
  <div class="row" id="rowStyle">
    <div class="row">
      <?php
      $conn = connectMyDB();
      $id = $_GET['id'];
      $sql = "select * from servicetimedetails where intro_id = '$id'";
      $result = mysqli_query($conn, $sql);
      if (!$result || mysqli_num_rows($result) == 0) {
        ?>
          <div class="container mt-4 mb-4" style="background-color: #f2f2f2;" id="ContainerStyle">
                <div class="row" id="rowStyle">
                  <div class="row">
                    <div class="col-md-6 col-sm-12 mt-2">
                      <span class="SpanStyle">
                        <label for="inputState" class="form-label" style="width:80%; display:flex; align-items:center; text-align:center;">नियमित सेवाका लागि दिन सक्ने समय:<span class="member_formValidation" style="color:red; display:flex; font-size:20px;">*</span>
                        </label>
                        <input type="text" class="form-control InputStyle Language" id="timeTaken" name="limited_Time" class="TimeChecked">
                      </span>
                    </div>
                    <div class="col-md-6">
                      <span class="SpanStyle">
                        <label for="">प्रति (हप्ता &nbsp;&nbsp; 
                        <input type="checkbox" name="duration" value="प्रति हप्ता" class="TimeChecked">  / अर्थ मासिक
                          &nbsp;&nbsp;
                          <input type="checkbox" name="duration" value="अर्थ मासिक" class="TimeChecked">  / महिना &nbsp;&nbsp;  <input
                            type="checkbox" name="duration" value="महिना" class="TimeChecked">&nbsp;&nbsp;) </label>

                      </span>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <span class="SpanStyle">
                        <label for="">आफ्नो सहरमा मात्रै &nbsp;&nbsp;
                          <input type="checkbox" name="country" value="आफ्नो सहरमा मात्रै" class="TimeChecked">&nbsp;&nbsp;आफ्नो क्षेत्रमा मात्रै &nbsp;&nbsp;<input type="checkbox"
                            name="country" value="आफ्नो क्षेत्रमा मात्रै" class="TimeChecked">&nbsp;&nbsp;देशभरि जहाँसुकै &nbsp;&nbsp;<input type="checkbox"
                            name="country" value="देशभरि जहाँसुकै" class="TimeChecked">&nbsp;&nbsp;देश बाहिर <input type="checkbox" name="country" value="देश बाहिर" class="TimeChecked"></label>
                      </span>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6 col-sm-12 mt-2">
                      <span class="SpanStyle">
                        <label for="inputState" class="form-label" style="width:80%;">इभेन्ट सेवाका लागि दिन सक्ने
                          समय:<span class="member_formValidation" style="color:red;font-size:20px;">*</span></label>
                        <input type="text" name="every_Week" class="form-control InputStyle Language" id="invent_Sewa" class="TimeChecked">
                      </span>
                    </div>
                    <div class="col-md-6">
                      <span class="SpanStyle">
                        <label for="">प्रति (हप्ता &nbsp;&nbsp;<input type="checkbox" name="everyWeek" value="प्रति हप्ता" class="TimeChecked"> / अर्थ मासिक
                          &nbsp;&nbsp;<input type="checkbox" name="every_Week" value="अर्थ मासिक" class="TimeChecked"> / महिना &nbsp;&nbsp;<input
                            type="checkbox" name="every_Week" value="महिना" class="TimeChecked">&nbsp;&nbsp;) </label>
                      </span>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <span class="SpanStyle">
                        <label for="">आफ्नो सहरमा मात्रै &nbsp;&nbsp;<input type="checkbox"
                            name="own_Country1" value="आफ्नो सहरमा मात्रै" class="TimeChecked">&nbsp;&nbsp;आफ्नो क्षेत्रमा मात्रै &nbsp;&nbsp;<input type="checkbox"
                            name="own_Country1" value="आफ्नो क्षेत्रमा मात्रै" class="TimeChecked">&nbsp;&nbsp;देशभरि जहाँसुकै &nbsp;&nbsp;<input type="checkbox"
                            name="own_Country1" value="देशभरि जहाँसुकै" class="TimeChecked">&nbsp;&nbsp;देश बाहिर <input type="checkbox" name="own_Country1" value="देश बाहिर" class="TimeChecked"></label>
                      </span>
                    </div>
                  </div>
                  <div class="row">
                    <label for="">कैफियत :</label>
                    <div class="col-md-12">
                      <textarea name="mood_Description" id="mood_Description" cols="120" rows="10"></textarea>
                    </div>
                  </div>
                </div>
              </div>
      <?php
      }else{
        $row = mysqli_fetch_assoc($result);
        ?>
       <div class="col-md-6 col-sm-12 mt-2">
          <span class="SpanStyle">
            <label for="inputState" class="form-label" style="width:80%; display:flex; text-align:center; align-items:center;">नियमित सेवका लागि दिन सक्ने समय: <span class="member_form_validation" style="color:red; display:flex; font-size:20px;">*</span>
            </label>
            <input type="text" class="form-control InputStyle Language" id="inputCity" name="limited_Time"
              class="TimeChecked" value="<?php echo $row['rCertainTime']; ?>">
          </span>
        </div>
        <div class="col-md-6">
          <span class="SpanStyle">
            <label for="">प्रति (हप्ता &nbsp;&nbsp;
              <input type="checkbox" name="duration" value="प्रति हप्ता" class="TimeChecked" <?php if ($row['rCertainDays'] == 'प्रति हप्ता') {
                echo "checked";
              } ?>> / अर्थ मासिक
              &nbsp;&nbsp;
              <input type="checkbox" name="duration" value="अर्थ मासिक" class="TimeChecked" <?php if ($row['rCertainDays'] == 'अर्थ मासिक') {
                echo "checked";
              } ?>> / महिना &nbsp;&nbsp; <input type="checkbox"
                name="duration" value="महिना" class="TimeChecked" <?php if ($row['rCertainDays'] == 'महिना') {
                  echo "checked";
                } ?>>&nbsp;&nbsp;) </label>

          </span>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 col-sm-12">
          <span class="SpanStyle">
            <label for="">आफ्नो सहरमा मात्रै &nbsp;&nbsp;
              <input type="checkbox" name="country" value="आफ्नो सहरमा मात्रै" class="TimeChecked" <?php if ($row['rWorld'] == 'आफ्नो सहरमा मात्रै') {
                echo "checked";
              } ?>>&nbsp;&nbsp;आफ्नो क्षेत्रमा मात्रै
              &nbsp;&nbsp;<input type="checkbox" name="country" value="आफ्नो क्षेत्रमा मात्रै" class="TimeChecked" <?php if ($row['rWorld'] == 'आफ्नो क्षेत्रमा मात्रै') {
                echo "checked";
              } ?>>&nbsp;&nbsp;देशभरि जहाँसुकै
              &nbsp;&nbsp;<input type="checkbox" name="country" value="देशभरि जहाँसुकै" class="TimeChecked" <?php if ($row['rWorld'] == 'देशभरि जहाँसुकै') {
                echo "checked";
              } ?>>&nbsp;&nbsp;देश बाहिर <input
                type="checkbox" name="country" value="देश बाहिर" class="TimeChecked" <?php if ($row['rWorld'] == 'देश बाहिर') {
                  echo "checked";
                } ?>></label>
          </span>
        </div>
      </div>


      <div class="row">
        <div class="col-md-6 col-sm-12 mt-2">
          <span class="SpanStyle">
            <label for="inputState" class="form-label" style="width:80%; display:flex; text-align:center; align-items:center;">इभेन्ट सेवका लागि दिन सक्ने
              समय: <span class="member_form_validation" style="color:red; display:flex; font-size:20px;">*</span></label>
            <input type="text" name="invent_Sewa" class="form-control InputStyle Language" id="inputCity"
              class="TimeChecked" value="<?php echo $row['rInvestmentTime']; ?>">
          </span>
        </div>
        <div class="col-md-6">
          <span class="SpanStyle">
            <label for="">प्रति (हप्ता &nbsp;&nbsp;<input type="checkbox" name="every_Week" value="प्रति हप्ता"
                class="TimeChecked" <?php if ($row['rInvestmentWeek'] == 'प्रति हप्ता') {
                  echo "checked";
                } ?>> / अर्थ मासिक
              &nbsp;&nbsp;<input type="checkbox" name="every_Week" value="अर्थ मासिक" class="TimeChecked" <?php if ($row['rInvestmentWeek'] == 'अर्थ मासिक') {
                echo "checked";
              } ?>> / महिना &nbsp;&nbsp;<input type="checkbox"
                name="every_Week" value="महिना" class="TimeChecked" <?php if ($row['rInvestmentWeek'] == 'महिना') {
                  echo "checked";
                } ?>>&nbsp;&nbsp;) </label>
          </span>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 col-sm-12">
          <span class="SpanStyle">
            <label for="">आफ्नो सहरमा मात्रै &nbsp;&nbsp;<input type="checkbox" name="own_Country1"
                value="आफ्नो सहरमा मात्रै" class="TimeChecked" <?php if ($row['rPlace'] == 'आफ्नो सहरमा मात्रै') {
                  echo "checked";
                } ?>>&nbsp;&nbsp;आफ्नो क्षेत्रमा मात्रै &nbsp;&nbsp;<input type="checkbox" name="own_Country1"
                value="आफ्नो क्षेत्रमा मात्रै" class="TimeChecked" <?php if ($row['rPlace'] == 'आफ्नो क्षेत्रमा मात्रै') {
                  echo "checked";
                } ?>>&nbsp;&nbsp;देशभरि जहाँसुकै &nbsp;&nbsp;<input type="checkbox" name="own_Country1"
                value="देशभरि जहाँसुकै" class="TimeChecked" <?php if ($row['rPlace'] == 'देशभरि जहाँसुकै') {
                  echo "checked";
                } ?>>&nbsp;&nbsp;देश बाहिर <input type="checkbox" name="own_Country1" value="देश बाहिर"
                class="TimeChecked" <?php if ($row['rPlace'] == 'देश बाहिर') {
                  echo "checked";
                } ?>></label>
          </span>
        </div>
      </div>
      <div class="row">
        <label for="" style="display:flex; text-align:center; align-items:center;">कैफियत : <span class="member_form_validation" style="color:red; display:flex; font-size:20px;">*</span></label>
        <div class="col-md-12">
          <textarea name="mood_Description" id="" cols="120" rows="10" value="<?php echo $row['rDescription'] ?>"><?php echo $row['rDescription'] ?></textarea>
        </div>
      </div>
<?php
      }
      ?>
  </div>
</div>
<script>
  $(document).ready(function () {
    // checkbox validation  js code 
    // $('input[type="checkbox"]').on('change', function () {
    //   $('input[name="' + this.name + '"]').not(this).prop('checked', false);
    //          });

    // checkbox validation  js code 
    $('.TimeChecked').on('change', function () {
      $('input[name="' + this.name + '"]').not(this).prop('checked', false);
    });
  });

  $(".clsgender").on("click", function () {
    var id = $(this).data("rdb");
    $("#" + id).prop("checked", "checked");
    // alert("checked");
  });
</script>