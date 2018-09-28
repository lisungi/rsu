<?php var_dump(CreateTreeView('table', 'id', 'type', 'parent_id'));
?>
<div class="row">
    <div class ="col-12" >

    <div class ="card bg-white text-white mb-3" >
        <div class ="card-header">
            <h4 class="text-dark">
                Gestion des lieux
            </h4>    
        </div>
        <div class =" d-flex justify-content-center">
            <div class="w-50  border-right h-100 p-4 d-flex flex-column">
                <h4 class ="card-title text-dark" > Entrer un lieu</h4>
                <p class ="card-text text-dark d-none" > Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <form method="" action="<?= BIN; ?>locations">

                <div class="form-group row card-text">
                    <div class="col-md">
                        <label class="form-label text-dark">Lieu :</label>
                        <input type="text" class="form-control mb-2" value="" placeholder="Entre le lieu " name="ulieu">
                        <!-- Lieu -->

                        <div class="form-group col-md-4" style="padding-left: 0px !important;">
                        <label class="form-label text-dark">Abbrievation :</label>
                        <input type="text" class="form-control mb-2" value="" placeholder="Abbrievation" name="uabbr">
                        <small class="form-text text-muted">Abbrievation  officielle du Lieu</small>
                        </div><!-- Abbrievation -->

                        <div class="form-row">
                            <div class="form-group col-md-5" style="padding-left: 0px !important;">
                                <label class="form-label text-dark ">Type :</label>
                                <select class="custom-select">
                                    <option> Département</option>
                                    <option>District</option>
                                    <option>Region</option>
                                </select>
                            </div><!-- Type -->

                            <div class="form-group col-md-5" style="padding-left: 0px !important;">
                                <label class="form-label text-dark font-italic">Parent :</label>
                                <select class="custom-select">
                                    <option> Département</option>
                                    <option>District</option>
                                    <option>Region</option>
                                </select>
                            </div><!-- Parent -->
                    
                        </div><!-- form row -->
                        
                        <div class="form-group col-md-5" style="padding-left: 0px !important;">
                        <label class="form-label text-dark">Code MID :</label>
                        <input type="text" class="form-control mb-2" value="" placeholder="Code MID" name="umid">
                        <small class="form-text text-muted">Code du Ministère de l'Interieur</small>
                        </div><!-- Code MID -->

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <label class="col-form-label col-sm- text-dark">Observations :</label>
                                <textarea class="form-control" placeholder="Lat & long"></textarea>
                            </div>
                        </div> <!-- Observations -->

                        <p class="text-dark ui-block-heading">Affilier une position dans la carte social :</p>
                        <div class="form-group col-md-5" style="padding-left: 0px !important;">
                        <label class="form-label text-dark">Carte sociale</label>
                            <select class="custom-select">
                                    <option> DDAS</option>
                                    <option>CAS</option>
                                    <option>SAS</option>
                                    <option>Aucun</option>
                            </select>
                        <small class="form-text text-muted">Code du MASAH</small>
                        </div> <!-- Code MASAH -->

                        <button type="submit" class="btn btn-primary">Ajouter un lieu</button>
                    </div>
                    
                </div>
                </form><!-- Locations form -->
            </div>
                <div class="w-50  border-right h-100 p-4">
                    here we are
                </div>

        </div>
    </div>
    </div>
</div>