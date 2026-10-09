<h1>Welcome to User Dashboard</h1>

<p>Welcome, {{ Auth::user()->name }}</p>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>

<hr>

<h2>Available Books</h2>

@foreach($books as $book)

    <div>
        
        @if($book->images->first())
            <img src="{{ asset('storage/' . $book->images->first()->image) }}"
                 width="150">
        @endif

        <h3>{{ $book->name }}</h3>

        <p>Author: {{ $book->author }}</p>

        <p>{{ $book->description }}</p>

        <p>Price: ₹{{ $book->price }}</p>

        <button>Add to Cart</button>

    </div>

    <hr>

@endforeach