<nav class="navbar navbar-expand-lg bg-body-tertiary p-3 mb-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Главная</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('admin.books.index')}}">Книги</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.styles.index')}}">Жанры</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.users.index')}}" aria-disabled="true">Авторы</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
