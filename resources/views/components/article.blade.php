

<div class="col-md-6">
    <div class="theme-block theme-block-hover">
        <div class="theme-block-picture">
            <div class="blog-full-date">{{$pub->mois}}  {{$pub->annee}}</div>
            <img src="{{asset('uploads/types/'.$type.'.jpeg')}}" alt="">
        </div>
        <div class="theme-block-data service-block-data">
            <div class="service-icon"><img src="{{asset($pub->photo)}}" alt="" class="fa"></div>
            <br><br>
            <h6 class="paragraph-small paragraph-black service-description">Par {{$pub->name}}  {{$pub->prenom}}</h6>
            <h6 style="text-align:left"><a href="#">{{$pub->titre}}</a></h6>
            <p class="paragraph-small paragraph-black service-description">
                <span>{{$pub->resume}}</span>
                <a href="#">(Read More)</a>
            </p>
        </div>
    </div>
</div>