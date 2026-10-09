@extends ('layouts.app')

@section('content')

<div class="page-header">
    <h2>All Books</h2>
</div>
<div class="table-card-custom">

    <!-- Header -->
    <div class="table-header-control">

        <h5>All Books</h5>

    </div>


    <!-- Table -->
    <div class="table-responsive">

        <table class="table-custom">

            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Description</th>
                      <th>Price</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>


            <tbody>

                @foreach($books as $book)

                <tr>

                    <!-- Images -->
                    <td>

                        @foreach($book->images as $image)

                            <img src="{{ asset('storage/' . $image->image) }}"
                                 width="60"
                                 height="80"
                                 style="object-fit: cover; margin-right: 5px;">

                        @endforeach

                    </td>


                    <!-- Book Name -->
                    <td class="table-product-name">
                        {{ $book->name }}
                    </td>


                    <!-- Author -->
                    <td>
                        {{ $book->author }}
                    </td>


                    <!-- Description -->
                    <td>
                        {{ $book->description }}
                    </td>

                     <td>
                        {{ $book->price }}
                    </td>



                    <!-- Delete -->
                    <td>

                        <div class="d-flex justify-content-center">

                            <form method="POST"
                                  action="{{ route('admin.deletebook', $book->id) }}">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="table-btn-action delete"
                                        title="Delete book">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>
@endsection