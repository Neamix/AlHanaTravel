<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('editor/summernote.js') }}"></script>
<!-- Page level plugin JavaScript-->
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('vendor/jquery.magnific-popup.min.js') }}"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset('js/admin/component.js') }}"></script>
<script src="{{ asset('js/admin/admin.js') }}"></script>
<script src="{{ asset('js/admin/initFunc.js') }}"></script>
<script src="{{ asset('js/admin/paginator.js') }}"></script>
<!-- Custom scripts for this page-->
@yield('script')