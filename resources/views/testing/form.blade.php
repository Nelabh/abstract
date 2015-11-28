<div class="form-group">
    {!! Form::label('category_id','Category',['class'=>'custom-label']) !!}
    {!! Form::select('category_id',$category_id,null,['class'=>'selectpicker form-control','id'=>'category']) !!}
</div>
<div class="form-group">
    {!! Form::label('sub_category_id','Sub Category Id',['class'=>'custom-label']) !!}
    @if ( isset( $sub_category_id ) )
        {!! Form::select('sub_category_id',$sub_category_id,null,['class'=>'form-control','id'=>'subcategory']) !!}
    @else
        {!! Form::select('sub_category_id',[],null,['class'=>'form-control','id'=>'subcategory']) !!}
    @endif
</div>
<div class="form-group">
    {!! Form::label('sub_sub_category_id','Sub-Sub-Category') !!}
    @if ( isset( $sub_sub_category_id ) )
        {!! Form::select('sub_sub_category_id',$sub_sub_category_id,null,['class'=>'form-control','id'=>'subsubcategory']) !!}
    @else
        {!! Form::select('sub_sub_category_id',[],null,['class'=>'form-control','id'=>'subsubcategory']) !!}
    @endif
</div>
<div class="form-group">
    {!! Form::label('name','Product name',['class'=>'custom-label']) !!}
    {!! Form::text('name',null,['class' => 'form-control input-lg','placeholder'=>'Product Name']) !!}
</div>
<div class="form-group">
    {!! Form::label('brand','Brand') !!}
    {!! Form::text('brand_name',null,['class' => 'form-control','placeholder'=>'Product Brand','rows'=>'3']) !!}
</div>
<div class="form-group">
    {!! Form::label('description','Description') !!}
    {!! Form::textarea('description',null,['class' => 'form-control input-lg','rows'=>'3','placeholder'=>'Enter the Description']) !!}
</div>
<div class="form-group">
    {!! Form::label('image','Image') !!}
    {!! Form::file('image') !!}
</div>
<div class="form-group">
    {!! Form::label('max_retail_price','Max Retail Price') !!}
    {!! Form::text('max_retail_price',null,['class' => 'form-control','placeholder'=>'Max Retail Price','rows'=>'3']) !!}
</div>
<div class="form-group">
    {!! Form::label('package_type','Package Type') !!}
    {!! Form::text('package_type',null,['class' => 'form-control','placeholder'=>'Package Type','rows'=>'3']) !!}
</div>
<div class="form-group">
    {!! Form::label('package_volume','Package Volume') !!}
    {!! Form::text('package_volume',null,['class' => 'form-control','placeholder'=>'Package Volume','rows'=>'3']) !!}
</div>
<div class="form-group">
    {!! Form::label('package_unit','Package Unit') !!}
    {!! Form::select('package_unit',$units,null,['class'=>'form-control selectpicker']) !!}
    {{--{!! Form::text('',null,['class' => 'form-control','placeholder'=>'Package Unit','rows'=>'3']) !!}--}}
</div>
<div class="form-group">
    {!! Form::label('min_order_quantity','Minimum Order Quantity') !!}
    {!! Form::text('min_order_quantity',null,['class' => 'form-control','placeholder'=>'MIn Order Quantity','rows'=>'3']) !!}
</div>
<div class="form-group">
    {!! Form::label('min_order_unit','Unit') !!}
    {!! Form::select('min_order_unit',$units,null,['class'=>'form-control selectpicker']) !!}
    {{--{!! Form::text('min_order_unit',null,['class' => 'form-control','placeholder'=>'MIn Order Quantity','rows'=>'3']) !!}--}}

</div>
<div class="form-group">
    {!! Form::label('sku_small','SKU') !!}
    {!! Form::text('sku_small',null,['class' => 'form-control','placeholder'=>'Small','rows'=>'3']) !!}
</br>
    {!! Form::text('sku_medium',null,['class' => 'form-control','placeholder'=>'Medium','rows'=>'3']) !!}
</br>

    {!! Form::text('sku_large',null,['class' => 'form-control','placeholder'=>'Large','rows'=>'3']) !!}

</div>

<!--<div class="form-group">
    {!! Form::label('sustainability_initiatives','Sustainability Initiatives') !!}
    {!! Form::text('sustainability_initiatives',null,['class' => 'form-control','placeholder'=>'sustainability initiatives','rows'=>'3']) !!}
</div>-->
<div class="form-group">
    {!! Form::label('active','Active') !!}
    {!! Form::select('active',['null'=>'Please select an option','1'=>'Yes','0'=>'No'],null,['class' => 'form-control selectpicker']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Save', ['class'=>'btn btn-primary form-control input-lg']) !!}
</div>
