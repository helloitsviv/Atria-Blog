<header>
           <a href="<?php echo BASE_URL . '/index.php' ?>" class="logo">
               <h1 class="logo-text"><span>Atria Blog</span></h1>
            </a>    

           <i class="fa fa-bars menu-toggle"></i>

           <ul class="nav">
               <li><a href="<?php echo BASE_URL . '/index.php' ?>">Home</a></li>
               <li><a href="#">Gallery</a></li>
               <li><a href="#">News</a></li>
               <li><a href="#">About</a></li>

               <?php if (isset($_SESSION['id'])): ?>     <!--checking if the user is logged in-->
                <li>
                   <a href="#">
                       <i class="fa fa-user"></i>
                        <?php echo $_SESSION['username']; ?>
                       <i class="fa fa-chevron-down" style = "font-size: 12px"></i>
                    </a>
                   <ul>
                       <?php if($_SESSION['admin']): ?>
                        <li><a href="<?php echo BASE_URL . '/admin/dashboard.php' ?>">Dashboard</a></li>
                       <?php endif; ?>
                       <li><a href="<?php echo BASE_URL . '/logout.php' ?>" class="logout">Logout</a></li>
                   </ul>
                </li>
               <?php else: ?>  <!--if user not logged in-->
                    <li><a href="<?php echo BASE_URL . '/register.php' ?>">Sign Up</a></li>
                    <li><a href="<?php echo BASE_URL . '/login.php' ?>">Login</a></li>
               <?php endif; ?>

           </ul>
       </header>