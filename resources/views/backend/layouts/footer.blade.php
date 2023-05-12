<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>{{ config('global.site_name') }}</span></strong>. All Rights Reserved | Designed by <a href="https://www.noblecontracts.com" target="_blank">Noble Contracts</a>
    </div>
    <div class="credits">

     {{ config('global.site_name') }} . {{ date('Y') }}
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset ('backend/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset ('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset ('backend/vendor/chart.js/chart.min.js') }}"></script>
  <script src="{{ asset ('backend/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset ('backend/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset ('backend/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset ('backend/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('backend/js/main.js') }}"></script>

</body>

</html>