<?php
    require_once('functions.php');
?>

<!DOCTYPE html>
<html>
<title className="Title">RJS2000</title>

<head>
<link rel="stylesheet" href="css/styles.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins&family=Roboto&display=swap');
</style>
<head>

<header class="header">

	<div class="text-box">
		<h1 class="heading-primary">
			<span class="heading-primary-main">RJS</span>
			<span class="heading-primary-sub">2000</span>
            <span class="heading-primary-sub">Randomizer</span>
		</h1>
	</div>
</header>

<section class="form section">
    <div class="form__container">

        <div class="form__content">
            <h3 class="form__title">Add persons</h3>
            <form action="tallenna.php" method="post">
                    <div>
                        <input type="text" name="nimi" required>
                        <button>Add</button>
                    </div>
            </form>

                <form action="index.php" method="GET">

                <div class="custom__select">
                    <select id="random-type" name="randomize-type">
                            <option value="members-per-team">Members per team</option>
                            <option 

                                <?php
                                if(strpos($_GET["randomize-type"], 'number-of-teams') !== false) {
                                    echo "selected";
                                }?> 

                            value="number-of-teams">Number of teams</option>
                        </select>
                </div>

                    <div class="input_area">
                    <input id="size" name="randomize" type=number min=1
                    value="<?php
                            if(isset($_GET["randomize"])){
                                echo $_GET["randomize"];
                            } else {
                                echo 1;
                        }?>">
                    </div>
                    <input id="randomize-btn" type="submit" value="Randomize">
                </form> 
        </div>

        <div class="nayta__osallistujat">
            <h3>Participants</h3>
        
        <?php
        include 'kaikki.php';
        ?>
        </div> 
</div>
</section>

    <div class="nayta__kaikki">
    <?php
        include 'nayta_kaikki.php';
        ?>
    <a href="poista_kaikki.php">Delete all</a>
    </div>

    <section class="teams__section">
        <div class="teams__container">
                <?php
                    //jos parametrit löytyvät urlista. Hae GetRandomPersons() ja kirjoita.
                    if(isset($_GET["randomize"]) && isset($_GET["randomize-type"])) {
                        Func::GetRandomPersons($_GET["randomize"], $_GET["randomize-type"]);
                    }
                ?>
    </div>
    </section>


    <div class="footer">
        <p> © Ville Varjus 2022</p>
        <a href="https://github.com/varvil">        
        <i class="uil uil-github-alt"></i>
                </a>
        </div>

</body>


</html>