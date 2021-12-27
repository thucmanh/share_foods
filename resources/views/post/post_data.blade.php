<div class="row justify-content-center">
    @foreach($posts as $post)
        <div class="col-lg-4">
            <div class="properties properties2 mb-30">
                <div class="properties__card">
                    <div class="properties__img overlay1">
                        @if($post->post_url == null)
                            <img src="{{asset('/user/img/pj3.1.png')}}" alt="" style="height: 200px;">
                        @else
                            <img src="{{$post->post_url}}" alt=""  style="height: 200px;">
                        @endif
                    </div>
                    <div class="properties__caption">
                        <h3>{{$post->title}}</h3>
                        <p class="etc_des">{{$post->description}}</p>
                        <p style="font-style: italic">Posted on {{$post->date_create}} by {{$post->user->user_name}}<div class="row justify-content-center">
    @foreach($posts as $post)
        <div class="col-lg-4">
            <div class="properties properties2 mb-30">
                <div class="properties__card">
                    <div class="properties__img overlay1">
                        @if($post->post_url == null)
                            <img src="{{asset('/user/img/pj3.1.png')}}" alt="" style="height: 200px;">
                        @else
                            <img src="{{$post->post_url}}" alt=""  style="height: 200px;">
                        @endif
                    </div>
                    <div class="properties__caption">
                        <h3>{{$post->title}}</h3>
                        <p class="etc_des">{{$post->description}}</p>
                        <p style="font-style: italic"><a style="color:blue; " href="{{ URL::to('/users/' . $post->user_id) . '/posts' }}"><b>{{$post->user->user_name}}</b></a>によって{{$post->date_create}}に投稿された</p>
                        <a href="{{URL::to('/posts/'.$post->post_id)}}" class="border-btn border-btn2">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

{!! $posts->links() !!}

<style>
    .etc_des{
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2; /* number of lines to show */
        line-clamp: 2; 
        -webkit-box-orient: vertical;
        min-height: 60px
    }
</style></p>
                        <a href="{{URL::to('/posts/'.$post->post_id)}}" class="border-btn border-btn2">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

{!! $posts->links() !!}

<style>
    .etc_des{
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2; /* number of lines to show */
        line-clamp: 2; 
        -webkit-box-orient: vertical;
        min-height: 60px
    }
</style>