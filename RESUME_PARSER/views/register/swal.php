<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="../../js/sweetalert.min.js"></script>
<?php
if(isset($_SESSION['status']) && isset($_SESSION['status_code'])!= '')
{
    ?>
<script>
Swal.fire({
  icon: '<?php echo $_SESSION['status_code']; ?>',
  title: "<?php echo $_SESSION['status']; ?>",
  text: 'Use your new password to login ',
  button:"OK"
})



</script>
<?php
unset($_SESSION['status']);
}

?>
