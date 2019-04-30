<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">


        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">


            <a class="navbar-item subtitle m-l-10" href="{{ url('/') }}">
                {{ config('app.name', 'GSS - Analytics') }}
            </a>

        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">

                    @guest

                    <a class="button m-r-10" href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                    @else

                        {{--<a class="button">--}}
                        {{--Log in--}}
                        {{--</a>--}}
                        <a class="button" href="{{ route('logout') }}"onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}

                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @endguest

                </div>
            </div>
        </div>
    </div>
</nav>

@section('scripts')
    <script>
        $(document).ready(function() {

            // Check for click events on the navbar burger icon
            $(".navbar-burger").click(function() {

                // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                $(".navbar-burger").toggleClass("is-active");
                $(".navbar-menu").toggleClass("is-active");

            });
        });
    </script>
@endsection