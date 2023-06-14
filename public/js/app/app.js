$(document).ready(function() {
    $("#card div").hover(
        function(){$(this).addClass("destaque");},
        function(){$(this).removeClass("destaque");},
);
});
$("#disciplineCreateBTN").on("click", function(){
    createData();
});
// $(document).ready(function () {
//     $("#t").click(function () { 
//         $("#titulo").css("color", "#0000FF");
   
//     });
// });

$.ajaxSetup({
    headers:{
        'x-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

function allData(){
    $.ajax({      
        type:"GET",
        dataType: 'json',
        url: "/disciplines/all",
        success:function(response){
            var data = ""
            $.each(response, function(key,value){
                data = data + "<div class='col-md-3' id='cardActivitie"+value.id+"'>"
                data = data + "<ul >"
                data = data + "<div class='card mt-5' style='width: 18rem;' >"
                data = data + "<div class='card-body text-center' id='card'>"
                data = data + "<h5 class='card-title'>"+value.name+"</h5>"
                data = data + "<br>"
                data = data + "<p>" 
                data = data + "<a href='/activities/create/"+value.id+"'>Criar atividades</a><br>"
                data = data + "<a href='/disciplines/edit/"+value.id+"'>Gerenciar disciplina</a>"
                data = data + "</p>"
                data = data + "<p><a href='/disciplines/"+value.id+"/activities'>Ver atividades</a></p>"
                data = data + "</div>"
                data = data + "<button type='submit'class='btn btn-danger mt-2 ' onclick='deleteData("+value.id+")'>Excluir Disciplina"
                data = data + "</button>"
                data = data + "</div>"
                data = data + "</div>"
                data = data + "</ul>"
                data = data + "</div>"


            })
            $("#disciplineShow").html(data);
        }
    })
}
allData();

function clearData(){
    $('#name').val('');
}
function createData() {
    var name = $('#name').val();
    $.ajax({
        type: "POST",
        dataType: "json",
        data: {name:name},
        url: "/disciplines/create/store/",
        success: function (data) {    
                                        //É PRECISO ATUALIZAR PARA APARECER
            //------alert
            const Msg = Swal.mixin({
                toast:  true,   
                // ^---- fica mei fei
                position: 'center',
                icon: 'success',
                showConfirmButton: false,
                timer: 1500
            })
            Msg.fire({
                type: 'success',
                title: 'Data Added Sucess',
            })
            allData();
            clearData();
            //------alert
        },
        error: function(data){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ocorreu um erro, verifique se o campo foi inserido corretamente',
                })
        }
    });
}
// function updateData(id){
//     var id = $("#id").val();
//     var name = $("#name").val();
//     $.ajax({
//         type: "POST",
//         dataType: "json",
//         data: {name:name},
//         url: "/disciplines/updateData/"+id,
//         success:function(data){
//             console.log(data);
//         },
//         error:function(data){
//             console.log("deu erro");
//         }
//     })
// }
const token = $("#_token").val();

function deleteData(id){

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })
      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        //---------------------------------------if alert true = delete ------------------------------------------------------------------------------------------
        if (result.isConfirmed) {
    //---------------------------------------function delete start-------------------------------------------------------------
            $.ajax({
                type: "DELETE",
                data: {token},
                url: `/disciplines/destroy/${id}`,
                success:function(response){
                    allData();
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                },
                error:function(data){
                    swalWithBootstrapButtons.fire(
                        'ERRO!!',
                        'A disciplina não pode ser deletada, confira se há atividades registradas',
                        'error'
                        )
                }
                
        })
        //---------------------------------------alert false = no delete -------------------------------------------------------------
    }else if (result.dismiss === Swal.DismissReason.cancel) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
            )
        }
        })
    }
    //---------------------------------------function delete end-------------------------------------------------------------
    



    // --------------------------------------------------------Activities-----------------------------------------------------------------------


    function deleteActivitie(id){

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          })
          swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
          }).then((result) => {
            //---------------------------------------if alert true = delete ------------------------------------------------------------------------------------------
            if (result.isConfirmed) {
        //---------------------------------------function delete start-------------------------------------------------------------
                $.ajax({
                    type: "DELETE",
                    data: {token},
                    url: `/activities/destroy/${id}`,
                    success:function(response){
                        $(".col-md-3"+id).remove();
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Atividade deletada com sucesso',
                            showConfirmButton: false,
                            timer: 1500
                          })
                        
                    },
                    error:function(response){   
                        swalWithBootstrapButtons.fire(
                            'ERRO!!',
                            'Um erro inesperado não permitiu que a ação seja completa',
                            'error'
                          )
                    }
            })
        //---------------------------------------function delete end-------------------------------------------------------------
    
        //---------------------------------------alert false = no delete -------------------------------------------------------------
            } else if (result.dismiss === Swal.DismissReason.cancel) {
              swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
              )
            }
          })
        }
        //---------------------------------------Editar conta do estudante-------------------------------------------------
        
    $("#editarStudent").click(function(event){
        $("#editName").removeAttr('disabled');
        $("#editEmail").removeAttr('disabled');
     });

        //---------------------------------------Alterar status da conta do estudante-------------------------------------------------


function studentDisable(id) { 

    $.ajax({
        type: "put",
        dataType: "json",
        data: {status:2},
        url: `/teacher/student/edit/${id}/status`,
        success: function (data) {
            console.log('Ativado');
            location.reload();
        },
        error:function(error){
            console.log(error);
        },
    });
 }
 function studentActive(id) { 

    $.ajax({
        type: "put",
        dataType: "json",
        data: {status:1},
        url: `/teacher/student/edit/${id}/status`,
        success: function (data) {
            console.log('desativado');
            location.reload();
        },
        error:function(error){
            console.log(error);
        },
    });
 }