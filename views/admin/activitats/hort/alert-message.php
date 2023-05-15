<!-- (A) HTML DIALOG BOX -->
<div id="boxBack">
    <div id="boxWrap">

        <div id="boxTxt"></div>
        <br>
        <input id="si" type="button" value="SÍ" onclick="dbox()">
        <input id="no" type="button" value="NO" onclick="dbox()">

    </div>
</div>
 
<script>
   function dbox (msg) {
        if (msg != undefined) {
            document.getElementById("boxTxt").innerHTML = msg;
            document.getElementById("boxBack").classList.add("show");
        } else { 
            document.getElementById("boxBack").classList.remove("show"); 
        }
    } 
</script>
