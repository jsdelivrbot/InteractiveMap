<div class="modal fade" tabindex="-1" role="dialog" id='addBuild'>
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body" >

          <div id="map_build" style='height: 540px;'>
            
            <div class="box map_info box-default pull-left">
              <div class="box-header with-border">
                <strong>
                  Building Information
                </strong>
                <button class="btn btn-sm btn-box-tool" type="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content='All other variables are hidden but collected for storage. 3D Building will initiate after submitting form.'><i class="fa fa-question"></i></button>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" type="button" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="box-body">

                <form action="modify/add" data-toggle="validator" method="post" role="form" id="buildform" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="name" data-toggle="tooltip" data-placement="top" title='General Name of Building.'>Name</label>
                    <input type="text" class="form-control input-sm" name="name" id="name" placeholder="Name" required>
                  </div>

                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label for="keyname" data-toggle="tooltip" data-placement="top" title='Single word identifier for this building.'>Key name</label>
                        <input type="text" class="form-control input-sm" name="keyname" id="keyname" placeholder="Keyname" required>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="height" data-toggle="tooltip" data-placement="top" title='Number of floors.'>Height</label>
                        <input type="text" class="form-control input-sm" name="height" id="height" placeholder="by Floor" onkeyup="setHeight(this)" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <label for="wallcolor">WallColor<a data-toggle="tooltip" data-placement="top" title='Colors will be shown on front pages.'>*</a></label>
                      <div id="cp1" class="input-group colorpicker-component"> 
                        <input type="text" onchange="setWallcolor(this)" value="#00AABB" name="wallcolor" id="wallcolor" class="form-control input-sm" required> 
                        <span class="input-group-addon"><i></i></span> 
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <label for="roofcolor">RoofColor<a data-toggle="tooltip" data-placement="top" title='Colors will be shown on front pages.'>*</a></label>
                      <div id="cp2" class="input-group colorpicker-component"> 
                        <input type="text"  onchange="setRoofcolor(this)" value="#00AABB" name="roofcolor" id="roofcolor" class="form-control input-sm" required> 
                        <span class="input-group-addon"><i></i></span> 
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <p class="help-block"><strong>Estimated Land Area: </strong><span id='area'>No Building selected</span></p>
                  </div>

                  <div class="form-group">
                    <label for="name">Description</label>
                    <textarea class="form-control" name="description" class="form-control input-sm" id="desc" placeholder="Tell history, use, etc." rows="3"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="file">Building image<a data-toggle="tooltip" data-placement="top" title='Single image at the moment.'>*</a></label>
                    <input type="file" name='file' id="file">
                  </div>

                  <div hidden>
                    <textarea class="form-control" name="polygon" class="form-control input-sm" id="polygon" placeholder="polygon" rows="3"></textarea required>
                    <input type="text" class="form-control input-sm" name="area" id="area_" placeholder="area">
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <p><a data-toggle="tooltip" data-placement="top" title='All other variables are hidden but collected for storage. 3D Building will initiate after submitting form.'>Hover me for info</a></p>
                    </div>
                    <div class="col-sm-6">
                      <button class="btn btn-sm btn-default pull-right" id="postSubmit">Submit</button>
                      <button type="button" class="btn btn-sm btn-danger pull-right" data-toggle="popover" data-trigger="focus" data-placement="top" data-html='true' data-content='Are you sure to delete this building?<br><button class="btn btn-sm btn-danger" id="bdelete">Remove this building</button>' id='deletebutton'>Remove</button>

                    </div>
                  </div>

                </form>
              </div>
             <!--  <div class="box-footer">
                <h6 class="text-muted">*Colors will be shown on front pages.<br>**Single image at the moment.<br>All other variables are hidden but collected for storage.<br>3D Building will initiate after submitting form.</h6>
              </div> -->
            </div>
          </div>
          <!-- <div id="info_build" hidden=""></div> -->

        </div>
<!--         <div class="modal-footer" >
          <button type="button" class="btn btn-success pull-right">Add</button>
        </div> -->
      </div>
    </div>
  </div>

  <!-- <div class="modal fade" id='modal2'></div> -->