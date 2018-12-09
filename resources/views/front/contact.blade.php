@extends('layouts.frontMaster')

@section('title','Contact')

@section('content')

    @component('components.breadcrumbs')
        @slot('title')
            @yield('title')
        @endslot
        @yield('title')    
    @endcomponent
    <div class="layer-stretch">
        <div class="row layer-wrapper">
            <div style="width:100%;">
                <div class="theme-material-card">
                    <div class="box-body">
                        <div class="row container">
                            <div class="col-md-3">
                                <strong><i class="fa fa-phone"></i>  Telephone</strong>
                            </div>
                            <div class="col-md-9">
                                <p class="text-muted">+213 43 34 43 34</p>
                            </div>
                        </div>
                        <div class="row container">
                            <div class="col-md-3">
                                <strong><i class="fa fa-phone"></i>  Fax</strong>
                            </div>
                            <div class="col-md-9">
                                <p class="text-muted">+213 43 34 43 34</p>
                            </div>
                        </div>
                        <div class="row container">
                            <div class="col-md-3">
                                <strong><i class="fa fa-envelope-o"></i>  E-Mail</strong>
                            </div>
                            <div class="col-md-9">
                                <p class="text-muted"><a href="mailto:lrit@univ-tlemcen.dz">lrit@univ-tlemcen.dz</a></p>
                            </div>
                        </div>
                        <div class="row container">
                            <div class="col-md-3">
                                <strong><i class="fa fa-home"></i>  Address</strong>
                            </div>
                            <div class="col-md-9">
                                <p class="text-muted">Université de Tlemcen Rue Luis Pasteur, Rocade(Nouveau pole), Tlemcen, Algérie </p>
                            </div>
                        </div>        
                    </div>
                    <form id="contact-form" method="POST" action="{{ url('front/contact') }}">
                    {{ csrf_field() }}
                        <div class="layer-stretch">
                            <div class="layer-wrapper">
                                <div class="layer-ttl"><h3>Contactez Nous</h3></div>
                                <div class="contact-form row text-center">
                                    <div class="col-md-4">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                                            <i class="fa fa-user-o"></i>
                                            <input id="contact-name" class="mdl-textfield__input" type="text" pattern="[A-Z,a-z, ]{,255}" required name="nom">
                                            <label class="mdl-textfield__label" for="contact-name">Votre Nom</label>
                                            <span class="mdl-textfield__error">Entrez un nom valide</span>
                                        </div>
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                                            <i class="fa fa-envelope-o"></i>
                                            <input class="mdl-textfield__input" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="contact-email" required name="email">
                                            <label class="mdl-textfield__label" for="contact-email">Votre Email</label>
                                            <span class="mdl-textfield__error">Entrez un email correct!</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                                            <i class="fa fa-phone"></i>
                                            <input class="mdl-textfield__input" type="text" pattern="[0-9]*" id="contact-mobile" required name="telephone">
                                            <label class="mdl-textfield__label" for="contact-mobile">Votre Numero Mobile</label>
                                            <span class="mdl-textfield__error">Entrez un numero correct</span>
                                        </div>
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                                            <i class="fa fa-rocket"></i>
                                            <input class="mdl-textfield__input" type="text" id="contact-subject" required name="sujet">
                                            <label class="mdl-textfield__label" for="contact-subject">Votre Sujet</label>
                                            <span class="mdl-textfield__error">Entrez un sujet</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                                            <i class="fa fa-paper-plane"></i>
                                            <textarea class="mdl-textfield__input" id="contact-message" required name="msg"></textarea>
                                            <label class="mdl-textfield__label" for="contact-message">Votre Message</label>
                                            <span class="mdl-textfield__error">Entrer votre message</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 contact-error">

                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-submit">
                                            <button id="submit-contact" class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect mdl-button--raised button button-primary contact-submit">Envoyer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Request Form Section -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
 <!-- ils sont importants pour le slider -->
<script>

</script>
@endsection