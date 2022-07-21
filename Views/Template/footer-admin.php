<!-- Archvios JavaScripts para el uso del sistema-->
<script>
  //Asignacion de la ruta del proyecto a la constante base_url
  const base_url = "<?=base_url();?>";

</script>
    <script src="<?=media();?>js/jquery-3.3.1.min.js"></script>
    <script src="<?=media();?>js/popper.min.js"></script>
    <script src="<?=media();?>js/bootstrap.min.js"></script>
    <script src="<?=media();?>js/main.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>



<script src="<?=media();?>js/fontawesome.js"></script>
    <script src="<?=media();?>js/functions_admin.js"></script>
    <!-- Archivos de plugins para la pagina -->


    <!-- Archvivos javascripts para las alertas-->


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Archivos para las tablas de datos plugin-->


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/date-1.1.0/datatables.min.js"></script>
    <script type="text/javascript" src="<?=media();?>js/functions_admin.js"></script>

    <!-- Archivo para la ejecucion del archivo de funciones roles-->
     <script src="<?=media();?>js/<?=$data['page_functions_js'];?>"></script>
    <footer>
  <div class="text-center p-3 estilo_footer" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2021 Copyright: Universidad de Guayaquil - FCMF - Ing. Software - Contrucción de Software - Grupo #2
  </div>
  </footer>
  </body>
</html>

// EOF