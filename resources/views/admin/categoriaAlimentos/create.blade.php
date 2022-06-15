@extends('admin.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
       Agregar categoría
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Agregar categoría</li>
        </ol>
    </nav>
</div>
<div class="row">

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="mb-3" style="background-color:#4b6ac3">
                <h3 class="card-title titulosa text-lg-center mb-5 mt-5 text-white" style="text-transform: uppercase; font-weight:bold">Datos de la categoría</h3>
                </div>
            <div class="card-body" style="padding-right:13rem;padding-left:13rem">


                <form method="POST"  class="forms-sample" action="{{route('categoriaAlimento.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2"
                            class="col-sm-3 col-form-label">Nombre de la categoría:</label>
                        <div class="col-sm-9">
                            <input style="border-radius:10px;"  name="nombre" type="text" class="form-control" id="exampleInputUsername2" placeholder="Ingrese el nombre">
                        </div>
                    </div>
                    <div class="mt-5 form-group text-center">
                    <button type="submit" onclick="windows.location.href='{{route('categoriaAlimento.index')}}'" class="btn btn-success mr-2">Guardar</button>
                    <a type="button" class="btn btn-light" href="{{route('categoriaAlimento.index')}}">Cancelar</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
