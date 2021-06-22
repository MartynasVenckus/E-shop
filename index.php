<?php require 'config.php'; ?>
<?php include_once 'database/connection.php'; ?>
<?php include 'database/queries.php'; ?>

<!DOCTYPE html>
<html lang="en">

<?php include 'partials/head.php';?>

<body>
    
    <?php include 'partials/navigation.php';?>

    <?php
        
        $man = "SELECT * FROM preke WHERE preke.fk_lytisid = 1 LIMIT 5";
        $woman = "SELECT * FROM preke WHERE preke.fk_lytisid = 2 LIMIT 5";
        $kid = "SELECT * FROM preke WHERE preke.fk_lytisid = 3 LIMIT 5";
        $news = "SELECT * FROM naujienos LIMIT 3";
        $basketballNames = "SELECT * FROM preke WHERE preke.fk_kategorijaid = 2 LIMIT 5";
        $freetimeNames = "SELECT * FROM preke WHERE preke.fk_kategorijaid = 1 LIMIT 5";
        $runningNames = "SELECT * FROM preke WHERE preke.fk_kategorijaid = 6 LIMIT 5";
       

        $manShoes = mysqli_query($conn, $man);
        $womanShoes = mysqli_query($conn, $woman);
        $kidShoes = mysqli_query($conn, $kid);
        $newsMain = mysqli_query($conn, $news);
        $newsMain = mysqli_query($conn, $news);
        $bbShoes = mysqli_query($conn, $basketballNames);
        $freetimeShoes = mysqli_query($conn, $freetimeNames);
        $runningShoes = mysqli_query($conn, $runningNames);

    ?>


    <div id="hero" class="margin-bot"></div>

    <section id="categories" class="margin-bot">
        <h2 class="align-center margin-bot">Atrask norimą avalynę!</h2>
        <div class="container-fluid w-70">
            <div class="row">
                <div class="shoe-container2">
                    <div class="col-xs-12 col-lg-3 mb-5 bg-image-2">
                        <p class="mb-3 title">BĖGIMUI</p>
                        <?php while($row = mysqli_fetch_array($runningShoes)) : ?>
                            <a class="d-block mb-2 text-color" href="/Projektas/pages/saleItem.php?id=<?= $row['id']?>"><?= $row['pavadinimas']?></a>
                        <?php endwhile; ?>
                    </div>
                    <div class="col-x class= s-12 col-lg-3 mb-4 bg-image-1">
                        <p class="mb-3 title">LAISVALAIKIUI</p>
                        <?php while($row = mysqli_fetch_array($freetimeShoes)) : ?>
                            <a class="d-block mb-2 text-color" href="/Projektas/pages/saleItem.php?id=<?= $row['id']?>"><?= $row['pavadinimas']?></a>
                        <?php endwhile; ?>
                    </div>
                    <div class="col-xs-12 col-lg-3 mb-4 bg-image-3">
                        <p class="mb-3 title">KREPŠINIUI</p>
                        <?php while($row = mysqli_fetch_array($bbShoes)) : ?>
                            <a class="d-block mb-2 text-color" href="/Projektas/pages/saleItem.php?id=<?= $row['id']?>"><?= $row['pavadinimas']?></a>
                        <?php endwhile; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>


       

    <section id="man" class="">
        <h2 class="align-center margin-bot">Geriausi sezono pasiūlymai!</h2>
        <div class="container-fluid w-90 mt-2">
            <h3 class="inline">Vyram</h3>
            <a href="" class="btn-link align-right" target="_blank">Daugiau &#8594;</a>
            <div class="row">
                <div id="shoe-container1" class="shoe-container">
                <?php while($row = mysqli_fetch_array($manShoes)) : ?>
                    <div class="shoe-card margin-r col-xs-12">
                        <a href="/Projektas/pages/saleItem.php?id=<?= $row['id']?>"><img src="<?= $row['paveikslelis']?>" alt="" class="shoe-img"> </a>
                        <div class="card-body">
                        <p class="shoe-description">
                            <a href="/Projektas/pages/saleItem.php?id=<?= $row['id']?>"><?= $row['pavadinimas']?></a>
                         </p>
                            <p class="price"><?= $row['kaina']?> Eur</p>
                        </div>
                    </div>
                <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="woman" class="">
        <div class="container-fluid w-90">
            <h3 class="inline">Moterim</h3>
            <a href="" class="btn-link align-right" target="_blank">Daugiau &#8594;</a>
            <div class="row">
                <div id="shoe-container1" class="shoe-container">
                <?php while($row = mysqli_fetch_array($womanShoes)) : ?>
                    <div class="shoe-card margin-r col-xs-12">
                        <a href="/Projektas/pages/saleItem.php?id=<?= $row['id']?>"><img src="<?= $row['paveikslelis']?>" alt="" class="shoe-img"> </a>
                        <div class="card-body">
                        <p class="shoe-description">
                            <a href="/Projektas/pages/saleItem.php?id=<?= $row['id']?>"><?= $row['pavadinimas']?></a>
                        </p>
                            <p class="price"><?= $row['kaina']?> Eur</p>
                        </div>
                    </div>
                <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
    <section id="kid" class="margin-bot">
        <div class="container-fluid w-90">
            <h3 class="inline">Vaikam</h3>
            <a href="" class="btn-link align-right" target="_blank">Daugiau &#8594;</a>
            <div class="row">
                <div id="shoe-container1" class="shoe-container">
                <?php while($row = mysqli_fetch_array($kidShoes)) : ?>
                    <div class="shoe-card margin-r col-xs-12">
                        <a href="/Projektas/pages/saleItem.php?id=<?= $row['id']?>"><img src="<?= $row['paveikslelis']?>" alt="" class="shoe-img"> </a>
                        <div class="card-body">
                        <p class="shoe-description">
                            <a href="/Projektas/pages/saleItem.php?id=<?= $row['id']?>"><?= $row['pavadinimas']?></a>
                        </p>
                            <p class="price"><?= $row['kaina']?> Eur</p>
                        </div>
                    </div>
                <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="blog-main">
        <h2 class="align-center margin-bot">Blog'as</h2>
        <div class="container-fluid w-90">
            <div class="row d-flex justify-content-center">
                <div id="b-shoe-container1" class="b-shoe-container">
                <?php while($row = mysqli_fetch_array($newsMain)) : ?>
                    <div class="b-shoe-card  col-12 col-lg-4">
                        <a href="/Projektas/pages/blogItem.php?id=<?= $row['id']?>"><img src="<?= $row['paveikslelis']?>" alt="" class="b-shoe-img"> </a>
                        <div class="b-card-body">
                            <a href="/Projektas/pages/blogItem.php?id=<?= $row['id']?>" class="b-shoe-title"><?=$row['pavadinimas']?></a>
                            <p class="b-shoe-description">
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




    <?php include 'partials/footer.php';?>

</body>

</html>