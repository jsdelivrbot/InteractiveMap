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

        Building::create([
            'name' => 'College of Arts and Social Sciences (CASS)',
            'description' => 'Awarded with Level III Accreditation from AACCUP, CASS continues in building its legacy through the competent performances of its seven departments, duly offering the programs Bachelor of Science in Psychology and Bachelor of Arts major in English, Filipino, History, Political Science, and Sociology.',
            'height' => 8,
            'roofcolor' => '#ffc27c',
            'wallcolor' => '#ffe6c9',
            'image' => 'cass-building',
            'polygon' => '[
              [
                [
                  124.24333674483933,
                  8.240434897099895
                ],
                [
                  124.24341917037964,
                  8.240351279834332
                ],
                [
                  124.243483543396,
                  8.24044153339006
                ],
                [
                  124.24333607428707,
                  8.240589522631733
                ],
                [
                  124.2429096030537,
                  8.24015418192411
                ],
                [
                  124.24278756254353,
                  8.240187363397403
                ],
                [
                  124.24288479262032,
                  8.240594831661797
                ],
                [
                  124.24302024417557,
                  8.24073751181805
                ],
                [
                  124.24294178956188,
                  8.240799892893452
                ],
                [
                  124.24283248954453,
                  8.240701012248094
                ],
                [
                  124.2428220959846,
                  8.240721584733373
                ],
                [
                  124.24276057281531,
                  8.240668162632236
                ],
                [
                  124.24279150203802,
                  8.240644106093658
                ],
                [
                  124.24277415149845,
                  8.240625358583278
                ],
                [
                  124.24265412264504,
                  8.240142236593027
                ],
                [
                  124.24272520118393,
                  8.240122659521989
                ],
                [
                  124.24271044903435,
                  8.24009246437652
                ],
                [
                  124.24292502575554,
                  8.240032737708358
                ],
                [
                  124.24306248896755,
                  8.240097773413254
                ],
                [
                  124.24316206597723,
                  8.240202626874103
                ],
                [
                  124.24314345815219,
                  8.240231162937826
                ],
                [
                  124.24333674483933,
                  8.240434897099895
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'College of Business Administration and Accountancy (CBAA)',
            'description' => 'The College of Business Administration and Accountancy (CBAA) offers undergraduate and graduate programs. The undergraduate programs are: Bachelor of Science in Accountancy and Bachelor of Science in Business Administration with specialization either in Business Economics or Entrepreneurial Marketing. The graduate program in Master in Business Management offers the following specialization areas on Finance, Human Resource Management, Marketing and Production Management.',
            'height' => 6,
            'roofcolor' => '#ffc27c',
            'wallcolor' => '#ffe6c9',
            'image' => 'cbaa-building',
            'polygon' => '[
              [
                [
                  124.24383633770049,
                  8.241367958404068
                ],
                [
                  124.2439717054367,
                  8.241338758794885
                ],
                [
                  124.24383759498596,
                  8.240494623707336
                ],
                [
                  124.24372904933989,
                  8.24052913240975
                ],
                [
                  124.24365662969649,
                  8.24052913240975
                ],
                [
                  124.24365394748747,
                  8.240574259169904
                ],
                [
                  124.24360834993422,
                  8.240584877230367
                ],
                [
                  124.24360298551619,
                  8.240619385924907
                ],
                [
                  124.24352251924574,
                  8.24063531301368
                ],
                [
                  124.24352251924574,
                  8.24068840330495
                ],
                [
                  124.24342864193022,
                  8.24070698490522
                ],
                [
                  124.2434071842581,
                  8.240664512674767
                ],
                [
                  124.24331062473357,
                  8.240717602962121
                ],
                [
                  124.24332940019667,
                  8.240773347756187
                ],
                [
                  124.24302631057799,
                  8.240879528294558
                ],
                [
                  124.24296193756163,
                  8.240810510947846
                ],
                [
                  124.24289488233626,
                  8.240868910241996
                ],
                [
                  124.24301826395094,
                  8.24101490843967
                ],
                [
                  124.24349837936461,
                  8.240807856434277
                ],
                [
                  124.24373441375792,
                  8.240770693242363
                ],
                [
                  124.24383633770049,
                  8.241367958404068
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'School of Engineering Technology (SET)',
            'description' => 'Highly recommended program for engineering technology graduates who desire to attain a degree that strengthens and enhances their technical knowledge and skills.',
            'height' => 4,
            'roofcolor' => '#db8047',
            'wallcolor' => '#db8047',
            'image' => 'set-building',
            'polygon' => '[
              [
                [
                  124.2445832490921,
                  8.241301595652832
                ],
                [
                  124.24441695213318,
                  8.24039375209841
                ],
                [
                  124.24393826164305,
                  8.24047338758127
                ],
                [
                  124.24406700767577,
                  8.241301595652832
                ],
                [
                  124.24409919418395,
                  8.241301595652832
                ],
                [
                  124.24410992302,
                  8.241405121539865
                ],
                [
                  124.2445832490921,
                  8.241301595652832
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'School of Computer Studies (SCS)',
            'description' => 'The School of Computer Studies (SCS) is responsible for the teaching, research and extension functions of the Information and Communication Technology Center (ICTC). To this end, it offers degree and non-degree programs in the graduate and undergraduate levels. These programs are carried through on campus or distance mode by formal, non-formal or informal systems.',
            'height' => 6,
            'roofcolor' => '#e07c7c',
            'wallcolor' => '#999897',
            'image' => 'scs-building',
            'polygon' => ' [
              [
                [
                  124.2447005957365,
                  8.240900100770574
                ],
                [
                  124.24460336565971,
                  8.2403638887882
                ],
                [
                  124.24448132514954,
                  8.24038313403282
                ],
                [
                  124.24458526074886,
                  8.240920673245524
                ],
                [
                  124.2447005957365,
                  8.240900100770574
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'School of Computer Studies (SCS ) New Building',
            'description' => 'The School of Computer Studies (SCS) is responsible for the teaching, research and extension functions of the Information and Communication Technology Center (ICTC). To this end, it offers degree and non-degree programs in the graduate and undergraduate levels. These programs are carried through on campus or distance mode by formal, non-formal or informal systems.',
            'height' => 10,
            'roofcolor' => '#ffc17c',
            'wallcolor' => '#ffe5c9',
            'image' => 'scs-building',
            'polygon' => '[
              [
                [
                  124.24459397792816,
                  8.2409618181922
                ],
                [
                  124.24471199512482,
                  8.241641372821627
                ],
                [
                  124.24482062458992,
                  8.24162146401118
                ],
                [
                  124.24470998346806,
                  8.24094323660389
                ],
                [
                  124.24459397792816,
                  8.2409618181922
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'College of Science and Mathematics (CSM)',
            'description' => 'The College has produced has produced a lot of quality graduates, among them are topnotchers in the Chemistry Licensure examination. Recently, it was number one (1) in the list of the top performing schools in the 2002 Chemistry Licensure Examination. Through the years, its percentage passing in the Chemistry Licensure Examination has been consistently very high. The college has also produced several winners in different regional/national student competitions. It has also consistently sent delegates to the most prestigious training ground for student leaders, the Ayala National Young Leaders Congress. Many of the graduates of the College are now well-placed and are leaders in their respective fields.',
            'height' => 8,
            'roofcolor' => '#ffc27c',
            'wallcolor' => '#9e9e9e',
            'image' => 'csm-building',
            'polygon' => '[
              [
                [
                  124.24479251378216,
                  8.242095293427706
                ],
                [
                  124.24472545855679,
                  8.241959913652265
                ],
                [
                  124.24460274749435,
                  8.241348713207335
                ],
                [
                  124.24431977444328,
                  8.241405121539865
                ],
                [
                  124.24433486186899,
                  8.241469493391856
                ],
                [
                  124.24428021186031,
                  8.241480775055576
                ],
                [
                  124.24430166953243,
                  8.241665927019799
                ],
                [
                  124.24423394375481,
                  8.24167654505099
                ],
                [
                  124.24425674253143,
                  8.241804625029392
                ],
                [
                  124.24432513886131,
                  8.241794670628316
                ],
                [
                  124.24435397260822,
                  8.241965554477224
                ],
                [
                  124.24440459930338,
                  8.241951452414884
                ],
                [
                  124.24441650160588,
                  8.242020054796015
                ],
                [
                  124.24436612636782,
                  8.24203975620319
                ],
                [
                  124.24439309514128,
                  8.242201297335576
                ],
                [
                  124.24442542833276,
                  8.242192950163982
                ],
                [
                  124.24443645053543,
                  8.242229345904704
                ],
                [
                  124.24479251378216,
                  8.242095293427706
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'College of Engineering (COE)',
            'description' => 'Since its establishment in 1977, the College of Engineering (COE) has grown and matured into a respectable engineering school. COE offers eight (8) tertiary programs, six (6) of which were recognized by the Commission on Higher Education as Centers of Development in SY1999-2000 for three years and four (4) of these programs are currently accredited by the Accrediting Agency for Chartered Colleges and Universities in the Philippines (AACCUP). In addition, it also offers three (3) masters degree programs and three (3) doctoral programs. The College of Engineering consistently has very high passing rates in board examinations in various fields. Its graduates are much sought after by industries not only in the area but throughout the country.',
            'height' => 10,
            'roofcolor' => '#c9c9c9',
            'wallcolor' => '#bfbbaf',
            'image' => 'coe-building',
            'polygon' => '[
              [
                [
                  124.24397779279388,
                  8.241462193491653
                ],
                [
                  124.244089104468,
                  8.242082684528949
                ],
                [
                  124.24391140812077,
                  8.242114538588066
                ],
                [
                  124.24392783665098,
                  8.24221474613216
                ],
                [
                  124.24379137926735,
                  8.242237973042679
                ],
                [
                  124.24373739981093,
                  8.241927064140956
                ],
                [
                  124.2436834203545,
                  8.241937350351886
                ],
                [
                  124.24364653998055,
                  8.241750207634313
                ],
                [
                  124.24383630626835,
                  8.241717689919005
                ],
                [
                  124.24379540258087,
                  8.241495374855178
                ],
                [
                  124.24397779279388,
                  8.241462193491653
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'College of Engineering EC Office',
            'description' => 'Executive Council office of the College of Engineering.',
            'height' => 4,
            'roofcolor' => '#ffc27c',
            'wallcolor' => '#ffe6c9',
            'image' => 'coe-building',
            'polygon' => '[
              [
                [
                  124.24375516944565,
                  8.241705744635173
                ],
                [
                  124.24374175840057,
                  8.241616818621939
                ],
                [
                  124.24361636512913,
                  8.241638718313629
                ],
                [
                  124.24363514059223,
                  8.241728971575663
                ],
                [
                  124.24369549029507,
                  8.241716362665267
                ],
                [
                  124.24375516944565,
                  8.241705744635173
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'College of Nursing (CON)',
            'description' => 'Since its establishment in 2004, as an extension unit of the College of Health Sciences of the Mindanao State University Main Campus and now as the newest college of MSU-IIT, the College of Nursing has consistently ranked among the top three (3) performing nursing schools in the country through the national Nurse Licensure Examination.',
            'height' => 10,
            'roofcolor' => '#ffc27c',
            'wallcolor' => '#ffe6c9',
            'image' => 'con-building',
            'polygon' => '[
              [
                [
                  124.24354260438122,
                  8.240946554744774
                ],
                [
                  124.24360630684532,
                  8.241446930063502
                ],
                [
                  124.24358954303898,
                  8.241448257318194
                ],
                [
                  124.24361167126335,
                  8.241638054686645
                ],
                [
                  124.24342190497555,
                  8.241658627123197
                ],
                [
                  124.24339441233315,
                  8.24146086623705
                ],
                [
                  124.24324420862831,
                  8.241470157019094
                ],
                [
                  124.24321470432915,
                  8.241310222811123
                ],
                [
                  124.2432016285602,
                  8.241287659473711
                ],
                [
                  124.24318318837322,
                  8.24117484276714
                ],
                [
                  124.24316106014885,
                  8.241159247514034
                ],
                [
                  124.24315234296955,
                  8.241122416168958
                ],
                [
                  124.24314697855152,
                  8.241068662307901
                ],
                [
                  124.24314496689476,
                  8.241031499140542
                ],
                [
                  124.24322208040394,
                  8.241021544720153
                ],
                [
                  124.24323884421028,
                  8.24100097225041
                ],
                [
                  124.24329014145769,
                  8.240996658667918
                ],
                [
                  124.24329047673382,
                  8.24097641801099
                ],
                [
                  124.24339307122864,
                  8.240960490935944
                ],
                [
                  124.24354260438122,
                  8.240946554744774
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'College of Business Administration and Accountancy Extension',
            'description' => 'The College of Business Administration and Accountancy (CBAA) offers undergraduate and graduate programs. The undergraduate programs are: Bachelor of Science in Accountancy and Bachelor of Science in Business Administration with specialization either in Business Economics or Entrepreneurial Marketing. The graduate program in Master in Business Management offers the following specialization areas on Finance, Human Resource Management, Marketing and Production Management.',
            'height' => 6,
            'roofcolor' => '#ffc27c',
            'wallcolor' => '#ffe6c9',
            'image' => 'cbaa-building',
            'polygon' => ' [
              [
                [
                  124.24366732710041,
                  8.241409766931586
                ],
                [
                  124.24374175840057,
                  8.241389194482094
                ],
                [
                  124.24381082528271,
                  8.241375258306013
                ],
                [
                  124.24375785165466,
                  8.241054062492598
                ],
                [
                  124.24371627741493,
                  8.24080719280588
                ],
                [
                  124.24353958689608,
                  8.240827101657292
                ],
                [
                  124.24364452832378,
                  8.241616818621939
                ],
                [
                  124.24371560686268,
                  8.241612836859694
                ],
                [
                  124.2437095718924,
                  8.241505329263697
                ],
                [
                  124.2436747031752,
                  8.241507983772573
                ],
                [
                  124.24366732710041,
                  8.241409766931586
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'MSU-IIT Gymnasium',
            'description' => 'Gymnasium of MSU-IIT',
            'height' => 10,
            'roofcolor' => '#db8047',
            'wallcolor' => '#f3e9ce',
            'image' => 'gym-building',
            'polygon' => '[
              [
                [
                  124.24435397260822,
                  8.24241715202129
                ],
                [
                  124.24442907446064,
                  8.242865762737521
                ],
                [
                  124.24434223794378,
                  8.242880362486034
                ],
                [
                  124.24434391432442,
                  8.24292947072698
                ],
                [
                  124.24410033621825,
                  8.242975260838044
                ],
                [
                  124.24408742808737,
                  8.242925488977978
                ],
                [
                  124.24402624019422,
                  8.2429380978498
                ],
                [
                  124.243954323465,
                  8.242491478092303
                ],
                [
                  124.24435397260822,
                  8.24241715202129
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'College of Education (CED)',
            'description' => 'CED is among the top performing schools in the Philippines in the Licensure Examination for Teachers (LET) Elementary Level in 2008. It ranked second in the same category in 2004. Iin 2006, CED gained the third rank in the Licensure Examination for Teachers (LET) in the Secondary Level nationwide and number one in the LET Elementary Level in Region 10. These accomplishments are the results of the best efforts of the faculty, staff, students and the administration. Thus, realizing the dreams of the previous deans who at one moment had led CED to what it is today.',
            'height' => 8,
            'roofcolor' => '#ffc27c',
            'wallcolor' => '#ffe6c9',
            'image' => 'ced-building',
            'polygon' => '[
              [
                [
                  124.24344599246979,
                  8.242587040163036
                ],
                [
                  124.24340844154358,
                  8.242411179389977
                ],
                [
                  124.24345403909683,
                  8.242401225004256
                ],
                [
                  124.24344398081303,
                  8.242351453071928
                ],
                [
                  124.24339771270752,
                  8.242361407458896
                ],
                [
                  124.24336016178131,
                  8.242199482733028
                ],
                [
                  124.24310266971588,
                  8.242253900066313
                ],
                [
                  124.243124127388,
                  8.2423494621945
                ],
                [
                  124.2431589961052,
                  8.242340171433028
                ],
                [
                  124.24324817955494,
                  8.242323580787053
                ],
                [
                  124.24325957894325,
                  8.242383970735064
                ],
                [
                  124.24321398139,
                  8.242394588746965
                ],
                [
                  124.2432226985693,
                  8.242441706171322
                ],
                [
                  124.2432676255703,
                  8.242431088160679
                ],
                [
                  124.24327701330185,
                  8.242475551078247
                ],
                [
                  124.24315094947815,
                  8.24250209610129
                ],
                [
                  124.24317508935928,
                  8.242630839437794
                ],
                [
                  124.24324214458466,
                  8.242618894181492
                ],
                [
                  124.24344599246979,
                  8.242587040163036
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'Institute Clinic',
            'description' => 'WBI identifier',
            'height' => 4,
            'roofcolor' => '#ffc27c',
            'wallcolor' => '#ffe6c9',
            'image' => 'clinic-building',
            'polygon' => '[
              [
                [
                  124.24457126297057,
                  8.240357252496725
                ],
                [
                  124.2445404175669,
                  8.240167454513777
                ],
                [
                  124.24444654025137,
                  8.240184045250157
                ],
                [
                  124.24448275007308,
                  8.240372515966913
                ],
                [
                  124.24457126297057,
                  8.240357252496725
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'Institute Security Office',
            'description' => 'Office of all security personnel',
            'height' => 6,
            'roofcolor' => '#ffc27c',
            'wallcolor' => '#ffe6c9',
            'image' => 'security-building',
            'polygon' => '[
              [
                [
                  124.2446905374527,
                  8.240080519043593
                ],
                [
                  124.24461007118225,
                  8.239953102136784
                ],
                [
                  124.24443572759628,
                  8.240124982225389
                ],
                [
                  124.24444519914687,
                  8.240174754437822
                ],
                [
                  124.2446168186143,
                  8.240144891111113
                ],
                [
                  124.2446905374527,
                  8.240080519043593
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'Guard House',
            'description' => 'Tangapan ng mga Mapang-api',
            'height' => 4,
            'roofcolor' => '#ffc27c',
            'wallcolor' => '#ffe6c9',
            'image' => 'scs-building',
            'polygon' => '[
              [
                [
                  124.24451351165771,
                  8.239852230389811
                ],
                [
                  124.24454033374786,
                  8.239868157509461
                ],
                [
                  124.24472272396088,
                  8.239714195325927
                ],
                [
                  124.24467980861664,
                  8.239655795861324
                ],
                [
                  124.24448668956757,
                  8.239820376148577
                ],
                [
                  124.24451351165771,
                  8.239852230389811
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'Administration Building',
            'description' => 'Kurakot',
            'height' => 6,
            'roofcolor' => '#ffc27c',
            'wallcolor' => '#ffe6c9',
            'image' => 'administration-building',
            'polygon' => '[
              [
                [
                  124.2438805103302,
                  8.239523069773373
                ],
                [
                  124.24428820610046,
                  8.239177981736317
                ],
                [
                  124.24422919750214,
                  8.239093036942572
                ],
                [
                  124.24379736185074,
                  8.239438125053699
                ],
                [
                  124.2438805103302,
                  8.239523069773373
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'Bahay Alumni',
            'description' => 'Houses all graduates who want to study again',
            'height' => 8,
            'roofcolor' => '#ffc27c',
            'wallcolor' => '#b5b5b5',
            'image' => 'bahay-alumni-building',
            'polygon' => '[
              [
                [
                  124.24240529537201,
                  8.242506741480138
                ],
                [
                  124.24238383769989,
                  8.242405870384285
                ],
                [
                  124.24231946468353,
                  8.242395252372715
                ],
                [
                  124.2422765493393,
                  8.242342162310507
                ],
                [
                  124.24216389656067,
                  8.242368707342495
                ],
                [
                  124.24217462539673,
                  8.242400561378533
                ],
                [
                  124.2421156167984,
                  8.242416488395591
                ],
                [
                  124.24214780330658,
                  8.242533286501082
                ],
                [
                  124.24224972724915,
                  8.242522668492908
                ],
                [
                  124.24227118492126,
                  8.242538595505055
                ],
                [
                  124.24240529537201,
                  8.242506741480138
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'Alumni Office',
            'description' => 'All alumni transactions will be catered here.',
            'height' => 4,
            'roofcolor' => '#ffc27c',
            'wallcolor' => '#ffe6c9',
            'image' => 'alumni-office-building',
            'polygon' => ' [
              [
                [
                  124.24298465251923,
                  8.243690647682094
                ],
                [
                  124.24303829669952,
                  8.24354199597686
                ],
                [
                  124.24313485622406,
                  8.243547304967295
                ],
                [
                  124.2430704832077,
                  8.243711883635429
                ],
                [
                  124.24298465251923,
                  8.243690647682094
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'Institute for Peace and Development in Mindanao (IPDM)',
            'description' => 'The Institute for Peace and Development in Mindanao (IPDM) of MSU – Iligan Institute of Technology (MSU-IIT) is one of the seven units of the system-wide IPDM of the Mindanao State University System. It was created by BOR Resolution # 107, series of 2007 as MSU system’s proactive response to Executive Order 570 of September 2006. The said executive order is part of the national government’s efforts to institutionalize and integrate peace into the basic and tertiary education by including the teaching and learning of peace into the mandates of the Department of Education and Higher Education Institutions. Prior to the creation of IPDM, however, MSU-IIT had already established the Iligan Center for Peace Education and Research (ICPER) in 1998. The center was initially created through the efforts of Dr. Luis Q. Lacar and Vice Chancellor Jimmy Balacuit. Its first director was Dr. Jamail A. Kamlian who was followed by Dr. Marilou S. Nanaman after two years. It was during Dr. Nanaman’s term as director, that BOR Resolution 107 s. 2007 was passed, thereby changing the name of ICPER into IPDM and administratively placing the office directly under the chancellor.',
            'height' => 6,
            'roofcolor' => '#ffc27c',
            'wallcolor' => '#ffe6c9',
            'image' => 'ipdm-building',
            'polygon' => '[
              [
                [
                  124.2428183555603,
                  8.243823372371695
                ],
                [
                  124.24293100833893,
                  8.243770282501197
                ],
                [
                  124.24295246601105,
                  8.243812754398176
                ],
                [
                  124.24290955066681,
                  8.243828681358352
                ],
                [
                  124.2429792881012,
                  8.243945479046785
                ],
                [
                  124.24290418624878,
                  8.243982641940427
                ],
                [
                  124.2428183555603,
                  8.243823372371695
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'College of Education Extension',
            'description' => 'Likod',
            'height' => 4,
            'roofcolor' => '#ffc27c',
            'wallcolor' => '#ffe6c9',
            'image' => 'ced-building',
            'polygon' => '[
              [
                [
                  124.24314625561237,
                  8.242567795025666
                ],
                [
                  124.24308121204376,
                  8.242232000408707
                ],
                [
                  124.24300611019135,
                  8.24224660018059
                ],
                [
                  124.24307584762573,
                  8.242581067534294
                ],
                [
                  124.24314625561237,
                  8.242567795025666
                ]
              ]
            ]',
        ]);

        Building::create([
            'name' => 'Hostel',
            'description' => 'MSU-IIT Hostel is all set in one perfect place that offers quality services at a very affordable price! Fully aircondtioned rooms with Hot and Cold shower with wireless internet conection.',
            'height' => 6,
            'roofcolor' => '#ffc27c',
            'wallcolor' => '#ffe6c9',
            'image' => 'hostel-building',
            'polygon' => '[[
                [
                    124.24320325255393,
                    8.239820376148577
                ],
                [
                    124.24340710043906,
                    8.239629250647294
                ],
                [
                    124.24327835440636,
                    8.239517760728932
                ],
                [
                    124.24307987093924,
                    8.239692959157992
                ],
                [
                    124.24320325255393,
                    8.239820376148577
                ]
            ]]',
        ]);

        Building::create([
            'name' => 'MSU-IIT Offices',
            'description' => 'Offices beside CED.',
            'height' => 6,
            'roofcolor' => '#ffc27c',
            'wallcolor' => '#ffe6c9',
            'image' => 'offices-building',
            'polygon' => '[[
                [
                    124.24310225062072,
                    8.24222536414858
                ],
                [
                    124.24334901385009,
                    8.242172274063584
                ],
                [
                    124.2433226108551,
                    8.242082020902718
                ],
                [
                    124.24308615736665,
                    8.242145729018404
                ],
                [
                    124.24310225062072,
                    8.24222536414858
                ]
            ]]',
        ]);


    }
}
