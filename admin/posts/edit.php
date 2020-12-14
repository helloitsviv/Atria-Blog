<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php");
adminOnly();

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
        <link rel="stylesheet" href="../../assets/css/style.css">

          <!-- CSS-->
          <link rel="stylesheet" href="../../assets/css/admin.css">

        <title>Admin Section - Edit Post</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>

    <body>
       
        <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

       <!-- Admin Page Wrapper begins-->
       <div class="admin-wrapper">

            <!--Left Sidebar-->
            <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>

             <!--//Left Sidebar-->
 
            <!--Admin Content-->
            <div class="admin-content">
                <div class="button-group">
                    <a href="create.php" class="btn">Add Post</a>
                    <a href="index.php"  class="btn">Manage Posts</a>
                </div>


                <div class="content">
                    <h2 class="page-title">Edit Posts</h2>

                    <?php include(ROOT_PATH ."/app/helpers/formErrors.php"); ?>


                    <form action="edit.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $id ?>">

                    <div>
                            <label>Title</label>
                            <input type="text" name="title" value="<?php echo $title ?>" class="newtext-input">
                        </div>
                        <div>
                            <label>Body</label>
                           <textarea name="body" id="body"><?php echo $body ?></textarea>
                        </div>

                        <div>
                            <label>Image</label>
                            <input type="file" name="image" class="newtext-input">
                        </div>

                        <div>
                            <label>Topic</label>
                            <select name="topic_id" class="newtext-input">
                                <option value=""></option>

                                <?php foreach($topics as $key => $topic): ?>
                                    <?php if (!empty($topic_id) && $topic['id'] ): ?>

                                        <option selected value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>

                                    <?php else: ?>
                                        <option value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>


                                    <?php endif; ?>

                                <?php endforeach; ?>
                                
                            </select>
                        </div>
                        <div>
                            <?php if(empty($published) && $published == 0): ?>
                            <label>
                                <input type="checkbox" name="published">
                                Publish
                            </label>
                            <?php else: ?>
                                <input type="checkbox" name="published" checked>

                            <?php endif; ?>
                        </div>   

                        <div>
                            <button type="submit" name= "update-post" class="btn">Update Post</button>
                        </div>
                    </form>

                </div>
            </div>
            <!--//Admin Content-->

        </div>
            <!--Admin Page Wrapper ends-->        
         
          
         

       <!--JQUERY CDN-->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

       <!--ckeditor-->
       <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>


       <!--Custom Script-->
       <script src="../../assets/js/scripts.js"></script>
    </body>
</html>