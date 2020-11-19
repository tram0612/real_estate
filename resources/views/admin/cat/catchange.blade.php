
<option value="0">--Chọn danh mục cấp 2--</option>
@isset($cat2)


@foreach($cat2 as $cat)


<option value="{{$cat->cat_id}}">{{$cat->name}}</option>

@endforeach
@endisset