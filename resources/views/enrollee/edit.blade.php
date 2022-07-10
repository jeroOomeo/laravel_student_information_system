@extends('layouts.layout')

@section('content')

<section style="padding:60px 20vw;">

   <div class="col-md-12"> 
            <form class="row g-3" action="/enrollee-update/{{$enrollee->id}}" method="POST">
               @csrf
               @method('PUT')
               <div class="title card-header"><h4> Edit Record</h4></div>
               <div class="col-md-6">
                  <label for="fname" class="form-label">First Name</label>
                  <input type="text" id="fname" name="fname" class="form-control" value="{{$enrollee->first_name}}">
               </div>
               <div class="col-md-6">
                  <label for="lname" class="form-label">Last Name</label>
                  <input type="text" id="lname" name="lname" class="form-control" value="{{$enrollee->last_name}}">
               </div>
               <div class="col-6">
                  <label for="student_no" class="form-label">ID Number</label>
                  <input type="text" id="student_no" name="student_no" class="form-control" value="{{$enrollee->id_number}}">
               </div>
               <div class="col-md-6">
                  <label for="sel-col" class="form-label">College</label>
                  <select id='sel_col' name='sel_col' class="form-select">
                     <option value='0'>Select College...</option>
                     @foreach($colleges['data'] as $college)
                        <option value="{{$college->id}}">{{$college->name}}</option>
                     @endforeach
                  </select>

               </div>
               <div class="col-md-6">
                  <label for="sel-pro" class="form-label">Program</label>
                  <select id='sel_pro' name='sel_pro' class="form-select">
                      <option value='0'>Select Program...</option>
                  </select>
               </div>
               <div class="col-md-6">
                  <label for="sel_cor" class="form-label">Course</label>
                  <select id='sel_cor' name='sel_cor' class="form-select">
                         <option value='0'> Select Course... </option>
                  </select>
               </div>
               <div class="col-md-6" >
                  <a href="/enrollees" class="btn btn-info" style="width:20vw;">Back</a>
                
               </div>
               <div class="col-md-6" >
                 
                  <button type="submit" class="btn btn-success" style="width:20vw;">Update</button>
               </div>
            </form>    
   </div>
        
</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type='text/javascript'>
   $(document).ready(function(){

      // Department Change
      $('#sel_col').change(function(){

         // Department id
         var id = $(this).val();

         // Empty the dropdown
         $('#sel_pro').find('option').not(':first').remove();

         // AJAX request 
         $.ajax({
           url: '/get-program/'+id,
           type: 'get',
           dataType: 'json',
           success: function(response){

             var len = 0;
             if(response['data'] != null){
                len = response['data'].length;
             }

             if(len > 0){
                // Read data and create <option >
                for(var i=0; i<len; i++){

                   var id = response['data'][i].id;
                   var name = response['data'][i].name;

                   var option = "<option value='"+id+"'>"+name+"</option>";

                   $("#sel_pro").append(option); 
                }
             }

           }
         });
      });

         

   // Department Change
      $('#sel_pro').change(function(){

      // Department id
      var id = $(this).val();

      // Empty the dropdown
      $('#sel_cor').find('option').not(':first').remove();

      // AJAX request 
      $.ajax({
      url: '/get-course/'+id,
      type: 'get',
      dataType: 'json',
      success: function(response){

         var len = 0;
         if(response['data'] != null){
            len = response['data'].length;
         }

         if(len > 0){
            // Read data and create <option >
            for(var i=0; i<len; i++){

               var id = response['data'][i].id;
               var name = response['data'][i].name;

               var option = "<option value='"+id+"'>"+name+"</option>";

               $("#sel_cor").append(option); 
            }
         }

      }
      });
      });
   });
</script>

@endsection