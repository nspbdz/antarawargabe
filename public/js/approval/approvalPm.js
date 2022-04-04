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
      url:'/approval/getPm/'+id+'',
      method:"POST", //First change type to method here
    //   data:{
    //     code: code,
    //     // bulan : bulan,
    //     // provinsi : provinsi
    //   },
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
      console.log(data);
    //   console.log(data.get_user.name);

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
        <td>PIC</td>
        <td>Actual</td>

         </tr>`;

        item += '<td> '+ data.get_user.namadepan +'</td>';
        item += '<td> '+ data.lastapprovaldate +'</td>';

        // data tl
        for(var i = 0; i<datatl.length; i++){
            // console.log(datatl[i].dh.length)
            // console.log(datatl[i].dh)
            if(datatl[i].tl.length == 0){
                item += '<td> -</td><td> -</td>';
            }else{

                for(var j = 0; j<datatl[i].tl.length; j++){
                    console.log(datatl[i].tl[j].featuretype)
                   item += '<td> '+ datatl[i].tl[j].userid +'</td>';
                   item += '<td> '+ datatl[i].tl[j].approvaldate +'</td>';
                    }
            }
            console.log(datatl[i].tl.length)
        }


        // data dh
        for(var i = 0; i<datadh.length; i++){
            // console.log(datadh[i].dh.length)
            // console.log(datadh[i].dh)
            if(datadh[i].dh.length == 0){
                item += '<td> -</td><td> -</td>';
            }else{

                for(var j = 0; j<datadh[i].dh.length; j++){
                    console.log(datadh[i].dh[j].featuretype)
                   item += '<td> '+ datadh[i].dh[j].userid +'</td>';
                   item += '<td> '+ datadh[i].dh[j].approvaldate +'</td>';
                    }
            }
            console.log(datadh[i].dh.length)
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
            // var table = $('#table-menu').DataTable();
            var table = $('#tabel_result');
            var btnApproved = $('#btnapproved');

            // var table=
            console.log(table);
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
                                        table.empty();
                                        btnApproved.empty()
                                        searchData()
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
                                        table.empty();
                                        btnApproved.empty()
                                        searchData()
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
            // console.log(id);
            // var table = $('#main-table-menu').DataTable();
            var table = $('#tabel_result');
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
                                         table.empty();
                                        btnApproved.empty()
                                        searchData()
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
                                         table.empty();
                                        btnApproved.empty()
                                        searchData()
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
