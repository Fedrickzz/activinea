<?php
    include_once __DIR__ .'/joc_gotes.php';
?>
<div id="main-casa">
    <img src="/img/activitats/lavabo.png" usemap="#image-map">

    <map name="image-map">
        <area target="_self" alt="PICA" title="PICA" coords="685,255,987,923" shape="rect"  onclick="dbox('VOLS COMENÇAR EL JOC?')">
        <area target="_self" alt="TORNAR ENRERE" title="TORNAR ENRERE" href="/admin/activitats" coords="1635,143,1862,1043" shape="rect">
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





