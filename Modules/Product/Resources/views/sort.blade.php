@extends(ucfirst(activeGuard()).'.Layouts.layout')
@section('pagetitle',__('trans.Products'))
@section('content')



@php($Categories = \Modules\Category\Entities\Model::orderBy('arrangement')->with(['Products'])->withCount('Products')->get())
<form action="{{ route('admin.products.sort') }}" method="POST">
    @csrf
    @method('POST')
    <div class="categories_sortable">
        @foreach($Categories as $Category)
            <div>
                <h1 class="CollapseProducts"  data-target="collapse-{{ $Category->id }}" style="cursor: pointer;">
                    <input id="" type="hidden" value="{{ $Category->id }}" name="categories[{{ $Category->id }}]">
                    <i class="fa-solid fa-ellipsis"></i> {{ $Category->arrangement }} {{ $Category->title() }}
                </h1>
                <div class="d-none" id="collapse-{{ $Category->id }}">
                   <ul class="row border border-primary my-3 products_sortable">
                        @foreach($Category->Products->sortBy('pivot.arrangement') as $Product)
                            <div class="col-12  m-1">
                                <p class="border border-primary px-2 py-1 h5" style="cursor: pointer;">
                                    <input id="" type="hidden" value="{{ $Product->id }}" name="categories[{{ $Category->id }}][]">
                                    <i class="fa-solid fa-sort"></i> {{ $Product->pivot->arrangement ?? '--' }} {{ $Product->title() }}
                                </p>
                            </div>
                        @endforeach
                   </ul>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-sm-12 my-4 py-2">
            <div class="text-center p-20">
                <button type="submit" class="main-btn px-5">{{ __('trans.Submit') }}</button>
            </div>
        </div>
    </div>
</form>


@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).on("click", ".CollapseProducts", function () {
        $('#'+$(this).attr('data-target')).toggleClass('d-none');
    });

    $(function () {
      $(".categories_sortable").sortable();
      $(".products_sortable").sortable();
    });
</script>
@endpush