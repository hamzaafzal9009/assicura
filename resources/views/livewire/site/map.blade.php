<div>
    <div class="position-relative container heihgt-100">
        <div id="bgMap" class="position-absolute"></div>
        <div class="row mt-4 w-100 autosearch-div">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 position-relative">
                    <input type="text" placeholder="Type to search..." class="form-control autosearch-field"
                        id="location" />
                    <button class="btn btn-danger position-absolute autosearch-btn">@lang('translation.Search')</button>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-7 bg-light">
                    <div class="row">
                        {{-- {{ $agencies }} --}}
                        <div class="col-md-4 py-2">
                            <label class="form-label">Company</label>
                            <select class="form-control select2">
                                <option>Select</option>
                                @if (!empty($agencies))
                                @foreach ($agencies as $agency)
                                <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-4 py-2">
                            <label class="form-label">Branch</label>
                            <select class="form-control select2">
                                <option>Select</option>
                            </select>
                        </div>
                        <div class="col-md-4 py-2">
                            <label class="form-label">Rating</label>
                            <select class="form-control select2">
                                <option>Select</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>