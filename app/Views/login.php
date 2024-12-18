<!DOCTYPE html>
<html lang="en">
    <?php include APPPATH . "Views/layouts/head.php"; ?>
    <body style="background: linear-gradient(to right, #0C56A6, #36AE7C);background-size: cover;">
        <div class="wrapper">
            <section class="content">               
                <?php 
                    if ($page_content) {
                        echo view($page_content);
                    }
                ?>                
            </section>
        </div>
        <?php include APPPATH . "Views/layouts/js.php" ?>
    </body>
</html>


