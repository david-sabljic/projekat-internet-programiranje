<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/home">Pozorište <span class="text-warning">Jazavac</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="/o_nama">O nama</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/predstave">Predstave</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/repertoar">Repertoar</a>
        </li>
        @guest
        </ul>
        <!-- Button placed at the end of the navbar -->
        <a class="btn btn-light btn-rounded ms-auto me-1" href="login">Login</a>
        <a class="btn btn-secondary btn-rounded me-1" href="registration">Register</a>
      @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('rezervacije') }}">Rezervacije</a>
        </li>
      </ul>
            <form class="form-inline ms-auto" action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-light btn-rounded" type="submit">Logout</button>
            </form>
      @endguest

      
    </div>

  </nav>

  <!-- Bootstrap JS, jQuery, and Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>