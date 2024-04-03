<!-- datatable Js -->
<script src="{{ url('assets') }}/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ url('assets') }}/js/plugins/dataTables.min.js"></script>
<script src="{{ url('assets') }}/js/plugins/dataTables.bootstrap5.min.js"></script>
<script src="{{ url('assets') }}/js/plugins/dataTables.responsive.min.js"></script>
<script src="{{ url('assets') }}/js/plugins/responsive.bootstrap5.min.js"></script>
<script>
    // [ Configuration Option ]
    $('#res-config').DataTable({
        responsive: true
    });

    // [ New Constructor ]
    var newcs = $('#new-cons').DataTable();

    new $.fn.dataTable.Responsive(newcs);

    // [ Immediately Show Hidden Details ]
    $('#show-hide-res').DataTable({
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: ''
            }
        }
    });
</script>
<!-- [Page Specific JS] start -->
<script src="{{ url('assets') }}/js/plugins/apexcharts.min.js"></script>
<script src="{{ url('assets') }}/js/pages/dashboard-default.js"></script>
<!-- [Page Specific JS] end -->
<!-- Required Js -->
<script src="{{ url('assets') }}/js/plugins/popper.min.js"></script>
<script src="{{ url('assets') }}/js/plugins/simplebar.min.js"></script>
<script src="{{ url('assets') }}/js/plugins/bootstrap.min.js"></script>
<script src="{{ url('assets') }}/js/fonts/custom-font.js"></script>
<script src="{{ url('assets') }}/js/pcoded.js"></script>
<script src="{{ url('assets') }}/js/plugins/feather.min.js"></script>

<script>
     layout_change('light');
</script>

<script>
     layout_theme_contrast_change('false');
</script>

<script>
     change_box_container('false');
</script>

<script>
     layout_caption_change('true');
</script>

<script>
     layout_rtl_change('false');
</script>

<script>
     preset_change("preset-1");
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
     integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
     crossorigin="anonymous" referrerpolicy="no-referrer">
</script>

<!-- [Page Specific JS] end -->
