<nav class="navbar navbar-light justify-content-between mt-3">
    <a href="/">
        <p class="navbar-brand text-warning  ml-3 logo">AZARCON CORP.</p>
    </a>
    <div class="form-inline my-2 my-lg-0">
        @guest

        <a href="/about" class="mr-3 text-dark font-weight-bold ">About us</a>
        <a href="/products" class="mr-3 text-dark font-weight-bold ">Products</a>
        <a href="/contact" class="mr-3 text-dark font-weight-bold ">Contact Us</a>




        <a type="button" class="btn btn-warning font-weight-bold btnr"
            href="{{ route('login') }}"><span>Login</span></a>


        @else
        @if (Auth::User()->userType == 'admin')
        <a href="/orders" class="mr-3 text-dark font-weight-bold ">
            Orders <span class="text-warning">(1)

            </span>

        </a>
        @else
        <a href="/my/cart" class="mr-3 text-dark font-weight-bold ">My Cart</a>
        @endif
        <a href="/about" class="mr-3 text-dark font-weight-bold ">About us</a>
        <a href="/products" class="mr-3 text-dark font-weight-bold ">Products</a>
        <a href="/contact" class="mr-3 text-dark font-weight-bold ">Contact Us</a>


        <div class="nav">
            <a id="navbarDropdown" class=" dropdown-toggle text-capitalize font-weight-bold text-warning" href="#"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->lname }} , {{ Auth::user()->fname }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
        @endguest




    </div>
</nav>