@extends('layouts.app')

@section('content')

<form method="POST"
      action="{{ route('admin.storebook') }}"
      enctype="multipart/form-data">

    @csrf

    <div class="row g-4 mb-4">

        <div class="col-12 col-lg-6">

            <div class="card border-light shadow-sm p-4 h-100">

                <h5 class="card-title mb-4">Add Book</h5>

                
                   <div class="mb-3">
                    <label class="form-label-custom">Book Images</label>

                    <input type="file"
                      class="form-control-custom"
                   name="images[]"
                     multiple>
                    </div>
                <div class="mb-3">
                    <label class="form-label-custom">Book Name</label>

                    <input type="text"
                           class="form-control-custom"
                           placeholder="Enter name"
                           name="bookname">
                </div>

                <div class="mb-3">
                    <label class="form-label-custom">Author</label>

                    <input type="text"
                           class="form-control-custom"
                           placeholder="Enter author"
                           name="bookauthor">
                </div>

                <div class="mb-3">
                    <label class="form-label-custom">Description</label>

                    <input type="text"
                           class="form-control-custom"
                           placeholder="Enter description"
                           name="bookdescription">
                </div>

                 <div class="mb-3">
                    <label class="form-label-custom">Price</label>

                    <input type="number"
                           class="form-control-custom"
                           placeholder="Enter Price"
                           name="bookprice">
                </div>

                <button type="submit">Add</button>

            </div>

        </div>

    </div>

</form>

@endsection