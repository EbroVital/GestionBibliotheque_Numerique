<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OUPS !!! </title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- FontAwesome JS-->
    <script defer src=" {{ asset('assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/portal.css') }}">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


    <main id="main" class="main">

        <section class="section dashboard py-5">

            <div class="container py-5 text-center">
                <h1 class="display-4 text-danger">403 - Accès refusé</h1>
                <p>Tu n'as pas la permission d'accéder à cette page.</p>
                <a href="{{ url('/') }}" class="btn btn-primary">Retour à l'accueil</a>
            </div>

        </section>

    </main>


</body>

</html>



