@extends('backend.layouts.master')@section('content')    <div class="content-wrapper">        <!-- Content Header (Page header) -->        <div class="content-header">            <div class="container-fluid">                <div class="row mb-2">                    <div class="col-sm-6">                        <h1 class="m-0 text-dark">Dashboard</h1>                    </div><!-- /.col -->                    <div class="col-sm-6">                        <ol class="breadcrumb float-sm-right">                            <li class="breadcrumb-item"><a href="{{route('backend')}}">Inicio</a></li>                            <li class="breadcrumb-item active">Roles</li>                        </ol>                    </div><!-- /.col -->                </div><!-- /.row -->            </div><!-- /.container-fluid -->        </div>        <!-- /.content-header -->        <!-- Main content -->        <section class="content">            <div class="container-fluid">                <div class="row">                    <div class="col-12">                        <form role="form" id='form_rol' name='form_rol'>                            <input type='hidden' id='ruta' name='ruta' value="{{isset($data) ? 'update' : 'store'}}">                            @method('POST')                            @if(isset($data))                                <input name="id" id="id" value="{{isset($data) ? $data->id : ''}}" type="hidden">                            @endif                            <div class="card card-secondary">                                <div class="card-header">                                    <h3 class="card-title">Datos del registro</h3>                                </div>                                <div class="card-body">                                    <div class="row">                                        <div class="col-sm-6">                                            <div class="form-group">                                                <label>Nombre *</label>                                                <input type='text' id='name' name='name' class='form-control required' maxlength="150"                                                       value="{{isset($data) ? $data->name : ''}}">                                            </div>                                        </div>                                        <div class="form-group col-sm-12">                                            <label for="id_permission">Permisos</label>                                            <div id="accordion">                                                @foreach ($menus as $key => $item)                                                    @if ($item['parent'] != 0)                                                        @break                                                    @endif                                                    <div class="card card-default">                                                        <div class="card-header">                                                            <h4 class="card-title">                                                                <a data-toggle="collapse" data-parent="#accordion" href="#menu{{$item['id']}}" aria-expanded="false"                                                                   class="collapsed" style="color: #000;">                                                                    {{$item['name']}}                                                                </a>                                                            </h4>                                                        </div>                                                        <div id="menu{{$item['id']}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">                                                            <div class="box-body">                                                                <table class="table table-hover table-bordered">                                                                    <thead>                                                                    <tr>                                                                        <th>Nombre</th>                                                                        <th class="text-center">Seleccionar</th>                                                                        <th class="text-center" colspan="3">Permisos adicionales</th>                                                                    </tr>                                                                    </thead>                                                                    <tbody>                                                                    @if(!$item['children'])                                                                        <tr>                                                                            <td colspan="3">                                                                                <div class="alert alert-info alert-dismissible">                                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>                                                                                    <p><i class="icon fas fa-info"></i> Oops! no existe registro para mostrar </p>                                                                                </div>                                                                            </td>                                                                        </tr>                                                                    @else                                                                        @include('backend.settings.list_submenu_permission_rol', [ 'item' => $item, 'idRol'=>isset($data) ?                                                                   $data->id : '' ])                                                                    @endif                                                                    </tbody>                                                                </table>                                                            </div>                                                        </div>                                                    </div>                                                @endforeach                                            </div>                                        </div>                                        <div class="form-group col-sm-12" id='loading' style='display: none; text-align: center;'>                                            <img src='{{URL::asset('asset/img/loadingfrm.gif')}}'/>                                            <br> Enviando datos por favor espere                                        </div>                                    </div>                                </div>                                <div class="card-footer">                                    <p>Campos Requeridos (*)</p>                                    <button type="submit" class="btn btn-success">Guardar</button>                                    <a href="{{route('rol')}}" class="btn btn-secondary botones">Cancelar</a>                                </div>                            </div>                        </form>                    </div>                </div>                <!-- /.row -->            </div><!-- /.container-fluid -->        </section>        <!-- /.content -->    </div>    @include('backend.functions.functions_roles')@endsection