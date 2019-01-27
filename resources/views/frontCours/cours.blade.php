@extends('layouts.frontCours')

@section('title','Cours')

@section('content')
        <div class="theme-material-card">
                    <div class="row">
                        <a href="javascript:history.back()" style="border-style: solid;" class="btn btn-outline-info m-2"> <i style="font-size: 1.5em;" class="fa fa-arrow-circle-left"></i> Retour</a>
                    </div>

        	<div class="sub-ttl font-28">Listes des chapitres {{$module->libelle}}</div>
                            <div class="theme-accordion-container">
                            	@foreach ($cours as $cour) 
                                <div class="theme-accordion">
                                    <div class="theme-accordion-hdr">
                                        <h4 class="color-green"><i class="fa fa-graduation-cap"></i> {{$cour->libelle}}</h4>
                                        <div class="theme-accordion-control"><i class="fa fa-plus"></i></div>
                                    </div>
                                    <div class="theme-accordion-bdy">
                                        <div class="row service-accordian">
                   
                                            <div class="container" >
                                            	<h3 align="center"><strong>{{$cour->description}}</strong></h3><br>
                                                <?php
                                                $joinFiles =  explode(",",$cour->joins);
                                                $lenthJoins = sizeof($joinFiles)-1;
                                                //array_pop($joinFiles);
                                                ?>
                                                <ul class="theme-list" >

                                                @foreach ($joinFiles as $joinFile)
                                                    <?php
                                                    $fileName = explode("/", $joinFile);
                                                    $fileName = end($fileName);
                                                    ?>

                                                        <li>
                                                            <div class="row">

                                                                <div class="col-lg-4"><i class="fa fa-arrow-right color-green"></i>{{substr($fileName,2)}}</div>
                                                            <div class="col-lg-4"><a href="{{URL::asset($joinFile)}}" target="_blank"><i class="fa fa-eye"></i>Afficher</a> </div>
                                                            <div class="col-lg-4"><a href="download/{{$fileName}}">
                                                                    <i class="fa fa-download"></i>Télécharger</a></div>
                                                            </div></li>


                                                @endforeach
                                                </ul>
                                                <p class="pull-right" style="color: #25c1d0;">publié le {{$cour->pub_time}}</p>
                                            </div>
                                        </div>
                                            
                                        </div>
                                    </div>
                                                                     @endforeach

                                </div>
                            </div>
                        </div>

@endsection
