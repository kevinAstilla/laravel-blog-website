<div class="blog-masthead">
  <div class="container">
    <nav class="nav blog-nav">
      <a class="nav-link active" href="/">Home</a>
      <a class="nav-link" href="/posts/create">Create Post</a>

        <nav class="nav blog-nav ml-auto">
      @if(Auth::check())
      	<a class="nav-link" href="#">{{ Auth::user()->name }}</a>
        <a class="nav-link" href="/logout">Log Out</a>
      @else
        <a class="nav-link" href="/login">Sign In</a>
      @endif
    </nav>
    </nav>
  </div>
</div>