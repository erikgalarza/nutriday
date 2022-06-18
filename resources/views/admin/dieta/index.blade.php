@extends('admin.dashboard')
@section('contenido')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <div class="page-header">
        <h3 class="page-title">
            Ver dietas
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dietas</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class=" mb-3" style="background-color:#4b6ac3 ">
            <h3 class="card-title text-center mb-4 mt-4 text-white" style="text-transform: uppercase; font-weight:bold">
                Dietas predefinidas</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table text-center">
                            <thead>
                                <tr>
                                    <th>N°</th>

                                    <th>Nombre dieta</th>
                                    <th>Tipo diabetes</th>
                                    <th>IMC</th>
                                    <th>Alimentos</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dietas_predefinidas as $key => $dieta)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>

                                        <td>{{ $dieta->nombre }}</td>
                                        <td>{{ $dieta->tipo_diabetes }}</td>

                                        @if ($dieta->imc == '1')
                                            <td>(Bajo peso)</td>
                                        @endif
                                        @if ($dieta->imc == '2')
                                            <td>(Normal)</td>
                                        @endif
                                        @if ($dieta->imc == '3')
                                            <td>(Sobrepeso)</td>
                                        @endif
                                        @if ($dieta->imc == '4')
                                            <td>(Obeso)</td>
                                        @endif




                                        <td>
                                            <a title="Agregar alimentos a la dieta"
                                                href="{{ route('alimento.addAlimentoDieta', $dieta->id) }}"
                                                class="btn btn-outline-success mb-1"><i class="fa fa-plus"></i></a>

                                            <a class="btn btn-outline-primary mb-1" title="Ver alimentos"><i
                                                    class="fa-solid fa-utensils"></i></a>
                                        </td>
                                        <td>

                                            <a title="Ver más" data-toggle="modal"
                                                data-target="#exampleModal-3{{ $dieta->id }}"
                                                class="btn btn-outline-info mb-1"><i class="fas fa-eye"></i></a>

                                            <a title="Editar datos de la dieta" class="btn btn-outline-warning mb-1"
                                                data-toggle="modal" data-target="#exampleModal-2{{ $dieta->id }}"><i
                                                    class="fas fa-edit"></i></a>

                                            <form method="post" id="deletecategoria"
                                                action="{{ route('dieta.destroy', $dieta->id) }}" class="d-inline">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button title="Eliminar dieta"
                                                    onclick="if(!confirm('Está seguro que desea eliminar la dieta?'))return false;"
                                                    type="submit" class="btn btn-outline-danger mb-1"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>


                                    <div class="modal fade" id="exampleModal-2{{ $dieta->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color:#4b6ac3">
                                                    <h5 class="modal-title text-white"
                                                        style="text-transform: uppercase; font-weight:bold; font-size:16px"
                                                        id="exampleModalLabel-2">
                                                        Editar dieta</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span style="color:white;font-size:30px"
                                                            aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body py-2 px-0">
                                                    <div class="col-12 row m-0 justify-content-center">
                                                        <div class="col-sm-9 mt-4 col-11 text-left">
                                                            <form method="POST"
                                                                action="{{ route('dieta.update', $dieta->id) }}">
                                                                @csrf
                                                                {{ method_field('PATCH') }}

                                                                <div class="form-group row mb-3">
                                                                    <label for="exampleInputUsername2"
                                                                        class="col-sm-4 col-form-label"><strong>Nombre
                                                                            dieta:</strong></label>
                                                                    <div class="col-sm-8">
                                                                        <input name="nombre" type="text"
                                                                            value="{{ $dieta->nombre }}"
                                                                            class="form-control"
                                                                            id="exampleInputUsername2" required>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row mb-3">
                                                                    <label for="exampleInputEmail2"
                                                                        class="col-sm-4 col-form-label"> <strong>Tipo
                                                                            diabetes:</strong></label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control" name="tipo_diabetes"
                                                                            id=""
                                                                            style="min-height:45.2px;background-color:#F0F0F0"
                                                                            required>

                                                                            <option value="1"
                                                                                {{ $dieta->tipo_diabetes == '1' ? 'selected' : '' }}>
                                                                                Tipo 1</option>
                                                                            <option value="2"
                                                                                {{ $dieta->tipo_diabetes == '2' ? 'selected' : '' }}>
                                                                                Tipo 2</option>
                                                                            <option value="3"
                                                                                {{ $dieta->tipo_diabetes == '3' ? 'selected' : '' }}>
                                                                                Gestacional</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row mb-3">
                                                                    <label for="exampleInputUsername2"
                                                                        class="col-sm-4 col-form-label"><strong>IMC:</strong></label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control" name="imc"
                                                                            class="form-control" id=""
                                                                            style="min-height:45.2px;background-color:#F0F0F0"
                                                                            required>
                                                                            <option value="1"
                                                                                {{ $dieta->imc == '1' ? 'selected' : '' }}>
                                                                                Bajo peso</option>
                                                                            <option value="2"
                                                                                {{ $dieta->imc == '2' ? 'selected' : '' }}>
                                                                                Normal</option>
                                                                            <option value="3"
                                                                                {{ $dieta->imc == '3' ? 'selected' : '' }}>
                                                                                Sobrepeso</option>
                                                                            <option value="4"
                                                                                {{ $dieta->imc == '4' ? 'selected' : '' }}>
                                                                                Obeso</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row mb-3">
                                                                    <label for="exampleInputUsername2"
                                                                        class="col-sm-4 col-form-label"><strong>Observaciones:</strong></label>
                                                                    <div class="col-sm-8">
                                                                        <textarea name="observaciones" cols="30" rows="5" value="{{ $dieta->observaciones }}" class="form-control"
                                                                            id="exampleInputUsername2" required>
                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                        </div>
                                                        <div
                                                            class="modal-footer mt-2 mb-0 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center">
                                                            <div
                                                                class="col-sm-6 col-11 mt-3 col-xl-7 justify-content-space-around">
                                                                <button type="submit"
                                                                    class="btn btn-success mb-2 col-12 col-sm-5">Guardar</button>
                                                                <button type="button"
                                                                    class="btn btn-light mb-2 col-12 col-sm-5"
                                                                    data-dismiss="modal">Cancelar</button>
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>





                                    <div class="modal fade" id="exampleModal-3{{ $dieta->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #4b6ac3">
                                                    <h5 class="modal-title text-lg-center text-white"
                                                        style="text-transform: uppercase; font-weight:bold;  id="
                                                        ModalLabel">
                                                        Datos de la dieta</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span style="color:white;font-size:30px"
                                                            aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body py-3 px-0">

                                                    <div class="col-12 row m-0 justify-content-center">
                                                        <div class="col-sm-12 pl-3 col-11 text-left justify-content-center">

                                                            <div class="form-group row mb-2">
                                                                <label class="col-sm-4"><strong>Nombre:</strong>
                                                                </label>
                                                                <label
                                                                    class="col-sm-8">{{ $dieta->nombre }}</label>
                                                            </div>

                                                            <div class="form-group row mb-2">
                                                                <label class="col-sm-4"><strong>Tipo de
                                                                        diabetes:</strong>
                                                                </label>
                                                                <label
                                                                    class="col-sm-8">{{ $dieta->tipo_diabetes }}</label>
                                                            </div>

                                                            <div class="form-group row mb-2">
                                                                <label class="col-sm-4"><strong>IMC:</strong></label>
                                                                <label class="col-sm-8">{{ $dieta->imc }}
                                                                    (Normal)
                                                                </label>

                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label
                                                                    class="col-sm-4"><strong>Observaciones:</strong></label>
                                                                @if (isset($dieta->observaciones))
                                                                    <label
                                                                        class="col-sm-8">{{ $dieta->observaciones }}</label>
                                                                @else
                                                                    <label class="col-sm-8">Sin observaciones</label>
                                                                @endif
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label class="col-sm-4"><strong>Fecha
                                                                        creación:</strong></label>
                                                                <label
                                                                    class="col-sm-8">{{ $dieta->created_at }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>







    <div class="card mt-5">

        <div class=" mb-3" style="background-color: #4eba74 ">
            <h3 class="card-title text-center mb-4 mt-4 text-white" style="text-transform: uppercase; font-weight:bold">
                Dietas Asignadas</h3>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table text-center">
                            <thead>
                                <tr>
                                    <th>N°</th>

                                    <th>Nombre dieta</th>
                                    <th>Tipo diabetes</th>
                                    <th>IMC</th>
                                    <th>Paciente</th>
                                    <th>Alimentos</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pacientesc as $key => $paciente)
                                    {{-- MODAL PARA VER ALIMENTOS DE LA DIETA --}}

                                    <div class="modal fade" id="exampleModal-4{{ $paciente->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #4b6ac3">
                                                    <h5 class="modal-title text-lg-center text-white"
                                                        style="text-transform: uppercase; font-weight:bold;  id="
                                                        ModalLabel">
                                                        Alimentos de la dieta</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span style="color:white;font-size:30px"
                                                            aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body py-3 px-0">
                                                    <div class="container">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h4 class="card-title">Dieta semanal</h4>
                                                                <p class="card-description">Paciente: </p>

                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @php
                                                                        $dias = ['L', 'M', 'M', 'J', 'V', 'S', 'D'];
                                                                    @endphp

                                                                    @for ($i = 0; $i <= 6; $i++)
                                                                        <li class="nav-item">
                                                                            <a onclick="opcion({{ $i }});"
                                                                                class="nav-link {{ $i == 0 ? 'active' : '' }}"
                                                                                id="{{ $i }}-tab"
                                                                                data-toggle="tab"
                                                                                href="#{{ $i }}-1" role="tab"
                                                                                aria-controls="{{ $i }}-1"
                                                                                aria-selected="{{ $i == 0 ? 'true' : 'false' }}">{{ $dias[$i] }}</a>
                                                                        </li>
                                                                    @endfor
                                                                </ul>


                                                                <div class="tab-content">
                                                                    @for ($i = 0; $i <= 6; $i++)
                                                                        <div class="tab-pane fade {{ $i == 0 ? 'show active' : '' }}"
                                                                            id="{{ $i }}-1" role="tabpanel"
                                                                            aria-labelledby="{{ $i }}-tab">
                                                                            <div class="media">
                                                                                <img class="mr-3 w-25 rounded"
                                                                                    src="../../images/samples/300x300/13.jpg"
                                                                                    alt="sample image">
                                                                                <div class="media-body">
                                                                                    <h4 class="mt-0">Why choose
                                                                                        us?</h4>
                                                                                    <p>
                                                                                        {{ $i + 1 }}
                                                                                    <h2 id="texto{{ $i }}"></h2>
                                                                                    </p>
                                                                                    <div class="container"
                                                                                        id="box{{ $i }}">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endfor
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    @foreach ($paciente->dietas()->get() as $dieta)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $dieta->nombre }}</td>
                                            <td>{{ $dieta['tipo_diabetes'] }}</td>
                                            @if ($dieta['imc'] <= 18.4)
                                                <td>{{ $dieta['imc'] }} (Bajo peso)</td>
                                            @endif
                                            @if ($dieta['imc'] >= 18.5 && $dieta['imc'] <= 24.9)
                                                <td>{{ $dieta['imc'] }} (Normal)</td>
                                            @endif
                                            @if ($dieta['imc'] >= 25 && $dieta['imc'] <= 29.9)
                                                <td>{{ $dieta['imc'] }} (Sobrepeso)</td>
                                            @endif
                                            @if ($dieta['imc'] >= 30)
                                                <td>{{ $dieta['imc'] }} (Obeso)</td>
                                            @endif
                                            <td>
                                                <a href="">{{ $paciente->nombre }} {{ $paciente->apellido}}</a>
                                            </td>


                                            <td>
                                                <a title="Agregar alimentos a la dieta"
                                                    href="{{ route('alimento.addAlimentoDieta', $dieta->id) }}"
                                                    class="btn btn-outline-success mb-1"><i
                                                        class="fa fa-plus"></i></a>
                                                <a onclick="obtenerIdPaciente({{ $paciente->id }});obtenerIdDieta({{ $dieta->id }});"
                                                    data-toggle="modal" data-target="#exampleModal-4{{ $paciente->id }}"
                                                    class="btn btn-outline-primary mb-1" title="Ver alimentos"
                                                    href="{{ route('alimento.alimentosByDieta', $dieta->id) }}"><i
                                                        class="fa-solid fa-utensils"></i></a>
                                            </td>
                                            <td>

                                                <a title="Ver más" data-toggle="modal"
                                                    data-target="#exampleModal-3{{ $dieta->id }}"
                                                    class="btn btn-outline-info mb-1"><i class="fas fa-eye"></i></a>
                                                {{-- <a title="Editar datos de la dieta" class="btn btn-outline-warning mb-1" data-toggle="modal" data-target="#exampleModal-2{{$dieta->id}}"><i class="fas fa-edit"></i></a> --}}

                                                <form method="post" id="deletecategoria"
                                                    action="{{ route('dieta.destroy', $dieta->id) }}"
                                                    class="d-inline">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button title="Eliminar dieta"
                                                        onclick="if(!confirm('Está seguro que desea eliminar la dieta?'))return false;"
                                                        type="submit" class="btn btn-outline-danger mb-1"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>


                                        <div class="modal fade" id="exampleModal-2{{ $dieta->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color:#4b6ac3">
                                                        <h5 class="modal-title text-white"
                                                            style="text-transform: uppercase; font-weight:bold; font-size:16px"
                                                            id="exampleModalLabel-2">
                                                            Editar dieta</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span style="color:white;font-size:30px"
                                                                aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body py-2 px-0">
                                                        <div class="col-12 row m-0 justify-content-center">
                                                            <div class="col-sm-9 mt-4 col-11 text-left">
                                                                <form method="POST"
                                                                    action="{{ route('dieta.update', $dieta->id) }}">
                                                                    @csrf
                                                                    {{ method_field('PATCH') }}

                                                                    <div class="form-group row mb-3">
                                                                        <label for="exampleInputUsername2"
                                                                            class="col-sm-4 col-form-label"><strong>Nombre
                                                                                dieta:</strong></label>
                                                                        <div class="col-sm-8">
                                                                            <input name="nombre" type="text"
                                                                                value="{{ $dieta->nombre }}"
                                                                                class="form-control"
                                                                                id="exampleInputUsername2" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row mb-3">
                                                                        <label for="exampleInputEmail2"
                                                                            class="col-sm-4 col-form-label"> <strong>Tipo
                                                                                diabetes:</strong></label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-control"
                                                                                name="tipo_diabetes" id=""
                                                                                style="min-height:45.2px;background-color:#F0F0F0"
                                                                                required>

                                                                                <option value="1"
                                                                                    {{ $dieta->tipo_diabetes == '1' ? 'selected' : '' }}>
                                                                                    Tipo 1</option>
                                                                                <option value="2"
                                                                                    {{ $dieta->tipo_diabetes == '2' ? 'selected' : '' }}>
                                                                                    Tipo 2</option>
                                                                                <option value="3"
                                                                                    {{ $dieta->tipo_diabetes == '3' ? 'selected' : '' }}>
                                                                                    Gestacional</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>


                                                                    <div class="form-group row mb-3">
                                                                        <label for="exampleInputUsername2"
                                                                            class="col-sm-4 col-form-label"><strong>Observaciones:</strong></label>
                                                                        <div class="col-sm-8">
                                                                            <textarea name="observaciones" cols="30" rows="5" value="{{ $dieta->observaciones }}" class="form-control"
                                                                                id="exampleInputUsername2" required>
                              </textarea>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                            </div>
                                                            <div
                                                                class="modal-footer mt-2 mb-0 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center">
                                                                <div
                                                                    class="col-sm-6 col-11 mt-3 col-xl-7 justify-content-space-around">
                                                                    <button type="submit"
                                                                        class="btn btn-success mb-2 col-12 col-sm-5">Guardar</button>
                                                                    <button type="button"
                                                                        class="btn btn-light mb-2 col-12 col-sm-5"
                                                                        data-dismiss="modal">Cancelar</button>
                                                                </div>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>




                                        <div class="modal fade" id="exampleModal-3{{ $dieta->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color: #4b6ac3">
                                                        <h5 class="modal-title text-lg-center text-white"
                                                            style="text-transform: uppercase; font-weight:bold;  id="
                                                            ModalLabel">
                                                            Datos de la dieta</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span style="color:white;font-size:30px"
                                                                aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body py-3 px-0">

                                                        <div class="col-12 row m-0 justify-content-center">
                                                            <div
                                                                class="col-sm-12 pl-3 col-11 text-left justify-content-center">

                                                                <div class="form-group row mb-2">
                                                                    <label class="col-sm-4"><strong>Nombre:</strong>
                                                                    </label>
                                                                    <label
                                                                        class="col-sm-8">{{ $dieta->nombre }}</label>
                                                                </div>

                                                                <div class="form-group row mb-2">
                                                                    <label class="col-sm-4"><strong>Tipo de
                                                                            diabetes:</strong> </label>
                                                                    <label
                                                                        class="col-sm-8">{{ $dieta->tipo_diabetes }}</label>
                                                                </div>

                                                                <div class="form-group row mb-2">
                                                                    <label
                                                                        class="col-sm-4"><strong>IMC:</strong></label>
                                                                    <label class="col-sm-8">{{ $dieta->imc }}
                                                                        (Normal)
                                                                    </label>

                                                                </div>
                                                                <div class="form-group row mb-2">
                                                                    <label
                                                                        class="col-sm-4"><strong>Observaciones:</strong></label>
                                                                    @if (isset($dieta->observaciones))
                                                                        <label
                                                                            class="col-sm-8">{{ $dieta->observaciones }}</label>
                                                                    @else
                                                                        <label class="col-sm-8">Sin
                                                                            observaciones</label>
                                                                    @endif
                                                                </div>
                                                                <div class="form-group row mb-2">
                                                                    <label class="col-sm-4"><strong>Fecha
                                                                            creación:</strong></label>
                                                                    <label
                                                                        class="col-sm-8">{{ $dieta->created_at }}</label>
                                                                </div>

                                                            </div>
                                                        </div>





                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                    </div>
                    @endforeach
                    @endforeach
                    </tbody>
                    </table>


                </div>


            </div>
        </div> <!-- Fin card de arriba -->
        {{-- {{ $dietas->links() }} --}}
    </div>
    </div>
    {{-- {{ $dietas->links() }} --}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        var pacienteid = null,
            dietaid = null;

        function opcion(id) {

            console.log('616')
            document.getElementById('texto' + id).textContent = 'texto' + id;
            $.ajax({
                url: "{{ route('dieta.traerAlimentos') }}",
                dataType: "json",
                data: {
                    dieta_id: dietaid,
                    paciente_id: pacienteid
                }
            }).done(function(res) {
                console.log(res)
            })
            // traerAlimentos(pacienteid,dietaid);
        }

        function obtenerIdPaciente(idpaciente) {
            console.log('621')
            pacienteid = idpaciente;
        }

        function obtenerIdDieta(iddieta) {
            console.log('626')
            dietaid = iddieta;
            console.log('valor de dietaid:' + dietaid + ' valor de pacienteid:' + pacienteid);

        }

        function traerAlimentos(pacienteid, dietaid) {
            console.log('632')

        }
    </script>
@endsection
