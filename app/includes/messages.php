<?php if(isset($_SESSION['message'])): ?>
        <div class="msg <?php echo $_SESSION['type']; ?>">
            <li><?php echo $_SESSION['message']; ?></li>
            <?php
                unset($_SESSION['message']);  //destroying after they are displayed once
                unset($_SESSION['type']);
            ?>
        </div> 
    <?php endif; ?>