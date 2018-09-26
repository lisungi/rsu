
<div class="container-fluid flex-grow-1 container-p-y">

            <h4 class="font-weight-bold">
                <span class="text-muted font-weight-light">Module /</span> RSU
            </h4>
            <h5>
<span class="font-weight-light">
Ajouter un nouveau module RSU
</span>
</h5>

<div class="row">
  <div class="col-md" style="padding-right: 0 !important; padding-left: 0 !important;">
                <div class=" mb-4">
                <div class ='alert alert-dark-danger alert-dismissible fade show d-none'>
                  <button type = 'button' class ='close' data-dismiss = 'alert' > × </button>  Test
                </div>
                </div>
                <div class="card mb-4" >
                  <h4 class="card-header">Nouveau module</h4>
                  <div class="card-body">
                    <form action="<?= BIN."Module"; ?>" method="POST">
                        <div class="form-group row">
                        <label class="form-label">Nom</label>
                        <input type="text" class="form-control mb-1" value="" placeholder="Entre le nom de groupe ici" name="uMod">
                        <small class="">Nom du module</small>
                        </div>

                  <input type="submit" class="btn btn-primary" value="Ajouter" name="submitMod"/>
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
                              <option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div>
                              <div class="col-sm-12 col-md-6"><div id="DataTables_Table_1_filter" class="dataTables_filter d-none">
                                <label>
                                  <?= e('search'); ?>:
                                  <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_1"></label>
                                </div>
                            </div></div><div class="row"><div class="col-sm-12"><table class="datatables-demo table table-striped table-bordered dataTable no-footer" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
                  <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 150px;">
                        Modules RSU</th>
                      <th class="sorting d-none" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 202px;">
                        Description</th>
                      <th class="sorting d-none" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 183px;">
                        Nombre d'utilisateurs</th>
                  </thead>
                  <tbody>
                  <?php $count = 0;
                      foreach (GetModulePerm() as $item) {; 
                      $mo = explode('-', $item); ?>
                          <tr class="gradeA odd" role="row">
                          <td class="sorting_<?php echo $count; ?>"> 
                                Module <?= $mo[0]; ?></td>
                          </tr>
                  <?php }  ?>
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
