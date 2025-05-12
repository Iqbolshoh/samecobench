<header id="header" class="header sticky-top">

    <!-- Topbar with contact info and social links -->
    <div class="topbar d-flex align-items-center dark-background">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center">
                    <a href="{{ $socialLinks[2]->link . $socialLinks[2]->value }}">{{ $socialLinks[2]->value }}</a>
                </i>
                <i class="bi bi-phone d-flex align-items-center ms-4">
                    <a href="{{ $socialLinks[3]->link . $socialLinks[3]->value }}">{{ $socialLinks[3]->value }}</a>
                </i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                @foreach ($socialLinks as $link)
                    @if($link['is_active'] && $link['link'])
                        <a href="{{ $link['link'] . $link['value'] }}">
                            <i class="{{ $link['icon'] }}"></i>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <!-- Branding and navigation bar -->
    <div class="branding">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <h1 class="sitename">{{ config('app.name') }} <br></h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="/" class="">Home</a></li>
                    <li><a href="/about" class="">About Us</a></li>
                    <li><a href="/services" class="">Services</a></li>
                    <li><a href="/news" class="">News</a></li>
                    <li><a href="/products" class="">Products</a></li>
                    <li><a href="/contact" class="">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <!-- Active link highlighter -->
            <script>
                const links = document.querySelectorAll("#navmenu ul li a"),
                    currentUrl = window.location.pathname;
                links.forEach(link => {
                    link.getAttribute("href") === currentUrl
                        ? link.classList.add("active")
                        : link.classList.remove("active");
                });
            </script>

        </div>
    </div>

</header>