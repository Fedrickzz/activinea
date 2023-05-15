<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activinea - <?php echo $titol; ?></title>
    <link rel="shortcut icon" href="/build/img/favicon.ico"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body class="dashboard">
        <?php 
            include_once __DIR__ .'/templates/admin-header.php';
        ?>
        <div class="dashboard__grid">

            <?php
                // admin
                if ($_SESSION['admin'] == 1) {
                    include_once __DIR__ .'/templates/sidebar-admin.php';  
                } else if ($_SESSION['admin'] == 2) {
                    include_once __DIR__ .'/templates/sidebar-professor.php';  
                } else if ($_SESSION['admin'] == 3) {
                    include_once __DIR__ .'/templates/sidebar-alumne.php';  
                }
            ?>

            <main class="dashboard__contingut">
                <?php 
                    echo $contingut; 
                ?> 
            </main>
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script>
    (function (a) {
      a.fn.rwdImageMaps = function () {
        var c = this;
        var b = function () {
          c.each(function () {
            if (typeof a(this).attr('usemap') == 'undefined') {
              return;
            }
            var e = this,
              d = a(e);
            a('<img />')
              .on('load', function () {
                var g = 'width',
                  m = 'height',
                  n = d.attr(g),
                  j = d.attr(m);
                if (!n || !j) {
                  var o = new Image();
                  o.src = d.attr('src');
                  if (!n) {
                    n = o.width;
                  }
                  if (!j) {
                    j = o.height;
                  }
                }
                var f = d.width() / 100,
                  k = d.height() / 100,
                  i = d.attr('usemap').replace('#', ''),
                  l = 'coords';
                a('map[name="' + i + '"]')
                  .find('area')
                  .each(function () {
                    var r = a(this);
                    if (!r.data(l)) {
                      r.data(l, r.attr(l));
                    }
                    var q = r.data(l).split(','),
                      p = new Array(q.length);
                    for (var h = 0; h < p.length; ++h) {
                      if (h % 2 === 0) {
                        p[h] = parseInt((q[h] / n) * 100 * f);
                      } else {
                        p[h] = parseInt((q[h] / j) * 100 * k);
                      }
                    }
                    r.attr(l, p.toString());
                  });
              })
              .attr('src', d.attr('src'));
          });
        };
        a(window).resize(b).trigger('resize');
        return this;
      };
    })(jQuery);
  </script>
  <script>
    $(document).ready(function (e) {
      $('img[usemap]').rwdImageMaps();

      // $('area').on('mouseover', function () {
      //   // alert($(this).attr('alt') + );
      //   console.log($(this)[0].coords);
      // });
    });
  </script>
    <script src="/build/js/main.min.js" defer></script>
</body>
</html>