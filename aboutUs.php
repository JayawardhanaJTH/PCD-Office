<?php

$page = "about";
setcookie("pageName", $page, time() + (86400 * 30), "/");
include "support/header.php";
?>

<link href="layout/styles/aboutus.css" rel="stylesheet">


<SECTION class="vision-sec">
    <div class="info-area pb-5">
        <div class="">
            <div class="row align-items-center">
                <div class="col-lg-6 no-padding info-area-left">
                    <img class="img-fluid" src="images/about1.jpg" alt="about">
                </div>
                <div class="col-lg-6 info-area-right p-5">
                    <h1 class="display-3">Premnath C. Dolawatta | Attorney at Law</h1>
                    <br>
                    <p>
                        Premnath Dolawatte is straight-forward in his approach and is determined to do his duty by his country. He is a risk taker, who does not hesitate to represent those who he feels need his assistance. Premnath Dolawatte came into the limelight in the recent years due to his legal representation and vocal support to those who lost power in the previous Government. He was not benefited from them during their time in power and his association with the Rajapaksa family began only after 2015. He works according to his conscience and in his own words, is controversial. He strongly believes that respect cannot be bought but in fact, has to be earned.
                    </p>
                </div>
            </div>
        </div>
        <div class="">
            <div class="row align-items-center">
                <div class="col-lg-6 info-area-right p-5">
                    <h1 class="display-3">Duty Before Self</h1>

                    <br>
                    <p>
                        "I am hardworking and will give my fullest to any task that I undertake. At the same time, I believe in the good of people and team work. I never hesitate to take advice from others. It is fulfilling to help people. While I am very flexible and simple in my approach, I always stand for what I believe in."

                        "I strongly believe that respect cannot be bought, it has to be earned. Therefore, I am content, moved and motivated with the public response I get for all my efforts. "

                        "I am willing to do whatever is required to serve society. I believe that I am doing my duty to my country and I am happy with my achievements. I do not like to think about the opportunities that I may have missed, because financial gain cannot be replaced with the respect or the perception that the people of this country have about me. "
                    </p>
                </div>
                <div class="col-lg-6 no-padding info-area-left">
                    <img class="img-fluid" src="images/about2.jpg" alt="about">
                </div>
            </div>
        </div>
    </div>
</section>

<span>
    <h5 class="pl-5"> <u> Premnath C Dolawatte | Attorney at Law</u></h5>
</span>

<!--reach section-->
<section class="project p-5" style="background-color: #f4f4f4">
    <div class="container text-center p-3 mb-">
        <div class="text-center">
            <h1 class="mb-3" style="font-weight: bold">Our reach</h1>
            <div class="row mb-5">
                <div class="col-2">
                </div>
                <div class="col-8">
                    <p></p>
                </div>
                <div class="col-">
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-sm-3 col-12">
                <div>
                    <i class="fas fa-users mb-4" style="color: #95103b; font-size: 3rem"></i><br>
                    <span class="count" style="font-size: 1.5rem; font-weight: bold">1500</span><span style="font-size: 1.5rem; font-weight: bold">k</span>
                    <p class="mt-2" style="font-size: 1.5rem;">Members</p>
                </div>
            </div>
            <div class="col-sm-3 col-12">
                <div>
                    <i class="fas fas fa-building mb-4" style="color: #95103b; font-size: 3rem"></i><br>
                    <span class="count" style="font-size: 1.5rem; font-weight: bold">10</span><span style="font-size: 1.5rem; font-weight: bold">k</span>
                    <p class="mt-2" style="font-size: 1.5rem;">Office</p>
                </div>
            </div>
            <div class="col-sm-3 col-12">
                <div>
                    <i class="fas fa-user-friends mb-4" style="color: #95103b; font-size: 3rem"></i><br>
                    <span class="count" style="font-size: 1.5rem; font-weight: bold">100</span><span style="font-size: 1.5rem; font-weight: bold">k</span>
                    <p class="mt-2" style="font-size: 1.5rem;">Grama Niladhari</p>
                </div>
            </div>
            <div class="col-sm-3 col-12">
                <div>
                    <i class="fas fa-award mb-4" style="color: #95103b; font-size: 3rem"></i><br>
                    <span class="count" style="font-size: 1.5rem; font-weight: bold">60</span><span style="font-size: 1.5rem; font-weight: bold">k</span>
                    <p class="mt-2" style="font-size: 1.5rem;">Awards</p>
                </div>
            </div>
        </div>

    </div>
</section>
<?php
include "support/footer.php";
?>