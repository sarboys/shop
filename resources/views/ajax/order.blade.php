@foreach($products as $product)
    @php
        if(count($product->images)>0) {
            $image = $product->images[0]['img'];
        } else {
            $image = 'no_image.png';
        }
    @endphp
    <div class="product">
        <div class="product_image"><img src="images/{{$image}}" alt="{{$product->name}}"></div>
        <div class="product_extra product_new">
            <a href="{{route('category', $product->category['alias'])}}">
                {{$product->category['name']}}
            </a>
        </div>
        <div class="product_content">
            <div class="product_title"><a href="{{route('product',[$product->category['alias'],$product->id])}}">{{$product->name}}</a></div>
            @if($product->new_price != null)
                <div class="product_price" style="text-decoration: line-through;">${{$product->price}}</div>
                <div class="product_price">${{$product->new_price}}</div>
            @else
                <div class="product_price">${{$product->price}}</div>
            @endif
        </div>
    </div>
@endforeach
