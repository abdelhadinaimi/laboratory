
<div class="col-md-{{$size}}" style="padding-bottom: 30px;">
    <div class="card" style="height:100%;">
    <div class="theme-block-picture">
            <img src="{{asset($projet->photo)}}" style="max-height: 250px;">
        </div>
        <div class="card-body">
            <h4 class="card-title"><a href="{{url('/front/projet/'.$projet->id)}}">{{$projet->intitule}}</a></h4>
            <h6 class="card-subtitle mb-2 text-muted">
                <span>{{$projet->resume}}</span>
                <a href="{{url('/front/projet/'.$projet->id)}}">(Lisez Plus)</a>
            </h6>
        </div>
    </div>
</div>