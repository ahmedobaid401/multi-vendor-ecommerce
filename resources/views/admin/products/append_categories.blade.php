

<option type="text" class="form-control" id="exampleInputUsername1" value="0"  placeholder="main category"> main category </option>
@foreach($categories as $category)
<option type="text" class="form-control" value="{{$category['id']}}"  placeholder=" parent">{{$category['category_name']}} </option>
   @if(!empty($category['sub_category']))
       @foreach($category['sub_category'] as $subcategory)
       <option type="text" class="form-control"   value="{{$subcategory['id']}}"> &nbsp;&raquo;&nbsp;{{$subcategory['category_name']}} </option>
       @endforeach
   @endif
@endforeach