@extends('layouts.app')

@section('title', 'New Company')

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

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <div class="form-group row" style="padding-bottom: 20px;">
                        <label for="name" class="col-4 col-form-label">Company name</label> 
                        <div class="col-8">
                        <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row" style="padding-bottom: 20px;">
                        <label for="taxnumber" class="col-4 col-form-label">Tax number</label> 
                        <div class="col-8">
                        <input id="taxnumber" name="taxnumber" type="text" class="form-control" value="{{ old('taxnumber') }}">
                        </div>
                    </div>
                    <div class="form-group row" style="padding-bottom: 20px;">
                        <label for="email" class="col-4 col-form-label">Email</label> 
                        <div class="col-8">
                        <input id="email" name="email" type="text" class="form-control" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="form-group row" style="padding-bottom: 20px;">
                        <label for="phone" class="col-4 col-form-label">Phone number</label> 
                        <div class="col-8">
                        <input id="phone" name="phone" type="text" class="form-control" value="{{ old('phone') }}">
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
