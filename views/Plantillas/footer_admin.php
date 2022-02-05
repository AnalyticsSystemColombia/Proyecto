
<footer>
    <h3 class="text-center">Siguenos en:</h3>
    <ul class="list-unstyled text-center">
        <a href="https://www.facebook.com/" class="social-icon all-elements-tooltip" data-toggle="tooltip" data-placement="bottom" title="Facebook">
            <img src="<?= media(); ?>iImagenes/social-facebook.png" alt="facebook-icon">
        </a>
        <a href="https://accounts.google.com/signin/v2/identifier?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="social-icon all-elements-tooltip" data-toggle="tooltip" data-placement="bottom" title="Google +">
        <!-- SHD -->
            <img src="<?= media(); ?>/imagenes/social-googleplus.png" alt="googleplus-icon">
        </a>
        <a href="https://co.linkedin.com/" class="social-icon all-elements-tooltip" data-toggle="tooltip" data-placement="bottom" title="Linkedin">
            <img src="<?= media(); ?>/imagenes/social-linkedin.png" alt="linkedin-icon">
        </a>
        <a href="https://co.pinterest.com/" class="social-icon all-elements-tooltip" data-toggle="tooltip" data-placement="bottom" title="Pinterest">
            <img src="<?= media(); ?>/imagenes/social-pinterest.png" alt="pinterest-icon">
        </a>
        <a href="https://twitter.com/" class="social-icon all-elements-tooltip" data-toggle="tooltip" data-placement="bottom" title="Twitter">
            <img src="<?= media(); ?>/imagenes/social-twitter.png" alt="twitter-icon">
        </a>
    </ul>
    <h5 class="text-center tittles-pages-logo">SISO &copy; 2021</h5>
</footer>


   <script>
        const base_url = "<?= base_url(); ?>";
        const  smony = "<?= SMONEY; ?>";
    </script>


    <!-- Essential javascripts for application to work-->
    <script src="<?= media(); ?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?= media(); ?>/js/popper.min.js"></script>
    <script src="<?= media(); ?>/js/bootstrap.min.js"></script>
    <script src="<?= media(); ?>/js/main.js"></script>
    <!-- <script src="<?= media(); ?>/js/annyang.main.js_2.6.1/cdnjs/annyang.min.js"></script> -->
    <script src="<?= media(); ?>/js/fontawesome.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= media(); ?>/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
     <script type="text/javascript" src="<?= media(); ?>/js/plugins/sweetalert.min.js"></script>
      <script type="text/javascript" src="<?= media(); ?>/js/tinymce/tinymce.min.js"></script>

    <!-- Data table plugin-->
    <script type="text/javascript" src="<?= media(); ?>/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= media(); ?>/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= media(); ?>/js/plugins/bootstrap-select.min.js"></script>
    
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
   
    <script src="<?= media();?>/js/datepicker/jquery-ui.min.js"></script>

    <script type="text/javascript" src="<?= media();?>/js/functions_admin.js"></script>
    <script src="<?= media(); ?>/js/<?= $data['page_functions_js']; ?>"></script>
  </body>
</html>

