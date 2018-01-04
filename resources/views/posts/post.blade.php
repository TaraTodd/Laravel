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
        
        <!-- show the post (uses the show method found at GET /posts/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('posts/' . $post->id) }}">Show this post</a>

                <!-- edit this nerd (uses the edit method found at GET /post/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('posts/' . $post->id . '/edit') }}">Edit this post</a>
 
                <form action="/posts/{{ $post->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>

          
      </nav>

</div><!-- /.blog-post -->