<div style='padding-top:1em;' class='container'>
  <div class='row text-center text-primary'>
    <p>www.kjdworks.com</p>
    <?php echo Date("Y",filectime($filename));?>
  </div>
</div>
<script>
 $(document).ready(function(){
   $("table.table").DataTable({
     "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
   });
 });
</script>
