<?php
$session = session();
$username = $session->get('username');
$namalengkap = $session->get('namalengkap');
$role = $session->get('role');
switch ($role) {
  case 1:
      $session_role = 'administrator';
      break;
  case 2:
      $session_role = 'Kepala Stasiun';
      break;
  case 3:
      $session_role = 'observer';
      break;
  default:
      $session_role = '/';
      break;
} 
?>
<!DOCTYPE html>
<html>
  <?php include APPPATH . "Views/layouts/head.php"; ?>

  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?php include APPPATH . "Views/layouts/navbar.php" ?>
      <?php include APPPATH . "Views/layouts/sidebar.php" ?>
      <div class="content-wrapper">
        <?php include APPPATH . "Views/layouts/breadcrumb.php" ?>
        
        <section class="content">
        <!-- Map container -->
          

        <?php 
            if ($page_content) {
                echo view($page_content);
            } else {
                echo "Lagi bermasalah";
            }
        ?>
    </section>
      </div>
      <footer class="main-footer">
        <?php include APPPATH . "Views/layouts/footer.php" ?>
      </footer>
      <aside class="control-sidebar control-sidebar-dark">
      </aside>
    </div>
    <?php include APPPATH . "Views/layouts/js.php" ?>
  </body>
</html>
