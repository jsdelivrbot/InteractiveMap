{{-- 
  Comments 
  <!-- Please Modify only when needed -->

  --}}

<div class="modal modal-primary fade" tabindex="-1" role="dialog" id='tutorial'>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tutorial</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-3" role="complementary">
            <section class="sidebar"  style="background-color: rgb(34,45,50)">
              <ul class="sidebar-menu">
                <li class="header">Learn:</li>
                <li>
                  <a href="#intro">
                    <!-- <i class="fa fa-map fa-fw"></i> -->
                    <span>Introduction</span>
                  </a>
                </li>
                <li>
                  <a href="#mapbuttons">
                    <!-- <i class="fa fa-map fa-fw"></i> -->
                    <span>Map Buttons</span>
                  </a>
                </li>
                <li>
                  <a href="#forminfo">
                    <span>Form</span>
                  </a>
                </li>
                <li class="treeview">
                  <a href="#">
                    <!-- <i class="fa fa-map fa-fw"></i> -->
                    <span>Modify Building</span>
                  </a>
                  <ul class="treeview-menu">
                    <li>
                      <a href="#modbuild">
                        <span>Using polygon button</span>
                      </a>
                    </li>
                    <li>
                      <a href="#editb">
                        <span>Using modify group buttons</span>
                      </a>
                    </li>
                    <li>
                      <a href="#deleteb">
                        <span>Tips</span>
                      </a>
                    </li>
<!--                     <li>
                      <a href="#">
                        <span>Tips</span>
                      </a>
                    </li> -->
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#">
                      <span>About this app</span>
                  </a>
                  <ul class="treeview-menu">
                    <li>
                      <a href="#abstract">
                        <!-- <i class="fa fa-map fa-fw"></i> -->
                        <span>Abstract</span>
                      </a>
                    </li>
                    <li>
                      <a href="#links">
                        <span>Links</span>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </section>
          </div>
          <div class="col-md-9" role="main">
            <div class="content" style="background-color: rgb(53, 124, 165);height: 500px; overflow: auto;"> 
              <!-- <p>Content</p> -->
              <section id="intro">
                <h2 class="page-header">Introduction</h2>
                <p class="lead">Welcome to this part of the application. Here, you can add, edit or delete a building and its properties.</p>
                <div class="callout callout-success">
                  <h4>Advice</h4>
                  <p>This page functions works in a single linear process.</p>
                  <ul>
                    <li>If adding a building, must submit for storage</li>
                    <li>If editing a building, must submit for changes</li>
                    <li>If deleting a building, must submit(or verify delete button) for removal</li>
                  </ul>
                  <p>This is to verify changes to the server or database holding the building data.</p>
                </div>
              </section>

              <section id="mapbuttons">
                <h2 class="page-header">Map Buttons</h2>
                <p class="lead">Leaflet provides massive extenstions and plugins to modify elements within the map. However, this application centers following groups:</p>
                <div class="media">
                  <div class="media-left">
                    <img class="media-object imgmini" src="{{ asset('tutorial/buttons1.png') }}" >

                    <img class="media-object imgmini" src="{{ asset('tutorial/modbuild.png') }}" style="padding-top: 20px;">
                  </div>
                  <div class="media-body">
                      <li><strong>Scale Group</strong> provides zoom functionalities. Icons are self explainatory.</li>
                      <li><strong>Draw Group</strong> introduces modifiable polygon on the map screen. The icons represent polygon (top) and rectangular (bottom) shapes. It is advisable to use <strong>polygon button</strong> for complexities of a building's parameter.
                      <p><strong>To use: </strong> click a button, map out the desired building parameters, ensure that the points connects together forming parameters of the building.</p></li>
                      <li><strong>Modify Group</strong> provides functions that modifies the on-screen modifiable polygon. A modifiable polygon is indicated with blue-colored parameter.
                        <p><strong>To use:</strong> Top button is the edit button. By clicking it, users can then morph a building parameter using its points.<br>Meanwhile, delete button at can remove the present polygon. To edit a building, click the old building 3D to transform it to polygon</p>
                        <p><strong>Note: </strong>Deleting a polygon information from form restricts the updating process. All information of 'A' building requires polygon information of said building</p>
                      </li>
                    <ul>
                    </ul>
                  </div>
                </div>
              </section>

              <section id="forminfo">
                <h2 class="page-header">Building Information (Form)</h2>
                <p class="lead">Form cements the information to be submitted to the App main controllers. Additionally, it establishes the look and feel of a building for the front map base.</p>
                <div class="callout callout-success">
                  <h4>Form Requirements</h4>
                  <ul>
                    <li><strong>Name</strong>, as the given name of the building</li>
                    <li><strong>Common Name</strong>, or the abbrevated or common name of a building. should be one word only.</li>
                    <li><strong>Floors</strong> serves as the visual height for the building</li>
                    <li><strong>Colors</strong> namely wallcolor and roofcolor. Mostly for visual decorative.</li>
                    <li><strong>Description</strong> for history, known offices etc.</li>
                  </ul>
                </div>
                  <p>Other information also needed like polygon information and est. land area (which will be pre calculated upon generation of polygons). Land area isn't precise so much since it relies on the scale presented by the map base.</p>
                  <p>Photos however are not really required. Will be expanded later in next versions</p>
              </section>

              <section id="modbuild">
                <h2 class="page-header">Modify Building</h2>
                <p class="lead">The key functionality of this app is the capability to make 3D Buildings from a combination of leaflet plugins which then solved the initial thesis problem</p>
                <p>A simple 3-step procedure to be followed to completely modify a building</p>
                <ol>
                  <li>Select a 3d building to edit its polygon <strong>OR</strong> Create a polygon through "Draw Group" buttons</li>
                  <li>Add or modify form information.</li>
                  <li>Click submit button (verified delete button for deleting building) to post the data to server/database.</li>
                </ol>
                <p>A modifiable polygon is called <strong>feature.</strong></p>
                <div class="callout callout-success">
                  <h4>Using Polygon Draw</h4>
                  <div class="media">
                    <div class="media-left">
                      <img class="media-object imgmini" src="{{ asset('tutorial/buttons2.png') }}" >
                    </div>
                    <div class="media-body">
                      <p>Upon clicking polygon button, two additional buttons will be shown - 'delete last' to remove last point and 'cancel' to stop the function. Additionally, a tooltip next to cursor will be shown for more directions.</p> 
                    </div>
                    <br>
                    <img class="media-object imgmini" src="{{ asset('tutorial/tooltip.png') }}" >
                  </div>
                  
                </div>
                <div class="callout callout-success">
                  <h4 id="editb">Using Modify Group buttons</h4>
                  <p>In using the modify group buttons, a modifiable polygon <strong>MUST</strong> be present in the map. Otherwise its disabled</p>
                  <div class="media">
                    <div class="media-left">
                      <img class="media-object imgmini" src="{{ asset('tutorial/mod.png') }}" >
                    </div>
                    <div class="media-body">
                      <p>Both buttons have additional "Save" and "Cancel" buttons. "Save" button finalizes the changes while "Cancel" stops the function of the button.</p>
                      <p>The buttons also provide tooltip near the cursor for more instructions.</p>
                      <!-- <br> -->
                      <img class="media-object imgmini" src="{{ asset('tutorial/tooltip2.png') }}" >
                    </div>
                    <br>
                  </div>
                </div>
                <div class="callout callout-warning">
                  <h4 id="deleteb">Tips</h4>
                  <p>A complete form and a highlighted feature is required in posting information to the app controllers</p>
                  <p>This is to verify changes to the server or database holding the building data.</p>
                </div>
              </section>

              <section id="abstract">
                <h2 class="page-header">Abstract</h2>
                <blockquote>While interactive maps greatly influence the economic advantages of an organization, it has been a challenge for researchers to build a virtual map that is compatible with today and the future’s expanding technical requirements.<br>
                Previous local studies systems show virtual visualizations of the campus of MSU-IIT and a few travel locations in Iligan City by providing different multimedia content such as 3D maps, panoramic images and PDFs.<br>
                However, it was discovered that these systems were made as static applications with depreciated programming libraries.
                This capstone project aimed to develop a dynamic web application using OpenStreetMap and OSM Buildings and by adapting and improving the functionalities while addressing the problems of the previous studies.<br>
                The project was able to establish the requirements of a dynamic interactive map based on four modules namely map, draw, content and search. Although with concrete frameworks, technical and design restrictions were experienced as the functionalities from used programming libraries were limited. Whereas the data obtain from thirty respondents using System Usability Scale showed positive feedback in which the administrator group were energized to the potential of the system.</blockquote>
              </section>
              
              <section id="links">
                <h2 class="page-header">Links</h2>
                <p> Not really intended to be here. But either way, STILL UNDER CONSTRUCT</p>
              </section>

            </div>
          </div>
        </div> 
        <!-- End row -->
      </div> <!-- End modal body -->
    </div>
  </div>
</div>