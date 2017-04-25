
<!-- Modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id='buildModal'>
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modal title</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <strong><i class="fa fa-building margin-r-5"></i>Building Information</strong>
                  <div class="pull-right text-muted" id='moreDetails'><a>More..</a></div>
                  </div>
                <div class="box-body body1">
                <!-- Description? controlled on main.js? -->
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="nav nav-tabs pull-left" hidden="">
                <li></li>
              </div>
              <div class="box box-default" >
                <div id='b-map' style="width: 100% !important;
                    height: 240px;
                    z-index: 1;">
                </div>
                <div id="b-img" hidden>
                  <img id='frontImg' src="../map-here.png" style="max-height:700px ;max-width: 400px; z-index: 2; position: relative;">
                </div>
              </div>
              <div class="box box-default" hidden>
                <div class="box-header">Pics carousel (Add later)</div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer" >
          <button type="button" class="btn btn-default pull-right">Next</button>
          <button type="button" class="btn btn-default pull-right">Prev</button>
        </div>
      </div>
    </div>
  </div>