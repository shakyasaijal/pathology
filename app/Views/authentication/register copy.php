<?php include('../app/Views/base/header.php')?>
    <p>Register</p>
    <form
        id="register-form"
        method="POST"
        action="/pathology/users/user_register"
        >
    First Name<input type="text" name="first_name" value='<?php if($data['first_name']) echo $data['first_name']; ?>'>
    <span class="invalidFeedback">
        <?php echo $data['first_nameError']; ?>
    </span>

    Last Name<input type="text" name="last_name" value='<?php if($data['last_name']) echo $data['last_name']; ?>'>
    <span class="invalidFeedback">
        <?php echo $data['last_nameError']; ?>
    </span>

    Email <input type="email" placeholder="Email *" name="email" value='<?php if($data['email']) echo $data['email']; ?>'>
    <span class="invalidFeedback">
        <?php echo $data['emailError']; ?>
    </span>

    Password <input type="password" placeholder="Password *" name="password">
    <span class="invalidFeedback">
        <?php echo $data['passwordError']; ?>
    </span>

    Confirm Password <input type="password" placeholder="Confirm Password *" name="confirmPassword">
    <span class="invalidFeedback">
        <?php echo $data['confirmPasswordError']; ?>
    </span>

    <button id="submit" type="submit" value="submit">Submit</button>
</form>