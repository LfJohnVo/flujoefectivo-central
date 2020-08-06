@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Distrito
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($distrito, ['route' => ['distritos.update', $distrito->id], 'method' => 'patch']) !!}

                        @include('distritos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection