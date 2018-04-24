@extends('layouts.app')
@section('content')
    <div class="container" style="height: 54em;">
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1"></div>
            <div class="col-lg-7 col-md-7 col-sm-7">
                <br><br><br><br>
                <div>
                    <h2 class="texto-gracias">¡GRACIAS!</h2><br><br>
                    <h1 class="parrafo-gracias sombrado">
                        Por creer y construir un mismo propósito:
                        “Promover la cultura visual y las industrias creativas en el Perú”.
                        <br><br>
                        <img class="img_firma" src="/assets/img/firma.png" />
                    </h1>
                </div>
                <div class="social">
                    <ul>
                        <li>
                            <a target="_blank" class="btn btn-fb" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode('http://matemuseo.com/donacion') ?>">
                                <i class="fa fa-facebook" aria-hidden="true"></i> Compartir en Facebook
                            </a>
                        </li>
                        <li>
                            <a target="_blank" class="btn btn-tw" href="http://twitter.com/home?status=<?php echo urlencode("He donado a MATE, ayudando a desarrollar la creatividad y el talento de los niños, tu también puedes donar y promover la educación y el arte ingresando al sitio http://matemuseo.com/donacion"); ?>">
                                <i class="fa fa-twitter" aria-hidden="true"></i> Compartir en Twitter
                            </a>
                        </li>
                        <li>
                            <a target="_blank" class="btn btn-ct" href="/certificado/{{$token}}">
                                <i class="fa fa-download" aria-hidden="true"></i> Certificado de Donación
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <form class="form-style" id="message-form">
                    <input type="hidden" name="lang" id="lang" value="es" />
                    <div class="form-group">
                        <label for="comment">Escríbe tu mensaje aquí</label>
                        <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="email">Tu Email:</label>
                        <input type="email" class="form-control" id="email" name="email" />
                    </div>
                    <div class="form-group">
                        <label for="nombre">Tu Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="dest">Destinatario(s):</label><br>
                        <p class="text-send">Puedes ingresar hasta 10 emails como<br>máximo separados por comas.</p>
                        <input type="text" class="form-control" id="dest" name="dest">
                    </div>
                    <div class="form-group">
                        <label for="asunto">Asunto:</label>
                        <p class="text-promueve">Promueve la Educación y el Arte</p>
                    </div>

                    <div class="col-md-12" style="float: left;">
                        <button id="send-message" class="btn" type="button" onclick="send_thanks(this)">ENVIAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection