<section class="card" style="border: solid 1px #2c6de9; margin-bottom: 10px;">
    <div class="card-header" style="background-color: #2c6de9;">
        <h4 class="card-title" style="color: white !important;">Pencarian</h4>
    </div>
    <div class="card-body">
        <br>
        <form method="POST" id="search_form" class="form-horizontal">
            <div class="row">
                <div class="col-md-4">
                    <label for="search">Kata Kunci</label>
                    <input type="text" class="form-control" placeholder="Masukkan Kata Kunci" id="search"
                        name="search">
                </div>
                <div class="col-md-4">
                    <label for="status_select">Status Data</label>
                    <select id="status_select" name="status_select" class="form-control col-md-12">
                        <option value="">Pilih Status Data</option>
                        <option value="satu">Aktif</option>
                        <option value="dua">Inaktif</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="range_date">Range Tanggal</label>
                    <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control showdropdownspenerimaan" placeholder="Select Date"
                            name="range_date" id="range_date">
                        <div class="form-control-position">
                            <i class='bx bx-calendar-check'></i>
                        </div>
                    </fieldset>
                </div>
            </div>

            <div class="btn-group float-right" style="margin-top: 15px;">
                <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom"
                    title="Cari Data"> <i class="bx bx-search"></i> Cari </button>
                <button type="reset" class="btn btn-warning" data-toggle="tooltip" id="reset_form"
                    data-placement="bottom" title="Reset Filter"><i class="bx bx-reset"></i> Reset
                </button>
            </div>
        </form>
    </div>
</section>
