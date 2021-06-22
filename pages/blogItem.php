<?php require '../config.php'; ?>
<?php include_once '../database/connection.php'; ?>

<!DOCTYPE html>
<html lang="en">

<?php include '../partials/head.php';?>

<body>

<?php include '../partials/navigation.php';?>

<?php

            $id = $_GET["id"];
            
            $blog = "SELECT * FROM naujienos WHERE naujienos.id = $id";
            $allBlogs = mysqli_query($conn, $blog); 

?>

                        <div class="container-fluid">
                            <div class="row b-shoe-container justify-content-center">

                            <?php while($row = mysqli_fetch_array($allBlogs)) : ?>
                                    <div class="b-shoe-card-2  col-12 col-lg-8 r">
                                        <a href=""><img src="<?= $row['paveikslelis']?>" alt="" class="b-shoe-img-2"> </a>
                                        <div class="b-card-body">
                                        <div class="row text-center justify-content-center p-0 mb-2">
                                            <a href="" class="b-shoe-title mb-3"><?= $row['pavadinimas']?></a>
                                        </div>
                                            <p><?= $row['aprasymas']?></p>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>







<?php include '../partials/footer.php';?>
    
</body>
</html>