<!-- (A) HTML DIALOG BOX -->
<div id="boxBack">
    <div id="boxWrap">

        <div id="boxTxt"></div>
        <br>
        <input id="si" type="button" value="SÍ" onclick="joc('JOC DE REGAR LA PLANTA')">
        <input id="no" type="button" value="NO" onclick="dbox()">

    </div>
</div>

<div id="jocBack">
    <div id="jocWrap">

        <div id="jocTxt"></div>
        <br>
        <!-- <input id="si" type="button" value="SÍ" onclick="dbox('JOC DE REGAR LA PLANTA')"> -->
        <input id="no" type="button" value="TANCAR" onclick="joc()">

    </div>
</div>
 
<script>
   function dbox(msg) {
    
        if (msg != undefined) {
            document.getElementById("boxTxt").innerHTML = msg;
            document.getElementById("boxBack").classList.add("show");
            
        } else { 
            document.getElementById("boxBack").classList.remove("show"); 
        }
    } 
    function joc(msg) {
    
        if (msg != undefined) {
            // reset
            document.getElementById("boxBack").classList.remove("show"); 

            // load game
            document.getElementById("jocTxt").innerHTML = msg;
            document.getElementById("jocBack").classList.add("show");
        } else { 
            document.getElementById("jocBack").classList.remove("show"); 
        }
    } 
</script>
