@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                    <h2>Manage <b>Companies</b></h2>
                    </div>
                    <div class="col-sm-6">
                    <a href="{{ route('new-company') }}" class="btn btn-success" data-toggle="modal"><span>Add New Company</span></a>   
                    </div>
                    </div>
            </div>

            @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
            @endif

            @if(Session::has('error'))
                        <div class="alert alert-error">
                            {{ Session::get('error') }}
                        </div>
            @endif


            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Tax Number</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($companies as $company)
                                <tr>
                                <td>{{$company->id}}</td>
                                <td>{{$company->name}}</td>
                                <td>{{$company->taxnumber}}</td>
                                <td><a class="btn btn-primary" href="{{ route('company-show', ['company' => $company]) }}">Show</a></td>
                                </tr>
                @endforeach

                        
                   
                    
                </tbody>
            </table>

        </div>
    </div>
 
@endsection
