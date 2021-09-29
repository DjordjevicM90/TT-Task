
<div id="header">
    <?php 
        if(!login())        /* If user not login show this bellow */
        {
    ?>
        <div id="home"><a href = "index.php">HOME</a></div>
        <button type="button" id="btn-login">LOGIN</button>
    <?php
    }
    else                    /* If user login show this bellow */
    {
    ?>
        <div id="home"><a href = "index.php">HOME</a></div>
        <div id="favorites"><a href = "favorites.php">FAVORITES</a></div>
    <?php
    }
    ?>
    
</div>