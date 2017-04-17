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
<!--                 <div class="box-title">
                </div> -->
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" type="button" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="box-body">

                <form id="buildform">
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group field">
                        <label for="name">Name</label>
                        <input type="text" class="form-control input-sm" name="name" id="name" placeholder="Name">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group field">
                        <label for="height">Height</label>
                        <input type="text" id="height" class="form-control input-sm" name="height" id="height" placeholder="by Floor" onkeyup="setHeight(this)">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <label for="wallcolor">WallColor*:  </label>
                      <div id="cp2" class="input-group colorpicker-component field"> 
                        <input type="text" onchange="setWallcolor(this)" value="#00AABB" name="wallcolor" id="wallcolor" class="form-control input-sm" /> 
                        <span class="input-group-addon"><i></i></span> 
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <label for="roofcolor">RoofColor*:  </label>
                      <div id="cp2" class="input-group colorpicker-component field"> 
                        <input type="text"  onchange="setRoofcolor(this)" value="#00AABB" name="roofcolor" id="roofcolor" class="form-control input-sm" /> 
                        <span class="input-group-addon"><i></i></span> 
                      </div>
                    </div>
                  </div>

                  <p class="help-block"><strong>Estimated Land Area: </strong><span id='area'>No Building selected</span></p>
                  <h6 class="text-muted"></h6>
                  <div class="form-group">
                    <label for="name">Description</label>
                    <textarea class="form-control" name="desc" class="form-control input-sm" id="desc" placeholder="Tell history, use, etc." rows="3"></textarea>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <input type="checkbox"> Certified Building
                    </div>
                    <div class="col-sm-6">
                      <button type="submit" class="btn btn-sm btn-default pull-right">Submit</button>
                    </div>
                  </div>

                </form>
              </div>
              <div class="box-footer">
                <h6 class="text-muted">*Colors will be shown on front pages.<br>All other variables are hidden but collected for storage.<br>3D Building will initiate after submitting form.</h6>
              </div>
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