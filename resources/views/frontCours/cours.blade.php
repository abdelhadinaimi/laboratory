@extends('layouts.frontCours')

@section('title','Cours')

@section('content')
        <div class="theme-material-card">
        	<div class="sub-ttl font-28">Listes des cours de {{$module->libelle}}</div>
                            <div class="theme-accordion-container">
                            	@foreach ($cours as $cour) 
                                <div class="theme-accordion">
                                    <div class="theme-accordion-hdr">
                                        <h4 class="color-green"><i class="fa fa-graduation-cap"></i> {{$cour->libelle}}</h4>
                                        <div class="theme-accordion-control"><i class="fa fa-plus"></i></div>
                                    </div>
                                    <div class="theme-accordion-bdy">
                                        <div class="row service-accordian">
                   
                                            <div class="col-lg-6">
                                            	<h3><strong>{{$cour->description}}</strong></h3>
                                            	<?php 
                                            		$fileName = explode("/", $cour->fiche);
                                            		$fileName = end($fileName);
                                            	 ?>
                                            	<div class="row">
                                            		<div class="col-md-2"><a href="{{URL::asset($cour->fiche)}}" target="_blank"><i class="fa fa-eye"></i>afficher</a> </div>
                                            		<div class="col-md-2"><a href="download/{{$fileName}}">
                                            			<i class="fa fa-download"></i>Telecharger</a></div>
                                            	</div>
                                            	<br>
                                            	
                                                
                                            </div>
                                            <div class="col-lg-6">
                                            	<h3><strong>fichier joints:</strong></h3>
                                            	<?php 
                                            		$joinFiles = explode(" ", $cour->joins);
                                            		$lenthJoins = sizeof($joinFiles)-1;
                                            		array_pop($joinFiles);
                                            	 ?>
                                            	
                                                @foreach ($joinFiles as $joinFile)
                                                <?php 
                                            		$fileName = explode("/", $joinFile);
                                            		$fileName = end($fileName);
                                            	 ?>
                                            	 {{$fileName}}
                                            	 <div class="row">
                                            		<div class="col-md-4"><a href="{{URL::asset($joinFile)}}" target="_blank"><i class="fa fa-eye"></i>afficher</a> </div>
                                            		<div class="col-md-4"><a href="download/{{$fileName}}">
                                            			<i class="fa fa-download"></i>Telecharger</a></div>
                                            	</div>

                                                @endforeach
                                                
                                            </div>
                                            <p class="pull-right" style="color: #25c1d0;">publie à {{$cour->pub_time}}</p>
                                        </div>
                                    </div>
                                </div>
                                 @endforeach
                            </div>
                        </div>

@endsection
