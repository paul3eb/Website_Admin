@extends('templates.master')

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Create New Memoradum</h1>
            </div>
            <br /> <br /> <br /> <br /> 
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Create New Memoradum</li>
            </ol>
            </div>
                <div class="col-md-3">

                </div>
                <div class="col-md-6">
                    <form method="POST" action="{{ route('unnummemo.store') }}" enctype="multipart/form-data">
                        @include('records.unnummemo.partials.form', ['create'=>true])
                    </form>
                </div>
        </div>
    </div>
</section>
    
@endsection