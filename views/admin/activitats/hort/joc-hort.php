<!-- (A) HTML DIALOG BOX -->
<div id="boxBack">
    <div id="boxWrap">

        <div id="boxTxt"></div>
        <br>
        <!-- <input id="si" type="button" value="SÍ" onclick="joc_hort()"> -->
        <input id="no" type="button" value="NO" onclick="joc_hort()">

    </div>
</div>
 
<script>
   function joc_hort(msg) {
        if (msg != undefined) {
            document.getElementById("boxTxt").innerHTML = msg;
            document.getElementById("boxBack").classList.add("show");
        } else { 
            document.getElementById("boxBack").classList.remove("show"); 
        }
    } 
</script>
