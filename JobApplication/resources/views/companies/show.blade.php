@extends('layouts.app')

@section('content')

<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                    <h2>Company <b>details</b></h2>
                    </div>
                    <div class="col-sm-6">
                
                    <form action="{{ route('company-delete',$company->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this company?');">
                            <span>Delete</span>
                            </button>
                            </form> 
                            <a href="{{ route('company-edit',$company->id) }}" class="btn btn-success" data-toggle="modal"><span>Edit Company</span></a>  
                    </div>
                    </div>
            </div>

            <table class="table table-striped table-hover">
                <thead>
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
@endsection
