@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form method="GET" action="/create-offer">
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create Offers</button>
                        </div>
                    </form>
                    <form method="GET" action="/delete-offer">
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">Delete Offers</button>
                        </div>
                    </form>
                    <form method="GET" action="/offer-offer">
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Offers</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
