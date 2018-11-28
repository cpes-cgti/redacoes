@extends('adminlte::page')

@section('css')
    <style>
        #loading i{
            -webkit-animation: spin 3s linear infinite; /* Safari */
            animation: spin 3s linear infinite;
        }

        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        #loading .fas{
            position: absolute;
            top: 50%;
            left: 50%;
            margin-left: -25px;
            margin-top: -25px;
            color: #000;
            font-size: 50px;
        }

    </style>
@stop

@section('content_header')
    <h1>Importar redações</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fas fa-home"></i></a></li>
        <li><a href="{{ route('redaction.index') }}">Redações</a></li>
        <li><a href="{{ route('redaction.import') }}">Importar</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            
        </div>
        <div class="box-body" style="height: 70vh">
            @if (session('erro'))
                <div class="alert alert-error alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="fas fa-exclamation-circle"></i> Erro: </h4>
                    <p>{{ session('erro') }}</p>
                </div>
            @endif
            <form method="post" action="{{ route('redaction.process_import') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Importar redações:</label>
                    <p>Antes de realizar este procedimento é necessário ter transferido todas as imagens das redações digitalizadas para a pasta de <b>Storage</b> da aplicação.</p>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success btn-block"><i class="fas fa-file-import"></i> Importar</button>
                </div>
            </form>
        </div>
        <div class="overlay" style="display:none;" id="loading">
            <i class="fas fa-sync-alt"></i>
            {{-- <i class="fas fa-spinner"></i> --}}
        </div>
    </div>
    
@stop

@section('js')
    <script>
        window.onload = function() {
            $("form").submit(function(event) {
                $('#loading').css('display','block');
            });
        };
    </script>
@stop