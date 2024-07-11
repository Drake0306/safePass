<link href="{{url('style.css')}}" rel="stylesheet">
<link href="{{url('main.css')}}" rel="stylesheet">
<link href="{{url('bot5.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<script type="text/javascript" src="{{url('assets/scripts/main.js')}}"></script>
<!-- <script type="text/javascript" src="{{url('script.js')}}"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<!-- <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"> -->
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">
a {
    color: #0d6efd;
    text-decoration: none;
}
.preloader {
    background-color: rgb(255, 255, 255,0.9);
    width:100%;
    height:100%;
    position: fixed;
    z-index:9999;
    align-items: center;
}
.spinner-border {
    width: 4rem;
    height: 4rem;
}
.form-floating>.form-control {
    margin-top: 10px;
    padding: 1rem .75rem;
}
.card-body {
    background-color: #ebebeb;
}
.app-header .app-header__content {
    background-color: #dd7900;
}
.app-theme-white.fixed-header .app-header__logo {
    background-color: #dd7900;
}
.app-sidebar__heading {
    color: #f79646;
}
#text_change {
    color: white;
}
.fa-user-circle {
    color:white;
}
.fa-angle-down {
    color:white;
}
.scrollbar-sidebar {
    overflow: scroll;
    background-color: #ebebeb;

}
.metismenu-icon {
    color: black;
    font-weight: bold;
}
.card-header-tab.card-header-tab-animation.card-header {
    background-color: #F79646;
}
.card-header-title {
    color: white;
}
.btn-primary {
    color: #fff;
    background-color: #ff7300;
    border-color: #ff7300;;
}
#Sub-button {
    color: #fff;
    background-color: #ff7300 !important;
    border-color: #ff7300;;
}
.card-header>.nav .nav-link::before {
    background: #ffffff;
}
.card-header>.nav .nav-link.active {
    color: #ffffff;
}
.card-header>.nav .nav-link:hover {
    color: #000000;
}
span a {
    color: #000000;
}
</style>

{{-- TODO NEEDS TO BE MODEFIED --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>



<script>
    $(document).ready(function() {
        setTimeout(function(){ 
            $('#preloader').hide();
            document.getElementById('preloader').style.color = '#fefefe';
            document.getElementById('preloader').style.zIndex = '0';
        }, 500);
    });
</script>