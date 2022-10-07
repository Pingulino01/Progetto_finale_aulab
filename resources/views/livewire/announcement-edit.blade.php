<div>
    <form wire:submit.prevent="updateAnnouncement">
    <div class="mb-3">
        <label class="form-label">* Nuovo {{__('messages.AnnTitle')}}</label>
        <input wire:model.lazy="title" type="text" class="form-control" value="{{old('title')}}">
        @error('title') <span class="text-danger error">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">* Nuovo {{__('messages.AnnPrice')}} (&euro;)</label>
        <input wire:model.lazy="price" type="text"  class="form-control" value="{{old('price')}}">
        @error('price') <span class="text-danger error">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">* Nuova {{__('messages.AnnBody')}}</label>
        <textarea wire:model.lazy="body" id="" cols="30" rows="10" class="form-control">value="{{old('body')}}"</textarea>
        @error('body') <span class="text-danger error">{{ $message }}</span> @enderror
    </div>
    <label class="form-label">  {{__('messages.AnnPhone')}}</label>
    <div class="input-group">
        <select wire:model.lazy="prefix" class="form-control">
            <option> {{__('messages.AnnPrefix')}} </option>
            @foreach($prefixes as $prefix)
            <option value="{{$prefix->id}}">
                {{$prefix->name}}
            </option>
            @endforeach
        <input wire:model.lazy="telephone" type="number"  class="form-control  w-50" value="{{old('telephone')}}">
        @error('telephone') <span class="text-danger error">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">* Nuova{{__('messages.AnnCategory')}}</label>
        <select wire:model.lazy="category_id" class="form-control">
            <option> {{__('messages.AnnCategoryL')}} </option>
            @foreach($categories as $category)
            <option value="{{$category->id}}">
                {{$category->name}}
            </option>
            @endforeach
            
        </select>
        @error('category_id') <span class="text-danger error">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">{{__('messages.AnnImg')}}</label>
        <input wire:model="temporary_images" type="file" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="img">
        @error('temporary_images.*')
        <p class="text-danger mt-2">{{$message}}</p>
        @enderror
    </div>
    @if (!empty($images))
    <div class="row">
        <div class="col-12">
            <p>Photo preview</p>
                <div class="row border border-4 border-info rounded shadow py-4">
                    @foreach($images as $key=>$image)
                    <div class="col-my-3">
                        {{-- <div class="img-prewiew mx-auto shadow-rounded" style="height:200px; width:200px; background-image: url({{$image->temporaryUrl()}});"></div> --}}
                        <img src="{{$image->temporaryUrl()}}" class="img-fluid mx-auto shadow rounded" alt="">
                        <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})"><label class="form-label">* {{__('messages.BtnDel')}}</label></button>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <button type="submit" class="btn btn-primary">{{__('messages.AnnSubmit')}}</button>
    </form>
</div>

