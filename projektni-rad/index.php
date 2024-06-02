<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Turističke destinacije</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .rounded-img {
            border-radius: 5%;
        }
    </style>

</head>

<body>
    <!-- Header Section -->
    <header>
        <div class="collapse" id="navbarToggleExternalContent" data-bs-theme="dark">
            <div class="bg-dark p-4">
                <h5 class="text-body-emphasis h4">O projektu</h5>
                <span class="text-body-secondary">
                    Ovaj seminarski rad je kreiran u svrhu kolegija XML programiranje za godinu 2023./2024., pri izradi
                    su korištene tehnologije XML, HTML5, Bootstrap v5.3 te PHP.<br>
                    Projekt predstavlja blog koji sadrži kratke osvrte na razne turističke destinacije.
                </span>
                <hr class="my-4">
                <h5 class="text-body-emphasis h4">Kontakt</h5>
                <span class="text-body-secondary">
                    Email: ecavar@tvz.hr<br>
                    Github: <a href="https://github.com/e-cavar" target="_blank"
                        class="text-decoration-none text-secondary">github.com/e-cavar</a>
                </span>
            </div>
        </div>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Putopisni kutak</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </header>

    <!-- Main Section -->
    <main style="background-color: #caf0f8;">

        <!-- Hero Section -->
        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="https://images.unsplash.com/photo-1507548335453-2264668e6243?q=80&w=2679&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class="d-block mx-lg-auto img-fluid rounded-img"
                        alt="Woman looking at the sea while carrying a backpack." width="700" height="500"
                        loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-4">Putopisni kutak</h1>
                    <p class="lead">Ovaj blog je vaša inspiracija za putovanja diljem svijeta. Ovdje ćete pronaći
                        savjete, priče i preporuke koje će vam pomoći u planiranju i uživanju u svakom putovanju.</p>
                    <p class="lead mb-4">Istražujemo različite destinacije, dijelimo savjete o putovanjima i inspiriramo
                        Vas da krenete na svoje vlastite pustolovine.</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <button type="button" class="btn btn-lg px-4 me-md-2"
                            style="background-color: #0096c7; color: #fff;">Prijava</button>
                        <button type="button" class="btn btn-lg px-4"
                            style="background-color: #00b4d8; color: #fff;">Registracija</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blog Posts Section -->
        <div class="container">
            <h1 class="mt-4">Preporučene destinacije</h1>
            <div class="row">
                <?php
        // Učitavanje XML datoteke
        $xml = simplexml_load_file('destinations.xml') or die("Ne mogu učitati XML datoteku");

        // Prikazivanje podataka o destinacijama
        foreach ($xml->destination as $destination) {
            echo "<div class='col-md-4 mb-4'>";
            echo "<div class='card shadow-sm' style='height: 100%;'>";
            echo "<img src='" . $destination->image . "' class='card-img-top' alt='" . $destination->name . "' style='object-fit: cover; height: 200px;'>"; // Postavi visinu slike
            echo "<div class='card-body d-flex flex-column'>";
            echo "<h5 class='card-title h6'>" . $destination->name . "</h5>";
            echo "<p class='card-text flex-grow-1'>" . $destination->description . "</p>";
            
            echo "<table class='table table-bordered table-hover'>";
                echo "<tr><td style='background-color: #00b4d8; color: #ffffff;'>Najbolje vrijeme za posjet:</td><td>" . $destination->best_time_to_visit . "</td></tr>";
                echo "<tr><td style='background-color: #00b4d8; color: #ffffff;'>Preporučeni boravak:</td><td>" . $destination->recommended_stay . "</td></tr>";
                echo "<tr><td style='background-color: #00b4d8; color: #ffffff;'>Prosječni trošak:</td><td>" . $destination->average_cost . " " . $destination->currency . "</td></tr>";
            echo "</table>";
            
            echo "<div class='d-flex justify-content-between align-items-center'>";
            echo "<div class='btn-group'>";
            echo "<button type='button' class='btn btn-sm btn-outline-secondary'>Pročitaj</button>";
            echo "<button type='button' class='btn btn-sm btn-outline-secondary'>Komentiraj</button>";
            echo "</div>";
            echo "<small class='text-body-secondary'>" . $destination->read_more . " </small>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        ?>
            </div>
        </div>

        <!-- Pagination Section -->
        <nav aria-label="Page navigation example" style="padding-bottom: 2%;">
            <ul class="pagination justify-content-center mt-3">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </main>


    <!-- Footer Section -->
    <footer class="py-5 bg-dark text-light mt-0">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Vrati se na vrh</a>
            </p>
            <p class="mb-1">Studentica: Ena Ćavar</p>
            <p class="mb-1">JMBAG: 0246098463</p>
            <p class="mb-1">Kolegij: XML programiranje</p>
            <p class="mb-1">Akademska godina 2023./2024.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>