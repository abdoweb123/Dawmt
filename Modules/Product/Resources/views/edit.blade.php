@extends(ucfirst(activeGuard()).'.Layouts.layout')
@section('pagetitle',__('trans.products'))

@push('css')
<style>
    select[readonly] {
        pointer-events: none;
        background-color: #f9f9f9; /* Optional: to visually indicate that the select is read-only */
        color: #999; /* Optional: to further indicate that the select is read-only */
    }
</style>
@endpush


@push('js')
    
    <script>
        $(document).on('change', '#discountDiscount', function() {
            if ($(this).val() === '1') {
                $('.discount').removeClass('hide');
            } else {
                $('.discount').addClass('hide');
                $('#discount').val('');
                $('#discount_from').val('');
                $('#discount_to').val('');
            }
        });

        $(document).on("change", "#filter", function() {
            
            $('.colors').addClass('hide');
            $('.sizes').addClass('hide');

            if ($(this).val() === 'has_size') {
                $('.sizes').removeClass('hide');
            }
            if ($(this).val() === 'has_color') {
                $('.colors').removeClass('hide');
            }
            if ($(this).val() === 'has_size_color') {
                $('.colors').removeClass('hide');
                $('.sizes').removeClass('hide');
            }
            

        });
        $('.add_two').click(function() {
            $('.block:last').before(
               '<div class="row block">' +
                   '<div class="my-1 col-md-3 col-sm-12 sizes  {{ $Model->Items->whereNotNull("size_id")->count() > 0 ? '' : "hide" }}"><label class="my-1">@lang("trans.size")</label>' +
                    '<select name="sizes[]" class="form-control  w-100" data-live-search="true">' +
                            @foreach ($Sizes as $size) '<option value="{{ $size->id }}">{{ $size->title() }}</option>' + @endforeach
                       '</select>' +
                   '</div>' +
                   '<div class="my-1 col-md-3 col-sm-12 colors {{ $Model->Items->whereNotNull("color_id")->count() > 0 ? '' : "hide" }}"><label class="my-1">@lang("trans.color")</label>' +
                    '<select name="colors[]" class="form-control  w-100" data-live-search="true">' +
                            @foreach ($Colors as $color) '<option value="{{ $color->id }}">{{ $color->title() }}</option>' + @endforeach
                       '</select>' +
                   '</div>' +
                   '<div class="my-1 col-md-3 col-sm-12"><label class="my-1">@lang("trans.price")</label><input type="text" name="prices[]" placeholder="@lang("trans.price")" class="form-control"></div>' +
                   '<div class="my-1 col-md-2 col-sm-12"><label class="my-1">@lang("trans.quantity")</label><input type="text" name="quantities[]" placeholder="@lang("trans.quantity")" class="form-control"></div>' +
                   '<div class="my-1 col-md-1 col-sm-12"><label class="my-1 row">@lang("trans.delete")</label><button class="btn btn-dark remove text-center mx-auto" type="button">-</button></div>' +
               '</div>'
            );
            
            $('.colors').addClass('hide');
            $('.sizes').addClass('hide');

            if ($('#filter').val() === 'has_size') {
                $('.sizes').removeClass('hide');
            }
            if ($('#filter').val() === 'has_color') {
                $('.colors').removeClass('hide');
            }
            if ($('#filter').val() === 'has_size_color') {
                $('.colors').removeClass('hide');
                $('.sizes').removeClass('hide');
            }
        });
        $(document).on('click', '.remove', function() {
            $(this).parent().parent().remove();
        });
    </script>
@endpush


@section('content')
    <form method="POST" action="{{ route(activeGuard() . '.products.update',$Model) }}" enctype="multipart/form-data" data-parsley-validate>
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group my-1 col-md-6 col-sm-12">
                <label class="my-1">@lang('trans.category')</label>
                <select name="categories[]" required class="form-control selectpicker w-100" multiple  data-live-search="true">
                    @foreach($Categories as $category)
                    <option {{ in_array($category->id, $Model->Categories->pluck('id')->toarray()) ? 'selected' : '' }} value="{{ $category['id'] }}">{{ $category->title() }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group my-1 col-md-6 col-sm-12">
                <label class="my-1">@lang('trans.code')</label>
                <input type="text" name="code" value="{{ $Model->code }}" placeholder="@lang('trans.code')" class="form-control">
            </div>
            
            <div class="my-1 col-md-6 col-sm-12 d-none">
                <label class="my-1">@lang('trans.brand')</label>
                <select name="brand_id" class="form-control selectpicker w-100" data-live-search="true">
                    @foreach ($Brands as $Brand)
                        <option @selected($Model->brand_id == $Brand['id']) value="{{ $Brand['id'] }}">{{ $Brand->title() }}</option>
                    @endforeach
                </select>
            </div>
            <div class="my-1 col-md-6 col-sm-12 d-none">
               
            </div>
            
            <div class="form-group my-1 col-md-6 col-sm-12">
                <label class="my-1">@lang('trans.title_ar')</label>
                <input type="text" name="title_ar" value="{{ $Model->title_ar }}" required placeholder="@lang('trans.title_ar')" class="form-control">
            </div>
            <div class="form-group my-1 col-md-6 col-sm-12">
                <label class="my-1">@lang('trans.title_en')</label>
                <input type="text" name="title_en" value="{{ $Model->title_en }}" required placeholder="@lang('trans.title_en')" class="form-control">
            </div>
            <div class="form-group my-1 col-md-6 col-sm-12">
                <label class="my-1">@lang('trans.desc_ar')</label>
                <textarea name="desc_ar" placeholder="@lang('trans.desc_ar')" class="form-control">{{ $Model->desc_ar }}</textarea>
            </div>
            <div class="form-group my-1 col-md-6 col-sm-12">
                <label class="my-1">@lang('trans.desc_en')</label>
                <textarea name="desc_en" placeholder="@lang('trans.desc_en')" class="form-control">{{ $Model->desc_en }}</textarea>
            </div>
            <div class="form-group my-1 col-md-6 col-sm-12 d-none">
                <label class="my-1">@lang('trans.size') & @lang('trans.color')</label>
                <select class="form-control" id="filter" name="filter">
                    <option hidden selected disabled>@lang('trans.Select')</option>
                    <option {{ $Model->Items->whereNotNull('color_id')->count() > 0 ? 'selected' : '' }} value="has_color">@lang('trans.has_color')</option>
                    <option {{ $Model->Items->whereNotNull('size_id')->count() > 0 ? 'selected' : '' }} value="has_size">@lang('trans.has_size')</option>
                    <option {{ $Model->Items->whereNotNull('color_id')->whereNotNull('size_id')->count() > 0 ? 'selected' : '' }} value="has_size_color">@lang('trans.has_size_color')</option>
                </select>
            </div>
    
                        
            <div class="col-12 col-md-6">
                <label class="my-1">
                    <span>@lang('trans.isThereDiscount')</span>
                </label>
                <select id="discountDiscount" name="have_discount" required class="form-control">
                    <option {{  $Model?->discount > 0 ? 'selected' : '' }} value="1">@lang('trans.yes')</option>
                    <option {{  $Model?->discount > 0 ? '' : 'selected' }} value="0">@lang('trans.no')</option>
                </select>
            </div>
            <div class="col-12 col-md-6 discount {{  $Model?->discount <= 0 ? 'hide' : '' }}">
                <label class="my-1">@lang('trans.discount_from')</label>
                <input value="{{ $Model?->from }}" id="discount_from" type="date" name="from" placeholder="@lang('trans.discount_from')" class="form-control">
            </div>
            <div class="col-12 col-md-6 discount {{  $Model?->discount <= 0 ? 'hide' : '' }}">
                <label class="my-1">@lang('trans.discount_to')</label>
                <input value="{{ $Model?->to }}" id="discount_to" type="date" name="to" placeholder="@lang('trans.discount_to')" class="form-control">
            </div>
            <div class="col-12 col-md-6 discount {{  $Model?->discount <= 0 ? 'hide' : '' }}">
                <label class="my-1">@lang('trans.discount') <span class="h4">%</span></label>
                <input value="{{ $Model?->discount }}" id="discount" type="number" step="any" name="discount" placeholder="@lang('trans.discount')" class="form-control">
            </div>

            
            <div class="form-group my-1 col-md-6 col-sm-12">
                <label class="my-1">@lang('trans.VAT')</label>
                <select class="form-control " required name="VAT">
                    <option hidden selected disabled>@lang('trans.Select')</option>
                    <option {{ $Model->VAT ==  'exclusive' ? 'selected' : '' }} value="exclusive">@lang('trans.exclusive')</option>
                    <option {{ $Model->VAT ==  'inclusive' ? 'selected' : '' }} value="inclusive">@lang('trans.inclusive')</option>
                </select>
            </div>
    
            <div class="form-group my-1 col-md-6 col-sm-12">
                <label class="my-1">@lang('trans.visibility')</label>
                <select class="form-control " required name="status">
                    <option {{ $Model->status ==  '0' ? 'selected' : '' }} value="0">@lang('trans.hidden')</option>
                    <option {{ $Model->status ==  '1' ? 'selected' : '' }} value="1">@lang('trans.visible')</option>
                </select>
            </div>
        
            
            <div class="form-group my-1 col-md-6 col-sm-12">
                <label class="my-1">@lang('trans.images')</label>
                <label class="file-input btn btn-block btn-secondary btn-file w-100">
                    <input accept="image/*" type="file" type="file" name="images[]" multiple>
                    @lang("trans.Browse")
                </label>
            </div>
    
          
            <div class="form-group my-1 col-md-12 col-sm-12">
                @foreach ($Model->Items as $item)
                    <div class="row block">
                        <div class="my-1 col-md-3 col-sm-12 sizes {{ $Model->Items->whereNotNull('size_id')->count() > 0 ? '' : 'hide' }} d-none">
                            <label class="my-1">@lang('trans.size')</label>
                            <select name="sizes[]" class="form-control w-100" data-live-search="true">
                                @foreach ($Sizes as $size)
                                    <option @selected($item->size_id == $size['id']) value="{{ $size['id'] }}">{{ $size->title() }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-1 col-md-3 col-sm-12 colors {{ $Model->Items->whereNotNull('color_id')->count() > 0 ? '' : 'hide' }} d-none">
                            <label class="my-1">@lang('trans.color')</label>
                            <select name="colors[]" class="form-control w-100" data-live-search="true">
                                @foreach ($Colors as $color)
                                    @php
                                        list($r, $g, $b) = sscanf($color->hexa, "#%02x%02x%02x");
                                    @endphp
                                    <option style="background-color: rgba({{ $r }},{{ $g }},{{ $b }},0.6);" @selected($item->color_id == $color['id']) value="{{ $color['id'] }}">{{ $color->title() }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-1 col-md-3 col-sm-12">
                            <label class="my-1">@lang('trans.price')</label>
                            <input type="text" name="prices[]" value="{{ $item->price }}" placeholder="@lang('trans.price')" class="form-control">
                        </div>
                        <div class="my-1 col-md-2 col-sm-12">
                            <label class="my-1">@lang('trans.quantity')</label>
                            <input type="text" name="quantities[]" value="{{ $item->quantity }}" placeholder="@lang('trans.quantity')" class="form-control">
                        </div>
                        <div class="my-1 col-md-1 col-sm-12 d-none">
                            <label class="my-1 row">@lang('trans.delete')</label>
                            <button class="btn btn-dark remove text-center mx-auto" type="button">-</button>
                        </div>
                    </div>
                @endforeach
                <div class="block text-center col-12 mx-auto d-none" style="padding-top: 15px;">
                    <span class="main-btn  btn-hover add-more add_two">+</span>
                </div>
            </div>
            
            
             <div class="clearfix"></div>
         
    
            <div class="clearfix"></div>
            <div class="col-12 my-4">
                <div class="button-group">
                    <button type="submit" class="main-btn  btn-hover btn-hover w-100 text-center">
                        {{ __('trans.Submit') }}
                    </button>
                </div>
            </div>
        </div>
    </form>



    @if (count($Model->images) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th style="text-align:center;">@lang('trans.images')</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($Model->images as $key => $image)
                        <tr class="gradeX {{ $image['id'] }}">
                            <td style="text-align:center;">{{ $key + 1 }}</td>
                            <td style="text-align:center;">
                                <label  for="ImageStatus{{ $image['id'] }}"><img src="{{ $image['image'] }}" alt="{{ $Model['title_en'] }}" width="150"></label>
                            </td>
                            <td class="actions">
                                <a onclick="DeleteSelected('product_images',{{ $image['id'] }})">
                                    <i class="fa-solid fa-trash-can cursor-pointer"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    @endif


@endsection




@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .select2-results__options[aria-multiselectable="true"] li {
            padding-left: 30px;
            position: relative
        }

        .select2-results__options[aria-multiselectable="true"] li:before {
            position: absolute;
            left: 8px;
            opacity: .6;
            top: 6px;
            font-family: "FontAwesome";
            content: "\f0c8";
        }

        .select2-results__options[aria-multiselectable="true"] li[aria-selected="true"]:before {
            content: "\f14a";
            color: green;
        }
    </style>
@endpush
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script>
        $(document).ready(function() {
            $(".selectpicker").select2({
                language: "{{ lang() }}",
                dir: "{{ lang('ar') ? 'rtl' : 'ltr' }}",
                closeOnSelect: false,
            });
        });
    </script>
@endpush