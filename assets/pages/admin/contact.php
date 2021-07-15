
<?php 
      $title="Contact";
      include'head.php';
      include'../../functions/function.php';
    require_once'bd.php';
    // if(isset($_POST['envoi'])){
    //     $nom=trim(htmlspecialchars($_POST['nom']));
    //     $motif=trim(htmlspecialchars($_POST['motif']));
    //     $comment=trim(htmlspecialchars($_POST['comment']));
    //     $email=trim(htmlspecialchars($_POST['email']));
        
    //     if(empty($nom)){
    //         // $erreu="Veuillez donner votre nom";
    //         alert('danger','Veuillez donner votre nom');
    //     }
    //     else if(empty($email)){
    //         // $erreu="Veuillez donner votre Email";
    //         alert('danger','Veuillez donner votre Email');
    //     }
    //     else if(empty($motif)){
    //         // $erreu="Veuillez donner votre motif";
    //          alert('danger','Veuillez donner votre motif');
    //     }
    //     else if(empty($comment)){
    //         // $erreu="Veuillez donner un commentaire";
    //         alert('danger','Veuillez donner un commentaire');
    //     }
    //     else{
    //         $search=$bdd->prepare("INSERT INTO users SET EMAIL=?, MOTIF=?, MESSAGE=?,NOM=?");
    //         $search->execute([$email,$motif,$comment,$nom]);
    //         // $erreur="Merci ".$nom.", message envoyé avec succès.";
    //         alert('success',' Merci '.''.$nom.' message envoyé avec succès');
    //     }
    // }
?>
<div class="container" id="contact">
    <!-- <h4 class="col-12 text-center" style="color:red; position:absolute"><?php if(isset($erreu)){echo $erreu;}?></h4>
    <h4 class="col-12 text-center " style="color:green; position:absolute"><?php if(isset($erreur)){echo $erreur;}?></h4> -->

        <div class="row">
           
 <!--            <div class="col-lg-7 py-5">  
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-bluesky text-center">Laissez nous un message</h4>
                             </div>
                        </div>
                    </div>
                    <div class="card-body">
                             <form method="post" action="#content">
                                <div class="input-group py-3 "> 
                                    <input id="input1" class="form-control  border border-primary" type="text" size="70" Maxlenght="50" name="nom"  id="nom" placeholder="Votre nom">
                                    <div class="input-group-append">
                                        <span class=" input-group-text fas fa-user-alt bg-light text-bluesky"><span class="text-danger"> * </span></span>
                                    </div>
                                </div>

                                <div class="input-group py-3 "> 
                                    <input id="input1" class="form-control  border border-primary" type="text" size="70" Maxlenght="50" name="email"  id="email" placeholder="Votre Email">
                                    <div class="input-group-append">
                                        <span class=" input-group-text fas fa-user-alt bg-light text-bluesky"><span class="text-danger"> * </span></span>
                                    </div>
                                </div>

                                <div class="input-group py-3 ">
                                    <input id="input3" class="form-control  border border-primary" type="text" size="70" Maxlenght="50" name="motif" id="motif" placeholder="Votre motif" >
                                    <div class="input-group-append">
                                        <span class=" input-group-text fas fa-user-alt bg-light text-bluesky"><span class="text-danger"> * </span></span>
                                    </div>
                                </div>

                               <div class="input-group py-3 col-lg-12">
                                 <span class="text-danger"> * </span>
                                 <textarea rows="10" cols="20" class="form-control"  placeholder="Votre Commentaire" size="70" Maxlenght="50"  name="comment"></textarea>
                                </div>

                                <div class="col-lg-12 form-group py-5  text-center">
                                    <input class="btn btn-outline-primary rounded-pill col-lg-12" type="submit" name="envoi" onchange="get_materiel_name(this.value)" value="Envoyer">
                                </div>
                            </form>
                    </div>
                    </div>        
                        </div> -->
                        <div class="col-lg-5 py-5 text-center"> 
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="text-bluesky text-center">Les jours de travail</h4>
                                         </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table" >
                                        <th class="text-uppercase">Jours de travail</th>
                                        <th class="text-uppercase">heures de travail</th>
                                        <tr>
                                            <td>Lundi</td><td>7h : 30 &nbsp;A&nbsp; 18h : 00</td>
                                        </tr>
                                        <tr>
                                            <td>Mardi</td><td>7h : 30 &nbsp;A&nbsp; 18h : 00</td>
                                        </tr>
                                        <tr>
                                            <td>Mercredi</td><td>7h : 30  &nbsp;A&nbsp;  18h : 00</td>
                                        </tr>
                                        <tr>
                                            <td>Jeudi</td><td>7h : 30  &nbsp;A&nbsp;  18h : 00</td>
                                        </tr>
                                        <tr>
                                            <td>Vendredi</td><td>7h : 30  &nbsp;A&nbsp;  18h : 00</td>
                                        </tr>
                                        <tr>
                                            <td>Samedi</td><td>7h : 30  &nbsp;A&nbsp;  18h : 00</td>
                                        </tr>
                                        <tr>
                                            <td>Dimanche</td><td>7h : 30  &nbsp;A&nbsp;  14h : 00</td>
                                        </tr>
                                    </table>
                                 </div>
                            </div>
                        </div>

                    <div class="col-lg-2">
                        
                    </div>

                    <div class="col-lg-5 py-5">
                         <div class="card">
                             <div class="card-header">
                                 <div class="row">
                                     <div class="col-12">
                                         <h4 class="text-bluesky text-center">Infos contacts et adreses</h4>
                                      </div>
                                 </div>
                             </div>
                             <div class="card-body">
                                <form>
                                     <div class="Information py-3 ">
                                            <label  class="text-center "><b>Phone: </b> +226 78725050 &nbsp; /&nbsp; +226 73725050</label>
                                      </div>
                                      <div class="Information py-3 ">
                                       <span class="text-center"><b>Email: </b> pouloumdealassanek@gmail.com</span>
                                      </div>
                                       <div class="Information py-3 ">
                                            <span class="text-center"><b> Situation Geographique: </b> La Quincaillerie est situé just face à face avec la nouvelle gare rourière de Koudougou devant les feux tricolores</span>
                                      </div> 
                                       <div class="Information py-3 ">
                                            <span class="text-center"><b>Ville et Secteur : </b>Secteur 3 de Koudougou</span>
                                      </div>
                                       <div class="Information ">
                                            <span class="text-center"><b>Route : </b>Nationale 21</span>
                                      </div>        
                                </form>
                            </div>
                        </div>
                    </div>                        
                </div>

                <hr class="bg-info">
                 
                         <div class="row">

                           <div class="col-lg-3 py-3">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <a class="btn btn-dark" data-toggle="modal" data-target="#new_department" role="button">Nous contacter par message</a>
                                            <div class="input-group-append">
                                                 <span class="input-group-text fab fa-facebook-messenger"></span>
                                            </div>
                                       </div>
                                    </div> 
                                </div>
        
                                <!-- Create New Field -->
                                <div class="modal fade" id="new_department" data-backdrop="static" data-keyboard="false" role="dialog" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                        <h5 class="modal-title text-bluesky">Envoyer un message</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="loads()">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                            <div class="modal-body">
                                               <div class="col-12 text-center" id="text"></div>
                                                <form action="#" method="post" id="depart" class="my-3">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <label for="filiere">Auteur<span class="text-danger"> * </span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="auteur_name" id="auteur_name" placeholder="Entre votre nom" oninput="EnableDecimal(this)" required>

                                                                <div class="input-group-append">
                                                                    <span class=" input-group-text fas fa-university"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <label for="motif">Email<span class="text-danger"> * </span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="add_email" id="add_email" placeholder="Entrez votre Email" oninput="EnableDecimal(this)" required>
                                                            
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text fas fa-envelope"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
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
                                                            <input class="btn btn-primary w-50" type="button" name="submit_message" id="submit_message" value="Ajouter un message" onclick="addmessage()" disabled > 
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- End Create New Field -->
           
                           </div> 
                          
                            <div class="col-lg-3">
                               <div class="card-body">
                                  <div class="input-group">
                                    <a href="mailto:boukary757@gmail.com" class="btn btn-dark"> Contacter nous par mail </a>
                                    <div class="input-group-append">
                                        <span class="input-group-text fas fa-envelope"></span>
                                    </div>
                                  </div>
                               </div>
                           </div>

                            <div class="col-lg-3">
                               <div class="card-body">
                                 <div class="input-group">
                                    <a href="contacts.php" class="btn btn-dark"> Suivez nous sur Facebook </a>
                                    <div class="input-group-append">
                                        <span class="input-group-text fab fa-facebook"></span>
                                    </div>
                               </div>
                            </div>
                           </div>

                            <div class="col-lg-3">
                               <div class="card-body">
                                 <div class="input-group">
                                    <a href="https://wa.me/+22670340602" target="_blank" class="btn btn-dark"> Suivez nous sur whatApp </a>
                                    <div class="input-group-append">
                                        <span class="input-group-text fab fa-whatsapp"></span>
                                    </div>
                               </div>
                            </div>
                           </div>
                         </div>        

               <hr class="bg-info">

                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1 class="text-center">Infos Map</h1>
                        <div class="mapouter col-lg-12">
                            <div class="gmap_canvas"><iframe width="60%" height="80%" id="gmap_canvas" src="https://maps.google.com/maps?q=gare%20routiere%20koudougou&t=k&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><br><b class="txt">Quincailerie Wend Pouloum Noog Be Ziir</b><a href="https://www.pureblack.de"><b class="re"> &nbsp;"Regarder sur le Map"</b></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

  <script type="text/javascript">

    var inputs_remplis = [];
    var btn = document.getElementById("submit_message");
    
    function addmessage(){

        $.post(
        'ajax.php', {
            submit_mess:$("#submit_message").val(),
            messages:$("#message").val(),
           nom:$("#auteur_name").val(),
           add_email:$("#add_email").val(),
            motifs:$("#motif").val(),
        }, function (donnees){
            if(donnees==1)
            {alert(donnees);
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
  

    function EnableDecimal(val1){
        if(val1.id=="auteur_name" ||val1.id=="add_email" || val1.id=="motif" || val1.id=="message" || val1.id=="up_msgs" || val1.id=="up_aut_name" || val1.id=="up_msg"){
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
        if (inputs_remplis.length == 4)
        {
            btn.disabled = false;
        }
        else
        {
            btn.disabled = true;
        }
    }   
    
    
    function loads(){
         window.location.replace("contact.php");
    }
</script>
<?php include'footer.php';?>
