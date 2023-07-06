<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Daftar</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    {{-- jquery offline --}}
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title fs-4 pb-0 text-center">Daftar</h5>
                                    </div>

                                    <form class="row g-3 needs-validation" method="post" action="/post_registration"
                                        novalidate>
                                        @csrf
                                        <div class="col-12">
                                            <label class="form-label">Nama Depan</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="nama_depan" class="form-control" required>
                                                <div class="invalid-feedback">Kolom harus diisi!.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Nama Belakang</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="nama_belakang" class="form-control"
                                                    required>
                                                {{-- <div class="invalid-feedback">Kolom harus diisi!.</div> --}}
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Email</label>
                                            <div class="input-group has-validation">
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="contoh@mail.com" required>
                                                <div class="invalid-feedback">Kolom harus diisi!.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="minimal 8 karakter" required>
                                            <div id="passDelapan" class="d-none text-danger">Password minimal 8
                                                karakter!</div>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Konfimasi Password</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                required>
                                            <div id="passwordConf" class="d-none text-danger">Password tidak sama!</div>
                                        </div>
                                        <div class="col-12">
                                            <button id="btnSubmit" class="btn btn-primary disabled w-100"
                                                type="submit">Daftar</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Kembali ke : <a href="/">Halaman Login</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>


    <script>
        $(document).ready(function() {
            const namaDepan = $("input[name=nama_depan]")
            const namaBelakang = $("input[name=nama_belakang]")
            const email = $("input[name=email]")
            const password = $("input[name=password]")
            const passwordConfirmation = $("input[name=password_confirmation]")
            const btnSubmit = $("#btnSubmit")


            function validateEmail(email) {
                const re =
                    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }

            function allIsValid() {
                const validNamaDepan = namaDepan.val().length > 0
                const validEmail = validateEmail(email.val());
                const validPassword = password.val().length > 7
                const validPasswordConfirmation = passwordConfirmation.val() == password.val();

                const isAllValid = validNamaDepan && validEmail && validPassword && validPasswordConfirmation;

                return isAllValid;
            }

            function checkPassConf() {
                const isValid = passwordConfirmation.val() == password.val();

                if (isValid) {
                    $("#passwordConf").addClass('d-none')
                    return
                }
                $("#passwordConf").removeClass('d-none')
            }

            function checkPassLen() {
                const isValid = password.val().length > 7
                if (isValid) {
                    $("#passDelapan").addClass('d-none')
                    return
                }
                $("#passDelapan").removeClass('d-none')
            }

            function updateSubmitBtn() {
                checkPassConf()
                checkPassLen()

                if (allIsValid()) {
                    $(btnSubmit).removeClass('disabled');
                    return
                }

                $(btnSubmit).addClass('disabled');
            }

            $("input").keyup(updateSubmitBtn)
            $("input").change(updateSubmitBtn)

        })
    </script>

</body>

</html>
