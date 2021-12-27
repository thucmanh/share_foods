@extends('layout_user')
@section('content')
<!--? slider Area Start-->

<section class="slider-area slider-area2">
    <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-11 col-md-12">
                        <div class="hero__caption hero__caption2">
                            <h1 data-animation="bounceIn" data-delay="0.2s">新しい投稿を作成する</h1>
                            <!-- breadcrumb Start-->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">ホーム</a></li>
                                    <li class="breadcrumb-item"><a href="{{URL::to('/posts')}}">全て投稿</a></li>
                                </ol>
                            </nav>
                            <!-- breadcrumb End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="comment-form">
            <h4>登校の情報</h4>
            <form class="form-contact comment_form" action="{{URL::to('/create_post')}}" id="commentForm" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="row">

                    <div class="col-sm-4">
                        <div class="form-group">
                            <b style="color: red">*</b>
                            <input class="form-control" name="title" id="title" type="text" placeholder="Title" required>
                            @error('title')
                            <b><span style="color: red;">{{ $message }}</span></b>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="col-xs-12 col-sm-8">
                            <br>
                            <label for="post_url" class="btn btn3 custom-file-upload">
                                    アップロード
                            </label>

                            <input type="file" name="post_url" class="file-upload" id="post_url" required accept="image/png, image/jpeg" onchange="readURL(this);"> <br>
                        </div>
                        <div class="vspace-12-sm"></div>
                    </div>
                    <div class="col-12">
                        <img
                        style=" max-width:400px;max-height: 400px" hidden id="blah" />
                    </div>
                    <div class="col-12">
                        <p>タグ <b style="color: red">*</b></p>
                        <div class="form-group">
                            @foreach($tags as $tag)
                            <label class="checkbox-inline"><input type="checkbox" name="tags[]" value="{{$tag->tag_id}}">{{$tag->tag_title}}</label>
                            @endforeach
                            <br/>
                                @error('tags')
                                <b><span style="color: red;">{{ $message }}</span></b>
                                @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <p>材料 <b style="color: red">*</b></p>
                        <button class="add_field_button button" style="height: 30px; color:black; margin: 0 0 10px 0">材料の追加</button>
                        <div class="form-group add_material" style="margin-bottom: 7px">
                            <div style="margin-bottom: 7px">
                                <div class="col-2" style="display: inline-block; widows: 100%;">
                                    <input class="form-control" type="text" name="material[]" list="material" placeholder="材料名" />
                                        <datalist id="material">
                                            @foreach ($materials as $material)
                                                <option value="{{$material->material_name}}">
                                            @endforeach
                                        </datalist>
                                </div>
                                <div class="col-2" style="display: inline-block;">
                                    <input  class="form-control" name="amount[]" type="number" placeholder="量(グラム)" required>
                                </div>   
                            </div>                        
                        </div>
                    </div>

                    <div class="col-12">
                        <p>説明 <b style="color: red">*</b></p>
                        <div class="form-group">
                            <textarea class="form-control w-100" name="description" id="comment" cols="30" rows="1" placeholder="説明。。。" required></textarea>
                            @error('description')
                            <b><span style="color: red;">{{ $message }}</span></b>
                            @enderror
                        </div>
                    </div>



                    <div class="col-12">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#content" aria-controls="content" role="tab" data-toggle="tab">コンテンツを編集 <b style="color: red">*</b></a></li>
                            <li role="presentation"><a href="#preview" aria-controls="preview" role="tab" data-toggle="tab">プレビューの変更</a></li>
                        </ul>
                    </div>
                    <div class="col-12">
                        <div class="tab-content" id="myTabContent">
                            <!-- Tab panes -->
                            {{-- <div class="tab-content"> --}}
                                <div role="tabpanel" class="tab-pane active" id="content">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="detail_content" id="post-content" cols="50" rows="30" placeholder="コンテンツ" required></textarea>
                                        @error('detail_content')
                                        <b><span style="color: red;">{{ $message }}</span></b>
                                        @enderror
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="preview" style="padding: 40px 70px 40px 70px">
                                    <script src="https://cdn.jsdelivr.net/npm/markdown-element/dist/markdown-element.min.js"></script>
                                    <mark-down>

                                    </mark-down>
                                </div>
                            {{-- </div> --}}
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="button button-contactForm btn_1 boxed-btn">投稿</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

    /* Firefox */
    input[type=number] {
    -moz-appearance: textfield;
    }
</style>

<script>
    $(document).ready(function(){
        $("#post-content").change(function(){
            $("mark-down").html($(this).val())
        });
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper   		= $(".add_material"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID
        
        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div style="margin-bottom: 7px">                                <div class="col-2" style="display: inline-block; widows: 100%;">                                    <input class="form-control" type="text" name="material[]" list="material" placeholder="材料名" />                                        <datalist id="material">                                            <option value="San Francisco">                                            <option value="New York">                                            <option value="Seattle">                                            <option value="Los Angeles">                                            <option value="Chicago">                                        </datalist>                                </div>                                <div class="col-2" style="display: inline-block;">                                    <input  class="form-control" name="amount[]" type="number" placeholder="量(グラム)" required>                                </div> <a href="#" class="remove_field" style="color: blue">X</a></div>'); //add input box
            }
        });
        
        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });

    function validateData(){
        var tags = document.getElementsByName('tags[]');
        for(let i = 0; i < tags.length; i++){
          if(tags[i].checked)
              return true;
        }
        alert("Please choose tag");
        return false;
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result);
                $("#blah").removeAttr('hidden');
            };
            reader.readAsDataURL(input.files[0]);
            
        }
    }
</script>




@endsection

