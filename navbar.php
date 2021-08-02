<?php
    // note, must use styles.css for now
    $admin = "";
    if(isset($_SESSION["email"])) {
        $logoutOrRegister = "<a href='logout.php'>Log out</a>";
        
        if($_SESSION["is_admin"] === "1") {
            $admin = "<li class = 'right-nav'>
                    <a href='admin.php'>Admin Panel</a>
                </li>";
        }
    }
    else
        $logoutOrRegister = "<a href='login.php'>Log in/Register</a>";

    echo '
        <div class="top-banner">
            <nav>
                <a href="index.php">
                    <!-- Temporary icon until having a company one -->
                    <img src="imgs/search-icon.png" />
                </a>
                <ul>
                    <li>
                        <a href="termsOfUse.php">Terms of Use</a>
                    </li>

                    <li>
                        <a href="siteDescription.php">Site Description</a>
                    </li>

                    <li>
                        <a href="aboutUs.php">About us</a>
                    </li> ' .

                    $admin . 

                    '<li class="right-nav"> ' .
                        $logoutOrRegister . 
                    '</li>

                    <li class="right-nav">
                        <a href="create.php">Create Post</a>
                    </li>

                    <li class="right-nav">
                        <a href="profile.php">Profile</a>
                    </li>
                </ul>
            </nav>
        </div>
    ';
?>