<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
<!--                <li><a href="<?= base_url() ?>dashboard/dashboardPremise"><span class="fa fa-home fa-2x"></span></a></li>-->
                <li><a href="<?= base_url() ?>emt/listEMT">Dashboard</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?= base_url() ?>premis/update">Profil</a></li>
                <li><a href="<?= base_url() ?>auth/logout">Log Keluar</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" title="How to fill up this form?">?</button>