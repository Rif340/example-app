<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>pengaduan Masyarakat</title>
  <style>
/*widget css*/
.color1{
    background: #00C292;
}
.color2{
    background: #03A9F3;
}
.color3{
    background: #FB7146;
}
.color4{
    background: #F5E058;
}
.card-body{
    display: inline-block;
    font-family: "Roboto", sans-serif;
    margin: 10px;
    padding: 20px;
    width: 300px;
    height: 135px;
    color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
}
.float-left{
    float: left;
}
.float-right{
    float: right;
}
.card-body h3{
    margin-top: 15px;
    margin-bottom: 5px;
}
.currency, .count{
    font-size: 30px;
    font-weight: 500;
}
.card-body p{
    font-size: 16px;
    margin-top: 0;
}
.card-body i{
    font-size: 95px;
    opacity: 0.5;
}
  </style>
</head>
<body>
  @include('layouts.sidebar-petugas')
  <!--Container Main start-->
    <div class="height-100" style="margin-top: 100px;">
     <!--Widget Start-->
     <div class="card-body color1">
            <div class="float-left">
                <h3>
                    <span class="count">{{$pengaduan}}</span>
                    <i class='bx bx-message-square-detail nav_icon' style="font-size: 30px;margin-left:12rem;"></i> 
                </h3>
                <p style="margin-top: 2rem;">jumlah Pengaduan</p>
            </div>
            <div class="float-right">
                <i class="pe-7s-users"></i>
            </div>
        </div>
        <!--Widget End-->
        <!--Widget Start-->
     <div class="card-body color2">
            <div class="float-left">
                <h3>
                    <span class="count">{{$masyarakat}}</span>
                    <i class="fa-solid fa-users" style="font-size: 30px;margin-left:12rem;"></i>
                </h3>
                <p style="margin-top: 2rem;">jumlah Masyarakat</p>
            </div>
            <div class="float-right">
                <i class="pe-7s-users"></i>
            </div>
        </div>
        <!--Widget End-->
        <!--Widget Start-->
     <div class="card-body color3">
            <div class="float-left">
                <h3>
                    <span class="count">{{$petugas}}</span>
                    <i class="fa-solid fa-user"  style="font-size: 30px;margin-left:12rem;"></i>
                </h3>
                <p style="margin-top: 2rem;">Jumlah Petugas</p>
            </div>
            <div class="float-right">
                <i class="pe-7s-users"></i>
            </div>
        </div>
        <!--Widget End-->
          <!--Widget Start-->
     <div class="card-body color4">
            <div class="float-left">
                <h3>
                    <span class="count">{{$tanggapan}}</span>
                    <i class="fa fa-weixin" aria-hidden="true" style="font-size: 30px;margin-left:12rem;"></i>  
                </h3>
                <p style="margin-top: 2rem;">Jumlah Tanggapan</p>
            </div>
            <div class="float-right">
                <i class="pe-7s-users"></i>
            </div>
        </div>
        <!--Widget End-->
    </div>
    <!--Container Main end-->
    <script type="text/javascript">
        $('.count').each(function(){
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            }, {
                duration:4000,
                easing:'swing',
                step: function(now){
                    $(this).text(Math.ceil(now));
                }
            });
        });
        </script>
</body>
</html>