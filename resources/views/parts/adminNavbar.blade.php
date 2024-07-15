<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('adminPredstave')}}">Admin <span class="text-warning">pannel</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{route('adminPredstave')}}">Predstave</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('adminGlumci')}}">Glumci</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('adminRepertoar')}}">Repertoar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('adminNalozi')}}">Admin nalozi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('userNalozi')}}">Korisnicki nalozi</a>
        </li>
      </ul>
        <form  class=" ms-auto me-1" action="{{route('logout')}}" method="POST">
          @csrf
          <button class="btn btn-light btn-rounded" type="submit">Logout</button>
        </form> 
    </div>

  </nav>

  <!-- Bootstrap JS, jQuery, and Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>