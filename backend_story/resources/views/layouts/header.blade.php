<nav class="navbar navbar-dark bg-dark">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link {{request() -> is('/') ? 'active' : ''}} "
               aria-current="page"
               href="/stories">Story
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{request() -> is('about') ? 'active' : ''}} "
               href="pages">Page
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{request() -> is('porfolio') ? 'active' : ''}} "
               href="porfolio">Porfolio
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{request() -> is('contact') ? 'active' : ''}} "
               href="contact">Contact
            </a>
        </li>
    </ul>
</nav>



