<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>

<body>
    <style>
        button {
            cursor: pointer;
            background: transparent;
            border: none;
            outline: none;
            font-size: inherit;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font: 16px/1.5 sans-serif;
        }

        .btn-group {
            text-align: center;
        }

        .open-modal {
            font-weight: bold;
            background: var(--blue);
            color: var(--white);
            padding: 0.75rem 1.75rem;
            margin-bottom: 1rem;
            border-radius: 5px;
        }


        /* MODAL
–––––––––––––––––––––––––––––––––––––––––––––––––– */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            background: var(--black);
            cursor: pointer;
            visibility: hidden;
            opacity: 0;
            transition: all 0.35s ease-in;
        }

        .modal.is-visible {
            visibility: visible;
            opacity: 1;
        }

        .modal-dialog {
            position: relative;
            max-width: 800px;
            max-height: 80vh;
            border-radius: 5px;
            background: var(--white);
            overflow: auto;
            cursor: default;
        }

        .modal-dialog>* {
            padding: 1rem;
        }

        .modal-header,
        .modal-footer {
            background: var(--lightgray);
        }

        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal-header .close-modal {
            font-size: 1.5rem;
        }

        .modal p+p {
            margin-top: 1rem;
        }


        /* FOOTER
–––––––––––––––––––––––––––––––––––––––––––––––––– */
        .page-footer {
            position: absolute;
            bottom: 1rem;
            right: 1rem;
        }

        .page-footer span {
            color: #e31b23;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="btn-group">
                <button type="button" class="open-modal" data-open="modal2">
                    Launch second modal
                </button>
            </div>
        </div>

        <!-- modal  -->

        <div class="modal" id="modal2">
            <div class="card">
                <div class="modal-dialog">
                    <header class="modal-header">
                        Order Status
                        <button class="close-modal" aria-label="close modal" data-close>
                            ✕
                        </button>
                    </header>
                    <section class="modal-content">
                        <p><strong>Press ✕, ESC, or click outside of the modal to close it</strong></p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo repellendus reprehenderit accusamus totam ratione! Nesciunt, nemo dolorum recusandae ad ex nam similique dolorem ab perspiciatis qui. Facere, dignissimos. Nemo, ea.</p>
                        <p>Nullam vitae enim vel diam elementum tincidunt a eget metus. Curabitur finibus vestibulum rutrum. Vestibulum semper tellus vitae tortor condimentum porta. Sed id ex arcu. Vestibulum eleifend tortor non purus porta dapibus</p>
                    </section>
                    <footer class="modal-footer">
                        The footer of the second modal
                    </footer>
                </div>
            </div>

        </div>

    </div>
    <script>
        const openEls = document.querySelectorAll("[data-open]");
        const closeEls = document.querySelectorAll("[data-close]");
        const isVisible = "is-visible";

        for (const el of openEls) {
            el.addEventListener("click", function() {
                const modalId = this.dataset.open;
                document.getElementById(modalId).classList.add(isVisible);
            });
        }

        for (const el of closeEls) {
            el.addEventListener("click", function() {
                this.parentElement.parentElement.parentElement.classList.remove(isVisible);
            });
        }

        document.addEventListener("click", e => {
            if (e.target == document.querySelector(".modal.is-visible")) {
                document.querySelector(".modal.is-visible").classList.remove(isVisible);
            }
        });

        document.addEventListener("keyup", e => {
            // if we press the ESC
            if (e.key == "Escape" && document.querySelector(".modal.is-visible")) {
                document.querySelector(".modal.is-visible").classList.remove(isVisible);
            }
        });
    </script>


</body>

</html>

<!DOCTYPE html>
<html lang="en">

<!-- This is the Head Section -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://smtpjs.com/v3/smtp.js"></script>

    <!-- This is the CSS Part of the Modal -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .modal_container1,
        .modal_container2 {
            background: rgba(0, 0, 0, 0.65);
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            opacity: 0;
            pointer-events: none;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            transition: all 100ms ease-in-out;
        }

        .modal_container1.show,
        .modal_container2.show {
            opacity: 1;
            pointer-events: auto;
            transition: all 100ms ease-in-out;
        }

        .modal {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            padding: 0 30px 30px;
            width: 20%;
            max-width: 100%;
            text-align: center;
            color: #333;
            height: max-content;
        }

        .modal img {
            width: 100px;
            margin-top: -50px;
            border-radius: 50%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .modal h2 {
            margin: 0;
            padding: 0;
            font-size: 22px;
            font-weight: 600;
            margin: 10px 0;
        }

        /* .modal .buttons{
                display: flex;
                justify-content: space-between;
            } */

        .modal .buttons .btns {
            width: 100%;
            padding: 10px 0;
            /* background: #6fd649; */
            color: #fff;
            border: 2px solid #fff;
            outline: none;
            font-size: 12px;
            border-radius: 4px;
            cursor: pointer;
        }

        .modal .buttons #close1 {
            background-color: #6fd649;
            ;
        }

        .modal .buttons #close1:hover {
            background-color: #fff;
            border: 2px solid #6fd649;
            color: #333;
        }

        .modal .buttons #close2 {
            background-color: #343a40;
        }

        .modal .buttons #close2:hover {
            background-color: #fff;
            border: 2px solid #343a40;
            color: #333;
        }


        .modal p {
            font-size: 14px;
            justify-content: justify;
        }
    </style>

</head>

<!-- This is the Body Section -->

<body>

    <table>
        <tr>
            <th>Name</th>
            <th>Age</th>
        </tr>

        <tr id="row-1">
            <td>Siddhesh</td>
            <td>21</td>
            <button id="open1">View-1</button>
        </tr>

        <tr>
            <td>Amir</td>
            <td>21</td>
            <button id="open2">View-2</button>
        </tr>

    </table>

    <!-- Modal Container -->
    <div class="modal_container1" id="modal_container1">
        <div class="modal-1">
            <img src="images/404-tick.png">
            <h2>Payment received !</h2>
            <p>To complete the nomination, fill the questionnaire and send the samples</p>
            <div class="buttons">
                <!-- <button id="close1" class="btn btns">Close</button> -->
                <button id="close1" class="btn btns" type="button"><a href='#'>Go to Questionnaire</a></button>
            </div>
        </div>
    </div>

    <div class="modal_container2" id="modal_container2">
        <div class="modal">
            <img src="images/404-tick.png">
            <h2>Questionnaire saved !</h2>
            <p>To complete the nominations, send the samples</p>
            <div class="buttons">
                <button id="close2" class="btn btns">Dismiss</button>
                <!-- <button id="" class="btn btns" type="button"><a href = '#'>Go to Nominations</a></button> -->
            </div>
        </div>
    </div>

</body>

<!-- This is the JS part of the modal -->
<script>
    const open1 = document.getElementById('open1');
    console.log(open1)

    // const close1 = document.getElementById('close1');
    const modal_container1 = document.getElementById('modal_container1');
    const modal1 = document.getElementById('modal-1');

    open1.addEventListener("click", () => {
        modal_container1.classList.add("show");
        const x = open1.parentElement;
        console.log(x);
    })

    const open2 = document.getElementById('open2');
    const close2 = document.getElementById('close2');
    const modal_container2 = document.getElementById('modal_container2');

    open2.addEventListener("click", () => {
        modal_container2.classList.add("show");
    })

    close2.addEventListener("click", () => {
        modal_container2.classList.remove("show");
    })
</script>

</html>