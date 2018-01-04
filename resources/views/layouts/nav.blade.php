    <header>

      <div class="blog-masthead">

        <div class="container">

          <nav class="nav">

            @if (Auth::check())

            <a class="nav-link" href="{{ URL::to('/blog') }}">View all Posts</a>

            <a class="nav-link" href="{{ URL::to('blog/create') }}">Create a Post</a>

              <a class="nav-link ml-auto" href="{{ URL::to('/logout') }}">logout</a>

              <a class="nav-link ml-auto" href="#">Welcome back, {{ Auth::user()->name }}</a>

            @endif

          </nav>

        </div>

      </div>

      <div class="blog-header">

        <div class="container">

          <h1 class="blog-title">Blood Donation</h1>

          <p class="lead blog-description"></p>

        </div>
        
      </div>

    </header>