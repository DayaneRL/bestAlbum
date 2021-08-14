 <!--   Core JS Files   -->
 <script src="../../assets/js/core/popper.min.js"></script>
 <script src="../../assets/js/core/bootstrap.min.js"></script>
 <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
 <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
 <script src="../../assets/js/plugins/chartjs.min.js"></script>
 
 <script>
   var win = navigator.platform.indexOf('Win') > -1;
   if (win && document.querySelector('#sidenav-scrollbar')) {
     var options = {
       damping: '0.5'
     }
     Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
   }
 </script>
 <!-- Github buttons -->
 <script async defer src="https://buttons.github.io/buttons.js"></script>
 <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
 <script src="../../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>

 <script src="../../assets/js/jquery-3.5.1.min.js"></script>

 <script>
  $(document).ready(function(){
      setTimeout(function(){ $('.alert').fadeTo(2000, 500).slideUp(500) }, 1000);
  })
</script>