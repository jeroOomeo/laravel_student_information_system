@extends('layouts.layout')


@section('content')
    <div class="card-header menus" style = "padding:10px;">
        <a href="/enrollees" class="btn btn-primary">Enrollees</a>
        <a href="/colleges" class="btn btn-secondary"> Colleges</a>
        <a href="/programs" class="btn btn-secondary"> Programs</a>
        <a href="/courses" class="btn btn-secondary"> Courses</a>
        <a style="margin-left:87vw;color:gray;"href="/logout"> Logout</a>
        <div class="add"><a href="/enrollee-add" class="btn btn-success btn_enroll"> Enroll Student</a></div>
           
    </div>
    <section ">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="title card-header"><h4>List of Students</h4></div>
                   
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Student_#</th>
                                <th>Name</th>
                                <th>College</th>
                                <th>Program</th>
                                <th>Course Code</th>
                                <th>Course Name</th>
                                <th>Date Enrolled</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($enrollees as $enrollee)
                                    <tr>
                                    <td>{{$enrollee->id}}</td>
                                    <td>{{$enrollee->id_number}}</td>
                                    <td>{{$enrollee->last_name}}, {{$enrollee->first_name}}</td>
                                    <td>{{$enrollee->acronym}}</td>
                                    <td>{{$enrollee->abbreviation}}</td>
                                    <td>{{$enrollee->name}}</td>
                                    <td>{{$enrollee->code}}
                                    <td>{{$enrollee->created_at}}</td>
                                    <td>
                                        <a href="/enrollee-edit/{{$enrollee->id}}" class="btn btn-info">Edit</a>
                                        <a href="/enrollee-destroy/{{$enrollee->id}}" class="btn btn-danger">Delete</a>
                                    </td>
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
