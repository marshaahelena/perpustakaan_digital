<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('asset/side_bar')}}/style.css" />
    <title>Sidebar</title>
  </head>
  <body>
    <div class="container">
      <aside class="sidebar">
        <ul class="menu-list">
          <li>
            <div class="menu-container">
              <button class="icon" id="menu">
                <img src="{{asset('asset/side_bar')}}/assets/images/menu.svg" alt="menu" />
              </button>
            </div>
          </li>
          <li>
            <a href="{{route('book.store')}}">
                <button class="icon" id="search">
                    <img src="{{ asset('asset/side_bar/assets/images/search.svg') }}" alt="search" />
                </button>
            </a>

          </li>
          <li>
            <button class="icon" id="dashboard">
              <img src="{{asset('asset/side_bar')}}/assets/images/grid.svg" alt="dashboard" />
            </button>
          </li>
          <li>
            <button class="icon" id="pets">
              <img src="{{asset('asset/side_bar')}}/assets/images/pet.svg" alt="pets" />
            </button>
          </li>
          <li>
            <button class="icon" id="clients">
              <img src="{{asset('asset/side_bar')}}/assets/images/user.svg" alt="clients" />
            </button>
          </li>
          <li>
            <button class="icon" id="vets">
              <img src="{{asset('asset/side_bar')}}/assets/images/vet.svg" alt="vets" />
            </button>
          </li>
          <li>
            <button class="icon" id="settings">
              <img src="{{asset('asset/side_bar')}}/assets/images/settings.svg" alt="settings" />
            </button>
          </li>
        </ul>
        <div class="logout-container">
          <button class="icon-logout">
            <img src="{{asset('asset/side_bar')}}/assets/images/log-out.svg" alt="logout" />
          </button>
        </div>
      </aside>

    </div>
  </body>
  <script src="{{asset('asset/side_bar')}}/script.js"></script>
</html>
