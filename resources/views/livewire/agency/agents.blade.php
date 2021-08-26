<div>
    @if (session()->has('addUserSuccess'))
    <div class="alert alert-success">
        {{ session('addUserSuccess') }}
    </div>
    @endif
    <div class="row my-2">
        <div class="col-lg-5">
            <label for="">@lang('translation.Search')</label>
            <div class="input-group">
                <input class="form-control border-end-0 border " placeholder="@lang('translation.Search')" type="text"
                    wire:model="user_name" id="example-search-input">
                <span class="input-group-append">
                    <button class="btn btn-outline-secondary bg-white border-start-0 border  ms-n3" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </div>
        <div class="col-lg-7 d-flex justify-content-end">
            <button type="button" class="btn btn-primary btn-sm align-self-center" wire:click="showAddModel">
                @lang('translation.Add_New')
            </button>
        </div>
    </div>

    <div class="row justify-content-center">
        <div wire:loading style="width: 110px">
            <div class="spinner-grow text-primary" style="width: 8rem;height:8rem" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>

    @if (!empty($users))
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div wire:loading.remove>
                        <table class="table align-middle table-nowrap table-hover">
                            <thead>
                                <tr>
                                    <th>Avatar</th>
                                    <th>@lang('translation.Name')</th>
                                    <th>@lang('translation.Email')</th>
                                    <th>@lang('translation.Status')</th>
                                    <th>@lang('translation.Available')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <img src="{{ isset($user->avatar) ? asset($user->avatar) : URL::asset('/assets/images/logo.png') }}"
                                            alt="..." class="img-thumbnail rounded-circle">
                                    </td>
                                    <td class="text-capitalize">
                                        {{ $user->name }}
                                    </td>
                                    <td class="text-capitalize">
                                        {{ $user->email }}
                                    </td>
                                    <td class="text-capitalize">
                                        {{ $user->user_status }}
                                    </td>
                                    <td>
                                        @if ($user->is_available == 1)
                                        <span class="badge bg-primary">Available</span>
                                        @else
                                        <span class="badge bg-secondary">Not Available</span>

                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <x-model :display="$addModal">
        <x-slot name='content1'>
            <div class="p-3">
                <button type="button" class="close btn p-0"
                    style="font-size: 25px; position: absolute; right:10px; top: -3px;" wire:click="hideAddModel()"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h2 class="fs-3 mb-2">@lang('translation.Add_New_Agent')</h2>
                <hr>
                @if (session()->has('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
                @endif
                <div class="row mb-2">
                    <label for="name">@lang('translation.Name')</label>
                    <input type="text" placeholder="@lang('translation.Name')" name="name" id="name"
                        wire:model.defer="name" class="form-control" required>
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="row mb-2">
                    <label for="email">Email</label>
                    <input type="text" placeholder="Email" name="email" id="email" wire:model.defer="email"
                        class="form-control" required>
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                </div>
                @if ($user == null)
                @if (!empty($agencies))
                <div class="row mb-2">
                    <label for="email">Agency</label>
                    <select class="form-control" wire:model.defer="agency_id">
                        <option value="">Select</option>
                        @foreach ($agencies as $agency)
                        <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                        @endforeach
                    </select>
                </div>
                @endif
                @endif
                <div class="d-flex justify-content-between mt-5">
                    <button class=" mt-2 btn btn-dark" type="button" wire:click="hideAddModel">
                        @lang('translation.Cancel')
                    </button>
                    <button class=" mt-2 btn btn-primary" type="button" wire:click="addAgent">
                        @lang('translation.Add')
                    </button>
                </div>
            </div>
        </x-slot>
    </x-model>
</div>