@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New company') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('store-company') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-4 col-form-label">Company name</label> 
                        <div class="col-8">
                        <input id="name" name="name" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="taxnumber" class="col-4 col-form-label">Tax number</label> 
                        <div class="col-8">
                        <input id="taxnumber" name="taxnumber" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-4 col-form-label">Email</label> 
                        <div class="col-8">
                        <input id="email" name="email" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-4 col-form-label">Phone number</label> 
                        <div class="col-8">
                        <input id="phone" name="phone" type="text" class="form-control">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    </form>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
