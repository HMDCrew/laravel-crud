@section('title') {{'Posts'}} @endsection

<x-app-layout>
    <div class="card">
        <div class="card-body">
          <form method="post" action="{{ route('posts.store') }}">
              @csrf
              <h5 class="font-weight-bolder">Post information</h5>
              <div class="multisteps-form__content">
                <div class="row mt-3">
                  <div class="col-12 col-sm-6">
                    <div class="input-group input-group-dynamic">
                      <label for="exampleFormControlInput1" class="form-label">Title</label>
                      <input class="multisteps-form__input form-control" name="title" id="title" type="text" onfocus="focused(this)" onfocusout="defocused(this)" value="{{ old('title', '') }}">
                      @error('name')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                      @enderror
                    </div>

                    <input class="multisteps-form__input form-control" name="slug" id="slug" type="text" value="{{ old('slug', '') }}" placeholder="slug">
                    @error('slug')
                      <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <label class="mt-4">Description</label>
                    <p class="form-text text-muted text-xs ms-1 d-inline">
                      (optional)
                    </p>
                    <textarea name="post_content" id="post_content" onfocus="focused(this)" onfocusout="defocused(this)">{{ old('post_content', '') }}</textarea>
                    @error('post_content')
                      <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                  </div>
                  <!-- <div class="col-sm-6 mt-sm-3 mt-5">
                    <label class="form-control ms-0">Category</label>
                    <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-control choices__input" name="choices-category" id="choices-category" hidden="" tabindex="-1" data-choice="active"><option value="Choice 1">Clothing</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="Choice 1" data-custom-properties="null" aria-selected="true">Clothing</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div id="choices--choices-category-item-choice-1" class="choices__item choices__item--choice is-selected choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="Choice 1" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Clothing</div><div id="choices--choices-category-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="Choice 3" data-select-text="Press to select" data-choice-selectable="">Electronics</div><div id="choices--choices-category-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="Choice 4" data-select-text="Press to select" data-choice-selectable="">Furniture</div><div id="choices--choices-category-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="Choice 5" data-select-text="Press to select" data-choice-selectable="">Others</div><div id="choices--choices-category-item-choice-5" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="5" data-value="Choice 2" data-select-text="Press to select" data-choice-selectable="">Real Estate</div></div></div></div>
                    <label class="form-control ms-0">Sizes</label>
                    <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-control choices__input" name="choices-sizes" id="choices-sizes" hidden="" tabindex="-1" data-choice="active"><option value="Choice 1">Medium</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="Choice 1" data-custom-properties="null" aria-selected="true">Medium</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div id="choices--choices-sizes-item-choice-1" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="Choice 4" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Extra Large</div><div id="choices--choices-sizes-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="Choice 5" data-select-text="Press to select" data-choice-selectable="">Extra Small</div><div id="choices--choices-sizes-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="Choice 3" data-select-text="Press to select" data-choice-selectable="">Large</div><div id="choices--choices-sizes-item-choice-4" class="choices__item choices__item--choice is-selected choices__item--selectable" role="option" data-choice="" data-id="4" data-value="Choice 1" data-select-text="Press to select" data-choice-selectable="">Medium</div><div id="choices--choices-sizes-item-choice-5" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="5" data-value="Choice 2" data-select-text="Press to select" data-choice-selectable="">Small</div></div></div></div>
                  </div> -->
                </div>
                <!-- <div class="button-row d-flex mt-4">
                  <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                </div> -->
              </div>

              <!-- <h5 class="font-weight-bolder">Media</h5>
              <div class="multisteps-form__content">
                <div class="row mt-3">
                  <div class="col-12">
                    <label class="form-control mb-0">Product images</label>
                    <div action="/file-upload" class="form-control border dropzone dz-clickable" id="productImg"><div class="dz-default dz-message"><button class="dz-button" type="button">Drop files here to upload</button></div></div>
                  </div>
                </div>
                <div class="button-row d-flex mt-4">
                  <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                  <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                </div>
              </div>
             -->
              <!-- <h5 class="font-weight-bolder">Socials</h5>
              <div class="multisteps-form__content">
                <div class="row mt-3">
                  <div class="col-12">
                    <div class="input-group input-group-dynamic">
                      <label class="form-label">Shoppify Handle</label>
                      <input class="multisteps-form__input form-control" type="text" onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                  </div>
                  <div class="col-12 mt-3">
                    <div class="input-group input-group-dynamic">
                      <label class="form-label">Facebook Account</label>
                      <input class="multisteps-form__input form-control" type="text" onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                  </div>
                  <div class="col-12 mt-3">
                    <div class="input-group input-group-dynamic">
                      <label class="form-label">Instagram Account</label>
                      <input class="multisteps-form__input form-control" type="text" onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="button-row d-flex mt-4 col-12">
                    <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                  </div>
                </div>
              </div> -->
              
              <!-- <h5 class="font-weight-bolder">Pricing</h5>
              <div class="multisteps-form__content mt-3">
                <div class="row">
                  <div class="col-3">
                    <div class="input-group input-group-dynamic">
                      <label class="form-label">Price</label>
                      <input type="email" class="form-control w-100" id="exampleInputEmail1" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-control choices__input" name="choices-sizes" id="choices-currency" hidden="" tabindex="-1" data-choice="active"><option value="Choice 1">USD</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="Choice 1" data-custom-properties="null" aria-selected="true">USD</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div id="choices--choices-currency-item-choice-1" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="Choice 6" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">BTC</div><div id="choices--choices-currency-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="Choice 4" data-select-text="Press to select" data-choice-selectable="">CNY</div><div id="choices--choices-currency-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="Choice 2" data-select-text="Press to select" data-choice-selectable="">EUR</div><div id="choices--choices-currency-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="Choice 3" data-select-text="Press to select" data-choice-selectable="">GBP</div><div id="choices--choices-currency-item-choice-5" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="5" data-value="Choice 5" data-select-text="Press to select" data-choice-selectable="">INR</div><div id="choices--choices-currency-item-choice-6" class="choices__item choices__item--choice is-selected choices__item--selectable" role="option" data-choice="" data-id="6" data-value="Choice 1" data-select-text="Press to select" data-choice-selectable="">USD</div></div></div></div>
                  </div>
                  <div class="col-5">
                    <div class="input-group input-group-dynamic">
                      <label class="form-label">SKU</label>
                      <input class="multisteps-form__input form-control" type="text" onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <label class="mt-4 form-label">Tags</label>
                    <div class="choices" data-type="select-multiple" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-control choices__input" name="choices-tags" id="choices-tags" multiple="" hidden="" tabindex="-1" data-choice="active"><option value="Choice 1">In Stock</option><option value="Two">Out of Stock</option></select><div class="choices__list choices__list--multiple"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="Choice 1" data-custom-properties="null" aria-selected="true" data-deletable="">In Stock<button type="button" class="choices__button" aria-label="Remove item: 'Choice 1'" data-button="">Remove item</button></div><div class="choices__item choices__item--selectable" data-item="" data-id="2" data-value="Two" data-custom-properties="null" aria-selected="true" data-deletable="">Out of Stock<button type="button" class="choices__button" aria-label="Remove item: 'Two'" data-button="">Remove item</button></div></div><input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="false"></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" aria-multiselectable="true" role="listbox"><div id="choices--choices-tags-item-choice-1" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="Choice 4" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Black Friday</div><div id="choices--choices-tags-item-choice-5" class="choices__item choices__item--choice choices__item--disabled" role="option" data-choice="" data-id="5" data-value="One" data-select-text="Press to select" data-choice-disabled="" aria-disabled="true">Expired</div><div id="choices--choices-tags-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="Choice 2" data-select-text="Press to select" data-choice-selectable="">Out of Stock</div><div id="choices--choices-tags-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="Choice 3" data-select-text="Press to select" data-choice-selectable="">Sale</div></div></div></div>
                  </div>
                </div>
                <div class="button-row d-flex mt-0 mt-md-4">
                  <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                  <button class="btn bg-gradient-dark ms-auto mb-0" type="button" title="Send">Send</button>
                </div>
              </div> -->

              <div class="button-row d-flex mt-0 mt-md-4">
                <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" title="Send">Save</button>
              </div>
          </form>
        </div>
    </div>
</x-app-layout>