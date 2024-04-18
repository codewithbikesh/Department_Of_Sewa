<div class="container mt-4 mb-4" style="background-color: #f2f2f2;" id="ContainerStyle">
  <div class="row" id="rowStyle">
    <div class="row">
        <?php
        $conn = connectMyDB();
        $id = $_GET['id'];
        $sql = "select * from healthdetails where intro_id = '$id'";
        $result = mysqli_query($conn,$sql);
         if($row=mysqli_fetch_assoc($result)){
        ?>
      <div class="col-md-4 col-sm-12 mt-2">
        <span class="SpanStyle">
          <label for="inputState" class="form-label" style="width: 30%; display:flex; text-align:center; align-items:center;">रक्त समुह:</label>
          <select name="blood_Group" id="blood_Group" class="InputStyle form-select" aria-label="Default select example" style="font-weight: bold; font-size: 12px;">
            <option value="<?php echo $row['rBloodGroup'];?>"><?php echo $row['rBloodGroup'];?></option>
            <?php
            $qry = "SELECT DISTINCT `COL 1` as bloodgroup FROM `bloodgroup`";
            $con = connectMyDB();
            $req = mysqli_query($conn,$qry);
            if(mysqli_num_rows($req) > 0){
              while($data = mysqli_fetch_assoc($req)){
            ?>
            <option value="<?php echo $data['bloodgroup'] ?>"><?php echo $data['bloodgroup'] ?></option>
            <?php 
            }}
            ?>
          </select>
        </span>
      </div>

      <div class="row">
        <div class="col-md-12 col-sm-12">
          <h4 style="width: 100%;">तपाईलाई स्वास्थ्य सम्बन्धी केही समस्या छ ? <span><input type="checkbox" name="YesNo"
                value="छ" <?php echo ($row['rChecked'] == 'छ') ? 'checked' : ''; ?>><label for="">&nbsp;छ</label></span>&nbsp;<span><input type="checkbox" name="YesNo"
                value="छैन" <?php echo ($row['rChecked'] == 'छैन') ? 'checked' : ''; ?>><label for="">&nbsp;छैन</label></span>&nbsp; ( यदी भए उल्लेख गर्नुहोस । )</h4>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 mt-2">
        <span class="SpanStyle">
          <input type="text" name="text_Field" class="form-control InputStyle" id="BlockOpen" value="<?php echo $row['rWrite'];?>">
        </span>
      </div>
    </div>
    <?php
    }
    ?>
  </div>
<!-- </div> -->