@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Company details') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div style="text-align: center; margin:20px;">
                    <a class="btn btn-primary" href="{{ route('company-edit',$company->id) }}">Edit</a>
                            <form action="{{ route('company-delete',$company->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                    </div>
                 
                  
                    <table class="table" style="text-align: center; vertical-align: middle;">
                        <thead style="background-color: lightgray;">
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Company name</th>
                            <th scope="col">Tax number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone number</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                <td>{{$company->id}}</td>
                                <td>{{$company->name}}</td>
                                <td>{{$company->taxnumber}}</td>
                                <td>{{$company->email}}</td>
                                <td>{{$company->phone}}</td>
                                </tr>
                        </tbody>
                        </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
