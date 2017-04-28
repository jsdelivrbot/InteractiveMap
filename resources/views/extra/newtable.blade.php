<div class="box-group" id="accordion">
  <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
  <div class="panel box box-sm box-success" hidden>
    <div class="box-header with-border">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" id='b_name'>
          Collapsible Group Item #1
        </a>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="box-body">
        <div class="media">
  			  <div class="media-left" style="min-height: 150px;min-width: 150px;">
  			   <a href="#">
  			    	<img class="media-object" src="http://localhost:8000/buildimgs/undefined.jpg" style="height: 150px;width: 150px;">
  			    </a>
  			  </div>
  			  <div class="media-body">
            <div class="row">
              <div class="col-md-6">
                <p><strong class="text-info">Id: </strong><span id="b_id" class="text-muted">Hello</span></p>
                <p><strong class="text-info">Key: </strong><span id="b_keyname" class="text-muted">Hello</span></p>
                <p><strong class="text-info">Height: </strong><span id="b_height" class="text-muted">Somewhere over the rainbow, blue birds fly</span></p>
                <p><strong class="text-info">Est. Land Area: </strong><span id="b_area" class="text-muted">Somewhere over the rainbow, blue birds fly</span> meters sq.</p>

              </div>
              <div class="col-md-6">
                <!-- <h5 class="media-heading imgmini text-info">Description</h5> -->
                <label class="text-info">Description</label>
                <p class="text-muted" id='b_desc'> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                    wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                    eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                    nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                    farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                    labore sustainable VHS...</p>
              </div>
            </div>
  			  </div>
  			</div>
      </div>
    </div>
  </div>
</div>
@section('testscript')
  <script>
    $(function(){
      var container = $('#accordion'),
        format = $('.panel.box'),
        testx;

        $.ajax({
          type: 'GET',
          dataType: 'JSON',
          url: '/b',
          // ajax:false,
          success: function(buildings){
            // console.log(buildings)
            var allcontent;

            $(buildings).each( function(ind,obj){
              var content = format.clone(true);
              content.find('#b_name').html(obj.name);
              content.find('#b_name').attr('href','#build'+obj.id);
              content.find('.panel-collapse.collapse').attr('id','build'+obj.id);
              imgroute = 'http://localhost:8000/buildimgs/'+obj.keyname+'.jpg'; //Bad route name.. must be flexed to laravel prescribed. or follow search blade specification.
              content.find('.media-object').attr('src',imgroute);
              content.find('#b_id').html(obj.id)
              content.find('#b_keyname').html(obj.keyname)
              content.find('#b_height').html(obj.height)
              content.find('#b_area').html(obj.area)
              content.find('#b_desc').html(obj.description);
              content.show();
              content.appendTo("#accordion")
            })
            // testx = buildings;
          }
        });
        
        // console.log(container,format,testx)
    })

  </script>
@endsection