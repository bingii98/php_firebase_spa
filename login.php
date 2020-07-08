<?php
include_once 'model/User.php';
if (!isset($_SESSION)) session_start();
if (isset($_SESSION['_userSignedIn']) && $_SESSION['_userSignedIn']->getIsAdmin() == true) header('Location: admin.php');
if (isset($_SESSION['_userSignedIn'])) header('Location: index.php');
?>
<!doctype html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>VenVen Spa - Đăng nhập</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .fa-google {
            margin-right: 3px;
            font-size: 15px;
            background: conic-gradient(
                    from -45deg,
                    #ea4335 110deg,
                    #4285f4 90deg 180deg,
                    #34a853 180deg 270deg,
                    #fbbc05 270deg
            )
            73% 55%/150% 150% no-repeat;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body style="background-color: #fafafa">
<main>
    <!--================login_part Area =================-->
    <section class="login_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="offset-lg-3 col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner" style="margin-top: 50px;box-shadow: 0 4px 5px rgba(0, 0, 0, 0.1); background-color: white; padding: 80px 50px;">
                            <h3>Chào mừng trở lại ! <br>
                                Đăng nhập</h3>
                            <div class="row contact_form">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="username" name="name" value=""
                                           placeholder="Username">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value=""
                                           placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" class="btn_3" id="btn-submit">
                                        Đăng nhập
                                    </button>
                                </div>
                                <div class="col-md-12 form-group text-center">
                                    <a class="btn-link" href="#" id="btnGoogle">
                                        <i class='fab fa-google'></i> Đăng nhập với <strong>Google</strong>
                                    </a>
                                </div>
                                <div class="col-md-12 form-group text-center">
                                    <a class="btn-link" href="#" id="btnFacebook">
                                        <i class='fab fa-facebook-square'></i> Đăng nhập với <strong>Facebook</strong>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->
</main>

<!-- JS here -->

<script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="./assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="./assets/js/owl.carousel.min.js"></script>
<script src="./assets/js/slick.min.js"></script>

<!-- One Page, Animated-HeadLin -->
<script src="./assets/js/wow.min.js"></script>
<script src="./assets/js/animated.headline.js"></script>

<!-- Scroll up, nice-select, sticky -->
<script src="./assets/js/jquery.scrollUp.min.js"></script>
<script src="./assets/js/jquery.nice-select.min.js"></script>
<script src="./assets/js/jquery.sticky.js"></script>
<script src="./assets/js/jquery.magnific-popup.js"></script>

<!-- contact js -->
<script src="./assets/js/jquery.form.js"></script>
<script src="./assets/js/jquery.validate.min.js"></script>
<script src="./assets/js/mail-script.js"></script>
<script src="./assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.2.0/firebase.js"></script>
<script>
    $("#btn-submit").click(function () {
        $.ajax({
            url: 'a-access-login.php',
            data: {
                'username': $("#username").val(),
                'password': $("#password").val()
            },
            type: 'POST',
            beforeSend: function () {
                $("#loading-svg").show();
                $("#username").prop("disabled", true);
                $("#password").prop("disabled", true);
            },
            success: function (data) {
                $("#loading-svg").hide();
                $("#username").prop("disabled", false);
                $("#password").prop("disabled", false);
                if (data == 'invalid-email-verified') {
                    alert("Vui lòng xác thực email để thực hiện đăng nhập!")
                } else if (data == 'true') {
                    window.location = "index.php";
                } else {
                    alert("Đăng nhập không thành công!");
                }
            }
        });
    })

    $("#btn-forget-password").click(function () {
        $.ajax({
            url: "a-reset-password.php",
            data: {
                'email': $("#username").val()
            },
            type: "POST",
            success: function (data) {
                createAlert("success", "Đường dẫn đổi mật khẩu đã được gửi đến email của bạn!");
            }
        })
    })

    $(document).ready(function () {
        console.log('Start file login with firebase');
        // Initialize Firebase
        var config = {
            apiKey: "AIzaSyDzsaTvPG19h1S9zTonZSSsCuB2rm5_33M",
            authDomain: "spaproject-6c2da.firebaseapp.com",
            databaseURL: "https://spaproject-6c2da.firebaseio.com",
            projectId: "spaproject-6c2da",
            storageBucket: "spaproject-6c2da.appspot.com",
            messagingSenderId: "656208449092",
            appId: "1:656208449092:web:a2240112d20a982a0ff611",
            measurementId: "G-6RE3BVBTRD"
        };
        firebase.initializeApp(config);
        var database = firebase.database();

        //Google singin provider
        var ggProvider = new firebase.auth.GoogleAuthProvider();
        //Facebook singin provider
        var fbProvider = new firebase.auth.FacebookAuthProvider();
        //Login in variables
        const btnGoogle = document.getElementById('btnGoogle');
        const btnFaceBook = document.getElementById('btnFacebook');

        //Sing in with Google
        btnGoogle.addEventListener('click', e => {
            firebase.auth().signInWithPopup(ggProvider).then(function (result) {
                var token = result.credential.accessToken;
                var user = result.user;
                userId = user.uid;

                $.ajax({
                    url: "a-login-google.php",
                    data: {
                        "id": userId
                    },
                    type: "POST",
                    success: function (data) {
                        if (data == 'true')
                            location.reload();
                        else
                            alert("Đăng nhập thất bại");
                    }
                })

            }).catch(function (error) {
                console.error('Error: hande error here>>>', error.code)

                alert("Email này đã tồn tại trong hệ thống với một cách đăng nhập khác!")
            })
        }, false)

        //Sing in with Facebook
        btnFaceBook.addEventListener('click', e => {
            firebase.auth().signInWithPopup(fbProvider).then(function (result) {
                // This gives you a Facebook Access Token. You can use it to access the Facebook API.
                var token = result.credential.accessToken;
                // The signed-in user info.
                var user = result.user;
                // ...
                userId = user.uid;

                $.ajax({
                    url: "a-login-google.php",
                    data: {
                        "id": userId
                    },
                    type: "POST",
                    success: function (data) {
                        if (data == 'true')
                            location.reload();
                        else
                            alert("Đăng nhập thất bại");
                    }
                })

            }).catch(function (error) {
                // Handle Errors here.
                var errorCode = error.code;
                var errorMessage = error.message;
                // The email of the user's account used.
                var email = error.email;
                // The firebase.auth.AuthCredential type that was used.
                var credential = error.credential;
                // ...
                console.error('Error: hande error here>Facebook>>', error.code)

                alert("Email này đã tồn tại trong hệ thống với một cách đăng nhập khác!")
            });
        }, false)
    })
</script>
</body>

</html>