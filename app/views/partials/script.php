<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/protonet-jquery.inview/1.1.2/jquery.inview.min.js"></script>

<!-- JS -->
<script src="<?= ROOT ?>/assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= ROOT ?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= ROOT ?>/assets/plugins/toastr/toastr.min.js"> </script>
<link rel="stylesheet" href="<?= ROOT ?>/assets/plugins/toastr/toastr.min.css" />
<script>
    toastr.options = {
        closeButton: false,
        debug: false,
        newestOnTop: false,
        progressBar: false,
        positionClass: 'toast-top-right',
        preventDuplicates: false,
        onclick: null,
        showDuration: '300',
        hideDuration: '1000',
        timeOut: '5000',
        extendedTimeOut: '1000',
        showEasing: 'swing',
        hideEasing: 'linear',
        showMethod: 'fadeIn',
        hideMethod: 'fadeOut',
    }
</script>