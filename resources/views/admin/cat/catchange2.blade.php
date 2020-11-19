
<option value="0">--Chọn danh mục cấp 3--</option>
@isset($cat3)


@foreach($cat3 as $cat)


<option value="{{$cat->cat_id}}">{{$cat->name}}</option>

@endforeach
@endisset