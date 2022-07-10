@extends('layouts.layout')
@section('content')  
    <div class="container">
        <div class="row" style="margin-top:45px; padding-bottom:400px">
            <div class="col-md-6 col-md-offset-6">
               <h4>Log in | Admin</h4>
                <form action="/check" method="POST"">
                @if(Session::get('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                @endif
                @csrf
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email address" value ="{{old('email')}}">
                        <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                        <span class="text-danger">@error('password'){{$message}}@enderror</span>
                    </div>
                    <br>
                        <button type="submit" class="btn btn-block btn-primary">Log in</button>

                   
                </form>


            </div>
                
        </div>
    </div>  
@endsection