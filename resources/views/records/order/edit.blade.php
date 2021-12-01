@extends('templates.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Edit DepEd Order</h1>
            </div>
            <br /> <br /> <br /> <br /> 
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li> 
                <li class="breadcrumb-item active">Edit DepEd Order</li>
            </ol>
            </div>
                <div class="col-md-3">

                </div>
                <div class="col-md-6">
                    <form method="POST" action="{{ route('order.update', $order->id) }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @include('records.order.partials.form')
                    </form>
                </div>
        </div>
    </div>
</section>
@endsection