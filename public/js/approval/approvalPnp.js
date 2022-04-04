$(document).ready(function() {
    searchData();
  });
  function searchData() {
    var id    = $("#table_reporting").data("id");
    console.log(id);
    // loadingScreen('Dalam Proses ...');
    var code = $('#code').val();

    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      },
      url:'/approval/getPnp/'+id+'',
      method:"POST", //First change type to method here
    //   data:{
    //     code: code,
    //   },
      success:function(response) {
        // console.log(response)

          $.unblockUI();
          tableRender( response.datapnp, response.data);
      },
      error:function(){
        $.unblockUI();
        alert("error");
      }
    });
  }

  function tableRender(datapnp, data) {
    //   console.log(data.get_user.name);
      console.log(datapnp);

    var item = '<tr>';

    var j = 0;
    var x =1;
    // for(var j=0; j<data.length; j++){
        item += `<tr>
        <td>PIC</td>
        <td>Actual</td>
        <td>PIC</td>
        <td>Actual</td
        <td>Actual</td>


         </tr>`;

        item += '<td> '+ data.get_user.namadepan +'</td>';
        item += '<td> '+ data.lastapprovaldate +'</td>';


        for(var i = 0; i<datapnp.length; i++){
            // console.log(datapnp[i].pnp.length)
            // console.log(datapnp[i].pnp)
            if(datapnp[i].pnp.length == 0){
                item += '<td> -</td><td> -</td>';
            }else{

                for(var j = 0; j<datapnp[i].pnp.length; j++){
                    console.log(datapnp[i].pnp[j].featuretype)
                   item += '<td> '+ datapnp[i].pnp[j].userid +'</td>';
                   item += '<td> '+ datapnp[i].pnp[j].approvaldate +'</td>';
                    }
            }
        }

        item += '</tr>';
        x=x+1;
    // }
    $('#tabel_result').append(item);
}



$(function () {
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
    });

        $( ".approve" ).click(function() {
            console.log($(this).attr('id'));
            tagId=$(this).attr('id')
            var id = $(this).attr('id');
            console.log(id);
            var table = $('#main-table-menu').DataTable();
            var btnApproved = $('#btnapproved');
            var token = $("meta[name='csrf-token']").attr("content");
            var warningMessage = "";
            var buttonName = "Approve";

            Swal.fire({

                title: "Apakah ingin Approve Data !",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: buttonName,
            }

            ).then(function (result) {
                if (result.value) {
                    console.log(result);
                    loadingScreen('Dalam Proses ...');
                    $.ajax({
                        url: '/approval/approve',
                        type: 'POST',
                        data: {
                            id: id,
                            projectdetail: null,
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
                                        // table.draw();
                                        btnApproved.empty()

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
                                        // table.draw();
                                        btnApproved.empty()

                                    }
                                });
                            }
                        // table.draw();
                        }

                    });
                } else {
                    // table.draw();
                }
            });
        });

        $( ".reject" ).click(function() {
            console.log($(this).attr('id'));
            tagId=$(this).attr('id')
            var id = $(this).attr('id');
            console.log(id);
            var table = $('#main-table-menu').DataTable();
            var btnApproved = $('#btnapproved');
            var token = $("meta[name='csrf-token']").attr("content");
            var warningMessage = "";
            var buttonName = "reject";

            Swal.fire({
                title: "Apakah ingin Reject Data !",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: buttonName,
                inputPlaceholder: "harus mengisi alasan",
                input:'text',
                inputValidator: (value) => {
                    return !value && 'You need to write something!'
                  }
            }

            ).then(function (result) {
                if (result.value) {
                    console.log(result);
                    loadingScreen('Dalam Proses ...');
                    $.ajax({
                        url: '/approval/approve',
                        type: 'POST',
                        data: {
                            id: id,
                            projectdetail: null,
                            _token: token,
                            "input":result.value,
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
                                        // table.draw();
                                        btnApproved.empty()

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
                                        // table.draw();
                                        btnApproved.empty()

                                    }
                                });
                            }
                        // table.draw();
                        }

                    });
                } else {
                    // table.draw();
                }
            });
        });


    function loadingScreen(msg) {
        var $white = "#fff";
        var src = $("#logo_kai").attr("src");
        $.blockUI({
        message:
            '<img src="' +
            src +
            '" style="height: 80px; width: auto"> <hr> <h3>' +
            msg +
            "</h3>",
        timeout: 1000, //unblock after 5 seconds
        overlayCSS: {
            backgroundColor: $white,
            opacity: 0.8,
            cursor: "wait",
        },
        css: {
            border: 0,
            padding: 0,
            backgroundColor: "transparent",
        },
        });
    }

});
