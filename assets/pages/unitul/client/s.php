<?php
    include('head.php');
   
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow wow fadeInUp">

                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-3 mt-3 text-primary h5">Classe name: <span class="text-danger h6" id="get_classe">cs21</span>
                        </div>
                        
                        <div class="col">
                            <form  action="" method="post">
                                <div class="row">
                                <div class="col">
                                        <div class="form-input">
                                            <select  name="classe_mark" id="classe_mark" class="form-control">
                                                <option value="" disabled selected>Select Class</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-input">
                                            <select   disabled name="modulus" id="modulus" class="form-control" >
                                                <option value="">Select Modulus</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <th>Matricule</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Administration Mark</th>
                            <th>Sanction</th>
                        </thead>

                        <tbody id="student_information">
                                    <tr> 
                                    <td>matricule</td>
                                    <td data-name="PRENOM" class="PRENOM" data-type="text" data-pk="matricule">prenom</td>
                                    <td data-name="NOM" class="NOM" data-type="text" data-pk="matricule">Nom</td>
                                    <td data-name="NOTE_ADMINISTRATION" class="NOTE_ADMINISTRATION" data-type="number" data-pk="matricule">not admin</td>
                                    <td data-name="SANCTION" class="SANCTION" data-type="number" data-pk="matricule">sanction</td>
                                </tr>
                        </tbody>

                        <tfoot>
                            <th>Matricule</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Administration Mark</th>
                            <th>Sanction</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include('footer.php');
?>
