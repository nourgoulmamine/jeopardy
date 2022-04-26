<!-- WORKING INDEX LINK: https://cs4640.cs.virginia.edu/ng9sc/sprint2/ -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Nour Goulmamine (ng9sc)">
    <meta name="description" content="Online Jeopardy login page">
    <meta name="keywords" content="Jeopardy, trivia, facts, games, learning">

    <title>Online Jeopardy: Log In</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/main.css">
</head>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand">Online Jeopardy</a>
    <form class="form-inline">
        <a class="btn btn-secondary" href="?command=landing">Cancel</a>
    </form>
</nav>

<body>
    <div class="container" style="margin-top: 15px;">
        <div class="col-xs-8 d-flex justify-content-center">
            <p> Welcome to Jeopardy! To get started, register your account. If you have an existing account, log in.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-4">
                <?php
                if (!empty($error_msg)) {
                    echo "<div class='alert alert-danger'>$error_msg</div>";
                }
                ?>
                <form class="white" action="?command=login" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" />
                    </div>
                    <div class="d-flex justify-content-center" style="margin-top:15px">
                        <button type="submit" class="btn btn-primary">Get Started</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // not working bruh
        function validate() {
            var email = document.getElementById("email").value;
            var pass = document.getElementById("password").value;

            if (email.length > 5 && pass.length > 5) {
                return true;
            }
            alert("Please enter a long enough email and password.")
            return false;
        }

        // Password validate function has default length 5, but can
        // be updated by parameter
        function passwordValidate(len = 5) {
            var pass = document.getElementById("password");
            var submit = document.getElementById("submit");
            var pwhelp = document.getElementById("pwhelp");
            var passval = pass.value;

            if (passval.length < len) {
                pass.classList.add("is-invalid");
                submit.disabled = true;
                pwhelp.textContent = "Please enter a longer password.";
            } else {
                pass.classList.remove("is-invalid");
                submit.disabled = false;
                pwhelp.textContent = "";
            }
        }

        // Set the on blur event to call our passwordValidate handler
        document.getElementById("password").onblur  = passwordValidate;

        // Modern way to set event handlers.  Use anonymous function
        // so that we can pass a parameter to our actual handler.
        document.getElementById("password").addEventListener("keyup", function() {
            passwordValidate(7);
        });
    </script>
</body>

</html>