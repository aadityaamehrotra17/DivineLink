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
    <script src="assets/js/pray_calendar.js" defer></script>
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
        <?php
           echo("<div class=\"row align-items-center\">
                    <div class=\"col text-center\"><a href=\"finder.php\"><button class=\"btn btn-primary\" type=\"button\" style=\"background: rgba(13,110,253,0);color: rgb(108,111,113);border-style: none;\">{$_SESSION['name']}</button></a></div>
                    <div class=\"col-auto\"><a href=\"signout.php\"><button class=\"btn btn-dark\" type=\"button\">Sign Out</button></a></div>
                </div>");
        ?>
    </div>
    </nav>
    <div class="simple-slider" style="height: 500px;">
        <div class="swiper-container" style="height: 500px;margin: 0px;padding: 0px;">
            <div class="swiper-wrapper" style="height: 500px;">
                <div class="swiper-slide" style="background: url(&quot;https://lh3.googleusercontent.com/p/AF1QipNxPfxW8fo3KnLqKNiJzvTNP5GQSyzd-xyBA2tw=s1360-w1360-h1020&quot;) center center / cover no-repeat;">
                    <h1 style="background: linear-gradient(135deg, rgba(0,0,0,0.5), rgba(255,255,255,0));height: auto;border-style: none;padding-left: 10px;color: var(--bs-body-bg);">Victoria Mosque</h1>
                </div>
                <div class="swiper-slide" style="background: url(&quot;https://lh3.googleusercontent.com/p/AF1QipPHH3yMd5jITxQFxhb26dMUX4_E4HEVFWCyd9SV=s1360-w1360-h1020&quot;) center center / cover no-repeat;">
                    <h1 style="background: linear-gradient(135deg, rgba(0,0,0,0.5), rgba(255,255,255,0));height: auto;border-style: none;padding-left: 10px;color: var(--bs-body-bg);">Victoria Mosque</h1>
                </div>
                <div class="swiper-slide" style="background: url(&quot;https://lh3.googleusercontent.com/p/AF1QipMw_Wg4dZM2TPiBwcVeJOtcAXffE-lpJWtOpU1N=s1360-w1360-h1020&quot;) center center / cover no-repeat;">
                    <h1 style="background: linear-gradient(135deg, rgba(0,0,0,0.5), rgba(255,255,255,0));height: auto;border-style: none;padding-left: 10px;color: var(--bs-body-bg);">Victoria Mosque</h1>
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="modal-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Latest Updates</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="list-group list-group-flush border-bottom scrollarea"><a class="list-group-item list-group-item-action py-3 lh-tight" href="https://www.facebook.com/photo/?fbid=814746010695791&amp;set=a.644069407763453&amp;__cft__[0]=AZWXHsEVkWK2RTO4OKrDvKaTVfeG2vPBWZvqULOEv3WhrVKtEetjEKkmHF-WLEIoLve4frjIq0VscedhI8FwQdFEvdzMXrgA4mc7MNQGpILpEBLDHATjHHmmmi2t84ggozdWWjqIDMQwDTLAbD-1DC2UZeIN6MhlWpp1kqavImXRQEn4wwmG2OYsyB7c-H9DcNrfeel8DeUXWQKXRN1RbtCl&amp;__tn__=EH-R" target="_blank">
                            <div class="d-flex justify-content-between align-items-center w-100"><strong class="mb-1">Announcement</strong><small class="text-muted">Mar 11</small></div>
                            <div class="col-10 mb-1 small"><span>Negative sighting of the 'hilal' of Ramadan reported from Morocco.</span></div>
                        </a><a class="list-group-item list-group-item-action py-3 lh-tight" href="#">
                            <div class="d-flex justify-content-between align-items-center w-100"><strong class="mb-1">Event</strong><small class="text-muted">Mar 6</small></div>
                            <div class="col-10 mb-1 small"><span>Distribution of printed copies of Ramadan 2024 calendars at the masjid.</span></div>
                        </a><a class="list-group-item list-group-item-action py-3 lh-tight" href="#" aria-current="true">
                            <div class="d-flex justify-content-between align-items-center w-100"><strong class="mb-1">Event</strong><small class="text-muted">Mar 1</small></div>
                            <div class="col-10 mb-1 small"><span>Sale of Medjool dates from the Holy Land of Palestine.</span></div>
                        </a><a class="list-group-item list-group-item-action py-3 lh-tight" href="#">
                            <div class="d-flex justify-content-between align-items-center w-100"><strong class="mb-1">Event</strong><small class="text-muted">Feb 24</small></div>
                            <div class="col-10 mb-1 small"><span>Celebration of The Night of Forgiveness.</span></div>
                        </a></div>
                </div>
                <div class="modal-footer"><a href="https://www.facebook.com/mcmvictoriapark?locale=en_GB" target="_blank">View more&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-arrow-right">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"></path>
                        </svg></a></div>
            </div>
        </div>
    </div>
    <div class="container h-100 position-relative" style="top: -50px;margin-top: 70px;padding-top: 0px;">
        <div class="row gy-5 gy-lg-0 row-cols-1 row-cols-md-2 row-cols-lg-3">
            <div class="col">
                <div class="card">
                    <div class="card-body pt-5 p-4">
                        <h4 class="card-title" style="margin-top: -33px;">What's On!</h4>
                        <p class="card-text">The first night of <span style="color: rgb(13, 110, 252);">#Ramadan</span> will commence tomorrow after sunset, with the first day confirmed as Tuesday 12 March, 2024.</p>
                    </div>
                    <div class="card-footer p-4 py-3"><a href="#" data-bs-target="#modal-1" data-bs-toggle="modal">Learn more&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-arrow-right">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"></path>
                            </svg></a></div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body pt-5 p-4">
                        <h4 class="card-title" style="margin-top: -33px;">Communities</h4>
                        <p class="card-text">Join the official Victoria Mosque Facebook page, where we will keep you up to date with our events In Sha Allah.</p>
                    </div>
                    <div class="card-footer p-4 py-3"><a href="https://www.facebook.com/mcmvictoriapark?locale=en_GB" target="_blank">Learn more&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-arrow-right">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"></path>
                            </svg></a></div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body pt-5 p-4">
                        <h4 class="card-title" style="margin-top: -33px;">Get In Touch</h4>
                        <p class="card-text">Drop your questions and check out out official website. Visit us now for a transformative experience.</p>
                    </div>
                    <div class="card-footer p-4 py-3"><a href="contact.php">Learn more&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-arrow-right">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"></path>
                            </svg></a></div>
                </div>
            </div>
        </div>
    </div>
    <section class="py-4 py-xl-5">
        <div class="container h-100">
            <div>
                <div class="table-responsive font-monospace fs-5 fw-normal text-center text-bg-dark border rounded" style="width: 80%;margin: auto;">
                    <table class="table table-striped table-bordered">
                        <thead class="caption-top">
                            <tr>
                                <th>Prayers</th>
                                <th>Timings</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Fajr</td>
                                <td id="Fajr"></td>
                            </tr>
                            <tr>
                                <td>Sunrise</td>
                                <td id="Sunrise"></td>
                            </tr>
                            <tr>
                                <td>Dhuhr</td>
                                <td id="Dhuhr"></td>
                            </tr>
                            <tr>
                                <td>Asr</td>
                                <td id="Asr"></td>
                            </tr>
                            <tr>
                                <td>Maghrib</td>
                                <td id="Maghrib"></td>
                            </tr>
                            <tr>
                                <td>Isha</td>
                                <td id="Isha"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
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