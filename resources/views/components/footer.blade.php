<footer id="footer" class="footer position-relative dark-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 col-sm-12 footer-about mb-4">
                <a href="/" class="d-flex align-items-center">
                    <span class="sitename"> {{ config('app.name') }} </span>
                </a>
                <p>{{ $socialLinks[0]->value }}</p>
                <p>{{ $socialLinks[1]->value }}</p>
                <div class="footer-contact pt-3">
                    <p><strong>{{ $socialLinks[2]->title }}:</strong> <span>{{ $socialLinks[2]->value }}</span></p>
                    <p><strong>{{ $socialLinks[3]->title }}:</strong> <span>{{ $socialLinks[3]->value }}</span></p>
                    <p><strong>{{ $socialLinks[4]->title }}:</strong> <span>{{ $socialLinks[4]->value }}</span></p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 footer-links mb-4">
                <h4>Useful Links</h4>
                <ul>
                    <li><i class="bi bi-chevron-right"></i> <a href="/">Home</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="/about">About Us</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="/services">Services</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="/news">News</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="/products">Products</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="/contact">Contact</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-12 footer-follow mb-4">
                <h4>Follow Us</h4>
                <p>We will keep you updated on our latest products and offers. Follow us on social media!</p>
                <div class="social-links d-flex">
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
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename"> {{ config('app.name') }} </strong>
            <span>All rights reserved</span>
        </p>
    </div>

    <link href="{{ asset('css/footer-animation.css') }}" rel="stylesheet">

    <div class="cta-container">
        <div class="tech-grid"></div>
        <div class="binary-matrix" id="binary-matrix"></div>
        <div class="circuit-overlay">
            <div class="circuit-line" style="width: 2px; height: 80px; top: 10%; left: 15%;"></div>
            <div class="circuit-line" style="width: 120px; height: 2px; top: 30%; left: 65%;"></div>
            <div class="circuit-line" style="width: 2px; height: 60px; top: 70%; left: 35%;"></div>
            <div class="circuit-line" style="width: 100px; height: 2px; top: 50%; left: 5%;"></div>
        </div>

        <div class="floating-icons">
            <i class="floating-icon fas fa-code" style="top: 10%; left: 5%; animation-delay: 0s;"></i>
            <i class="floating-icon fas fa-laptop-code" style="top: 20%; left: 90%; animation-delay: 1s;"></i>
            <i class="floating-icon fas fa-server" style="top: 80%; left: 10%; animation-delay: 2s;"></i>
            <i class="floating-icon fas fa-database" style="top: 15%; left: 75%; animation-delay: 3s;"></i>
            <i class="floating-icon fas fa-microchip" style="top: 85%; left: 80%; animation-delay: 4s;"></i>
            <i class="floating-icon fas fa-mobile-alt" style="top: 65%; left: 15%; animation-delay: 5s;"></i>
            <i class="floating-icon fas fa-globe" style="top: 35%; left: 85%; animation-delay: 6s;"></i>
            <i class="floating-icon fas fa-cloud" style="top: 75%; left: 25%; animation-delay: 7s;"></i>
            <i class="floating-icon fas fa-robot" style="top: 25%; left: 20%; animation-delay: 8s;"></i>
            <i class="floating-icon fas fa-network-wired" style="top: 55%; left: 80%; animation-delay: 9s;"></i>
            <i class="floating-icon fas fa-shield-alt" style="top: 45%; left: 10%; animation-delay: 10s;"></i>
            <i class="floating-icon fas fa-bolt" style="top: 30%; left: 60%; animation-delay: 11s;"></i>
            <i class="floating-icon fas fa-cogs" style="top: 70%; left: 70%; animation-delay: 12s;"></i>
            <i class="floating-icon fas fa-chart-line" style="top: 50%; left: 40%; animation-delay: 13s;"></i>
            <i class="floating-icon fas fa-qrcode" style="top: 90%; left: 50%; animation-delay: 14s;"></i>
            <i class="floating-icon fas fa-brain" style="top: 20%; left: 30%; animation-delay: 15s;"></i>
            <i class="floating-icon fas fa-cube" style="top: 60%; left: 20%; animation-delay: 16s;"></i>
            <i class="floating-icon fas fa-rocket" style="top: 40%; left: 80%; animation-delay: 17s;"></i>
            <i class="floating-icon fas fa-wifi" style="top: 70%; left: 30%; animation-delay: 18s;"></i>
            <i class="floating-icon fas fa-satellite" style="top: 15%; left: 50%; animation-delay: 19s;"></i>
            <i class="floating-icon fas fa-lock" style="top: 80%; left: 60%; animation-delay: 20s;"></i>
            <i class="floating-icon fas fa-key" style="top: 25%; left: 70%; animation-delay: 21s;"></i>
            <i class="floating-icon fas fa-fingerprint" style="top: 50%; left: 15%; animation-delay: 22s;"></i>
            <i class="floating-icon fas fa-cloud-upload-alt" style="top: 35%; left: 40%; animation-delay: 23s;"></i>
            <i class="floating-icon fas fa-code-branch" style="top: 65%; left: 50%; animation-delay: 24s;"></i>
            <i class="floating-icon fas fa-bug" style="top: 20%; left: 60%; animation-delay: 25s;"></i>
            <i class="floating-icon fas fa-terminal" style="top: 45%; left: 25%; animation-delay: 26s;"></i>
            <i class="floating-icon fas fa-folder-open" style="top: 75%; left: 15%; animation-delay: 27s;"></i>
            <i class="floating-icon fas fa-window-restore" style="top: 30%; left: 35%; animation-delay: 28s;"></i>
            <i class="floating-icon fas fa-tachometer-alt" style="top: 55%; left: 65%; animation-delay: 29s;"></i>
            <i class="floating-icon fas fa-hdd" style="top: 40%; left: 45%; animation-delay: 30s;"></i>
        </div>

        <div class="scanline"></div>
        <div class="corner corner-tl"></div>
        <div class="corner corner-tr"></div>
        <div class="corner corner-bl"></div>
        <div class="corner corner-br"></div>

        <h1 class="heading">Premium Programming Solutions</h1>
        <p class="description">Building the future with cutting-edge code and innovative technologies</p>
        <div class="cta-buttons">
            <a href="tel:+998997799333" class="btn">
                <span class="btn-icon"><i class="fa-solid fa-phone"></i></span>
                Call Us
            </a>
            <a href="https://iqbolshoh.uz" class="btn" target="_blank">
                <span class="btn-icon"><i class="fa-solid fa-globe"></i></span>
                Visit Website
            </a>
            <a href="https://t.me/iqbolshoh_777" class="btn">
                <span class="btn-icon"><i class="fas fa-paper-plane"></i></span>
                Free Consultation
            </a>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            let e = document.getElementById("binary-matrix"); function t() { let a = document.createElement("div"); a.className = "binary-stream", a.style.left = `${100 * Math.random()}%`, a.style.animationDuration = `${3 * Math.random() + 2}s`, a.style.animationDelay = `${2 * Math.random()}s`, a.textContent = Array.from({ length: 15 }, () => Math.random() > .5 ? "1" : "0").join(""), e.appendChild(a), a.addEventListener("animationend", () => { a.remove(), t() }) } for (let a = 0; a < 20; a++)setTimeout(t, 3e3 * Math.random()); let n = document.querySelectorAll(".floating-icon"); n.forEach(e => {
                e.style.animationDuration = `${10 * Math.random() + 10}s`, e.style.animationDelay = `${5 * Math.random()}s`; let t = `
                    @keyframes float-icon-${e.className.split(" ")[2]} {
                        0% { transform: translate(0, 0) scale(0.8); opacity: 0; }
                        10% { opacity: 0.4; }
                        90% { opacity: 0.4; }
                        100% { 
                            transform: translate(${100 * Math.random() - 50}px, ${100 * Math.random() - 200}px) scale(1.2); 
                            opacity: 0; 
                        }
                    }
                `, a = document.createElement("style"); a.innerHTML = t, document.head.appendChild(a), e.style.animationName = `float-icon-${e.className.split(" ")[2]}`
            }); let l = document.querySelectorAll(".btn"); l.forEach(e => { e.addEventListener("mousemove", t => { let a = e.getBoundingClientRect(), n = t.clientX - a.left, l = t.clientY - a.top, o = document.createElement("div"); o.className = "particle", o.style.width = `${4 * Math.random() + 2}px`, o.style.height = o.style.width, o.style.left = `${n}px`, o.style.top = `${l}px`, o.style.animationDuration = `${2 * Math.random() + 1}s`, e.appendChild(o), setTimeout(() => { o.remove() }, 3e3) }) })
        });</script>

</footer>