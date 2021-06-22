<?php include_once '/xampp/htdocs/Projektas/database/connection.php'; ?>

    <?php
        
        $cate = "SELECT * FROM kategorija";
        $allCate = mysqli_query($conn, $cate);
        $allCate2 = mysqli_query($conn, $cate);
        $allCate3 = mysqli_query($conn, $cate);
    
    ?>

<nav id="nav-bar" class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/Projektas/index.php">
            <div class="logo"></div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                              Vyrams
                            </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php while($row = mysqli_fetch_array($allCate)) : ?>
                        <a class="dropdown-item" href="/Projektas/pages/sale.php?categoryURL=<?= $row['id']?>&genderURL=1"><?= $row['pavadinimas']?></a>
                        <?php endwhile; ?>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                                  Moterims
                                </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php while($row = mysqli_fetch_array($allCate2)) : ?>
                        <a class="dropdown-item" href="/Projektas/pages/sale.php?categoryURL2=<?= $row['id']?>&genderURL2=2"><?= $row['pavadinimas']?></a>
                        <?php endwhile; ?>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                                      Vaikams
                                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php while($row = mysqli_fetch_array($allCate3)) : ?>
                        <a class="dropdown-item" href="/Projektas/pages/sale.php?categoryURL3=<?= $row['id']?>&genderURL3=3"><?= $row['pavadinimas']?></a>
                        <?php endwhile; ?>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/Projektas/pages/sale.php">Parduotuvė</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Projektas/pages/blog.php">Blog'as</a>
                </li>
                
                <li>
                    
                        <a href="#" class="shopping-cart"><i class="text-dark fas fa-shopping-cart fa-2x"></i></a>
                   
                </li>
                <li>
                    
                        <a href="#" class="user"><i class="text-dark fas fa-user fa-2x"></i></a>
                  
                </li>
                
            </ul>

        </div>
    </nav>