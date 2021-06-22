<?php require '../config.php'; ?>
<?php include_once '../database/connection.php'; ?>

<!DOCTYPE html>
<html lang="en">


<?php include '../partials/head.php';?>
<body>

<?php include '../partials/navigation.php';?>

<?php       
        $dbNews = "SELECT * FROM naujienos";

        $allNews = mysqli_query($conn, $dbNews); 
?>

    <section id="blog">
        <h2 class="align-center margin-bot mt-5">Blog'as</h2>
        <div class="container-fluid w-90">
            <div class="row d-flex justify-content-center">
                <div id="blog-shoe-container1" class="blog-shoe-container">

                <?php while($row = mysqli_fetch_array($allNews)) : ?>
                    <div class="blog-shoe-card  col-12 col-lg-3">
                        <a href="/Projektas/pages/blogItem.php?id=<?= $row['id']?>"><img src="<?= $row['paveikslelis']?>" alt="" class="blog-shoe-img"> </a>
                        <div class="blog-card-body">
                            <a  href="/Projektas/pages/blogItem.php?id=<?= $row['id']?>" class="blog-shoe-title"><?= $row['pavadinimas']?></a>
                            <p class="blog-shoe-description">
                            <?= substr($row['aprasymas'], 0, 123)?>
                            <?php if (strlen($row['aprasymas']) > 123) echo ' ...' ?>  
                            </p>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>


   <?php include '../partials/footer.php';?>

</body>

</html>