@extends('website.layout')

@section('content')

   <div class="container" style="margin-bottom: 20px">
       <div class="row">
           <div class="col">
               <h2>
                   {{ $notice->title }}
               </h2>
               <hr>
               <p>
                   {{ $notice->content }}
               </p>
           </div>
       </div>
   </div>
@endsection
