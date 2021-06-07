@extends('backend.layouts.master')

@section('content')

    @include('backend.layouts.modal_delete')
    <div id="modal-complaint"></div>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('backend')}}">Inicio</a></li>
                            <li class="breadcrumb-item active">Quejas</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Buscador</h3>
                            </div>
                            <form role="form" action="{{route('reports_complaint.index')}}" method="GET">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Usuario / Título</label>
                                                <input type="text" class="form-control" id="search" name="search"
                                                       value="{{ (isset($filter['search']) and !empty($filter['search'])) ? $filter['search'] : ''}}" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Estatus</label>
                                                <select class='form-control' id='status' name='status'>
                                                    <option value=''>
                                                        TODOS
                                                    </option>
                                                    <option value='{{\App\Models\Busines::STATUS_ACTIVE}}'
                                                            {{(isset($filter['status']) and $filter['status']==\App\Models\Busines::STATUS_ACTIVE) ?'selected' : ''}}>
                                                        {{\App\Models\Busines::STATUS_ACTIVE}}
                                                    </option>
                                                    <option value='{{\App\Models\Busines::STATUS_INACTIVE}}'
                                                            {{(isset($filter['status']) and $filter['status']==\App\Models\Busines::STATUS_INACTIVE)  ?'selected' : ''}}>
                                                        {{\App\Models\Busines::STATUS_INACTIVE}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Empresas</label>
                                                <select class='form-control' id='busine_id' name='busine_id'>
                                                    <option value="">
                                                        Empresas
                                                    </option>
                                                    @foreach($business AS $item)
                                                        <option value="{{$item->id}}"
                                                            {{(isset($filter['busine_id']) and $filter['busine_id']==$item->id) ?'selected' : ''}}>
                                                            {{ucwords(mb_strtolower($item->name))}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>País</label>
                                                <select class='form-control' id='country_id' name='country_id'>
                                                    <option value="">
                                                        País
                                                    </option>
                                                    @foreach($countries AS $item)
                                                        <option value="{{$item->id}}"
                                                            {{(isset($filter['country_id']) and $filter['country_id']==$item->id) ?'selected' : ''}}>
                                                            {{ucwords(mb_strtolower($item->name))}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Buscar</button>
                                    <a href="{{route('reports_complaint.index')}}" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Lista de registros</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>Usuario</th>
                                        <th>Email</th>
                                        <th>Título</th>
                                        <th>Empresa</th>
                                        <th>País</th>
                                        <th class="text-center">Estatus</th>
                                        <th class="text-center">Creado</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @if(count($complaints)>0)
                                        @foreach($complaints AS $items)
                                            <tr>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-secondary btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                            <div class="dropdown-menu" role="menu" id="{{$items->id}}">
                                                                <a class="dropdown-item edit_register" data-id="{{$items->id}}"> <i class="fa fa-edit"></i> Editar</a>
                                                                <a class="dropdown-item delete_register" data-id="{{$items->id}}"> <i class="fa fa-trash"></i> Eliminar</a>
                                                                <a class="dropdown-item download-file-complaint" data-id="{{$items->id}}">
                                                                    <i class="fa fa-book"></i> Archivos
                                                                </a>
                                                                <a class="dropdown-item modal-complaint" data-id="{{$items->id}}"> <i class="fa fa-search"></i> Detalle</a>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </td>

                                                <td>{{ucwords(mb_strtolower($items->firstname.' '.$items->lastname))}}</td>

                                                <td>{{$items->email}}</td>

                                                <td>{{ucwords(mb_strtolower($items->title))}}</td>

                                                <td>{{ucwords(mb_strtolower($items->busine_name))}}</td>

                                                <td>{{ucwords(mb_strtolower($items->country_name))}}</td>

                                                <td class="text-center">
                                                    @if($items->status == \App\Models\Complaint::COMPLAINT_ACTIVE)
                                                        <span class="badge bg-green">{{App\Models\Complaint::COMPLAINT_ACTIVE}}</span>
                                                    @else
                                                        <span class="badge bg-red">{{App\Models\Complaint::COMPLAINT_INACTIVE}}</span>
                                                    @endif
                                                </td>

                                                <td class="text-center">{{date('d/m/Y',strtotime($items->created_at))}}</td>
                                            </tr>
                                        @endforeach()
                                    @else
                                        <tr>
                                            <td colspan="8">
                                                @foreach ($errors->all() as $error)
                                                    <div class="alert alert-info alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                        <p><i class="icon fas fa-info"></i> {{ $error }}</p>
                                                    </div>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>

                                @if (isset($complaints))
                                    <div style="padding: 10px">
                                        {{ $complaints->appends(((isset($filter)) ? $filter : ''))->links() }}
                                    </div>
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    @include('backend.functions.functions_complaint')
@endsection