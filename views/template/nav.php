<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link <?php if($title === 'home'): ?> currentLink <?php endif ?> " aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($title === 'cv'): ?> currentLink <?php endif ?> " aria-current="page" href="/cv">CV</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($title === 'projets'): ?> currentLink <?php endif ?>" aria-current="page" href="/project/index">Projects</a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link <?php if($title === 'contact'): ?> currentLink <?php endif ?>" href="/contact">Get in touch</a>
            </li>
        </ul>
    </div>
</nav>