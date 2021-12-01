<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        
            <script>function display_ct6() {
                var x = new Date()
                var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
                hours = x.getHours( ) % 12;
                hours = hours ? hours : 12;
                var x1=x.getMonth() + 1+ "/" + x.getDate() + "/" + x.getFullYear(); 
                x1 = x1 + " - " +  hours + ":" +  x.getMinutes() + ":" +  x.getSeconds() + ":" + ampm;
                document.getElementById('ct6').innerHTML = x1;
                display_c6();
                 }
                 function display_c6(){
                var refresh=1000; // Refresh rate in milli seconds
                mytime=setTimeout('display_ct6()',refresh)
                }
                display_c6()
                </script>
                <span id='ct6' ></span>
       
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021-2022 <b>ICT Department</b>.</strong> All rights reserved.
  </footer>
</div>