# MSU-IIT Interactive Campus Map #

### Abstract

> While interactive maps greatly influence the economic advantages of an organization, it has been a challenge for researchers to build a virtual map that is compatible with today and the future’s expanding technical requirements.
Previous local studies systems show virtual visualizations of the campus of MSU-IIT and a few travel locations in Iligan City by providing different multimedia content such as 3D maps, panoramic images and PDFs.
However, it was discovered that these systems were made as static applications with depreciated programming libraries.
This capstone project aimed to develop a dynamic web application using OpenStreetMap and OSM Buildings and by adapting and improving the functionalities while addressing the problems of the previous studies.
The project was able to establish the requirements of a dynamic interactive map based on four modules namely map, draw, content and search. Although with concrete frameworks, technical and design restrictions were experienced as the functionalities from used programming libraries were limited. Whereas the data obtain from thirty respondents using System Usability Scale showed positive feedback in which the administrator group were energized to the potential of the system.

### Version
0.1.36

Maintained by [John Amba].

### Integrated Technologies
* [Laravel] - Laravel Web environment and other related services
* [OpenStreetMap] - for map tile and other services
* [OSMBuildings] - for 3d model rendering services
* [Twitter Bootstrap] - great UI boilerplate for modern web apps
* [node.js] - evented I/O for the backend
* [jQuery] - 

### Official Repository
    git clone https://github.com/johnvamba/InteractiveMap.git

### Installation
   All through Laravel Artisan commands

   1. clone git
   2. modify .env file to connect to correct database
   3. Migrate/seed database then serve.

Note: branches are separated based on versions.
-  [master] - main branch.
-  [capstone-ver] - version used during thesis-capstone dessertation process.
-  [dev] - branch for maintenance, improvement and/or development. Will merge to master branch


### To Do ###
1. additional backend functionalities
2. building informations
3. maintainable site

### Notes ###
1. Separate search functionality as laravel component/plugin. (optional since it relies on js script)
2. Correct/Establish responsive UI in components with map interfaces since they bug out the most.
3. Add additional data(polygon areas) to forms and data modals to display area.
4. Introduce filesystem for images. Possibly, for complex user-created 3D buildings, might require specific file extension: (*.obj).

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)

   [john amba]: <https://github.com/johnvamba>
   [master]: <https://github.com/johnvamba/InteractiveMap/tree/master>
   [dev]: <https://github.com/johnvamba/InteractiveMap/tree/dev>
   [Laravel]: <https://laravel.com/>
   [capstone-ver]: <https://github.com/johnvamba/InteractiveMap/tree/capstone-ver>
   [openstreetmap]: <https://www.openstreetmap.org/>
   [osmbuildings]: <https://osmbuildings.org/>
   [node.js]: <http://nodejs.org>
   [Twitter Bootstrap]: <http://twitter.github.com/bootstrap/>
   [jQuery]: <http://jquery.com>
