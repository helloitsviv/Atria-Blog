<?php
 include("path.php"); 
 include(ROOT_PATH . "/app/controllers/topics.php"); 
//  $posts = selectAll('posts', ['published' => 1]);  //to fetch all posts in the database where publish is set to true

 $posts = array();
$postsTitle = 'Recent Posts';

if(isset($_GET['t_id'])) {
    $posts = getPostsByTopicId($_GET['t_id']);
    $postsTitle = "You searched for posts under '" . $_GET['name'] . "'";
} else if(isset($_POST['search-term'])) {
     $postsTitle = "You searched for '" . $_POST['search-term'] . "'";
     $posts = searchPosts($_POST['search-term']);
 } else {
    $posts = getPublishedPosts();
 }


 ?>
<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <!--font awesome-->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        
        <!--Google Fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400&family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,500&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&family=Raleway:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Rosarivo&display=swap" rel="stylesheet">

        <!-- CSS-->
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Atria Blog</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>

    <body>
      
    <?php include(ROOT_PATH . "/app/includes/header.php");?>           <!--will point to the include file that contains the header-->
    <?php include(ROOT_PATH . "/app/includes/messages.php");?>           <!--will point to the include file that contains the header-->

   

       <!--Page Wrapper begins-->
       <div class="page-wrapper">

            <!--Post Slider begins-->
            <div class="post-slider">
                <h1 class="slider-title">Trending Posts</h1>
                <i class="fa fa-chevron-left prev" aria-hidden="true"></i>
                <i class="fa fa-chevron-right next" aria-hidden="true"></i>
               
                <div class="post-wrapper">

                    <?php foreach ($posts as $post): ?>
                        <div class="post">
                            <img src="<?php echo BASE_URL . '/assets/images/' . $post['image'];?>" alt="" class="slider-image">
                            <div class="post-info">
                                <h4><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h4>
                                <div class= "icons">
                                    <i class="far fa-user"><em> Suhena</em></i>
                                    &nbsp; &nbsp;
                                    <i class="far fa-calendar"><em><?php echo date(' F j, Y', strtotime($post['created_at'])) ?></em></i>
                                </div>  
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!--Post Slider ends-->
             <!--Content begins-->
            <div class="content clearfix"> <!--using clearfix to clear the float bc otherwise the height of the content will be zero otherwise, 0 bc the elements within are floated-->

                <!--Main Content begins-->
                 <div class="main-content">
                    <h1 class="recent-post-title"><?php echo $postsTitle ?></h1>

                    <!--First post-->
                    <?php foreach ($posts as $post): ?>
                        <div class="post clearfix">
                        <img src="<?php echo BASE_URL . '/assets/images/' . $post['image'];?>" alt="" class="post-image">
                        <div class="post-preview">
                            <h2><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
                            <div class="icons">
                                <i class="far fa-user"><em> Viviana</em></i>
                            &nbsp; &nbsp;
                            <i class="far fa-calendar"> <em> <?php echo date(' F j, Y', strtotime($post['created_at'])) ?></em></i>
                            </div>
                            
                            <p class="preview-text">
                                <?php echo html_entity_decode(substr($post['body'], 0 ,150) . '...') ?>
                            </p>
                            <!-- <a href="single.html" class="btn">Read More</a> -->
                            <button class="btn read-more"><a href="single.php?id=<?php echo $post['id']; ?>">Read More</a></button>
                        </div>
                    </div>

                    <?php endforeach; ?>
                </div>
                 <!--Main Content ends-->
                <div class="sidebar">

                    <div class="section search">
                        <h2 class="section-title"></h2>
                        <form action="index.php" method="post">
                            <input type="text" name="search-term" class="text-input" placeholder="Search..">
                        </form>
                    </div>

                    <div class="section topics">
                        <h2 class="section-title">Topics</h2>
                        <ul>
                            
                        <?php foreach($topics as $key => $topic): ?>
                            <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name'];?></a></li>
                        <?php endforeach; ?>

                            
                        </ul>
                    </div>
                </div>
            </div>
            
            
            <!--Content ends-->

            <!--Page Wrapper ends-->        
         
            <?php include(ROOT_PATH . "/app/includes/footer.php");?>           <!--will point to the include file that contains the header-->

        

         

       <!--JQUERY CDN-->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!--Slick Carousel-->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

       <!--Custom Script-->
       <script src="assets/js/scripts.js"></script>
    </body>
</html>