
<div class="col-md-{{$size}}">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><a href="{{url('/front/projet/'.$projet->id)}}">{{$projet->intitule}}</a></h4>
            <h6 class="card-subtitle mb-2 text-muted">
                <span>{{$projet->resume}}</span>
                <a href="{{url('/front/projet/'.$projet->id)}}">(Lisez Plus)</a>
            </h6>
        </div>
    </div>
</div>