@extends('templates.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Unnumbered Memoradum</h1>
            </div>
            <br /> <br /> 
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Unnumbered Memoradum</li>
            </ol>
            </div>
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-6">
                        <div class="col-md-14">
                            <label >Download the file here:</label>
                            <a href="{{ route('unnummemodownload.download', $data->file) }}"> 
                                {{ $data->file }}
                            </a>
                            <a href="{{ route('dashboard.unnummemo') }}"class="btn  btn-danger float-right"> Back </a>
                        </div>
                        <br>
                        <iframe height="710" width="870" src="/records/unnummemo/{{ $data->file }}" frameborder="0"></iframe>
                </div>
        </div>
    </div>
    @include('sweetalert::alert')
</section>
@endsection