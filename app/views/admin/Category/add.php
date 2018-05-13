<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Kategorie hinzufügen
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= ADMIN ;?>"><i class="fa fa-dashboard"></i>Main</a></li>
        <li><a href="<?=ADMIN;?>/category">Kategorie</a></li>
        <li class="active"><i class="fa fa-dashboard"></i>Neue Kategorie</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <form action="<?=ADMIN;?>/category/add" method="post" data-toggle="validator">
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="title">Kategoriename</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Kategoriename" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group">
                                <label for="keywords">Keywords</label>
                                <input type="text" name="keywords" class="form-control" id="keywords" placeholder="Keywords">
                            </div>
                            <div class="form-group">
                                <label for="description">Beschreibung</label>
                                <input type="text" name="description" class="form-control" id="description" placeholder="Beschreibung">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Hinzufügen</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->