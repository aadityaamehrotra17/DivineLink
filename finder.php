<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>final</title>
    <script>
        (function() {

            // JavaScript snippet handling Dark/Light mode switching

            const getStoredTheme = () => localStorage.getItem('theme');
            const setStoredTheme = theme => localStorage.setItem('theme', theme);
            const forcedTheme = document.documentElement.getAttribute('data-bss-forced-theme');

            const getPreferredTheme = () => {

                if (forcedTheme) return forcedTheme;

                const storedTheme = getStoredTheme();
                if (storedTheme) {
                    return storedTheme;
                }

                const pageTheme = document.documentElement.getAttribute('data-bs-theme');

                if (pageTheme) {
                    return pageTheme;
                }

                return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            }

            const setTheme = theme => {
                if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    document.documentElement.setAttribute('data-bs-theme', 'dark');
                } else {
                    document.documentElement.setAttribute('data-bs-theme', theme);
                }
            }

            setTheme(getPreferredTheme());

            const showActiveTheme = (theme, focus = false) => {
                const themeSwitchers = [].slice.call(document.querySelectorAll('.theme-switcher'));

                if (!themeSwitchers.length) return;

                document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                    element.classList.remove('active');
                    element.setAttribute('aria-pressed', 'false');
                });

                for (const themeSwitcher of themeSwitchers) {

                    const btnToActivate = themeSwitcher.querySelector('[data-bs-theme-value="' + theme + '"]');

                    if (btnToActivate) {
                        btnToActivate.classList.add('active');
                        btnToActivate.setAttribute('aria-pressed', 'true');
                    }
                }
            }

            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                const storedTheme = getStoredTheme();
                if (storedTheme !== 'light' && storedTheme !== 'dark') {
                    setTheme(getPreferredTheme());
                }
            });

            window.addEventListener('DOMContentLoaded', () => {
                showActiveTheme(getPreferredTheme());

                document.querySelectorAll('[data-bs-theme-value]')
                    .forEach(toggle => {
                        toggle.addEventListener('click', (e) => {
                            e.preventDefault();
                            const theme = toggle.getAttribute('data-bs-theme-value');
                            setStoredTheme(theme);
                            setTheme(theme);
                            showActiveTheme(theme);
                        })
                    })
            });
        })();
    </script>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/swiper-icons.css">
    <link rel="stylesheet" href="assets/css/Banner-Heading-Image-images.css">
    <link rel="stylesheet" href="assets/css/Navbar-With-Button-icons.css">
    <link rel="stylesheet" href="assets/css/Pricing-Duo-badges.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider-swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<?php
    session_start();
    if (!(isset($_SESSION['user'])) || $_SESSION['user'] == ""){
        header("Location: signup.php");
        exit;
    }
    if(!(isset($_SESSION['religion'])) || $_SESSION['religion'] == ""){
        header("Location: route.php");
    }
?>
<body>
    <nav class="navbar navbar-expand-md sticky-top bg-body py-3" style="background: rgb(255, 255, 255);">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="home.php"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon" style="background: rgba(13,110,253,0);"><img src="assets/img/logo.png" width="50" height="50"></span><span style="width: 97px;">Divine Link</span></a><button class="navbar-toggler" data-bs-toggle="collapse"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <!--<div style="float: right;" class="theme-switcher dropdown"><a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-sun-fill mb-1">
                        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"></path>
                    </svg></a>
                <div class="dropdown-menu"><a class="dropdown-item d-flex align-items-center" href="#" data-bs-theme-value="light"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-sun-fill opacity-50 me-2">
                            <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"></path>
                        </svg>Light</a><a class="dropdown-item d-flex align-items-center" href="#" data-bs-theme-value="dark"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-moon-stars-fill opacity-50 me-2">
                            <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278"></path>
                            <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"></path>
                        </svg>Dark</a><a class="dropdown-item d-flex align-items-center" href="#" data-bs-theme-value="auto"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-half opacity-50 me-2">
                            <path d="M8 15A7 7 0 1 0 8 1zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16"></path>
                        </svg>Auto</a></div>
            </div>-->
            <?php
            echo("<div class=\"row align-items-center\">
                    <div class=\"col text-center\"><a href=\"finder.php\"><button class=\"btn btn-primary\" type=\"button\" style=\"background: rgba(13,110,253,0);color: rgb(108,111,113);border-style: none;\">{$_SESSION['name']}</button></a></div>
                    <div class=\"col-auto\"><a href=\"signout.php\"><button class=\"btn btn-dark\" type=\"button\">Sign Out</button></a></div>
                </div>");
            ?>
        <?php
        /*if (!(isset($_SESSION['user'])) || $_SESSION['user'] == ""){
            echo("<a href=\"signup.php\"><button class=\"btn btn-primary\" type=\"button\" style=\"padding-left: 16px;margin-left: -16px;background: transparent;border-style: none;color: var(--swiper-theme-color);\">Get Started&nbsp;<i class=\"fas fa-chevron-right\" style=\"font-size: 17px;\"></i></button></a>");
        }else{
            //echo("<p class=\"ms-auto\">{$_SESSION['name']}</p><a href=\"signout.php\"><button class=\"btn btn-dark ms-2\" type=\"button\">Sign Out</button></a>");
            echo("<div class=\"row align-items-center\">
                      <div class=\"col text-center\">{$_SESSION['name']}</div>
                      <div class=\"col-auto\"><a href=\"signout.php\"><button class=\"btn btn-dark\" type=\"button\">Sign Out</button></a></div>
                  </div>");
        }*/
        ?>
        </div>
    </nav>
    <section class="py-4 py-xl-5">
        <div class="container">
            <div class="text-white bg-primary border rounded border-0 border-primary d-flex flex-column justify-content-between flex-lg-row p-4 p-md-5">
                <div class="pb-2 pb-lg-1">
                    <h2 class="fw-bold mb-2">Divinity Finder</h2>
                    <p class="mb-0">View religious places nearby and get involved with what's happening.</p>
                </div>
                <div class="my-2"><a class="btn btn-light fs-5 py-2 px-4" role="button" href="#" data-bs-target="#offcanvas-list" data-bs-toggle="offcanvas">Search</a></div>
            </div>
        </div>
    </section>
    <div class="offcanvas offcanvas-start" tabindex="-1" data-bs-backdrop="false" id="offcanvas-list">
        <div class="offcanvas-header"><a class="link-body-emphasis d-flex align-items-center me-md-auto mb-3 mb-md-0 text-decoration-none" href="/"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-globe me-3" style="font-size: 25px;">
                    <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472M3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933M8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4z"></path>
                </svg><span class="fs-4">Manchester, UK</span></a><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="offcanvas"></button></div>
        <div class="offcanvas-body d-flex flex-column justify-content-between p-0">
            <div>
                <hr class="my-0">
                <div class="list-group list-group-flush border-bottom scrollarea"><a class="list-group-item list-group-item-action active py-3 lh-tight" href="#" aria-current="true">
                        <div class="d-flex justify-content-between align-items-center w-100"><strong class="mb-1">Central Mosque</strong><small>Open</small></div>
                        <div class="col-10 mb-1 small"><span>20 Upper Park Rd, M14 5RU</span></div>
                    </a><a class="list-group-item list-group-item-action py-3 lh-tight" href="#">
                        <div class="d-flex justify-content-between align-items-center w-100"><strong class="mb-1">The Muslim Youth Foundation</strong><small class="text-muted">Open</small></div>
                        <div class="col-10 mb-1 small"><span>2 Great Southern St, M14 4EZ</span></div>
                    </a><a class="list-group-item list-group-item-action py-3 lh-tight" href="#">
                        <div class="d-flex justify-content-between align-items-center w-100"><strong class="mb-1">Anwaar ul Haramain Jame Masjid</strong><small class="text-muted">Open</small></div>
                        <div class="col-10 mb-1 small"><span>230 Plymouth Grove, M13 0AS</span></div>
                    </a><a class="list-group-item list-group-item-action py-3 lh-tight" href="#" aria-current="true">
                        <div class="d-flex justify-content-between align-items-center w-100"><strong class="mb-1">Didsbury Central Mosque</strong><small class="text-muted">Closed</small></div>
                        <div class="col-10 mb-1 small"><span>5 Sidney St, M1 7HB</span></div>
                    </a><a class="list-group-item list-group-item-action py-3 lh-tight" href="#">
                        <div class="d-flex justify-content-between align-items-center w-100"><strong class="mb-1">Alfurqan Islamic Centre</strong><small class="text-muted">Open</small></div>
                        <div class="col-10 mb-1 small"><span>272 Dickenson Rd, Longsight, M13 0YL</span></div>
                    </a><a class="list-group-item list-group-item-action py-3 lh-tight" href="#">
                        <div class="d-flex justify-content-between align-items-center w-100"><strong class="mb-1">Abu Bakar Mosque</strong><small class="text-muted">Closed</small></div>
                        <div class="col-10 mb-1 small"><span>347-349 Stockport Rd, Longsight, M13 0LF</span></div>
                    </a><a class="list-group-item list-group-item-action py-3 lh-tight" href="#" aria-current="true">
                        <div class="d-flex justify-content-between align-items-center w-100"><strong class="mb-1">Markaz Al-Taqwa Mosque</strong><small class="text-muted">Closed</small></div>
                        <div class="col-10 mb-1 small"><span>39 Upper Lloyd St, M14 4HY</span></div>
                    </a><a class="list-group-item list-group-item-action py-3 lh-tight" href="dashboard.php">
                        <div class="d-flex justify-content-between align-items-center w-100"><strong class="mb-1">Victoria Mosque</strong><small class="text-muted">Open</small></div>
                        <div class="col-10 mb-1 small"><span>1A Eileen Grove, M14 5WE</span></div>
                    </a></div>
            </div>
        </div>
    </div><iframe allowfullscreen="" frameborder="0" loading="lazy" src="https://www.google.com/maps/embed/v1/place?key=YOUR_API_KEY&zoom=10&q=Manchester,UK" width="100%" height="400"></iframe>
    <footer class="text-center">
        <div class="container text-muted py-4 py-lg-5">
            <ul class="list-inline">
                <li class="list-inline-item me-4"><a href="https://en-gb.facebook.com/" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"></path>
                        </svg></a></li>
                <li class="list-inline-item me-4"><a href="https://twitter.com/?lang=en" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-twitter">
                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15"></path>
                        </svg></a></li>
                <li class="list-inline-item"><a href="https://www.instagram.com/" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-instagram">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"></path>
                        </svg></a></li>
            </ul>
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Simple-Slider-swiper-bundle.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>