<?php
$title="Message";
include('header.php');
require_once'bd.php';
$contact=$bdd->query("SELECT *FROM users");
if(isset($_POST['delete_message'])){
    $ID_CONTACT=$_POST['id_message'];
    $delete_message=$bdd->prepare("DELETE FROM users where ID_USER=?");
    $delete_message->execute([$ID_CONTACT]);
    // $message_up=$bdd->prepare("Update contact SET EMAIL=?,MOTIF=?,MESSAGE=?,NOM_COMPLET=?");
    // $message_up->execute([$email,$motif,$message,$nom]);
     header("Location:message.php");
}

?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">

                            <div class="col-6">
                                <h4 class="text-bluesky">Tous Messages</h4>
                            </div>
                           
                    </div>
                 <body>
                      <div class="card-body py-2">
                     <table class="table table-bordered table-hover table-responsive-lg table-responsive-md table-responsive-sm" id="table">
                        
                        <thead>
                            <tr>
                                 <th class="text-truncate">Action</th>
                                 <th class="text-truncate">Nom Complet</th>
                                 <th class="text-truncate">Motif</th>
                                 <th class="text-truncate">Message</th>
                                 <th class="text-truncate">Email</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $update = 'update';
                                $delete = 'delete';
                                
                            ?>
                           <?php  while($contacts=$contact->fetch()):?>
                                <tr>
                                    <td class="text-truncate">
                                        <div class="btn-group" role="group" aria-label="Button group">
                                            <button class="btn text-truncate" data-toggle="modal" data-target="#update"><i class="fas fa-edit text-warning" onclick="upd_message(<?= $contacts['ID_USER']?>)"></i></button> 
                                            <button class="btn text-truncate" data-toggle="modal" data-target="#delete" onclick="deletemessage(<?= htmlspecialchars(json_encode($contacts['ID_USER']))?>,<?= htmlspecialchars(json_encode($contacts['NOM']))?>)">
                                                <i class="fas fa-trash text-danger"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="text-truncate"><?= $contacts['NOM'] ?> <?= $contacts['NOM'] ?></td>
                                     <td class="text-truncate"><?= $contacts['MOTIF'];?></td>
                                     <td class="text-truncate"><?= $contacts['MESSAGE'];?></td>
                                      <td class="text-truncate"><?= $contacts['EMAIL'];?></td>
                                </tr>
                                <?php endwhile;?>
                        </tbody>

                        <tfoot>
                            <tr>
                                <th class="text-truncate">Action</th>
                                 <th class="text-truncate">Nom Complet</th>
                                 <th class="text-truncate">Motif</th>
                                 <th class="text-truncate">Message</th>
                                 <th class="text-truncate">Email</th>
                            </tr>
                        </tfoot>
                    </table> 

                                                <!--Update Modal -->
                                                <div class="modal fade" id="<?= $update ?>" data-backdrop="static" data-keyboard="false" role="dialog" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary">
                                                                <h5 class="modal-title text-white">Modifier</h5>
                                                                <button type="button" class="close" name="modifier" data-dismiss="modal" aria-label="Close" onclick="loads()">
                                                                    <span aria-hidden="true" class="text-white">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div class="container-fluid">
                                                                    <form action="" method="post">
                                                                        <input type="" name="" id="txt" hidden>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Delete Modal-->
                                                <div class="modal fade" id="<?= $delete ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <form action="" method="post">
                                                        <!-- <input type="" name="" id="ID_MARIEL"
                                                            style="display: none"> -->
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Suprimer message</h5>
                                                                    <button class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <div class="container-fluid" id="GET_MSG">
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <input type="text" value="" id="ID_MSG" name="id_message" hidden>
                                                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Reset </button>
                                                                    <button type="submit" class="btn btn-danger" name="delete_message">Delete </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                   
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include('foot.php');
?>
<script type="">
    var btn2 = document.getElementById("Up_Dep");
    function deletemessage(id_message,auteur){
       document.getElementById("ID_MSG").value  = id_message;
        $("#GET_MSG").html("<i>Voulez-vous Suprimer le message de</i> <b>"+auteur+"</b>")
    }

    function upd_messages(){
        $.post(
        'ajax.php', {

            update_message:$("#update_message").val(),
            id_msgs:$("#id_msgs").val(),
            auteur_message:$("#auteur_message").val(),
            email:$("#email").val(),
            motif:$("#motif").val(),
            comment:$("#comment").val(),
        }, function (donnees){
        
            if(donnees=="ok")
            {
                // toastr.success("The Department has been succesfuly Updated");
                alert('good');
            
            }
            
            else if(donnees=="exit")
            {
                // toastr.error("This Department is already added");
                alert('exist');
               
            }
            
            else if(donnees=="empty")
            {
                // toastr.error("Please fill up all the fields");
                alert("Please fill up all the fields");
                
            }
        });
    }

    function upd_message(id){
         $.post(
            'ajax.php', {
                upd_msg:'ok',
                Id_message:id,
            }, function (donnees){
                alert(donnees);
                $('#txt').html(donnees);
            });
    }
    function loads(){
         window.location.replace("message.php");
    }

</script>
