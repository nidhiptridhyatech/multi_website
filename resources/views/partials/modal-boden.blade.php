<!-- Modal -->
<div class="modal fade" id="cityModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Bodenbeläge in Ihrer Nähe...</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <h4>Bodenbeläge in ...</h4>
            <ul class="list-inline">
            @foreach($all as $city)
              <li class="col-md-3 col-xs-6"><a href="/bodenbelaege/{{$city->alias}}" title="Bodenbeläge {{$city->name}}">{{$city->name}}</a></li>
            @endforeach
            </ul>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
      </div>
    </div>
  </div>
</div>