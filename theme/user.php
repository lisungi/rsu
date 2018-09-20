<div class="container-fluid flex-grow-1 container-p-y">

<h4 class="font-weight-bold">
<span class="text-muted font-weight-light">RSU /</span> Utilisateurs
            </h4>
            <h5>
<span class="font-weight-light">
Tous les utilisateurs du système RSU
</span>
            </h5>
            <!-- Filters -->
            <div class="ui-bordered px-4 pt-4 mb-4">
              <div class="form-row align-items-center">
                <div class="col-md mb-4">
                  <label class="form-label">Verified</label>
                  <select class="custom-select">
                    <option>Any</option>
                    <option>Yes</option>
                    <option>No</option>
                  </select>
                </div>
                <div class="col-md mb-4">
                  <label class="form-label">Role</label>
                  <select class="custom-select">
                    <option>Any</option>
                    <option>User</option>
                    <option>Author</option>
                    <option>Staff</option>
                    <option>Admin</option>
                  </select>
                </div>
                <div class="col-md mb-4">
                  <label class="form-label">Status</label>
                  <select class="custom-select">
                    <option>Any</option>
                    <option>Active</option>
                    <option>Banned</option>
                    <option>Deleted</option>
                  </select>
                </div>
                <div class="col-md mb-4">
                  <label class="form-label">Latest activity</label>
                  <input type="text" id="user-list-latest-activity" class="form-control" placeholder="Any">
                </div>
                <div class="col-md col-xl-2 mb-4">
                  <label class="form-label d-none d-md-block">&nbsp;</label>
                  <button type="button" class="btn btn-secondary btn-block"><?= e('show'); ?></button>
                </div>
              </div>
            </div>
            <!-- / Filters -->

            <div class="card">
              <div class="card-datatable table-responsive">
                <div id="user-list_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="user-list_length"><label><?= e('show'); ?> <select name="user-list_length" aria-controls="user-list" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="user-list_filter" class="dataTables_filter"><label><?= e('search'); ?>:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="user-list"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="user-list" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="user-list_info" style="width: 964px;">
                  <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="user-list" rowspan="1" colspan="1" style="width: 15px;" aria-label="ID: activate to sort column descending" aria-sort="ascending">
                        ID
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="user-list" rowspan="1" colspan="1" style="width: 56px;" aria-label="Account: activate to sort column ascending">
                    Username
                </th>
                <th class="sorting" tabindex="0" aria-controls="user-list" rowspan="1" colspan="1" style="width: 129px;" aria-label="E-mail: activate to sort column ascending">
                E-mail
            </th>
            <th class="sorting" tabindex="0" aria-controls="user-list" rowspan="1" colspan="1" style="width: 110px;" aria-label="Name: activate to sort column ascending">
            Nom
        </th>
        <th class="sorting" tabindex="0" aria-controls="user-list" rowspan="1" colspan="1" style="width: 96px;" aria-label="Latest activity: activate to sort column ascending">
        Dernière connexion
    </th>
    <th class="sorting" tabindex="0" aria-controls="user-list" rowspan="1" colspan="1" style="width: 53px;" aria-label="Verified: activate to sort column ascending">
    Verified
</th>
<th class="sorting" tabindex="0" aria-controls="user-list" rowspan="1" colspan="1" style="width: 31px;" aria-label="Role: activate to sort column ascending">
Rôle
</th>
<th class="sorting" tabindex="0" aria-controls="user-list" rowspan="1" colspan="1" style="width: 46px;" aria-label="Status: activate to sort column ascending">
Status
</th>
<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 52px;"></th></tr>
                  </thead>
                <tbody>
                  
                  <?php $cat = GetUsers(); for ($a = 0; $a <= count($cat) - 1; $a++) { ?>
                    <tr role="row" class="odd">
                                      <td class="sorting_1">
                                        <?= $cat[$a]['id']; ?> 
                                      </td>
                    <td>
                      <a href="javascript:void(0)">
                        <?= $cat[$a]['username']; ?> 
                      </a>
                    </td>
                    <td>
                      <?= $cat[$a]['email']; ?> 
                    </td>
                    <td>
                      <?= $cat[$a]['noms']; ?> 
                    </td>
                    <td>
                      <?= $cat[$a]['loginTime']; ?> 
                    </td>
                    <td>
                      <span class="ion ion-md-close text-light"></span>
                    </td>
                    <td>
                      <?= $cat[$a]['user_group']; ?> 
                    </td>
                    <td>
                      <span class="badge badge-outline-success">
                        <?= $cat[$a]['est_actif']; ?> 
                      </span>
                    </td>
                    <td class="text-center text-nowrap">

                      <button type="button" class="btn btn-default btn-xs icon-btn md-btn-flat user-tooltip" title="" data-original-title="Edit"><i class="ion ion-md-create"></i></button>&nbsp;&nbsp;<div class="btn-group"><button type="button" class="btn btn-default btn-xs icon-btn md-btn-flat dropdown-toggle hide-arrow user-tooltip" title="" data-toggle="dropdown" data-original-title="Actions" aria-expanded="false"><i class="ion ion-ios-settings"></i></button><div class="dropdown-menu dropdown-menu-right" x-placement="top-end" style="position: absolute; will-change: top, left; top: -4px; left: 20px;"><a class="dropdown-item" href="javascript:void(0)">View profile</a><a class="dropdown-item" href="javascript:void(0)">Ban user</a><a class="dropdown-item" href="javascript:void(0)">Remove</a></div></div>
                    </td>
                  </tr>
                  <?php } ?>
              
              </tbody></table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="user-list_info" role="status" aria-live="polite">Showing 1 to 10 of 50 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="user-list_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="user-list_previous"><a href="#" aria-controls="user-list" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="user-list" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="user-list" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="user-list" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="user-list" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="user-list" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item next" id="user-list_next"><a href="#" aria-controls="user-list" data-dt-idx="6" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
              </div>
            </div>

          </div>