
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <br></br>
    <!-- Nav Item - Dashboard -->

    <li  class="nav-item <?php echo UserHelp::isActiveRoute('dashboard.index') ?>" id=""  >
        <a class="nav-link" href="/dashboard">
            <i class="fa fa-home"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-database"></i>
            <span>Hunian & Warga</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a id="" class="collapse-item" href="/hunianwarga/hunian">Data Hunian</a>
                <a id="" class="collapse-item" href="/hunianwarga/warga">Data Warga</a>
                <a id="" class="collapse-item" href="/hunianwarga/keluarga">Data Keluarga</a>
                <a id="" class="collapse-item" href="/hunianwarga/departement">Departement</a>
                <a id="" class="collapse-item" href="/hunianwarga/team">Tim</a>
                <a id="" class="collapse-item" href="/hunianwarga/internal-order">Internal Order</a>
                <a id="" class="collapse-item" href="/hunianwarga/asset">Aset</a>
            </div>
        </div>

    </li>


</ul>
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script>
    // console.log("asd");
    $(document).ready(function() {
        $("#dashboard").hide();
        $("#masterUser").hide();
        $("#masterRole").hide();
        $("#masterProject").hide();
        $("#masterTeam").hide();
        $("#masterInternalOrder").hide();
        $("#masterAsset").hide();
        $("#masterDepartement").hide();
        $("#inputProject").hide();
        $("#crossCheckData").hide();
        $("#approvalAccess").hide();
        $("#reporting").hide();
        $("#verifikasiUpload").hide();
        $("#reClass").hide();

});
</script>
