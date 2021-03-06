<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Newspaper</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <div class="row">
                <div class="col">

                </div>
            </div>
            <div class="row">
                <a class="navbar-brand" href="#page-top">Newspaper</a>
            </div>
            <hr>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    @foreach ($categories as $category)
                        <li class="nav-item active">
                            <a class="nav-link"
                                onclick="getArticlesByCategory({{ $category->id }})">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <!-- Description-->
            <p class="masthead-subheading font-weight-light mb-0">Sitio informativo sobre lo que pasa en el mundo 24/7
            </p>
        </div>
    </header>
    <!-- Last news Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Ultimas noticias</h2>
            <br>
            <!-- Portfolio Grid Items-->
            <div id="articles" class="row justify-content-center">
                <!-- Portfolio Item 1-->
                @foreach ($articles as $news)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $news->name }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $news->author }}</h6>
                                    <p class="card-text">{{ $news->description }}</p>
                                    <a href="#" class="card-link">{{ $news->category->name }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Every categories -->
    {{-- <div id="articles">

    </div> --}}

    {{-- @foreach ($categories as $category) --}}
    {{-- <section class="page-section portfolio" id="{{ $category->name }}">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{{ $category->name }}
                </h2>
                <br>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center" id="{{ $category->name }}">
                    <!-- Portfolio Item 1-->
                    @foreach ($articles as $news)
                        <div class="col-md-6 col-lg-4 mb-5">
                            <div class="portfolio-item mx-auto" data-bs-toggle="modal"
                                data-bs-target="#portfolioModal1">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $news->name }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $news->author }}</h6>
                                        <p class="card-text">{{ $news->description }}</p>
                                        <a href="#" class="card-link">{{ $news->category->name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section> --}}
    {{-- @endforeach --}}

    <!-- Contact Section-->
    <section class="page-section" id="contact">
        <div class="container">
            <!-- Contact Section Heading-->
            <h3 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contact Me</h3>
            <!-- Contact Section Form-->
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7">
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" type="text" placeholder="Enter your name..."
                                data-sb-validations="required" />
                            <label for="name">Full name</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" placeholder="name@example.com"
                                data-sb-validations="required,email" />
                            <label for="email">Email address</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890"
                                data-sb-validations="required" />
                            <label for="phone">Phone number</label>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.
                            </div>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" type="text"
                                placeholder="Enter your message here..." style="height: 10rem"
                                data-sb-validations="required"></textarea>
                            <label for="message">Message</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.
                            </div>
                        </div>
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                                To activate this form, sign up at
                                <br />
                                <a
                                    href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                        <!-- Submit Button-->
                        <button class="btn btn-primary btn-xl disabled" id="submitButton" type="submit">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Location</h4>
                    <p class="lead mb-0">
                        2215 John Daniel Drive
                        <br />
                        Clark, MO 65243
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Around the Web</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i
                            class="fab fa-fw fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i
                            class="fab fa-fw fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">About Freelancer</h4>
                    <p class="lead mb-0">
                        Freelance is a free to use, MIT licensed Bootstrap theme created by
                        <a href="http://startbootstrap.com">Start Bootstrap</a>
                        .
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy; Your Website 2021</small></div>
    </div>
    <!-- Portfolio Modals-->
    <!-- Portfolio Modal 1-->
    <div id="modales">
        @include('site.components.modal',[
        'titulo' => 'Perro',
        'descripcion' => ''
        ])
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    {{-- @section('scripts') --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const getArticlesByCategory = (category_id) => {
            console.log(category_id);

            axios.get(`/api/articles/${category_id}/category`)
                .then(response => {
                    const articles = response.data;
                    const articleListElement = document.getElementById('articles');
                    const modalsElement = document.getElementById('modales');
                    articleListElement.innerHTML = '';
                    modalsElement.innerHTML = '';

                    articles.forEach(news => {
                        articleListElement.innerHTML += `
                        <div class="col-md-6 col-lg-4 mb-5">
                            <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#article-${news.id}-item">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                         <h5 class="card-title">${news.name}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">${news.author}</h6>
                                        <p class="card-text">${news.description}</p>
                                        <a href="#" class="card-link">${news.category.name}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;

                        modalsElement.innerHTML += `
                        <div class="portfolio-modal modal fade" id="article-${news.id}-item" tabindex="-1" aria-labelledby="#article-${news.id}-item"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal"
                                            aria-label="Close"></button></div>
                                    <div class="modal-body text-center pb-5">
                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-8">
                                                    <!-- Portfolio Modal - Title-->
                                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">${ news.name }</h2>
                                                    <!-- Icon Divider-->
                                                    <div class="divider-custom">
                                                        <div class="divider-custom-line"></div>
                                                        <div class="divider-custom-line"></div>
                                                    </div>
                                                    <!-- Portfolio Modal - Image-->
                                                    
                                                    <!-- Portfolio Modal - Text-->
                                                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis
                                                        inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod
                                                        consequuntur itaque. Nam.</p>
                                                    <button class="btn btn-primary" href="#!" data-bs-dismiss="modal">
                                                        <i class="fas fa-times fa-fw"></i>
                                                        Close Window
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;
                    });
                })
        }
    </script>
</body>

</html>
