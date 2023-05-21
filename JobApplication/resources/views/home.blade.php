@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div style="text-align: center; margin-bottom: 20px;">
                    <a href="{{ route('new-company') }}" class="btn btn-primary">New Company</a>
                    </div>
                    <table class="table" style="text-align: center; vertical-align: middle;">
                        <thead style="background-color: lightgray;">
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Company name</th>
                            <th scope="col">Tax number</th>
                            <th scope="col">Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                <td>{{$company->id}}</td>
                                <td>{{$company->name}}</td>
                                <td>{{$company->taxnumber}}</td>
                                <td><a href="" class="btn btn-primary">Show</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                  
                        
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
