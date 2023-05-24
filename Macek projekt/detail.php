<?php
$layout=[
    "0"=>[
        "engine" => "1.4 mpi",
        "doors" => "5",
        "disc"=>"16 inches",
        "ac" => "yes",
        "radio" => "yes"
    ],
    "1"=>[
    "engine" => "1.2 htp",
        "doors" => "5",
    "disc"=>"15 inches",
    "ac" => "no",
    "radio" => "yes"
    ]
]
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once 'parts/header.php'?>
<body class="about-page">



<section class="templatemo-top-section">
    <?php include_once 'parts/body_header.php' ?>
</section>

<div class="about-container">

    <div class="about-container-left">
        <img src="<?php echo $_GET['img'];?>" alt="Image" class="img-responsive" width="400" height="400">
    </div>

    <div class="about-container-right">
        <h2 class="about-title"><?php echo $_GET['name'];?></h2>
        <p class="about-description"><strong>Price: $ <?php echo $_GET['price'] ?></strong></p>
        <p class="about-description">Engine: <?php echo $layout[$_GET['layout']]["engine"] ?></p>
        <p class="about-description">Number of doors: <?php echo $layout[$_GET['layout']]["doors"] ?></p>
        <p class="about-description">AC: <?php echo $layout[$_GET['layout']]["ac"] ?></p>
        <p class="about-description">Radio: <?php echo $layout[$_GET['layout']]["radio"] ?></p>
        <p class="about-description">Wheel disc size: <?php echo $layout[$_GET['layout']]["disc"] ?></p>
    </div>

</div>

<?php include_once "parts/footer.php"?>
