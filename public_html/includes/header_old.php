<!DOCTYPE html>
<!-- includes/header.php -->

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/header.css">
    <script src="assets/js/header.js" defer></script>
    <title>COLLECTORWWII</title>
</head>

<body>
    <?php
    $currentUri = urldecode($_SERVER['REQUEST_URI']);
    $cleanUri = strtok($currentUri, '?');
    $huidigePagina = basename($cleanUri);
    $scriptNaam = basename($_SERVER['SCRIPT_NAME']);
    $isIndexPagina = $huidigePagina === '' || $huidigePagina === 'index.php' || $cleanUri === '/' || $scriptNaam === 'index.php';
    $isUserLoggedIn = (isset($_COOKIE['gebruiker']) && $_COOKIE['gebruiker'] === 'PeterDefoor');
    ?>

    <header class="fixed-header">
        <div class="navbar-primary">
            <div class="logo"><a href="index.php"><img src="assets/images/woii_collector.png" alt=""></a></div>
            <div class="link-container">
                <ul class="links">
                    <li><a href="blog.php"
                            class="<?php echo ($huidigePagina === 'blog.php') ? 'linkHeader actievePagina' : 'linkHeader'; ?>">Blog</a>
                    </li>
                    <li><a href="for_sale.php"
                            class="<?php echo ($huidigePagina === 'for_sale.php') ? 'linkHeader actievePagina' : 'linkHeader'; ?>">For
                            sale</a>
                    </li>
                    <li><a href="map.php"
                            class="<?php echo ($huidigePagina === 'map.php') ? 'linkHeader actievePagina' : 'linkHeader'; ?>">Map</a>
                    </li>
                    <li><a href="contact.php"
                            class="<?php echo ($huidigePagina === 'contact.php') ? 'linkHeader actievePagina' : 'linkHeader'; ?>">Contact</a>
                    </li>
                </ul>
                <span class="pipe">|</span>
                <ul class="links">
                    <?php if ($isUserLoggedIn) { ?>
                        <li><a href="account_page.php"><i class="fa-regular fa-user fa-lg icon"></i></a></li>
                        <li><i class="fa-solid fa-arrow-right-from-bracket fa-lg pad icon" onclick="logoutUser()"></i></li>
                    <?php } else { ?>
                        <li><i class="fa-solid fa-arrow-right-to-bracket fa-lg pad icon" onclick="showLoginPopup()"></i>
                        </li>
                    <?php } ?>
                    <?php if ($isUserLoggedIn) { ?>
                        <li><button class="pad icon" id="muteButton"></button>
                        </li>
                    <?php } ?>

                </ul>
            </div>
            <div class="toggle_btn">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>

        <div class="navbar-secondary">
            <ul class="links">
                <?php if ($isUserLoggedIn) { ?>
                    <li class="dropdown">
                        <span
                            class="dropdown-toggle <?php echo ($huidigePagina === 'books_per_photo.php' || $huidigePagina === 'add_book.php') ? 'linkHeader actievePagina' : 'linkHeader'; ?>">Books</span>
                        <ul class="dropdown-menu">
                            <li><a href="books_per_photo.php">Overview</a></li>
                            <li><a href="add_book.php">Add</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <span
                            class="dropdown-toggle <?php echo ($huidigePagina === 'items_per_photo.php' || $huidigePagina === 'add_item.php') ? 'linkHeader actievePagina' : 'linkHeader'; ?>">Items</span>
                        <ul class="dropdown-menu">
                            <li><a href="items_per_photo.php">Overview</a></li>
                            <li><a href="add_item.php">Add</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <span
                            class="dropdown-toggle <?php echo ($huidigePagina === 'newspapers_per_photo.php' || $huidigePagina === 'add_newspaper.php') ? 'linkHeader actievePagina' : 'linkHeader'; ?>">Newspapers</span>
                        <ul class="dropdown-menu">
                            <li><a href="newspapers_per_photo.php">Overview</a></li>
                            <li><a href="add_newspaper.php">Add</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <span
                            class="dropdown-toggle <?php echo ($huidigePagina === 'magazines.php' || $huidigePagina === 'add_magazine.php') ? 'linkHeader actievePagina' : 'linkHeader'; ?>">
                            Magazines
                        </span>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="overview-magazines">Overview</a>
                                <ul class="sub-dropdown-menu">
                                    <li><a href="magazines.php">WW2 period</a></li>
                                    <li><a href="magazines.php">Present day</a></li>
                                </ul>
                            </li>
                            <li><a href="add_magazine.php">Add</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <span
                            class="dropdown-toggle <?php echo ($huidigePagina === 'banknotes.php' || $huidigePagina === 'add_banknote.php') ? 'linkHeader actievePagina' : 'linkHeader'; ?>">Banknotes</span>
                        <ul class="dropdown-menu">
                            <li><a href="banknotes.php">Overview</a></li>
                            <li><a href="add_banknote.php">Add</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <span
                            class="dropdown-toggle <?php echo ($huidigePagina === 'coins.php' || $huidigePagina === 'add_coin.php') ? 'linkHeader actievePagina' : 'linkHeader'; ?>">Coins</span>
                        <ul class="dropdown-menu">
                            <li><a href="coins.php">Overview</a></li>
                            <li><a href="add_coin.php">Add</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <span
                            class="dropdown-toggle <?php echo ($huidigePagina === 'postcards.php' || $huidigePagina === 'add_postcard.php') ? 'linkHeader actievePagina' : 'linkHeader'; ?>">Postcards</span>
                        <ul class="dropdown-menu">
                            <li><a href="postcards.php">Overview</a></li>
                            <li><a href="add_postcard.php">Add</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <span
                            class="dropdown-toggle <?php echo ($huidigePagina === 'stamps.php' || $huidigePagina === 'add_stamp.php') ? 'linkHeader actievePagina' : 'linkHeader'; ?>">Stamps</span>
                        <ul class="dropdown-menu">
                            <li><a href="stamps.php">Overview</a></li>
                            <li><a href="add_stamp.php">Add</a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li><a href="books_per_photo.php"
                            class="<?php echo ($huidigePagina === 'books_per_photo.php') ? 'linkHeader actievePagina' : 'linkHeader'; ?>">Books</a>
                    </li>
                    <li><a href="items_per_photo.php"
                            class="<?php echo ($huidigePagina === 'items_per_photo.php') ? 'linkHeader actievePagina' : 'linkHeader'; ?>">Items</a>
                    </li>
                <?php } ?>
            </ul>
        </div>

        <div class="dropdown_menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="books.php">Books</a></li>
            <li><a href="items.php">Items</a></li>
            <li><a href="map.php">Map</a></li>
            <li><a href="contact.php">Contact</a></li>
            <?php
            if (isset($_COOKIE['gebruiker']) && $_COOKIE['gebruiker'] === 'PeterDefoor') {
                echo '<li><a href="account_page.php"><i class="fa-regular fa-user fa-lg" id="icon"></i></a></li>';
                echo '<li><i class="fa-solid fa-arrow-right-from-bracket fa-lg" id="icon" onclick="logoutUser()"></i></li>';
            } else {
                echo '<li><i class="fa-solid fa-arrow-right-to-bracket fa-lg" id="icon" onclick="showLoginPopup()"></i></li>';
            }
            ?>
        </div>
    </header>

    <div id="loginPopup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closeLoginPopup()"><i class="fas fa-times"></i></span>
            <form id="loginForm" onsubmit="return loginUser()">
                <div class="container-info">
                    <label for="username">Username:</label>
                    <input type="text" id="username" required autocomplete="username">

                    <label for="password">Password:</label>
                    <input type="password" id="password" required>

                    <button type="submit">Log In</button>
                    <label>
                        <input type="checkbox" checked="checked" name="remember">Remember me</label>
                </div>

                <!-- <div class="container">
                    <span class="register"><a href="#">Register</a></span>
                    <span class="psw"><a href="#">Forgot password?</a></span>
                </div> -->
            </form>
            <div id="loginMessage"></div>
        </div>
        <div id="logoutPopup" class="popup">
            <div class="popup-content">
                <span class="close" onclick="document.getElementById('logoutPopup').style.display='none'"><i
                        class="fas fa-times"></i></span>
                You Logged out!
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var muteButton = document.getElementById('muteButton');
            var audioElements = [];
            var currentAudioIndex = parseInt(localStorage.getItem('currentAudioIndex')) || 0;

            var isMuted = localStorage.getItem('isMuted') === 'true';

            if (isMuted) {
                muteButton.innerHTML = '<i class="fa-solid fa-volume-xmark fa-lg" id="icon" style="color: #ffffff;"></i>';
            } else {
                muteButton.innerHTML = '<i class="fa-solid fa-volume-high fa-lg" id="icon" style = "color: #ffffff;" ></i >';
            }

            var audioSources = [
                { src: 'assets/audio/ww2-uk-air-raid-bomb-blasts.mp3', type: 'audio/mpeg' },
                { src: 'assets/audio/erika.mp3', type: 'audio/mpeg' },
                { src: 'assets/audio/Westerwaldlied.mp3', type: 'audio/mpeg' },
                { src: 'assets/audio/Drei_Lilien.mp3', type: 'audio/mpeg' },
                { src: 'assets/audio/Morgen_marschieren_wir.mp3', type: 'audio/mpeg' }
            ];

            audioSources.forEach(function (source) {
                var audio = new Audio();
                audio.src = source.src;
                audio.type = source.type;
                audio.addEventListener('ended', function () {
                    currentAudioIndex = (currentAudioIndex + 1) % audioSources.length;
                    localStorage.setItem('currentAudioIndex', currentAudioIndex);
                    playCurrentAudio();
                });
                audioElements.push(audio);
            });

            muteButton.addEventListener('click', function () {
                var isMuted = localStorage.getItem('isMuted') === 'true';
                if (!isMuted) {
                    audioElements.forEach(function (audio) {
                        audio.muted = true;
                    });
                    muteButton.innerHTML = '<i class="fa-solid fa-volume-xmark fa-lg" id="icon" style="color: #ffffff;"></i>';
                    localStorage.setItem('isMuted', true);
                } else {
                    audioElements.forEach(function (audio) {
                        audio.muted = false;
                    });
                    muteButton.innerHTML = '<i class="fa-solid fa-volume-high fa-lg" id="icon" style = "color: #ffffff;" ></i >';
                    localStorage.setItem('isMuted', false);
                }
            });

            function playCurrentAudio() {
                var isMuted = localStorage.getItem('isMuted') === 'true';
                audioElements.forEach(function (audio) {
                    audio.pause();
                });
                audioElements[currentAudioIndex].play();
                if (isMuted) {
                    audioElements[currentAudioIndex].muted = true;
                }
            }

            playCurrentAudio();
        });
    </script>
</body>

</html>