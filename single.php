<?php include("path.php"); ?>           <!--will point to the include file that contains the header-->
<?php include(ROOT_PATH . '/app/controllers/posts.php');

if(isset($_GET['id'])) {
    $post = selectOne('posts', ['id' => $_GET['id']]);
}

$topics = selectAll('topics');
$posts = selectAll('posts', ['published' => 1]);


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
        <title><?php echo $post['title']; ?> |Atria Blog</title> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>

    <body>

        <!--Facebook page plugin-->
        <div id="fb-root">
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v9.0" nonce="nN7zkt6F"></script>
        </div>
        <?php include(ROOT_PATH . "/app/includes/header.php");?>           <!--will point to the include file that contains the header-->


       <!--Page Wrapper begins-->
         <div class="page-wrapper">

             <!--Content begins-->
            <div class="content clearfix"> <!--using clearfix to clear the float bc otherwise the height of the content will be zero otherwise, 0 bc the elements within are floated-->

                <!--Main Content begins-->
            <div class="main-content-wrapper">
               <div class="main-content single">
                    <h1 class="post-title"><?php echo $post['title']; ?></h1>

                    <div class="post-content">
                        <?php echo html_entity_decode($post['body']); ?>
                    </div>
               </div>
            </div>
                 <!--Main Content ends-->
                 <!--Sidebar begins-->
                <div class="sidebar single">


                    <div class="fb-page" data-href="https://www.facebook.com/atria.edu" data-tabs="" data-width="38" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/atria.edu" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/atria.edu">Atria Institute of Technology</a></blockquote></div>

                    <div class="section popular">
                        <h2 class="section-title">Popular</h2>

                        <?php foreach ($posts as $p): ?>
                            <div class="post clearfix">
                                <img src="<?php echo BASE_URL . '/assets/images/' . $p['image']; ?>" alt="">
                                <a href="single.php?id=<?php echo $p['id']; ?>" class="title">
                                    <h4><?php echo $p['title'] ?></h4>
                                </a>
                            </div>
                        <?php endforeach; ?>

                    </div>



                    <!-- <div class="section topics">
                        <h2 class="section-title">Topics</h2>
                        <ul>
                            <?php foreach ($topics as $topic): ?>
                                <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"></a></li>
                            <?php endforeach; ?>  
                            
                        </ul>
                    </div> -->
                </div>

                <!--sidebar ends-->
            </div>
     </div>
            
            
            <!--Content ends-->

           <!--Page Wrapper ends-->        
         
            <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>           <!--will point to the include file that contains the header-->

        

         

       <!--JQUERY CDN-->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!--Slick Carousel-->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

       <!--Custom Script-->
       <script src="assets/js/scripts.js"></script>
    </body>
</html>