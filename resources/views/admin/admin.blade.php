{{-- <title>Hi {{ auth()->user()->name }} ✌️</title> --}}
<link rel="stylesheet" href="/css/admin.css">
<link rel="stylesheet" href="/css/style.css">



<body>

    <div class="area">

        @yield('content')

    </div>


    <nav class="main-menu">
        <ul>
            <li>
                <a href="/home">
                    <i class="fa fa-home fa-2x"></i>
                    <span class="nav-text">
                        Home
                    </span>
                </a>

            </li>
            <li class="has-subnav">
                <a href="#">
                    <i class="fa fa-globe fa-2x"></i>
                    <span class="nav-text">
                        Auto's Updaten
                    </span>
                </a>

            </li>
            <li class="has-subnav">
                <a href="/admin/gebruikers">
                    <i class="fa fa-users fa-2x"></i>
                    <span class="nav-text">
                        Gebruikers weergeven
                    </span>
                </a>

            </li>
            <li class="has-subnav">
                <a href="/admin/gebruikers/toevoegen">
                    <i class="fa fa-user fa-2x"></i>
                    <span class="nav-text">
                        Gebruiker toevoegen
                    </span>
                </a>

            </li>
            <li>
                <a href="/admin/statestieken">
                    <i class="fa fa-tasks fa-2x"></i>
                    <span class="nav-text">
                        Sales statestieken
                    </span>
                </a>
            </li>
        </ul>

        <img width="120px" style="margin-left: 60px; margin-top: 250px; "
            src="https://www.blankertshortlease.nl/wp-content/uploads/2023/08/BLAN_Logo_Groen_V10.png" alt="">

        <ul class="logout">
            <li>
                <a href="{{ url('/logout') }}">
                    <i class="fa fa-power-off fa-2x"></i>
                    <span class="nav-text">
                        Log uit
                    </span>
                </a>
            </li>
        </ul>
    </nav>

</body>
