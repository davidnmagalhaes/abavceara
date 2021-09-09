<?php

/****************************************** 
	File Name: custom.css 
/******************************************/
/** ADD YOUR AWESOME CODES HERE **/

header("Content-type: text/css");

include_once("../../config.php");

$clube = $_GET['clube'];

//Pega topo do site
$sq = "SELECT * FROM rfa_site_topo WHERE clube='$clube'";
$pegatopo = mysqli_query($link, $sq) or die(mysqli_error($link));
$row_pegatopo = mysqli_fetch_assoc($pegatopo);
$totalRows_pegatopo = mysqli_num_rows($pegatopo);

$imgbanner = $row_pegatopo['img_banner_topo'];
$capa = $row_pegatopo['capa'];

//Pega conteudo do site
$sc = "SELECT * FROM rfa_site_conteudo WHERE clube='$clube'";
$pegaconteudo = mysqli_query($link, $sc) or die(mysqli_error($link));
$row_pegaconteudo = mysqli_fetch_assoc($pegaconteudo);
$totalRows_pegaconteudo = mysqli_num_rows($pegaconteudo);

$imgvideo = $row_pegaconteudo['background_video'];

$corprincipal = '#1eb589';

$sqsl = "SELECT * FROM rfa_site_slides WHERE clube='$clube'";
$pegaslide = mysqli_query($link, $sqsl) or die(mysqli_error($link));


while ($row_pegaslide = mysqli_fetch_array($pegaslide)) {
     if ($row_pegaslide['img_mobile_topo'] != '') {
          echo ".slide" . $row_pegaslide['id_slide'] . "{background-image: url('../../" . $row_pegaslide['img_banner_topo'] . "') !important;}@media(max-width:768px){.slide" . $row_pegaslide['id_slide'] . "{background-image: url('../../" . $row_pegaslide['img_mobile_topo'] . "') !important;}}";
     } else {
          echo ".slide" . $row_pegaslide['id_slide'] . "{background-image: url('../../" . $row_pegaslide['img_banner_topo'] . "') !important;}@media(max-width:768px){.slide" . $row_pegaslide['id_slide'] . "{background-image: url('../../" . $row_pegaslide['img_banner_topo'] . "') !important;}}";
     }
}
?>

.bturgente{
margin-top: 79px !important;
}
@media(max-width: 768px){
.bturgente{
margin-top: 10px !important;
}
}


.kode-forminfo ul li {
list-style: circle;
}

.titulo-topo{
position:relative; top: 392px; color: #fff; font-size: 100px; font-variant-caps: all-small-caps;
}

.equipe{
height: 305px;
}
.equipe img{
width: 268px;
}

.img-presidente{
width: 70%;
border-radius: 100%;
padding: 26px 20px 20px 20px;
}
.posicaopresidente{
text-align:right; margin-top: 45px;
}
.posicaotexto{
text-align:left; margin-top: 60px;
}

@media (max-width: 768px){
.img-presidente{
width: 30%;
padding: 0 !important;
margin-top:10px
}
.posicaopresidente{
text-align:center; margin-top: 45px;
}
.posicaotexto{
text-align:center; margin: 0 !important;
}
.left-match-time h2 {
color: #fff !important;
text-transform: capitalize !important;
font-weight: 600 !important;
font-size: 20px !important;
line-height: 45px !important;
padding: 0 !important;
margin: 0 !important;
}
}

.short-description{
max-width: 100ch;
overflow: hidden;
text-overflow: ellipsis;
white-space: nowrap;
}
.short-description2{
max-width: 150ch;
overflow: hidden;
text-overflow: ellipsis;
white-space: nowrap;
}

* {
font-family: 'Poppins', sans-serif;
}
h1,h2,h3,h4,h5,h6 {
font-family: 'Poppins', sans-serif;
}
p {
font-family: 'Poppins', sans-serif;
}
body {
overflow-x:hidden;
}
.main-container {
padding: 10px 15px;
}
.skyblue {
background-image:url('../images/main-slider-img1.jpg');
}
.darkerskyblue {
background-image:url('../images/bg1.png');
}
.deepskyblue {
background-image:url('../../<?php echo $imgbanner; ?>');

}
.carousel-indicators {
bottom: 0;
}
.carousel-control.right, .carousel-control.left {
background-image: none;
}
div.full-slider .carousel .item {
height: 100vh;
min-height: 100vh;
width: 100%;
}
.carousel .icon-container {
display: inline-block;
font-size: 25px;
line-height: 25px;
padding: 1em;
text-align: center;
border-radius: 50%;
}
.carousel-caption button {
border-color: #00bfff;
margin-top: 1em;
}
/* Animation delays */
.carousel-caption h3:first-child {
animation-delay: 1s;
}
.carousel-caption h3:nth-child(2) {
animation-delay: 2s;
}
.carousel-caption button {
animation-delay: 3s;
}
.full-slider div.item {
background-size: cover;
background-position: center center;
}
h1 {
text-align: center;
margin-bottom: 30px;
font-size: 30px;
font-weight: bold;
}
.p {
padding-top: 125px;
text-align: center;
}
.p a {
text-decoration: underline;
}
.item {
display: none;
position: relative;
.transition(s ease-in-out left);
}
.slider-contant h3 {
font-size: 58px;
font-weight: 700;
text-shadow: none;
color: #fff;
text-align: left;
line-height: 52px;
letter-spacing: -2px;
}
#carousel-example-generic .carousel-caption {
right: 10%;
left: 10%;
padding-bottom: 30px;
}
.color-yellow {
color:#ffcb05;
}
.carousel-caption p {
font-size: 15px;
text-align: left;
font-weight: 400;
color: #fff;
line-height: 24px;
}
.btn.btn-primary.btn-lg {
float: left;
background: <?php echo $corprincipal; ?>;
font-size: 15px;
text-transform: uppercase;
min-width: 160px;
height: 50px;
border-radius: 5px;
}
.btn.btn-primary.btn-lg:hover,.btn.btn-primary.btn-lg:focus {
background:#fff;
color: #000 !important;
}
#carousel-example-generic .carousel-caption {
position: absolute;
right: 5%;
bottom: 0;
left: 0;
z-index: 10;
padding: 0;
padding-bottom: 0px;
color: #fff;
text-align: center;
text-shadow: 0 1px 2px rgba(0,0,0,.6);
height: 100%;
display: flex;
align-items: center;
}
header {
float: left;
width: 100%;
position: absolute;
z-index: 1;
top: 0;
min-height: 150px;
}
.social-icons li a {
height: 40px;
width: 40px;
background: none;
border: 1px solid #fff;
color: #fff;
border-radius: 100%;
text-align: center;
line-height: 40px;
font-size: 18px;
float: left;
}
.social-icons {
list-style: none;
float: left;
width: auto;
padding: 0;
margin: 0;
}
.social-icons li {
float: left;
margin: 0 15px 0 0;
}
.header-top {
margin: 15px 0 10px;
float: right;
width: 100%;
}
.social-icons li a:hover,.social-icons li a:focus {
border-color:#d8302f;
background:#d8302f;
color:#fff !important;
}
.login {
float: right;
margin: 0;
padding: 0;
list-style: none;
}
.login li {
float: left;
margin: 0 0 0 10px;
font-weight: 500;
}
.login li a {
padding: 9px 25px;
color: #fff;
font-size: 13px;
background: <?php echo $corprincipal; ?>;
border-radius: 50px;
float: left;
}
.login li a:hover, .login li a:focus {
background: #fff;
color: #333;
}
.login li a i {
margin: 0 5px 0 0;
font-size:15px;
}
.header-bottom {
float: left;
width: 100%;
}
.logo {
float: left;
padding: 7px 0 6px;
margin: 0 0 0 0px;
position: relative;
}
.menu {
float: left;
width: 100%;
min-height: auto;
background: #ffffffe0;
}
.main-menu-section {
float: right;
width: 100%;
padding: 0;
}
.right_top_section {
float: right;
padding: 17px 0 0;
}
/** mega menu **/
.mega-dropdown {
position: static !important;
}
.mega-dropdown-menu {
padding: 20px 0px;
width: 100%;
box-shadow: none;
-webkit-box-shadow: none;
}
.mega-dropdown-menu > li > ul {
padding: 0;
margin: 0;
}
.mega-dropdown-menu > li > ul > li {
list-style: none;
}
.mega-dropdown-menu > li > ul > li > a {
display: block;
color: #222;
padding: 3px 5px;
}
.mega-dropdown-menu > li ul > li > a:hover, .mega-dropdown-menu > li ul > li > a:focus {
text-decoration: none;
}
.mega-dropdown-menu .dropdown-header {
font-size: 17px;
color: #222;
padding: 0;
line-height: 30px;
font-weight: 600;
float: left;
width: 100%;
margin-bottom: 5px !important;
text-transform: uppercase;
}
.carousel-control {
width: 30px;
height: 30px;
top: -35px;
}
.left.carousel-control {
right: 30px;
left: inherit;
}
.carousel-control .glyphicon-chevron-left, .carousel-control .glyphicon-chevron-right {
font-size: 12px;
background-color: #fff;
line-height: 30px;
text-shadow: none;
color: #333;
border: none;
}
.menu .navbar-header {
float: left;
display: none;
}
.main-menu-section .navbar.navbar-inverse {
background: transparent;
border: none;
margin: 0;
float: left;
width: auto;
}
.main-menu-section .navbar.navbar-inverse .navbar-collapse {
padding: 0;
}
.main-menu-section .navbar.navbar-inverse .navbar-collapse ul.nav.navbar-nav {
float: left;
margin: 0 18px 0;
}
.navbar.navbar-inverse .navbar-collapse ul.nav.navbar-nav li {
float:left;
}
.navbar.navbar-inverse ul.nav.navbar-nav li a {
float: left;
padding: 28px 18px 26px;
color: #222;
font-weight: 500;
font-size: 16px;
}
.main-menu-section .navbar.navbar-inverse .navbar-collapse ul.nav.navbar-nav li ul li a {
border:none;
}
.main-menu-section .navbar.navbar-inverse .navbar-collapse ul.nav.navbar-nav li.active a, .main-menu-section .navbar.navbar-inverse .navbar-collapse ul.nav.navbar-nav li a:hover, .main-menu-section .navbar.navbar-inverse .navbar-collapse ul.nav.navbar-nav li a:focus {
border-color:#d8302f;
color: <?php echo $corprincipal; ?>;
}
.main-menu-section .navbar.navbar-inverse .navbar-collapse ul.nav.navbar-nav li a span.caret {
display:none;
}
.main-menu-section .navbar.navbar-inverse .navbar-collapse ul.nav.navbar-nav li:hover, .main-menu-section .navbar.navbar-inverse .navbar-collapse ul.nav.navbar-nav li:focus {
background:#fff;
}
.navbar-inverse .navbar-nav > .open > a, .navbar-inverse .navbar-nav > .open > a:focus, .navbar-inverse .navbar-nav > .open > a:hover {
color: #fff;
background-color: transparent;
}
.main-menu-section .navbar.navbar-inverse .navbar-collapse ul.nav.navbar-nav li {
float: left;
margin: 0;
}
.navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:focus, .navbar-inverse .navbar-nav > .active > a:hover {
color: #fff;
background-color: transparent;
}
.main-menu-section .navbar.navbar-inverse .navbar-collapse ul.nav.navbar-nav li li {
margin: 0;
}
.main-menu-section .navbar.navbar-inverse .navbar-collapse ul.nav.navbar-nav li ul li a {
padding: 0;
}
.main-menu-section .navbar.navbar-inverse .navbar-collapse ul.nav.navbar-nav li ul li a.carousel-control {
position: absolute;
top: 0;
}
.main-menu-section .navbar.navbar-inverse .navbar-collapse ul.nav.navbar-nav li ul li a.left.carousel-control {
right: 45px;
left: inherit;
}
.menu-inner {
float: left;
width: 100%;
}
.main-menu-section .navbar.navbar-inverse .navbar-collapse ul.nav.navbar-nav li ul.menu-inner li {
float: left;
width: 100%;
padding: 0;
}
.dropdown-menu.mega-dropdown-menu ul li {
float: left;
width: 100%;
padding: 0;
}
div.main-menu-section div.menu nav.navbar ul.nav li ul.dropdown-menu.mega-dropdown-menu ul li a {
text-transform: none;
font-weight: 400;
font-size: 14px;
margin: 5px 0;
}
#menCollection {
float: left;
width: 100%;
}
div.menu .dropdown-menu {
height: 400px;
width: 100%;
top: 70px;
}
div.menu .dropdown-menu {
border: none;
border-top: solid #ddd 1px;
}
.navbar.navbar-inverse .navbar-collapse ul.nav.navbar-nav li a {
opacity: 1;
border: none;
box-shadow: none;
}
.navbar.navbar-inverse .navbar-collapse ul.nav.navbar-nav li a:hover, .navbar.navbar-inverse .navbar-collapse ul.nav.navbar-nav li a:focus {
color: #d8302f;
}
/** search bar **/
.stylish-input-group .form-control{
border-right:0;
box-shadow:0 0 0;
border-color:#ccc;
}
.stylish-input-group button{
border:0;
background:transparent;
}
.search-bar {
float: right;
}
#imaginary_container {
float: left;
width: 100%;
}
#imaginary_container input.form-control {
float: left;
width: 100%;
border: none;
padding: 12px 21px 12px;
min-height: auto;
height: auto;
border-radius: 0px;
font-style: italic;
font-weight: 300;
font-size: 18px;
background: ;
border: solid #d8302f 2px;
}
.search-bar {
float: right;
width: 30%;
padding: 10px;
}
.news {
float: left;
width: 100%;
min-height: 50px;
background: <?php echo $corprincipal; ?>;
position: absolute;
bottom: 0;
padding: 6px 0;
}
.heading-slider .headline {
float: left;
margin: 0;
font-size: 15px;
font-weight: 400;
color: #fff;
}
.heading-slider b {
height: 25px;
margin: 3px 0 0 15px;
font-weight: 400;
}
.heading-slider {
float: left;
width: 100%;
padding: 6px 0 0;
}
.typewrite {
color: #fff;
font-weight: 400;
font-size: 14px;
float: left;
}
.heading-slider h1 {
float: left;
margin: 3px 0 0 10px;
padding: 0;
}
.headline i {
color: #ffcb05;
}
.full-slider {
position: relative;
}
div.full-slider .carousel-indicators {
bottom: 45px;
margin-bottom: 0;
}
.full {
float: left;
width: 100%;
margin: 0;
padding: 0;
}
.team-btw-match ul {
margin: 0;
padding: 0;
list-style: none;
}
.team-btw-match ul li {
float: left;
text-align: center;
}
.team-btw-match {
float: left;
width: 100%;
display: block;
justify-content: center;
padding: 10px 0 0;
}
.team-btw-match ul {
position: relative;
float: left;
width: 100%;
}
.team-btw-match ul li span {
float: left;
width: 100%;
font-size: 18px;
font-weight: 600;
}
.vs {
display: flex;
height: 100%;
align-items: center;
}
.team-btw-match li.vs span {
background: #000;
float: left;
color: #fff;
padding: 0 6px;
border-radius: 100%;
font-weight: 500;
font-size: 16px;
}
.matchs-vs {
float: left;
width: 100%;
background: #d8302f;
color: #fff;
min-height: 220px;
padding: 90px 0;
justify-content: center;
display: flex;
}
.matchs-info {
float: left;
width: 100%;
background: <?php echo $corprincipal; ?>;
}
.about-us {
float: left;
width: 100%;
background: url('../images/banner1.png');
min-height: 220px;
background-position: center center;
background-size: cover;
}
.about-us:after {
background:rgba(0,0,0.25);
display:flex;
justify-content:center;
align-items:center;
height:100%;
position:absolute;
top:0;
left:0;
content:"";
}
.right-match-time {
text-align: center;
padding: 63px 0 62px;
background: url('../images/match-start-img.png');
background-size: cover;
color: #fff;
background-repeat: no-repeat;
background-position: center bottom;
height: 340px;
}
.left-match-time {
text-align: center;
padding: 0 0 62px;
background: url('../images/topo-left.jpg');
background-size: cover;
color: #fff;
background-repeat: no-repeat;
background-position: center bottom;
height: 340px;
}
.full {
position:relative;
}
.right-match-time h2 {
color: #fff;
text-transform: capitalize;
font-weight: 600;
font-size: 60px;
line-height: 55px;
padding: 0;
margin-bottom: 20px;

}
.left-match-time h2 {
color: #fff;
text-transform: capitalize;
font-weight: 600;
font-size: 30px;
line-height: 55px;
padding: 10px;
margin-bottom: 20px;
margin-top: 20px;

}
.left-match-time span {
color: #fff;
font-size: 15px;
position: relative;
bottom: -15px;
}
.right-match-time ul {
margin: 0 auto 0;
border: 1px solid rgba(255, 255, 255, 0.5);
display: inline-block;
padding: 10px 20px;
list-style: none;
float: none;
width: auto;
}
.left-match-time ul {
margin: 0 auto 0;
border: 1px solid rgba(255, 255, 255, 0.5);
display: inline-block;
padding: 10px 20px;
list-style: none;
float: none;
width: auto;
}
.right-match-time ul li {
font-size: 30px;
color: #fff;
float: left;
margin: 0 auto;
text-shadow: 1px 1px 1px #000;
}
.left-match-time ul li {
font-size: 30px;
color: #fff;
float: left;
margin: 0 10px;
text-shadow: 1px 1px 1px #000;
}
.right-match-time > span {
display: block;
font-size: 20px;
color: #fff;
text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
}
.left-match-time > span {
display: block;
font-size: 20px;
color: #fff;
text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
}
/** .right-match-time::after {
content: "";
width: 90%;
height: 80%;
position: absolute;
top: 10%;
left: 5%;
background: rgba(0,0,0,.3);
}
/** .left-match-time::after {
content: "";
width: 90%;
height: 80%;
position: absolute;
top: 10%;
left: 5%;
background: rgba(0,0,0,.3);
}
**/
.left-match-time ul, .left-match-time h2, .left-match-time span {
position: relative;
z-index: 1;
}
.left-time ul, .left-match-time h2, .left-match-time span {
position: relative;
z-index: 1;
}
/** end search bar **/
div.menu div.search-bar .input-group-addon {
background: #d8302f;
border: none;
border-radius: 0;
color: #fff;
font-size: 20px;
height: auto;
padding: 14px 16px;
}
footer#footer {
min-height: auto;
background: #111;
float: left;
width: 100%;
padding: 0;
border-top: solid #ddd 1px;
position: relative;
background-position: center top;
background-size: cover;
}
section#contant {
float: left;
width: 100%;
padding: 50px 0 25px;
background: #fff;
}
#sidebar {
float: left;
width: 100%;
background: #fff;
min-height: auto;
padding: 0;
box-shadow: 0 10px 20px -25px rgba(50,50,50,1);
border: solid #e1e1e1 1px;
margin-bottom: 25px;
}
aside#sidebar h3 {
font-size: 16px;
color: #363636;
float: left;
margin: 10px 0;
padding: 0 15px;
font-weight: 600;
width: 100%;
text-align:center;
}
aside#sidebar .team-btw-match ul li:first-child {
float: left;
}
aside#sidebar .team-btw-match ul li span {
color: #222;
text-transform: capitalize;
font-weight: 600;
display: block;
font-size: 14px;
}
aside#sidebar .team-btw-match ul li {
width: 41%;
text-align: center;
float: right;
}
aside#sidebar .team-btw-match.style-2 ul li span {
color: #222;
}
aside#sidebar .macth-fixture ul {
padding: 15px 0;
overflow: hidden;
border-bottom: 1px solid #e1e1e1;
}
aside#sidebar .team-btw-match ul {
position: relative;
padding: 10px 0;
display: flex;
}
.team-btw-match ul:nth-child(2n+2) {
background: #f6f6f6;
}
.feature-matchs table {
font-size: 13px;
margin: 0;
color: #333;
}
.feature-matchs td img {
margin: 0 5px 0 0;
}
.matchs-vs li.vs {
margin: 50px 0 0;
}
section#contant h4.heading-side-bar-2 {
float: left;
width: 100%;
padding: 10px 15px;
font-size: 15px;
border-top: solid #eee 2px;
font-weight: 400;
}
.top-story {
padding: 30px 0;
}
.content-widget {
border: 1px solid #e1e1e1;
margin: 0 0 30px;
background: #fff;
-webkit-box-shadow: 1px 1px 2px 0px rgba(50, 50, 50, 0.21);
-moz-box-shadow: 1px 1px 2px 0px rgba(50, 50, 50, 0.21);
box-shadow: 1px 1px 2px 0px rgba(50, 50, 50, 0.21);
float: left;
width: 100%;
}
.top-stroy-header {
padding: 0 30px;
}
.top-story h2 {
font-size: 20px;
position: relative;
font-weight: 600;
margin: 0 0 10px;
text-transform: capitalize;
}
.top-story .date {
display: block;
border-bottom: 3px solid #000;
padding: 0 0 10px;
margin: 0 0 20px;
font-size: 14px;
}
.top-story h2 {
font-size: 19px;
position: relative;
font-weight: 600;
margin: 0;
text-transform: capitalize;
padding: 0;
}
.other-stroies li {
position: relative;
margin: 7px 10px;
}
.other-stroies li a {
padding: 9px 30px;
color: #555;
font-weight: 400;
font-size: 14px;
}
.other-stroies li::before {
content: "\f105";
font-family: fontawesome;
position: relative;
left: 15px;
top: 50%;
margin: -10px 0 0;
}
ul {
margin: 0;
padding: 0;
list-style: none;
}
.other-stroies {
float: left;
width: 100%;
padding-left: 15px;
}
.news-post-widget {
float: left;
width: 100%;
margin: 0 0 30px;
position: relative;
box-shadow: 0 10px 20px -25px rgba(50,50,50,1);
border: solid #e1e1e1 1px;
padding: 0 0 15px 0;
}
.news-post-widget .img-responsive {
width: 100%;
margin-bottom: 10px;
}
.news-post-detail {
padding: 5px 20px 10px;
}
.news-post-detail .date {
font-size: 13px;
}
.news-post-detail h2 {
font-size: 18px;
font-weight: 600;
margin: 0;
padding: 5px 0 5px;
}
.news-post-detail p {
font-size: 14px;
}
section.main-heading {
float: left;
width: 100%;
}
section.main-heading h2 {
float: left;
width: 100%;
text-align: center;
font-size: 25px;
line-height: 21px;
font-weight: 600;
color: #222;
padding: 0;
margin: 0;
position: relative;
}
section.main-heading h2::after {
width: 50px;
height: 4px;
background: #d8302f;
margin: 15px auto 0;
display: block;
position: relative;
content: "";
}
.cont {
float: left;
width: 100%;
min-height: auto;
background: #fff;
position: relative;
margin-top: 35px;
}
.footer-widget {
float: left;
width: 100%;
padding: 50px 0 10px;
}

.footer-widget p {
font-size: 14px;
color: #fff;
margin: 20px 0 10px;
font-weight: 300;
line-height: normal;
margin-bottom: 15px;
}
.social-icons {
margin-top: 0;
}
.footer-widget h3 {
color: #fff;
text-transform: none;
font-weight: 500;
font-size: 18px;
float: left;
width: 100%;
padding-left: 0;
padding-bottom: 0;
line-height: 20px;
margin-bottom: 10px;
border-bottom: solid #333 1px;
padding-bottom: 15px;
padding-top: 7px;
}
.footer-menu {
float: left;
width: 100%;
margin: 0;
padding: 0;
line-height: 32px;
}
.contact-footer {
float: left;
width: 100%;
position: relative;
height: 100%;
background: orange;
top: 0;
left: 0;
min-height: 350px;
}
.contact-footer iframe {
float: left;
width: 100%;
}
.information {
float: left;
width: 90%;
position: absolute;
top: 5%;
left: 5%;
height: 90%;
background: rgba(255,255,255,.9);
box-shadow: 0 0 30px -20px #000;
padding: 58px;
}
.footer-links a:hover, .footer a:hover {
color: #d8302f !important;
}
.information h3 {
color: #222;
text-transform: none;
font-weight: 600;
font-size: 20px;
border-left: solid #d8302f 5px;
float: left;
width: 100%;
padding-left: 10px;
padding-bottom: 0;
line-height: 20px;
margin-bottom: 10px;
}
.address-list {
float: left;
width: 100%;
margin-top: 10px;
}
.address-list li {
float: left;
width: 100%;
position:relative;
}
.address-list li i {
font-size: 24px;
width: 25px;
text-align: center;
position: absolute;
left: 0;
}
.address-list li {
float: left;
width: 100%;
position: relative;
line-height: 30px;
padding-left: 35px;
margin-bottom: 15px;
font-weight: 300;
font-size: 14px;
}
.footer-bottom {
float: left;
width: 100%;
text-align: center;
min-height: 45px;
line-height: 45px;
border-top: solid #222 1px;
background: #111;
color: #fff;
}
.footer-bottom p {
margin: 0;
font-size: 14px;
color: #fff;
line-height: 50px;
font-weight: 300;
}
.inner-page-banner {
float: left;
width: 100%;
min-height: 500px;
background-image: url('../../<?php if (empty($capa)) {
                                   echo "images/avatarbanner.jpg";
                              } else {
                                   echo $capa;
                              } ?>');
background-position: center center;
background-repeat: no-repeat;
background-size: cover;
position: relative;
}
.inner-information {
float: left;
width: 100%;
margin-top: 250px;
color: #fff;
text-align: center;
}
.inner-information h3 {
margin: 0;
color: #fff;
font-size: 32px;
text-transform: uppercase;
font-weight: 600;
letter-spacing: -1px;
position: relative;
}
.inner-information h3::after {
width: 50px;
height: 5px;
background: #ffcb05;
margin: 0 auto;
position: relative;
padding: 0;
content: "";
display: block;
}
.breadcrumb {
padding: 11px 0;
margin-bottom: 0;
list-style: none;
background-color: transparent;
border-radius: 0;
border: none;
color: #fff;
float: right;
}
.breadcrumb li {
color: #fff;
}
.breadcrumb li a {
color:#fff;
}
.breadcrumb > .active {
color: #d8302f;
}
.inner-information-text {
float: left;
width: 100%;
background: #111;
color: #fff;
}
.inner-information-text h3 {
color: #fff;
margin: 0;
padding: 10px 0;
float: left;
text-transform: uppercase;
}
/** testimonial **/
#quote-carousel {
padding: 0;
margin-top: 0;
}
#quote-carousel .carousel-control {
background: none;
color: #CACACA;
font-size: 2.3em;
text-shadow: none;
margin-top: 30px;
}
#quote-carousel .carousel-indicators {
position: relative;
right: 50%;
top: auto;
bottom: 0px;
margin-top: 0;
margin-right: -19px;
margin-bottom: 20px;
}
#quote-carousel .carousel-indicators li {
width: 50px;
height: 50px;
cursor: pointer;
border: 1px solid #ccc;
box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
border-radius: 50%;
opacity: 0.4;
overflow: hidden;
transition: all .4s ease-in;
vertical-align: middle;
}
#quote-carousel .carousel-indicators .active {
opacity: 1;
border:none;
}
.item blockquote {
border-left: none;
margin: 0;
}
.item blockquote p:before {
content: "\f10d";
font-family: 'Fontawesome';
float: left;
margin-right: 10px;
}
#quote-carousel p {
font-size: 15px;
}
#quote-carousel .item blockquote p::before {
content: "\f10d";
font-family: 'Fontawesome';
float: left;
margin-right: 5px;
font-size: 48px;
position: relative;
top: -10px;
}
.testimonial img {
max-width: 100%;
}
p {
font-size: 15px;
text-align: center;
color: #333;
line-height: 28px;
}
.team .card {
float: left;
width: 100%;
border: solid #ccc 1px;
margin-bottom: 20px;
padding-bottom: 0px;
min-height:162px;
}
.team .card2 {
float: left;
width: 100%;
border: solid #ccc 1px;
margin-bottom: 20px;
padding-bottom: 15px;

}
section#contant h4 {
float: left;
width: 100%;
text-align: center;
margin: 0;
padding: 0 0 10px;
font-size: 1em !important;
color: #222;
}
section#contant p.title {
float: left;
width: 100%;
font-size: 18px !important;
}
.main-heading-holder {
text-align: center;
padding-bottom: 0;
padding-top: 30px;
float: left;
width: 100%;
}
.theme-padding.middle-bg {
float: left;
width: 100%;
}
.main-heading {
display: inline-block;
text-align: center;
width: 100%;
margin-bottom: 35px;
}
section {
float: left;
width: 100%;
}
.main-heading.sytle-2 h2 {
position: relative;
display: inline-block;
padding: 0 20px;
text-transform: capitalize;
font-weight: 600;
color: #111;
line-height: 21px;
font-size: 30px;
}
section#contant p.title {
float: left;
width: 100%;
font-size: 15px;
text-align: center;
margin: 0;
}
section#contant p {
float: left;
width: 100%;
line-height: 24px;
font-size: 14px;
text-align: left;
font-weight: 300;
}
.main-heading p {
color: #363636;
line-height: normal;
margin-top: 0;
}
.main-heading.sytle-2 h2::before, .main-heading.sytle-2 h2::after {
content: "";
width: 86px;
top: 50%;
position: absolute;
border-bottom: 4px solid #1b73cd;
}
.main-heading.sytle-2 h2::before {
right: 100%;
}
.main-heading.sytle-2 h2::after {
left: 100%;
}
.theme-padding.middle-bg {
padding-top: 100px;
padding-bottom: 100px;
background-image: url(../../<?php if (empty($imgvideo)) {
                                   echo "images/avatarbanner.jpg";
                              } else {
                                   echo $imgvideo;
                              } ?>);
background-repeat: no-repeat;
background-position: top center;
position: relative;
background-size: cover;
background-attachment: fixed;
box-shadow: 0 0 100px -80px rgba(0,0,0,0.8);
min-height: 515px;
}
.video-item img {
border: solid #fff 5px;
box-shadow: 0 0 40px -25px #000;
}
.team-holder {
float: left;
width: 100%;
padding-top: 50px;
padding-bottom: 75px;
}
.player-name {
position: absolute;
background: #000;
text-align: left;
bottom: 0;
width: 100%;
padding: 15px 20px;
}
.player-name h5 {
margin: 0;
color: #fff;
font-size: 16px;
float: left;
margin: 0;
padding: 0;
}
.player-name .player-number {
border-radius: 0;
top: 0;
right: 0;
left: auto;
height: 100%;
line-height: 58px;
background: #d8302f;
color: #fff;
width: 48px;
border: 0;
position: absolute;
text-align: center;
font-size: 24px;
font-weight: 600;
}
.team-column {
position: relative;
float: left;
overflow: hidden;
transition: ease all 1s;
}
.player-name h5 {
margin: 0;
color: #fff;
font-size: 16px;
}
.player-name .desination-2 {
position: absolute;
bottom: 100%;
left: 0;
background: <?php echo $corprincipal; ?>;
z-index: 1;
padding: 3px 20px 2px;
text-transform: capitalize;
color: #FFF;
font-size: 14px;
font-weight: 400;
}
.player-name .desination-2::before {
content: "";
position: absolute;
left: 100%;
top: 1px;
width: 0;
height: 0;
border-bottom: 30px solid <?php echo $corprincipal; ?>;
border-right: 20px solid transparent;
}
.team-column.style-2 .overlay {
background: rgba(0, 0, 0, 0.8);
z-index: 2;
visibility: hidden;
opacity: 0;
}
.overlay {
position: absolute;
height: 100%;
width: 100%;
left: 0;
top: 0;
}
.team-column.style-2 .team-detail-hover {
padding: 0 20px;
}
.team-column.style-2 .overlay p {
color: #fff;
margin: 0 0 10px;
}
.team-column.style-2 .overlay .social-icons {
display: inline-block;
margin: 0 0 10px;
}
.team-column.style-2 .overlay .social-icons li a {
color: #fff;
border: 1px solid #fff;
}
.social-icons.style-4 li a {
height: 40px;
width: 40px;
background: none;
border: 1px solid #fff;
color: #fff;
border-radius: 100%;
text-align: center;
line-height: 40px;
font-size: 18px;
}
footer div.full p {
text-align: left;
}
.team-column img {
transition:ease all 1s;
}
.team-column:hover img,.team-column:focus img {
transform: scale(1.2);
}
.aboutus h3 {
font-size: 22px;
padding: 0;
text-align: left;
font-weight: 500;
margin-bottom: 10px;
}
.icon-list {
float: left;
width: 100%;
text-align: left;
font-size: 14px;
font-weight: 400;
color: #363636;
line-height: 28px;
}
.dark-section {
float: left;
width: 100%;
background: #000;
margin-top: 50px;
min-height: auto;
padding: 50px 0;
background-position: cover;
color: #fff;
}
section.main-heading .dark-section h2 {
float: left;
width: 100%;
text-align: center;
font-size: 30px;
line-height: 21px;
font-weight: 600;
color: #fff;
padding: 0;
margin: 0;
position: relative;
}
.testimonial-slider {
float: left;
width: 80%;
background: #fff;
margin: 40px 10% 0 10%;
padding: 40px 0;
}
.testimonial-slider p {
text-align: center !important;
}
.testimonial-slider a.carousel-control {
display: none;
}
button.button {
background: #1c72ce;
color: #fff;
border: none;
padding: 6px 20px;
border-radius: 50px;
font-size: 14px;
font-weight: 500;
}
.center {
float: left;
width: 100%;
}
.footer-menu li {
font-weight: 300;
font-size: 14px;
}
.footer-logo img {
width: 300px;
padding-top: 10px;
}
.feature-post {
float: left;
width: 100%;
position: relative;
}
.feature-img {
float: left;
width: 100%;
position: relative;
}
.feature-cont {
float: right;
background: #fff;
width: 100%;
margin: 0 0 25px 0;
position: relative;
z-index: 1;
padding: 25px 35px;
}
.post-people {
float: left;
width: 100%;
}
.left-profile {
float: left;
}
.post-info {
float: left;
}
.post-info img {
float: left;
width: 80px;
border-radius: 100%;
box-shadow: none;
border: solid #ccc 3px;
}
.post-info span {
float: left;
margin: 8px 0 0 15px;
}
.main-heading.sytle-2 p {
margin-top: 15px;
}
body section#contant .post-info span h4 {
font-size: 16px;
margin: 0;
color: #d8302f;
text-align: left;
padding: 10px 0 0 0;
}
body section#contant .post-info span h5 {
float: left;
width: 100%;
text-align: left;
font-size: 13px;
color: #999;
}
.post-heading {
float: left;
width: 100%;
text-align: left;
margin-top: 15px;
}
.post-heading h3 {
font-size: 18px;
font-weight: 600;
line-height: 25px;
margin: 0 0 15px 0;
padding: 0;
}
.feature-post.small-blog {
background: #f9f9f9;
padding: 15px 0;
border: solid #dfdfdf 1px;
margin-bottom: 30px;
}
.feature-post.small-blog .feature-cont {
float: right;
background: transparent;
width: 100%;
margin: 0px 0 25px 0;
position: relative;
z-index: 1;
padding: 0 0;
}
.btn {
float: left;
background: <?php echo $corprincipal; ?>;
color: #fff;
padding: 10px 20px;
font-size: 15px;
border-radius: 50px;
margin-top: 5px;
font-weight:500;
transition:ease all 1s;
}
.btn:hover,.btn:focus {
background:#111;
color:#fff !important;
transition:ease a11 1s;
}
.blog-sidebar {
float: left;
width: 100%;
background: #fff;
padding: 20px 20px 0 20px;
border: solid #e1e1e1 1px;
margin-bottom: 25px;
}
.search-bar-blog {
float: left;
width: 100%;
padding: 0;
}
.search-bar-blog form {
float: left;
width: 100%;
padding-bottom: 15px;
}
.search-bar-blog form input {
float: left;
width: 177px;
padding: 4px 15px;
border: none;
font-size: 15px;
background: #f0f0f0;
}
.search-bar-blog form button {
background: #222;
border: none;
padding: 4px 11px;
float: right;
color: #fff;
}
section#contant .blog-sidebar h4.heading {
margin: 0;
text-align: left;
}
section#contant .blog-sidebar div.category-menu {
float: left;
width: 100%;
text-align: left;
font-size: 14px;
line-height: 35px;
}
section#contant .blog-sidebar div.category-menu li {
border-bottom: solid #ddd 1px;
padding: 5px 0;
}
section#contant .blog-sidebar div.category-menu img {
width: 100%;
margin-bottom: 10px;
}
section#contant .blog-sidebar div.category-menu li span {
float: left;
width: 100%;
padding-bottom: 5px;
padding-top: 0;
}
.contact {
float: left;
width: 100%;
}
.contact iframe {
width:100%;
}
.contact-info {
float: left;
width: 100%;
background: #f8f8f8;
border: solid #ccc 1px;
padding: 32px 35px 30px 35px;
text-align: left;
margin-top: 30px;
}
.contact-us {
margin-top: 30px;
}
.contact-us input, .contact-us textarea {
float: left;
width: 100%;
padding: 8px 15px;
border: solid #ccc 1px;
margin-bottom: 25px;
}
#contactform {
float: left;
width: 100%;
}
#contactform ul {
float: left;
width: 100%;
}
#contactform ul li {
float:left;
width:100%;
}
#contactform ul li input.thbg-color {
background: #d8302f;
border: none;
color: #fff;
text-transform: uppercase;
font-weight: 600;
font-size: 16px;
transition:ease all 0.5s;
}
#contactform ul li input.thbg-color:hover,#contactform ul li input.thbg-color:focus {
background:#111;
}
section#contant .blog-sidebar div.category-menu ul li:last-child {
border-bottom:none;
}
.contact-info div.kode-section-title {
float: left;
width: 100%;
}
.contact-info div.kode-section-title h3 {
margin: 0;
padding: 0;
font-weight: 500;
margin-bottom: 5px;
}
.kode-form-list {
float: left;
width: 100%;
position: relative;
padding-left: 30px;
}
.kode-form-list li {
float: left;
width: 100%;
}
.kode-form-list li i {
float: left;
position: absolute;
left: 0;
font-size: 20px;
color: #222;
}
section#contant p strong {
/*float: left;
width: 100%;
margin-bottom: 5px;*/
}
.kode-team-network {
float: left;
width: 100%;
}
.single-blog div.feature-cont {
box-shadow: 0 15px 25px -30px #000;
padding-left: 0;
padding-right: 0;
}
.clients-say {
width: 100%;
margin: 25px 0;
padding: 25px;
color: #fff;
border-radius: 0;
float: left;
border: solid #ddd 2px;
box-shadow: 0 0 35px -26px #000;
}
.clients-say p i {
font-size: 25px;
margin-right: 10px;
}
.clients-say .text-right {
float: right;
transform: skew(0deg);
color: #d8302f;
font-weight: 400;
width: 100%;
font-size: 15px;
}
.section.single-blog .share-post {
margin: 13px 0;
float: left;
padding: 10px 0;
border-right: none;
border-left: none;
}
.share-text {
float: left;
margin: 0px 0 0;
font-size: 18px;
color: #666;
}
.social-icon {
float: right;
list-style: none;
margin: 0;
}
.share-post li {
float: left;
margin: 0 0 0 25px;
}
.share-post li a {
color: #999 !important;
}
.share-post {
float: left;
width: 100%;
border: solid #ddd 1px;
padding: 15px 20px;
}
.commant-section {
float: left;
margin: 25px 0;
border: solid #ddd 1px;
padding: 30px 15px;
width: 100%;
}
.commant-section h3 {
font-size: 20px;
font-weight: 500;
float: left;
width: 100%;
padding-bottom: 15px;
text-align: left;
}
.commant-text {
border-bottom: solid #ddd 1px;
padding-bottom: 25px;
padding-top: 25px;
}
.profile img {
border-radius: 100%;
border: none;
box-shadow: none;
}
.commant-section h5 {
letter-spacing: 1px;
font-size: 15px;
font-weight: 500;
margin: 0;
text-align:left;
padding: 0;
}
.msg {
font-size: 13px;
}
.c_date, .comment-reply-link {
font-size: 13px;
font-weight: 400;
margin-right: 0;
}
span a.comment-reply-link {
color: #d8302f;
font-weight: 500;
}
.comment-box-half {
float: left;
width: 100%;
}
.comment-box-half input {
width: 100%;
background: #f9f9f9;
border: 1px solid #ebebeb;
margin-bottom: 20px;
padding: 10px 20px;
font-weight: 300;
}
.comment-box-full textarea {
width: 100%;
background: #f9f9f9;
border: 1px solid #ebebeb;
margin-bottom: 20px;
padding: 10px 20px;
font-weight: 300;
}
.comment-box-submit input#submit {
padding: 9px 30px;
border: none;
margin: 10px 0 10px;
font-size: 16px;
text-transform: none;
letter-spacing: 0px;
background: #d8302f;
border-radius: 0px;
transition: ease all 1s;
color: #fff;
}
.commant-text div.commant-text {
border-bottom: none;
}
.commant-section .commant-text.row:last-child {
border-bottom: none;
}


/** responsive **/
@media (max-width:768px) {
.team .card {
float: left;
width: 100%;
border: solid #ccc 1px;
margin-bottom: 20px;
padding-bottom: 15px;
height: 630px;
}
.header-top .right_top_section {
display: none;
}
.logo {
float: left;
padding: 15px 0 10px;
margin: 0 0 0 0px;
position: relative;
width: 100%;
text-align: center;
}
.logo img {
width: 160px;
}
.main-menu-section {
float: right;
width: 100%;
padding: 0;
}
.search-bar {
display: none;
}
.menu .navbar-header {
float: left;
display: block;
width: 100%;
}
#carousel-example-generic .carousel-caption {
right: 0;
display: block;
}
.slider-contant h3 {
font-size: 25px;
font-weight: 700;
text-shadow: none;
color: #fff;
text-align: left;
line-height: 1.1;
}
.slider-contant {
display: block;
position: absolute;
top: 420px;
}
.menu {
float: left;
width: 100%;
min-height: auto;
background: #fff;
border-radius: 0;
padding: 0 20px;
}
.main-menu-section .navbar.navbar-inverse {
background: transparent;
border: none;
margin: 0;
float: left;
width: 100%;
}
.navbar-brand {
float: left;
height: 50px;
padding: 15px 0;
font-size: 16px;
line-height: 20px;
text-transform: uppercase;
font-weight: 500;
}
button.navbar-toggle {
margin-right: 0;
}
.navbar-inverse .navbar-toggle .icon-bar {
background-color: #222;
}
.navbar-toggle .icon-bar {
display: block;
width: 20px;
height: 3px;
border-radius: 0px;
}
.navbar-inverse .navbar-brand {
color: #000;
font-size: 18px;
}
.navbar-inverse .navbar-toggle:focus, .navbar-inverse .navbar-toggle:hover {
background-color: #fff;
}
.navbar-toggle .icon-bar + .icon-bar {
margin-top: 3px;
}
.navbar-toggle {
padding: 9px 9px;
}
div.menu .dropdown-menu {
display:none;
}
.news {
display:none;
}
.team-btw-match ul {
position: relative;
float: left;
width: 100%;
display: flex;
padding: 0 10px;
}
.team-btw-match ul li span {
font-size: 15px;
}
.right-match-time ul {
border: none;
width: auto;
display: flex;
}
.team-column {
margin-bottom: 25px;
}
#team-slider div.container {
padding: 0;
}
#team-slider div.container div.col-md-3 {
padding:0;
}
.team-column {
width: 100%;
}
.team-holder {
float: left;
width: 100%;
padding-top: 0;
padding-bottom: 75px;
}
.main-heading.sytle-2 h2 {
position: relative;
display: inline-block;
padding: 0 10px;
text-transform: capitalize;
font-weight: 600;
color: #111;
line-height: 20px;
font-size: 22px;
}
.footer-bottom p {
margin: 0;
font-size: 14px;
color: #fff;
line-height: normal;
font-weight: 300;
padding: 15px 0;
width: 100%;
text-align: center;
}
.main-heading.sytle-2 h2::before, .main-heading.sytle-2 h2::after {
display: none;
}
.navbar-collapse {
float: left;
width: 100%;
}
.testimonial-slider {
float: left;
width: 100%;
background: #fff;
margin: 40px 0 0 0;
padding: 40px 0;
}
section.main-heading .dark-section h2 {
font-size: 25px;
}
.carousel-indicators {
position: absolute;
bottom: 10px;
left: 0;
z-index: 15;
width: 100%;
padding-left: 0;
margin-left: 0;
text-align: center;
list-style: none;
margin: 0;
}
.feature-cont {
padding: 25px 0;
}
.feature-post.small-blog .feature-img {
margin-bottom: 20px;
}
.post-heading h3 {
font-size: 15px;
line-height: 25px;
}
section#contant p {
float: left;
width: 100%;
line-height: 24px;
font-size: 13px;
text-align: left;
font-weight: 400;
}
.contact-info {
padding: 20px 20px 20px 20px;
margin-top: 30px;
margin-bottom: 30px;
}
.commant-section h5 {
margin: 15px 0 0;
padding: 15px 0;
border-top: solid #ddd 1px;
}
.profile img {
width: 140px;
margin: 0 auto;
}
.navbar-collapse {
float: left;
width: 100%;
margin: 0;
border-top: solid #ccc 1px !important;
}
.navbar-collapse .nav.navbar-nav {
margin: 0;
}
.main-menu-section .navbar.navbar-inverse .navbar-collapse ul.nav.navbar-nav {
float: left;
padding: 5px 0;
}
.main-menu-section .navbar.navbar-inverse .navbar-collapse ul.nav.navbar-nav li {
float: left;
margin: 0;
width: 100%;
}
.main-menu-section .navbar.navbar-inverse .navbar-collapse ul.nav.navbar-nav li a {
float: left;
width: 100%;
padding: 10px 0;
}
.post-info span {
float: left;
margin: 10px 0 0 0;
}
.main-menu-section .navbar.navbar-inverse .navbar-collapse ul.nav.navbar-nav {
margin: 0;
}
.right-match-time ul li {
font-size: 17px;
}
.theme-padding.middle-bg {
padding-top: 60px;
padding-bottom: 60px;
background-image: url(../../<?php if (empty($imgvideo)) {
                                   echo "images/avatarbanner.jpg";
                              } else {
                                   echo $imgvideo;
                              } ?>);
background-repeat: no-repeat;
background-position: top center;
position: relative;
background-size: cover;
background-attachment: fixed;
box-shadow: 0 0 100px -80px rgba(0,0,0,0.8);
min-height: auto;
}
}