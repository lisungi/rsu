<div class="container-fluid flex-grow-1 container-p-y">

            <h4 class="font-weight-bold">
                <span class="text-muted font-weight-light">Groupe /</span> Utilisateurs
            </h4>
            <h5>
<span class="font-weight-light">
Ajouter un nouveau groupe d'utilisateurs RSU
</span>
</h5>

<div class="row">
  <div class="col-md" style="padding-right: 0 !important; padding-left: 0 !important;">
  <div class ='alert alert-dark-danger alert-dismissible fade show d-none'><button type = 'button' class ='close' data-dismiss = 'alert' > × </button> test
  </div>
                <div class="card mb-4" >
                  <h4 class="card-header">Nouveau groupe</h4>
                  <div class="card-body">
                    <form action="<?= BIN."Group"; ?>" method="POST">
                        <div class="form-group row">
                        <label class="form-label">Nom</label>
                        <input type="text" class="form-control mb-1" value="nmaxwell" name="ugroup">
                        <small class="">Nom du groupe</small>
                        </div>
                     
                        <div class="form-group row">
                         <label class="form-label">Description</label>
                        <textarea class="form-control mb-1" placeholder="Textarea" name="descgroup"></textarea>
                        <small class="">La description n’est pas très utilisée par défaut.</small>
                        </div>

                        <div class="table-responsive row">
                    <table class="table card-table m-0">
                      <tbody>
                        <tr>
                          <th> Accès aux modules</th>
                          <th><?= ucfirst(e('read')); ?></th>
                          <th><?= ucfirst(e('write')); ?></th>
                          <th><?= ucfirst(e('execute')); ?></th>
                        </tr>
                  
                        <?php 
                        $count = 0;
                        foreach (GetModulePerm() as $item) {; ?>
                              <tr>
                                <td class="sorting_<?= $count++; ?>">
                                  <?= $item['name']; ?>
                                </td>

                                <?php if ($item['permissions']['permission'] == "r") {?>
                                <td>
                                  <label class="custom-control custom-checkbox px-2 m-0">
                                    <input type="checkbox" class="custom-control-input" checked="" name="<?php echo $item['name']; ?>-lecture">
                                    <span class="custom-control-label"></span>
                                  </label>
                                </td>
                                <td>
                                  <label class="custom-control custom-checkbox px-2 m-0">
                                    <input type="checkbox" class="custom-control-input" name="<?php echo $item['name']; ?>-ecriture">
                                    <span class="custom-control-label"></span>
                                  </label>
                                </td>
                                <td>
                                  <label class="custom-control custom-checkbox px-2 m-0">
                                    <input type="checkbox" class="custom-control-input" name="<?php echo $item['name']; ?>-execution">
                                    <span class="custom-control-label"></span>
                                  </label>
                                </td>

                                <?php }  else if ($item['permissions']['permission'] == "w") { ?>
                                <td>
                                  <label class="custom-control custom-checkbox px-2 m-0">
                                    <input type="checkbox" class="custom-control-input" name="<?php echo $item['name']; ?>-lecture">
                                    <span class="custom-control-label"></span>
                                  </label>
                                </td>
                                <td>
                                  <label class="custom-control custom-checkbox px-2 m-0">
                                    <input type="checkbox" class="custom-control-input" checked="" name="<?php echo $item['name']; ?>-ecriture">
                                    <span class="custom-control-label"></span>
                                  </label>
                                </td>
                                <td>
                                  <label class="custom-control custom-checkbox px-2 m-0">
                                    <input type="checkbox" class="custom-control-input" name="<?php echo $item['name']; ?>-execution">>
                                    <span class="custom-control-label"></span>
                                  </label>
                                </td>

                                <?php } else if ($item['permissions']['permission'] == "rw") { ?>
                                <td>
                                  <label class="custom-control custom-checkbox px-2 m-0">
                                    <input type="checkbox" class="custom-control-input" checked="" name="<?php echo $item['name']; ?>-lecture">
                                    <span class="custom-control-label"></span>
                                  </label>
                                </td>
                                <td>
                                  <label class="custom-control custom-checkbox px-2 m-0">
                                    <input type="checkbox" class="custom-control-input" checked="" name="<?php echo $item['name']; ?>-ecriture">
                                    <span class="custom-control-label"></span>
                                  </label>
                                </td>
                                <td>
                                  <label class="custom-control custom-checkbox px-2 m-0">
                                    <input type="checkbox" class="custom-control-input" name="<?php echo $item['name']; ?>-execution">
                                    <span class="custom-control-label"></span>
                                  </label>
                                </td>

                                <?php } else if ($item['permissions']['permission'] == "rwx") { ?>
                                <td>
                                  <label class="custom-control custom-checkbox px-2 m-0">
                                    <input type="checkbox" class="custom-control-input" checked="" name="<?php echo $item['name']; ?>-lecture">
                                    <span class="custom-control-label"></span>
                                  </label>
                                </td>
                                <td>
                                  <label class="custom-control custom-checkbox px-2 m-0">
                                    <input type="checkbox" class="custom-control-input" checked="" name="<?php echo $item['name']; ?>-ecriture">
                                    <span class="custom-control-label"></span>
                                  </label>
                                </td>
                                <td>
                                  <label class="custom-control custom-checkbox px-2 m-0">
                                    <input type="checkbox" class="custom-control-input" checked="" name="<?php echo $item['name']; ?>-execution">>
                                    <span class="custom-control-label"></span>
                                  </label>
                                </td>

                                <?php }; ?>
                              </tr>
                          <?php }; ?>

                        <tr class="d-none">
                        <td class="sorting_1">
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
                  <input type="submit" class="btn btn-primary" value="Ajouter" name="submitGroup"/>
                  </form>
                    
                  </div>
                </div>

              </div>

              <div class="col">

                <!-- Project details -->
                <div class="card mb-4">
                <div class="card">
              <div class="card-datatable table-responsive">
                <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length d-none" id="DataTables_Table_1_length">
                            <label>Show <select name="DataTables_Table_1_length" aria-controls="DataTables_Table_1" class="form-control form-control-sm">
                                <option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="DataTables_Table_1_filter" class="dataTables_filter">
                                <label><?= e('search'); ?>:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_1"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="datatables-demo table table-striped table-bordered dataTable no-footer" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
                  <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 150px;">
                        Nom</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 202px;">
                        Description</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 183px;">
                        Nombre d'utilisateurs</th>
                  </thead>
                  <tbody>
                  <?php $count = 0;
                        foreach (GetAllGroups() as $item) {; ?>
                         <tr class="gradeA odd" role="row">
                      <td class="sorting_<?php echo $count; ?>"> <?= $item['name']; ?></td>
                      <td> <?= $item['description']; ?></td>
                      <td>A definir</td>
                       </tr>
                        <?php } ?>
                </tbody>
                </table></div></div>
                <div class="row"><div class="col-sm-12 col-md-5">
                    <div class="dataTables_info d-none" id="DataTables_Table_1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_1_previous"><a href="#" aria-controls="DataTables_Table_1" data-dt-idx="0" tabindex="0" class="page-link"><?= e('previous'); ?></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li></ul></div></div></div></div>
              </div>
            </div>
                </div>
                <!-- / Project details -->
                

              </div>
            </div>



 </div>