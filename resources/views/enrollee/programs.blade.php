@extends('layouts.layout')
@section('content')
    <div class="card-header menus" style = "padding:10px;">
        <a href="/enrollees" class="btn btn-secondary"> Enrollees</a>
        <a href="/colleges" class="btn btn-secondary"> Colleges</a>
        <a href="/programs" class="btn btn-primary"> Programs</a>
        <a href="/courses" class="btn btn-secondary"> Courses</a>
        <a style="margin-left:87vw;color:gray;"href="/logout"> Logout</a>
    </div>
    <section style="padding-top:30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="title card-header"><h4>List of Programs</h4></div>
                   
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Program Name</th>
                                <th>Program Acronym</th>
                            </thead>
                            <tbody>
                                @foreach($programs['data'] as $program)
                                    <tr>
                                    <td>{{$program->id}}</td>
                                    <td>{{$program->name}}</td>
                                    <td>{{$program->abbreviation}}</td>
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