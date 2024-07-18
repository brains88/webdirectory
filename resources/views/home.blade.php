@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="d-flex justify-content-between card-header">
                    <div>Websites</div>
                    @auth
                        <a href="{{ route('websites.create') }}" class="btn btn-sm btn-success">Add New Website</a>
                    @endauth
                </div>
                <div class="card-body" style="max-height: 400px; overflow-y: auto; background-color: #f8f9fa; border-radius: 10px;">
                    <form action="{{ route('search') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="query" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>

                    <div style="max-height: 350px; overflow-y: auto;">
                        @foreach($categories as $category)
                            <h3>{{ $category->name }}</h3>
                            <ul style="list-style: none; padding: 0;">
                                @foreach($category->websites as $website)
                                    <li style="background-color: #ccc; border-radius: 5px; margin-bottom: 10px; padding: 10px;">
                                        {{ $website->name }} ({{ $website->votes }} votes)
                                        @auth
                                            <form action="{{ route('websites.vote', $website) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-primary">Vote</button>
                                            </form>
                                        @endauth
                                    </li>
                                @endforeach
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
