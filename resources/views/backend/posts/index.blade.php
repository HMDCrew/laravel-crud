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
                    <a href="{{ route('posts.create') }}" class="btn bg-gradient-primary btn-sm mb-0" target="_blank">+&nbsp; New Post</a>
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
                          <!-- <tr>
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
                          </tr> -->

                          @foreach ($posts as $post)
                           <tr>
                              <td>
                                 <div class="d-flex">
                                    <img class="w-10 ms-3" src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/ecommerce/adidas-hoodie.jpg" alt="hoodie">
                                    <h6 class="ms-3 my-auto">{{ $post->title }}</h6>
                                 </div>
                              </td>
                              <td class="text-sm"></td>
                              <td class="text-sm">
                                 <a href="{{ route('front', $post->slug) }}" data-bs-toggle="tooltip" data-bs-original-title="Preview product">
                                       <i class="material-icons text-secondary position-relative text-lg">visibility</i>
                                 </a>
                                 <a href="{{ route('posts.edit', $post->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit post">
                                       <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
                                 </a>

                                 <form class="d-inline" action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
                                       <i class="material-icons text-secondary position-relative text-lg">delete</i>
                                    </button>
                                 </form>
                              </td>
                           </tr>
                          @endforeach
                       </tbody>
                    </table>
                 </div>
                 <!-- <div class="dataTable-bottom">
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
                 </div> -->
              </div>
           </div>
        </div>
    </div>
     
</x-app-layout>