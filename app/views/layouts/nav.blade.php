<!-- Navbar -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="{{route('home')}}">Esports League</a>
        </div>
        <!-- Everything you want hidden at 940px or less, place within here -->

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{{ URL::to('') }}}">Home</a></li>
                @if (!Sentry::check())
                    <li>{{ HTML::link('forum', 'Forum') }}</li>

                    <li>{{ HTML::link('leagueIndex', 'League Editor') }}</li>
                @else
                    <li>{{ HTML::link('forum', 'Forum') }}</li>
                    <li>{{ HTML::link('statuses', 'Secret') }}</li>

                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <ul class="nav navbar-nav navbar-right">
                    @if (Sentry::check())
                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img class="nav-gravatar" src="{{ Sentry::getUser()->present()->gravatar }}" alt="{{ Sentry::getUser()->username }}">

                                {{ Sentry::getUser()->username }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>{{ link_to_route('profile_path', 'Your Profile', Sentry::getUser()->username) }}</li>
                                <li><a href="#">Another action</a></li>
                                <li class="divider"></li>
                                <li>{{ HTML::link('/user/logout', 'Logout') }}</li>
                            </ul>
                        </li>
                    @else
                        <li>{{ HTML::link('/user/signup', 'Register') }}
                        <li>{{ HTML::link('login', 'Login') }}</li>
                    @endif
                </ul>4
            </ul>
        </div>

    </div>
</div>