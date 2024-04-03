<!-- data tables css -->
<link rel="stylesheet" href="{{ url('assets') }}/css/plugins/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="{{ url('assets') }}/css/plugins/responsive.bootstrap5.min.css">
<!-- [Page specific CSS] end -->
<link rel="stylesheet" href="{{ url('assets') }}/fonts/inter/inter.css" id="main-font-link" />
<!-- [Tabler Icons] https://tablericons.com -->
<link rel="stylesheet" href="{{ url('assets') }}/fonts/tabler-icons.min.css">
<!-- [Feather Icons] https://feathericons.com -->
<link rel="stylesheet" href="{{ url('assets') }}/fonts/feather.css">
<!-- [Font Awesome Icons] https://fontawesome.com/icons -->
<link rel="stylesheet" href="{{ url('assets') }}/fonts/fontawesome.css">
<!-- [Material Icons] https://fonts.google.com/icons -->
<link rel="stylesheet" href="{{ url('assets') }}/fonts/material.css">
<!-- [Template CSS Files] -->
<link rel="stylesheet" href="{{ url('assets') }}/css/style.css" id="main-style-link">
<link rel="stylesheet" href="{{ url('assets') }}/css/style-preset.css">
<script async src="https://www.googletagmanager.com/gtag/js?id=G-14K1GBX9FG"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'G-14K1GBX9FG');
</script>
<!-- WiserNotify -->
<script>
  !(function () {
    if (window.t4hto4) console.log('WiserNotify pixel installed multiple time in this page');
    else {
      window.t4hto4 = !0;
      var t = document,
        e = window,
        n = function () {
          var e = t.createElement('script');
          (e.type = 'text/javascript'),
            (e.async = !0),
            (e.src = '{{ url('assets') }}/pt.wisernotify.com/pixel6d4c.js?ti=1jclj6jkfc4hhry'),
            document.body.appendChild(e);
        };
      'complete' === t.readyState ? n() : window.attachEvent ? e.attachEvent('onload', n) : e.addEventListener('load', n, !1);
    }
  })();
</script>
<!-- Microsoft clarity -->
<script type="text/javascript">
  (function (c, l, a, r, i, t, y) {
    c[a] =
      c[a] ||
      function () {
        (c[a].q = c[a].q || []).push(arguments);
      };
    t = l.createElement(r);
    t.async = 1;
    t.src = 'https://www.clarity.ms/tag/' + i;
    y = l.getElementsByTagName(r)[0];
    y.parentNode.insertBefore(t, y);
  })(window, document, 'clarity', 'script', 'gkn6wuhrtb');
</script>