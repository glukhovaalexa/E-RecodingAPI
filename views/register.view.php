<div class="text-center">
    <main class="form-signin">
        <form action="\signup" method="POST">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <label for="name" class="visually-hidden">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Name" required autofocus>
            <label for="lastname" class="visually-hidden">lastname</label>
            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="lastname" required>
            <label for="city" class="visually-hidden">City</label>
            <input type="text" name="city" id="city" class="form-control" placeholder="City" required>
            <label for="Phone" class="visually-hidden">Phone</label>
            <input type="phone" name="phone" id="phone" class="form-control" placeholder="Phone" required>
            <label for="email" class="visually-hidden">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
            <label for="password" class="visually-hidden">Password</label>
            <input type="password" name="pass" id="password" class="form-control" placeholder="Password" required>
            <label for="password_rep" class="visually-hidden">Password repeat</label>
            <input type="password" name="pass_rep" id="password_rep" class="form-control" placeholder="Password repeat" required>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
        </form>
    </main>
</div>