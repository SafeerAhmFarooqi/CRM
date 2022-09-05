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
                            <label class="form-label">Email</label>
                            <input type="text" placeholder="yourname@gamil.com">
                        </div>
                    
                        <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                         
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php @include('footer.php');?>