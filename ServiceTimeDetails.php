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
                        <input type="text" name="invent_Sewa" class="form-control InputStyle Language" id="invent_Sewa" class="TimeChecked">
                      </span>
                    </div>
                    <div class="col-md-6">
                      <span class="SpanStyle">
                        <label for="">प्रति (हप्ता &nbsp;&nbsp;<input type="checkbox" name="everyWeek" value="प्रति हप्ता" class="TimeChecked"> / अर्थ मासिक
                          &nbsp;&nbsp;<input type="checkbox" name="everyWeek" value="अर्थ मासिक" class="TimeChecked"> / महिना &nbsp;&nbsp;<input
                            type="checkbox" name="everyWeek" value="महिना" class="TimeChecked">&nbsp;&nbsp;) </label>
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

              <script>
                $(document).ready(function(){
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