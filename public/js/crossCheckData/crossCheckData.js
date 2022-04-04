$(document).ready(function() {
    searchData();
  });
  function searchData() {

    // loadingScreen('Dalam Proses ...');
    var code = $('#code').val();
    // var bulan = $('#bulan').val();
    var provinsi = $('#provinsi').val();
    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      },
      url:"/crosscheckdata/getReporting",
      method:"POST", //First change type to method here
      data:{
        code: code,
        // bulan : bulan,
        // provinsi : provinsi
      },
      success:function(response) {
        // console.log(response)

          $.unblockUI();
          tableRender( response.slideStatus,response.datatl,response.datadh,response.datapnp, response.data);
      },
      error:function(){
        $.unblockUI();
        alert("error");
      }
    });
  }

  function tableRender( slideStatus,datatl,datadh,datapnp, data) {
      console.log(datatl);

    var item = '<tr>';

    var j = 0;
    var x =1;
    for(var j=0; j<data.length; j++){
        item += '<td> '+ x +'</td>';
        // item += '<td> '+ action +'</td>';
        // item += `<td style='white-space: nowrap'><a class="edit btn btn-icon btn-info detail-menu-btn" style="padding:5px; margin-left:5px;" href="crosscheckdata/`+data[j].id+`" data-toggle="tooltip" data-placement="top" title="Detail Data">
        // <i class="bi-eye" aria-hidden="true" id="detail"></i></a>`;
        // item +=  `<a class="edit btn btn-icon btn-info detail-menu-btn" style="padding:5px; margin-left:5px;" href="crosscheckdata/`+data[j].id+`/edit" data-toggle="tooltip" data-placement="top" title="Detail Data">
        // <i class="bi-pencil" aria-hidden="true" id="uploadFile"></i></a></td>`;
        item += '<td> '+ slideStatus +'</td>';
        item += '<td> '+ data[j].get_project.projectcode +'</td>';
        item += '<td> '+ data[j].projectname +'</td>';

        const dhApproval = [];
        const dhUser = [];
        const tlApproval = [];
        const tlUser = [];
        const pnpApproval = [];
        const pnpUser = [];

        for(var k=0; k<datatl[j].tl.length; k++){
        tlApproval.push(datatl[j].tl[k].approvalstatus);
        tlUser.push(datatl[j].tl[k].userid);
        }

        for(var xy=0; xy<datadh[j].dh.length; xy++){
        dhApproval.push(datadh[j].dh[xy].approvalstatus);
        dhUser.push(datadh[j].dh[xy].userid);
        }

        for(var xyz=0; xyz<datapnp[j].pnp.length; xyz++){
        pnpApproval.push(datapnp[j].pnp[xyz].approvalstatus);
        pnpUser.push(datapnp[j].pnp[xyz].userid);
        }

        if(dhApproval == 1 && tlApproval == 1 && pnpApproval==1){
            allStataus=" Approved"
        }else{
            allStataus="Waiting"
        }

        if(tlApproval == 0 ){
            pmstatus="Waiting Approved PM-TL"
        }else if(tlApproval == 1 && dhApproval == 0){
            pmstatus="Wating Approved PM-DH"
        }else if(dhApproval == 1 && tlApproval == 1){
            pmstatus="Approved"
        }else{
            pmstatus="-"
        }

        if(tlUser.length==0){
            pmuser="-"
        }else{
            pmuser=tlUser
        }

        if(pnpApproval==1){
            pnpStataus=" Approved"
        }else{
            pnpStataus="Waiting"
        }

        if(pnpUser.length==0){
            userPnp="-"
        }else{
            userPnp=pnpUser
        }
        item += '<td> '+ allStataus +'</td><td> '+ pmstatus +'</td><td> '+ pmuser +'</td><td> '+ pnpStataus +'</td><td> '+ userPnp +'</td>';

        // console.log(tlApproval)
        console.log(pnpUser)

        item += '</tr>';
        x=x+1;
    }
    $('#tabel_result').append(item);
}

    $(function () {
        $.ajaxSetup({
          headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          },
        });

        // $('input:checkbox').change(function () {
        //     var name = $(this).val();
        //     var check = $(this).attr('checked');
        //     console.log("Change: " + name + " to " + check);
        // });

     console.log("asdd");

     $("body").on("click", ".switchStatus", function () {
        var id    = $(this).data("id");
        var check = $("#switchMenu" + id).is(":checked");
        var table = $('#main-table-menu').DataTable();
        var token = $("meta[name='csrf-token']").attr("content");
        console.log(id);

        var warningMessage = "";
        var buttonName = "";

        if (check === false) {
            warningMessage = 'Apakah anda akan menonaktifkan data ini?';
            buttonName = "Non-Aktifkan";
        } else {
            warningMessage = 'Apakah anda akan mengaktifkan data ini?';
            buttonName = "Aktifkan";
        }

        Swal.fire({
            title: "Change Data Status",
            text: warningMessage,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: buttonName
        }).then(function (result) {
            if (result.value) {
                loadingScreen('Dalam Proses ...');
                $.ajax({
                    url: '/crosscheckdata/status',
                    type: 'POST',
                    data: {
                        _token: token,
                        id: id
                    },
                    success: function (response) {
                        if (response.status == 200) {
                            $.unblockUI();
                            Swal.fire({
                                icon: "success",
                                title: response.header,
                                text: response.message,
                                confirmButtonClass: 'btn btn-success',
                            }).then(function (result) {
                                if (result.value) {
                                    table.draw();
                                }
                            });
                        } else {
                            $.unblockUI();
                            Swal.fire({
                                icon: "warning",
                                title: response.header,
                                text: response.message,
                                confirmButtonClass: 'btn btn-success',
                            }).then(function (result) {
                                if (result.value) {
                                    table.draw();
                                }
                            });
                        }
                    }
                });
            } else {
                table.draw();
            }
        });
    });



function loadingScreen(msg) {
    var $white = '#fff';
    // var src = $("#logo_kai").attr('src');
    $.blockUI({
        // message: '<img src="' + src + '" style="height: 80px; width: auto"> <hr> <h3>' + msg + '</h3>',
        timeout: 5000, //unblock after 5 seconds
        overlayCSS: {
            backgroundColor: $white,
            opacity: 0.8,
            cursor: 'wait'
        },
        css: {
            border: 0,
            padding: 0,
            backgroundColor: 'transparent'
        }
    });
}



});
