<?php
    include_once __DIR__ .'/joc_el_cicle.php';
?>

<div id="main-casa">
    <img src="/img/activitats/hort.png" usemap="#image-map">


    <map name="image-map">
        <area target="_self" alt="TORNAR ENRERE" title="TORNAR ENRERE" href="/admin/activitats" coords="0,-1,324,692" shape="rect">
        <area target="_self" alt="HORT" title="JOC HORT" coords="602,330,1808,853" shape="rect" onclick="dbox('VOLS COMENÇAR EL JOC?')">
    </map>
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script>

    // $(document).ready(function (e) {
    // //   $('img[usemap]').rwdImageMaps();

    // //   $('area').on('click', function () {
    // //     // alert($(this).attr('alt') + );
    // //     console.log($(this)[0].coords);
    // //   });
    // });

    $(document).ready(function(){
        $('.toast__close').click(function(e){
            e.preventDefault();
            var parent = $(this).parent('.toast');
            parent.fadeOut("slow", function() { $(this).remove(); } );
        });
    });
  </script>





