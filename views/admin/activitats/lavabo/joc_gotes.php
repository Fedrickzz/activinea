<!-- (A) HTML DIALOG BOX -->
<div id="boxBack">
    <div id="boxWrap">

        <div id="boxTxt"></div>
        <br>
        <input id="si" type="button" value="SÍ" onclick="joc('LES GOTES')">
        <input id="no" type="button" value="NO" onclick="dbox()">

    </div>
</div>

<div id="jocBack">
    <div id="jocWrap">

        <h4 id="jocTxt"></h4>
        
        <input id="no" type="button" value="TANCAR" onclick="joc()"><span id="jocTxt">GOTES: CLICA ELS BOTONS EN ORDRE PER NETEJAR-TE LES MANS</span></input>

        <div id="bg">

            <!-- botons -->
            <img id="btn-aigua" class="btn btn-aigua" src="/img/activitats/lavabo/img/btn-aigua.png" alt="btn-aigua" onclick="Aigua()">
            <img id="btn-sabo" class="btn btn-sabo" src="/img/activitats/lavabo/img/btn-sabo.png" alt="btn-sabo" onclick="Sabo()">
            <img id="btn-secar" class="btn btn-secar" src="/img/activitats/lavabo/img/btn-secar.png" alt="btn-secar" onclick="Secar()">


            <!-- fons -->
            <img id="paret" class="imatge paret" src="/img/activitats/lavabo/img/bg-lavabo.png" alt="paret">
            <img id="mans" class="imatge mans" src="/img/activitats/lavabo/img/mans.png" alt="mans">
            <img id="bruticia-1" class="imatge bruticia" src="/img/activitats/lavabo/img/bruticia-1.png" alt="bruticia-1">
            <img id="bruticia-2" class="imatge bruticia" src="/img/activitats/lavabo/img/bruticia-2.png" alt="bruticia-2">
            <img id="bruticia-3" class="imatge bruticia" src="/img/activitats/lavabo/img/bruticia-3.png" alt="bruticia-3">
            <img id="bruticia-4" class="imatge bruticia" src="/img/activitats/lavabo/img/bruticia-4.png" alt="bruticia-3">

            <!-- efecte -->
            <img id="sabo" class="efecte-sabo" src="/img/activitats/lavabo/img/sabo.png" alt="sabo">
            <img id="aigua" class="imatge efecte-aigua" src="/img/activitats/lavabo/img/aigua.png" alt="aigua">
            <img id="secar" class="efecte-tovallola" src="/img/activitats/lavabo/img/tovallola.png" alt="tovallola">

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
    let isObject = false;
    let nameObject = '';
    let bruticia_inici = 1;

    let count_sabo = 0;
    let count_aigua = 0;
    let count_secar = 0;

    let count_general_sabo = 0;
    let count_general_aigua = 0;
    let count_general_secar = 0;

    document.getElementById('btn-secar').disable = true



    document.getElementById('aigua').style.opacity = myopacity;
    document.getElementById('sabo').style.opacity = myopacity;
    document.getElementById('secar').style.opacity = myopacity;

    document.getElementById('bruticia-1').style.opacity = bruticia_inici;
    document.getElementById('bruticia-2').style.opacity = bruticia_inici;
    document.getElementById('bruticia-3').style.opacity = bruticia_inici;
    document.getElementById('bruticia-4').style.opacity = bruticia_inici;

    function wait(ms){
        var start = new Date().getTime();
        var end = start;
        while(end < start + ms) {
            end = new Date().getTime();
        }
    }


    function Mostrar(id) {
        
        // if (myopacity <1 || myopacity <= 0) {
        //     myopacity += .075;

        //     setTimeout(function(){Mostrar(id)},100);

            
        // } else if (myopacity > 1) {
        //     clearInterval(function(){Mostrar(id)},100);

        // }


        // document.getElementById(id).style.opacity = myopacity;
        document.getElementById(id).style.opacity = 1;
        return myopacity;
    }

    function Amagar(id) {
        // if (myopacity >1 || myopacity > 0) {
        //     myopacity -= .075;

        //     setTimeout(function(){Amagar(id)},100);
        // } else {
        //     clearInterval(function(){Amagar(id)},100);
        // }
        // document.getElementById(id).style.opacity = myopacity;
        document.getElementById(id).style.opacity = 0;
        return myopacity;
    }

    function addClass(id, className) {
        let x = document.getElementById(id)
        x.classList.add(className);
    }

    function quitClass(id, className) {
        let x = document.getElementById(id)
        x.classList.remove(className);
    }

    function disableObj(id) {
        if (id === 'sabo') {
            document.getElementById('btn-aigua').disable = true
        } else if (id === 'aigua'){
            document.getElementById('btn-sabo').disable = true
        } else if (id === 'secar'){
            document.getElementById('btn-sabo').disable = true
            document.getElementById('btn-aigua').disable = true
            
        } 
    }

    function enableObj() {
        document.getElementById('btn-sabo').disable = false
        document.getElementById('btn-aigua').disable = false
         
    }

    function enableSecar() {
        document.getElementById('btn-secar').disable = false
    }

    function Sabo() {
        let id = 'sabo';
        count_sabo++;


        if (!isObject) {
            disableObj(id)

            Mostrar(id);
            addClass('btn-sabo', 'activat')

            myopacity = 0;
            isObject = true;
            nameObject = id;

        }

        if (nameObject === id && count_sabo > 1) {
            Amagar(id);
            quitClass('btn-sabo', 'activat')

            isObject = false;
            nameObject = '';
            count_sabo = 0;
            count_general_sabo++;
            logic();

            enableObj()
        }

    }

    function Aigua() {
        let id = 'aigua';
        count_aigua++;


        if (!isObject) {
            disableObj(id)

            Mostrar(id);
            addClass('btn-aigua', 'activat')

            myopacity = 0;
            isObject = true;
            nameObject = id;

        }

        if (nameObject === id && count_aigua > 1) {
            Amagar(id);
            quitClass('btn-aigua', 'activat')

            isObject = false;
            nameObject = '';
            count_aigua = 0;
            count_general_aigua++;
            logic();

            enableObj()
        }

    }

    function Secar() {
        let id = 'secar';
        count_secar++;

        if (count_general_sabo >= 4 && count_general_aigua >= 4) {

            if (!isObject) {
            disableObj(id)

            Mostrar(id);
            addClass('btn-secar', 'activat')

            myopacity = 0;
            isObject = true;
            nameObject = id;
            }

            if (nameObject === id && count_secar > 1) {
                Amagar('secar');

                quitClass('btn-secar', 'activat')

                isObject = false;
                nameObject = '';
                count_secar = 0;
                count_general_secar++;
                wait(1000);
                alert("FI DEL JOC!");
            }
        }


    }

    function logic() {
        if (count_general_sabo === 1 && count_general_aigua === 1) {
            Amagar('bruticia-1');
            document.getElementById('bruticia-2').style.opacity = bruticia_inici;
            document.getElementById('bruticia-3').style.opacity = bruticia_inici;
            document.getElementById('bruticia-4').style.opacity = bruticia_inici;
        } else if (count_general_sabo === 2 && count_general_aigua === 2) {
            Amagar('bruticia-1');
            Amagar('bruticia-2');
            document.getElementById('bruticia-3').style.opacity = bruticia_inici;
            document.getElementById('bruticia-4').style.opacity = bruticia_inici;
        } else if (count_general_sabo === 3 && count_general_aigua === 3) {
            Amagar('bruticia-1');
            Amagar('bruticia-2');
            Amagar('bruticia-3');
            document.getElementById('bruticia-4').style.opacity = bruticia_inici;
        } else if (count_general_sabo === 4 && count_general_aigua === 4) {
            Amagar('bruticia-1');
            Amagar('bruticia-2');
            Amagar('bruticia-3');
            Amagar('bruticia-4');
            enableSecar()
            alert("ARA POTS EIXUGAR-TE LES MANS!")
        }

        
    }


</script>
