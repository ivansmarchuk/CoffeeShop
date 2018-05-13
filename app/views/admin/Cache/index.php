<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Cache Entfernung
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Startseite</a></li>
        <li class="active">Cache Entfernung</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Beschreibung</th>
                                <th>Aktivität</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Kategoriecache</td>
                                <td>Menu wird für 1 Stunde gecachet.</td>
                                <td><a class="delete" href="<?=ADMIN;?>/cache/delete?key=category"><i class="fa fa-fw fa-close text-danger"></i></a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>