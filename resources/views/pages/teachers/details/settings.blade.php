<div class="nk-block-head nk-block-head-lg">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Security Settings</h4>
            <div class="nk-block-des">
                <p>These settings are helps you keep your account secure.</p>
            </div>
        </div>
        <div class="nk-block-head-content align-self-start d-lg-none">
            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em
                    class="icon ni ni-menu-alt-r"></em></a>
        </div>
    </div>
</div>
<div class="">
    @if(isset($_GET['s']))
    <div class="alert alert-success">
        <b>Success!</b> New password has sent to email address. 
    </div>
    @endif
    <div class="card">
        <div class="card-inner-group">
            <div class="card-inner">
                <div class="between-center flex-wrap g-3">
                    <div class="nk-block-text">
                        <h6>Reset Password</h6>
                        <p>Set a unique password to protect your account.</p>
                    </div>
                    <div class="nk-block-actions flex-shrink-sm-0">
                        <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                            <li class="order-md-last">
                                <a href="#" class="btn btn-danger">Reset Password</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
