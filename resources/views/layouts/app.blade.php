<!DOCTYPE html>
<html lang="en">

    <head>
        <title>@yield("title")</title>

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">

        <meta charset="UTF-8">

        <meta property="og:title" content="Annie Wu" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="http://anniew.xyz" />
        <meta property="og:description" content="Hi! I'm Annie." />
        <meta property="og:locale" content="en_US" />
        <meta property="og:image" content="https://anniew.xyz/img/me-icon-smiling.png" />

        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="Annie Wu">
        <meta name="twitter:description" content="Hi! I'm Annie.">
        <meta name="twitter:image" content="https://anniew.xyz/img/me-icon-smiling.png">
        <meta name="twitter:site" content="@anniedotexe">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="copyright" content="Annie Wu">
        <meta name="description" content="Hi! I'm Annie.">
        <meta name="keywords"
            content="Annie Wu, Annie Wu Portfolio, Annie Wu Photography, photographer, developer, java, python, html, css, javascript, web developer, webdev, portfolio, quality assurance, qa engineer, quality assurance engineer">
        <meta name="robots" content="noindex, nofollow" />

        <link rel="canonical" href="https://anniew.xyz" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

        <link rel="stylesheet" href="{{ asset('css/main.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/header.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/projects.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/footer.css') }}" type="text/css">
    </head>

    <body>
        <header class="header">
            <a href="/" class="header-logo">@anniedotexe</a>
            <nav class="nav">
                <div class="toggle"><i class="fas fa-bars"></i></div>
                <ul class="nav-menu">
                    <li class="nav-item"><a href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a href="{{ route('projects') }}">Projects</a></li>
                    <li class="nav-item"><a href="{{ route('photos') }}">Photos</a>
                    </li>
                </ul>
            </nav>
        </header>

        @yield("content")

        <footer class="footer-container">
            <div class="footer">
                <div class="footer-column">
                    <a href="/" class="footer-logo">@anniedotexe</a>
                    <div class="socials">
                        <ul>
                            <li class="social-link">
                                <a href="https://www.linkedin.com/in/anniewu2303/"
                                    aria-label="LinkedIn" target="_blank">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            </li>
                            <li class="social-link">
                                <a href="https://github.com/anniedotexe" aria-label="GitHub"
                                    target="_blank">
                                    <i class="fa-brands fa-github"></i>
                                </a>
                            </li>
                            <li class="social-link">
                                <a href="https://instagram.com/anniedotexe" aria-label="Instagram"
                                    target="_blank">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <span class="copyright"><i class="fa-regular fa-copyright"></i> Annie Wu
                        2021-2025</span>
                </div>
                <div class="footer-column">
                    <a href="/about" class="footer-button">
                        <img src="{{ asset('img/smile.svg') }}" alt="Smile Icon">
                        About
                    </a>
                    <a href="/projects" class="footer-button">
                        <img src="{{ asset('img/coding.svg') }}" alt="Code Icon">
                        Projects
                    </a>

                </div>
                <div class="footer-column">
                    <!-- <a href="https://www.polywork.com/anniedotexe" class="footer-button">
                                        <img src="{{ asset("img/polywork.svg") }}" alt="PolyWork Icon">
                                        Updates
                                    </a> -->
                    <a href="https://anniedotexe.mypixieset.com/" class="footer-button">
                        <img src="{{ asset('img/camera.svg') }}" alt="Camera Icon">
                        Photos
                    </a>
                    <a href="mailto:lionelbenvino@gmail.com" class="footer-button">
                        <img src="{{ asset('img/email.svg') }}" alt="Email Icon">
                        Contact
                    </a>
                </div>
            </div>
        </footer>

        <script src="{{ asset('js/main.js') }}"></script>
    </body>

</html>