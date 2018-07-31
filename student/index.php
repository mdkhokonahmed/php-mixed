<?php include 'inc/header.php';?>
 <?php include 'inc/sidebar.php';?>

        <div id="page-wrapper">
  
            <div class="row">
                <div class="col-md-6">
            <h1 class="page-header">Dashboard</h1>

        </div>
      <div class="col-md-6">  
    <style>
.clockStyle {
    background-color:black;
    border:#999 2px inset;
    padding:6px;
    color:red;
   font-family: 'Orbitron', sans-serif;
    font-size:16px;
    font-weight:bold;
    letter-spacing: 2px;
    display:inline;
}
</style>
<div id="clockDisplay" class="clockStyle pull-right"></div>
<script>
function renderTime() {
    var currentTime = new Date();
    var diem = "AM";
    var h = currentTime.getHours();
    var m = currentTime.getMinutes();
    var s = currentTime.getSeconds();
    setTimeout('renderTime()',1000);
    if (h == 0) {
        h = 12;
    } else if (h > 12) { 
        h = h - 12;
        diem="PM";
    }
    if (h < 10) {
        h = "0" + h;
    }
    if (m < 10) {
        m = "0" + m;
    }
    if (s < 10) {
        s = "0" + s;
    }
    var myClock = document.getElementById('clockDisplay');
    myClock.textContent = h + ":" + m + ":" + s + " " + diem;
    myClock.innerText = h + ":" + m + ":" + s + " " + diem;
}
renderTime();
</script>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
  

    <?php include 'inc/footer.php';?>