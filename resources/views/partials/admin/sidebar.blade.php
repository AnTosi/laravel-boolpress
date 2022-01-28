<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">
            <span data-feather="home"></span>
            <i class="fas fa-tachometer-alt"></i> Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file"></span>
            Orders
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.products.index')}}">
            <span data-feather="shopping-cart"></span>
            Products
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.posts.index')}}">
            <span data-feather="users"></span>
            <i class="fas fa-thumbtack"></i> Posts
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.categories.index')}}">
            <span data-feather="users"></span>
            Customers
          </a>
        </li>

      </ul>
    </div>
  </nav>