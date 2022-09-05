<?php @include('header.php');?>

 <div class="cm-page-header overlay-dark bg-cover" style="background-image: url(assets/images/bg-page-cover.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="block text-white text-center">
                        <h2 class="h1">Sign In</h2>
                        <div class="breadcrumb justify-content-center bg-transparent text-uppercase p-0 mb-0 mt-3">
                            <a class="text-primary" href="#!">Home</a><span class="text-primary mx-2">&gt;</span>
                            <span>sign-up</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="login-area section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form class="login-form default-form-wrap">
                        <div class="single-input-wrap mb-4">
                            <label class="form-label">First Name</label>
                            <input type="text" placeholder="Name">
                        </div>
                        <div class="single-input-wrap mb-4">
                            <label class="form-label">Last Name</label>
                            <input type="text" placeholder="Name">
                        </div>
                        <div class="single-input-wrap mb-4">
                            <label class="form-label">Email</label>
                            <input type="text" placeholder="yourname@gamil.com">
                        </div>
                        <div class="single-input-wrap mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" placeholder="Password">
                        </div>
                        <div class="single-input-wrap mb-4">
                            <label class="form-label">Shop URL</label>
                            <input type="text" placeholder="Password">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                </div>  
                            </div>
                            <div class="col-sm-6 text-sm-right align-self-center">
                                <a class="reset-pass" href="#">Forgot your password?</a>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                        <p>Allready have an account?<a href="login.php">Login Now</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php @include('footer.php');?>