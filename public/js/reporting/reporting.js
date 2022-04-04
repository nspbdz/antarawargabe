$(document).ready(function() {
    searchData();
  });
  function searchData() {

    // loadingScreen('Dalam Proses ...');
    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      },
      url:"/reporting/getReporting",
      method:"POST", //First change type to method here

      success:function(response) {
        // console.log(response)

          $.unblockUI();
          tableRender( response.datatl,response.datadh,response.datapnp, response.data);
      },
      error:function(){
        $.unblockUI();
        alert("error");
      }
    });
  }

  function tableRender( datatl,datadh,datapnp, data) {
      console.log(datatl);

    var item = '<tr>';

    var j = 0;
    var x =1;
    for(var j=0; j<data.length; j++){
        item += '<td> '+ x +'</td>';
        item += '<td> '+ data[j].get_project.projectcode +'</td>';
        item += '<td> '+ data[j].projectname +'</td>';
        // console.log(datatl[j].tl.length)
        // var dataStatus=datatl[j].tl[k].approvalstatus
        // console.log(datatl[j].tl[0].approvalstatus)
        const dhApproval = [];
        const dhUser = [];
        const tlApproval = [];
        const tlUser = [];
        const pnpApproval = [];
        const pnpUser = [];
        // const pmUser = [];


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
        }else if(tlApproval == 0 && dhApproval == 1){
            pmstatus="Wating Approved PM-TL"
        }else if(tlApproval == 1 && dhApproval == 0){
            pmstatus="Wating Approved PM-DH"
        }else if(dhApproval == 1 && tlApproval == 1){
            pmstatus="Approved"
        }else{
            pmstatus="-"
        }

        console.log(dhUser);
        console.log(tlUser);
        if(tlUser.length==0 && dhUser.length==0){
            pmuser="-"
        }else if(dhUser.length==1 ){
            pmuser=dhUser
        }else if(tlUser.length==1 ){
            pmuser=tlUser
        }
        // else{
        //     pmuser=tlUser
        // }

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

$("body").on("click", ".switchStatus", function () {
    console.log($(this).attr('id'));
    tagId=$(this).attr('id')

    var id = $(this).attr('id');
    console.log(id);
    var check = $("switchMenu" + id)
    var table = $('#main-table-menu').DataTable();
    var token = $("meta[name='csrf-token']").attr("content");
    var warningMessage = "";
    var buttonName = "Hapus";



    Swal.fire({

        title: "Apakah anda yakin !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: buttonName,
    }

    ).then(function (result) {
        if (result.value) {
            console.log(result);
            loadingScreen('Dalam Proses ...');
            $.ajax({
                url: 'master/status',
                type: 'POST',
                data: {
                    id: id,
                    _token: token,
                    // "input":result.value,
                },

                success: function (response) {
                    if (response.status == 200) {
                        $.unblockUI();
                        Swal.fire({
                            icon: "success",
                            title: response.header,
                            // text: response.message,
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
                            // text: response.message,
                            confirmButtonClass: 'btn btn-success',
                        }).then(function (result) {
                            if (result.value) {
                                table.draw();
                            }
                        });
                    }
                  table.draw();
                }

            });
        } else {
            table.draw();
        }
    });
});
