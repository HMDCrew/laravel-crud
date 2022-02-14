@section('title') {{'Posts'}} @endsection

<x-app-layout>
    <div class="card">
        <!-- Card header -->
        <div class="card-header pb-0">
           <div class="d-lg-flex">
              <div>
                 <h5 class="mb-0">All Posts</h5>
              </div>
              <div class="ms-auto my-auto mt-lg-0 mt-4">
                 <div class="ms-auto my-auto">
                    <a href="#" class="btn bg-gradient-primary btn-sm mb-0" target="_blank">+&nbsp; New Product</a>
                    <button type="button" class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#import">Import</button>
                    <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
                       <div class="modal-dialog mt-lg-10">
                          <div class="modal-content">
                             <div class="modal-header">
                                <h5 class="modal-title" id="ModalLabel">Import CSV</h5>
                                <i class="material-icons ms-3">file_upload</i>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                             </div>
                             <div class="modal-body">
                                <p>You can browse your computer for a file.</p>
                                <div class="input-group input-group-dynamic mb-3">
                                   <label class="form-label">Browse file...</label>
                                   <input type="email" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                                </div>
                                <div class="form-check is-filled">
                                   <input class="form-check-input" type="checkbox" value="" id="importCheck" checked="">
                                   <label class="custom-control-label" for="importCheck">I accept the terms and conditions</label>
                                </div>
                             </div>
                             <div class="modal-footer">
                                <button type="button" class="btn bg-gradient-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn bg-gradient-primary btn-sm">Upload</button>
                             </div>
                          </div>
                       </div>
                    </div>
                    <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Export</button>
                 </div>
              </div>
           </div>
        </div>
        <div class="card-body px-0 pb-0">
           <div class="table-responsive">
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                 <div class="dataTable-top">
                    <div class="dataTable-dropdown">
                       <label>
                          <select class="dataTable-selector">
                             <option value="5">5</option>
                             <option value="10">10</option>
                             <option value="15">15</option>
                             <option value="20">20</option>
                             <option value="25">25</option>
                          </select>
                          entries per page
                       </label>
                    </div>
                    <div class="dataTable-search"><input class="dataTable-input" placeholder="Search..." type="text"></div>
                 </div>
                 <div class="dataTable-container">
                    <table class="table table-flush dataTable-table" id="products-list">
                       <thead class="thead-light">
                          <tr>
                             <th data-sortable="" style="width: 62.2102%;"><a href="#" class="dataTable-sorter">Posts</a></th>
                             <th data-sortable="" style="width: 6.30728%;"><a href="#" class="dataTable-sorter">Category</a></th>
                             <th data-sortable="" style="width: 7.60108%;"><a href="#" class="dataTable-sorter">Action</a></th>
                          </tr>
                       </thead>
                       <tbody>
                          <tr>
                             <td>
                                <div class="d-flex">
                                   <img class="w-10 ms-3" src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/ecommerce/adidas-hoodie.jpg" alt="hoodie">
                                   <h6 class="ms-3 my-auto">BKLGO Full Zip Hoodie</h6>
                                </div>
                             </td>
                             <td class="text-sm">Clothing</td>
                             <td class="text-sm">
                                <a href="javascript:;" data-bs-toggle="tooltip" data-bs-original-title="Preview product">
                                    <i class="material-icons text-secondary position-relative text-lg">visibility</i>
                                </a>
                                <a href="javascript:;" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                    <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
                                </a>
                                <a href="javascript:;" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
                                    <i class="material-icons text-secondary position-relative text-lg">delete</i>
                                </a>
                             </td>
                          </tr>
                       </tbody>
                    </table>
                 </div>
                 <div class="dataTable-bottom">
                    <div class="dataTable-info">Showing 1 to 7 of 15 entries</div>
                    <nav class="dataTable-pagination">
                       <ul class="dataTable-pagination-list">
                          <li class="pager"><a href="#" data-page="1">‹</a></li>
                          <li class="active"><a href="#" data-page="1">1</a></li>
                          <li class=""><a href="#" data-page="2">2</a></li>
                          <li class=""><a href="#" data-page="3">3</a></li>
                          <li class="pager"><a href="#" data-page="2">›</a></li>
                       </ul>
                    </nav>
                 </div>
              </div>
           </div>
        </div>
    </div>
     
</x-app-layout>