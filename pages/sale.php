<?php require '../config.php'; ?>
<?php include_once '../database/connection.php'; ?>

<!DOCTYPE html>
<html lang="en">

<?php include '../partials/head.php';?>

<body>
<?php include '../partials/navigation.php';?>



                
<?php       
        $cat = "SELECT * FROM kategorija";
        $gen = "SELECT * FROM lytis";
        $br = "SELECT * FROM prekes_zenklas";
        $all = "SELECT * FROM preke";

        // parduotuvės filtravimas
        if(isset($_GET["category"])){
            $category = $_GET["category"];
            $catProd = "SELECT * FROM preke WHERE preke.fk_kategorijaid = $category";
            $categoryProducts = mysqli_query($conn, $catProd); 
        }
        if(isset($_GET["gender"])){
            $gender = $_GET["gender"];
            $genProd = "SELECT * FROM preke WHERE preke.fk_lytisid = $gender";
            $genderProducts = mysqli_query($conn, $genProd); 
        }
        if(isset($_GET["brand"])){
            $brand = $_GET["brand"];
            $brProd = "SELECT * FROM preke WHERE preke.fk_prekeszenklasid = $brand";
            $brandProducts = mysqli_query($conn, $brProd); 
        }
        if(isset($_POST["nuo"]) && isset($_POST["iki"])){
            $nuo = $_POST["nuo"];
            $iki = $_POST["iki"];
            $priceProd = "SELECT * FROM preke WHERE preke.kaina >= $nuo AND preke.kaina <= $iki";
            $priceProducts = mysqli_query($conn, $priceProd); 
        }


        // iš navigation
        if(isset($_GET["categoryURL"]) && isset($_GET["genderURL"])){
            $categoryURL = $_GET["categoryURL"];
            $genderURL = $_GET["genderURL"];
            $catProdURL = "SELECT * FROM preke WHERE preke.fk_kategorijaid = $categoryURL AND preke.fk_lytisid = $genderURL";
            $categoryProductsURL = mysqli_query($conn, $catProdURL); 
        }
        if(isset($_GET["categoryURL2"]) && isset($_GET["genderURL2"])){
            $categoryURL2 = $_GET["categoryURL2"];
            $genderURL2 = $_GET["genderURL2"];
            $catProdURL2 = "SELECT * FROM preke WHERE preke.fk_kategorijaid = $categoryURL2 AND preke.fk_lytisid = $genderURL2";
            $categoryProductsURL2 = mysqli_query($conn, $catProdURL2); 
        }
        if(isset($_GET["categoryURL3"]) && isset($_GET["genderURL3"])){
            $categoryURL3 = $_GET["categoryURL3"];
            $genderURL3 = $_GET["genderURL3"];
            $catProdURL3 = "SELECT * FROM preke WHERE preke.fk_kategorijaid = $categoryURL3 AND preke.fk_lytisid = $genderURL3";
            $categoryProductsURL3 = mysqli_query($conn, $catProdURL3); 
        }



        $categoryNames = mysqli_query($conn, $cat); 
        $genderNames = mysqli_query($conn, $gen); 
        $brandNames = mysqli_query($conn, $br); 
        $allProducts = mysqli_query($conn, $all); 
        
?>
  

    <section id="sales">
        <h2 class="align-center margin-bot mt-5">Parduotuvė</h2>
        <div class="row" style="margin: 0;">

            <div class="col-12 col-lg-3">
                <div class="container-fluid">
                    <div class="accordion" id="accordionExample" style="padding: 0;">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne">
                                        Kategorija
                                      </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <?php while($row = mysqli_fetch_array($categoryNames)) : ?>
                                        <a class="d-block" href="./sale.php?category=<?= $row['id']?>"><?= $row['pavadinimas']?></a>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                                        Lytis
                                      </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                <?php while($row = mysqli_fetch_array($genderNames)) : ?>
                                        <a class="d-block" href="./sale.php?gender=<?= $row['id']?>"><?= $row['pavadinimas']?></a>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree">
                                        Prekės ženklas
                                      </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                <?php while($row = mysqli_fetch_array($brandNames)) : ?>
                                        <a class="d-block" href="./sale.php?brand=<?= $row['id']?>"><?= $row['pavadinimas']?></a>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour">
                                            Kaina
                                          </button>
                                </h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form action="sale.php" method="post">
                                        <div class="form-group">
                                            <label for="nuo">Nuo</label>
                                            <input type="number" class="form-control" id="nuo" name="nuo">
                                        </div>
                                        <div class="form-group">
                                            <label for="iki">Iki</label>
                                            <input type="number" class="form-control" id="iki" name="iki">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Ieškoti</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               
                                    
                        

            </div>
            <div class="col-12 col-lg-9">
                <div class="container-fluid">
                    <section id="blog-main">
                        <div class="container-fluid">
                            <div class="row d-flex b-shoe-container">
                              
                            <?php
                                if(isset($_GET["category"])){
                                    $variable = $categoryProducts;
                                }
                                else if(isset($_GET["gender"])){
                                    $variable = $genderProducts;
                                }
                                else if(isset($_GET["brand"])){
                                    $variable = $brandProducts;
                                }
                                else if(isset($_POST["nuo"]) && isset($_POST["iki"])){
                                    $variable = $priceProducts;
                                }
                                else if(isset($_GET["categoryURL"]) && isset($_GET["genderURL"])){
                                    $variable = $categoryProductsURL;
                                }
                                else if(isset($_GET["categoryURL2"]) && isset($_GET["genderURL2"])){
                                    $variable = $categoryProductsURL2;
                                }
                                else if(isset($_GET["categoryURL3"]) && isset($_GET["genderURL3"])){
                                    $variable = $categoryProductsURL3;
                                }
                                else{
                                    $variable = $allProducts;
                                }

                            ?>
                                <?php while($row = mysqli_fetch_array($variable)) : ?>
                                    <div class="b-shoe-card  col-12 col-lg-3">
                                        <a href="/Projektas/pages/saleItem.php?id=<?= $row['id']?>"><img src="<?= $row['paveikslelis']?>" alt="" class="b-shoe-img"> </a>
                                        <div class="b-card-body">
                                            <a href="/Projektas/pages/saleItem.php?id=<?= $row['id']?>" class="b-shoe-title"><?= $row['pavadinimas']?></a>
                                            <p class="price pl-3">
                                                <?= $row['kaina']?> Eur
                                            </p>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                                
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

    </section>

    <?php include '../partials/footer.php';?>

</body>

</html>