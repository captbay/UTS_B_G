<!doctype html>
<html lang="en">

<head>
    <title>Perpustakaan</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/fee4f29424.js" crossorigin="anonymous"></script>
    <link href="gaya.css" rel="stylesheet">
</head>

<body>
    <main>

        <div class="bg d-flex justify-content-center align-items-center column">
            <div class="container">
                <div>
                    <h1 class="text-center align-middle text-white"
                        style="font-size: 70px;font-style: oblique;text-shadow: -2px -2px 0 #000, 2px -2px 0 #000, -2px 2px 0 #000, 2px 2px 0 #000;">
                        <b>Selamat Datang</b>
                        <br>
                        <b>di</b>
                        <br>
                        <b>Perpustakaan</b>
                    </h1>
                </div>
                <div class=" text-center">
                    <a class="btn btn-light" href="./page/tentangKami.php">Tentang
                        Kami</a>
                </div>
            </div>
            <div class="container">
                <div class="card mx-auto text-white bg-dark ma-5 shadow " style="min-width:400px; max-width: 550px;">
                    <div class="card-header fw-bold text-center">Login</div>
                    <div class="card-body">
                        <form action="./process/loginProcess.php" method="post">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="formlabel">Email</label>
                                <input class="form-control" id="email" name="email" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="formlabel">Password</label>
                                <input type="password" class="form-control" id="myInputPass" name="password">
                                <input type="checkbox" onclick="myFunction()"> Show Password
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary" name="login">Login</button>
                            </div>
                        </form>
                        <p class="mt-2 mb-0">Belum punya akun? <a href="./page/registerPage.php"
                                class="textprimary">Klik
                                disini!</a></p>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <script>
    function myFunction() {
        var x = document.getElementById("myInputPass");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>



</body>

</html>