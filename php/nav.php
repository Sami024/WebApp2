<nav>
    <h1>

    </h1>
    <div class="link-row">
        <a href="index.php">Home</a>
        <a href="over-ons.php">Over ons</a>
        <a href="contact.php">Contact</a>
        <a href="voorwaarden.php">Voorwaarden</a>
        <?php 
            if (isset($_POST['logout'])) {
                session_destroy();
                header('index.php');
                echo "<a href='login.php'>Login</a>";
            } else if (isset($_SESSION['inlogid'])) {
                $result = $conn->query("SELECT * FROM accounts WHERE id=".$_SESSION['inlogid']);
                $result = $result->fetch();
                echo "<div id='accountButton'>Account
                <div id='accountOptions'>
                    <h3>Account</h3>
                    <a href='mijn-reizen.php' class='Navboeken'>Boekingen</a>
                    <a href='mandje.php' class='Navwinkelmand'>Mandje</a>";
                    if ($result['isadmin'] == 1) {
                        echo "<a href='admin-tussenstop.php'>Admin panel</a>'";
                    }
                    echo "
                    <form method='post'>
                    <input type='submit' name='logout' value='Logout'>
                    </form>
                    
                </div>
                </div>";
            } else {
                echo "<a href='login.php'>Login</a>";
            }
        ?>
    </div>


</nav>