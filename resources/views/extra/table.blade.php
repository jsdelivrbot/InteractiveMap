	<div class="box box-primary">
        <div class="box-header">
          <form action="#" method="get" class="form pull-left" style="width: 250px;">
            <div class="input-group">
              <input type="text" name="search" class="form-control" id='typeahead' placeholder="{{ $searchPH }}">
                  <span class="input-group-btn">
                    <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
            </div>
          </form>
<!--           <div class="btn-group pull-right" style="padding-left: 10px;">
            <button class="btn btn-default" id="cardlist"><i class="fa fa-th-large"></i></button>
            <button class="btn btn-default disabled" id="tablelist"><i class="fa fa-list"></i></button>
          </div> -->
          <button class='btn btn-primary pull-right' id='addButton'>
            Add Building
          </button>
        </div><!-- Box header -->

        <div class="box-body">
        <table class="table table-bordered table-condensed" id='tablebuild'>
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Building</th>
              <th style="width: 650px">Description</th>
            </tr>
          </thead>
          <tbody></tbody>
          </table>
          <div id="cardbuild" hidden>
            <div class="msc col-sm-3">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <img class="img-header" src="" style="max-height: 120px; min-height: 60px;">
                </div>
                <div class="box-body">
                  <p><strong class="text-info">Name of Building</strong></p>
                  <strong>Description: </strong>
                  <p class="text-muted desc">Fanny pack 3 wolf moon retro tacos lomo, hell of umami asymmetrical organic vinyl austin vegan. You probably haven't heard of them synth edison bulb, keytar fam chia chillwave bushwick. Fam mumblecore la croix slow-carb, af trust fund fashion axe +1. Meggings cornhole bespoke paleo tbh. Yuccie 90's cornhole, vaporware bushwick try-hard air plant 3 wolf moon. Bitters pop-up man bun single-origin coffee before they sold out four loko. Trust fund plaid pitchfork, normcore chillwave etsy pour-over try-hard brunch.</p>
                </div>
              </div>
            </div>
            <div class="msc col-sm-3">
              <div class="box">part 1</div>
            </div>
            <div class="msc col-sm-3">
              <div class="box">part 1</div>
            </div>
            <div class="msc col-sm-3">
              <div class="box">part 1</div>
            </div>
          </div>
        </div> <!-- Box Body -->
        </div> <!-- Box Body -->
        <!-- <div class="box-footer" hidden> 
          <p class="text-muted">
            Search a building to edit, or add a building instead
          </p>
        </div> -->
      </div>
