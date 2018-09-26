
          <!-- Content -->
          <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold">
                  <span class="text-muted font-weight-light">Ajouter /</span>Utilisateur
            </h4>
            <h5>
              <span class="font-weight-light">
              Créer un nouvel utilisateur et l’ajouter au RSU.
              </span>
            </h5>
            <form action="<?= BIN; ?>user" method="POST" >
            <div class="nav-tabs-top">
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link d-none active" data-toggle="tab" href="#user-edit-account">Utilisateur</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link d-none" data-toggle="tab" href="#user-edit-info">Autres Informations</a>
                </li>
              </ul>
        
              <div class="tab-content">
                <div class="tab-pane fade show active" id="user-edit-account">
                  <div class="card-body d-none">

                    <div class="media align-items-center">
                      <img src="/products/appwork/v110/assets_/img/avatars/5-small.png" alt="" class="d-block ui-w-80">
                      <div class="media-body ml-3">
                        <label class="form-label d-block mb-2">Avatar</label>
                        <label class="btn btn-outline-primary btn-sm">
                          Change
                          <input type="file" class="user-edit-fileinput">
                        </label>&nbsp;
                        <button type="button" class="btn btn-default btn-sm md-btn-flat">Reset</button>
                      </div>
                    </div>

                  </div>
                  <hr class="border-light m-0">
                  <div class="card-body pb-2">

                    <div class="form-group">
                      <label class="form-label">Identifiant</label>
                      <input type="text" class="form-control mb-1" value="nmaxwell" name="uname">
                      
                    </div>
                    <div class="form-group">
                      <label class="form-label">Noms</label>
                      <input type="text" class="form-control" value="Nelle Maxwell" name="cname">
                    </div>
                    
                    <div class="form-group">
                      <label class="form-label">E-mail</label>
                      <input type="text" class="form-control mb-1" value="nmaxwell@mail.com" name="umail">
                    </div>
                    
                    <div class="form-group">
                      <label class="form-label">Mot de passe</label>
                      <input type="password" class="form-control" name="upwd">
                    </div>

                  </div>
                  <hr class="border-light m-0">
                  <div class="card-body pb-2">
                    <div class="form-group col-md-4">
                      <label class="form-label">Groupe d'utilisateurs :</label>
                      <select class="custom-select" name="ugroup">
                      <?php if (GetAllGroups()) {?>
                      <?php $count = 0;
                        foreach (GetAllGroups() as $item) {
                            ; ?>
                        <option><?= $item['nom_groupe']; ?></option>
                      <?php } ?>
                      <?php } else { ?>
                          <option>Aucun groupe existant</option>
                      <?php }  ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label class="custom-control custom-checkbox m-0">
                        <input type="checkbox" class="custom-control-input" name="uremind" checked >
                        <span class="custom-control-label"> Envoyer un message au nouvel utilisateur à propos de son compte.</span>
                      </label>
                    </div>


                  </div>
            
                </div>
                <div class="tab-pane fade" id="user-edit-info">

                  <div class="card-body  pb-2">
                    <h6 class="mb-4">Avatar</h6>

                    <div class="media align-items-center">
                      <img src="<?= CDN; ?>/_vendor/img/5-small.png" alt="" class="d-block ui-w-80">
                      <div class="media-body ml-3">
                        <label class="form-label d-block mb-2">Avatar</label>
                        <label class="btn btn-outline-primary btn-sm">
                          Change
                          <input type="file" class="user-edit-fileinput">
                        </label>&nbsp;
                        <button type="button" class="btn btn-default btn-sm md-btn-flat">Reset</button>
                      </div>
                    </div>
                    </div>
                    <hr>
                  <div class="card-body pb-2">

                    <h6 class="mb-4">Social links</h6>
                    <div class="form-group">
                      <label class="form-label">Twitter</label>
                      <input type="text" class="form-control" value="https://twitter.com/user">
                    </div>
                    <div class="form-group">
                      <label class="form-label">Facebook</label>
                      <input type="text" class="form-control" value="https://www.facebook.com/user">
                    </div>
                    <div class="form-group">
                      <label class="form-label">Google+</label>
                      <input type="text" class="form-control" value="">
                    </div>
                    <div class="form-group">
                      <label class="form-label">LinkedIn</label>
                      <input type="text" class="form-control" value="">
                    </div>
                    <div class="form-group">
                      <label class="form-label">Instagram</label>
                      <input type="text" class="form-control" value="https://www.instagram.com/user">
                    </div>

                  </div>
                  <hr class="border-light m-0">
                  <div class="card-body pb-2">

                    <h6 class="mb-4">Personal info</h6>
                    <div class="form-group">
                      <label class="form-label">Birthday</label>
                      <input type="text" class="form-control" value="May 3, 1995">
                    </div>
                    <div class="form-group">
                      <label class="form-label">Country</label>
                      <select class="custom-select">
                        <option>USA</option>
                        <option selected>Canada</option>
                        <option>UK</option>
                        <option>Germany</option>
                        <option>France</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Languages</label>
                      <select multiple class="user-edit-multiselect form-control w-100">
                        <option selected>English</option>
                        <option>German</option>
                        <option>French</option>
                      </select>
                    </div>

                  </div>
                  <hr class="border-light m-0">
                  <div class="card-body pb-2">

                    <h6 class="mb-4">Contacts</h6>
                    <div class="form-group">
                      <label class="form-label">Phone</label>
                      <input type="text" class="form-control" value="+0 (123) 456 7891">
                    </div>
                    <div class="form-group">
                      <label class="form-label">Website</label>
                      <input type="text" class="form-control" value="">
                    </div>

                  </div>
                  <hr class="border-light m-0">
                  <div class="card-body pb-2">

                    <h6 class="mb-4">Interests</h6>
                    <div class="form-group">
                      <label class="form-label">Favorite music</label>
                      <input type="text" class="form-control user-edit-tagsinput" value="Rock,Alternative,Electro,Drum & Bass,Dance">
                    </div>
                    <div class="form-group">
                      <label class="form-label">Favorite movies</label>
                      <input type="text" class="form-control user-edit-tagsinput" value="The Green Mile,Pulp Fiction,Back to the Future,WALL·E,Django Unchained,The Truman Show,Home Alone,Seven Pounds">
                    </div>

                  </div>

                </div>
              </div>
                      
            </div>


            <div class="text-right mt-3">
              <button type="submit" class="btn btn-primary">Ajouter un utilisateur</button>&nbsp;
              <button type="button" class="btn btn-default d-none">Cancel</button>
            </div>
            </form>

          </div>
