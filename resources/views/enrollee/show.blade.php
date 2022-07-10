<!DOCTYPE html>
<html lang="en">
<head>@extends('layouts.layout')
@section('content') 
    <section style="padding-top:60px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="#" class="btn btn-success"> Enroll Student</a>
                    </div>
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
                                
                            </thead>
                            <tbody>
                                    <td>{{$enrollee->id}}</td>
                                    <td>{{$enrollee->id_number}}</td>
                                    <td>{{$enrollee->last_name}}, {{$enrollee->first_name}}</td>
                                    <td>{{$enrollee->abbreviation}}</td>
                                    <td>{{$enrollee->abbreviation}}</td>
                                    <td>{{$enrollee->code}}</td>
                                    <td>{{$enrollee->name}}</td>
                                    <td>{{$enrollee->created_at}}</td>
                            </tbody>
                        </table>
                     
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
    