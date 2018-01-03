    <header>

      <div class="blog-masthead">

        <div class="container">

          <nav class="nav">

            <a class="nav-link active" href="{{ URL::to('/') }}">View all Blogs</a>

            <a class="nav-link" href="{{ URL::to('blog/create') }}">Create a blog</a>


            @if (Auth::check())

              <a class="nav-link ml-auto" href="#">{{ Auth::user()->name }}</a>

            @endif

          </nav>

        </div>

      </div>

      <div class="blog-header">

        <div class="container">

          <h1 class="blog-title">The Bootstrap Blog</h1>

          <p class="lead blog-description">An example 
          blog template built with Bootstrap.</p>

        </div>
        
      </div>

    </header>