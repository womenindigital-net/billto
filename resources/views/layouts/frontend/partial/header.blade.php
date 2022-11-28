<style>
.dropbtn {
  cursor: pointer;
}
.dropdown-content {
  display: none;
  position: absolute;
  z-index: 1;
  right: 0;
}

.show {display: block;}
.btncustom.btn-check:focus+.btn, .btncustom:focus {
                  box-shadow: none !important;
                }
</style>

<header class="header_sevtion sticky-top p-0 m-0">


    <nav class="navbar   navbar-expand-lg navbar-light p-0 m-0 " style="background-color: #F0F0F0; z-index: 9999999;">

        <div class="container">
          <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('assets/frontend/img/LOGO/billto-logo.png') }}" alt="LOGO" width="" height="60">
          </a>
          <div class="navbar">
            <ul class="navbar-nav d-flex flex-row me-auto mb-2 mb-lg-0">
              @auth
              <li class="nav-item d-flex align-items-center">
                <div class="user-menu-wrap">
                  <div onclick="myFunction()">
                      <button class="dropbtn btn btncustom fs-5"  >
                          {{ auth()->user()->name }} <i class="bi bi-caret-down-fill fs-6 dropbtn"></i>
                    </button>
                  </div>
                  <div id="myDropdown" class="dropdown-content">
                    <ul class="user-menu m-0 mt-2 p-0">
                      <div class="profile-highlight">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                          <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                        <div class="details">
                          {{-- <div id="profile-name">{{ auth()->user()->name }}</div> --}}
                          {{-- <div id="profile-footer">Team Hallaway</div> --}}
                        </div>
                      </div>
                      <li class="user-menu__item">
                        <a class="user-menu-link" href="{{ route('all.invoice') }}">
                          <i class="bi bi-grid-fill"></i>
                          <div class="fw-bold">DashBoard</div>
                        </a>
                      </li>
                      <div class="footer">
                        <li class="user-menu__item">
                          <form method="POST" action="{{ route('logout') }}">
                            @csrf
                          <a class="user-menu-link fw-bold" href="#" style="color: #F44336;"  onclick="event.preventDefault(); this.closest('form').submit();"><i class="bi bi-box-arrow-right pe-2 fw-bold"></i> Sign out</a>
                          </form>
                        </li>
                        <!--<li class="user-menu__item"><a class="user-menu-link fw-bold" href="{{ route('settigns') }}"><i class="bi bi-gear pe-2 fw-bold"></i> Settings</a></li>-->
                      </div>
                    </ul>
                  </div>
                </div>
              </li>
              <style>
                .border_custom1{
                    border: 1px solid #bfbbb8;
                    padding: 0px 2px;
                    margin-top: 2px;
                    align-items: center;
                    height: 24px;
                    width: 24px;
                    align-items: center;
                    text-align: center;
                    display: list-item;
                }
                .border_custom2{
                    border-right: 1px solid #bfbbb8;
                    border-bottom: 1px solid #bfbbb8;
                    border-top: 1px solid #bfbbb8;
                    padding: 0px 0px;
                    margin-top: 2px;
                    align-items: center;
                    height: 24px;
                    width: 21px;
                    align-items: center;
                    text-align: center;
                    display: list-item;
                }

              </style>
              <li class="nav-item d-flex align-items-center pe-2">
                <svg height="50" width="3">
                  <line x1="0" y1="15" x2="0" y2="40" style="stroke:rgb(0,0,0);stroke-width:2" />
                  Sorry, your browser does not support inline SVG.
                </svg>
              </li>
              <li class="nav-item d-flex align-items-center">
                <div class=" dropdown">
                    <a href="#" class="dropdown-toggle nav-link  align-items-center d-flex" data-bs-toggle="dropdown"aria-expanded="false">
                             <div class="border_custom1">

                              <svg style="width: 20px; height:20px;align-items: center; margin: 0 auto; display: block;">
                                  <circle cx="9" cy="11" r="7" stroke="green" stroke-width="5" fill="red" />
                              </svg>
                             </div>
                             <div class="border_custom2">
                                <span style="font-size: 15px"> &#2547;</span>
                           </div>
                       </a>
                    <div class="dropdown-menu border p-0 m-0">
                        <a class="dropdown-item " href="javascript:void(0);">BD</a>
                    </div>
                </div>
            </li>
              @endauth
              @guest
              <li class="nav-item d-flex align-items-center">
                <a class="nav-link p-1" aria-current="page" href="{{ route('login') }}">Sign in</a>
              </li>
              <li class="nav-item d-flex align-items-center">
                <svg height="50" width="3">
                  <line x1="0" y1="15" x2="0" y2="40" style="stroke:rgb(0,0,0);stroke-width:2" />
                  Sorry, your browser does not support inline SVG.
                </svg>
              </li>
              <li class="nav-item d-flex align-items-center">
                <a class="nav-link p-1" aria-current="page" href="{{ route('create') }}">Create Bill</a>
              </li>
              @endguest

            </ul>
            {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <li> sadfsaf</li>
             </div> --}}

          </div>

        </div>
      </nav>
  </header>

  <script>
    /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

  </script>

