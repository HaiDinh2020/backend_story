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
               href="audios">Audio
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{request() -> is('contact') ? 'active' : ''}} "
               href="texts">Text
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{request() -> is('contact') ? 'active' : ''}} "
               href="textConfigs">Text_config
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{request() -> is('contact') ? 'active' : ''}} "
               href="Touch">Touch
            </a>
        </li>
    </ul>
</nav>



