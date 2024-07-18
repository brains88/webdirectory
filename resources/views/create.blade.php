@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Submit a Website</div>

                <div class="card-body">
                    <form action="{{ route('websites.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name">Website Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="url">Website URL</label>
                            <input type="url" class="form-control" id="url" name="url" required>
                        </div>

                        <div class="form-group">
                            <label for="categories">Categories</label>
                            <select multiple class="form-control" id="categories" name="categories[]" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
