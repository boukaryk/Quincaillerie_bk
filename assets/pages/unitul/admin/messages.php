<?php 
    include('../../../utilities/QueryBuilder.php');
    include('../../functions/function.php');

    $title = 'Contact';
    
    $obj = new QueryBuilder();
    // liste des filieres
    $checkDeprt = $obj->Select('users', [], [], $orderBy = '', $order = 1);

    if(isset($_SESSION['del_department']) && $_SESSION['del_department'] == 1)
    {
        alert('success' , "Contact delet successfully!");
        unset($_SESSION['del_department']);
    }
    
    //suppression d'une classe

    if(isset($_POST['delete_department'])){
        extract($_POST);
        $requete = $obj->Delete('users', array('ID_USER'=>$idms));
        if($requete)
        {
            $_SESSION['del_department'] = 1;
            echo("<script>location.assign('../refresh.html')</script>");
        }
    }
    include('header.php');

?>
<div class="container-fluid" id="fenetre">
    <div class="row">
        <div class="col-lg-12">
            <div class="card wow fadeInDown">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="text-bluesky">CONTACTS</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a class="btn btn-dark" data-toggle="modal" data-target="#new_department" role="button">Ajouter contact</a>
                        </div>
                    </div>
                </div>
                <div class="card-body py-2">
                    
                    <table class="table table-bordered table-hover table-responsive-lg table-responsive-md table-responsive-sm" id="table">
                        <thead>
                            <tr>
                                <th class="text-truncate">Action</th>
                                <th class="text-truncate">Auteur</th>
                                <th class="text-truncate">Motif</th>
                                <th class="text-truncate">Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                 if(is_object($checkDeprt)){
                                    while($depListe = $checkDeprt->fetch()){?>
                                <tr>
                                    <td class="text-truncate">
                                        <div class="btn-group" role="group" aria-label="Button group">
                                            <button class="btn text-truncate" data-toggle="modal" data-target="#upModal" onclick="updatemessage(<?= $depListe['ID_USER']?>)"><i class="fas fa-edit text-warning"></i></button>
                                            <button class="btn text-truncate" data-toggle="modal" data-target="#delModal"><i class="fas fa-trash text-danger" onclick="deletemessage(<?= htmlspecialchars(json_encode($depListe['ID_USER']))?>,<?= htmlspecialchars(json_encode($depListe['NOM']))?>)"></i></button>
                                        </div>
                                    </td>
                                    <td class="text-truncate"><?= $depListe['NOM'] ?></td>
                                    <td class="text-capitalize text-truncate"><?= $depListe['MOTIF']?></td>
                                    <td class="small"><?= $depListe['MESSAGE'] ?></td>
                                </tr>
                                <?php } }?>
                                
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-truncate">Action</th>
                                <th class="text-truncate">Auteur</th>
                                <th class="text-truncate">Motif</th>
                                <th class="text-truncate">Message</th>
                            </tr>
                        </tfoot>
                    </table>
                                <!-- Department Update -->
                                <div class="modal fade" id="upModal" data-backdrop="static" data-keyboard="false" role="dialog" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">

                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title text-white">Modifier Contact</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="loads()">
                                                    <span aria-hidden="true" class="text-white">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="container-fluid ">
                                                   <div class="col-12 text-center" id="texte"></div>
                                                    <form action="" method="post" id="txt" class="my-5">
                                                        
                                                    </form>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- End Field Update -->


                                <!-- Delete Department Modal -->
                                <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                                <div class="modal-header bg-danger text-center text-white">
                                                        <h5 class="modal-title">Suprimer Contact</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <span  id="getDepart"></span>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                               <form action="#" method="post">
                                                  <input type="text" value="" id="idDEP" name="idms" hidden>
                                                   <button type="button" class="btn btn-warning" data-dismiss="modal">Reset</button>
                                                <input type="submit" class="btn btn-danger" name="delete_department" value="Delete">
                                               </form>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Delete Department Modal -->
                           
                       

                                <!-- Create New Field -->
                                <div class="modal fade" id="new_department" data-backdrop="static" data-keyboard="false" role="dialog" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                        <h5 class="modal-title text-bluesky">Ajouter contact</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="loads()">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                            <div class="modal-body">
                                               <div class="col-12 text-center" id="text"></div>
                                                <form action="#" method="post" id="depart" class="my-3">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label for="filiere">Auteur<span class="text-danger"> * </span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="auteur_name" id="auteur_name" placeholder="Entre votre nom" oninput="EnableDecimal(this)" required>

                                                                <div class="input-group-append">
                                                                    <span class=" input-group-text fas fa-university"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label for="motif">Motif <span class="text-danger"> * </span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="motif" id="motif" placeholder="Entrez votre motif" oninput="EnableDecimal(this)" required>
                                                            
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text fas fa-user-tie"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-12 mt-5">
                                                            <label for="message">Message <span class="text-danger"> * </span></label>
                                                            <div class="form-group">
                                                                <textarea name="message" id="message" class="form-control" rows="10" style="resize:none;" placeholder="Entrez votre message" oninput="EnableDecimal(this)" required></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 text-center my-5">
                                                            <input class="btn btn-primary w-50" type="button" name="submit_message" id="submit_message" value="Create Department" onclick="addmessage()" disabled > 
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- End Create New Field -->
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    var inputs_remplis = [];
    var btn = document.getElementById("submit_message");
    var btn2 = document.getElementById("Up_message");
    
    function addmessage(){
        $.post(
        'ajax.php', {
            submit_message:$("#submit_message").val(),
            message:$("#message").val(),
            auteur_name:$("#auteur_name").val(),
            motif:$("#motif").val(),
        }, function (donnees){
            if(donnees==1)
            {
                // alert('success' , "Contact ajouter!");
                toastr.success("Contact ajouter");
                
                var reset = document.getElementById('depart');
                reset.reset();
            }
            else if(donnees==2)
            {
                
                // alert('success' , "Ce contact exist!");
                toastr.success("Contact exxist");
                
            }
        });
        
    }
    function msg_Update(){
        $.post(
        'ajax.php', {

            Up_message:$("#Up_message").val(),
            idmessage:$("#idmessage").val(),
            up_msg:$("#up_msg").val(),
            up_msgs:$("#up_msgs").val(),
            up_aut_name:$("#up_aut_name").val(),
        }, function (donnees){
        
            if(donnees=="ok" || donnees=="okk")
            {
               //  alert('success' , "Ce contact Modifier!");
               //  toastr.success("Contact Modifier");
               toastr.success("Contact ajouter");
            }
            
            else if(donnees=="exit")
            {
                // alert('success' , "Ce contact exist!");
                toastr.success("Contact exist");
               
            }
            
            else if(donnees=="empty")
            {
                // alert('success' , "Veillez remplir tousleschamps!");
                toastr.success("Veillez remplir tousleschamps!");
                
            }
        });
    }
    function deletemessage(idms,noms){
       document.getElementById("idDEP").value  = idms;
        $("#getDepart").html("<i>Voulez-vous supprimer le message de </i><b>"+noms+"</b> ?")
    }
    
    function EnableDecimal(val1){
        if(val1.id=="auteur_name" || val1.id=="motif" || val1.id=="message" || val1.id=="up_msgs" || val1.id=="up_aut_name" || val1.id=="up_msg"){
            if (val1.value =="")
            {
                val1.style.color = 'red';
                val1.style.border = '1px solid red';
                val1.style.backgroundColor = '#ffdbd8';
                Pop(val1);
            }
            else
            {
                val1.style.color = 'black';
                val1.style.border = '1px solid #ced3db';
                val1.style.backgroundColor = 'white';
               Push(val1);
            }
        }
    }
    
    function Push(input){
      //console.log(input);
         //console.log(inputs_remplis.indexOf(input.id));
         if (inputs_remplis.indexOf(input.id) <= -1)
         {
             inputs_remplis.push(input.id);
         }
         Enable();
    }
    
    function Pop(input){
        //console.log(inputs_remplis.indexOf(input.id));
        if (inputs_remplis.indexOf(input.id) >= 0)
           {
            inputs_remplis.splice(inputs_remplis.indexOf(input.id), 1);
           }
           Enable();
    }
    
    function Enable(){
        if (inputs_remplis.length == 3)
        {
            btn.disabled = false;
        }
        else
        {
            btn.disabled = true;
        }
    }   
    
    function updatemessage(id){
         $.post(
            'ajax.php', {
                messageUpd:'ok',
                messageId:id,
            }, function (donnees){
                $('#txt').html(donnees);
            });
    }
    
    function loads(){
         window.location.replace("contacts.php");
    }
</script>
<?php
include('foot.php');
?>