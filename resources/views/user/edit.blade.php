<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit User</h2>
        <form method="POST" action="{{ route('user.update', $user->id) }}">
            @csrf
            
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required>
            </div>
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male" {{ $user->gender === 'Male' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="Female" {{ $user->gender === 'Female' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>
            <div class="form-group">
                <label for="favourite_colours">Favorite Colors:</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="favourite_colours[]" id="yellow" value="Yellow" {{ in_array('Yellow', explode(', ', $user->favourite_colours)) ? 'checked' : '' }}>
                    <label class="form-check-label" for="yellow">Yellow</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="favourite_colours[]" id="orange" value="Orange" {{ in_array('Orange', explode(', ', $user->favourite_colours)) ? 'checked' : '' }}>
                    <label class="form-check-label" for="orange">Orange</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="favourite_colours[]" id="green" value="Green" {{ in_array('Green', explode(', ', $user->favourite_colours)) ? 'checked' : '' }}>
                    <label class="form-check-label" for="green">Green</label>
                </div>
            </div>
            <div class="form-group">
                <label for="password">New Password:</label>
                <input type="password" class="form-control" id="password" name="password" minlength="6">
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" minlength="6">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
