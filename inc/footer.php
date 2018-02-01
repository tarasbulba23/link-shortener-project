<nav class="navbar navbar-default navbar-fixed-bottom" role="footer">
    <div class="container-fluid">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="list-inline list-unstyled list-footer">
                <li>
                    <a href="#" class="btn btn-primary btn-sm">Privacy policy</a>
                </li>
                <li>
                    <a href="#" class="btn btn-primary btn-sm">Terms of use</a>
                </li>
                <li>
                    <a href="#" class="btn btn-primary btn-sm">Support</a>
                </li>
                <li>
                    <a href="#" class="btn btn-primary btn-sm">Contact</a>
                </li>
                <li>
                    <a href="#" class="btn btn-primary btn-sm">Copyright</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<?php if (isset($_SESSION['user_id'])) : ?>
<script src="/assets/js/main_dashboard.js"></script>
<?php else : ?>
<script src="/assets/js/main.js"></script>
<?php endif; ?>
</body>

</html>