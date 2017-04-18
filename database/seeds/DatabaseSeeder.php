<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User, App\Building;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        Model::unguard();

        // User::create([
        //     'username' => 'GreatAdmin',
        //     'email' => 'admin@la.fr',
        //     'password' => bcrypt('admin'),
        //     'seen' => true,
        //     //'role_id' => 1,
        //     'confirmed' => true
        // ]);  

        Building::create([
            'name' => 'MSU-IIT Cooperative Building',
            'description' => 'Over a decade of being an open-type cooperative, Head Office was transferred to its new home, located at MSU-IIT NMPC Bldg. Quezon Avenue Ext.,Pala-o , Iligan City',
            'height' => 8,
            'roofcolor' => '#ffc17c',
            'wallcolor' => '#b1b2ad',
            'image' => 'cooperative-building',
            'polygon' => '[[
                [ 124.24465298652649,
                  8.23991593886458
                ],
                [ 124.24471199512482,
                  8.23984692134977
                ],
                [ 124.24469992518425,
                  8.239814403478054
                ],
                [ 124.24476563930511,
                  8.239751358617099
                ],
                [ 124.24490511417389,
                  8.239894702707462
                ],
                [ 124.24476563930511,
                  8.240011501557522
                ],
                [ 124.24465298652649,
                  8.23991593886458
                ]
                ]]',
        ]);

        Building::create([
            'name' => 'Institute Library',
            'description' => 'The MSU-Iligan Institute of Technology Library was established when the Lanao Technical School of the Bureau of Vocational Education was integrated into the Mindanao State University in 1968 as an external autonomous unit. The school was then renamed MSU-Iligan Institute of Technology by virtue of R.A. 5363.',
            'height' => 6,
            'roofcolor' => '#ffc17c',
            'wallcolor' => '#ffe5c9',
            'image' => 'institute-library-building',
            'polygon' => '[
              [
                [
                  124.24444377422333,
                  8.239974338290775
                ],
                [
                  124.24415283836424,
                  8.239666413946443
                ],
                [
                  124.24406968988478,
                  8.239746049575722
                ],
                [
                  124.24436330795288,
                  8.240085828080504
                ],
                [
                  124.24444377422333,
                  8.239974338290775
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'IDS Multi-Purpose Hall (IDS-MPH)',
            'description' => 'Discohan',
            'height' => 6,
            'roofcolor' => '#ffc17c',
            'wallcolor' => '#ffe5c9',
            'image' => 'ids-mph-building',
            'polygon' => '[
              [
                [
                  124.24427551799454,
                  8.240039374005278
                ],
                [
                  124.24424802535214,
                  8.240005528889874
                ],
                [
                  124.24425976001658,
                  8.23999789714777
                ],
                [
                  124.24402204924263,
                  8.239738086013487
                ],
                [
                  124.24388592713512,
                  8.23985820305976
                ],
                [
                  124.24415414803661,
                  8.240142236593076
                ],
                [
                  124.24419794348069,
                  8.24010976022246
                ],
                [
                  124.24421491683461,
                  8.240130374215376
                ],
                [
                  124.2442756856326,
                  8.240086657617484
                ],
                [
                  124.24425238394178,
                  8.240065587376924
                ],
                [
                  124.24427551799454,
                  8.240039374005278
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'IDS Classrooms 1',
            'description' => 'Bright Building',
            'height' => 4,
            'roofcolor' => '#ffc27c',
            'wallcolor' => '#ffe6c9',
            'image' => 'ids-building',
            'polygon' => '[
              [
                [
                  124.24415548914112,
                  8.24016811814323
                ],
                [
                  124.2438356357161,
                  8.239829003339132
                ],
                [
                  124.24375852220692,
                  8.239889393667992
                ],
                [
                  124.24407770507969,
                  8.240233817455238
                ],
                [
                  124.24415548914112,
                  8.24016811814323
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'IDS Classrooms 2',
            'description' => 'Brighter Building',
            'height' => 4,
            'roofcolor' => '#ffc27c',
            'wallcolor' => '#ffe6c9',
            'image' => 'ids-building',
            'polygon' => '[
              [
                [
                  124.24395834677853,
                  8.240224526644099
                ],
                [
                  124.24372164183296,
                  8.239970356512018
                ],
                [
                  124.24361904733814,
                  8.240058619265673
                ],
                [
                  124.24384770565666,
                  8.240308807565675
                ],
                [
                  124.24395834677853,
                  8.240224526644099
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'IDS Classrooms 3',
            'description' => 'Brighterer Building',
            'height' => 4,
            'roofcolor' => '#ffc27c',
            'wallcolor' => '#ffe6c9',
            'image' => 'ids-building',
            'polygon' => '[
              [
                [
                  124.24348086118698,
                  8.240120336818565
                ],
                [
                  124.24377930932678,
                  8.239856212169778
                ],
                [
                  124.24371694796719,
                  8.239791176425186
                ],
                [
                  124.24341519945301,
                  8.240049328450423
                ],
                [
                  124.24348086118698,
                  8.240120336818565
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'IDS Canteen',
            'description' => 'Agora',
            'height' => 6,
            'roofcolor' => '#ffc27c',
            'wallcolor' => '#ffe6c9',
            'image' => 'ids-building',
            'polygon' => '[
              [
                [
                  124.24334948533215,
                  8.239973674660993
                ],
                [
                  124.24362642341293,
                  8.239717513477066
                ],
                [
                  124.24350035958923,
                  8.239584123779355
                ],
                [
                  124.24322208040394,
                  8.239840285049643
                ],
                [
                  124.24334948533215,
                  8.239973674660993
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'IDS Classrooms 4',
            'description' => 'Somewhere',
            'height' => 4,
            'roofcolor' => '#ffc27c',
            'wallcolor' => '#ffe6c9',
            'image' => 'ids-building',
            'polygon' => '[
              [
                [
                  124.24319861107506,
                  8.239985619997114
                ],
                [
                  124.24328913562931,
                  8.239921911533564
                ],
                [
                  124.24359887838364,
                  8.240298189497796
                ],
                [
                  124.24348890781403,
                  8.240377824999918
                ],
                [
                  124.24319861107506,
                  8.239985619997114
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'IDS Classrooms 5',
            'description' => 'Somewhere 2',
            'height' => 4,
            'roofcolor' => '#ffc27c',
            'wallcolor' => '#ffe6c9',
            'image' => 'ids-building',
            'polygon' => '[
              [
                [
                  124.24381149583496,
                  8.24034331628431
                ],
                [
                  124.24362910562195,
                  8.240150200147157
                ],
                [
                  124.2435385810677,
                  8.240210590426976
                ],
                [
                  124.24372432404198,
                  8.240430251696722
                ],
                [
                  124.24381149583496,
                  8.24034331628431
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'KASAMA Building',
            'description' => 'Elitist Building',
            'height' => 4,
            'roofcolor' => '#ffc27c',
            'wallcolor' => '#ffe6c9',
            'image' => 'scs-building',
            'polygon' => '[
              [
                [
                  124.24358551972546,
                  8.240336016363306
                ],
                [
                  124.2434862779919,
                  8.240408351938127
                ],
                [
                  124.24354461603798,
                  8.2404966145941
                ],
                [
                  124.24365995102562,
                  8.240418970003056
                ],
                [
                  124.24358551972546,
                  8.240336016363306
                ]
              ]
            ]',
        ]);

    }
}
