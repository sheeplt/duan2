<nav class="navbar navbar-expand-sm bg-dark">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="/" class="nav-link {{ request() ->is('/') ? 'active' : '' }}">Home</a>
            </li>
            <li class="nav-item">
                <a href="/dishes" class="nav-link {{ request() ->is('dishes') ? 'active' : '' }}">Dishes</a>
            </li>
            <li class="nav-item">
                <a href="/users" class="nav-link {{ request() ->is('users') ? 'active' : '' }}">Users</a>
            </li>
        </ul>
    </div>
</nav>