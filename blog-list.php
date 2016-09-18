<?php
include 'script/konek.php';

if (isset($_GET['i']))
    {
        $additionBasePath = "../";
        $_GET['news'] = $_GET['i'];
    }
    else{
        $additionBasePath = "";
    }

function Cut_Words($var, $len = 200, $txt_titik = '...')
{
    if (strlen($var) < $len) {return $var;}
    if (preg_match('/(.{1,$len})\s/', $var, $match)) {return $match[1] . $txt_titik;} else {return substr($var, 0, $len) . $txt_titik;}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WRP Diet - Blog</title>
<?php include 'header.php';?>

</head>
<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <?php

include 'navbar.php';

?>

<div class="contentWrapper">

    <div class="content">
        <div style="position:relative; width:100%; float:left;">
           <?php

                if (isset($_GET['i'])) {
                   

                    $batas   = 10;
                    $halaman = $_GET['i'];
                      if(empty($halaman)){
                    $posisi  = 0;
                     $halaman = 1;
                    }
                    else{ 
                    $posisi  = ($halaman-1) * $batas; 
                    }
                    $sql_select  = "SELECT * FROM `blog` order by tanggal desc   LIMIT $posisi,$batas ";
                    $tampil = mysqli_query($konek, $sql_select);
                    $no = $posisi+1;
                    while ($r = mysqli_fetch_array($tampil)) {
                ?>
            <div class="kolomkiri">
                <div class="blog-content" style="z-index:2">

              
             
                  <table>
                        <tr>
                            <td rowspan="2" style="padding:10px !important; border-bottom: 1px solid #ccc;">
                                <div>
                                    <img src="<?php echo $additionBasePath; ?>images/blog/img/<?php echo $r['gambar'] ?>"  height="130" width="200" />
                                </div>

                            </td>
                            <td>
                                <a href="../blog/<?php echo $r['nama_link'] ?>">
                                        <strong style="color:#C61F34;font-size: 18px;"><?php echo $r['judul'] ?></strong>
                                    </a>
                                    <br>
                                     <span style="font-size: 10px; color:orange;">
                                        <i class="glyphicon glyphicon-calendar"></i>
                                        <?php echo date('M d, Y', strtotime($r['tanggal'])) ?>
                                    </span><br>
                            </td>
                        </tr>
                        <tr >
                            <td valign="top" style="border-bottom: 1px solid #ccc;">
                                <?php echo Cut_Words($r['isi'], 200) ?>
                            </td>
                        </tr>
                <?php
                  $no++;   }
                }
                ?>
                </table>
              
   
                </div>

 
    <br>
                             <?php
$query2     = mysqli_query($konek, "select * from `blog`");
$jmldata    = mysqli_num_rows($query2);
$jmlhalaman = ceil($jmldata/$batas);

echo "<br> Halaman : ";

for($i=1;$i<=$jmlhalaman;$i++)
if ($i != $halaman){
 echo " <a href= '../bloglist/$i'>$i</a> | ";
}
else{ 
 echo " <b>$i</b> | "; 
}

?>
                <div class="space" style="padding-bottom:20px;"></div>
            </div>
                 
            <div class="kolomkanan-blog" id="kolomkanan">
                <div class="readmore-blog">
                    <div class="readmore-title">
                        <h4>MOST VIEWED</h4>
                              </div>
                            <div class="blog-content">
                                  <table cellpadding="5px" cellspacing="5px">
                                 <tbody>
                                   <?php
                                   $sql_select = mysqli_query($konek, "SELECT * FROM `blog` order by tanggal desc LIMIT 5");
                                      while ($r = mysqli_fetch_array($sql_select)) {
                                     ?>

                       
                            <tr class="judul border-btm" >
                                <td style="padding:10px !important;" valign="top">
                                    <img src="<?php echo $additionBasePath; ?>images/blog/img/<?php echo $r['gambar'] ?>" width="80px" />
                                </td>
                               <td valign="top">
                                    <span style="font-size: 10px; color:orange;">
                                        <i class="glyphicon glyphicon-calendar"></i>
                                        <?php echo date('M d, Y', strtotime($r['tanggal'])) ?>
                                    </span><br>
                                    <a href="../blog/<?php echo $r['nama_link'] ?>">
                                        <strong style="color:#C61F34;"><?php echo $r['judul'] ?></strong>
                                    </a>
                                </td>
                            <tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
</div>


                    <center><div class="border-red"></div></center>

                    <center>
                        <div class="widget-title">
                            LIKE US ON FACEBOOK
                        </div>
                        <div class="fb-page" data-href="https://www.facebook.com/WRPdiet" data-tabs="timeline" data-width="250" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/WRPdiet"><a href="https://www.facebook.com/WRPdiet">WRP</a></blockquote>
                            </div>
                        </div>
                    </center><br>
 <center><div class="border-red"></div></center>
                    <center>
                        <div class="widget-title">
                            LIKE US ON TWITTER
                        </div>
                       <a class="twitter-timeline" href="https://twitter.com/WRPdiet" data-widget-id="723197752113401856">Tweets by @WRPdiet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

                    </center>
                </div>
            </div>

        </div>

        </div>
 
        <div class="moretips" style="z-index:-1;">
            <ul>
               &nbsp;
            </ul>
        </div>


    </div>

<?php
include 'footer.php';
?>

<script>
  var cLocation = '<?php echo $_SERVER['REQUEST_URI']; ?>';
  function firstArticelBaseOnMeta() {
   var metas = document.getElementsByTagName('meta');

   for (i=0; i<metas.length; i++) {
      if (metas[i].getAttribute("property") == "og:url") {
         return metas[i].getAttribute("content");
      }
   }
    return "";
}
  var nDirection = firstArticelBaseOnMeta();
  if( cLocation === '/eat_up' || cLocation === '/how_to_diet' ||  cLocation === '/lets_exercise' ||  cLocation === '/beauty_corner')
  {
    window.location.href = nDirection;
  }

</script>

<link rel="stylesheet" type="text/css" href="<?php echo $additionBasePath; ?>styles/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $additionBasePath; ?>styles/global.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $additionBasePath; ?>styles/main.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $additionBasePath; ?>styles/lifestyle.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $additionBasePath; ?>styles/mystyle.css" />
<style>
.g-share iframe{
  margin-bottom: -6px !important;
}
.kolomkanan{
    width: 300px;
    padding-right: 4px;
    position: relative;
    right:0%;
    top:0%;
}

.kolomkanan.affix{

    position: fixed;
    top: -26%;
    width: 300px;
    right:12%;
}

.kolomkanan.affix-top {
    position:absolute;
    top: 100px;
  }
  .kolomkanan.affix-bottom {
      position: relative;
  }
</
</style>


<script src="https://apis.google.com/js/platform.js" async defer></script>

<script type="text/javascript" src="<?php echo $additionBasePath; ?>script/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="<?php echo $additionBasePath; ?>script/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo $additionBasePath; ?>script/jquery.scrollTo.js"></script>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "39a8148e-644f-41f1-a420-dea32ef179c1", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-3573007-2', 'auto');
      ga('send', 'pageview');

    </script>

    <script>
    jQuery(function( $ ){
        $('a.nolink').click(function(e){
            e.preventDefault();
            var link = e.target;
            link.blur();
        });

        if (window.location.hash != null && window.location.hash != '') {
            $('body').animate({
                scrollTop: $(window.location.hash).offset().top-370
            }, 400);
        };

        $("#nav-lifestyle").click(function()
        {
            $('html, body').animate({
                scrollTop: $("#lifestyle-ban").offset().top-100
            }, 400);
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        var values='ENTER YOUR EMAIL HERE';
        $('input#footer').val(values);
        $('input#footer').css("color","#9A9A9A");
        $('input#footer').focus(function(){
        if($(this).val()==values){
            $(this).val('');
            $(this).css("color","#141310");
            }
            $(this).blur(function(){
                if($(this).val()==''){
                    $(this).val(values);
                    $(this).css("color","#9A9A9A");
                }
            });
        });

        $("#footer_btn").click(function() {
            var proceed = true;
            var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            $(".subscribe input[type=email]").css('border-color','');
            if($(".subscribe input[type=email]").attr("type")=="email" && !email_reg.test($.trim($(".subscribe input[type=email]").val()))){
                $("#result").html('Please enter the valid Email');

                proceed = false; //set do not proceed flag
             }

            if(proceed) //everything looks good! proceed...
            {
                //get input field values data to be sent to server
                post_data = {
                    'subscribe'     : $('input[name=subscribe]').val()

                };

                //Ajax post data to server
                $.post('parses.php', post_data, function(response){
                    if(response.type == 'error'){ //load json data from server and output message
                        output = '<span>'+response.text+'</span>';
                    }else{
                        output = '<span>'+response.text+'</span>';
                        $(".subscribe input[type=email]").val('');

                    }

                    $("#result").html(output);
                }, 'json');
            }
          });
           $(".subscribe  input[type=email]").keyup(function() {
            $("#result").html('');
        });
    });
    /*
      * modify hyperlink attribute
      * http://jsfiddle.net/damri/r0rgpwxk/
    */
    var cURI = window.location.href;
    var arr = [], l = document.links;
    for(var i=0; i<l.length; i++) {
        $(l[i]).attr("rel","nofollow");
        var x = l[i].href;
        if (x.split("/")[2] === 'www.wrp-diet.com' || x.split("/")[2] === 'wrp-diet.com' || x.split("/")[2] === 'undefined' )
        {}else {
          $(l[i]).attr("target","_blank");
        }
    }
    </script>

 <script>
        $(document).ready(function ($) {

            $(window).bind("load", function(){
            var $winwidth = $(window).width();
            if (navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile|Mobile)/)) {
                $(".mbanner img").css({'width':$winwidth+30+'px'})
            }
        var $seper = $winwidth/$(".mbanner img").width();
        $imgheight = $seper * $(".mbanner img").height();
        $topread=3/4 * $imgheight;

        $(".judul img").css({
            'height': $imgheight+'px'
        });
        $padding=$topread+$(".readmore img").height();

        $(".readmore").css({'padding-top':$padding+'px'});
        $(".readmore img").css({
            'top': $topread+'px'
        });
        });

        $(window).bind("resize", function(){
        var $winwidth = $(window).width();
        if (navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile|Mobile)/)) {
                $(".mbanner img").css({'width':$winwidth+30+'px'})
            }
        var $seper = $winwidth/$(".mbanner img").width();
        $imgheight = $seper * $(".mbanner img").height();
        $topread=3/4 * $imgheight;
        $(".judul img").css({
            'height': $imgheight+'px'
        });
        $padding=$topread+$(".readmore img").height();
        $(".readmore").css({'padding-top':$padding+'px'});
        $(".readmore img").css({
            'top': $topread+'px'
        });
        });

        $(".isi-tabs div").hide();
        $("#tabs-1").live("click",function (){
            $(".tab-eat a").removeClass('active');
                $(this).addClass('active');
                $(".isi-tabs div").slideUp(300);
                    $("#tabs1").delay(300).slideDown(300);
                    $('html, body').animate({
                        scrollTop: $(".isi-tabs").offset().top-63
                    }, 400);

            });
            $("#tabs-2").live("click",function (){
                $(".tab-eat a").removeClass('active');
                $(this).addClass('active');
                $(".isi-tabs div").slideUp(300);
                    $("#tabs2").delay(300).slideDown(300);
                    $('html, body').animate({
                        scrollTop: $(".isi-tabs").offset().top-63
                    }, 400);

            });
            $("#tabs-3").live("click",function (){
                $(".tab-eat a").removeClass('active');
                $(this).addClass('active');
                $(".isi-tabs div").slideUp(300);
                    $("#tabs3").delay(300).slideDown(300);
                    $('html, body').animate({
                        scrollTop: $(".isi-tabs").offset().top-63
                    }, 400);

            });
            $("#tabs-4").live("click",function (){
                $(".isi-tabs div").slideUp(300);
                $(".tab-eat a").removeClass('active');
                $(this).addClass('active');
                    $("#tabs4").delay(300).slideDown(300);
                    $('html, body').animate({
                        scrollTop: $(".isi-tabs").offset().top-63
                    }, 400);

            });
            $("#tabs-5").live("click",function (){
                $(".tab-eat a").removeClass('active');
                $(this).addClass('active');
                $(".isi-tabs div").slideUp(300);
                    $("#tabs5").delay(300).slideDown(300);
                    $('html, body').animate({
                        scrollTop: $(".isi-tabs").offset().top-63
                    }, 400);

            });
            $("#tabs-6").live("click",function (){
                $(".tab-eat a").removeClass('active');
                $(this).addClass('active');
                $(".isi-tabs div").slideUp(300);
                    $("#tabs6").delay(300).slideDown(300);
                    $('html, body').animate({
                        scrollTop: $(".isi-tabs").offset().top-63
                    }, 400);

            });

});
    </script>


<!-- sociomantic.com -->

<script type="text/javascript">
    var product = {
        category : [ 'WRP Diet' ]
    };
</script>


<script type="text/javascript">
    (function(){
        var s   = document.createElement('script');
        var x   = document.getElementsByTagName('script')[0];
        s.type  = 'text/javascript';
        s.async = true;
        s.src   = ('https:'==document.location.protocol?'https://':'http://')
                + 'ap-sonar.sociomantic.com/js/2010-07-01/adpan/nutrimart-id';
        x.parentNode.insertBefore( s, x );
    })();
</script>

<script>
$(window).load(function() {
            var padding=24;
            var border=1;
            var heightsubjudul=$('.style1 .kolomsubjudul').height();
            var heightkolom2=$('.style1 #kolom2').height();

            var heightkolom3=$('#kolom3').height();
            var heightkolom4=$('#kolom4').height();
            if(heightsubjudul > heightkolom2+padding+border){
                $('.style1 #kolom2').css( "height", heightsubjudul-padding-border );
            }else if(heightsubjudul < heightkolom2+padding+border){
                var h2kolom=$('.style1 h2').height();
                var height=heightkolom2-h2kolom-padding-border;
                $('.style1 .subjudul').css( "height", height );

            }
            if(heightkolom3 > heightkolom4){
                $('#kolom4').css( "height", heightkolom3 );
            }else{
                $('#kolom3').css( "height", heightkolom4 );
            }

        var heightisikolomtabel=$('.isikolom-tabel').height();
        var heightkolomtabel=$('.kolom-tabel').height();
        var sumscrol=200;
        if(heightisikolomtabel>heightkolomtabel){
            var bagi=Math.ceil(heightisikolomtabel/sumscrol);
            var hasilheight=bagi*sumscrol;
            $('.isikolom-tabel').css( "height", hasilheight );
            var scrolled=0;
            $(".down").on("click" ,function(){
                $('.up').css('display','block');
                scrolled=scrolled+sumscrol;
                if(scrolled==hasilheight-sumscrol){
                    $(this).css('display','none');
                }
                $(".kolom-tabel").animate({
                    scrollTop:  scrolled
                });

            });
            $(".up").on("click" ,function(){
                $('.down').css('display','block');
                scrolled=scrolled-sumscrol;
                if(scrolled==0){
                    $(this).css('display','none');
                }
                $(".kolom-tabel").animate({
                    scrollTop:  scrolled
                });

            });
        }else{
            $('.isikolom-tabel').css( "height", heightkolomtabel-40 );
            $('.up').css('display','none');
            $('.down').css('display','none');
        }

        var heightisikolomtabel2=$('.isikolom-tabel2').height();
        var heightkolomtabel2=$('.kolom-tabel2').height();

        if(heightisikolomtabel2>heightkolomtabel2){
            var bagi2=Math.ceil(heightisikolomtabel2/sumscrol);
            var hasilheight2=bagi2*sumscrol;
            $('.isikolom-tabel2').css( "height", hasilheight2 );
            var scrolled2=0;
            $(".down2").on("click" ,function(){
                $('.up2').css('display','block');
                scrolled2=scrolled2+sumscrol;
                if(scrolled2==hasilheight2-sumscrol){
                    $(this).css('display','none');
                }
                $(".kolom-tabel2").animate({
                    scrollTop:  scrolled2
                });

            });
            $(".up2").on("click" ,function(){
                $('.down2').css('display','block');
                scrolled2=scrolled2-sumscrol;
                if(scrolled2==0){
                    $(this).css('display','none');
                }
                $(".kolom-tabel2").animate({
                    scrollTop:  scrolled2
                });

            });
        }else{
            $('.isikolom-tabel2').css( "height", heightkolomtabel2-40 );
            $('.up2').css('display','none');
            $('.down2').css('display','none');
        }

        var heightisikolomtabel3=$('.isikolom-tabel3').height();
        var heightkolomtabel3=$('.kolom-tabel3').height();

        if(heightisikolomtabel3>heightkolomtabel3){
            var bagi3=Math.ceil(heightisikolomtabel3/sumscrol);
            var hasilheight3=bagi3*sumscrol;
            $('.isikolom-tabel3').css( "height", hasilheight3 );
            var scrolled3=0;
            $(".down3").on("click" ,function(){
                $('.up3').css('display','block');
                scrolled3=scrolled3+sumscrol;
                if(scrolled3==hasilheight3-sumscrol){
                    $(this).css('display','none');
                }
                $(".kolom-tabel3").animate({
                    scrollTop:  scrolled3
                });

            });
            $(".up3").on("click" ,function(){
                $('.down3').css('display','block');
                scrolled3=scrolled3-sumscrol;
                if(scrolled3==0){
                    $(this).css('display','none');
                }
                $(".kolom-tabel3").animate({
                    scrollTop:  scrolled3
                });

            });
        }else{
            $('.isikolom-tabel3').css( "height", heightkolomtabel3-40 );
            $('.up3').css('display','none');
            $('.down3').css('display','none');
        }

        var heightisipanel=$('.isipanel').height();
        var heightpanel=$('.panel').height();
        var sumscrolp=300;
        $('.upp').css('display','none');
        if(heightisipanel>heightpanel){
            var bagip=Math.ceil(heightisipanel/sumscrolp);
            var hasilheightp=bagip*sumscrolp;
            $('.isipanel').css( "height", hasilheightp );
            var scrolledp=0;
            $(".downn").on("click" ,function(){
                $('.upp').css('display','block');
                scrolledp=scrolledp+sumscrolp;
                if(scrolledp==hasilheightp-sumscrolp){
                    $(this).css('display','none');
                }
                $(".panel").animate({
                    scrollTop:  scrolledp
                });

            });
            $(".upp").on("click" ,function(){
                $('.downn').css('display','block');
                scrolledp=scrolledp-sumscrolp;
                if(scrolledp==0){
                    $(this).css('display','none');
                }
                $(".panel").animate({
                    scrollTop:  scrolledp
                });

            });
        }else{
            $('.isipanel').css( "height", heightpanel-40 );
            $('.upp').css('display','none');
            $('.downn').css('display','none');
        }
});

$('.counter-kolom li').click(function() {
    $('.counter-kolom li').removeClass('selected');
    $(this).addClass('selected');
    var id=$(this).attr('id');

    post_data = {
      'berat'   : $('#berat').val(),
      'keg'     : id

    };
    $.post('parsed.php', post_data, function(response){
                if(response.type == 'error'){ //load json data from server and output message
                    output = '<span>'+response.text+'</span>';

                }else{
                    output = '<span>'+response.text+'</span>';

                }

                $("#kalori").html(output);
            }, 'json');
});

$(document).on("click", ".fb_share" ,function(e){
    e.preventDefault();
    var fbpopup = window.open("https://www.facebook.com/sharer/sharer.php?u=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>", "pop", "width=600, height=400, scrollbars=no","_blank");
    return false;
});
$(document).change(function(){
  $(".stSidebarModal").hide();
})

</script>
<style>
  .fb_share{
    width:32px;
    height:32px;
    background: url("http://w.sharethis.com/images/facebook_32.png")no-repeat top left;
    display: inline-block;
    margin-top:-15 !important;
    cursor:pointer;
  }
</style>

</body>
</html>
