<div class="blog-post">
  

  <h2 class="blog-post-title">

      <a href="/posts/{{ $post->id }}">

        {{ $post->title }}

      </a>

  </h2>

            
  <p class="blog-post-meta">

  	{{ $post->user->name }} on

    {{ $post->created_at->toFormattedDateString() }}

  </p>


  {{ $post->body }}

        <nav class="blog-pagination">
        
        <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('posts/' . $post->id) }}">Show this blog</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('blogs/' . $post->id . '/edit') }}">Edit this blog</a>
          
      </nav>

</div><!-- /.blog-post -->