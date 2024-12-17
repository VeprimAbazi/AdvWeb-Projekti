<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/SignUp.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="krejt">
    <div class="container">
        <h1>Sign Up</h1>
        <form>
            <div class="form-field">
                <label for="email"></label>
                <input type="email" id="email" placeholder="Email" autocomplete="on" required>
            </div>s
            <div class="form-field">
                <label for="password"></label>
                <input type="password" id="password" placeholder="Password" required>
            </div>
            <div class="form-field">
                <label for="confirmPassword"></label>
                <input type="password" id="confirmPassword" placeholder="Confirm Password"  required>
                <span id="passwordError" class="error"></span>
            </div>
            <div class="form-field">
                <label for="username"></label>
                <input type="text" id="username" placeholder="Username" autocomplete="on" required>
                <span id="usernameError" class="error"></span>
            </div>
            <label for="gender">Gender:</label>
            <div class="radio-group">
                <input type="radio" id="female" name="gender">
                <label for="female">Female</label>
               
                <input type="radio" id="male" name="gender">
                <label for="male">Male</label>
               
                <input type="radio" id="custom" name="gender">
                <label for="custom">Custom</label>
               </div>
            <div class="ditlindja"> 
                <label for="birthday">Birthday:</label>
                <div class="form-item">
                    <label for="birthday_month"></label>
                    <input type="number" id="birthday_month" name="birthday_month" min="1" max="12" placeholder="Month" required>
                    <label for="birthday_day"></label>
                    <input type="number" id="birthday_day" name="birthday_day" min="1" max="31" placeholder="Day" required>
                    <label for="birthday_year"></label>
                    <input type="number" id="birthday_year" name="birthday_year" placeholder="Year" min="1950" max="2024"  required>
                    <span id="birthdayError" class="error"></span>
                </div>
                <div class="butoni">
                    <input type="submit" value="Sign Up" id="submit" onclick="validateForm()">
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function validateForm(){
    let inputUsername = document.getElementById('username').value;
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirmPassword').value;
    let inputYear = document.getElementById('birthday_year').value;
    // Regular expression patterns
    let usernamePattern = /^[a-zA-Z0-9_]{5,}$/; // Username must be alphanumeric and at least 5 characters long
    let passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/; // Password must contain at least one digit, one lowercase, one uppercase, one special character, and be at least 8 characters long
    let yearPattern = /^(19\d{2}|20(?:[0-1]\d|20))$/; // Year must be between 1900 and 2099
    // Validation
    if (!usernamePattern.test(inputUsername)) {
        alert('Username must be alphanumeric and at least 5 characters long.');
        return false; 
    }
    if (!passwordPattern.test(password)) {
        alert('Password must contain at least one digit, one lowercase, one uppercase, one special character, and be at least 8 characters long.');
        return false; 
    }
    if (password !== confirmPassword) {
        alert('Passwords do not match.');
        return false;
    }
    if (!yearPattern.test(inputYear)) {
        alert('Year must be between 1950 and 2024.');
        return false; 
    }
    return true;
}
</script>
</body>
</html>
