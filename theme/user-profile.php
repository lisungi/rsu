<div class="container-fluid flex-grow-1 container-p-y">

            <h4 class="font-weight-bold">
                  <span class="text-muted font-weight-light">Profil /</span>Utilisateur
            </h4>
            <h5>
              <span class="font-weight-light">
              Edition profil.
              </span>
            </h5>

            <div class="nav-tabs-top">
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active show" data-toggle="tab" href="#user-edit-account"><?= e('account'); ?></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#user-edit-info"><?= e('informations'); ?></a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade active show" id="user-edit-account">

                  <div class="card-body pb-2">

                    <div class="form-group">
                      <label class="form-label"><?= e('username'); ?></label>
                      <input type="text" class="form-control mb-1" value="nmaxwell">
                      <a href="javascript:void(0)" class="small">Reset password</a>
                    </div>
                    <div class="form-group">
                      <label class="form-label"><?= e('name'); ?></label>
                      <input type="text" class="form-control" value="Nelle Maxwell">
                    </div>
                    <div class="form-group">
                      <label class="form-label">E-mail</label>
                      <input type="text" class="form-control mb-1" value="nmaxwell@mail.com">
                      <a href="javascript:void(0)" class="small">Resend confirmation</a>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Company</label>
                      <input type="text" class="form-control" value="Company Ltd.">
                    </div>

                  </div>
                  <hr class="border-light m-0">
                  <div class="card-body pb-2">

                    <div class="form-group">
                      <label class="form-label">Role</label>
                      <select class="custom-select">
                        <option selected="">User</option>
                        <option>Author</option>
                        <option>Staff</option>
                        <option>Admin</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Status</label>
                      <select class="custom-select">
                        <option selected="">Active</option>
                        <option>Banned</option>
                        <option>Deleted</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="custom-control custom-checkbox m-0">
                        <input type="checkbox" class="custom-control-input" checked="">
                        <span class="custom-control-label">Verified</span>
                      </label>
                    </div>

                  </div>
                  <hr class="border-light m-0">
                  <div class="table-responsive">
                    <table class="table card-table m-0">
                      <tbody>
                        <tr>
                          <th>Module Permission</th>
                          <th>Read</th>
                          <th>Write</th>
                          <th>Create</th>
                          <th>Delete</th>
                        </tr>
                        <tr>
                          <td>Users</td>
                          <td>
                            <label class="custom-control custom-checkbox px-2 m-0">
                              <input type="checkbox" class="custom-control-input" checked="">
                              <span class="custom-control-label"></span>
                            </label>
                          </td>
                          <td>
                            <label class="custom-control custom-checkbox px-2 m-0">
                              <input type="checkbox" class="custom-control-input">
                              <span class="custom-control-label"></span>
                            </label>
                          </td>
                          <td>
                            <label class="custom-control custom-checkbox px-2 m-0">
                              <input type="checkbox" class="custom-control-input">
                              <span class="custom-control-label"></span>
                            </label>
                          </td>
                          <td>
                            <label class="custom-control custom-checkbox px-2 m-0">
                              <input type="checkbox" class="custom-control-input">
                              <span class="custom-control-label"></span>
                            </label>
                          </td>
                        </tr>
                        <tr>
                          <td>Articles</td>
                          <td>
                            <label class="custom-control custom-checkbox px-2 m-0">
                              <input type="checkbox" class="custom-control-input" checked="">
                              <span class="custom-control-label"></span>
                            </label>
                          </td>
                          <td>
                            <label class="custom-control custom-checkbox px-2 m-0">
                              <input type="checkbox" class="custom-control-input" checked="">
                              <span class="custom-control-label"></span>
                            </label>
                          </td>
                          <td>
                            <label class="custom-control custom-checkbox px-2 m-0">
                              <input type="checkbox" class="custom-control-input" checked="">
                              <span class="custom-control-label"></span>
                            </label>
                          </td>
                          <td>
                            <label class="custom-control custom-checkbox px-2 m-0">
                              <input type="checkbox" class="custom-control-input">
                              <span class="custom-control-label"></span>
                            </label>
                          </td>
                        </tr>
                        <tr>
                          <td>Staff</td>
                          <td>
                            <label class="custom-control custom-checkbox px-2 m-0">
                              <input type="checkbox" class="custom-control-input">
                              <span class="custom-control-label"></span>
                            </label>
                          </td>
                          <td>
                            <label class="custom-control custom-checkbox px-2 m-0">
                              <input type="checkbox" class="custom-control-input">
                              <span class="custom-control-label"></span>
                            </label>
                          </td>
                          <td>
                            <label class="custom-control custom-checkbox px-2 m-0">
                              <input type="checkbox" class="custom-control-input">
                              <span class="custom-control-label"></span>
                            </label>
                          </td>
                          <td>
                            <label class="custom-control custom-checkbox px-2 m-0">
                              <input type="checkbox" class="custom-control-input">
                              <span class="custom-control-label"></span>
                            </label>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                </div>
                <div class="tab-pane fade" id="user-edit-info">

                  <div class="card-body">

                    <div class="media align-items-center">
                      <img src="<?= ASSETS; ?>_/img/avatars/5-small.png" alt="" class="d-block ui-w-80">
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
                        <option selected="">Canada</option>
                        <option>UK</option>
                        <option>Germany</option>
                        <option>France</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Languages</label>
                      <div class="position-relative"><select multiple="" class="user-edit-multiselect form-control w-100 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        <option selected="" data-select2-id="3">English</option>
                        <option>German</option>
                        <option>French</option>
                      </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: 100px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-selection__choice" title="English" data-select2-id="4"><span class="select2-selection__choice__remove" role="presentation">×</span>English</li><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
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
                      <div class="bootstrap-tagsinput"><div style="position:absolute;width:0;height:0;z-index:-100;opacity:0;overflow:hidden;"><div class="bootstrap-tagsinput-input" style="position:absolute;z-index:-101;top:-9999px;opacity:0;white-space:nowrap;"></div></div><span class="tag badge badge-default">Rock<span data-role="remove"></span></span> <span class="tag badge badge-default">Alternative<span data-role="remove"></span></span> <span class="tag badge badge-default">Electro<span data-role="remove"></span></span> <span class="tag badge badge-default">Drum &amp; Bass<span data-role="remove"></span></span> <span class="tag badge badge-default">Dance<span data-role="remove"></span></span> <input type="text" placeholder="" style="width: 12px;"></div><input type="text" class="form-control user-edit-tagsinput" value="Rock,Alternative,Electro,Drum &amp; Bass,Dance" style="display: none;">
                    </div>
                    <div class="form-group">
                      <label class="form-label">Favorite movies</label>
                      <div class="bootstrap-tagsinput"><div style="position:absolute;width:0;height:0;z-index:-100;opacity:0;overflow:hidden;"><div class="bootstrap-tagsinput-input" style="position:absolute;z-index:-101;top:-9999px;opacity:0;white-space:nowrap;"></div></div><span class="tag badge badge-default">The Green Mile<span data-role="remove"></span></span> <span class="tag badge badge-default">Pulp Fiction<span data-role="remove"></span></span> <span class="tag badge badge-default">Back to the Future<span data-role="remove"></span></span> <span class="tag badge badge-default">WALL·E<span data-role="remove"></span></span> <span class="tag badge badge-default">Django Unchained<span data-role="remove"></span></span> <span class="tag badge badge-default">The Truman Show<span data-role="remove"></span></span> <span class="tag badge badge-default">Home Alone<span data-role="remove"></span></span> <span class="tag badge badge-default">Seven Pounds<span data-role="remove"></span></span> <input type="text" placeholder="" style="width: 12px;"></div><input type="text" class="form-control user-edit-tagsinput" value="The Green Mile,Pulp Fiction,Back to the Future,WALL·E,Django Unchained,The Truman Show,Home Alone,Seven Pounds" style="display: none;">
                    </div>

                  </div>

                </div>
              </div>
            </div>

            <div class="text-right mt-3">
              <button type="button" class="btn btn-primary"><?= e('savechanges'); ?></button>&nbsp;
              <button type="button" class="btn btn-default"><?= e('cancel'); ?></button>
            </div>

          </div>