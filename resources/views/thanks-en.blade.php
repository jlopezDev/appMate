@extends('layouts.app')
@section('content')
    <meta property="og:description" content="MATE – Museo Mario Testino is a not-for-profit centre established to contribute to Peru through the cultivation and promotion of culture and heritage." />
    <div class="container" style="height: 54em;">
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1"></div>
            <div class="col-lg-7 col-md-7 col-sm-7">
                <br><br><br><br>
                <div>
                    <h2 class="texto-gracias">Thank you!</h2><br><br>
                    <h1 class="parrafo-gracias sombrado">
                        For believing in and working towards a shared purpose:
                        “To promote visual culture and the creative industries in Peru”.
                        <br><br>
                        <img class="img_firma" src="https://www.mate.pe/demo-donacion/assets/img/firma.png" />
                    </h1>
                </div>
                <div class="social">
                    <ul>
                        <li>
                            <a target="_blank" class="btn btn-fb" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode('https://www.mate.pe/demo-donacion') ?>">
                                <i class="fa fa-facebook" aria-hidden="true"></i> Share on Facebook
                            </a>
                        </li>
                        <li>
                            <a target="_blank" class="btn btn-tw" href="http://twitter.com/home?status=<?php echo urlencode("I have donated to MATE, contributing to develop the children creativity and talent. You can also help to promote education and art by donating here https://www.mate.pe/demo-donacion"); ?>">
                                <i class="fa fa-twitter" aria-hidden="true"></i> Share on Twitter
                            </a>
                        </li>
                        <li>
                            <a target="_blank" class="btn btn-ct" href="/certificado/{{$token}}">
                                <i class="fa fa-download" aria-hidden="true"></i> Donation certificate
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <form class="form-style" id="message-form">
                    <input type="hidden" name="lang" id="lang" value="en" />
                    <div class="form-group">
                        <label for="comment">Write your message here</label>
                        <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email:</label>
                        <input type="email" class="form-control" id="email" name="email" />
                    </div>
                    <div class="form-group">
                        <label for="nombre">Your Name:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="dest">Address(es):</label><br>
                        <p class="text-send">You can enter up to 10 emails as <br>maximum separated by commas.</p>
                        <input type="text" class="form-control" id="dest" name="dest">
                    </div>
                    <div class="form-group">
                        <label for="asunto">Subject:</label>
                        <p class="text-promueve">Promotes Education and Art</p>
                    </div>

                    <div class="col-md-12" style="float: left;">
                        <button id="send-message" class="btn" type="button" onclick="send_thanks(this)">SEND</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection