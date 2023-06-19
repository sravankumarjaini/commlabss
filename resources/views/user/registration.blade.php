<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>User Registration</h2>
        <form method="POST" action="{{ route('registration.register') }}" onsubmit="return validateForm()">
            @csrf
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" >
                <small id="usernameError" class="text-danger"></small> <!-- Error message container -->
            </div>
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" >
                <small id="firstNameError" class="text-danger"></small> <!-- Error message container -->
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" >
                <small id="lastNameError" class="text-danger"></small> <!-- Error message container -->
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" class="form-control" id="email" name="email" >
                <small id="emailError" class="text-danger"></small> <!-- Error message container -->
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <small id="genderError" class="text-danger"></small> <!-- Error message container -->
            </div>
            <div class="form-group">
                <label for="favourite_colours">Favorite Colors:</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="favourite_colours[]" id="yellow" value="Yellow">
                    <label class="form-check-label" for="yellow">Yellow</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="favourite_colours[]" id="orange" value="Orange">
                    <label class="form-check-label" for="orange">Orange</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="favourite_colours[]" id="brown" value="Brown">
                    <label class="form-check-label" for="brown">Brown</label>
                </div>
                <small id="colorsError" class="text-danger"></small> <!-- Error message container -->
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" >
                <small id="passwordError" class="text-danger"></small> <!-- Error message container -->
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" >
                <small id="confirmPasswordError" class="text-danger"></small> <!-- Error message container -->
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <hr>
        <h2>User Login</h2>
        <form method="POST" action="{{ route('login') }}" onsubmit="return validateLoginForm()">
            @csrf
            <div class="form-group">
                <label for="login-username">Username or Email:</label>
                <input type="text" class="form-control" id="login-username" name="username" >
            </div>
            <div class="form-group">
                <label for="login-password">Password:</label>
                <input type="password" class="form-control" id="login-password" name="password" >
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <script>
        function validateForm() {
            var isValid = true;

            // Validate username
            var username = document.getElementById("username").value;
            if (!username) {
                document.getElementById("usernameError").textContent = "Please enter a username.";
                isValid = false;
            } else {
                document.getElementById("usernameError").textContent = "";
            }

            // Validate first name
            var firstName = document.getElementById("first_name").value;
            if (!firstName) {
                document.getElementById("firstNameError").textContent = "Please enter your first name.";
                isValid = false;
            } else {
                document.getElementById("firstNameError").textContent = "";
            }

            // Validate last name
            var lastName = document.getElementById("last_name").value;
            if (!lastName) {
                document.getElementById("lastNameError").textContent = "Please enter your last name.";
                isValid = false;
            } else {
                document.getElementById("lastNameError").textContent = "";
            }

            // Validate email address
            var email = document.getElementById("email").value;
            if (!email) {
                document.getElementById("emailError").textContent = "Please enter an email address.";
                isValid = false;
            } else {
                document.getElementById("emailError").textContent = "";
            }

            // Validate gender selection
            var gender = document.querySelector('input[name="gender"]:checked');
            if (!gender) {
                document.getElementById("genderError").textContent = "Please select a gender.";
                isValid = false;
            } else {
                document.getElementById("genderError").textContent = "";
            }

            // Validate favorite colors selection
            var colors = document.querySelectorAll('input[name="favourite_colours[]"]:checked');
            if (colors.length === 0) {
                document.getElementById("colorsError").textContent = "Please select at least one favorite color.";
                isValid = false;
            } else {
                document.getElementById("colorsError").textContent = "";
            }

            // Validate password
            var password = document.getElementById("password").value;
            if (!password) {
                document.getElementById("passwordError").textContent = "Please enter a password.";
                isValid = false;
            } else {
                document.getElementById("passwordError").textContent = "";
            }

            // Validate confirm password
            var confirmPassword = document.getElementById("confirm_password").value;
            if (!confirmPassword) {
                document.getElementById("confirmPasswordError").textContent = "Please confirm your password.";
                isValid = false;
            } else {
                document.getElementById("confirmPasswordError").textContent = "";
            }

            if (password !== confirmPassword) {
                document.getElementById("confirmPasswordError").textContent = "Passwords do not match.";
                isValid = false;
            } else {
                document.getElementById("confirmPasswordError").textContent = "";
            }

            return isValid;
        }
    </script>
</body>
</html>
