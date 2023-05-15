<!-- (A) HTML DIALOG BOX -->
<div id="boxBack">
    <div id="boxWrap">

        <div id="boxTxt"></div>
        <br>
        <input id="si" type="button" value="SÍ" onclick="joc('EL CICLE')">
        <input id="no" type="button" value="NO" onclick="dbox()">

    </div>
</div>

<div id="jocBack">
    <div id="jocWrap">

        <div id="jocTxt"></div>
        <br>
        <!-- <input id="si" type="button" value="SÍ" onclick="dbox('JOC DE REGAR LA PLANTA')"> -->
        <input id="no" type="button" value="TANCAR" onclick="joc()">

        <div id="bg">

            <!-- botons -->
            <img class="btn btn-sol-1" src="/img/activitats/hort/img/btn-sol-1.png" alt="btn-sol" onclick="Amagar()">
            <img class="btn btn-pluja-1" src="/img/activitats/hort/img/btn-pluja-2.png" alt="btn-pluja" onclick="Mostrar()">

            <!-- fons -->
            <img id="cel-clar" class="imatge cel-fosc" src="/img/activitats/hort/img/cel.png" alt="cel-clar">
            <img id="cel-fosc" class="imatge cel-fosc" src="/img/activitats/hort/img/cel-fosc.png" alt="cel-fosc">
            <img class="imatge terra" src="/img/activitats/hort/img/terra.png" alt="terra">
            <img id="nuvols" class="imatge nuvols" src="/img/activitats/hort/img/nuvols.png" alt="nuvols">
            <!-- <img class="imatge pluja" src="/img/activitats/hort/img/pluja.png" alt="pluja"> -->

           
            <div id="pluja" class="rain"></div>


        </div>

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

    let myopacity = 0;
    let myopacity_2 = 1;

    document.getElementById('nuvols').style.opacity = myopacity;
    document.getElementById('pluja').style.opacity = myopacity;
    document.getElementById('cel-fosc').style.opacity = myopacity;
    document.getElementById('cel-clar').style.opacity = myopacity_2;

    function Amagar() {

        // bon temps
        
        if (myopacity >=1 || myopacity > 0) {
            myopacity -= .075;

            if (myopacity_2 <= 0 || myopacity_2 < 1) {
                myopacity_2 += .075;
            }

            setTimeout(function(){Amagar()},100);
        }
        document.getElementById('nuvols').style.opacity = myopacity;
        document.getElementById('pluja').style.opacity = myopacity;
        document.getElementById('cel-fosc').style.opacity = myopacity;
        document.getElementById('cel-clar').style.opacity = myopacity_2;
    }



    function Mostrar() {
        // tormenta
        if (myopacity <= 0 || myopacity < 1) {
            myopacity += .075;
            if (myopacity_2 >=1 || myopacity_2 > 0) {
                myopacity_2 -= .075;
            }

         
            setTimeout(function(){Mostrar()},100);
        }
        document.getElementById('nuvols').style.opacity = myopacity;
        document.getElementById('pluja').style.opacity = myopacity;
        document.getElementById('cel-fosc').style.opacity = myopacity;
        document.getElementById('cel-clar').style.opacity = myopacity_2;

    }



</script>
