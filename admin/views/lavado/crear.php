<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Bootstrap Multi Step Form</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <header class="header">
        <h1 class="header__title">Multi Steps Form Animations</h1>
    </header>
    <div class="content">
        <div class="content__inner">
            <div class="container">
                <h2 class="content__title content__title--m-sm">
                    Choose Animation Type
                </h2>
                <form class="pick-animation my-4">
                    <div class="form-row">
                        <div class="col-5 m-auto">
                            <select class="pick-animation__select form-control">
                                <option value="scaleIn" selected="selected">ScaleIn</option>
                                <option value="scaleOut">ScaleOut</option>
                                <option value="slideHorz">SlideHorz</option>
                                <option value="slideVert">SlideVert</option>
                                <option value="fadeIn">FadeIn</option>
                            </select>
                        </div>
                    </div>
                </form>

                <h2 class="content__title">
                    Click on steps or 'Prev' and 'Next' buttons
                </h2>
            </div>
            <div class="container overflow-hidden">
                <div class="multisteps-form">
                    <div class="row">
                        <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
                            <div class="multisteps-form__progress">
                                <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">
                                    User Info
                                </button>
                                <button class="multisteps-form__progress-btn" type="button" title="Address">
                                    Address
                                </button>
                                <button class="multisteps-form__progress-btn" type="button" title="Order Info">
                                    Order Info
                                </button>
                                <button class="multisteps-form__progress-btn" type="button" title="Message">
                                    Message
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-8 m-auto">
                            <form class="multisteps-form__form">
                                <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active"
                                    data-animation="scaleIn">
                                    <h3 class="multisteps-form__title">Your User Info</h3>
                                    <div class="multisteps-form__content">
                                        <div class="form-row mt-4">
                                            <div class="col-12 col-sm-6">
                                                <input class="multisteps-form__input form-control" type="text"
                                                    placeholder="First Name" />
                                            </div>
                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" type="text"
                                                    placeholder="Last Name" />
                                            </div>
                                        </div>
                                        <div class="form-row mt-4">
                                            <div class="col-12 col-sm-6">
                                                <input class="multisteps-form__input form-control" type="text"
                                                    placeholder="Login" />
                                            </div>
                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" type="email"
                                                    placeholder="Email" />
                                            </div>
                                        </div>
                                        <div class="form-row mt-4">
                                            <div class="col-12 col-sm-6">
                                                <input class="multisteps-form__input form-control" type="password"
                                                    placeholder="Password" />
                                            </div>
                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" type="password"
                                                    placeholder="Repeat Password" />
                                            </div>
                                        </div>
                                        <div class="button-row d-flex mt-4">
                                            <button class="btn btn-primary ml-auto js-btn-next" type="button"
                                                title="Next">
                                                Next
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="multisteps-form__panel shadow p-4 rounded bg-white"
                                    data-animation="scaleIn">
                                    <h3 class="multisteps-form__title">Your Address</h3>
                                    <div class="multisteps-form__content">
                                        <div class="form-row mt-4">
                                            <div class="col">
                                                <input class="multisteps-form__input form-control" type="text"
                                                    placeholder="Address 1" />
                                            </div>
                                        </div>
                                        <div class="form-row mt-4">
                                            <div class="col">
                                                <input class="multisteps-form__input form-control" type="text"
                                                    placeholder="Address 2" />
                                            </div>
                                        </div>
                                        <div class="form-row mt-4">
                                            <div class="col-12 col-sm-6">
                                                <input class="multisteps-form__input form-control" type="text"
                                                    placeholder="City" />
                                            </div>
                                            <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                                <select class="multisteps-form__select form-control">
                                                    <option selected="selected">State...</option>
                                                    <option>...</option>
                                                </select>
                                            </div>
                                            <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" type="text"
                                                    placeholder="Zip" />
                                            </div>
                                        </div>
                                        <div class="button-row d-flex mt-4">
                                            <button class="btn btn-primary js-btn-prev" type="button" title="Prev">
                                                Prev
                                            </button>
                                            <button class="btn btn-primary ml-auto js-btn-next" type="button"
                                                title="Next">
                                                Next
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="multisteps-form__panel shadow p-4 rounded bg-white"
                                    data-animation="scaleIn">
                                    <h3 class="multisteps-form__title">Your Order Info</h3>
                                    <div class="multisteps-form__content">
                                        <div class="row">
                                            <div class="col-12 col-md-6 mt-4">
                                                <div class="card shadow-sm">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Item Title</h5>
                                                        <p class="card-text">
                                                            Small and nice item description
                                                        </p>
                                                        <a class="btn btn-primary" href="#" title="Item Link">Item
                                                            Link</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 mt-4">
                                                <div class="card shadow-sm">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Item Title</h5>
                                                        <p class="card-text">
                                                            Small and nice item description
                                                        </p>
                                                        <a class="btn btn-primary" href="#" title="Item Link">Item
                                                            Link</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="button-row d-flex mt-4 col-12">
                                                <button class="btn btn-primary js-btn-prev" type="button" title="Prev">
                                                    Prev
                                                </button>
                                                <button class="btn btn-primary ml-auto js-btn-next" type="button"
                                                    title="Next">
                                                    Next
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="multisteps-form__panel shadow p-4 rounded bg-white"
                                    data-animation="scaleIn">
                                    <h3 class="multisteps-form__title">Additional Message</h3>
                                    <div class="multisteps-form__content">
                                        <div class="form-row mt-4">
                                            <textarea class="multisteps-form__textarea form-control"
                                                placeholder="Additional Message and Questions"></textarea>
                                        </div>
                                        <div class="button-row d-flex mt-4">
                                            <button class="btn btn-primary js-btn-prev" type="button" title="Prev">
                                                Prev
                                            </button>
                                            <button class="btn btn-success ml-auto" type="button" title="Send">
                                                Send
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="function.js"></script>
</body>

</html>