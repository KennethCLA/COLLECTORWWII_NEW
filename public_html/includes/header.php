<?php
// includes/header.php

$isUserLoggedIn = isset($_COOKIE['gebruiker']) && $_COOKIE['gebruiker'] === 'PeterDefoor';

$currentPage = basename($_SERVER['PHP_SELF']);

function isCurrentPage($currentPage, $link)
{
    return ($currentPage === $link) ? 'current' : '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COLLECTORWWII</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/header.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/header.js" defer></script>
</head>

<body>
    <header class="main-header">
        <div class="top-header">
            <div class="logo">
                <a href="index.php"><img src="assets/images/woii_collector.png" alt="Logo"></a>
            </div>
            <nav class="top-nav">
                <ul>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="for_sale.php">For sale</a></li>
                    <li><a href="map.php">Map</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
            <div class="divider"></div>
            <?php if ($isUserLoggedIn) { ?>
                <div class="account-container">
                    <div class="account"><a href="account_page.php"><i class="fas fa-user-alt"></i></a></div>
                    <div class="logout"><i class="fas fa-sign-out-alt" onclick="logoutUser()"></i>
                    </div>
                    <div class="music" id="muteButton"><i class="fas fa-volume-up"></i></div>
                </div>
            <?php } else { ?>
                <div class="login"><i class="fas fa-sign-in-alt" onclick="showLoginPopup()"></i>
                <?php } ?>
            </div>
        </div>
    </header>

    <header class="secondary-header">
        <nav class="secondary-nav">
            <ul>
                <?php if ($isUserLoggedIn) { ?>
                    <li class="<?php echo isCurrentPage($currentPage, 'books.php'); ?>">
                        Books
                        <ul class="dropdown">
                            <li><a href="books.php">Overview</a></li>
                            <li><a href="add_book.php">Add</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo isCurrentPage($currentPage, 'items.php'); ?>">
                        Items
                        <ul class="dropdown">
                            <li><a href="items.php">Overview</a></li>
                            <li><a href="add_item.php">Add</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo isCurrentPage($currentPage, 'newspapers.php'); ?>">
                        Newspapers
                        <ul class="dropdown">
                            <li><a href="newspapers.php">Overview</a></li>
                            <li><a href="add_newspaper.php">Add</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo isCurrentPage($currentPage, 'magazines.php'); ?>">
                        Magazines
                        <ul class="dropdown">
                            <li class="has-submenu">
                                <a href="#">Overview <i class="fas fa-chevron-right"></i></a>
                                <ul class="sub-dropdown">
                                    <li><a href="magazines.php">WW2 period</a></li>
                                    <li><a href="magazines.php">Present day</a></li>
                                </ul>
                            </li>
                            <li><a href="add_magazine.php">Add</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo isCurrentPage($currentPage, 'banknotes.php'); ?>">
                        Banknotes
                        <ul class="dropdown">
                            <li><a href="banknotes.php">Overview</a></li>
                            <li><a href="add_banknote.php">Add</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo isCurrentPage($currentPage, 'coins.php'); ?>">
                        Coins
                        <ul class="dropdown">
                            <li><a href="coins.php">Overview</a></li>
                            <li><a href="add_coin.php">Add</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo isCurrentPage($currentPage, 'postcards.php'); ?>">
                        Postcards
                        <ul class="dropdown">
                            <li><a href="postcards.php">Overview</a></li>
                            <li><a href="add_postcard.php">Add</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo isCurrentPage($currentPage, 'stamps.php'); ?>">
                        Stamps
                        <ul class="dropdown">
                            <li><a href="stamps.php">Overview</a></li>
                            <li><a href="add_stamp.php">Add</a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li class="<?php echo isCurrentPage($currentPage, 'books.php'); ?>"><a href="books.php">Books</a></li>
                    <li class="<?php echo isCurrentPage($currentPage, 'items.php'); ?>"><a href="items.php">Items</a></li>
                <?php } ?>
            </ul>
        </nav>
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
                </div>
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
                muteButton.innerHTML = '<i class="fas fa-volume-mute"></i>';
            } else {
                muteButton.innerHTML = '<i class="fas fa-volume-up"></i>';
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
                    muteButton.innerHTML = '<i class="fas fa-volume-mute"></i>';
                    localStorage.setItem('isMuted', true);
                } else {
                    audioElements.forEach(function (audio) {
                        audio.muted = false;
                    });
                    muteButton.innerHTML = '<i class="fas fa-volume-up"></i>';
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