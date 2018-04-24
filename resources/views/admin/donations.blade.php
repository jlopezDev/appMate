@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row mb-30">
            <div class="col-md-6">
                <h1>Donaciones</h1>
            </div>
            <div class="col-md-6 text-right logout-container">
                <a href="/logout">Salir</a>
            </div>
        </div>
        <div class="row mb-50">
            <div class="col-md-12">
                <table class="table table-responsive datatable">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Nombres y Apellidos</td>
                            <td>E-mail</td>
                            <td>Tipo de pago</td>
                            <td>Monto</td>
                            <td>Estado</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($donations as $key => $donation)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $donation->first_name . " " . $donation->last_name }}</td>
                                <td>{{ $donation->email }}</td>
                                <td>
                                   @php
                                        if($donation->recurrent === "si"){
                                            if($donation->recurrent_mode === "mensual"){
                                                echo "Recurrente mensual";
                                            }else{
                                                echo "Recurrente anual";
                                            }
                                        }else{
                                             echo "Único";
                                        }
                                    @endphp
                                </td>
                                <td>${{ $donation->amount }}</td>
                                <td>
                                    @if($donation->recurrent === "si")
                                        @if($donation->status == "cancelada")
                                            Cancelada
                                        @else
                                            Activa
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    <a data-toggle="tooltip" data-placement="top" title="Ver" href="#" onclick="showDonation(this, {{$donation->id}})" class="btn btn-primary">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                   @if($donation->recurrent === "si")
                                       @if($donation->status == "cancelada")
                                            <a data-toggle="tooltip" data-placement="top" disabled href="#" class="btn btn-danger">
                                                <i class="fa fa-ban" aria-hidden="true"></i>
                                            </a>
                                        @else
                                            <a data-toggle="tooltip" data-placement="top" title="Cancelar suscripción" onclick="cancelDonation(this, {{$donation->id}})"  href="#" class="btn btn-danger">
                                                <i class="fa fa-ban" aria-hidden="true"></i>
                                            </a>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade donation" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Donación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <td>Nombres y Apellidos</td>
                            <td id="names"></td>
                        </tr>
                        <tr>
                            <td>Teléfono</td>
                            <td id="cell_phone"></td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td id="email"></td>
                        </tr>
                        <tr>
                            <td>País</td>
                            <td id="country"></td>
                        </tr>
                        <tr>
                            <td>Provincia</td>
                            <td id="province"></td>
                        </tr>
                        <tr>
                            <td>Dirección</td>
                            <td id="address"></td>
                        </tr>
                        <tr>
                            <td>Código postal</td>
                            <td id="zip_code"></td>
                        </tr>
                        <tr>
                            <td>Tipo de pago</td>
                            <td id="payment_type"></td>
                        </tr>
                        <tr>
                            <td>Monto</td>
                            <td id="amount"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection