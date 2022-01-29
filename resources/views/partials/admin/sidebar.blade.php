<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">
            <i class="fas fa-tachometer-alt"></i> Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            Orders
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.products.index')}}">
            Products
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.posts.index')}}">
            <i class="fas fa-thumbtack"></i> Posts
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.categories.index')}}">
            <i class="fas fa-bookmark"></i>
            Categories
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.tags.index')}}">
            <i class="fas fa-hashtag"></i>
            Tags
          </a>
        </li>

      </ul>
    </div>
  </nav>