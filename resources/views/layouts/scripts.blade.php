<script src="{{ asset('assets/plugins/common/common.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.min.js') }}"></script>
<script src="{{ asset('assets/js/settings.js') }}"></script>
<script src="{{ asset('assets/js/gleek.js') }}"></script>
<script src="{{ asset('assets/js/styleSwitcher.js') }}"></script>

<!-- Chartjs -->
<script src="{{ asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
<!-- Circle progress -->
<script src="{{ asset('assets/plugins/circle-progress/circle-progress.min.js') }}"></script>
<!-- Datamap -->
<script src="{{ asset('assets/plugins/d3v3/index.js') }}"></script>
<script src="{{ asset('assets/plugins/topojson/topojson.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datamaps/datamaps.world.min.js') }}"></script>
<!-- Morrisjs -->
<script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>
<!-- Pignose Calender -->
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pg-calendar/js/pignose.calendar.min.js') }}"></script>
<!-- ChartistJS -->
<script src="{{ asset('assets/plugins/chartist/js/chartist.min.js') }}"></script>
<script src="{{ asset('assets/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}"></script>
<script src="{{ asset('assets/js/dashboard/dashboard-1.js') }}"></script>
<script src="{{ asset('assets/plugins/toastr/js/toastr.min.js') }}"></script>
<script src="{{ asset('assets/plugins/toastr/js/toastr.init.js') }}"></script>
<script src="https://kit.fontawesome.com/c5c335f5bf.js" crossorigin="anonymous"></script>
<script>
    // Get the message from your session data
    var toasterMessage = "{{ session('success') }}";

    // Define the default message type and position
    var messageType = "success";
    var positionClass = "toast-top-right";

    // Check if there was an error message
    @if (session('error'))
        toasterMessage = "{{ session('error') }}";
        messageType = "error";
    @endif

    // Display the notification based on the message type
    toastr.options = {
        "positionClass": positionClass,
    };

    if (toasterMessage) {
        if (messageType === "success") {
            toastr.success(toasterMessage);
        } else if (messageType === "error") {
            toastr.error(toasterMessage);
        }
    }
</script>