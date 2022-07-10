@extends('layouts.layout')
@section('content')
    <div class="card-header menus" style = "padding:10px;">
        <a href="/enrollees" class="btn btn-secondary"> Enrollees</a>
        <a href="/colleges" class="btn btn-primary"> Colleges</a>
        <a href="/programs" class="btn btn-secondary"> Programs</a>
        <a href="/courses" class="btn btn-secondary"> Courses</a>
        <a style="margin-left:87vw;color:gray;"href="/logout"> Logout</a>
           
    </div>
    <section style="padding-top:30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="title card-header"><h4>List of Colleges</h4></div>
                   
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>College Name</th>
                                <th>College Acronym</th>
                            </thead>
                            <tbody>
                                @foreach($colleges['data'] as $college)
                                    <tr>
                                    <td>{{$college->id}}</td>
                                    <td>{{$college->name}}</td>
                                    <td>{{$college->acronym}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                     
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection