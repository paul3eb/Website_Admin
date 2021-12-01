@extends('templates.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Bid Bulliten</h1>
            </div>
            <br /> <br /> 
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Bid Bulliten</li>
            </ol>
            </div>
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-6">
                        <div class="col-md-14">
                            <label >Download the file here:</label>
                            <a href="{{ route('bullitendownload.download', $data->file) }}"> 
                                {{ $data->file }}
                            </a>
                            <a href="{{ route('dashboard.bulliten') }}"class="btn  btn-danger float-right"> Back </a>
                        </div>
                        <br>
                        <iframe height="710" width="870" src="/bac/bulliten/{{ $data->file }}" frameborder="0"></iframe>
                </div>
        </div>
    </div>
</section>
@endsection