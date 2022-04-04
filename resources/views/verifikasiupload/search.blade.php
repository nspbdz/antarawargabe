<?php
?>

<section class="card" style="border: solid 1px #5A8DEE; margin-bottom: 10px;">
    <div class="card-header" style="background-color: #5A8DEE;">
        <h4 class="card-title" style="color: white !important;">Pencarian</h4>
    </div>
    <div class="card-body">
        <br>
        <form id="search-menu">
            <div class="row">
                <div class="col-md-4">
                    <label for="menu_name">Menu</label>
                    <input type="text" class="form-control" id="menu_name" name="menu_name" value="">
                </div>

                <div class="col-md-4">
                    <label for="menu_parent">Parent</label>
                    <input type="text" class="form-control" id="menu_parent" name="menu_parent" value="">
                </div>

                <div class="col-md-4">
                    <label for="menu_status">Status</label>
                    <select class="select2 form-control" id="menu_status" name="menu_status">
                        <option value="3">[ -- Pilih -- ]</option>
                        <option value="1">Aktif</option>
                        <option value="2">Inactive</option>
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-end" style="margin-top: 15px;">
                <button type="button" class="btn btn-primary" style="border-top-right-radius: 0; border-bottom-right-radius: 0;" onclick="searchMenu(event)"> <i class="bx bx-search"></i> Cari </button>
                <button class="btn btn-warning" style="border-top-left-radius: 0; border-bottom-left-radius: 0;" onclick="resetTable(event)"> <i class="bx bx-reset"></i> Reset </button>
            </div>
        </form>
    </div>
</section>