

<div class="col-md-{{$size}}">
    <div class="theme-block theme-block-hover">
        <div class="theme-block-picture">
            <div class="blog-full-date">{{$pub->mois}}  {{$pub->annee}}</div>
            <img src="{{asset('uploads/types/'.$type.'.jpeg')}}" alt="">
        </div>
        <div class="theme-block-data service-block-data">
            <div class="service-icon"><img src="{{asset($photo)}}" alt="" class="fa"></div>
            <br><br>
            @foreach($users as $user)
                <h6 class="paragraph-small paragraph-black service-description">Par {{$user->name}}  {{$user->prenom}}</h6>
            @endforeach
            <h6 style="text-align:left"><a href="{{$pub->detail}}">{{$pub->titre}}</a></h6>
            <p class="paragraph-small paragraph-black service-description">
                <span>{{substr($pub->resume,0,200)}}</span>
                <?php 
                    $lien="";
                     if($pub->doi != "")
                        $lien =  $pub->doi;
                    else
                        $lien =  $pub->detail;
                 ?>
                <a href="{{asset($lien)}}" target="_blank">(Lisez plus)</a>
            </p>
        </div>
    </div>
</div>