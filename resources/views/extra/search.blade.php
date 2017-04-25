<div class='box search box-default pull-right'>
	<div class="box-header with-border">
		<input id='searchbar' placeholder="Search a building">
	</div>
	<div class="box-body" id='results' hidden>
		Search your building
		<!-- <div class="media">
		  <div class="media-left">
		    <img class="media-object imgmini" src="..." >
		  </div>
		  <div class="media-body">
		    <h5 class="media-heading">Media heading</h5>
		    <h5 class="text-muted">Description in short sentences</h5>
		  </div>
		</div>
		<div class="media">
		  <div class="media-left">
		    <img class="media-object imgmini" src="..." >
		  </div>
		  <div class="media-body">
		    <h5 class="media-heading imgmini">Media heading</h5>
		    ...
		  </div>
		</div>
		<div class="media">
		  <div class="media-left">
		      <img class="media-object imgmini" src="..." >
		  </div>
		  <div class="media-body">
		    <h5 class="media-heading">Media heading</h5>
		    ...
		  </div>
		</div> -->
	</div>
</div>

@section('divdepscript')
	<script>
		$(function() {
		

		$('#searchbar').typeahead({
		  minLength: 1,
		  classNames: {
		  	input: 'form-control',
		  	hint: 'form-control'
		  }
		},
		{
		  source: function(q,process){
		  	// console.log(q,process);
		  	return $.get('/autocomplete',{query:q},function(data){
		  		console.log("queried",data,q);
		  		// table.reset();
		  		// table.supply(data);
		  		if (data.length==0){
		  			$('#results').html('No building found');
		  		} else {
		  			var c = '';

		  			$(data).each(function(idx,obj){
		  				// var stock
		  				// console.log(idx,obj);
		  				var _c = "<a class='media' id="+obj.id+">"
			  				+	"<div class='media-left'>"
			    			+	"<img class='media-object imgmini' src={{ route('build.image',['name' => 'image.jpg']) }} ></div>"
							+	"<div class='media-body'>"
			    			+	"<h5 class='media-heading'>"+obj.name+"</h5>"
			    			+	"<h5 class='text-muted desc'>"+obj.description+"</h5>"
			  				+ "</div></a>"

			  				_c = _c.replace('image.jpg', obj.keyname+'.jpg')
			  			c += _c;
			  			if(idx >2){
			  				return false;
			  			}
		  			})

		  			$('#results').html(c);
		  		}
		  	})
		  }
		});


		$('#searchbar').on('typeahead:active',function(e){
			$('#results').show();
		})

		$('#searchbar').on('typeahead:idle',function(e){
			$('.box.search').on('click','.media',function(){
				var id=$(this).attr('id');
				// var modal =$('#buildModal')
				var obj=table.buildObjs[id-1];
				var modal =$('#buildModal')
				modifyModal(modal,obj)
				$('#results').hide(200);
			})
			// $('#results').hide();
		})
		});
	</script>
@endsection