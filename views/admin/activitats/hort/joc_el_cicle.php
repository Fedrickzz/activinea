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

        <!-- <div id="jocTxt"></div> -->
        <!-- <input id="si" type="button" value="SÍ" onclick="dbox('JOC DE REGAR LA PLANTA')"> -->
        <h4 id="jocTxt"></h4>
        <!-- <br> -->
        
        <input id="no" type="button" value="TANCAR" onclick="joc()"><span id="jocTxt">EL CICLE: CLICA EL NÚVOL I DESPRÉS EL SOL PER FER CRÉIXER LA PLANTA</span></input>

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

            <img id="arbre-1" class="imatge arbre-1" src="/img/activitats/hort/img/arbre-1.png" alt="arbre-1">
            <img id="arbre-2" class="imatge arbre-2" src="/img/activitats/hort/img/arbre-2.png" alt="arbre-2">
            <img id="arbre-3" class="imatge arbre-3" src="/img/activitats/hort/img/arbre-3.png" alt="arbre-3">
            <img id="arbre-4" class="imatge arbre-4" src="/img/activitats/hort/img/arbre-4.png" alt="arbre-4">
            <img id="arbre-5" class="imatge arbre-5" src="/img/activitats/hort/img/arbre-5.png" alt="arbre-5">
            <img id="arbre-6" class="imatge arbre-6" src="/img/activitats/hort/img/arbre-6.png" alt="arbre-6">




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
            // document.getElementById("jocTxt").innerHTML = msg;
            document.getElementById("jocBack").classList.add("show");
        } else { 
            document.getElementById("jocBack").classList.remove("show"); 
        }
    } 

    

    let myopacity = 0;
    let myopacity_2 = 1;
    let count_sol = 0;
    let count_pluja = 0;
    let step = 1;
    let arbre_inici = 0;

    let flag = true;

    document.getElementById('nuvols').style.opacity = myopacity;
    document.getElementById('pluja').style.opacity = myopacity;
    document.getElementById('cel-fosc').style.opacity = myopacity;
    document.getElementById('cel-clar').style.opacity = myopacity_2;
    document.getElementById('arbre-1').style.opacity = arbre_inici;
    document.getElementById('arbre-2').style.opacity = arbre_inici;
    document.getElementById('arbre-3').style.opacity = arbre_inici;
    document.getElementById('arbre-4').style.opacity = arbre_inici;
    document.getElementById('arbre-5').style.opacity = arbre_inici;
    document.getElementById('arbre-6').style.opacity = arbre_inici;

    function MostrarArbre(sol, pluja){
        if (sol === 1 && pluja === 1) {
            document.getElementById('arbre-1').style.opacity = 1;
        } else if (sol === 2 && pluja === 2) {
            document.getElementById('arbre-1').style.opacity = 0;
            document.getElementById('arbre-2').style.opacity = 1;
        } else if (sol === 3 && pluja === 3) {
            document.getElementById('arbre-1').style.opacity = 0;
            document.getElementById('arbre-2').style.opacity = 0;
            document.getElementById('arbre-3').style.opacity = 1;
        } else if (sol === 4 && pluja === 4) {
            document.getElementById('arbre-1').style.opacity = 0;
            document.getElementById('arbre-2').style.opacity = 0;
            document.getElementById('arbre-3').style.opacity = 0;
            document.getElementById('arbre-4').style.opacity = 1;
        } else if (sol === 5 && pluja === 5) {
            document.getElementById('arbre-1').style.opacity = 0;
            document.getElementById('arbre-2').style.opacity = 0;
            document.getElementById('arbre-3').style.opacity = 0;
            document.getElementById('arbre-4').style.opacity = 0;
            document.getElementById('arbre-5').style.opacity = 1;
        } else if (sol === 6 && pluja === 6) {
            document.getElementById('arbre-1').style.opacity = 0;
            document.getElementById('arbre-2').style.opacity = 0;
            document.getElementById('arbre-3').style.opacity = 0;
            document.getElementById('arbre-4').style.opacity = 0;
            document.getElementById('arbre-5').style.opacity = 0;
            document.getElementById('arbre-6').style.opacity = 1;
            
        }

        if (sol === 7 || pluja === 7) {
            
            alert("FI DEL JOC! HAS ACONSEGUIT FER CRÉIXER UN ARBRE")
        }

    }

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

        if (flag == false) {
            count_sol++;
            console.log('sol',count_sol);
            MostrarArbre(count_sol, count_pluja);
            flag = true;

        }

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

        if (flag == true) {
            count_pluja++;
            console.log('pluja',count_pluja);
            flag = false;
        }
    }



</script>
