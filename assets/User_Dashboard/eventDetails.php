<?php include "header.php"; ?>
<!--<script>-->
<!--    $("#colpsCustom").click(function(){-->
<!--        alert("clicked");-->
<!--       $("#accordionSidebar").hide();-->
<!--    });-->
<!--</script>-->

<div class="topbar  pt-3 mb-2" style="background: #424a4a;"><a class="btn"><i class="bi bi-list p-3 text-white" id="colpsCustom"></i></a><span class="text-white p-3 fw-bold mt-3">Event Details</span>
</div>

<?php 
// $_SESSION['email']="san@gmail.com";
// echo "Email of index is : ".$_SESSION['email'];
// echo $_SESSION['session_start_status'];
// echo "<h2>".$_SESSION['login_status']."</h2>";
?>
<div style="overflow:auto;" class="font_size_in_mobile">
   <!--<h1>Helo World !!!</h1>-->
   <table id="table_id" class="display">
        <thead>
            <tr>
                <th scope="col">S.N</th>
                <th scope="col">blank</th>
                <th scope="col">blank</th>
                <th scope="col">blank</th>
                <th scope="col">blank</th>
                <th scope="col">blank</th>
            </tr>
        </thead>
        <tbody>
            <!--------->
        </tbody>
    </table>
</div>

<?php include "footer.php" ?>