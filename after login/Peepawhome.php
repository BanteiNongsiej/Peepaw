

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PeepawHome</title>
    <link rel="stylesheet" href="Peepawhome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <?php
    //include auth_session.php file on all user panel pages
    // include("../../../php/session_start.php");
    session_start();
    require("../../../php/database_connect.php");
    ?>
    <nav>
    <div class="body-content">
        <div class="logo"><img src="../peepaw3_logo.png"></div>
        <div class="useroption">
            <div class="option">
                <a href="petdataform.html"><i class="fa-solid fa-user-plus"></i>SELL</a>
            </div>
            <div class="dropbox" >
                    <div  class="menu" id="drop">
                        <a href="#">
                            <i class="fa-solid fa-bars"></i>
                        </a>
                    </div>
                    <div class="sub-menu" id="sub_menu_id">  
                        <ul>
                            <li><a href="#"><i class="fa-solid fa-user"></i>My Account</a></li>
                        </ul>
                        <ul>
                           <a href="#"><i class="fa-solid fa-heart"></i>Wishlists</a>
                        </ul>
                        <ul>
                            <a href="#"><i class="fa-solid fa-rectangle-ad"></i> My Ads</a>
                         </ul>
                        <hr>
                        <ul>
                            <a href="#"><i class="fa-solid fa-gear"></i>Settings</a>
                        </ul>
                        <ul>
                            <a href="#"><i class="fa-solid fa-ban"></i>About</a>
                        </ul>
                        <ul>
                            <a href="#"><i class="fa-solid fa-id-card"></i>Contact Us</a>
                        </ul>
                        <ul>
                            <a href="#"><i class="fa-solid fa-comment-dots"></i>Feedback</a>
                        </ul>
                        <hr>
                        <ul>
                            <a href="../php/logout.php"><i class="fa-solid fa-right-from-bracket"></i>Sign Out</a>
                        </ul> 
                </div> 
            </div>
        </div>  
    </div>
    </nav>
    <div class="main">
        <h1>Welcome to Peepaw</h1>
        <h2>BEST PET LOVER COMMUNITY</h2>
        <div class="search-contain">
            <table class="element-contain">
                <tr>
                    <td>
                        <input type="text" placeholder="Search" class="search">
                    </td>
                    <td>
                        <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="product">
        <?php 
            $query = "SELECT * FROM `pets`";
            $result = mysqli_query($conn, $query) or die(mysql_error($conn));
            if(!$result){
                echo "Something went wrong";
                return;
            }
            $pets = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach($pets as $pet){
        ?>
        <?php
            echo $pet['image1'];
        ?>
        <div class="first_row">
            <div class="box">
                <a href="pet_details.php">
                <img src=<?php echo $pet['image1'];?>>
                <hr>
                <h1><?php echo $pet['species'];?></h1>
                <p><?php echo $pet['price'];?></p>
                <div class="time">
                    <h4><?php echo $pet['breed'];?></h4>
                    <p>Today</p>
                </div>
            </a>
            </div>
            <!-- <div class="box">
                <a href="#">
                <img src="../images/persian cat/persian cat.jpg">
                <hr>
                <h1>Cat</h1>
                <p>₹15,000</p>
                <div class="time">
                    <h4>Persian</h4>
                    <p>1 Hours ago</p>
                </div>
            </a>
            </div>
                <div class="box">
                <a href="product.html">
                <img src="../images/bulldog/bulldog1.jpg">
                <hr>
                <h1>Dog</h1>
                <p>₹26,000</p>
                <div class="time">
                    <h4>Bulldog</h4>
                    <p>Yesterday</p>
                </div>
            </a>
            </div>
            <div class="box">
                <a href="#">
                <img src="../images/german shepherd/german shepherd1.jpg">
                <hr>
                <h1>Dog</h1>
                <p>₹35,000</p>
                <div class="time">
                    <h4>German Shephard</h4>
                    <p>2 hours ago</p>
                </div>
            </a>
            </div>
        </div>
        <div class="first_row">
            <div class="box">
                <a href="#">
                <img src="../images/rex rabbit/rexrabbit1.jpg">
                <hr>
                <h1>Rabbit</h1>
                <p>₹32,000</p>
                <div class="time">
                    <h4>Rex rabbit</h4>
                    <p>Today</p>
                </div>
            </a>
            </div>
            <div class="box">
                <a href="#">
                <img src="../images/yorkshire/yorkshire1.jpg">
                <hr>
                <h1>Dog</h1>
                <p>₹20,000</p>
                <div class="time">
                    <h4>Yorkshire</h4>
                    <p>1 minute ago</p>
                </div>
            </a>
            </div>
            <div class="box">
                <a href="#">
                <img src="../images/british shorthair/british chorthair.jpg">
                <hr>
                <h1>Cat</h1>
                <p>₹26,000</p>
                <div class="time">
                    <h4>British Shorthair</h4>
                    <p>Yesterday</p>
                </div>
            </a>
            </div>
            <div class="box">
                <a href="#">
                <img src="../images/labrador retriever/labrador retriever1.png">
                <hr>
                <h1>Dog</h1>
                <p>₹48,000</p>
                <div class="time">
                    <h4>Labrador</h4>
                    <p>5 hours ago</p>
                </div>
             </a>
            </div>
        </div>
        <div class="first_row">
            <div class="box">
                <a href="#">
                <img src="../images/van cat/van cat1.jpg">
                <hr>
                <h1>Cat</h1>
                <p>₹35,000</p>
                <div class="time">
                    <h4>Van Cat</h4>
                    <p>Today</p>
                </div>
            </a>
            </div>
            <div class="box">
                <a href="#">
                <img src="../images/chichuahua/chihuahua1.jpg">
                <hr>
                <h1>Dog</h1>
                <p>₹56,000</p>
                <div class="time">
                    <h4>Chihuahua</h4>
                    <p>1 Hours ago</p>
                </div>
            </a>
        </div> -->
    </div>
    <?php
    }
        ?>
    <script>
        console.log("loaded")
        let drop = document.getElementById('drop');
        console.log(drop)
        let sub_menu_id = document.getElementById('sub_menu_id');
        console.log(sub_menu_id)
        drop.addEventListener('click',()=>{
            sub_menu_id.classList.toggle('block_div')
        });

    </script>
</body>
</html>