<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Kategorieänderung <?=$category->title;?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= ADMIN ;?>"><i class="fa fa-dashboard"></i>Main</a></li>
        <li><a href="<?=ADMIN;?>/category">Kategorie</a></li>
        <li class="active"><?=$category->title;?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN;?>/category/edit" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="title">Kategoriename</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Kategoriename" value="<?=h($category->title);?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="keywords">Keywords</label>
                            <input type="text" name="keywords" class="form-control" id="keywords" placeholder="Keywords" value="<?=h($category->keywords);?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Beschreibung</label>
                            <input type="text" name="description" class="form-control" id="description" placeholder="Beschreibung" value="<?=h($category->description);?>">
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="id" value="<?=$category->id;?>">
                        <button type="submit" class="btn btn-success">Speichern</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->